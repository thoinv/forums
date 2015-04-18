<?php
class DigitalPointBetterAnalytics_Listener_LoadClassMail
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_Mail';
	}
}