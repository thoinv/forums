<?php

class bdSocialShare_XenForo_Model_Forum extends XFCP_bdSocialShare_XenForo_Model_Forum
{
	protected $_bdSocialShare_canViewForum = null;

	public function bdSocialShare_setCanViewForum($canView)
	{
		$this->_bdSocialShare_canViewForum = $canView;
	}

	public function canViewForum(array $forum, &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null)
	{
		if (is_bool($this->_bdSocialShare_canViewForum))
		{
			return $this->_bdSocialShare_canViewForum;
		}

		return parent::canViewForum($forum, $errorPhraseKey, $nodePermissions, $viewingUser);
	}

}
