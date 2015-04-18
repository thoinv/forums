<?php

class DigitalPointAdPositioning_Callback_AdBelowPost
{
	public static function renderAd($contents, $params, $template)
	{		
		if (isset($GLOBALS['showAdUnderPostCounter']))
		{
			$return = '';
			
			if (isset($GLOBALS['fc']))
			{
				$options = XenForo_Application::getOptions();
				
				if ($GLOBALS['fc']->route()->getControllerName() === 'XenForo_ControllerPublic_Thread')
				{
					$post = array_slice($template->getParam('posts'), $GLOBALS['showAdUnderPostCounter'], 1);
								
					if (@$post['0']['showAdUnderPost'])
					{
						if (!@$GLOBALS['adsenseRestrict'] || !strpos($options->dppa_afterpost_html, 'pagead2.googlesyndication.com'))
						{
							$return = '<div class="underPost" style="padding-top:30px;text-align:center">' . (isset($params['dp_ads']['adBottom']) ? $params['dp_ads']['adBottom'] : $options->dppa_afterpost_html) . '</div>';
						}
						unset($GLOBALS['showAdUnderPostCounter']);
					}
					else
					{
						$GLOBALS['showAdUnderPostCounter']++;
					}
					unset($post);
				}
				elseif ($options->dppa_aftermessage)
				{
					$messages = $template->getParam('messages');						
					$message = array_slice($messages, $GLOBALS['showAdUnderPostCounter'], 1);

					if (@$message[0]['showAdUnderPost'] || count($messages) == ($GLOBALS['showAdUnderPostCounter'] + 1))
					{
						if (!@$GLOBALS['adsenseRestrict'] || !strpos($options->dppa_aftermessage_html, 'pagead2.googlesyndication.com'))
						{
							$return = '<div class="underPost" style="padding-top:10px;text-align:center;clear:both">' . (isset($params['dp_ads']['adMiddle']) ? $params['dp_ads']['adMiddle'] : $options->dppa_aftermessage_html) . '</div>';
						}
						unset($GLOBALS['showAdUnderPostCounter']);
					}
					else
					{
						$GLOBALS['showAdUnderPostCounter']++;
					}
					unset($messages, $message);
				}
			}
			
			return $return;
		}
	}
	
	// maybe
	public static function renderAdCounterAdvance($contents, $params, $template)
	{
		if (isset($GLOBALS['showAdUnderPostCounter']))
		{
			$GLOBALS['showAdUnderPostCounter']++;
		}
	}
}