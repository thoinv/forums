<?php

/**
 * Cron jobs for recurring scheduled tasks.
 */
class DigitalPointSocialBar_CronEntry_SocialBar
{
	public static function runOften()
	{
		$feeds = XenForo_Model::create('DigitalPointSocialBar_Model_SocialBar')->getSlugsFromOptions();

		shuffle($feeds); // randomize order in case someone has absurd number of lists attached to forums (would need to be more than 180 unique) to work around Twitter API limits

		$cacheObject = XenForo_Application::getCache();

		$twitter = DigitalPointSocialBar_Helper_Twitter::getService(XenForo_Application::getOptions()->dpTwitterAccessToken, XenForo_Application::getOptions()->dpTwitterAccessTokenSecret, XenForo_Application::getOptions()->dpTwitterUsername);

		// forum specific feeds
		if ($feeds)
		{
			foreach ($feeds as $slug)
			{
				$tweets_array = array();
				$results = $twitter->listsStatuses(array(
					'slug' => $slug,
					'owner_screen_name' => XenForo_Application::getOptions()->dpTwitterUsername,
					'count' => 250,
					'include_rts' => 1,
					'include_entities' => 1
				));

				if (count($results))
				{
					try
					{
						for ($i = 0; $i < count($results); $i++)
						{
							$tweet = $results[$i];
							if (is_object($tweet->user))
							{
								$screen_name = $tweet->user->screen_name;

								if (!@isset($tweets_array[$screen_name]))
								{
									$tweets_array[$screen_name] = DigitalPointSocialBar_Helper_Twitter::parseTweet($tweet);
								}
							}
						}
						$cacheObject->save(json_encode(array_values($tweets_array)), 'social_bar_' . str_replace('-', '_', $slug), array(), 604800); // 7 day cache
					}
					catch(Exception $e)
					{

					}
				}
			}
		}
	}
}