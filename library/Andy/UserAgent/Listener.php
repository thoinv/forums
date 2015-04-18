<?php

class Andy_UserAgent_Listener
{
	public static function Forum($class, array &$extend)
	{
		$extend[] = 'Andy_UserAgent_ControllerPublic_Forum';
	}
	
	public static function Thread($class, array &$extend)
	{
		$extend[] = 'Andy_UserAgent_ControllerPublic_Thread';
	}		
}