<?php

class DigitalPointSocialBar_Helper_Twitter
{
	/**
	 * Gets the Twitter service object for a token
	 *
	 * @param string|Zend_Oauth_Token_Access $token Access token object or access token string
	 * @param null|string $secret Access token secret if token is provided as string
	 *
	 * @return Zend_Service_Twitter
	 */
	public static function getService($token, $secret, $username = '')
	{
		$options = XenForo_Application::getOptions();

		if ($token instanceof Zend_Oauth_Token_Access)
		{
			$accessToken = $token;
		}
		else
		{
			$accessToken = new Zend_Oauth_Token_Access();
			$accessToken->setToken($token);
			$accessToken->setTokenSecret($secret);
		}

		return new DigitalPointSocialBar_Service_Twitter(array(
			'username' => $username,
			'accessToken' => $accessToken,
			'oauthOptions' => array(
				'consumerKey' => trim($options->dpTwitterAppKey),
				'consumerSecret' => trim($options->twitterAppSecret),
			)
		));
	}


	public static function parseTweet($tweet)
	{

		$text = (string)$tweet->text;

		$entities = array();

		if (isset($tweet->entities->user_mentions) && count($tweet->entities->user_mentions))
		{
			foreach ($tweet->entities->user_mentions as $item)
			{
				$entities[(int)$item->indices[0]] = array($item, 'user_mention');
			}
		}
		if (isset($tweet->entities->urls) && count((array)$tweet->entities->urls))
		{
			foreach ($tweet->entities->urls as $item)
			{
				$entities[(int)$item->indices[0]] = array($item, 'url');
			}
		}
		if (isset($tweet->entities->hashtags) && count((array)$tweet->entities->hashtags))
		{
			foreach ($tweet->entities->hashtags as $item)
			{
				$entities[(int)$item->indices[0]] = array($item, 'hashtag');
			}
		}
		if (isset($tweet->entities->media) && count((array)$tweet->entities->media))
		{
			foreach ($tweet->entities->media as $item)
			{
				$entities[(int)$item->indices[0]] = array($item, 'media');
			}
		}

		if (count($entities))
		{
			krsort($entities);

			foreach($entities as $entity)
			{
				self::$entity[1]($tweet, $text, $entity[0]);
			}
		}

		return array('o' => (string)$tweet->text, 's' => (string)$tweet->id, 'n' => (string)@$tweet->user->name, 'u' => (string)@$tweet->user->screen_name, 'i' => (string)@$tweet->user->profile_image_url_https, 't' => $text, 'd' => strtotime($tweet->created_at));
	}


	private static function user_mention($tweet, &$text, $item)
	{
		$text = self::_subReplace($text, '<a href="https://twitter.com/' . $item->screen_name . '" target="_blank" title="' . $item->name . '" class="tweetMention"><s>@</s><b>' . $item->screen_name . '</b></a>', (int)$item->indices[0], (int)$item->indices[1] - (int)$item->indices[0]);
	}
	private static function url($tweet, &$text, $item)
	{
		$text = self::_subReplace($text, '<a href="' . $item->url . '" target="_blank" class="externalLink">' . $item->display_url . '</a>', (int)$item->indices[0], (int)$item->indices[1] - (int)$item->indices[0]);
	}
	private static function hashtag($tweet, &$text, $item)
	{
		$text = self::_subReplace($text, '<a href="https://twitter.com/#!/search?q=%23' . $item->text . '" target="_blank" class="tweetMention"><s>#</s><b>' . $item->text . '</b></a>', (int)$item->indices[0], (int)$item->indices[1] - (int)$item->indices[0]);
	}

	private static function media($tweet, &$text, $item)
	{
		$text = self::_subReplace($text, '<a href="' . $item->url . '" target="_blank" class="externalLink">' . $item->display_url . '</a>', (int)$item->indices[0], (int)$item->indices[1] - (int)$item->indices[0]);
	}


	// UTF-8 aware str_replace
	private static function _subReplace($str, $repl, $start, $length = null)
	{
		preg_match_all('/./us', $str, $ar);
		preg_match_all('/./us', $repl, $rar);

		$length = is_int($length) ? $length : strlen($str);

		array_splice($ar[0], $start, $length, $rar[0]);

		return implode($ar[0]);
	}


}