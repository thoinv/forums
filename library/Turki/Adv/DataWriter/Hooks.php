<?php

class Turki_Adv_DataWriter_Hooks extends XenForo_DataWriter
{

	protected $_existingDataErrorPhrase = 'requested_adv_hooks_xenforo_not_found';

	protected function _getFields()
	{
		return array(
			'xf_advxenforo_hooks' => array(
				'hook_id'    => array(
					'type'          => self::TYPE_UINT,
					'autoIncrement' => TRUE
				),
				'hook_title' => array('type' => self::TYPE_STRING, 'maxLength' => 130, 'required' => TRUE, 'requiredError' => 'please_enter_valid_title_hooks'),
				'template'   => array('type' => self::TYPE_STRING, 'maxLength' => 100, 'required' => TRUE, 'requiredError' => 'please_enter_valid_template'),
				'hook_name'  => array('type' => self::TYPE_STRING, 'maxLength' => 150, 'required' => TRUE, 'verification' => array('$this', '_verifyHookName'), 'requiredError' => 'please_enter_valid_name_hooks'),
				'active'     => array('type' => self::TYPE_BOOLEAN, 'default' => 1)
			)
		);
	}

	protected function _verifyHookName(&$hookname)
	{
		if ($this->isInsert() || $hookname != $this->getExisting('hook_name')) {
			$id = $this->get('hook_id');

			$existing = $this->_getAdvHookModel()->getHookByText($hookname);
			foreach ($existing AS $text => $hook) {
				if (!$id || $hook['hook_id'] != $id) {
					$this->error(new XenForo_Phrase('hook_replacement_text_must_be_unique_x_in_use', array('text' => $hookname)), 'hook_name');
					return FALSE;
				}
			}
		}

		return TRUE;
	}

	protected function _getExistingData($data)
	{
		if (!$id = $this->_getExistingPrimaryKey($data)) {
			return FALSE;
		}

		return array('xf_advxenforo_hooks' => $this->_getAdvHookModel()->getAdvHookById($id));
	}

	protected function _getUpdateCondition($tableName)
	{
		return 'hook_id = ' . $this->_db->quote($this->getExisting('hook_id'));
	}

	protected function _verifyCriteria(&$criteria)
	{
		$criteriaFiltered = XenForo_Helper_Criteria::prepareCriteriaForSave($criteria);
		$criteria         = serialize($criteriaFiltered);
		return TRUE;
	}


	protected function _postSave()
	{
		$this->_rebuildAdvHookCache();
	}

	protected function _postDelete()
	{
		$this->_db->delete('xf_advxenforo_hooks', 'hook_id = ' . $this->_db->quote($this->get('hook_id')));
		$this->_rebuildAdvHookCache();
	}

	protected function _rebuildAdvHookCache()
	{
		$this->_getAdvHookModel()->rebuildAdvHookCache();
	}

	protected function _getAdvHookModel()
	{
		return $this->getModelFromCache('Turki_Adv_Model_Hooks');
	}
}