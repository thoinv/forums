<?php
/*============================================================================*\
|| ########################################################################## ||
|| # ---------------------------------------------------------------------- # ||
|| # Copyright © 2014 Jim Dudek AKA Nhawk/Snog                              # ||
|| # Original vBulletin Code by BirdOPrey5 (BOP5)                           # ||
|| # Ported for XenForo use with permission from BirdOPrey5                 # ||
|| # All Rights Reserved.                                                   # ||
|| # This file may not be redistributed in whole or significant part.       # ||
|| # ---------------------------------------------------------------------- # ||
|| ########################################################################## ||
\*============================================================================*/

class Snog_DailyDoodle_Listener_Dependencies 
{
	public static function initDependencies(XenForo_Dependencies_Abstract $dependencies, array $data) 
	{
		XenForo_Template_Helper_Core::$helperCallbacks += array('doodle' => array('Snog_DailyDoodle_Helper_Doodle', 'helperDoodle'));
	}
}