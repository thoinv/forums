<?php

class bdSocialShare_NFLJ_Showcase_ControllerPublic_Index extends XFCP_bdSocialShare_NFLJ_Showcase_ControllerPublic_Index
{
	public function actionAddSave()
	{
		$GLOBALS[bdSocialShare_Listener::NFLJ_SHOWCASE_CONTROLLERPUBLIC_INDEX_SAVE] = $this;

		return parent::actionAddSave();
	}

	public function actionEditSave()
	{
		$GLOBALS[bdSocialShare_Listener::NFLJ_SHOWCASE_CONTROLLERPUBLIC_INDEX_SAVE] = $this;

		return parent::actionEditSave();
	}

	public function bdSocialShare_actionSave(NFLJ_Showcase_DataWriter_Item $itemDw)
	{
		if ($itemDw->get('item_state') == 'visible')
		{
			/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
			$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
			$helper->publishAsNeeded('nfljShowcaseItemPublish', new bdSocialShare_Shareable_NFLJ_Showcase_Item($itemDw));
		}

		unset($GLOBALS[bdSocialShare_Listener::NFLJ_SHOWCASE_CONTROLLERPUBLIC_INDEX_SAVE]);
	}

}
