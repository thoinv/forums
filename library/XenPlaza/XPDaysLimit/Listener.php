<?php

class XenPlaza_XPDaysLimit_Listener
{
	public static function loadClassListener($class, &$extend)
	{
		$classes = array(
			'ControllerPublic_Thread',
			'ControllerPublic_Forum',
		);
		foreach($classes AS $clas){
			if ($class == 'XenForo_' .$clas)
			{
				$extend[] = 'XenPlaza_XPDaysLimit_' .$clas;
			}
		}
	}
}