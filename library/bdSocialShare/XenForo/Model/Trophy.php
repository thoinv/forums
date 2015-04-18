<?php

class bdSocialShare_XenForo_Model_Trophy extends XFCP_bdSocialShare_XenForo_Model_Trophy
{
	public function awardUserTrophy(array $user, $username, array $trophy, $awardDate = null)
	{
		$response = parent::awardUserTrophy($user, $username, $trophy, $awardDate);

		$options = bdSocialShare_Helper_Common::unserializeOrFalse($user, 'bdsocialshare_options');
		$supportedTargets = $this->getModelFromCache('bdSocialShare_Model_Publisher')->getSupportedTargets();
		$targets = bdSocialShare_Helper_Common::getOptInOptOutOffTargets('trophyAward', $options, $supportedTargets);

		if (!empty($targets))
		{
			$shareable = new bdSocialShare_Shareable_Trophy($trophy['trophy_id'], $user);
			$this->getModelFromCache('bdSocialShare_Model_ShareQueue')->insertQueue($shareable, $targets, false, $user);
		}

		return $response;
	}

}
