<?php
class DigitalPointBetterAnalytics_Listener_LoadClassDataWriter_DiscMess_Post
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_DataWriter_DiscussionMessage_Post';
	}
}