<?php

class MODM_AJAXChat_Install
{
	public static function install()
	{
		$db = XenForo_Application::getDb();
		
		$db->beginTransaction();
		
		$sql = "REPLACE INTO `xf_content_type` (`content_type`, `addon_id`,  `fields`) VALUES
				('ajaxchat_message', 'modm_ajaxchat', '" . serialize(array()) . "')";
		$db->query($sql);
		
		
		$sql = "REPLACE INTO `xf_content_type_field` (`content_type`, `field_name`, `field_value`) VALUES
				('ajaxchat_message', 'report_handler_class', 'MODM_AJAXChat_ReportHandler_AJAXChatMessage')";
		$db->query($sql);
		
		/* @var $ctModel XenForo_Model_ContentType */
		$ctModel = XenForo_Model::create('XenForo_Model_ContentType');
		$ctModel->rebuildContentTypeCache();
		
		$db->commit();
	}
	
	public static function uninstall()
	{
		$db = XenForo_Application::getDb();
	
		$db->beginTransaction();
	
		$sql = "DELETE FROM `xf_content_type` WHERE `content_type` = 'ajaxchat_message'";
		$db->query($sql);
	
	
		$sql = "DELETE FROM `xf_content_type_field` WHERE `content_type` = 'ajaxchat_message'";
		$db->query($sql);
	
		/* @var $ctModel XenForo_Model_ContentType */
		$ctModel = XenForo_Model::create('XenForo_Model_ContentType');
		$ctModel->rebuildContentTypeCache();
	
		$db->commit();
	}
}