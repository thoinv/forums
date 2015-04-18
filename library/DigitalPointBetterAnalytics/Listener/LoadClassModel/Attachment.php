<?php
class DigitalPointBetterAnalytics_Listener_LoadClassModel_Attachment
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_Model_Attachment';
	}
}