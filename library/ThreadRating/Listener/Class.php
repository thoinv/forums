<?php

class ThreadRating_Listener_Class
{
	public static function load_class_controller($class, array &$extend)
	{
		if ($class == 'XenForo_ControllerPublic_Thread')
		{
			$extend[] = 'ThreadRating_ControllerPublic_Thread';
		}
		
		if ($class == 'XenForo_ControllerPublic_Forum')
		{
			$extend[] = 'ThreadRating_ControllerPublic_Forum';
		}
	}
	
	public static function load_class_model($class, array &$extend)
	{
		if ($class == 'XenForo_Model_Thread')
		{
			$extend[] = 'ThreadRating_Model_Thread';
		}
	}
}