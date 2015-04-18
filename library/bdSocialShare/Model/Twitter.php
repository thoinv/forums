<?php

class bdSocialShare_Model_Twitter extends XenForo_Model
{
	const KEY_ACCOUNTS = 'bdSocialShare_tAs';
	const SIMPLE_CACHE_DATA_KEY_SHORT_URL_LENGTH_HTTPS = 'bdSocialShare_sulh';

	public function getAccounts()
	{
		$accounts = $this->_getDataRegistryModel()->get(self::KEY_ACCOUNTS);

		if (empty($accounts))
		{
			$accounts = array();
		}

		return $accounts;
	}

	public function setAccounts($accounts)
	{
		$this->_getDataRegistryModel()->set(self::KEY_ACCOUNTS, $accounts);
	}

	public function publish($targetId, bdSocialShare_Shareable_Abstract $shareable, $token)
	{
		$statusText = false;

		$userText = $shareable->getUserText($this);
		$title = $shareable->getTitle($this);
		$description = $shareable->getDescription($this);

		$userText = strval($userText);
		$title = strval($title);
		$description = strval($description);

		if (!empty($userText))
		{
			$statusText = $userText;
		}

		if ($statusText === false)
		{
			if (!empty($title))
			{
				$statusText = $title;
			}

			if (!empty($description))
			{
				if (!empty($statusText))
				{
					$statusText .= ': ' . $description;
				}
				else
				{
					$statusText = $description;
				}
			}
		}

		$link = $shareable->getLink($this);
		if (!empty($link))
		{
			// minus short url length
			// minus one for the ellipsis character
			// minus another one for the space character
			$status = XenForo_Helper_String::wholeWordTrim($statusText, 140 - $this->getShortUrlLengthHttps($token) - 2, 0, '…') . ' ' . $link;
		}
		else
		{
			// minus one for the ellipsis character
			$status = XenForo_Helper_String::wholeWordTrim($statusText, 140 - 1, 0, '…');
		}

		$response = bdSocialShare_Helper_Twitter::statusesUpdate($token['oauth_token'], $token['oauth_token_secret'], $status);

		if (isset($response['id_str']))
		{
			return $response;
		}
		else
		{
			throw new bdSocialShare_Exception_Interrupted(serialize(array(
				$status,
				$response
			)));
		}
	}

	public function getShortUrlLengthHttps($token)
	{
		$data = XenForo_Application::getSimpleCacheData(self::SIMPLE_CACHE_DATA_KEY_SHORT_URL_LENGTH_HTTPS);

		if (empty($data) OR XenForo_Application::$time - $data['timestamp'] > 86400)
		{
			$response = bdSocialShare_Helper_Twitter::helpConfiguration($token['oauth_token'], $token['oauth_token_secret']);

			if (!empty($response['short_url_length_https']))
			{
				$data = array(
					'value' => $response['short_url_length_https'],
					'timestamp' => time(),
				);

				XenForo_Application::setSimpleCacheData(self::SIMPLE_CACHE_DATA_KEY_SHORT_URL_LENGTH_HTTPS, $data);
			}
			else
			{
				// for some reason we cannot get configuration from Twitter,
				// return our best guess then: as of September 13, 2014 it is 23
				return 30;
			}
		}

		return $data['value'];
	}

}
