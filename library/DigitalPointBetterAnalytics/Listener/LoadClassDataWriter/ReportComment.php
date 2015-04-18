<?php
class DigitalPointBetterAnalytics_Listener_LoadClassDataWriter_ReportComment
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_DataWriter_ReportComment';
	}
}