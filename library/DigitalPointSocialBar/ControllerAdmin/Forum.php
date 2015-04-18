<?php

class DigitalPointSocialBar_ControllerAdmin_Forum extends XFCP_DigitalPointSocialBar_ControllerAdmin_Forum
{

	public function actionSave()
	{
		$nodeId = $this->_input->filterSingle('node_id', XenForo_Input::UINT);

		$response = parent::actionSave();

		if ($nodeId)
		{
			$dw = XenForo_DataWriter::create('XenForo_DataWriter_Forum');
			$dw->setExistingData($nodeId);
			$dw->set('dp_twitter_slug', $this->_input->filterSingle('dp_twitter_slug', XenForo_Input::STRING));
			$dw->save();
		}
		return $response;
	}
}