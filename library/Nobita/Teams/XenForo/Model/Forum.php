<?php

class Nobita_Teams_XenForo_Model_Forum extends XFCP_Nobita_Teams_XenForo_Model_Forum
{
	public $passXenPerm = false;

	public function canPostThreadInForum(array $forum, &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null)
	{
		if (! $this->passXenPerm)
		{
			return parent::canPostThreadInForum($forum, $errorPhraseKey, $nodePermissions, $viewingUser);
		}

		// wow.. still post to forum if you don\t have
		// permission to do.
		// inherit from Nobita_Teams_Model_Thread::canAddThread
		return true;
	}
}