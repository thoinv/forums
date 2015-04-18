<?php

class bdSocialShare_XenForo_ControllerPublic_Account extends XFCP_bdSocialShare_XenForo_ControllerPublic_Account
{
	public function actionPersonalDetailsSave()
	{
		$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_ACCOUNT_PERSONAL_DETAILS_SAVE] = $this;

		return parent::actionPersonalDetailsSave();
	}

	public function bdSocialShare_actionPersonalDetailsSave(XenForo_DataWriter_DiscussionMessage_ProfilePost $profilePostDw)
	{
		/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
		$helper->publishAsNeeded('status', new bdSocialShare_Shareable_Status($profilePostDw));

		unset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_ACCOUNT_PERSONAL_DETAILS_SAVE]);
	}

	public function actionPreferencesSave()
	{
		$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_ACCOUNT_PREFERENCES_SAVE] = $this;

		return parent::actionPreferencesSave();
	}

	public function bdSocialShare_actionPreferencesSave(XenForo_DataWriter_User $userDw)
	{
		$userDw->set('bdsocialshare_options', $this->_input->filterSingle('bdsocialshare_options', XenForo_Input::ARRAY_SIMPLE));

		unset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_ACCOUNT_PREFERENCES_SAVE]);
	}

	public function actionSocialShareRecovery()
	{
		/* @var $helper bdSocialShare_ControllerHelper_Recover */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_Recover');

		return $helper->attemptRecovery();
	}

	public function actionSocialShareDismiss()
	{
		/* @var $helper bdSocialShare_ControllerHelper_Recover */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_Recover');

		return $helper->dismissRecovery();
	}

	public function actionSocialShareFacebookTargets()
	{
		$input = $this->_input->filter(array(
			'me' => XenForo_Input::STRING,
			'pages' => XenForo_Input::STRING,
			'groups' => XenForo_Input::STRING,
		));

		$options = array(
			'me' => 1,
			'pages' => 1,
			'groups' => 0,
		);
		foreach ($input as $inputKey => $inputValue)
		{
			if ($inputValue !== '')
			{
				$options[$inputKey] = !empty($inputValue) ? 1 : 0;
			}
		}

		if (!empty($options['pages']))
		{
			$pages = $this->_getFacebookPagesOrGroups();
		}
		else
		{
			$pages = array();
		}

		if (!empty($options['groups']))
		{
			$groups = $this->_getFacebookPagesOrGroups(false);
		}
		else
		{
			$groups = array();
		}

		$viewParams = array(
			'options' => $options,

			'pages' => $pages,
			'groups' => $groups,
		);

		return $this->responseView('bdSocialShare_ViewPublic_Account_FacebookTargets', 'bdsocialshare_facebook_targets', $viewParams);
	}

	protected function _getFacebookPagesOrGroups($getPages = true)
	{
		$visitor = XenForo_Visitor::getInstance();

		$facebookUid = bdSocialShare_Helper_Common::getAuthId($visitor->toArray(), 'facebook');
		if (empty($facebookUid))
		{
			return false;
		}

		$auth = $this->getModelFromCache('XenForo_Model_UserExternal')->getExternalAuthAssociation('facebook', $facebookUid);
		if (empty($auth))
		{
			return false;
		}

		$extraData = bdSocialShare_Helper_Common::unserializeOrFalse($auth, 'extra_data');
		if (empty($extraData) OR empty($extraData['token']))
		{
			return false;
		}
		$accessToken = $extraData['token'];

		if ($getPages)
		{
			return bdSocialShare_Helper_Facebook::getPages($accessToken);
		}
		else
		{
			return bdSocialShare_Helper_Facebook::getGroups($accessToken);
		}
	}

}
