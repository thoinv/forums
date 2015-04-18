<?php

class bdSocialShare_XI_Blog_ViewPublic_Draft_Edit extends XFCP_bdSocialShare_XI_Blog_ViewPublic_Draft_Edit
{
	public function renderHtml()
	{
		if (isset($this->_params['draft']))
		{
			$draft =& $this->_params['draft'];
			
			if (isset($draft['bdsocialshare_scheduled']))
			{
				$draft['bdsocialshare_scheduled'] = bdSocialShare_Helper_Common::unserializeOrFalse($draft, 'bdsocialshare_scheduled');
			}
		}
		
		return parent::renderHtml();
	}
}
