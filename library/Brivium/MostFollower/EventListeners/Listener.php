<?php

class Brivium_MostFollower_EventListeners_Listener extends Brivium_BriviumLibrary_EventListeners
{
	public static function loadClassController($class, &$extend)
	{
		switch($class){
			case 'XenForo_ControllerPublic_Member':
				$extend[] = 'Brivium_MostFollower_ControllerPublic_Member';
				break;
		}
	}
	
	public static function loadClassModel($class, &$extend)
	{
		switch($class){
			case 'XenForo_Model_User':
				$extend[] = 'Brivium_MostFollower_Model_User';
				break;
		}
	}
	public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
		self::_templateHook($hookName, $contents, $hookParams, $template);
    }
}