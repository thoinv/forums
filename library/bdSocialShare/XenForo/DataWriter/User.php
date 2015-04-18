<?php

class bdSocialShare_XenForo_DataWriter_User extends XFCP_bdSocialShare_XenForo_DataWriter_User
{
	protected function _getFields()
	{
		$fields = parent::_getFields();

		$fields['xf_user_option']['bdsocialshare_options'] = array('type' => XenForo_DataWriter::TYPE_SERIALIZED);

		return $fields;
	}

	protected function _preSave()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_ACCOUNT_PREFERENCES_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_ACCOUNT_PREFERENCES_SAVE]->bdSocialShare_actionPreferencesSave($this);
		}

		return parent::_preSave();
	}

}
