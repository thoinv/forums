<?php
class DigitalPointBetterAnalytics_Listener_LoadClassModel_UserUpgrade
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_Model_UserUpgrade';
	}
}