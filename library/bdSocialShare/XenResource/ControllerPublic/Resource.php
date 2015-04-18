<?php

class bdSocialShare_XenResource_ControllerPublic_Resource extends XFCP_bdSocialShare_XenResource_ControllerPublic_Resource
{
	public function actionView()
	{
		$customAccessDenied = bdSocialShare_Option::get('customAccessDenied');
		if ($customAccessDenied)
		{
			$categoryModel = $this->getModelFromCache('XenResource_Model_Category');
			$resourceModel = $this->getModelFromCache('XenResource_Model_Resource');

			$categoryModel->bdSocialShare_setCanViewCategory(true);
			$resourceModel->bdSocialShare_setCanViewResource(true);
		}

		$response = parent::actionView();

		if ($customAccessDenied AND $response instanceof XenForo_ControllerResponse_View)
		{
			$paramsRef = &$response->params;
			$categoryModel->bdSocialShare_setCanViewCategory(null);
			$resourceModel->bdSocialShare_setCanViewResource(null);

			if (!$categoryModel->canViewCategory($paramsRef['category'], $errorPhraseKey) OR !$resourceModel->canViewResource($paramsRef['resource'], $paramsRef['category'], $errorPhraseKey))
			{
				$response = $this->getHelper('bdSocialShare_ControllerHelper_Content')->getErrorOrNoPermissionResponse($response, $errorPhraseKey);
			}
		}

		return $response;
	}

	public function actionSave()
	{
		$GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE] = $this;

		return parent::actionSave();
	}

	public function bdSocialShare_actionSave(XenResource_DataWriter_Resource $resourceDw)
	{
		/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');

		$shareable = new bdSocialShare_Shareable_XenResource_Resource($resourceDw);

		if ($this->_input->filterSingle('edit_icon', XenForo_Input::BOOLEAN))
		{
			// icon is introduced since XenForo Resource Manager 1.1
			$shareable->setWaitForIcon();
		}

		$helper->publishAsNeeded('resourceAdd', $shareable);

		unset($GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE]);
	}

	public function actionSaveVersion()
	{
		$GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE_VERSION] = $this;

		return parent::actionSaveVersion();
	}

	public function bdSocialShare_actionSaveVersion(XenResource_DataWriter_Update $updateDw)
	{
		/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
		$helper->publishAsNeeded('resourceVersionAdd', new bdSocialShare_Shareable_XenResource_Update($updateDw));

		unset($GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE_VERSION]);
	}

	public function actionIcon()
	{
		$GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_ICON] = $this;

		return parent::actionIcon();
	}

	public function bdSocialShare_actionIcon(XenResource_DataWriter_Resource $resourceDw)
	{
		$resource = $resourceDw->getMergedData();
		$queueDate = $resource['resource_date'] + bdSocialShare_Shareable_XenResource_Resource::SECONDS_WAIT_FOR_ICON;

		$shareQueueModel = $this->getModelFromCache('bdSocialShare_Model_ShareQueue');

		$queue = $shareQueueModel->getQueueAt($queueDate);
		if (!empty($queue))
		{
			foreach ($queue AS $id => $record)
			{
				$data = bdSocialShare_Helper_Common::unserializeOrFalse($record, 'queue_data');

				if (!empty($data) AND !empty($data['shareable']))
				{
					$shareable = bdSocialShare_Shareable_Abstract::createFromRecoveryData($data['shareable']);

					if ($shareable instanceof bdSocialShare_Shareable_XenResource_Resource AND $shareable->getId() == $resource['resource_id'])
					{
						$shareQueueModel->reInsertQueue($record, XenForo_Application::$time);
					}
				}
			}
		}

		unset($GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_ICON]);
	}

}
