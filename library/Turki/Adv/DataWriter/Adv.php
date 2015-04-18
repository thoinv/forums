<?php

class Turki_Adv_DataWriter_Adv extends XenForo_DataWriter
{

	protected $_existingDataErrorPhrase = 'requested_adv_xenforo_not_found';

	protected function _getFields()
	{
		return array(
			'xf_advxenforo' => array(
				'adv_id'        => array(
					'type'          => self::TYPE_UINT,
					'autoIncrement' => TRUE
				),
				'title'         => array('type' => self::TYPE_STRING, 'maxLength' => 230, 'required' => TRUE, 'requiredError' => 'please_enter_valid_title'),
				'adv_hook_name' => array('type' => self::TYPE_STRING, 'maxLength' => 80, 'required' => TRUE, 'requiredError' => 'please_enter_valid_adv_hook_name'),
				'adv_large'     => array('type' => self::TYPE_STRING, 'required' => TRUE, 'requiredError' => 'please_enter_valid_adv_large'),
				'adv_small'     => array('type' => self::TYPE_STRING, 'required' => TRUE, 'requiredError' => 'please_enter_valid_adv_small'),
				'display'       => array('type' => self::TYPE_STRING, 'maxLength' => 18, 'required' => TRUE, 'requiredError' => 'please_enter_valid_adv_xenforo_display'),
				'user_criteria' => array('type' => self::TYPE_UNKNOWN, 'required' => TRUE, 'verification' => array('$this', '_verifyCriteria')),
				'page_criteria' => array('type' => self::TYPE_UNKNOWN, 'required' => TRUE, 'verification' => array('$this', '_verifyCriteria')),
				'post_criteria' => array('type' => self::TYPE_UNKNOWN, 'required' => TRUE, 'verification' => array('$this', '_verifyCriteria')),
				'active'        => array('type' => self::TYPE_BOOLEAN, 'default' => 1)
			)
		);
	}

	protected function _getExistingData($data)
	{
		if (!$id = $this->_getExistingPrimaryKey($data)) {
			return FALSE;
		}

		return array('xf_advxenforo' => $this->_getAdvModel()->getAdvById($id));
	}

	protected function _getUpdateCondition($tableName)
	{
		return 'adv_id = ' . $this->_db->quote($this->getExisting('adv_id'));
	}

	protected function _verifyCriteria(&$criteria)
	{
		$criteriaFiltered = XenForo_Helper_Criteria::prepareCriteriaForSave($criteria);
		$criteria         = serialize($criteriaFiltered);
		return TRUE;
	}

	protected function _postSave()
	{
		$this->_rebuildAdvCache();
	}

	protected function _postDelete()
	{
		$this->_db->delete('xf_advxenforo', 'adv_id = ' . $this->_db->quote($this->get('adv_id')));
		$this->_rebuildAdvCache();
	}

	protected function _postEdit()
	{
		$this->_rebuildAdvCache();
	}

	protected function _rebuildAdvCache()
	{
		Turki_Adv_CronEntry_Cache::runCron();
	}

	protected function _getAdvModel()
	{
		return $this->getModelFromCache('Turki_Adv_Model_Adv');
	}
}