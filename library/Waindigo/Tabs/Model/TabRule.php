<?php

/**
 * Model for tab rules.
 */
class Waindigo_Tabs_Model_TabRule extends XenForo_Model
{

    /**
     * Gets tab rules that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions
     *
     * @return array [tab rule id] => info.
     */
    public function getTabRules(array $conditions = array(), array $fetchOptions = array())
    {
        $whereClause = $this->prepareTabRuleConditions($conditions, $fetchOptions);

        $sqlClauses = $this->prepareTabRuleFetchOptions($fetchOptions);
        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->fetchAllKeyed(
            $this->limitQueryResults(
                '
                SELECT tab_rule.*
                    ' . $sqlClauses['selectFields'] . '
                FROM xf_tab_rule AS tab_rule
                ' . $sqlClauses['joinTables'] . '
                WHERE ' . $whereClause . '
                ' . $sqlClauses['orderClause'] . '
            ', $limitOptions['limit'], $limitOptions['offset']),
            'tab_rule_id');
    } /* END getTabRules */

    /**
     * Gets the tab rule that matches the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions Options that affect what is fetched.
     *
     * @return array false
     */
    public function getTabRule(array $conditions = array(), array $fetchOptions = array())
    {
        $tabRules = $this->getTabRules($conditions, $fetchOptions);

        return reset($tabRules);
    } /* END getTabRule */

    /**
     * Gets a tab rule by ID.
     *
     * @param integer $tabRuleId
     * @param array $fetchOptions Options that affect what is fetched.
     *
     * @return array false
     */
    public function getTabRuleById($tabRuleId, array $fetchOptions = array())
    {
        $conditions = array(
            'tab_rule_id' => $tabRuleId
        );

        return $this->getTabRule($conditions, $fetchOptions);
    } /* END getTabRuleById */

    /**
     * Gets the total number of a tab rule that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     *
     * @return integer
     */
    public function countTabRules(array $conditions = array())
    {
        $fetchOptions = array();

        $whereClause = $this->prepareTabRuleConditions($conditions, $fetchOptions);
        $joinOptions = $this->prepareTabRuleFetchOptions($fetchOptions);

        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->_getDb()->fetchOne(
            '
            SELECT COUNT(*)
            FROM xf_tab_rule AS tab_rule
            ' . $joinOptions['joinTables'] . '
            WHERE ' . $whereClause . '
        ');
    } /* END countTabRules */

    /**
     * Gets all tab rules titles.
     *
     * @return array [tab rule id] => title.
     */
    public static function getTabRuleTitles()
    {
        $tabRules = XenForo_Model::create(__CLASS__)->getTabRules();
        $titles = array();
        foreach ($tabRules as $tabRuleId => $tabRule) {
            $titles[$tabRuleId] = $tabRule['title'];
        }
        return $titles;
    } /* END getTabRuleTitles */

    /**
     * Gets the default tab rule record.
     *
     * @return array
     */
    public function getDefaultTabRule()
    {
        return array(
            'tab_rule_id' => '', /* END 'tab_rule_id' */
            'match_content_type' => 'thread', /* END 'match_content_type' */
            'match_criteria' => '', /* END 'match_criteria' */
            'create_content_type' => 'thread', /* END 'create_content_type' */
            'create_criteria' => '', /* END 'create_criteria' */
        );
    } /* END getDefaultTabRule */

    /**
     * Gets the name of a tab rule's custom message phrase.
     *
     * @param integer $tabRuleId
     *
     * @return string
     */
    public function getTabRuleCustomMessagePhraseName($tabRuleId)
    {
        return 'waindigo_' . $tabRuleId . '_custom_message_tabs';
    } /* END getTabRuleCustomMessagePhraseName */

    /**
     * Gets a tab rule's master custom message phrase text.
     *
     * @param integer $tabRuleId
     *
     * @return string
     */
    public function getTabRuleMasterCustomMessagePhraseValue($tabRuleId)
    {
        $phraseName = $this->getTabRuleCustomMessagePhraseName($tabRuleId);
        return $this->_getPhraseModel()->getMasterPhraseValue($phraseName);
    } /* END getTabRuleMasterCustomMessagePhraseValue */

    /**
     * Prepares a set of conditions to select tab rules against.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions The fetch options that have been provided. May
     * be edited if criteria requires.
     *
     * @return string Criteria as SQL for where clause
     */
    public function prepareTabRuleConditions(array $conditions, array &$fetchOptions)
    {
        $db = $this->_getDb();
        $sqlConditions = array();

        if (isset($conditions['tab_rule_ids']) && !empty($conditions['tab_rule_ids'])) {
            $sqlConditions[] = 'tab_rule.tab_rule_id IN (' . $db->quote($conditions['tab_rule_ids']) . ')';
        } elseif (isset($conditions['tab_rule_id'])) {
            $sqlConditions[] = 'tab_rule.tab_rule_id = ' . $db->quote($conditions['tab_rule_id']);
        }

        if (isset($conditions['match_content_types']) && !empty($conditions['match_content_types'])) {
            $sqlConditions[] = 'tab_rule.match_content_type IN (' . $db->quote($conditions['match_content_types']) . ')';
        } elseif (isset($conditions['match_content_type'])) {
            $sqlConditions[] = 'tab_rule.match_content_type = ' . $db->quote($conditions['match_content_type']);
        }

        $this->_prepareTabRuleConditions($conditions, $fetchOptions, $sqlConditions);

        return $this->getConditionsForClause($sqlConditions);
    } /* END prepareTabRuleConditions */

    /**
     * Method designed to be overridden by child classes to add to set of
     * conditions.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions The fetch options that have been provided. May
     * be edited if criteria requires.
     * @param array $sqlConditions List of conditions as SQL snippets. May be
     * edited if criteria requires.
     */
    protected function _prepareTabRuleConditions(array $conditions, array &$fetchOptions, array &$sqlConditions)
    {
    } /* END _prepareTabRuleConditions */

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
    public function prepareTabRuleFetchOptions(array &$fetchOptions)
    {
        $selectFields = '';
        $joinTables = '';
        $orderBy = '';

        $this->_prepareTabRuleFetchOptions($fetchOptions, $selectFields, $joinTables, $orderBy);

        return array(
            'selectFields' => $selectFields,
            'joinTables' => $joinTables,
            'orderClause' => ($orderBy ? "ORDER BY $orderBy" : '')
        );
    } /* END prepareTabRuleFetchOptions */

    /**
     * Method designed to be overridden by child classes to add to SQL snippets.
     *
     * @param array $fetchOptions containing a 'join' integer key built from
     * this class's FETCH_x bitfields.
     * @param string $selectFields = ', user.*, foo.title'
     * @param string $joinTables = ' INNER JOIN foo ON (foo.id = other.id) '
     * @param string $orderBy = 'x.y ASC, x.z DESC'
     */
    protected function _prepareTabRuleFetchOptions(array &$fetchOptions, &$selectFields, &$joinTables, &$orderBy)
    {
    } /* END _prepareTabRuleFetchOptions */

    /**
     *
     * @return XenForo_Model_Phrase
     */
    protected function _getPhraseModel()
    {
        return $this->getModelFromCache('XenForo_Model_Phrase');
    } /* END _getPhraseModel */
}