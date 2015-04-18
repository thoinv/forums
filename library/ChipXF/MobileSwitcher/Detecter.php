<?php

class ChipXF_MobileSwitcher_Detecter {
	
	public static $isMobile = false;
	
	public static function isMobile()
	{
		if(XenForo_Visitor::isBrowsingWith('mobile'))
		{
			return true;
		}
		$options = XenForo_Application::getOptions();
		if($options->ChipXF_MS_MobileDetect AND !empty($_SERVER['HTTP_USER_AGENT'])) 
		{
			$mobileDetect = explode(',', $options->ChipXF_MS_MobileDetect);
			if (preg_match('/(' . implode('|', array_map('preg_quote', $mobileDetect)) . ')/i', strtolower($_SERVER['HTTP_USER_AGENT']), $match))
			{
				return $match[1];
			}
		}
		return false;
	}
}