<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_DataWriter_Rating extends XenForo_DataWriter
{
    /**
	* Gets the fields that are defined for the table. See parent for explanation.
	*
	* @return array
	*/
	
	protected function _getFields()
	{
		return array(
			'xf_thread_rating' => array(
				'rating_id'	=> array('type' => self::TYPE_UINT, 'autoIncrement' => true),
				'thread_id'	=> array('type' => self::TYPE_UINT, 'required' => true),
				'user_id'	=> array('type' => self::TYPE_UINT, 'required' => true),
				'rating'	=> array('type' => self::TYPE_UINT, 'required' => true, 'min' => 1, 'max' => 5),
				'message'   => array('type' => self::TYPE_STRING, 'maxLength' => 150),
				'is_anonymous' => array('type' => self::TYPE_BOOLEAN, 'default' => 0),
				'rating_date' => array('type' => self::TYPE_UINT, 'required' => true, 'default' => XenForo_Application::$time),
			)	
		);
	}

	/**
	* Gets the actual existing data out of data that was passed in. See parent for explanation.
	*
	* @param mixed
	*
	* @return array|bool
	*/
	protected function _getExistingData($data) 
	{
		if (!$ratingId = $this->_getExistingPrimaryKey($data, 'rating_id')) 
		{
			return false;
		}

		return array('xf_thread_rating' => $this->_getRatingModel()->getRatingById($ratingId));
	}

	/**
	* Gets SQL condition to update the existing record.
	*
	* @return string
	*/
	protected function _getUpdateCondition($tableName)
	{
		return 'rating_id = ' . $this->_db->quote($this->getExisting('rating_id'));
	}

	/**
	 * Pre-save handling.
	 */
	protected function _preSave()
	{
		if (!$this->get('user_id') || !$this->get('thread_id'))
		{
			throw new XenForo_Exception('Must provide user and thread ID');
		}

		if ($this->isChanged('user_id') || $this->isChanged('thread_id'))
		{
			$existing = $this->_getRatingModel()->getRatingByThreadAndUserId(
				$this->get('thread_id'), $this->get('user_id')
			);
			
			if ($existing)
			{
				throw new XenForo_Exception('Duplicate record insert attempted');
			}
		}
	}

	/**
	 * Post-save handling.
	 */
	protected function _postSave()
	{
		$this->_updateThreadRatings($this->get('rating'));
	}

	/**
	 * Post-delete handling.
	 */
	protected function _postDelete()
	{
		$this->_updateThreadRatings($this->getExisting('rating'), true);
	}

	/**
	 * Update the xf_thread table to reflect the new rating
	 *
	 * @param integer $rating
	 */
	protected function _updateThreadRatings($rating)
	{
		$threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread');
		$threadDw->setExistingData($this->get('thread_id'));

		$threadDw->set('rating_sum', $threadDw->get('rating_sum') + $rating - $this->getExisting('rating'));
		
		$threadDw->updateRating();		

		$threadDw->save();
	}

	/**
	* @return Borbole_StarRating_Model_Rating
	*/
	protected function _getRatingModel()
	{
		return $this->getModelFromCache('Borbole_StarRating_Model_Rating');
	}

}