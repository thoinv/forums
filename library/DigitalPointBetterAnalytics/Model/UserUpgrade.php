<?php

class DigitalPointBetterAnalytics_Model_UserUpgrade extends XFCP_DigitalPointBetterAnalytics_Model_UserUpgrade
{

	protected $_filtered = array();

	protected function _filterInput()
	{
		$request = new Zend_Controller_Request_Http();
		$input = new XenForo_Input($request);

		$this->_filtered = $input->filter(array(
//			'test_ipn' => XenForo_Input::UINT,
//			'business' => XenForo_Input::STRING,
//			'receiver_email' => XenForo_Input::STRING,
			'txn_type' => XenForo_Input::STRING,
			'txn_id' => XenForo_Input::STRING,
//			'parent_txn_id' => XenForo_Input::STRING,
			'mc_currency' => XenForo_Input::STRING,
			'mc_gross' => XenForo_Input::UNUM,
			'payment_status' => XenForo_Input::STRING,
//			'custom' => XenForo_Input::STRING,
//			'subscr_id' => XenForo_Input::STRING
		));

	}


	public function getUser($userId)
	{
		$userModel = $this->_getUserModel();

		$user = $userModel->getUserById($userId, array(
			'join' => XenForo_Model_User::FETCH_USER_PROFILE
		));

		if ($user)
		{
			return $userModel->prepareUser($user);
		}
		else
		{
			return $user;
		}

	}

	public function adjustGrossAmount()
	{
		// Wish PayPal would give consistent values here
		if ($this->_filtered['payment_status'] == 'Reversed' || $this->_filtered['payment_status'] == 'Canceled_Reversal')
		{
			$this->_filtered['mc_gross'] = abs(@$this->_filtered['mc_gross'] + @$this->_filtered['mc_fee']);
		}
	}

	public function upgradeUser($userId, array $upgrade, $allowInsertUnpurchasable = false, $endDate = null)
	{
		$return = parent::upgradeUser($userId, $upgrade, $allowInsertUnpurchasable, $endDate);

		$this->_filterInput();

		if ($this->_filtered['txn_type'] == 'subscr_payment' || $this->_filtered['txn_type'] == 'web_accept' || $this->_filtered['payment_status'] == 'Canceled_Reversal')
		{
			if ($this->_filtered['payment_status'] == 'Completed' || $this->_filtered['payment_status'] == 'Canceled_Reversal')
			{
				if ($user = $this->getUser($userId))
				{
					$analyticsClientId = @$user['customFields']['analytics_cid'];

					$lastIp = $this->getModelFromCache('DigitalPointBetterAnalytics_Model_Analytics')->getLastIp($userId);

					$this->adjustGrossAmount();

					DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->transaction(
						XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
						$analyticsClientId,
						$userId,
						$lastIp,
						$this->_filtered['txn_id'],
						$this->_filtered['mc_gross'],
						$this->_filtered['mc_currency'],
						array(
							array(
								'name' => $upgrade['title'],
								'price' => $this->_filtered['mc_gross'],
								'quantity' => 1,
								'code' => 'UU-' . $upgrade['user_upgrade_id'],
								'category' => 'User Upgrades',
								'action' => 'purchase'
							)
						),
						$user['username']
					);
				}
			}
		}
		return $return;
	}

	public function downgradeUserUpgrade(array $upgrades, $sendAlert = true)
	{
		$this->_filterInput();

		if ($this->_filtered['payment_status'] == 'Refunded' || $this->_filtered['payment_status'] == 'Reversed')
		{
			foreach ($upgrades as $upgrade)
			{
				if ($user = $this->getUser(@$upgrade['user_id']))
				{
					$analyticsClientId = @$user['customFields']['analytics_cid'];

					$lastIp = $this->getModelFromCache('DigitalPointBetterAnalytics_Model_Analytics')->getLastIp(@$upgrade['user_id']);

					$this->adjustGrossAmount();

					DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->transaction(
						XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
						$analyticsClientId,
						@$upgrade['user_id'],
						$lastIp,
						$this->_filtered['txn_id'],
						$this->_filtered['mc_gross'],
						$this->_filtered['mc_currency'],
						array(
							array(
								'name' => @$upgrade['title'],
								'price' => $this->_filtered['mc_gross'],
								'quantity' => 1,
								'code' => 'UU-' . @$upgrade['user_upgrade_id'],
								'category' => 'User Upgrades',
								'action' => 'refund'
							)
						),
						@$user['username']
					);
				}
			}

		}

		parent::downgradeUserUpgrade($upgrades, $sendAlert);
	}

}