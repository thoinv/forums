<?php

class bdSocialShare_XenForo_ViewAdmin_Forum_Edit extends XFCP_bdSocialShare_XenForo_ViewAdmin_Forum_Edit
{
	public function renderHtml()
	{
		$this->_params['_bdSocialShare_threadAuto'] = bdSocialShare_Helper_Common::unserializeOrFalse($this->_params['forum'], 'bdsocialshare_threadauto');
		
		return parent::renderHtml();
	}
}
