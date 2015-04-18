<?php
class DigitalPointBetterAnalytics_Listener_LoadClassDataWriter_Warning
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_DataWriter_Warning';
	}
}