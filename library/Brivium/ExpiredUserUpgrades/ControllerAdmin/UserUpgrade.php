<?php

/**
 * Extend user upgrade controller to handle new fields
 */
class Brivium_ExpiredUserUpgrades_ControllerAdmin_UserUpgrade extends XFCP_Brivium_ExpiredUserUpgrades_ControllerAdmin_UserUpgrade
{
	public function actionExpired()
	{
		$userUpgradeId = $this->_input->filterSingle('user_upgrade_id', XenForo_Input::UINT);
		$userUpgradeModel = $this->_getUserUpgradeModel();

		$page = $this->_input->filterSingle('page', XenForo_Input::UINT);
		$perPage = 20;

		$fetchOptions = array(
			'page' => $page,
			'perPage' => $perPage
		);

		if ($userUpgradeId)
		{
			$upgrade = $this->_getUserUpgradeOrError($userUpgradeId);

			$conditions = array(
				'user_upgrade_id' => $upgrade['user_upgrade_id'],
				'active' => false
			);

			$viewParams = array(
				'upgrade' => $upgrade,
				'upgradeRecords' => $userUpgradeModel->getUserUpgradeRecords($conditions, $fetchOptions),

				'totalRecords' => $userUpgradeModel->countUserUpgradeRecords($conditions),
				'perPage' => $perPage,
				'page' => $page,
				'BR_copyright' => '<span style="font-size: 11px;color: #969696;text-align:center;display:block;width:100%"><a href="http://brivium.com/" class="concealed" title="Brivium Limited">Expired User Upgrades addon by Brivium &trade;  &copy; 2012-2013  Brivium Limited</a></span>'
			);

			return $this->responseView('XenForo_ViewAdmin_UserUpgrade_ActiveSingle', 'BREUU_user_upgrade_expired_single', $viewParams);
		}
		else
		{
			$conditions = array(
				'active' => false
			);

			$fetchOptions['join'] = XenForo_Model_UserUpgrade::JOIN_UPGRADE;

			$viewParams = array(
				'upgradeRecords' => $userUpgradeModel->getUserUpgradeRecords($conditions, $fetchOptions),

				'totalRecords' => $userUpgradeModel->countUserUpgradeRecords($conditions),
				'perPage' => $perPage,
				'page' => $page,
				'BR_copyright' => '<span style="font-size: 11px;color: #969696;text-align:center;display:block;width:100%"><a href="http://brivium.com/" class="concealed" title="Brivium Limited">Expired User Upgrades addon by Brivium &trade;  &copy; 2012-2013  Brivium Limited</a></span>'
			);
			return $this->responseView('XenForo_ViewAdmin_UserUpgrade_Active', 'BREUU_user_upgrade_expired', $viewParams);
		}
	}
}