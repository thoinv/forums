<?php

class Brivium_BlockIP_ControllerPublic_Register extends XFCP_Brivium_BlockIP_ControllerPublic_Register
{
	public function actionIndex()
	{

		$ipAddress = (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false);

		$ip = ip2long($ipAddress);
		$match = $this->_getBlockIPModel()->isLoggedIp(sprintf('%u', $ip));

		if ($match)
		{
			$options = XenForo_Application::get('options');
			
			if ($options->contactUrl['type'] == 'default')
			{
				$contact = XenForo_Link::buildPublicLink('misc/contact');
			}
			else if ($options->contactUrl['type'] == 'custom')
			{
				$contact = $options->contactUrl['custom'];
			}
			else if (!$options->contactUrl['type'])
			{
				$contact = XenForo_Link::buildPublicLink('index');
			}

			throw $this->responseException($this->responseError(
				new XenForo_Phrase('block_ip_message', array('contact' => $contact))
			));
		}

		return parent::actionIndex();		
	}

	protected function _getBlockIPModel()
	{
		return $this->getModelFromCache('Brivium_BlockIP_Model_IP');
	}
}