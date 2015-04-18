<?php

class TopUsers_Model_TopUsers extends XenForo_Model
{
	/**
	 * Gets the top users in descending order
	 *
	 * @return array
	 */
	public function getTopUsers($month_id)
	{
		$start_time=microtime(true);
		$updated_cache=0;

		$month_now=(int)date('y')*12 + (int)date('m') -1;
		if (!$month_id) $month_id=$month_now-1;

		$year = floor($month_id/12) + 2000;
		$month = $month_id%12 +1;
		$fromDate = strtotime("$year-$month-01");
		$toDate = strtotime("$year-$month-01 +1 month");


		//Determine max cache age to use - less recent months can use older data
		$dateStamp = time();
		$monthAgo = $dateStamp - (60*60*24*30);

		$maxCacheAge = $dateStamp - (60*60*24);
		if ($month_now-$month_id == 1) $maxCacheAge = $dateStamp - (60*60*24*4);
		if ($month_now-$month_id == 2) $maxCacheAge = $dateStamp - (60*60*24*14);
		if ($month_now-$month_id > 2) $maxCacheAge = $monthAgo;

		//empty cache for testing purposes
		//$this->_getDb()->query('DELETE from xf_top_users_cache WHERE month_id > 0');

		//Look for cache data
		$cacheTest = $this->_getDb()->fetchOne('
				SELECT count(*)
				FROM xf_top_users_cache
				WHERE  cache_date > ?
				AND month_id = ?
				;', array($maxCacheAge,$month_id));


		// if no cache data found and selected month not more than a year ago or in the future
		if ((!$cacheTest)&&($month_now-$month_id <= 12)&&($month_now-$month_id >= 0)) {
			
			$updated_cache=1;

			// delete expired cache
			$this->_getDb()->query('
					DELETE from xf_top_users_cache
					WHERE month_id = ?
					OR cache_date < ?
					;', array($month_id,$monthAgo));

			/* too slow
			 $this->_getDb()->query('
			 		INSERT INTO xf_top_users_cache
			 		SELECT ? cache_date, ? month_id, user_id, count(*) messages_delta, sum(likes) likes_delta, count(*) + sum(likes) score_delta
			 		FROM xf_post WHERE  post_date > ? AND post_date < ?
			 		GROUP BY user_id ORDER BY score_delta DESC LIMIT 10
			 		;',array($dateStamp,$month_id,$fromDate,$toDate));
			*/

			// fill cache for selected month
			$this->_getDb()->query('
					INSERT INTO xf_top_users_cache
					SELECT ? cache_date, ? month_id, user_id, messages_delta, likes_delta, messages_delta + likes_delta score_delta
					FROM (SELECT user_id, count(*) messages_delta, sum(likes) likes_delta
					FROM (SELECT user_id , likes from xf_post WHERE  post_date > ? AND post_date < ?) t1
					GROUP BY user_id ORDER BY messages_delta DESC LIMIT 50) t2
					ORDER BY score_delta DESC
					LIMIT 10
					;',array($dateStamp,$month_id,$fromDate,$toDate));
				
				
			// insert an empty row in case result set is empty
			$this->_getDb()->query('
					INSERT INTO xf_top_users_cache (cache_date,month_id,user_id,messages_delta,likes_delta,score_delta)
					VALUES (?,?,0,0,0,0)
					;',array($dateStamp,$month_id));
		}

		// get leaderboard using cached post data
		$users = $this->_getDb()->fetchAll('
				SELECT *
				FROM xf_top_users_cache p JOIN xf_user u ON p.user_id=u.user_id JOIN xf_user_profile r on p.user_id=r.user_id
				WHERE month_id = ?
				AND p.user_id > 0
				ORDER BY score_delta DESC
				;', array($month_id));


		//ie(Zend_Debug::dump($users));

		// data to send back
		$returnData=array();
		
		$returnData['query_time']=number_format(microtime(true)-$start_time,3);
		$returnData['updated_cache']=$updated_cache;

		$returnData['cache_date'] = '-';
		if (isset($users[0]['cache_date'])) $returnData['cache_date'] =date('Y-m-d H:i:s',$users[0]['cache_date']);

		$returnData['users'] = $users;
		
		//$returnData['month_str'] = date('F-Y',$fromDate);
		$returnData['month_str'] = date('m/Y',$fromDate);
		$month_names_string = new XenForo_Phrase('top_users_month_names');
		$month_names = explode(",", $month_names_string);
		if (count($month_names)==12) $returnData['month_str'] = $month_names[$month-1] . " " . $year;
			
		$returnData['month_id'] = $month_id;
		$returnData['month_id_minus'] = $month_id-1;
		$returnData['month_id_plus'] = $month_id+1;

		$returnData['month_up'] = 1;
		if ($month_now<=$month_id) $returnData['month_up'] = 0;
		$returnData['month_down'] = 1;
		if (($month_now-$month_id >= 12)) $returnData['month_down'] = 0;

		return $returnData;
	}

	/**
	 * @return XenForo_Model_Post
	 */
	protected function _getPostModel()
	{
		return $this->getModelFromCache('XenForo_Model_Post');
	}
}
