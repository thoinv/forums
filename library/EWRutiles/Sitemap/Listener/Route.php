<?php

class EWRutiles_Sitemap_Listener_Route
{
    public static function route($class, array &$extend)
    {
		if (XenForo_Application::get('options')->EWRutiles_Sitemap_memberlist)
		{
			switch ($class)
			{
				case 'XenForo_Route_Prefix_Members':			$extend[] = 'EWRutiles_Sitemap_Route_Members';			break;
				case 'XenForo_Route_Prefix_Online':				$extend[] = 'EWRutiles_Sitemap_Route_Online';			break;
				case 'XenForo_Route_Prefix_ProfilePosts':		$extend[] = 'EWRutiles_Sitemap_Route_ProfilePosts';		break;
				case 'XenForo_Route_Prefix_RecentActivity':		$extend[] = 'EWRutiles_Sitemap_Route_RecentActivity';	break;
				case 'XenForo_Route_Prefix_SpamCleaner':		$extend[] = 'EWRutiles_Sitemap_Route_SpamCleaner';		break;
				case 'XenForo_Route_Prefix_Warnings':			$extend[] = 'EWRutiles_Sitemap_Route_Warning';			break;
			}
		}
    }
}