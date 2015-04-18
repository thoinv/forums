<?php

class DigitalPointAdPositioning_Deferred_RandomGenerator extends XenForo_Deferred_Abstract
{
	public function execute(array $deferred, array $data, $targetRunTime, &$status)
	{
		$optionModel = XenForo_Model::create('XenForo_Model_Option');
		$optionModel->updateOption('dppa_adsense_password', XenForo_Application::generateRandomString(32));
		$optionModel->rebuildOptionCache();
		
		return false;
	}
}