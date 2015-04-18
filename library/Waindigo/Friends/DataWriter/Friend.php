<?php

class Waindigo_Friends_DataWriter_Friend extends XenForo_DataWriter
{

    /**
     * Option to rebuild the denormalized user_profile.friend fields for the
     * friends
     *
     * @var string
     */
    const OPTION_POST_WRITE_UPDATE_USERS_FRIENDS = 'updateUsersFriendsAfterWrite';

    protected function _getFields()
    {
        return array(
            'xf_friend' => array(
                'user_id' => array(
                    'type' => self::TYPE_STRING,
                    'required' => true
                ),
                'friend_user_id' => array(
                    'type' => self::TYPE_STRING,
                    'required' => true
                ),
                'message' => array(
                    'type' => self::TYPE_STRING,
                    'required' => true
                ),
                'friend_state' => array(
                    'type' => self::TYPE_STRING,
                    'allowedValues' => array(
                        'confirmed',
                        'pending',
                        'rejected'
                    ),
                    'default' => 'pending'
                ),
                'since_date' => array(
                    'type' => self::TYPE_UINT,
                    'default' => XenForo_Application::$time
                ),
                'know_personally' => array(
                    'type' => self::TYPE_BOOLEAN,
                    'default' => 0
                )
            )
        );
    }

    protected function _getExistingData($data)
    {
        if (!is_array($data)) {
            return false;
        } else
            if (isset($data['user_id'], $data['friend_user_id'])) {
                $userId = $data['user_id'];
                $friendUserId = $data['friend_user_id'];
            } else
                if (isset($data[0], $data[1])) {
                    $userId = $data[0];
                    $friendUserId = $data[1];
                } else {
                    return false;
                }

        return array(
            'xf_friend' => $this->_getUserModel()->getFriendRecord($userId, $friendUserId)
        );
    }

    protected function _getUpdateCondition($tableName)
    {
        return 'user_id = ' . $this->_db->quote($this->getExisting('user_id')) . ' AND friend_user_id = ' .
             $this->_db->quote($this->getExisting('friend_user_id'));
    }

    /**
     * Gets the default set of options for this data writer.
     *
     * @return array
     */
    protected function _getDefaultOptions()
    {
        return array(
            self::OPTION_POST_WRITE_UPDATE_USERS_FRIENDS => true
        );
    }

    /**
     * Update user's friend count
     */
    protected function _postSave()
    {
        if ($this->isChanged('friend_state')) {
            if ($this->get('friend_state') == 'confirmed') {
                $this->_db->query(
                    '
					UPDATE xf_user SET
					friend_count = friend_count + 1
					' .
                         ($this->get('know_personally') ? ', personal_friend_count = personal_friend_count + 1' : '') . '
					WHERE user_id IN (' . $this->_db->quote(
                            array(
                                $this->get('user_id'),
                                $this->get('friend_user_id')
                            )) . ')
				');

                if (XenForo_Application::get('options')->waindigo_friends_autoFollow) {
                    $users = $this->_getUserModel()->getUsersByIds(
                        array(
                            $this->get('user_id'),
                            $this->get('friend_user_id')
                        ));
                    $this->_getUserModel()->follow($users[$this->get('user_id')], true,
                        $users[$this->get('friend_user_id')]);
                    $this->_getUserModel()->follow($users[$this->get('friend_user_id')], true,
                        $users[$this->get('user_id')]);
                }
            } else
                if ($this->getExisting('friend_state') == 'confirmed') {
                    $this->_db->query(
                        '
					UPDATE xf_user SET
					friend_count = friend_count - 1
					' .
                             ($this->getExisting('know_personally') ? ', personal_friend_count = personal_friend_count - 1' : '') . '
					WHERE user_id IN (' . $this->_db->quote(
                                array(
                                    $this->get('user_id'),
                                    $this->get('friend_user_id')
                                )) . ')
				');
                }
        } else
            if ($this->isChanged('know_personally') && $this->get('friend_state') == 'confirmed') {
                if ($this->get('know_personally')) {
                    $this->_db->query(
                        '
					UPDATE xf_user SET
					personal_friend_count = personal_friend_count + 1
					WHERE user_id IN (' . $this->_db->_quote(
                            array(
                                $this->get('user_id'),
                                $this->get('friend_user_id')
                            )) . ')
				');
                } else {
                    $this->_db->query(
                        '
					UPDATE xf_user SET
					personal_friend_count = personal_friend_count - 1
					WHERE user_id IN (' . $this->_db->_quote(
                            array(
                                $this->get('user_id'),
                                $this->get('friend_user_id')
                            )) . ')
				');
                }
            }

        if ($this->getOption(self::OPTION_POST_WRITE_UPDATE_USERS_FRIENDS)) {
            $this->_getUserModel()->updateFriendsDenormalizedValue($this->get('user_id'));
            $this->_getUserModel()->updateFriendsDenormalizedValue($this->get('friend_user_id'));
        }
    }

    /**
     * Post-delete handler
     */
    protected function _postDelete()
    {
        if ($this->getOption(self::OPTION_POST_WRITE_UPDATE_USERS_FRIENDS)) {
            $this->_getUserModel()->updateFriendsDenormalizedValue($this->get('user_id'));
            $this->_getUserModel()->updateFriendsDenormalizedValue($this->get('friend_user_id'));
        }
    }

    /**
     *
     * @return XenForo_Model_User
     */
    protected function _getUserModel()
    {
        return $this->getModelFromCache('XenForo_Model_User');
    }
}