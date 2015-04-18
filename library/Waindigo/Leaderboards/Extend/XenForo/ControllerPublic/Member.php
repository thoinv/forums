<?php

/**
 *
 * @see XenForo_ControllerPublic_Member
 */
class Waindigo_Leaderboards_Extend_XenForo_ControllerPublic_Member extends XFCP_Waindigo_Leaderboards_Extend_XenForo_ControllerPublic_Member
{

    /**
     *
     * @see XenForo_ControllerPublic_Member::actionIndex()
     */
    public function actionIndex()
    {
        $response = parent::actionIndex();

        if ($response instanceof XenForo_ControllerResponse_View) {
            $leaderboardModel = $this->_getLeaderboardModel();

            $leaderboards = $leaderboardModel->getLeaderboards();

            $response->params['leaderboards'] = $leaderboards;

            if ($response->params['type'] == 'leaderboard') {
                $leaderboardId = $this->_input->filterSingle('leaderboard_id', XenForo_Input::UINT);
                $response->params['leaderboardId'] = $leaderboardId;

                $leaderboard = $leaderboards[$leaderboardId];

                if (!$leaderboard['use_cached_value']) {
                    $response->params['bigKey'] = $leaderboard['order'];
                    $entries = XenForo_Application::arrayColumn($response->params['users'], $leaderboard['order'], 'user_id');
                    arsort($entries);

                    $sortedUsers = array();
                    foreach ($entries as $userId => $entry) {
                        if (!empty($response->params['users'][$userId]) && $entry) {
                            $sortedUsers[$userId] = $response->params['users'][$userId];
                        }
                    }

                    $response->params['users'] = $sortedUsers;
                }
            }
        }

        return $response;
    } /* END actionIndex */

    /**
     *
     * @see XenForo_ControllerPublic_Member::_getNotableMembers()
     */
    protected function _getNotableMembers($type, $limit)
    {
        if ($type == 'leaderboard') {
            $leaderboardId = $this->_input->filterSingle('leaderboard_id', XenForo_Input::UINT);

            $leaderboardModel = $this->_getLeaderboardModel();

            $leaderboardEntries = $leaderboardModel->getLeaderboardEntries(array(
                'leaderboard_id' => $leaderboardId
            ));

            $userIds = array();
            foreach ($leaderboardEntries as $leaderboardEntry) {
                $userIds[$leaderboardEntry['user_id']] = $leaderboardEntry['user_id'];
            }

            /* @var $userModel XenForo_Model_User */
            $userModel = $this->_getUserModel();

            $fetchOptions = array(
                'join' => XenForo_Model_User::FETCH_USER_FULL
            );

            $users = $userModel->getUsersByIds($userIds, $fetchOptions);

            $entries = XenForo_Application::arrayColumn($leaderboardEntries, 'entry', 'user_id');
            arsort($entries);

            $sortedUsers = array();
            foreach ($entries as $userId => $entry) {
                if (!empty($users[$userId]) && $entry) {
                    $sortedUsers[$userId] = $users[$userId];
                    $sortedUsers[$userId]['leaderboard_entry'] = $entry;
                }
            }

            return array($sortedUsers, 'leaderboard_entry');
        }

        return parent::_getNotableMembers($type, $limit);
    } /* END _getNotableMembers */

    /**
     * Get the leaderboards model.
     *
     * @return Waindigo_Leaderboards_Model_Leaderboard
     */
    protected function _getLeaderboardModel()
    {
        return $this->getModelFromCache('Waindigo_Leaderboards_Model_Leaderboard');
    } /* END _getLeaderboardModel */
}