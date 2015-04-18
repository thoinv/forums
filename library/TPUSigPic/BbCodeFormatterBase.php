<?php

class TPUSigPic_BbCodeFormatterBase extends XFCP_TPUSigPic_BbCodeFormatterBase
{
	protected $_tags;
	
	public function getTags()
	{
		$this->_tags = parent::getTags();
	
		$this->_tags['sigpic'] = array(
			'hasOption' => false,
			'plainChildren' => true,
			'callback' => array($this, 'renderTagSigPic'),
		);
	
		return $this->_tags;
	}
	
	public function renderTagSigPic(array $tag, array $user)
	{
		$user=false;
		
		if (array_key_exists('0', $tag['children']))
			$user=XenForo_Model::create('XenForo_Model_User')->getUserById($tag['children'][0], array('join'=>XenForo_Model_User::FETCH_USER_PERMISSIONS));
		else
			$user=XenForo_Visitor::getInstance()->toArray();	// For signature preview to not fail
		
		if ($user)
		{
			$user['permissions'] = XenForo_Permission::unserializePermissions($user['global_permission_cache']);

			if (XenForo_Permission::hasPermission($user['permissions'], 'signature', 'sigpic'))
				return XenForo_Template_Helper_Core::callHelper('sigpic', array($user));
		}

		return '';
	}
}