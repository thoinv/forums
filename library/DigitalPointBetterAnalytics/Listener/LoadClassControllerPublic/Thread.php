<?php
class DigitalPointBetterAnalytics_Listener_LoadClassControllerPublic_Thread
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_ControllerPublic_Thread';
	}
}