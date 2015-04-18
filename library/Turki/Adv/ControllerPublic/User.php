<?php

class Turki_Adv_ControllerPublic_User extends XFCP_Turki_Adv_ControllerPublic_User
{
	public function actionPreferencesSave()
	{
		$response = parent::actionPreferencesSave();
		$this->_assertPostOnly();
		$enable_adv = $this->_input->filterSingle('enable_adv', XenForo_Input::UINT);
		$writer     = XenForo_DataWriter::create('XenForo_DataWriter_User');
		$writer->setExistingData(XenForo_Visitor::getUserId());
		$writer->set('enable_adv', $enable_adv);
		$writer->preSave();
		if ($dwErrors = $writer->getErrors()) {
			return $this->responseError($dwErrors);
		}
		$writer->save();
		return $response;
	}
}