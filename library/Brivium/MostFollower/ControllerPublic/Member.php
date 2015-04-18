<?php

class Brivium_MostFollower_ControllerPublic_Member extends XFCP_Brivium_MostFollower_ControllerPublic_Member
{
	protected function _getNotableMembers($type, $limit)
	{
		$result = parent::_getNotableMembers($type, $limit);
		if(!$result && $type=='follower'){
			$userModel = $this->_getUserModel();

			$notableCriteria = array(
				'is_banned' => 0
			);
			$typeMap = array(
				'follower' => 'follower_count',
			);

			if (!isset($typeMap[$type]))
			{
				return false;
			}

			return array($userModel->getUsers($notableCriteria, array(
				'join' => XenForo_Model_User::FETCH_USER_FULL,
				'limit' => $limit,
				'BRMF_follower_count' => true,
				'order' => 'follower_count',
				'direction' => 'desc'
			)), $typeMap[$type]);
		}else{
			return $result;
		}
		
	}
	public function actionMember()
    {
		$response = parent::actionMember();
		if(!empty($response->params['user']['user_id']) && !empty($response->params['user']['brrs_show_referral'])){
			$userModel = $this->_getUserModel();
			if(!empty($response->params['user']['brrs_referral_user_id'])){
				$referrer = $userModel->getUserById($response->params['user']['brrs_referral_user_id']);
				$response->params['referrer'] = $referrer;
			}
			$conditions = array(
				'is_banned' => 0,
				'brrs_referral_user_id'	=>	$response->params['user']['user_id'],
			);
			$referrals = $userModel->getUsers($conditions, array(
				'limit' => 10,
				'order' => 'register_date',
				'direction' => 'desc',
			));
			if($referrals){
				$response->params['referrals'] = $referrals;
			}
		}
	   return $response;
    }
	
	/**
	 * @return Brivium_MostFollower_Model_UserReferral
	 */
	protected function _getUserReferralModel()
	{
		return $this->getModelFromCache('Brivium_MostFollower_Model_UserReferral');
	}
}
