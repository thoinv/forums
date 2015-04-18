<?php

class bdSocialShare_XI_Blog_ControllerPublic_BlogDraft extends XFCP_bdSocialShare_XI_Blog_ControllerPublic_BlogDraft
{
	public function actionSave()
	{
		$GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_BLOGDRAFT_SAVE] = $this;

		return parent::actionSave();
	}

	public function bdSocialShare_actionSave(XI_Blog_DataWriter_Discussion $dw)
	{
		/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');

		if ($dw instanceof XI_Blog_DataWriter_Discussion_Entry)
		{
			$helper->publishAsNeeded('xiBlogEntryPublish', new bdSocialShare_Shareable_XI_Blog_Entry($dw));
		}
		elseif ($dw instanceof XI_Blog_DataWriter_Discussion_Draft)
		{
			$helper->schedule('xiBlogEntryPublish', $dw, 'bdsocialshare_scheduled');
		}

		unset($GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_BLOGDRAFT_SAVE]);
	}

}
