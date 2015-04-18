<?php
class DigitalPointAdPositioning_Listener_LoadClassControllerPublic_Misc
{
	public static function loadClassListener($class, &$extend)
	{
		if (substr($_SERVER['REQUEST_URI'], -12) == 'adsense-auth')
		{
			$extend[] = 'DigitalPointAdPositioning_ControllerPublic_Misc';				
		}
	}
}