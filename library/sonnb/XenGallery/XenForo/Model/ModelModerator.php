<?php

/**
 * @category    XenForo
 * @package     sonnb - XenGallery
 * @version     2.1.3
 * @copyright:  sonnb
 * @link        www.sonnb.com
 * @version     One license is valid for only one nominated domain.
 * @license     You might not copy or redistribute this addon. Any action to public or redistribute must be authorized from author
 */
class sonnb_XenGallery_XenForo_Model_ModelModerator extends XFCP_sonnb_XenGallery_XenForo_Model_ModelModerator
{
	public function getGeneralModeratorInterfaceGroupIds()
	{
		$ids = parent::getGeneralModeratorInterfaceGroupIds();
		$ids[] = 'sonnb_xengallery_mod';

		return $ids;
	}
}