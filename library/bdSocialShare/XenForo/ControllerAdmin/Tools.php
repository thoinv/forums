<?php

class bdSocialShare_XenForo_ControllerAdmin_Tools extends XFCP_bdSocialShare_XenForo_ControllerAdmin_Tools
{
	const SESSION_KEY_TWITTER_OAUTH_TOKEN_PREFIX = '_bdSocialShare_twitterOauthToken_';

	public function actionSocialShareAddMoreFacebook()
	{
		$this->assertAdminPermission('option');

		if (!bdSocialShare_Option::hasPermissionFacebook())
		{
			return $this->responseError(new XenForo_Phrase('bdsocialshare_facebook_must_be_configured'));
		}

		$inputToken = $this->_input->filterSingle('token', XenForo_Input::STRING);

		/* @var $facebookModel bdSocialShare_Model_Facebook */
		$facebookModel = $this->getModelFromCache('bdSocialShare_Model_Facebook');
		$existingAccounts = $facebookModel->getAccounts();

		if (empty($inputToken))
		{
			$inputCode = $this->_input->filterSingle('code', XenForo_Input::STRING);
			$redirectUri = XenForo_Link::buildAdminLink('full:tools/social-share/add-more/facebook');

			if (empty($inputCode))
			{
				$requestUrl = XenForo_Helper_Facebook::getFacebookRequestUrl($redirectUri);
				$requestUrl = preg_replace('#&scope=#', '$0publish_actions,manage_pages,user_groups,', $requestUrl);

				return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $requestUrl);
			}

			$token = XenForo_Helper_Facebook::getAccessTokenFromCode($inputCode, $redirectUri);
			$fbError = XenForo_Helper_Facebook::getFacebookRequestErrorInfo($token, 'access_token');
			if (!empty($fbError))
			{
				return $this->responseError($fbError);
			}
			$fbToken = $token['access_token'];
		}
		else
		{
			$fbToken = $inputToken;
		}

		if ($this->isConfirmedPost())
		{
			$accounts = $this->_input->filterSingle('accounts', XenForo_Input::ARRAY_SIMPLE);
			$newAccounts = $existingAccounts;

			foreach ($accounts as $accountId => $account)
			{
				if (!empty($account['add']))
				{
					$newAccounts[$accountId] = $account;
				}
				elseif (isset($newAccounts[$accountId]))
				{
					unset($newAccounts[$accountId]);
				}
			}

			$facebookModel->setAccounts($newAccounts);

			return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, XenForo_Link::buildAdminLink('tools/social-share/facebook-targets'));
		}

		$fbUser = XenForo_Helper_Facebook::getUserInfo($fbToken);
		$fbError = XenForo_Helper_Facebook::getFacebookRequestErrorInfo($fbUser, 'id');
		if (!empty($fbError))
		{
			return $this->responseError($fbError);
		}

		$accounts = array();

		$accounts[$fbUser['id']] = array(
			'target_id' => bdSocialShare_Helper_Common::encryptTargetId($fbUser['name'], $fbToken),
			'name' => $fbUser['name'],
			'label' => new XenForo_Phrase('bdsocialshare_your_facebook_timeline'),
		);

		$pages = bdSocialShare_Helper_Facebook::getPages($fbToken);
		if (!empty($pages))
		{
			foreach ($pages as $pageId => $page)
			{
				$accounts[$pageId] = $page;
				$accounts[$pageId]['label'] = new XenForo_Phrase('bdsocialshare_facebook_page');
			}
		}

		$groups = bdSocialShare_Helper_Facebook::getGroups($fbToken);
		if (!empty($groups))
		{
			foreach ($groups as $groupId => $group)
			{
				$accounts[$groupId] = $group;
				$accounts[$groupId]['label'] = new XenForo_Phrase('bdsocialshare_facebook_group');
			}
		}

		foreach ($accounts as $accountId => &$accountRef)
		{
			if (isset($existingAccounts[$accountId]))
			{
				$accountRef['selected'] = 1;
			}
		}

		$viewParams = array(
			'type' => 'facebook',
			'token' => $fbToken,
			'accounts' => $accounts,
		);

		return $this->responseView('bdSocialShare_ViewAdmin_Tools_AddMore', 'bdsocialshare_tools_add_more', $viewParams);
	}

	public function actionSocialShareFacebookTargets()
	{
		$this->assertAdminPermission('option');

		if (!bdSocialShare_Option::hasPermissionFacebook())
		{
			return $this->responseError(new XenForo_Phrase('bdsocialshare_facebook_must_be_configured'));
		}

		$viewParams = array(
			'type' => 'facebook',
			'accounts' => $this->getModelFromCache('bdSocialShare_Model_Facebook')->getAccounts()
		);

		return $this->responseView('bdSocialShare_ViewAdmin_Tools_Targets', 'bdsocialshare_tools_targets', $viewParams);
	}

	public function actionSocialShareAddMoreTwitter()
	{
		$this->assertAdminPermission('option');

		if (!bdSocialShare_Option::hasPermissionTwitter())
		{
			return $this->responseError(new XenForo_Phrase('bdsocialshare_twitter_must_be_configured'));
		}

		$inputToken = $this->_input->filterSingle('token', XenForo_Input::STRING);

		/* @var $twitterModel bdSocialShare_Model_Twitter */
		$twitterModel = $this->getModelFromCache('bdSocialShare_Model_Twitter');
		$existingAccounts = $twitterModel->getAccounts();

		if (empty($inputToken))
		{
			$inputOauthToken = $this->_input->filterSingle('oauth_token', XenForo_Input::STRING);
			$oauthVerifier = $this->_input->filterSingle('oauth_verifier', XenForo_Input::STRING);
			$session = XenForo_Application::getSession();

			if (empty($inputOauthToken) OR empty($oauthVerifier))
			{
				$redirectUri = XenForo_Link::buildAdminLink('full:tools/social-share/add-more/twitter');

				list($authorizeUri, $oauthToken, $oauthTokenSecret) = bdSocialShare_Helper_Twitter::getAuthorizeUri($redirectUri);

				$session->set(self::SESSION_KEY_TWITTER_OAUTH_TOKEN_PREFIX . $oauthToken, $oauthTokenSecret);

				return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $authorizeUri);
			}

			if (!$session->isRegistered(self::SESSION_KEY_TWITTER_OAUTH_TOKEN_PREFIX . $inputOauthToken))
			{
				return $this->responseNoPermission();
			}
			$sessionOauthTokenSecret = $session->get(self::SESSION_KEY_TWITTER_OAUTH_TOKEN_PREFIX . $inputOauthToken);
			$session->delete(self::SESSION_KEY_TWITTER_OAUTH_TOKEN_PREFIX . $inputOauthToken);

			$token = bdSocialShare_Helper_Twitter::getToken($inputOauthToken, $sessionOauthTokenSecret, $oauthVerifier);

			if (empty($token))
			{
				return $this->responseNoPermission();
			}
		}
		else
		{
			$token = unserialize($inputToken);
		}

		if ($this->isConfirmedPost())
		{
			$accounts = $this->_input->filterSingle('accounts', XenForo_Input::ARRAY_SIMPLE);
			$newAccounts = $existingAccounts;

			foreach ($accounts as $accountId => $account)
			{
				if (!empty($account['add']))
				{
					$newAccounts[$accountId] = $account;
				}
				elseif (isset($newAccounts[$accountId]))
				{
					unset($newAccounts[$accountId]);
				}
			}

			$twitterModel->setAccounts($newAccounts);

			return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, XenForo_Link::buildAdminLink('tools/social-share/twitter-targets'));
		}

		$accounts = array();
		$accounts[$token['user_id']] = array(
			'target_id' => bdSocialShare_Helper_Common::encryptTargetId($token['screen_name'], $token),
			'name' => $token['screen_name'],
			'selected' => isset($existingAccounts[$token['user_id']]),
		);

		$viewParams = array(
			'type' => 'twitter',
			'token' => serialize($token),
			'accounts' => $accounts,
		);

		return $this->responseView('bdSocialShare_ViewAdmin_Tools_AddMore', 'bdsocialshare_tools_add_more', $viewParams);
	}

	public function actionSocialShareTwitterTargets()
	{
		$this->assertAdminPermission('option');

		if (!bdSocialShare_Option::hasPermissionTwitter())
		{
			return $this->responseError(new XenForo_Phrase('bdsocialshare_twitter_must_be_configured'));
		}

		$viewParams = array(
			'type' => 'twitter',
			'accounts' => $this->getModelFromCache('bdSocialShare_Model_Twitter')->getAccounts()
		);

		return $this->responseView('bdSocialShare_ViewAdmin_Tools_Targets', 'bdsocialshare_tools_targets', $viewParams);
	}

	public function actionSocialShareTestFacebook()
	{
		$this->assertAdminPermission('option');
		$targetId = $this->_input->filterSingle('targetId', XenForo_Input::STRING);

		$targetIdParsed = bdSocialShare_Helper_Common::parseTargetId($targetId);
		if (!empty($targetIdParsed))
		{
			if (!empty($targetIdParsed['targetId']))
			{
				$targetId = $targetIdParsed['targetId'];
			}

			if (!empty($targetIdParsed['accessToken']))
			{
				$accessToken = $targetIdParsed['accessToken'];
			}
		}

		if (empty($accessToken))
		{
			return $this->responseNoPermission();
		}

		$targetInfo = XenForo_Helper_Facebook::getUserInfo($accessToken, $targetId);

		if (!empty($targetInfo['link']))
		{
			$link = $targetInfo['link'];
		}
		elseif (!empty($targetInfo['id']))
		{
			$link = sprintf('https://www.facebook.com/%s', $targetInfo['id']);
		}
		else
		{
			throw new bdSocialShare_Exception_Interrupted(serialize($targetInfo));
		}

		return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $link);
	}

	public function actionSocialShareTestTwitter()
	{
		$this->assertAdminPermission('option');
		$targetId = $this->_input->filterSingle('targetId', XenForo_Input::STRING);

		$targetIdParsed = bdSocialShare_Helper_Common::parseTargetId($targetId);
		if (!empty($targetIdParsed))
		{
			$token = $targetIdParsed;
		}
		else
		{
			return $this->responseNoPermission();
		}

		$targetInfo = bdSocialShare_Helper_Twitter::accountVerifyCredentials($token['oauth_token'], $token['oauth_token_secret']);

		if (!empty($targetInfo['screen_name']))
		{
			$link = sprintf('https://twitter.com/%s', $targetInfo['screen_name']);
		}
		else
		{
			throw new bdSocialShare_Exception_Interrupted(serialize($targetInfo));
		}

		return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $link);
	}

}
