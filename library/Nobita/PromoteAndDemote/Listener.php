<?php
class Nobita_PromoteAndDemote_Listener
{
	public static function load_model($class, array &$extend)
	{
		if($class == 'XenForo_Model_User')
		{
			$extend[] = 'Nobita_PromoteAndDemote_Model_User';
		}else if($class == 'XenForo_Model_UserGroup')
		{
			$extend[] = 'Nobita_PromoteAndDemote_Model_UserGroup';
		}
	}
	
	public static function loadControllers($class, array &$extend)
	{
		if($class == 'XenForo_ControllerPublic_Member')
		{
			$extend[] = 'Nobita_PromoteAndDemote_ControllerPublic_Member';
		}
	}
	
	public static function template_hook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		if($hookName == 'member_card_links')
		{
			$params = $template->getParams();
			$params += $hookParams;
			
			$userModel = XenForo_Model::create('XenForo_Model_User');
			
			$params += array(
				'canPromote' => $userModel->canPromote($params['user'])
			);
			
			$contents .= $template->create('member_promote_links', $params);
		}
	}
}