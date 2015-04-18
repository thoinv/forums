<?php
class DigitalPointAdPositioning_Listener_LoadClassViewPublic_Thread
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointAdPositioning_ViewPublic_Thread_View';
	}
}