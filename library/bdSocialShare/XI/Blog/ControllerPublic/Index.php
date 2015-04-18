<?php

class bdSocialShare_XI_Blog_ControllerPublic_Index extends XFCP_bdSocialShare_XI_Blog_ControllerPublic_Index
{
	public function actionAddEntry()
	{
		$GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_INDEX_ADD_ENTRY] = $this;

		return parent::actionAddEntry();
	}

	public function bdSocialShare_actionAddEntry(XI_Blog_DataWriter_Discussion $dw)
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

		unset($GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_INDEX_ADD_ENTRY]);
	}

}
