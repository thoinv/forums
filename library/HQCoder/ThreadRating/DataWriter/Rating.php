<?php

class HQCoder_ThreadRating_DataWriter_Rating extends XenForo_DataWriter
{

	protected function _getFields()
	{
		return array(
			'tr_rating' => array(
				'rating_id'	=> array('type' => self::TYPE_UINT, 'autoIncrement' => true),
				'thread_id'	=> array('type' => self::TYPE_UINT, 'required' => true),
				'user_id'	=> array('type' => self::TYPE_UINT, 'required' => true),
				'rating'	=> array('type' => self::TYPE_UINT, 'required' => true, 'min' => 1, 'max' => 5),
				'date'		=> array('type' => self::TYPE_UINT, 'required' => true, 'default' => XenForo_Application::$time),
			)	
		);
	}

	protected function _getExistingData($data)
	{
		$threadId = false;
		$userId = false;
		$ratingId = false;

		if (!is_array($data))
		{
			$ratingId = $data;
		}
		else if (isset($data['thread_id'], $data['user_id']))
		{
			$threadId = $data['thread_id'];
			$userId = $data['user_id'];
		}
		else if (isset($data[0], $data[1]))
		{
			$threadId = $data[0];
			$userId = $data[1];
		}
		else
		{
			return false;
		}

		if ($ratingId)
		{
			$rating = $this->_getRatingModel()->getRatingById($ratingId);
		}
		else
		{
			$rating = $this->_getRatingModel()->getRatingByThreadAndUserId($threadId, $userId);
		}

		return array('tr_rating' => $rating);
	}

	protected function _getUpdateCondition($tableName)
	{
		return 'rating_id = ' . $this->_db->quote($this->getExisting('rating_id'));
	}

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

	protected function _postSave()
	{
		$this->_updateThreadRate($this->get('rating'), null);
	}

	protected function _postDelete()
	{
		$this->_updateThreadRate($this->getExisting('rating'), true);
	}

	/**
	 * Update the tr_thread_rating table to reflect the new rating
	 *
	 * @param integer $rating
	 */
	protected function _updateThreadRate($rating, $isDelete = null)
	{
		if ($isDelete)
		{

			$existing = $this->_db->fetchOne('
				SELECT count FROM tr_thread_rate WHERE thread_id = ?
			', $this->get('thread_id'));
				
			if ($existing > 1)
			{
				$this->_db->query('
					UPDATE tr_thread_rate
					SET count = count - 1, sum = sum - ?, avg = sum/count
					WHERE thread_id = ?
				', array($rating, $this->get('thread_id')));
			} else {
				$this->_db->query('
					DELETE FROM tr_thread_rate
					WHERE thread_id = ?
				', array($this->get('thread_id')));
			}
		}
		else
		{
			$sum = $rating - intval($this->getExisting('rating'));

			$thread_id = $this->get('thread_id') ? $this->get('thread_id') : 'null';

			$this->_db->query('
					INSERT INTO tr_thread_rate (thread_id, count, sum, avg) VALUES (?, 1, ?, sum)
					ON DUPLICATE KEY UPDATE count = count + 1, sum = sum + ?, avg = sum/count
					', array($thread_id, $rating, $sum));
		}
	}

	protected function _getRatingModel()
	{
		return $this->getModelFromCache('HQCoder_ThreadRating_Model_Rating');
	}

}