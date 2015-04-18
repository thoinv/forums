<?php

class DigitalPointSocialBar_DataWriter_Forum extends XFCP_DigitalPointSocialBar_DataWriter_Forum
{
	protected function _getFields()
	{
		$response = parent::_getFields();
		$response['xf_forum']['dp_twitter_slug'] = array('type' => self::TYPE_STRING, 'maxLength' => 25, 'default' => '');
		return $response;
	}
}