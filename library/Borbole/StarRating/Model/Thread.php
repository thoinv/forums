<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_Model_Thread extends XFCP_Borbole_StarRating_Model_Thread
{
	/**
	 * Gets the average rating based on the sum and count stored.
	 *
	 * @param integer $sum
	 * @param integer $count
	 * @param boolean $round If true, return rating to the nearest 0.5, otherwise full float.
	 *
	 * @return float
	 */
	public function getRatingAverage($sum, $count, $round = false)
	{
		if ($count == 0)
		{
			return 0;
		}

		$average = $sum / $count;

		if ($round)
		{
			$average = round($average / 0.5, 0) * 0.5;
		}

		return $average;
	}
	
	//Sort threads based on ratings
	public function prepareThreadFetchOptions(array $fetchOptions)
    {
        $selectFields = '';
        $joinTables = '';
        $orderBy = '';

        if (!empty($fetchOptions['order'])) {
            switch ($fetchOptions['order']) {
                case 'rating_count':
                    $orderBy = 'thread.rating_count';
                    break;
            }
            if ($orderBy) {
                if (!isset($fetchOptions['orderDirection']) || $fetchOptions['orderDirection'] == 'desc') {
                    $orderBy .= ' DESC';
                } else {
                    $orderBy .= ' ASC';
                }
            }
        }

        $threadFetchOptions = parent::prepareThreadFetchOptions($fetchOptions);

        return array(
            'selectFields' => $threadFetchOptions['selectFields'] . $selectFields,
            'joinTables' => $joinTables . $threadFetchOptions['joinTables'],
            'orderClause' => ($orderBy ? "ORDER BY $orderBy" : $threadFetchOptions['orderClause'])
        );
    }
	
	//Send rating alert
	public function sendAlert($alertType, $postId, array $threadstarters, XenForo_Visitor $visitor = null)
	{
		$visitor = XenForo_Visitor::getInstance(); 
		
		if (!$visitor)
		{
			$visitor = XenForo_Visitor::getInstance();
		}

		if (!empty($threadstarters))
		{
			foreach ($threadstarters AS $threadstarter)
			{
				$user = $this->_getUserModel()->getUserByName($threadstarter);
				
				if (XenForo_Model_Alert::userReceivesAlert($user, 'post', $alertType))
				{
					XenForo_Model_Alert::alert($user['user_id'],
							$visitor['user_id'], $visitor['username'],
							'post', 
							$postId,
							$alertType
					);
				}
			}
		}
		
		return false;
	}
	
	//Delete rating alert
	public function sendDeleteAlert($alertType, $postId, array $threadstarters, XenForo_Visitor $visitor = null)
	{
		$visitor = XenForo_Visitor::getInstance(); 
		
		if (!$visitor)
		{
			$visitor = XenForo_Visitor::getInstance();
		}

		if (!empty($threadstarters))
		{
			foreach ($threadstarters AS $threadstarter)
			{
				$user = $this->_getUserModel()->getUserByName($threadstarter);
				
				if (XenForo_Model_Alert::userReceivesAlert($user, 'post', $alertType))
				{
					XenForo_Model_Alert::alert($user['user_id'],
							$visitor['user_id'], $visitor['username'],
							'post', 
							$postId,
							$alertType
					);
				}
			}
		}
		
		return false;
	}
	
	/**
	 * @return XenForo_Model_User
	 */
	protected function _getUserModel()
	{
		return $this->getModelFromCache('XenForo_Model_User');
	}
}