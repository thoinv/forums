<?php
/**
 * @project		customize group title for each member
 * @date 		19-06-2014
 * @author		truonglv<at>outlook.com
 * @package		Nobita_Teams
 */
class Nobita_Teams_DataWriter_MemberGroup extends XenForo_DataWriter 
{
	const DATAREGISTRY_KEY = 'Teams_group_member_permissions';

	protected function _getFields()
	{
		return array(
			'xf_team_member_group' => array(
				'member_group_id' 		=> array(
					'type' => self::TYPE_BINARY, 
					'required' => true, 
					'maxLength' => 25,
					'verification' => array('$this', '_verifyGroupId'), 
					'requiredError' => 'please_enter_valid_field_id'
				),
				'group_title' 			=> array(
					'type' => self::TYPE_STRING, 
					'required' => true, 
					'maxLength' => 25
				),
				'permissions' 			=> array(
					'type' => self::TYPE_SERIALIZED, 
					'default' => 'a:0:{}'
				),
				'display_order' 		=> array(
					'type' => self::TYPE_UINT, 
					'default' => 10
				),
				'notice' 				=> array(
					'type' => self::TYPE_BOOLEAN, 
					'default' => 0
				),
				'is_staff' 				=> array(
					'type' => self::TYPE_BOOLEAN, 
					'default' => 0
				)
			)
		);
	}

	protected function _getExistingData($data) {
		if (!$id = $this->_getExistingPrimaryKey($data, 'member_group_id'))
		{
			return false;
		}

		return array('xf_team_member_group' => $this->_getMemberGroupModel()->getGroupById($id));
	}

	protected function _getUpdateCondition($tableName) {
		return 'member_group_id = ' . $this->_db->quote($this->getExisting('member_group_id'));
	}

	protected function _verifyGroupId(&$id) {
		if (preg_match('/[^a-z0-9_]/', $id))
		{
			$this->error(new XenForo_Phrase('Teams_please_enter_an_id_using_only_alphanumeric'), 'member_group_id');
			return false;
		}

		if ($id !== $this->getExisting('member_group_id') && $this->_getMemberGroupModel()->getGroupById($id))
		{
			$this->error(new XenForo_Phrase('field_ids_must_be_unique'), 'member_group_id');
			return false;
		}

		return true;
	}

	protected function _postSave()
	{
		$this->_getMemberGroupModel()->saveGroupPermDataCache();
	}

	protected function _postDelete()
	{
		$db = $this->_db;

		if ('member' == $this->get('member_group_id')
			|| 'admin' == $this->get('member_group_id')
		)
		{
			throw new Nobita_Teams_Exception_Abstract("You can't delete the basic group.", true);
		}

		$db->update('xf_team_member', array('position' => 'member'), 'position = ' . $db->quote($this->get('member_group_id')));
		$this->_getMemberGroupModel()->saveGroupPermDataCache();
	}

	protected function _getMemberGroupModel() {
		return $this->getModelFromCache('Nobita_Teams_Model_MemberGroup');
	}
}