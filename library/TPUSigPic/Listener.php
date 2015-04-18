<?php

class TPUSigPic_Listener
{
	public static function install()
	{
		$db = XenForo_Application::get('db');
		
		$field=$db->fetchOne('SHOW COLUMNS FROM xf_user LIKE "sigpic_date"');
		if ($field==NULL)
			$db->query('ALTER TABLE xf_user ADD COLUMN sigpic_date INT(10) UNSIGNED NOT NULL DEFAULT 0 AFTER alerts_unread');
		
		return true;
	}
	
	public static function uninstall()
	{
		$db = XenForo_Application::get('db');	
		
		$field=$db->fetchOne('SHOW COLUMNS FROM xf_user LIKE "sigpic_date"');
		if ($field)			
			$db->query('ALTER TABLE xf_user DROP sigpic_date');		
		
		return true;
	}
	
	public static function listenCp($class, array &$extend)
	{
		if ($class == 'XenForo_ControllerPublic_Account')
		{
			$extend[] = 'TPUSigPic_ControllerPublicAccount';
		}
	}
	
	public static function listenDw($class, array &$extend)
	{
		if ($class == 'XenForo_DataWriter_User')
		{
			$extend[] = 'TPUSigPic_DataWriterUser';
		}
	}
	
  public static function listenBb($class, array &$extend)
  {
    if ($class == 'XenForo_BbCode_Formatter_Base')
    {
        $extend[] = 'TPUSigPic_BbCodeFormatterBase';
    }
  }	
  
	public static function listenAdmin($class, array &$extend)
	{
		if ($class == 'XenForo_ControllerAdmin_User')
		{
			$extend[] = 'TPUSigPic_ControllerAdminUser';
		}
	}  
	
	public static function helperSigPic($user)
	{
		if ($user['sigpic_date']==0)
			return '';
			
		$group = floor($user['user_id'] / 1000);
		$src=XenForo_Application::$externalDataUrl . "/sigpics/$group/$user[user_id].jpg?$user[sigpic_date]";
		
		return "<img src=\"{$src}\" />";
	}
	
	public static function init(XenForo_Dependencies_Abstract $dependencies, array $data)
	{
		XenForo_Template_Helper_Core::$helperCallbacks += array(
			'sigpic' => array('TPUSigPic_Listener', 'helperSigPic')
		);
	}
}