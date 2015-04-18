<?php

class bdSocialShare_NFLJ_Showcase_DataWriter_Item extends XFCP_bdSocialShare_NFLJ_Showcase_DataWriter_Item
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::NFLJ_SHOWCASE_CONTROLLERPUBLIC_INDEX_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::NFLJ_SHOWCASE_CONTROLLERPUBLIC_INDEX_SAVE]->bdSocialShare_actionSave($this);
		}

		return parent::_postSaveAfterTransaction();
	}
}
