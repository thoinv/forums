<?php

class Waindigo_Friends_Install_Controller extends Waindigo_Install
{

    protected $_resourceManagerUrl = 'http://xenforo.com/community/resources/friends-by-waindigo.836/';

    protected function _getTables()
    {
        return array(
            'xf_friend' => array(
                'user_id' => 'INT(10) UNSIGNED NOT NULL',
                'friend_user_id' => 'INT(10) UNSIGNED NOT NULL',
                'message' => 'VARCHAR(255) NOT NULL',
                'friend_state' => 'ENUM(\'confirmed\',\'pending\',\'rejected\',\'\') NOT NULL DEFAULT \'\'',
                'since_date' => 'INT(10) UNSIGNED NOT NULL DEFAULT 0',
                'know_personally' => 'TINYINT(3) UNSIGNED NOT NULL DEFAULT 0'
            ),
            'xf_mutual_friend' => array(
                'user_id' => 'INT(10) UNSIGNED NOT NULL',
                'friend_user_id' => 'INT(10) UNSIGNED NOT NULL',
                'friends' => 'TEXT'
            )
        );
    }

    protected function _getPrimaryKeys()
    {
        return array(
            'xf_friend' => array(
                'user_id',
                'friend_user_id'
            ),
            'xf_mutual_friend' => array(
                'user_id',
                'friend_user_id'
            )
        );
    }

    protected function _getTableChanges()
    {
        return array(
            'xf_user' => array(
                'friend_count' => 'INT(10) UNSIGNED NOT NULL DEFAULT \'0\'',
                'personal_friend_count' => 'INT(10) UNSIGNED NOT NULL DEFAULT \'0\''
            ),
            'xf_user_profile' => array(
                'friends' => 'TEXT'
            )
        );
    }

    protected function _getContentTypes()
    {
        return array(
            'friend' => array(
                'addon_id' => 'Waindigo_Friends',
                'fields' => array(
                    'alert_handler_class' => 'Waindigo_Friends_AlertHandler_Friend'
                )
            )
        );
    }

    protected function _getEnumValues()
    {
        return array(
            'xf_user_privacy' => array(
                'allow_view_profile' => array(
                    'add' => array(
                        'friends'
                    )
                ),
                'allow_post_profile' => array(
                    'add' => array(
                        'friends'
                    )
                ),
                'allow_send_personal_conversation' => array(
                    'add' => array(
                        'friends'
                    )
                ),
                'allow_view_identities' => array(
                    'add' => array(
                        'friends'
                    )
                ),
                'allow_receive_news_feed' => array(
                    'add' => array(
                        'friends'
                    )
                )
            )
        );
    }

    protected function _preUninstall()
    {
        $this->_db->update('xf_user_privacy', array(
            'allow_view_profile' => 'everyone'
        ), 'allow_view_profile = \'friends\'');
        $this->_db->update('xf_user_privacy', array(
            'allow_post_profile' => 'everyone'
        ), 'allow_post_profile = \'friends\'');
        $this->_db->update('xf_user_privacy',
            array(
                'allow_send_personal_conversation' => 'everyone'
            ), 'allow_send_personal_conversation = \'friends\'');
        $this->_db->update('xf_user_privacy',
            array(
                'allow_view_identities' => 'everyone'
            ), 'allow_view_identities = \'friends\'');
        $this->_db->update('xf_user_privacy',
            array(
                'allow_receive_news_feed' => 'everyone'
            ), 'allow_receive_news_feed = \'friends\'');
    }
}