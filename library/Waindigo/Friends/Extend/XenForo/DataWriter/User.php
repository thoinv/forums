<?php

/**
 *
 * @see XenForo_DataWriter_User
 */
class Waindigo_Friends_Extend_XenForo_DataWriter_User extends XFCP_Waindigo_Friends_Extend_XenForo_DataWriter_User
{

    /**
     *
     * @see XenForo_DataWriter_User::_getFields()
     */
    protected function _getFields()
    {
        $fields = parent::_getFields();
        $fields['xf_user']['friend_count'] = array(
            'type' => self::TYPE_UINT,
            'default' => 0
        );
        $fields['xf_user']['personal_friend_count'] = array(
            'type' => self::TYPE_UINT,
            'default' => 0
        );
        $fields['xf_user_profile']['friends'] = array(
            'type' => self::TYPE_STRING,
            'default' => '',
            'verification' => array(
                'XenForo_DataWriter_Helper_Denormalization',
                'verifyIntCommaList'
            )
        );
        return $fields;
    }

    protected function _preSave()
    {
        parent::_preSave();

        if ($this->get('user_id')) {
            $this->set('friends', $this->_getUserModel()
                ->getFriendsDenormalizedValue($this->get('user_id')));
        }
    }

    protected function _postDelete()
    {
        parent::_postDelete();

        $db = $this->_db;
        $userId = $this->get('user_id');

        $db->delete('xf_friend', 'user_id = ' . $db->quote($userId));
        $db->delete('xf_friend', 'friend_user_id = ' . $db->quote($userId));
    }

    /**
     *
     * @see XenForo_DataWriter_User::_verifyPrivacyChoice()
     */
    protected function _verifyPrivacyChoice(&$choice, $dw, $fieldName)
    {
        if (strtolower($choice) == 'friends') {
            return true;
        }

        return parent::_verifyPrivacyChoice($choice, $dw, $fieldName);
    }
}