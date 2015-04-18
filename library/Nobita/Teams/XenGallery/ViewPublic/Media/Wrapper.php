<?php

class Nobita_Teams_XenGallery_ViewPublic_Media_Wrapper extends XFCP_Nobita_Teams_XenGallery_ViewPublic_Media_Wrapper
{
	public function renderHtml()
	{
		if ($this->_params['collapsible'] == 'basic')
		{
			$categories =& $this->_params['categoriesGrouped'];
		}
		else
		{
			$categories =& $this->_params['categories'];
		}

		foreach($categories as $categoryId => &$category)
		{
			if (!Nobita_Teams_XenGallery_Media::isVisibleCategory($category['category_id']))
			{
				unset($categories[$categoryId]);
			}
		}

		return parent::renderHtml();
	}

}