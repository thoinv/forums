<?php

//######################## Star Rating Threads By Borbole ###########################
class  Borbole_StarRating_DataWriter_Discussion_Thread extends XFCP_Borbole_StarRating_DataWriter_Discussion_Thread
{
    /**
	* Gets the fields that are defined for the table. See parent for explanation.
	*
	* @return array
	*/
	protected function _getFields() 
	{
		$fields = parent::_getFields();
		
		$fields['xf_thread']['rating_count'] = array('type' => self::TYPE_UINT_FORCED, 'default' => 0);
		$fields['xf_thread']['rating_sum'] = array('type' => self::TYPE_UINT_FORCED, 'default' => 0);
		$fields['xf_thread']['rating_avg'] = array('type' => self::TYPE_FLOAT, 'default' => 0);
		
		return $fields;
	}
	
	/**
	 * Specific discussion pre-save behaviors.
	 */
	protected function _discussionPreSave()
	{
		if ($this->isInsert())
		{
			$this->updateRating(
				intval($this->get('rating_sum')), intval($this->get('rating_count'))
			);
		}
	}
	
	/**
	 * Update the xf_thread_rating table to reflect the new rating
	 *
	 * @param integer $rating
	 */
	public function updateRating($adjustSum = null, $adjustCount = null)
	{
		if ($adjustSum === null && $adjustCount === null)
		{
			$rating = $this->_db->fetchRow('
				SELECT COUNT(*) AS total, SUM(rating) AS sum
				FROM xf_thread_rating
				WHERE thread_id = ?
				', $this->get('thread_id'));

			$this->set('rating_sum', $rating['sum']);
			$this->set('rating_count', $rating['total']);
		}
		else
		{
			if ($adjustSum !== null)
			{
				$this->set('rating_sum', $this->get('rating_sum') + $adjustSum);
			}
			if ($adjustCount !== null)
			{
				$this->set('rating_count', $this->get('rating_count') + $adjustCount);
			}
		}

		if ($this->get('rating_count'))
		{
			$this->set('rating_avg', $this->get('rating_sum') / $this->get('rating_count'));
		}
		else
		{
			$this->set('rating_avg', 0);
		}
	}
}