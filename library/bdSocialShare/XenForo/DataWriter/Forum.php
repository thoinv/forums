<?php

class bdSocialShare_XenForo_DataWriter_Forum extends XFCP_bdSocialShare_XenForo_DataWriter_Forum
{
	protected function _getFields()
	{
		$fields = parent::_getFields();

		$fields['xf_forum']['bdsocialshare_threadauto'] = array('type' => XenForo_DataWriter::TYPE_SERIALIZED);

		return $fields;
	}

	protected function _preSave()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERADMIN_FORUM_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERADMIN_FORUM_SAVE]->bdSocialShare_actionSave($this);
		}

		return parent::_preSave();
	}

}
