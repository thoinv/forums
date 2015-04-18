<?php

class EWRutiles_Sitemap_Listener_Params
{
    public static function params(array &$params, XenForo_Dependencies_Abstract $dependencies)
    {
		if (XenForo_Application::get('options')->EWRutiles_Sitemap_memberlist)
		{
			unset($params['tabs']['members']);
		}
    }
}