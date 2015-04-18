<?php

if (!class_exists('TwitterOAuth'))
{
	require_once (dirname(__FILE__) . '/twitteroauth/twitteroauth.php');
}

class bdSocialShare_Helper_Twitter
{
	public static function getTokenAndSecretFromAuth(array $auth)
	{
		$extraData = bdSocialShare_Helper_Common::unserializeOrFalse($auth, 'extra_data');
		if (empty($extraData) OR empty($extraData['token']))
		{
			return false;
		}

		if (XenForo_Application::$versionId > 1030000)
		{
			// XenForo 1.3 stores token/secret diffrently from Social add-on
			$token = array(
				'oauth_token' => $extraData['token'],
				'oauth_token_secret' => $extraData['secret'],
				'user_id' => $auth['provider_key'],
				'screen_name' => sprintf('#%d', $auth['provider_key']),
			);
		}
		else
		{
			// Social add-on
			$token = $extraData['token'];
		}

		return $token;
	}

	public static function getAuthorizeUri($redirectUri)
	{
		list($consumerKey, $consumerSecret) = bdSocialShare_Option::getTwitterConsumerPair();
		$twitter = new TwitterOAuth($consumerKey, $consumerSecret);

		$requestToken = $twitter->getRequestToken($redirectUri);
		if (empty($requestToken['oauth_token']) OR empty($requestToken['oauth_token_secret']))
		{
			throw new XenForo_Exception('Twitter responded: ' . var_export($requestToken, true), false);
		}

		$oauthToken = $requestToken['oauth_token'];
		$oauthTokenSecret = $requestToken['oauth_token_secret'];

		return array(
			$twitter->getAuthorizeURL($oauthToken),
			$oauthToken,
			$oauthTokenSecret
		);
	}

	public static function getToken($oauthToken, $oauthTokenSecret, $oauthVerifier)
	{
		list($consumerKey, $consumerSecret) = bdSocialShare_Option::getTwitterConsumerPair();
		$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $oauthToken, $oauthTokenSecret);

		$token = $twitter->getAccessToken($oauthVerifier);

		return $token;
	}

	public static function accountVerifyCredentials($oauthToken, $oauthTokenSecret)
	{
		list($consumerKey, $consumerSecret) = bdSocialShare_Option::getTwitterConsumerPair();
		$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $oauthToken, $oauthTokenSecret);

		$response = $twitter->get('account/verify_credentials', array('skip_status' => 1));

		$responseArray = (array)$response;

		return $responseArray;
	}

	public static function statusesUpdate($oauthToken, $oauthTokenSecret, $status, array $extraData = array())
	{
		list($consumerKey, $consumerSecret) = bdSocialShare_Option::getTwitterConsumerPair();
		$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $oauthToken, $oauthTokenSecret);

		$response = $twitter->post('statuses/update', array_merge(array('status' => $status), $extraData));

		$responseArray = (array)$response;

		return $responseArray;
	}

	public static function helpConfiguration($oauthToken, $oauthTokenSecret)
	{
		list($consumerKey, $consumerSecret) = bdSocialShare_Option::getTwitterConsumerPair();
		$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $oauthToken, $oauthTokenSecret);

		$response = $twitter->get('help/configuration');

		$responseArray = (array)$response;

		return $responseArray;
	}

}
