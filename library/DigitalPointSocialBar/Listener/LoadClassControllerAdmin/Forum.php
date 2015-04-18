<?php
class DigitalPointSocialBar_Listener_LoadClassControllerAdmin_Forum
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointSocialBar_ControllerAdmin_Forum';
	}
}