<?php
class DigitalPointAdPositioning_Listener_LoadClassControllerPublic_Conversation
{
	public static function loadClassListener($class, &$extend)
	{
		if (@$_COOKIE['as_username'] == 'google_adsense' && @$_COOKIE['as_password'] == XenForo_Application::getOptions()->dppa_adsense_password)
		{
			$extend[] = 'DigitalPointAdPositioning_ControllerPublic_Conversation';				
		}
	}
}