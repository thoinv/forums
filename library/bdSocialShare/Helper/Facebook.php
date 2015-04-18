<?php

class bdSocialShare_Helper_Facebook
{
	public static function getPages($accessToken)
	{
		try
		{
			$client = XenForo_Helper_Http::getClient('https://graph.facebook.com/v2.0/me/accounts');
			$client->setParameterGet('access_token', $accessToken);

			$response = $client->request('GET');
			$jsonDecoded = json_decode($response->getBody(), true);

			if (!empty($jsonDecoded['data']))
			{
				$pages = array();

				foreach ($jsonDecoded['data'] as $entry)
				{
					$pages[$entry['id']] = array(
						'name' => $entry['name'],
						'target_id' => bdSocialShare_Helper_Common::encryptTargetId($entry['name'], array(
							'targetId' => $entry['id'],
							'accessToken' => $entry['access_token'],
							'type' => 'page',
						)),
					);
				}

				return $pages;
			}
		}
		catch (Zend_Http_Client_Exception $e)
		{
			if (XenForo_Application::debugMode())
			{
				XenForo_Error::logException($e, false);
			}
		}

		return false;
	}

	public static function getGroups($accessToken)
	{
		try
		{
			$client = XenForo_Helper_Http::getClient('https://graph.facebook.com/v2.0/me/groups');
			$client->setParameterGet('access_token', $accessToken);

			$response = $client->request('GET');
			$jsonDecoded = json_decode($response->getBody(), true);

			if (!empty($jsonDecoded['data']))
			{
				$groups = array();

				foreach ($jsonDecoded['data'] as $entry)
				{
					$groups[$entry['id']] = array(
						'name' => $entry['name'],
						'target_id' => bdSocialShare_Helper_Common::encryptTargetId($entry['name'], array(
							'targetId' => $entry['id'],
							'accessToken' => $accessToken,
							'type' => 'group',
						)),
					);
				}

				return $groups;
			}
		}
		catch (Zend_Http_Client_Exception $e)
		{
			if (XenForo_Application::debugMode())
			{
				XenForo_Error::logException($e, false);
			}
		}

		return false;
	}

}
