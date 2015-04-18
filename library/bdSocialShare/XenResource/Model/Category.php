<?php

class bdSocialShare_XenResource_Model_Category extends XFCP_bdSocialShare_XenResource_Model_Category
{
	protected $_bdSocialShare_canViewCategory = null;

	public function bdSocialShare_setCanViewCategory($canView)
	{
		$this->_bdSocialShare_canViewCategory = $canView;
	}

	public function canViewCategory(array $category, &$errorPhraseKey = '', array $viewingUser = null, array $categoryPermissions = null)
	{
		if (is_bool($this->_bdSocialShare_canViewCategory))
		{
			return $this->_bdSocialShare_canViewCategory;
		}

		return parent::canViewCategory($category, $errorPhraseKey, $viewingUser, $categoryPermissions);
	}

}
