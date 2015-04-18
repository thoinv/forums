<?php

class bdSocialShare_XI_Blog_DataWriter_Discussion_Draft extends XFCP_bdSocialShare_XI_Blog_DataWriter_Discussion_Draft
{
	protected function _getFields()
	{
		$fields = parent::_getFields();

		$fields['xf_xi_blog_entry_draft']['bdsocialshare_scheduled'] = array('type' => XenForo_DataWriter::TYPE_SERIALIZED);

		return $fields;
	}

	protected function _messagePreSave()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_INDEX_ADD_ENTRY]))
		{
			$GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_INDEX_ADD_ENTRY]->bdSocialShare_actionAddEntry($this);
		}
		elseif (isset($GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_BLOGDRAFT_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::XI_BLOG_CONTROLLERPUBLIC_BLOGDRAFT_SAVE]->bdSocialShare_actionSave($this);
		}

		return parent::_messagePreSave();
	}
	
	protected function _postDelete()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XI_BLOG_MODEL_DRAFT_PUBLISH_PENDING]))
		{
			$GLOBALS[bdSocialShare_Listener::XI_BLOG_MODEL_DRAFT_PUBLISH_PENDING]->bdSocialShare_publishPendingDrafts_draftPostDelete($this);
		}
		
		return parent::_postDelete();
	}

}
