<?php

class bdSocialShare_XenForo_Model_Thread extends XFCP_bdSocialShare_XenForo_Model_Thread
{
	protected $_bdSocialShare_canViewThread = null;

	public function bdSocialShare_setCanViewThread($canView)
	{
		$this->_bdSocialShare_canViewThread = $canView;
	}

	public function canViewThread(array $thread, array $forum, &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null)
	{
		if (is_bool($this->_bdSocialShare_canViewThread))
		{
			return $this->_bdSocialShare_canViewThread;
		}

		return parent::canViewThread($thread, $forum, $errorPhraseKey, $nodePermissions, $viewingUser);
	}

}
