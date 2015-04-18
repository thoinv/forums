<?php

/**
 * Product: sonnb - See post's links permission
 * Version: 1.1.2
 * Date: 28th Jan 2013
 * Author: sonnb
 * Website: www.sonnb.com - www.UnderWorldVN.com
 * License: You might not copy or redistribute this addon.
 */
class sonnb_SeePostLinksPermission_ViewPublic_Thread_ViewNewPosts extends XFCP_sonnb_SeePostLinksPermission_ViewPublic_Thread_ViewNewPosts
{
	public function renderHtml()
	{
		$filterModel = sonnb_SeePostLinksPermission_Model_Filter::getInstance();
		
		if (isset($this->_params['forum']) && $filterModel->isApplicableForum($this->_params['forum']))
		{
			$filterModel->processMessages($this->_params['posts']);
		}
		
		parent::renderHtml();
	}

	public function renderJson()
	{
		$filterModel = sonnb_SeePostLinksPermission_Model_Filter::getInstance();
		
		if (isset($this->_params['forum']) && $filterModel->isApplicableForum($this->_params['forum']))
		{
			$filterModel->processMessages($this->_params['posts']);
		}
		
		return parent::renderJson();
	}
}