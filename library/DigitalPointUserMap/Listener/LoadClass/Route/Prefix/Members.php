<?php

class DigitalPointUserMap_Listener_LoadClass_Route_Prefix_Members
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointUserMap_Route_Prefix_Members';
	}
}