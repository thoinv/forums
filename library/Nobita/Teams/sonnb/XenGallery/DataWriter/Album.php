<?php

class Nobita_Teams_sonnb_XenGallery_DataWriter_Album extends XFCP_Nobita_Teams_sonnb_XenGallery_DataWriter_Album
{
	protected function _getFields()
	{
		$fields = parent::_getFields();
		$fields['sonnb_xengallery_album']['team_id'] = array('type' => self::TYPE_UINT, 'default' => 0);

		return $fields;
	}

	protected function _preSave()
	{
		if (isset($GLOBALS[Nobita_Teams_Listener::XENGALLERY_CONTROLLERPUBLIC_ALBUM_ACTIONSAVE]))
		{
			$GLOBALS[Nobita_Teams_Listener::XENGALLERY_CONTROLLERPUBLIC_ALBUM_ACTIONSAVE]->SocialGroups_actionSave($this);
		}

		return parent::_preSave();
	}



}