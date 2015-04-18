<?php

class Turki_Adv_DataWriter_User extends XFCP_Turki_Adv_DataWriter_User
{
	protected function _getFields()
	{
		$fields                                 = parent::_getFields();
		$fields['xf_user_option']['enable_adv'] = array('type' => self::TYPE_BOOLEAN, 'default' => 1);
		return $fields;
	}
}