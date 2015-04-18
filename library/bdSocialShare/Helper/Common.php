<?php

class bdSocialShare_Helper_Common
{
	public static function encryptTargetId($key, $data)
	{
		return sprintf('%s,encrypted,%s', $key, bdSocialShare_Crypt::encrypt(json_encode($data), $key));
	}

	public static function parseTargetId($targetId)
	{
		if (preg_match('/^(.+),encrypted,(.+)$/', $targetId, $matches))
		{
			$key = $matches[1];
			$data = $matches[2];

			$decrypted = bdSocialShare_Crypt::decrypt($data, $key);
			if (!empty($decrypted))
			{
				$jsonDecoded = json_decode($decrypted, true);
				if ($jsonDecoded !== null)
				{
					return $jsonDecoded;
				}
			}
		}

		return false;
	}

	public static function unserializeOrFalse($data, $key = false)
	{
		if ($key !== false)
		{
			if (!isset($data[$key]))
			{
				return false;
			}
			$data = $data[$key];
		}

		return @unserialize($data);
	}

	public static function getOptInOptOutOffEffectiveValue($systemOptionId, $visitorOptionsOfTarget)
	{
		if (isset($visitorOptionsOfTarget[$systemOptionId]))
		{
			return $visitorOptionsOfTarget[$systemOptionId];
		}
		else
		{
			if (bdSocialShare_Option::get($systemOptionId) == 'optOut')
			{
				return '1';
			}
			else
			{
				return '';
			}
		}
	}

	public static function getOptInOptOutOffTargets($systemOptionId, $visitorOptions, $supportedTargets)
	{
		$targets = array();

		foreach ($supportedTargets as $supportedTarget)
		{
			$visitorOptionsOfTarget = array();
			if (!empty($visitorOptions) AND !empty($visitorOptions[$supportedTarget]))
			{
				$visitorOptionsOfTarget = $visitorOptions[$supportedTarget];
			}

			$effectiveValue = self::getOptInOptOutOffEffectiveValue($systemOptionId, $visitorOptionsOfTarget);
			if (!empty($effectiveValue))
			{
				$targets[$supportedTarget] = $effectiveValue;
			}
		}

		return $targets;
	}

	public static function getAuthId(array $viewingUser, $provider)
	{
		if (XenForo_Application::$versionId > 1030000)
		{
			// since XenForo 1.3.0, auth ids are stored in xf_user_profile.external_auth
			// serialized array, with provider as the key
			if (!empty($viewingUser['external_auth']))
			{
				$externalAuth = self::unserializeOrFalse($viewingUser, 'external_auth');
				if (!empty($externalAuth[$provider]))
				{
					return $externalAuth[$provider];
				}
			}
		}
		else
		{
			// in older versions, auth ids are stored separatedly in xf_user_profile.facebook_auth_id
			// the Social add-on stores its ids in similar xf_user_profile.twitter_auth_id
			$key = sprintf('%s_auth_id', $provider);
			if (!empty($viewingUser[$key]))
			{
				return $viewingUser[$key];
			}
		}
		
		return false;
	}

}
