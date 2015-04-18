<?php

class bdSocialShare_ControllerHelper_Recover extends XenForo_ControllerHelper_Abstract
{
	public function attemptRecovery()
	{
		$recovery = $this->loadRecoveryData();
		if (empty($recovery) OR empty($recovery['targets']))
		{
			return $this->_getDefaultResponse();
		}

		$targets = array_keys($recovery['targets']);
		$target = reset($targets);
		$response = $this->_getPublisherModel()->doRecovery($target, $recovery['targets'][$target], $this->_controller);
		if (empty($response))
		{
			return $this->_getDefaultResponse();
		}

		return $response;
	}

	public function dismissRecovery()
	{
		$this->_getPublisherModel()->saveRecoveryData();

		return $this->_controller->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $this->_controller->getDynamicRedirect());
	}

	public function recover($target, $recovery = false)
	{
		if ($recovery === false)
		{
			$recovery = $this->loadRecoveryData();
		}

		// reset recovery asap, it will be updated later
		$this->_getPublisherModel()->saveRecoveryData();
		$recovered = true;

		if (empty($recovery) OR empty($recovery['shareable']) OR empty($recovery['targets']))
		{
			return false;
		}

		if (empty($recovery['targets'][$target]))
		{
			return false;
		}
		$targetId = $recovery['targets'][$target];

		$shareable = bdSocialShare_Shareable_Abstract::createFromRecoveryData($recovery['shareable']);
		if (empty($shareable))
		{
			return false;
		}

		try
		{
			$this->_getPublisherModel()->publish($target, $targetId, $shareable);
			$this->_getPublisherModel()->postPublish($shareable);
			$recovered = true;
		}
		catch (bdSocialShare_Exception_Abstract $e)
		{
			if (XenForo_Application::debugMode())
			{
				XenForo_Error::logException($e, false);
			}
		}

		if ($recovered)
		{
			// remove the target from the queue
			unset($recovery['targets'][$target]);
		}

		if (!empty($recovery['targets']))
		{
			// still have something in queue, set recovery...
			$this->_getPublisherModel()->saveRecoveryData($recovery['shareable'], $recovery['targets']);
		}
	}

	public function loadRecoveryData()
	{
		return $this->_getPublisherModel()->loadRecoveryData();
	}

	protected function _getDefaultResponse()
	{
		return $this->_controller->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, XenForo_Link::buildPublicLink('account'));
	}

	/**
	 * @return bdSocialShare_Model_Publisher
	 */
	protected function _getPublisherModel()
	{
		return $this->_controller->getModelFromCache('bdSocialShare_Model_Publisher');
	}

}
