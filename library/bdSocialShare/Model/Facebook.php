<?php

class bdSocialShare_Model_Facebook extends XenForo_Model
{
	const KEY_ACCOUNTS = 'bdSocialShare_fAs';

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

	public function publish($targetId, bdSocialShare_Shareable_Abstract $shareable, $accessToken)
	{
		try
		{
			$link = $shareable->getLink($this);
			$imageDataPath = $shareable->getImageDataPath($this);

			$userText = $shareable->getUserText($this);
			$title = $shareable->getTitle($this);
			$description = $shareable->getDescription($this);
			$image = $shareable->getImage($this);

			$userText = strval($userText);
			$title = strval($title);
			$description = strval($description);
			$sendLinkData = (bdSocialShare_Option::get('facebookSendLinkData') OR ($shareable instanceof bdSocialShare_Shareable_StaffShare));

			if ($sendLinkData AND !empty($imageDataPath))
			{
				// upload as a new photo in the app album
				$client = XenForo_Helper_Http::getClient(sprintf('https://graph.facebook.com/v2.0/%s/photos', $targetId));
				$client->setFileUpload($imageDataPath, 'source');

				$parts = array();

				if (!empty($title))
				{
					$parts[] = $title;
				}

				if (empty($parts))
				{
					if (!empty($description))
					{
						$parts[] = $description;
					}
				}

				if (!empty($link))
				{
					$parts[] = $link;
				}

				if (!empty($parts))
				{
					$client->setParameterPost('message', implode("\n", $parts));
				}
			}

			if (empty($client) AND !empty($link))
			{
				// publish as a link
				$client = XenForo_Helper_Http::getClient(sprintf('https://graph.facebook.com/v2.0/%s/feed', $targetId));
				$client->setParameterPost('link', $link);

				if ($sendLinkData AND !empty($title))
				{
					// send link data
					$client->setParameterPost('name', $title);

					if (!empty($image))
					{
						$client->setParameterPost('picture', $image);
					}

					if (!empty($description))
					{
						$client->setParameterPost('description', $description);
					}
				}

				if (!empty($userText))
				{
					$client->setParameterPost('message', $userText);
				}
			}

			if (empty($client) AND !empty($userText))
			{
				// publish as a status
				$client = XenForo_Helper_Http::getClient(sprintf('https://graph.facebook.com/v2.0/%s/feed', $targetId));

				if (!empty($link))
				{
					// merge user text and link
					$client->setParameterPost('message', sprintf('%s %s', $userText, $link));
				}
				else
				{
					$client->setParameterPost('message', $userText);
				}
			}

			if (empty($client))
			{
				return false;
			}

			$client->setParameterPost('access_token', $accessToken);
			$response = $client->request('POST');
			$responseBody = $response->getBody();
			$responseArray = json_decode($responseBody, true);

			if (isset($responseArray['id']))
			{
				return $responseArray;
			}
			else
			{
				throw new bdSocialShare_Exception_Interrupted($responseBody);
			}
		}
		catch (Zend_Http_Client_Exception $e)
		{
			throw new bdSocialShare_Exception_HttpClient($e->getMessage());
		}

		// MUST NOT REACH HERE!!!!
	}

}
