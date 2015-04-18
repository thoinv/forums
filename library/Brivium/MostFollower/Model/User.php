<?php

class Brivium_MostFollower_Model_User extends XFCP_Brivium_MostFollower_Model_User
{
	public function prepareUserOrderOptions(array &$fetchOptions, $defaultOrderSql = '')
	{
		$choices = array(
			'follower_count' => 'follower_count',
		);
		$result = $this->getOrderByClause($choices, $fetchOptions, '');
		if($result)
			return $result;
		else
			return parent::prepareUserOrderOptions($fetchOptions, $defaultOrderSql);
	}
	
	public function prepareUserFetchOptions(array $fetchOptions)
	{
		$result = parent::prepareUserFetchOptions($fetchOptions);
		extract($result);

		if (!empty($fetchOptions['BRMF_follower_count']))
		{
			$selectFields .= ',
				(SELECT COUNT(*) FROM xf_user_follow WHERE follow_user_id = user.user_id) AS follower_count';
		}
		return compact('selectFields' , 'joinTables');
	}
	
	
}