<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
class Nobita_Teams_Validation
{
	public static $selectTeamFields = 'team.team_id,team.user_id as team_user_id,team.username as team_username,team.team_avatar_date, team.team_state,team.title';

	protected $_addons;
	public function __construct()
	{
		$this->_addons = XenForo_Application::get('addOns');
	}

	public function _verifyAddOnValidAndUsable($addOnId = '', $activeOnly = true)
	{
		if ($activeOnly)
		{
			return isset($this->_addons[$addOnId]) ? $this->_addons[$addOnId] : false;
		}
		else
		{
			$existed = XenForo_Model::create('XenForo_Model_AddOn')->getAddOnById($addOnId);
			return empty($existed) ? false : true;
		}
	}

	public static function assertAddOnValidAndUsable($addOnId, $activeOnly = true)
	{
		$validation = new self();
		return $validation->_verifyAddOnValidAndUsable($addOnId, $activeOnly);
	}

	public static function assetXenMediaValidAndUsable()
	{
		if (!static::assertAddOnValidAndUsable('XenGallery'))
		{
			return false;
		}

		$catId = Nobita_Teams_Setup::getInstance()->getOption('XenMediaCategoryId');
		$provider = Nobita_Teams_Setup::getInstance()->getOption('photoProvider');

		return !empty($catId) && $provider == 'XenGallery';
	}

	public static function assetSonnbXenGalleryValidAndUsable()
	{
		if (!static::assertAddOnValidAndUsable('sonnb_xengallery'))
		{
			return false;
		}

		$provider = Nobita_Teams_Setup::getInstance()->getOption('photoProvider');

		return $provider == 'sonnb_xengallery';
	}

}