<?php
class DigitalPointBetterAnalytics_Listener_LoadClassDataWriter_ConversationMess
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_DataWriter_ConversationMessage';
	}
}