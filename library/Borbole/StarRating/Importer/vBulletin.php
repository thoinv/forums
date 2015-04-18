<?php

//######################## Star Rating Threads By Borbole ###########################
define('Borbole_StarRating_Importer_vBulletin_LOADED', true);

class Borbole_StarRating_Importer_vBulletin extends XFCP_Borbole_StarRating_Importer_vBulletin 
{
	public function getSteps() 
	{
		$steps = parent::getSteps();
		
		if (!empty($steps['rating']))
		{
			unset($steps['rating']);
		}
		
		$steps['rating'] = array(
			'title' => 'Thread Ratings',
			'depends' => array('threads'),
		);
		
		$steps['ratingValue'] = array(
			'title' => 'Thread Ratings Stats',
			'depends' => array('rating'),
		);
		
		return $steps;
	}
	
	public function stepRating($start, array $options) 
	{
		$options = array_merge(array(
			'max' => false,
			'limit' => 500,
			'processed' => 0,
		), $options);

		$sDb = $this->_sourceDb;
		$prefix = $this->_prefix;
		$model = $this->_importModel;
		
		if ($options['max'] === false) 
		{
			$data = $sDb->fetchRow('
				SELECT MAX(threadrateid) AS max, COUNT(threadrateid) AS rows
				FROM ' . $prefix . 'threadrate
			');

			$options = array_merge($options,$data);
		}

		$ratings = $sDb->fetchAll($sDb->limit('
				SELECT *
				FROM ' . $prefix . 'threadrate
				WHERE threadrateid >= ' . $sDb->quote($start) . '
				ORDER BY threadrateid
			', $options['limit']
		));

		if (!$ratings) 
		{
			return true;
		}

		$next = 0;
		$total = 0;

		$userids = array();
		$threadids = array();

		foreach ($ratings AS $rating) 
		{
			$userids[] = $rating['userid'];
			$threadids[] = $rating['threadid'];
		}

		$userIdMap = $model->getImportContentMap('user', $userids);
		$threadIdMap = $model->getImportContentMap('thread', $threadids);
		$users = $model->getModelFromCache('XenForo_Model_User')->getUsersByIds($userIdMap);

		XenForo_Db::beginTransaction();

		foreach ($ratings AS $rating) 
		{
			$receiverUserId = $this->_mapLookUp($userIdMap, $rating['userid']);
			$threadId = $this->_mapLookUp($threadIdMap, $rating['threadid']);

			if ($receiverUserId > 0 && $threadId > 0) 
			{
				$dw = XenForo_DataWriter::create('Borbole_StarRating_DataWriter_Rating', XenForo_DataWriter::ERROR_ARRAY);
				$dw->set('thread_id', $threadId);
				$dw->set('user_id', $receiverUserId);
				$dw->set('rating', $rating['vote']);
				
				$dw->save();
			}
			
			$total++;
			$next = $rating['threadrateid'] + 1;
		}

		XenForo_Db::commit();

		$options['processed'] += $total; 
		$this->_session->incrementStepImportTotal($total);
		
		return array($next, $options, $this->_getProgressOutput($options['processed'], $options['rows']));
	}
	
	public function stepRatingValue($start, array $options) 
	{
		$options = array_merge(array(
			'max' => false,
			'limit' => 500,
			'processed' => 0,
		), $options);

		$sDb = $this->_sourceDb;
		$prefix = $this->_prefix;
		$model = $this->_importModel;
		
		if ($options['max'] === false) 
		{
			$data = $sDb->fetchRow('
				SELECT MAX(postuserid) AS max, COUNT(postuserid) AS rows
				FROM ' . $prefix . 'thread
			');

			$options = array_merge($options,$data);
		}

		$threads = $sDb->fetchAll($sDb->limit('
				SELECT threadid, votenum, votetotal
				FROM ' . $prefix . 'thread
				WHERE threadid >= ' . $sDb->quote($start) . '
				ORDER BY threadid
			', $options['limit']
		));

		if (!$threads) 
		{
			return true;
		}

		$next = 0;
		$total = 0;

		$threadsids = array();

		foreach ($threads AS $thread) 
		{
			$threadsids[] = $thread['threadid'];
		}

		$threadsIdMap = $model->getImportContentMap('thread', $threadsids);

		XenForo_Db::beginTransaction();

		foreach ($threads AS $thread) 
		{
			$importedthreadId = $this->_mapLookUp($threadsIdMap, $thread['threadid']);

			if ($importedthreadId) 
			{
				$this->_db->query('
					UPDATE xf_thread
					SET rating_count = ?,
					rating_sum = ?
					WHERE thread_id = ?
				', array($thread['votenum'], $thread['votetotal'], $importedthreadId));
				
				$total++;
			}
			
			$next = $thread['threadid'] + 1;
		}

		XenForo_Db::commit();

		$options['processed'] += $total; 
		$this->_session->incrementStepImportTotal($total);
		
		return array($next, $options, $this->_getProgressOutput($options['processed'], $options['rows']));
	}
}