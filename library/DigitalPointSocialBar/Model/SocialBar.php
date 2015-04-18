<?php

class DigitalPointSocialBar_Model_SocialBar extends XenForo_Model
{

	public static function getTwitterService()
	{
		return DigitalPointSocialBar_Helper_Twitter::getService(XenForo_Application::getOptions()->dpTwitterAccessToken, XenForo_Application::getOptions()->dpTwitterAccessTokenSecret, XenForo_Application::getOptions()->dpTwitterUsername);
	}


	public function getSlugsFromList()
	{
		$cache = XenForo_Application::getCache();

		if ($cache)
		{
			$cacheKey = 'social_ownership_list_slugs';
			if ($slugs = @unserialize($cache->load($cacheKey, true)))
			{
				return $slugs;
			}
		}

		$twitter = self::getTwitterService();

		$results = $twitter->listsOwnerships(array(
			'count' => 100,
			'screen_name' => XenForo_Application::getOptions()->dpTwitterUsername,
		));

		$slugs = array();
		if (@$results->lists)
		{
			foreach($results->lists as $list)
			{
				$slugs[$list->slug] = $list->name;
			}
		}

		if ($cache)
		{
			$cache->save(serialize($slugs), $cacheKey, array(), 90); // 90 second cache
		}

		return $slugs;
	}

	public function getSlugsFromOptions()
	{
		$forums = XenForo_Model::create('XenForo_Model_Forum')->getForums();
		$slugs = array();
		if ($forums)
		{
			foreach($forums as $forum)
			{
				if ($forum['dp_twitter_slug'])
				{
					$slugs[$forum['dp_twitter_slug']] = true;
				}
			}
		}

		if (XenForo_Application::getOptions()->dpTwitterDefaultList)
		{
			$slugs[XenForo_Application::getOptions()->dpTwitterDefaultList] = true;
		}

		return array_keys($slugs);
	}

}