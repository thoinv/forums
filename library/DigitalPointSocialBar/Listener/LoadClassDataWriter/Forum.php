<?php
class DigitalPointSocialBar_Listener_LoadClassDataWriter_Forum
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointSocialBar_DataWriter_Forum';
	}
}