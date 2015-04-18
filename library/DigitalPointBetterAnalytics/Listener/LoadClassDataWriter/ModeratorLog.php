<?php
class DigitalPointBetterAnalytics_Listener_LoadClassDataWriter_ModeratorLog
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_DataWriter_ModeratorLog';
	}
}