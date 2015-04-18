<?php

class WfTopUsers_Model_User extends XFCP_WfTopUsers_Model_User
{
    public function getTopUsers(array $options)
	{
		$ANDCondition = '';
	
		if($options['criterion'] == 'posts') {
			if(!empty($options['range'])) {
				$ANDCondition = ' AND DATEDIFF(NOW(),FROM_UNIXTIME(xp.post_date)) < ' . $options['range'];
			}
			$ORDERCondition = ' ORDER BY count(xp.post_id) desc';
		} 
		elseif($options['criterion'] == 'likes') {
			if(!empty($options['range'])) {
				$ANDCondition = ' AND DATEDIFF(NOW(),FROM_UNIXTIME(xp.post_date)) < ' . $options['range'];
			}
			$ORDERCondition = ' ORDER BY SUM(xp.likes) desc';
		} 
		elseif($options['criterion'] == 'trophy') {
			$ORDERCondition = ' ORDER BY xu.trophy_points desc';
		}			
		
		if(!empty($options['excluded_usergroups'])) {
			$ANDCondition .= ' AND xu.user_group_id not in (' . $options['excluded_usergroups'] . ')';
		}
		
		if(!empty($options['excluded_users'])) {
			$ANDCondition .= ' AND xu.user_id not in (' . $options['excluded_users'] . ')';
		}
		
		return $this->fetchAllKeyed('
			SELECT xu.*
			FROM xf_post xp, xf_user xu
			WHERE xp.user_id = xu.user_id '
			. $ANDCondition .'			
			GROUP by xp.user_id'
			. $ORDERCondition .'			
			limit ' . $options['limit'] . '
		', 'user_id');
	}
	
}