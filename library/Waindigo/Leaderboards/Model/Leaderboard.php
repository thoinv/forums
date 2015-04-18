<?php

/**
 * Model for leaderboards.
 */
class Waindigo_Leaderboards_Model_Leaderboard extends XenForo_Model
{

    /**
     * Gets leaderboards that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions
     *
     * @return array [leaderboard id] => info.
     */
    public function getLeaderboards(array $conditions = array(), array $fetchOptions = array())
    {
        $whereClause = $this->prepareLeaderboardConditions($conditions, $fetchOptions);

        $sqlClauses = $this->prepareLeaderboardFetchOptions($fetchOptions);
        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->fetchAllKeyed(
            $this->limitQueryResults(
                '
                SELECT leaderboard.*
                    ' . $sqlClauses['selectFields'] . '
                FROM xf_user_leaderboard_waindigo AS leaderboard
                ' . $sqlClauses['joinTables'] . '
                WHERE ' . $whereClause . '
                ' . $sqlClauses['orderClause'] . '
            ', $limitOptions['limit'], $limitOptions['offset']),
            'leaderboard_id');
    } /* END getLeaderboards */

    /**
     * Gets the leaderboard that matches the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions Options that affect what is fetched.
     *
     * @return array false
     */
    public function getLeaderboard(array $conditions = array(), array $fetchOptions = array())
    {
        $leaderboards = $this->getLeaderboards($conditions, $fetchOptions);

        return reset($leaderboards);
    } /* END getLeaderboard */

    /**
     * Gets a leaderboard by ID.
     *
     * @param integer $leaderboardId
     * @param array $fetchOptions Options that affect what is fetched.
     *
     * @return array false
     */
    public function getLeaderboardById($leaderboardId, array $fetchOptions = array())
    {
        $conditions = array(
            'leaderboard_id' => $leaderboardId
        );

        return $this->getLeaderboard($conditions, $fetchOptions);
    } /* END getLeaderboardById */

    /**
     * Gets the total number of a leaderboard that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     *
     * @return integer
     */
    public function countLeaderboards(array $conditions = array())
    {
        $fetchOptions = array();

        $whereClause = $this->prepareLeaderboardConditions($conditions, $fetchOptions);
        $joinOptions = $this->prepareLeaderboardFetchOptions($fetchOptions);

        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->_getDb()->fetchOne(
            '
            SELECT COUNT(*)
            FROM xf_user_leaderboard_waindigo AS leaderboard
            ' . $joinOptions['joinTables'] . '
            WHERE ' . $whereClause . '
        ');
    } /* END countLeaderboards */

    /**
     * Gets all leaderboards titles.
     *
     * @return array [leaderboard id] => title.
     */
    public static function getLeaderboardTitles()
    {
        $leaderboards = XenForo_Model::create(__CLASS__)->getLeaderboards();
        $titles = array();
        foreach ($leaderboards as $leaderboardId => $leaderboard) {
            $titles[$leaderboardId] = $leaderboard['title'];
        }
        return $titles;
    } /* END getLeaderboardTitles */

    /**
     * Gets the default leaderboard record.
     *
     * @return array
     */
    public function getDefaultLeaderboard()
    {
        return array(
            'leaderboard_id' => '', /* END 'leaderboard_id' */
            'user_criteria' => '', /* END 'user_criteria' */
        );
    } /* END getDefaultLeaderboard */

    /**
     * Prepares a set of conditions to select leaderboards against.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions The fetch options that have been provided. May
     * be edited if criteria requires.
     *
     * @return string Criteria as SQL for where clause
     */
    public function prepareLeaderboardConditions(array $conditions, array &$fetchOptions)
    {
        $db = $this->_getDb();
        $sqlConditions = array();

        if (isset($conditions['leaderboard_ids']) && !empty($conditions['leaderboard_ids'])) {
            $sqlConditions[] = 'leaderboard.leaderboard_id IN (' . $db->quote($conditions['leaderboard_ids']) . ')';
        } elseif (isset($conditions['leaderboard_id'])) {
            $sqlConditions[] = 'leaderboard.leaderboard_id = ' . $db->quote($conditions['leaderboard_id']);
        }

        if (!empty($conditions['rebuildSince'])) {
            $dateTime = new DateTime('@' . $conditions['rebuildSince']);
            $dateTime->modify('-' . $dateTime->format('i') . ' minutes');
            $dateTime->modify('-' . $dateTime->format('s') . ' seconds');
            $hourlyDate = $dateTime->format('U');
            $dateTime->modify('-' . $dateTime->format('H') . ' hours');
            $dailyDate = $dateTime->format('U');
            $dateTime->modify('-' . ($dateTime->format('j') - 1) . ' days');
            $monthlyDate = $dateTime->format('U');
            $sqlConditions[] = '(leaderboard.rebuild_frequency = \'hourly\' AND leaderboard.last_rebuild <= ' .
                 $db->quote($hourlyDate) .
                 ') OR (leaderboard.rebuild_frequency = \'daily\' AND leaderboard.last_rebuild <= ' .
                 $db->quote($dailyDate) .
                 ') OR (leaderboard.rebuild_frequency = \'monthly\' AND leaderboard.last_rebuild <= ' .
                 $db->quote($monthlyDate) . ')';
        }

        return $this->getConditionsForClause($sqlConditions);
    } /* END prepareLeaderboardConditions */

    /**
     * Checks the 'join' key of the incoming array for the presence of the
     * FETCH_x bitfields in this class
     * and returns SQL snippets to join the specified tables if required.
     *
     * @param array $fetchOptions containing a 'join' integer key built from
     * this class's FETCH_x bitfields.
     *
     * @return string containing selectFields, joinTables, orderClause keys.
     * Example: selectFields = ', user.*, foo.title'; joinTables = ' INNER JOIN
     * foo ON (foo.id = other.id) '; orderClause = 'ORDER BY x.y'
     */
    public function prepareLeaderboardFetchOptions(array &$fetchOptions)
    {
        $selectFields = '';
        $joinTables = '';
        $orderBy = '';

        return array(
            'selectFields' => $selectFields,
            'joinTables' => $joinTables,
            'orderClause' => ($orderBy ? "ORDER BY $orderBy" : '')
        );
    } /* END prepareLeaderboardFetchOptions */

    /**
     * Gets leaderboard entries that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions
     *
     * @return array [leaderboard id] => info.
     */
    public function getLeaderboardEntries(array $conditions = array(), array $fetchOptions = array())
    {
        $whereClause = $this->prepareLeaderboardEntryConditions($conditions, $fetchOptions);

        $sqlClauses = $this->prepareLeaderboardEntryFetchOptions($fetchOptions);
        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->_getDb()->fetchAll(
            $this->limitQueryResults(
                '
                SELECT leaderboard_entry.*
                    ' . $sqlClauses['selectFields'] . '
                FROM xf_user_leaderboard_entry_waindigo AS leaderboard_entry
                ' . $sqlClauses['joinTables'] . '
                WHERE ' . $whereClause . '
                ' . $sqlClauses['orderClause'] . '
            ', $limitOptions['limit'], $limitOptions['offset']));
    } /* END getLeaderboardEntries */

    /**
     * Prepares a set of conditions to select leaderboard entries against.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions The fetch options that have been provided. May
     * be edited if criteria requires.
     *
     * @return string Criteria as SQL for where clause
     */
    public function prepareLeaderboardEntryConditions(array $conditions, array &$fetchOptions)
    {
        $db = $this->_getDb();
        $sqlConditions = array();

        if (isset($conditions['leaderboard_ids']) && !empty($conditions['leaderboard_ids'])) {
            $sqlConditions[] = 'leaderboard_entry.leaderboard_id IN (' . $db->quote($conditions['leaderboard_ids']) . ')';
        } elseif (isset($conditions['leaderboard_id'])) {
            $sqlConditions[] = 'leaderboard_entry.leaderboard_id = ' . $db->quote($conditions['leaderboard_id']);
        }

        return $this->getConditionsForClause($sqlConditions);
    } /* END prepareLeaderboardEntryConditions */

    /**
     * Checks the 'join' key of the incoming array for the presence of the
     * FETCH_x bitfields in this class and returns SQL snippets to join the
     * specified tables if required.
     *
     * @param array $fetchOptions containing a 'join' integer key built from
     * this class's FETCH_x bitfields.
     *
     * @return string containing selectFields, joinTables, orderClause keys.
     * Example: selectFields = ', user.*, foo.title'; joinTables = ' INNER JOIN
     * foo ON (foo.id = other.id) '; orderClause = 'ORDER BY x.y'
     */
    public function prepareLeaderboardEntryFetchOptions(array &$fetchOptions)
    {
        $selectFields = '';
        $joinTables = '';
        $orderBy = '';

        return array(
            'selectFields' => $selectFields,
            'joinTables' => $joinTables,
            'orderClause' => ($orderBy ? "ORDER BY $orderBy" : '')
        );
    } /* END prepareLeaderboardEntryFetchOptions */
}