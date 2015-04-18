<?php

class bdSocialShare_bdMedal_DataWriter_Awarded extends XFCP_bdSocialShare_bdMedal_DataWriter_Awarded
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::BDMEDAL_MODEL_AWARDED_AWARD]))
		{
			$GLOBALS[bdSocialShare_Listener::BDMEDAL_MODEL_AWARDED_AWARD]->bdSocialShare_award($this);
		}

		return parent::_postSaveAfterTransaction();
	}

}
