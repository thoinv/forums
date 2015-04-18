<?php
class DigitalPointBetterAnalytics_Listener_LoadClass_StatsHandler_User
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_StatsHandler_User';
	}
}