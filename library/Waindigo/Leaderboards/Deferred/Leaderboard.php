<?php

class Waindigo_Leaderboards_Deferred_Leaderboard extends XenForo_Deferred_Abstract
{

    public function execute(array $deferred, array $data, $targetRunTime, &$status)
    {
        $data = array_merge(array(
            'position' => 0,
            'batch' => 70,
            'start_time' => XenForo_Application::$time
        ), $data);
        $data['batch'] = max(1, $data['batch']);

        /* @var $userModel XenForo_Model_User */
        $userModel = XenForo_Model::create('XenForo_Model_User');

        /* @var $leaderboardModel Waindigo_Leaderboards_Model_Leaderboard */
        $leaderboardModel = XenForo_Model::create('Waindigo_Leaderboards_Model_Leaderboard');

        if (!empty($data['leaderboard_id'])) {
            $leaderboards = array(
                $data['leaderboard_id'] => $leaderboardModel->getLeaderboardById($data['leaderboard_id'])
            );
        } elseif (!empty($data['rebuildOnly'])) {
            $leaderboards = $leaderboardModel->getLeaderboards(
                array(
                    'rebuildSince' => $data['start_time']
                ));
        } else {
            $leaderboards = $leaderboardModel->getLeaderboards();
        }

        if (empty($leaderboards)) {
            return true;
        }

        $leaderboardEntries = $leaderboardModel->getLeaderboardEntries(
            array(
                'leaderboard_ids' => array_keys($leaderboards)
            ));
        foreach ($leaderboardEntries as $leaderboardEntry) {
            $leaderboards[$leaderboardEntry['leaderboard_id']]['entries'][$leaderboardEntry['user_id']] = $leaderboardEntry['entry'];
        }

        $db = XenForo_Application::getDb();

        if ($data['position'] == 0) {
            $userIds = array();
            foreach ($leaderboardEntries as $leaderboardEntry) {
                $userIds[$leaderboardEntry['user_id']] = $leaderboardEntry['user_id'];
            }

            $users = $userModel->getUsersByIds($userIds);

            foreach ($leaderboards as $leaderboardId => &$leaderboard) {
                if (empty($leaderboard['entries'])) {
                    continue;
                }
                foreach ($leaderboard['entries'] as $userId => $entry) {
                    $userMatches = false;
                    if (!empty($users[$userId])) {
                        $userMatches = XenForo_Helper_Criteria::userMatchesCriteria($leaderboard['user_criteria'], true,
                            $users[$userId]);
                    }

                    if (!$userMatches) {
                        arsort($leaderboard['entries']);
                        unset($leaderboard['entries'][$userId]);
                        $db->delete('xf_user_leaderboard_entry_waindigo',
                            'leaderboard_id = ' . $db->quote($leaderboardId) . ' AND user_id = ' . $db->quote($userId));
                    } elseif (isset($users[$userId][$leaderboard['order']]) &&
                         $users[$userId][$leaderboard['order']] != $entry) {
                        $leaderboard['entries'][$userId] = $entry;
                        $db->update('xf_user_leaderboard_entry_waindigo',
                            array(
                                'entry' => $users[$userId][$leaderboard['order']]
                            ),
                            'leaderboard_id = ' . $db->quote($leaderboardId) . ' AND user_id = ' . $db->quote($userId));
                    }
                }
            }
        }

        $userIds = $userModel->getUserIdsInRange($data['position'], $data['batch']);
        if (sizeof($userIds) == 0) {
            $db->update('xf_user_leaderboard_waindigo', array(
                'last_rebuild' => XenForo_Application::$time
            ), 'leaderboard_id IN (' . $db->quote(array_keys($leaderboards)) . ')');
            return true;
        }

        $users = $userModel->getUsersByIds($userIds);

        $limit = XenForo_Application::get('options')->membersPerPage;

        foreach ($userIds as $userId) {
            $data['position'] = $userId;

            if (empty($users[$userId])) {
                continue;
            }

            foreach ($leaderboards as $leaderboardId => &$leaderboard) {
                if (!empty($leaderboard['entries'][$userId])) {
                    continue;
                }
                if (empty($users[$userId][$leaderboard['order']])) {
                    continue;
                }
                if (!empty($leaderboard['entries']) && count($leaderboard['entries']) >= $limit) {
                    $entryToBeat = min($leaderboard['entries']);
                    if (isset($users[$userId][$leaderboard['order']]) &&
                         $users[$userId][$leaderboard['order']] <= $entryToBeat) {
                        continue;
                    }
                }
                $userMatches = XenForo_Helper_Criteria::userMatchesCriteria($leaderboard['user_criteria'], true,
                    $users[$userId]);
                if ($userMatches) {
                    if (!empty($leaderboard['entries']) && count($leaderboard['entries']) >= $limit) {
                        while (count($leaderboard['entries']) >= $limit) {
                            arsort($leaderboard['entries']);
                            $entryToRemove = array_pop($leaderboard['entries']);
                            $db->delete('xf_user_leaderboard_entry_waindigo',
                                'leaderboard_id = ' . $db->quote($leaderboardId) . ' AND user_id = ' .
                                     $db->quote($userId));
                        }
                    }
                    $leaderboard['entries'][$userId] = $users[$userId][$leaderboard['order']];
                    $db->insert('xf_user_leaderboard_entry_waindigo',
                        array(
                            'leaderboard_id' => $leaderboardId,
                            'user_id' => $userId,
                            'username' => $users[$userId]['username'],
                            'entry' => $users[$userId][$leaderboard['order']]
                        ));
                }
            }
        }

        $actionPhrase = new XenForo_Phrase('rebuilding');
        $typePhrase = new XenForo_Phrase('waindigo_leaderboards_leaderboards');
        $status = sprintf('%s... %s (%s)', $actionPhrase, $typePhrase, XenForo_Locale::numberFormat($data['position']));

        return $data;
    } /* END execute */

    public function canCancel()
    {
        return true;
    } /* END canCancel */
}