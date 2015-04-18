<?php
class DigitalPointUserMap_Listener_LoadClassControllerPublic_Member
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointUserMap_ControllerPublic_Member';
	}
}