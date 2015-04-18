<?php
class DigitalPointBetterAnalytics_Listener_LoadClassControllerPublic_Misc
{
	public static function loadClassListener($class, &$extend)
	{
		if (strpos(@$_SERVER['REQUEST_URI'], '/a.js'))
		{
			$extend[] = 'DigitalPointBetterAnalytics_ControllerPublic_Misc';
		}
	}
}