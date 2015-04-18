<?php
class DigitalPointBetterAnalytics_Listener_LoadClassDataWriter_User
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_DataWriter_User';
	}
}