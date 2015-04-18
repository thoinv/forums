<?php

class EWRutiles_Sitemap_ControllerPublic_Member extends XFCP_EWRutiles_Sitemap_ControllerPublic_Member
{
	public function actionIndex()
	{
		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
		
		if (!$userId)
		{
			return $this->responseNoPermission();
		}
		
		return parent::actionIndex();
	}
}