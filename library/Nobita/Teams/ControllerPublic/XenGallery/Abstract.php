<?php

if (Nobita_Teams_Validation::assertAddOnValidAndUsable('sonnb_xengallery'))
{
	$content = <<<EOF
		class Nobita_Teams_ControllerPublic_XenGallery_Base extends sonnb_XenGallery_ControllerPublic_Abstract
		{
		}
EOF;
}
else
{
	$content = <<<EOF
	class Nobita_Teams_ControllerPublic_XenGallery_Base extends Nobita_Teams_ControllerPublic_XenGallery_Abstract
	{
	}
EOF;
}

eval($content);

class Nobita_Teams_ControllerPublic_XenGallery_Abstract extends Nobita_Teams_ControllerPublic_XenGallery_Base
{
	protected function _preDispatch($action)
	{
		if (!Nobita_Teams_Validation::assertAddOnValidAndUsable('sonnb_xengallery'))
		{
			throw $this->getNoPermissionResponseException();
		}

		if (!$this->_getTeamModel()->canViewTeams($error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		return parent::_preDispatch($action);
	}

	protected function _getTeamModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Team');
	}

	protected function _getTeamHelper()
	{
		return $this->getHelper('Nobita_Teams_ControllerHelper_Team');
	}
}