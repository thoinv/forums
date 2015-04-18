<?php
class DigitalPointBetterAnalytics_Listener_LoadClassControllerPublic_Member
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_ControllerPublic_Member';
	}
}