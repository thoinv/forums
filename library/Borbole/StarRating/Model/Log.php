<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_Model_Log extends XFCP_Borbole_StarRating_Model_Log
{
    //Get thread rating by id
    public function getRatingLogById($ratingId)
	{
		return $this->_getDb()->fetchRow('
				SELECT *
				FROM xf_thread_rating
				WHERE rating_id = ?
			', $ratingId
		);
	}
	
	//Search for ratings given by user 
	public function getRatingsLogsByUserId($userId)
	{
		return $this->fetchAllkeyed('
			   SELECT DISTINCT r.*, u.*, 
			   th.title AS title
	           FROM xf_thread_rating r
	           LEFT JOIN xf_user u ON (r.user_id=u.user_id)
		       LEFT JOIN xf_thread th ON (th.thread_id=r.thread_id)
			   WHERE r.user_id = ?
			   ORDER BY r.rating_date DESC
			   ', 'rating_id', $userId
		);
	}
	
    //Get all ratings
	public function getRatingsLog(array $fetchOptions = array())
	{
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		return $this->fetchAllKeyed($this->limitQueryResults('
			   SELECT DISTINCT r.*, u.*, 
			   th.title AS title, th.rating_sum AS stars
	           FROM xf_thread_rating r
	           LEFT JOIN xf_user u ON (r.user_id=u.user_id)
		       LEFT JOIN xf_thread th ON (th.thread_id=r.thread_id)
	           ORDER BY r.rating_date DESC
			', $limitOptions['limit'], $limitOptions['offset']
		), 'rating_id');
	}
	
	//Count all thread ratings
	public function countRatingsLog()
	{
		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_thread_rating
		');
	}
	
	//Delete thread rating entry
	public function deleteRatingEntry($id)
	{
		$dw = XenForo_DataWriter::create('Borbole_StarRating_DataWriter_Rating');
		$dw->setExistingData($id);
		
		$dw->delete();
		return $dw;
	}
	
	//Clear all thread ratings
	public function clearAllRatings()
	{
		$this->_getDb()->query('TRUNCATE TABLE xf_thread_rating');
		//Reset ratings count to 0 for all threads
		$this->_getDb()->query('UPDATE xf_thread SET rating_count = 0, rating_sum = 0, rating_avg = 0 ');
	}
	
	//Recount. See below
	public function recountRatings()
	{		
		@set_time_limit(0);
		ignore_user_abort(true);
		XenForo_Application::getDb()->setProfiler(false); 
		$db = $this->_getDb();
			
		
		//Delete ratings(s) given in threads that do not exists anymore
		$db->query("DELETE ratings.*
 		            FROM xf_thread_rating AS ratings
					LEFT JOIN xf_thread AS thread 
					ON (ratings.thread_id = thread.thread_id)
					WHERE thread.thread_id IS NULL
		");	

	    //Delete ratings(s) given by users that do not exists anymore
	    $db->query("DELETE ratings.* 
		            FROM xf_thread_rating AS ratings
					LEFT JOIN xf_user AS user 
					ON (ratings.user_id = user.user_id)
					WHERE user.user_id IS NULL
		");			  
        
		XenForo_Db::commit($db);
	}
	
}