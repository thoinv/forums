<?php
class Sedo_MobileStyleSelector_Listener_ControllerPublic
{
	public static function listen($class, array &$extend)
	{
		if($class == 'XenForo_ControllerPublic_Misc')
		{
			$extend[] = 'Sedo_MobileStyleSelector_ControllerPublic_Misc';
		}
	}
}
//Zend_Debug::dump($class);