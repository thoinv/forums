<?php

class DigitalPointUserMap_Install
{
	public static function install($addOnData)
	{
		if (XenForo_Application::$versionId < 1030070)
		{
			throw new XenForo_Exception('Digital Point User Map requires XenForo 1.3.0 or newer.', true);
		}
	}
	
	public static function uninstall($addOnData)
	{
		XenForo_Model::create('XenForo_Model_DataRegistry')->delete('userMap');
	}
}