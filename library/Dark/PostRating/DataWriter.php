<?php

class Dark_PostRating_DataWriter extends XenForo_DataWriter
{
	
	const DATA_TITLE = 'phraseTitle';
	
	protected $_existingDataErrorPhrase = 'dark_requested_rating_not_found';
	
	/**
	* Gets the fields that are defined for the table. See parent for explanation.
	*
	* @return array
	*/
	protected function _getFields()
	{						
		$options = XenForo_Application::get('options');
		return array(
			'dark_postrating_ratings' => array(
				'id'             => array('type' => self::TYPE_UINT,   'autoIncrement' => true),
				'name'           => array('type' => self::TYPE_STRING, 'required' => false),
				//'title'          => array('type' => self::TYPE_STRING, 'required' => true),
				'disabled'       => array('type' => self::TYPE_BOOLEAN, 'required' => true),
				'whitelist'      => array('type' => self::TYPE_SERIALIZED, 'required' => true),
				'group_whitelist'=> array('type' => self::TYPE_SERIALIZED, 'required' => true),
				'op_only'        => array('type' => self::TYPE_BOOLEAN, 'required' => true),
				'type'           => array('type' => self::TYPE_INT,   'required' => true),
				'display_order'  => array('type' => self::TYPE_UINT,   'required' => true),
				'sprite_mode'    => array('type' => self::TYPE_BOOLEAN, 'default' => false),
				'sprite_params'  => array('type' => self::TYPE_SERIALIZED, 'default' => ''),
			)
		);
	}

	/**
	* Gets the actual existing data out of data that was passed in. See parent for explanation.
	*
	* @param mixed
	*
	* @return array|false
	*/
	protected function _getExistingData($data)
	{
		if (!$id = $this->_getExistingPrimaryKey($data))
		{
			return false;
		}

		return array('dark_postrating_ratings' => $this->_getModel()->getRatingDefinitionById($id));
	}

	/**
	* Gets SQL condition to update the existing record.
	*
	* @return string
	*/
	protected function _getUpdateCondition($tableName)
	{
		return 'id = ' . $this->_db->quote($this->getExisting('id'));
	}

	protected function _preSave()
	{        
		$titlePhrase = $this->getExtraData(self::DATA_TITLE);
		if ($titlePhrase !== null && strlen($titlePhrase) == 0)
		{
			$this->error(new XenForo_Phrase('please_enter_valid_title'), 'title');
		}
	}

	protected function _postSave()
	{
		$ratingId = $this->get('id');

		$titlePhrase = $this->getExtraData(self::DATA_TITLE);
		if ($titlePhrase !== null)
		{
			$this->_insertOrUpdateMasterPhrase(
				$this->_getTitlePhraseName($ratingId), $titlePhrase, '', array('global_cache' => 1)
			);
			
		}
		
		$this->_getModel()->getRatings(true);
	}

	protected function _postDelete()
	{		
		$id = $this->get('id');
		$db = $this->_db;
		
		$this->_deleteMasterPhrase($this->_getTitlePhraseName($id));
		
		$db->delete('dark_postrating', 'rating = ' . $db->quote($id));
		
		$this->_getModel()->getRatings(true);
	}

	/**
	 * @return Dark_PostRating_Model
	 */
	protected function _getModel()
	{
		return $this->getModelFromCache('Dark_PostRating_Model');
	}
	
	protected function _getTitlePhraseName($id)
	{
		return $this->_getModel()->getRatingTitlePhraseName($id);
	}

}