<?php

class bdSocialShare_ControllerHelper_SocialShare extends XenForo_ControllerHelper_Abstract
{
	public function publishAsNeeded($optionId, bdSocialShare_Shareable_Abstract $shareable, $key = false)
	{
		extract($this->_getTargets($optionId, $key));
		$shareQueueModel = $this->_getShareQueueModel();
		$preConfiguredTargets = $shareable->getPreConfiguredTargets();

		if (!empty($included))
		{
			if (!empty($targets) AND $shareQueueModel->canQueue() AND $shareQueueModel->insertQueue($shareable, $targets, $default))
			{
				// good, queued now
			}
			else
			{
				// unable to queue, publish asap
				$shareQueueModel->publish($shareable, $targets, $default);
			}
		}

		if (!empty($preConfiguredTargets))
		{
			$userModel = $this->_controller->getModelFromCache('XenForo_Model_User');
			$viewingUserGuest = $userModel->getVisitingGuestUser();
			$userModel->bdSocialShare_prepareViewingUser($viewingUserGuest);

			if ($shareQueueModel->canQueue() AND $shareQueueModel->insertQueue($shareable, $preConfiguredTargets, false, $viewingUserGuest))
			{
				// good, queued now
			}
			else
			{
				// unable to queue, publish asap
				$shareQueueModel->publish($shareable, $preConfiguredTargets, false, $viewingUserGuest);
			}
		}
	}

	public function schedule($optionId, XenForo_DataWriter $dw, $dwField, $key = false)
	{
		extract($this->_getTargets($optionId, $key));

		if (!empty($included))
		{
			$dw->set($dwField, array('targets' => $targets));
		}
	}

	protected function _getTargets($optionId, $key)
	{
		$included = $this->_controller->getInput()->filterSingle('_bdSocialShare_included', XenForo_Input::UINT);
		$enabled = $this->_controller->getRequest()->getParam('_bdSocialShare_enabled');
		$targets = array();

		if (strval(bdSocialShare_Option::get($optionId)) !== '' AND !empty($included))
		{
			// only work if our template has been rendered properly
			// the flag `included` is used to determine that
			if (empty($enabled))
			{
				$enabled = array();
			}

			if ($key !== false)
			{
				// support request with multiple data items
				// therefore multiple enabled flag
				if (isset($enabled[$key]))
				{
					$enabled = $enabled[$key];
				}
				else
				{
					$enabled = array();
				}
			}

			foreach ($enabled as $target => $targetId)
			{
				if ($target === '_default')
				{
					continue;
				}

				if (!empty($targetId))
				{
					$targets[$target] = $targetId;
				}
			}
		}

		return array(
			'included' => !empty($included),
			'targets' => $targets,
			'default' => !empty($enabled['_default'])
		);
	}

	/**
	 * @return bdSocialShare_Model_ShareQueue
	 */
	protected function _getShareQueueModel()
	{
		return $this->_controller->getModelFromCache('bdSocialShare_Model_ShareQueue');
	}

}
