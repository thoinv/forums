<?php

class EWRutiles_Sitemap_Listener_Controller
{
    public static function controller($class, array &$extend)
    {
		switch ($class)
		{
			case 'XenForo_ControllerPublic_Member':
				if (XenForo_Application::get('options')->EWRutiles_Sitemap_memberlist)
				{
					$extend[] = 'EWRutiles_Sitemap_ControllerPublic_Member';
				}
				break;
		}
    }
}