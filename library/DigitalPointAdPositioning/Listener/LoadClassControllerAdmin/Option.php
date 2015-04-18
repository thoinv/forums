<?php
class DigitalPointAdPositioning_Listener_LoadClassControllerAdmin_Option
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointAdPositioning_ControllerAdmin_Option';
	}
}