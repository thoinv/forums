<?php

class bdSocialShare_Model_Publisher extends XenForo_Model
{
	public function getSupportedTargets()
	{
		return array(
			'facebook',
			'twitter'
		);
	}

	public function publish($target, $targetId, bdSocialShare_Shareable_Abstract $shareable, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		$shareable->setViewingUser($viewingUser);

		switch ($target)
		{
			case 'facebook':
				if (bdSocialShare_Option::hasPermissionFacebook($viewingUser))
				{
					return $this->facebookPublish($targetId, $shareable, $viewingUser);
				}
				break;
			case 'twitter':
				if (bdSocialShare_Option::hasPermissionTwitter($viewingUser))
				{
					return $this->twitterPublish($targetId, $shareable, $viewingUser);
				}
				break;
		}
	}

	public function publishScheduled($scheduled, bdSocialShare_Shareable_Abstract $shareable, array $viewingUser = null)
	{
		if (!empty($scheduled['targets']))
		{
			foreach ($scheduled['targets'] as $target => $targetId)
			{
				$this->publish($target, $targetId, $shareable, $viewingUser);
			}
		}
	}

	public function facebookPublish($targetId, bdSocialShare_Shareable_Abstract $shareable, array $viewingUser = null)
	{
		$facebookUid = false;
		$accessToken = false;

		$originalTargetId = $targetId;
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
			$this->standardizeViewingUserReference($viewingUser);

			$facebookUid = bdSocialShare_Helper_Common::getAuthId($viewingUser, 'facebook');
			if (empty($facebookUid))
			{
				throw new bdSocialShare_Exception_NotConnected();
			}

			$auth = $this->_getUserExternalModel()->getExternalAuthAssociation('facebook', $facebookUid);
			if (empty($auth))
			{
				throw new bdSocialShare_Exception_NotConnected();
			}

			$extraData = bdSocialShare_Helper_Common::unserializeOrFalse($auth, 'extra_data');
			if (empty($extraData) OR empty($extraData['token']))
			{
				throw new bdSocialShare_Exception_Interrupted();
			}
			$accessToken = $extraData['token'];
		}

		if (in_array(strval($targetId), array(
			'1',
			'me'
		), true))
		{
			// '1' is for backward compatible
			// 'me' is for version 1.2 and onward
			if (!empty($facebookUid))
			{
				$targetId = $facebookUid;
			}
			else
			{
				$targetId = 'me';
			}
		}

		// we know facebook uid or username only contains some classes of characters...
		$targetId = preg_replace('/[^0-9a-z_]/i', '', $targetId);

		$response = $this->_getFacebookModel()->publish($targetId, $shareable, $accessToken);

		if (!empty($response))
		{
			// successfully posted
			$shareable->markPublished('facebook', array_merge($response, array(
				'target_id' => $targetId,
				'shared_id' => $response['id'],
				'original_target_id' => $originalTargetId,
			)));

			$this->log($viewingUser['user_id'], $shareable, 'facebook', $targetId, $response['id']);

			return true;
		}

		return false;
	}

	public function twitterPublish($targetId, bdSocialShare_Shareable_Abstract $shareable, array $viewingUser = null)
	{
		$twitterUid = false;
		$token = false;

		$originalTargetId = $targetId;
		$targetIdParsed = bdSocialShare_Helper_Common::parseTargetId($targetId);
		if (!empty($targetIdParsed))
		{
			$targetId = $targetIdParsed['user_id'];
			$token = $targetIdParsed;
		}

		if (empty($token))
		{
			$this->standardizeViewingUserReference($viewingUser);

			$twitterUid = bdSocialShare_Helper_Common::getAuthId($viewingUser, 'twitter');
			if (empty($twitterUid))
			{
				throw new bdSocialShare_Exception_NotConnected();
			}

			$auth = $this->_getUserExternalModel()->getExternalAuthAssociation('twitter', $twitterUid);
			if (empty($auth))
			{
				throw new bdSocialShare_Exception_NotConnected();
			}

			$token = bdSocialShare_Helper_Twitter::getTokenAndSecretFromAuth($auth);
			if (empty($token))
			{
				throw new bdSocialShare_Exception_Interrupted();
			}
		}

		if (strval($targetId) === '1')
		{
			if (!empty($twitterUid))
			{
				$targetId = $twitterUid;
			}
		}

		$response = $this->_getTwitterModel()->publish($targetId, $shareable, $token);

		if (!empty($response))
		{
			// successfully posted
			$shareable->markPublished('twitter', array_merge($response, array(
				'target_id' => $targetId,
				'shared_id' => $response['id_str'],
				'original_target_id' => $originalTargetId,
			)));

			$this->log($viewingUser['user_id'], $shareable, 'twitter', $targetId, $response['id_str']);

			return true;
		}

		return false;
	}

	public function postPublish(bdSocialShare_Shareable_Abstract $shareable, $default = false, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if ($default)
		{
			$optionChanges = $this->_postPublish_getUserOptionChanges($shareable, $viewingUser);

			if (!empty($optionChanges))
			{
				$this->_getDb()->update('xf_user_option', $optionChanges, array('user_id = ?' => $viewingUser['user_id']));
			}
		}
	}

	public function isRecoverable($target, $targetId, bdSocialShare_Shareable_Abstract $shareable, array $viewingUser = null, bdSocialShare_Exception_Abstract $exception)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if (empty($viewingUser['user_id']))
		{
			return false;
		}

		switch ($target)
		{
			case 'facebook':
				return true;
			case 'twitter':
				return true;
		}

		return false;
	}

	public function saveRecoveryData(array $shareableRecoveryData = null, array $targets = null, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if (!empty($shareableRecoveryData) AND !empty($targets))
		{
			$data = array(
				'shareable' => $shareableRecoveryData,
				'targets' => $targets,
			);
		}
		else
		{
			$data = false;
		}

		$this->_getDb()->update('xf_user_option', array('bdsocialshare_recovery' => serialize($data)), array('user_id = ?' => $viewingUser['user_id']));
	}

	public function loadRecoveryData(array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		$data = false;

		if (isset($viewingUser['bdsocialshare_recovery']))
		{
			return bdSocialShare_Helper_Common::unserializeOrFalse($viewingUser, 'bdsocialshare_recovery');
		}

		return $data;
	}

	public function doRecovery($target, $targetId, XenForo_Controller $controller)
	{
		switch ($target)
		{
			case 'facebook':
				$extraParams = array('publish_actions' => 1);

				$targetIdParsed = bdSocialShare_Helper_Common::parseTargetId($targetId);
				if (!empty($targetIdParsed) AND !empty($targetIdParsed['type']))
				{
					switch ($targetIdParsed['type'])
					{
						case 'page':
							$extraParams['manage_pages'] = 1;
							break;
						case 'group':
							$extraParams['user_groups'] = 1;
							break;
					}
				}

				$link = XenForo_Link::buildPublicLink('register/facebook', '', array_merge(array('reg' => 1), $extraParams));

				return $controller->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $link);
				break;
			case 'twitter':
				$link = XenForo_Link::buildPublicLink('register/twitter', '', array_merge(array('reg' => 1)));

				return $controller->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $link);
				break;
		}

		return false;
	}

	/**
	 * @return bdSocialShare_Shareable_Abstract
	 */
	public function getShareableForRouteMatchAndRequest(XenForo_RouteMatch $routeMatch, Zend_Controller_Request_Http $request)
	{
		$shareable = null;

		switch ($routeMatch->getControllerName())
		{
			case 'NFLJ_Showcase_ControllerPublic_Index':
			case 'NFLJ_Showcase_ControllerPublic_Showcase':
				$itemId = $request->getParam('item_id');
				if (!empty($itemId))
				{
					$shareable = bdSocialShare_Shareable_NFLJ_Showcase_Item::createFromId($itemId);
				}
				break;
			case 'sonnb_XenGallery_ControllerPublic_XenGallery_Photo':
				$contentId = $request->getParam('content_id');
				if (!empty($contentId))
				{
					$shareable = bdSocialShare_Shareable_sonnb_XenGallery_Photo::createFromId($contentId);
				}
				break;
			case 'sonnb_XenGallery_ControllerPublic_XenGallery_Video':
				$contentId = $request->getParam('content_id');
				if (!empty($contentId))
				{
					$shareable = bdSocialShare_Shareable_sonnb_XenGallery_Video::createFromId($contentId);
				}
				break;
			case 'XenForo_ControllerPublic_Post':
				$postId = $request->getParam('post_id');
				if (!empty($postId))
				{
					$shareable = bdSocialShare_Shareable_Post::createFromId($postId);
				}
				break;
			case 'XenForo_ControllerPublic_ProfilePost':
				$profilePostId = $request->getParam('profile_post_id');
				if (!empty($profilePostId))
				{
					$shareable = bdSocialShare_Shareable_ProfilePost::createFromId($profilePostId);
				}
				break;
			case 'XenForo_ControllerPublic_Thread':
				$threadId = $request->getParam('thread_id');
				if (!empty($threadId))
				{
					$thread = $this->getModelFromCache('XenForo_Model_Thread')->getThreadById($threadId);
					if (!empty($thread))
					{
						$shareable = bdSocialShare_Shareable_Post::createFromId($thread['first_post_id']);
					}
				}
				break;
			case 'XenGallery_ControllerPublic_Media':
				$mediaId = $request->getParam('media_id');
				if (!empty($mediaId))
				{
					$shareable = bdSocialShare_Shareable_XenGallery_Media::createFromId($mediaId);
				}
				break;
			case 'XenResource_ControllerPublic_Resource':
				$resourceId = $request->getParam('resource_id');
				if (!empty($resourceId))
				{
					$shareable = bdSocialShare_Shareable_XenResource_Resource::createFromId($resourceId);
				}
				break;
		}

		return $shareable;
	}

	public function getRequiredAddOnsForOption($optionId)
	{
		return array();
	}

	public function log($userId, bdSocialShare_Shareable_Abstract $shareable, $target, $targetId, $sharedId = '', array $bulkSet = array())
	{
		if ($shareable->getId())
		{
			$dw = XenForo_DataWriter::create('bdSocialShare_DataWriter_Log');
			$dw->set('user_id', $userId);
			$dw->set('log_date', XenForo_Application::$time);
			$dw->set('shareable_class', get_class($shareable));
			$dw->set('shareable_id', $shareable->getId());
			$dw->set('target', $target);
			$dw->set('target_id', $targetId);
			$dw->set('shared_id', $sharedId);
			$dw->bulkSet($bulkSet);

			$dw->save();

			return $dw->getMergedData();
		}
		else
		{
			return false;
		}
	}

	protected function _postPublish_getUserOptionChanges(bdSocialShare_Shareable_Abstract $shareable, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		$changes = array();

		if (bdSocialShare_Option::hasPermissionFacebook($viewingUser))
		{
			$optionFacebookNeeded = false;

			if ($shareable->isPublished('facebook'))
			{
				$published = $shareable->getPublishedExtraData('facebook');
				// notice the use of original_target_id instead of target_id here
				// sometimes (page posting), target_id will be extracted from original_target_id
				// through a series of parsing. The original is the important bit that worth
				// saving.
				$optionFacebookNeeded = $published['original_target_id'];
			}
			else
			{
				$optionFacebookNeeded = '';
			}

			if (!isset($viewingUser['bdsocialshare_facebook']) OR strval($viewingUser['bdsocialshare_facebook']) !== strval($optionFacebookNeeded))
			{
				$changes['bdsocialshare_facebook'] = $optionFacebookNeeded;
			}
		}

		if (bdSocialShare_Option::hasPermissionTwitter($viewingUser))
		{
			$optionTwitterNeeded = false;

			if ($shareable->isPublished('twitter'))
			{
				$published = $shareable->getPublishedExtraData('twitter');
				// the usage of original_target_id is similar to Facebook routine above
				$optionTwitterNeeded = $published['original_target_id'];
			}
			else
			{
				$optionTwitterNeeded = '';
			}

			if (!isset($viewingUser['bdsocialshare_twitter']) OR strval($viewingUser['bdsocialshare_twitter']) !== strval($optionTwitterNeeded))
			{
				$changes['bdsocialshare_twitter'] = $optionTwitterNeeded;
			}
		}

		return $changes;
	}

	/**
	 * @return XenForo_Model_UserExternal
	 */
	protected function _getUserExternalModel()
	{
		return $this->getModelFromCache('XenForo_Model_UserExternal');
	}

	/**
	 * @return bdSocialShare_Model_Facebook
	 */
	protected function _getFacebookModel()
	{
		return $this->getModelFromCache('bdSocialShare_Model_Facebook');
	}

	/**
	 * @return bdSocialShare_Model_Twitter
	 */
	protected function _getTwitterModel()
	{
		return $this->getModelFromCache('bdSocialShare_Model_Twitter');
	}

}
