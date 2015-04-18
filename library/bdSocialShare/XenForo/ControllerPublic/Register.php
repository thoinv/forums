<?php

class bdSocialShare_XenForo_ControllerPublic_Register extends XFCP_bdSocialShare_XenForo_ControllerPublic_Register
{
	protected $_bdSocialShare_facebookUpdated = false;
	protected $_bdSocialShare_twitterUpdated = false;

	public function actionFacebook()
	{
		/* @var $helper bdSocialShare_ControllerHelper_Recover */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_Recover');
		$visitorUserId = XenForo_Visitor::getUserId();
		$recovery = $helper->loadRecoveryData();

		$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_REGISTER_FACEBOOK] = $this;

		$response = parent::actionFacebook();

		if ($this->_bdSocialShare_facebookUpdated)
		{
			// same user id, try to recover if possible
			if (XenForo_Visitor::getUserId() == $visitorUserId)
			{
				$helper->recover('facebook', $recovery);
			}
		}
		elseif ($response instanceof XenForo_ControllerResponse_Redirect)
		{
			$redirectTarget = $response->redirectTarget;

			if ($this->_input->filterSingle('publish_actions', XenForo_Input::UINT))
			{
				$redirectTarget = str_replace('&scope=', '&scope=publish_actions,', $redirectTarget);
			}

			if ($this->_input->filterSingle('manage_pages', XenForo_Input::UINT))
			{
				$redirectTarget = str_replace('&scope=', '&scope=manage_pages,', $redirectTarget);
			}

			if ($this->_input->filterSingle('user_groups', XenForo_Input::UINT))
			{
				$redirectTarget = str_replace('&scope=', '&scope=user_groups,', $redirectTarget);
			}

			$response->redirectTarget = $redirectTarget;
		}

		return $response;
	}

	public function actionTwitter()
	{
		/* @var $helper bdSocialShare_ControllerHelper_Recover */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_Recover');
		$visitorUserId = XenForo_Visitor::getUserId();
		$recovery = $helper->loadRecoveryData();

		$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_REGISTER_TWITTER] = $this;

		$response = parent::actionTwitter();

		if ($this->_bdSocialShare_twitterUpdated)
		{
			// same user id, try to recover if possible
			if (XenForo_Visitor::getUserId() == $visitorUserId)
			{
				$helper->recover('twitter', $recovery);
			}
		}

		return $response;
	}

	public function bdSocialShare_actionFacebook(XenForo_Model_UserExternal $model)
	{
		$this->_bdSocialShare_facebookUpdated = true;

		unset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_REGISTER_FACEBOOK]);
	}

	public function bdSocialShare_actionTwitter(XenForo_Model_UserExternal $model)
	{
		$this->_bdSocialShare_twitterUpdated = true;

		unset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_REGISTER_TWITTER]);
	}

}
