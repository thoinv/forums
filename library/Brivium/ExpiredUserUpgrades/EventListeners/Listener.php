<?php

class Brivium_ExpiredUserUpgrades_EventListeners_Listener
{
	public static function loadClassController($class, &$extend)
	{
		$classes = array(
			'ControllerAdmin_UserUpgrade',
		);
		foreach($classes AS $clas){if ($class == 'XenForo_' .$clas){$extend[] = 'Brivium_ExpiredUserUpgrades_' .$clas;}}
	}
}