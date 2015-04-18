<?php

class Turki_Adv_CronEntry_Cache
{
	public static function runCron()
	{
		$Model       = XenForo_Model::create('Turki_Adv_Model_View');
		$Advs        = $Model->getAllAdvHooks();
		$adv_xenforo = array(
			"AdvsHook" => $Advs
		);
		XenForo_Application::setSimpleCacheData('adv_xenforo', $adv_xenforo);
	}
}