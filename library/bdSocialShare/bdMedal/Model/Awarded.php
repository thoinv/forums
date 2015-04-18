<?php

class bdSocialShare_bdMedal_Model_Awarded_Base extends XFCP_bdSocialShare_bdMedal_Model_Awarded
{
	protected $_bdSocialShare_medals = array();
	protected $_bdSocialShare_users = array();

	protected function _bdSocialShare_award(array $medal, array $users)
	{
		if (!!bdSocialShare_Option::get('medalAward'))
		{
			$this->_bdSocialShare_medals[$medal['medal_id']] = $medal;

			$neededUserIds = array();
			foreach ($users as $user)
			{
				if (!isset($this->_bdSocialShare_users[$user['user_id']]))
				{
					$neededUserIds[] = $user['user_id'];
				}
			}

			if (!empty($neededUserIds))
			{
				$users = $this->getModelFromCache('XenForo_Model_User')->getUsersByIds($neededUserIds, array('join' => XenForo_Model_User::FETCH_USER_FULL));

				foreach ($users as $userId => $user)
				{
					$this->_bdSocialShare_users[$userId] = $user;
				}
			}

			$GLOBALS[bdSocialShare_Listener::BDMEDAL_MODEL_AWARDED_AWARD] = $this;
		}
	}

	public function bdSocialShare_award(bdMedal_DataWriter_Awarded $awardedDw)
	{
		$awarded = $awardedDw->getMergedData();

		if (empty($this->_bdSocialShare_medals[$awarded['medal_id']]))
		{
			return false;
		}
		$medal = $this->_bdSocialShare_medals[$awarded['medal_id']];

		if (empty($this->_bdSocialShare_users[$awarded['user_id']]))
		{
			return false;
		}
		$user = $this->_bdSocialShare_users[$awarded['user_id']];

		$options = bdSocialShare_Helper_Common::unserializeOrFalse($user, 'bdsocialshare_options');
		$supportedTargets = $this->getModelFromCache('bdSocialShare_Model_Publisher')->getSupportedTargets();
		$targets = bdSocialShare_Helper_Common::getOptInOptOutOffTargets('medalAward', $options, $supportedTargets);

		if (!empty($targets))
		{
			$shareable = new bdSocialShare_Shareable_bdMedal_Medal($medal, $user);
			$this->getModelFromCache('bdSocialShare_Model_ShareQueue')->insertQueue($shareable, $targets, false, $user);
		}
	}

}

$addOns = XenForo_Application::get('addOns');
if (!empty($addOns['bdMedal']) AND $addOns['bdMedal'] >= 24)
{
	// [bd] Medal v1.4.4+
	class bdSocialShare_bdMedal_Model_Awarded extends bdSocialShare_bdMedal_Model_Awarded_Base
	{
		public function award(array $medal, array $users, array $bulkSet = array())
		{
			$this->_bdSocialShare_award($medal, $users);

			return parent::award($medal, $users, $bulkSet);
		}

	}

}
else
{
	class bdSocialShare_bdMedal_Model_Awarded extends bdSocialShare_bdMedal_Model_Awarded_Base
	{
		public function award(array $medal, array $users)
		{
			$this->_bdSocialShare_award($medal, $users);

			return parent::award($medal, $users);
		}

	}

}
