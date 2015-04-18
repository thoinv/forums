<?php

class Nobita_Teams_sonnb_XenGallery_ControllerPublic_XenGallery extends XFCP_Nobita_Teams_sonnb_XenGallery_ControllerPublic_XenGallery
{
	protected function _getDefaultConditions()
	{
		$conditions = parent::_getDefaultConditions();

		// maybe error in the future
		$conditions['team_id'] = $this->_input->filterSingle('team_id', XenForo_Input::UINT);
		return $conditions;
	}
}