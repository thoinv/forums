<?php

/**
 *
 * @see XenForo_Model_User
 */
class Waindigo_Friends_Extend_XenForo_Model_User extends XFCP_Waindigo_Friends_Extend_XenForo_Model_User
{

    /**
     *
     * @see XenForo_Model_User::prepareUserFetchOptions()
     */
    public function prepareUserFetchOptions(array $fetchOptions)
    {
        $userFetchOptions = parent::prepareUserFetchOptions($fetchOptions);

        $selectFields = $userFetchOptions['selectFields'];
        $joinTables = $userFetchOptions['joinTables'];

        if (!empty($fetchOptions['join'])) {
            if (isset($fetchOptions['followingUserId'])) {
                $fetchOptions['followingUserId'] = intval($fetchOptions['followingUserId']);
                if ($fetchOptions['followingUserId']) {
                    // note: quoting is skipped; intval'd above
                    $selectFields .= ',
    					IF(friend.friend_state = \'confirmed\', 1, 0) AS friends_' .
                         $fetchOptions['followingUserId'];
                    $joinTables .= '
    					LEFT JOIN xf_friend AS friend ON (friend.user_id = user.user_id AND friend.friend_user_id = ' .
                         $fetchOptions['followingUserId'] . ') OR (friend.user_id = ' . $fetchOptions['followingUserId'] .
                         ' AND friend.friend_user_id = user.user_id)';
                    if ($fetchOptions['join'] & self::FETCH_USER_PROFILE) {
                        $selectFields .= ',
					       mutual_friend.friends AS mutual_friends_' .
                             $fetchOptions['followingUserId'];
                        $joinTables .= '
        					LEFT JOIN xf_mutual_friend AS mutual_friend ON
        						(mutual_friend.user_id = user.user_id AND mutual_friend.friend_user_id = ' .
                             $fetchOptions['followingUserId'] . ')';
                    }
                } else {
                    $selectFields .= ',
    					0 AS friends_0, \'\' AS mutual_friends_0';
                }
            }
        }

        return array(
            'selectFields' => $selectFields,
            'joinTables' => $joinTables
        );
    }

    /**
     *
     * @see XenForo_Model_User::passesPrivacyCheck()
     */
    public function passesPrivacyCheck($privacyRequirement, array $user, array $viewingUser = null)
    {
        $this->standardizeViewingUserReference($viewingUser);

        if (!parent::passesPrivacyCheck($privacyRequirement, $user, $viewingUser)) {
            return false;
        }

        if ($privacyRequirement == 'friends') {
            if ($user['user_id'] == $viewingUser['user_id']) {
                return true;
            }

            if ($this->canBypassUserPrivacy($null, $viewingUser)) {
                return true;
            }

            if (isset($user['friends_' . $viewingUser['user_id']])) {
                return ($user['friends_' . $viewingUser['user_id']] > 0);
            } elseif (!empty($user['friends'])) {
                return in_array($viewingUser['user_id'], explode(',', $user['friends']));
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * Creates a new friend request record for $userId friending $friendUserId
     *
     * @param array $friendUser User being friended
     * @param array $user User doing the friending
     * @param string $message
     *
     * @return string Comma-separated list of all users now being followed by
     * $userId
     */
    public function friend(array $friendUser, array $user = null, $message = '', $knowPersonally = false)
    {
        if ($user === null) {
            $user = XenForo_Visitor::getInstance();
        }

        $record = $this->getFriendRecord($friendUser['user_id'], $user['user_id']);

        if (!$record || $record['friend_state'] == 'pending' ||
             ($record['friend_state'] == 'rejected' && $record['friend_user_id'] == $user['user_id'])) {
            $dw = XenForo_DataWriter::create('Waindigo_Friends_DataWriter_Friend');
            if ($record) {
                $dw->setExistingData(
                    array(
                        $user['user_id'],
                        $friendUser['user_id']
                    ));
            }
            if ($dw->get('user_id') == $friendUser['user_id'] && $dw->get('friend_user_id') == $user['user_id']) {
                $dw->set('friend_state', 'confirmed');
            } else {
                $dw->set('user_id', $user['user_id']);
                $dw->set('friend_user_id', $friendUser['user_id']);
            }
            if ($message) {
                $dw->set('message', $message);
            }
            $dw->set('know_personally', $knowPersonally);
            $dw->save();

            if ($dw->get('friend_state') == 'confirmed' || $dw->get('friend_state') == 'pending') {
                $this->_getAlertModel()->alert($friendUser['user_id'], $user['user_id'], $user['username'], 'friend',
                    $user['user_id'], $dw->get('friend_state'));
            }
        }

        $this->updateFriendsDenormalizedValue($user['user_id']);
        $this->updateFriendsDenormalizedValue($friendUser['user_id']);
    }

    /**
     * Deletes a friend record between $userId and $friendUserId
     *
     * @param int $friendUser User Id being unfriended
     * @param int $user User Id doing the unfriending
     *
     * @return string Comma-separated list of all users now being followed by
     * $userId
     */
    public function unfriend($friendUserId, $userId = null)
    {
        if ($userId === null) {
            $userId = XenForo_Visitor::getUserId();
        }

        $record = $this->getFriendRecord($userId, $friendUserId);

        if ($record && $record['friend_state'] != 'rejected') {
            $dw = XenForo_DataWriter::create('Waindigo_Friends_DataWriter_Friend');
            $dw->setExistingData(array(
                $userId,
                $friendUserId
            ));
            if ($dw->get('user_id') == $userId && $dw->get('friend_user_id') == $friendUserId) {
                $dw->set('user_id', $friendUserId);
                $dw->set('friend_user_id', $userId);
            }
            $dw->set('friend_state', 'rejected');
            $dw->save();
        }

        $this->updateFollowingDenormalizedValue($userId);
        $this->updateFollowingDenormalizedValue($friendUserId);
    }

    /**
     * Fetches a single friend record.
     *
     * @param integer $frienduserId - first user
     * @param integer $userId - second user
     *
     * @return array
     */
    public function getFriendRecord($friendUserId, $userId = null)
    {
        if ($userId === null) {
            $userId = XenForo_Visitor::getUserId();
        }

        return $this->_getDb()->fetchRow(
            '
			SELECT *
			FROM xf_friend
			WHERE (user_id = ? AND friend_user_id = ?)
			OR (user_id = ? AND friend_user_id = ?)

			',
            array(
                $userId,
                $friendUserId,
                $friendUserId,
                $userId
            ));
    }

    /**
     * Fetches multiple friend records.
     *
     * @param array $frienduserIds - first user
     * @param integer $userId - second user
     *
     * @return array
     */
    public function getFriendRecords(array $friendUserIds, $userId = null)
    {
        if ($userId === null) {
            $userId = XenForo_Visitor::getUserId();
        }

        return $this->fetchAllKeyed(
            '
				SELECT *, if (user_id = ?, friend_user_id, user_id) AS user_id
				FROM xf_friend
				WHERE (user_id = ? AND friend_user_id IN (' . $this->_getDb()
                ->quote($friendUserIds) . '))
				OR (user_id IN (' . $this->_getDb()
                ->quote($friendUserIds) . ') AND friend_user_id = ?)

				', 'user_id',
            array(
                $userId,
                $userId,
                $userId
            ));
    }

    /**
     * Fetches multiple friend records.
     *
     * @param array $frienduserIds - first user
     * @param integer $userId - second user
     *
     * @return array
     */
    public function getUserFriends($userId = null, $maxResults = 0, $orderBy = 'user.username')
    {
        if ($userId === null) {
            $userId = XenForo_Visitor::getUserId();
        }

        $visitorUserId = XenForo_Visitor::getUserId();

        $sql = '
			SELECT friend.*, user.*, mutual_friend.friend_state AS mutual_friend_state
			FROM xf_friend AS friend
			INNER JOIN xf_user AS user
				ON (((user.user_id = friend.user_id AND friend.user_id != ?)
					OR (user.user_id = friend.friend_user_id AND friend.friend_user_id != ?)) AND user.is_banned = 0)
			LEFT JOIN xf_friend AS mutual_friend
				ON ((user.user_id = mutual_friend.user_id AND mutual_friend.friend_user_id = ?)
					OR (user.user_id = mutual_friend.friend_user_id AND mutual_friend.user_id = ?))
			WHERE (friend.user_id = ? OR friend.friend_user_id = ?)
				AND friend.friend_state = \'confirmed\'
		';

        if ($maxResults) {
            $sql = $this->limitQueryResults($sql, $maxResults);
        }

        return $this->fetchAllKeyed($sql, 'user_id',
            array(
                $userId,
                $userId,
                $visitorUserId,
                $visitorUserId,
                $userId,
                $userId
            ));
    }

    /**
     * Rebuilds mutual friend cache.
     *
     * @param integer $maxExecution The approx maximum length of time this
     * function will run for
     * @param integer $startUserId The ID of the user ID to start with
     * @param integer $startFriendId The number of the user ID to start with
     *
     * @return boolean|array True if completed successfully, otherwise array of
     * where to restart (values start user ID, start friend ID)
     */
    public function rebuildMutualFriendsCaches($maxExecution = 0, $startUserId = 0, $startFriendId = 0)
    {
        $db = $this->_getDb();

        $users = $this->getAllUsers(array(
            'join' => self::FETCH_USER_PROFILE
        ));
        $userIds = array_keys($users);
        sort($userIds);

        $lastUser = 0;
        $startTime = microtime(true);
        $complete = true;

        XenForo_Db::beginTransaction($db);

        foreach ($userIds as $userId) {
            if ($userId < $startUserId) {
                continue;
            }

            $lastUserId = $userId;

            $timePassed = microtime(true) - $startTime;

            $lastFriendId = $this->rebuildMutualFriendsCache($maxExecution - $timePassed, $userId, $startFriendId,
                $users);

            if ($lastFriendId !== true) {
                $complete = false;
                break;
            }

            $startFriendId = 0;
        }

        XenForo_Db::commit($db);

        if ($complete) {
            return true;
        } else {
            return array(
                $lastUserId,
                $lastFriendId + 1
            );
        }
    }

    public function rebuildMutualFriendsCache($maxExecution = 0, $userId, $startFriendId, array $users = null)
    {
        $db = $this->_getDb();

        if ($users === null) {
            $users = $this->getAllUsers(array(
                'join' => self::FETCH_USER_PROFILE
            ));
        }

        $startTime = microtime(true);

        $lastFriendId = 0;

        $friends = $users;
        foreach ($friends as $friend) {
            $friendId = $friend['user_id'];

            if ($friendId < $startFriendId) {
                continue;
            }

            $lastFriendId = $friendId;

            $userFriends = explode(',', $users[$userId]['friends']);
            $friendFriends = explode(',', $friend['friends']);

            $mutualFriends = implode(',', array_intersect($userFriends, $friendFriends));

            $db->query(
                '
                    INSERT INTO xf_mutual_friend
                    (user_id, friend_user_id, friends)
                    VALUES (?, ?, ?)
                    ON DUPLICATE KEY UPDATE friends = VALUES(friends)
                ',
                array(
                    $userId,
                    $friendId,
                    $mutualFriends
                ));

            if ($maxExecution && (microtime(true) - $startTime) > $maxExecution) {
                return $lastFriendId;
            }
        }

        return true;
    }

    /**
     * Generates the denormalized, comma-separated version of a user's friends
     *
     * @param $userId
     *
     * @return string
     */
    public function getFriendsDenormalizedValue($userId)
    {
        $userId = $this->getUserIdFromUser($userId);

        return implode(',',
            $this->_getDb()->fetchCol(
                '

			SELECT user.user_id
			FROM xf_friend AS friend
			INNER JOIN xf_user AS user
				ON (((user.user_id = friend.user_id AND friend.user_id != ?)
					OR (user.user_id = friend.friend_user_id AND friend.friend_user_id != ?)) AND user.is_banned = 0)
			WHERE (friend.user_id = ? OR friend.friend_user_id = ?)
				AND friend.friend_state = \'confirmed\'
			ORDER BY user.username

		',
                array(
                    $userId,
                    $userId,
                    $userId,
                    $userId
                )));
    }

    /**
     * Updates the denormalized, comma-separated version of a user's friends.
     * Will query for the value if it is not provided
     *
     * @param integer|array $userId|$user
     * @param string Denormalized friends value
     *
     * @return string
     */
    public function updateFriendsDenormalizedValue($userId, $friends = false)
    {
        $userId = $this->getUserIdFromUser($userId);

        if ($friends === false) {
            $friends = $this->getFriendsDenormalizedValue($userId);
        }

        $this->update($userId, 'friends', $friends);

        XenForo_Application::defer('Waindigo_Friends_Deferred_MutualFriend',
            array(
                'userId' => $userId
            ));

        return $friends;
    }

    /**
     *
     * @return XenForo_Model_Alert
     */
    protected function _getAlertModel()
    {
        return $this->getModelFromCache('XenForo_Model_Alert');
    }
}