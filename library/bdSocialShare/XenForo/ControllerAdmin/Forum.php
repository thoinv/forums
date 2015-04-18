<?php

class bdSocialShare_XenForo_ControllerAdmin_Forum extends XFCP_bdSocialShare_XenForo_ControllerAdmin_Forum
{
	public function actionSave()
	{
		$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERADMIN_FORUM_SAVE] = $this;

		return parent::actionSave();
	}

	public function bdSocialShare_actionSave(XenForo_DataWriter_Forum $forumDw)
	{
		$threadAutoOverride = $this->_input->filterSingle('bdSocialShare_threadAuto_override', XenForo_Input::UINT);

		if ($threadAutoOverride)
		{
			$threadAuto = $this->_input->filterSingle('bdSocialShare_threadAuto', XenForo_Input::ARRAY_SIMPLE);
			$forumDw->set('bdsocialshare_threadauto', $threadAuto);
		}
		else
		{
			$forumDw->set('bdsocialshare_threadauto', serialize(false));
		}

		unset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERADMIN_FORUM_SAVE]);
	}

}
