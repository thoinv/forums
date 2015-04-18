<?php

class bdSocialShare_XI_Blog_DataWriter_Discussion_Entry extends XFCP_bdSocialShare_XI_Blog_DataWriter_Discussion_Entry
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_INDEX_ADD_ENTRY]))
		{
			$GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_INDEX_ADD_ENTRY]->bdSocialShare_actionAddEntry($this);
		}
		elseif (isset($GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_BLOGDRAFT_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_BLOGDRAFT_SAVE]->bdSocialShare_actionSave($this);
		}
		elseif (isset($GLOBALS[bdSocialShare_Listener::XI_BLOG_MODEL_DRAFT_PUBLISH_PENDING]))
		{
			$GLOBALS[bdSocialShare_Listener::XI_BLOG_MODEL_DRAFT_PUBLISH_PENDING]->bdSocialShare_publishPendingDrafts_entryPostSave($this);
		}

		return parent::_postSaveAfterTransaction();
	}

}
