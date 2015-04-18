<?php

class bdSocialShare_XenForo_ControllerPublic_Misc extends XFCP_bdSocialShare_XenForo_ControllerPublic_Misc
{
	public function actionStaffShare()
	{
		$visitor = XenForo_Visitor::getInstance();
		if (!$visitor->hasPermission('general', 'bdSocialShare_staffShare'))
		{
			return $this->responseNoPermission();
		}

		$url = $this->_input->filterSingle('url', XenForo_Input::STRING);
		if (empty($url))
		{
			return $this->responseView('bdSocialShare_ViewPublic_Misc_StaffShare_UrlForm', 'bdsocialshare_staff_share_url_form');
		}

		$request = new Zend_Controller_Request_Http($url);
		$request->setParamSources(array());
		$routeMatch = bdSocialShare_Listener::getDependencies()->route($request);
		$shareable = $this->getModelFromCache('bdSocialShare_Model_Publisher')->getShareableForRouteMatchAndRequest($routeMatch, $request);
		if (empty($shareable))
		{
			return $this->responseMessage(new XenForo_Phrase('bdsocialshare_url_x_is_not_supported', array('url' => $url)));
		}

		$userModel = $this->getModelFromCache('XenForo_Model_User');
		$viewingUserGuest = $userModel->getVisitingGuestUser();
		$userModel->bdSocialShare_prepareViewingUser($viewingUserGuest);
		$shareable->setViewingUser($viewingUserGuest);

		$publisherModel = $this->getModelFromCache('bdSocialShare_Model_Publisher');

		$facebookAccounts = false;
		if (bdSocialShare_Option::hasPermissionFacebook($viewingUserGuest))
		{
			$facebookAccounts = $this->getModelFromCache('bdSocialShare_Model_Facebook')->getAccounts();
		}

		$twitterAccounts = false;
		if (bdSocialShare_Option::hasPermissionTwitter($viewingUserGuest))
		{
			$twitterAccounts = $this->getModelFromCache('bdSocialShare_Model_Twitter')->getAccounts();
		}

		if ($this->isConfirmedPost())
		{
			$target = $this->_input->filterSingle('target', XenForo_Input::STRING);
			$targetId = $this->_input->filterSingle('target_id', XenForo_Input::STRING);

			$data = $this->_input->filter(array(
				'userText' => XenForo_Input::STRING,
				'title' => XenForo_Input::STRING,
				'description' => XenForo_Input::STRING,
				'image' => XenForo_Input::STRING,
			));

			$data['link'] = $shareable->getLink($publisherModel);

			$staffShareSharable = new bdSocialShare_Shareable_StaffShare($data);
			$published = false;

			try
			{
				$published = $publisherModel->publish($target, $targetId, $staffShareSharable, $viewingUserGuest);
			}
			catch (XenForo_Exception $e)
			{
				XenForo_Error::logException($e);
			}

			if ($published)
			{
				XenForo_Model_Log::logModeratorAction('bdsocialshare_all', $data, $target, array('target_id' => $targetId));

				return $this->responseMessage(new XenForo_Phrase('bdsocialshare_staff_share_published_successfully'));
			}
			else
			{
				return $this->responseError(new XenForo_Phrase('unexpected_error_occurred'));
			}
		}

		$viewParams = array(
			'facebookAccounts' => $facebookAccounts,
			'twitterAccounts' => $twitterAccounts,
			'hasAdminPermissionOption' => $visitor->hasAdminPermission('option'),

			'url' => $url,
			'link' => $shareable->getLink($publisherModel),
			'userText' => strval($shareable->getUserText($publisherModel)),
			'title' => strval($shareable->getTitle($publisherModel)),
			'description' => strval($shareable->getDescription($publisherModel)),
			'image' => $shareable->getImage($publisherModel),
		);

		return $this->responseView('bdSocialShare_ViewPublic_Misc_StaffShare', 'bdsocialshare_staff_share', $viewParams);
	}

}
