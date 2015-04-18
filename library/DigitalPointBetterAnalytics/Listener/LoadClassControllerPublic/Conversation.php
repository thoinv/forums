<?php
class DigitalPointBetterAnalytics_Listener_LoadClassControllerPublic_Conversation
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointBetterAnalytics_ControllerPublic_Conversation';
	}
}