<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
class Nobita_Teams_ControllerAdmin_MemberGroup extends XenForo_ControllerAdmin_Abstract
{
	protected function _preDispatch($action)
	{
		$this->assertAdminPermission('socialGroups');
	}

	public function actionIndex()
	{
		$model = $this->_getMemberGroupModel();
		$groups = $model->getGroups();

		$viewParams = array(
			'groups' => $groups
		);

		return $this->responseView('Nobita_Teams_ViewPublic_MemberGroup_Index', 'Team_member_group', $viewParams);
	}
	
	public function actionAdd()
	{
		return $this->_getAddOrEditResponse(array('display_order' => 10));
	}
	
	protected function _getBasicPerms () {
		return array(
			'canAssign' => array(
				'label' => new XenForo_Phrase('Teams_advanced_permission_canAssign'),
				'hint' => new XenForo_Phrase('Teams_if_enabled_admin_of_team_can_assign_user_into_team')
			),
			'canRemove' => array(
				'label' => new XenForo_Phrase('Teams_advanced_permission_canRemove'),
				'hint' => new XenForo_Phrase('Teams_if_enabled_admin_of_team_can_remove_any_members')
			),
			'canPromote' => array(
				'label' => new XenForo_Phrase('Teams_advanced_permission_canPromote'),
				'hint' => new XenForo_Phrase('Teams_if_enabled_admin_of_team_can_promote_any_members')
			),
			'canManageContent' => array(
				'label' => new XenForo_Phrase('Teams_advanced_permission_canManageContent'),
				'hint' => new XenForo_Phrase('Teams_if_enabled_admin_of_team_can_manage_content_posted_on_team')
			),
			'canApproveOrUnapproved' => array(
				'label' => new XenForo_Phrase('Teams_advanced_permission_canApproveOrUnapproved'),
				'hint' => new XenForo_Phrase('Teams_if_enabled_admin_of_team_can_approve_or_unapproved_requesting_join')
			),
			'canSticky' => array(
				'label' => new XenForo_Phrase('Teams_advanced_permission_canSticky'),
				'hint' => new XenForo_Phrase('Teams_if_enabled_admin_of_team_can_sticky_post')
			),
			'manageAvatar' => array(
				'label' => new XenForo_Phrase('Teams_advanced_permission_manageAvatar'),
				'hint' => new XenForo_Phrase('Teams_if_enabled_admin_of_team_can_manage_avatar')
			),
			'manageCover' => array(
				'label' => new XenForo_Phrase('Teams_advanced_permission_manageCover'),
				'hint' => new XenForo_Phrase('Teams_if_enabled_admin_of_team_can_manage_cover')
			),
			'bypassPosting' => array(
				'label' => new XenForo_Phrase('Teams_bypass_posting_to_team'),
				'hint' => new XenForo_Phrase('Teams_bypass_posting_to_team_explain')
			),
			'banUser' => array(
				'label' => new XenForo_Phrase('Teams_ban_user'),
				'hint' => new XenForo_Phrase('Teams_ban_user_explain')
			),

			'massAlert' => array(
				'label' => new XenForo_Phrase('Teams_mass_alerts'),
				'hint' => new XenForo_Phrase('Teams_mass_alert_explain')
			)
		);
	}

	protected function _getAddOrEditResponse(array $group = null)
	{
		$groupPerms = isset($group['permissions']) ? unserialize($group['permissions']) : false;

		$viewParams = array(
			'group' => $group,
			'perms' => $this->_getBasicPerms(),
			'groupPerms' => $groupPerms
		);

		return $this->responseView('Nobita_Teams_ViewPublic_MemberGroup_Edit', 'Team_member_group_edit', $viewParams);
	}
	
	public function actionEdit()
	{
		$group = $this->_getGroupOrError();
		return $this->_getAddOrEditResponse($group);
	}

	protected function _getGroupOrError($id = null)
	{
		if ($id === null)
		{
			$id = $this->_input->filterSingle('member_group_id', XenForo_Input::STRING);
		}
		
		$result = $this->_getMemberGroupModel()->getGroupById($id);
		if (!$result)
		{
			throw $this->responseException($this->responseError(new XenForo_Phrase('Teams_requested_member_group_not_found'), 404));
		}
		
		return $result;
	}

	public function actionSave()
	{
		$id = $this->_input->filterSingle('member_group_id', XenForo_Input::STRING);
		$new = $this->_input->filterSingle('new_member_group_id', XenForo_Input::STRING);

		$input = $this->_input->filter(array(
			'group_title' => XenForo_Input::STRING,
			'permissions' => XenForo_Input::ARRAY_SIMPLE,
			'display_order' => XenForo_Input::UINT,
			'notice' => XenForo_Input::BOOLEAN,
			'is_staff' => XenForo_Input::BOOLEAN
		));

		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_MemberGroup');
		if ($id)
		{
			$dw->setExistingData($id);
		}
		else
		{
			$dw->set('member_group_id', $new);
		}

		$dw->bulkSet($input);
		$dw->save();

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('team-member-groups') . $this->getLastHash($dw->get('member_group_id'))
		);
	}
	
	public function actionDelete()
	{
		$group = $this->_getGroupOrError();
		if ($this->isConfirmedPost())
		{
			return $this->_deleteData('Nobita_Teams_DataWriter_MemberGroup', $group, XenForo_Link::buildAdminLink('team-member-groups'));
		}
		else
		{
			return $this->responseView('', 'Team_member_group_delete', array(
				'group' => $group
			));
		}
	}

	protected function _getMemberGroupModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_MemberGroup');
	}
}