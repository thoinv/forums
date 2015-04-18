<?php

class bdSocialShare_XenResource_Model_Resource extends XFCP_bdSocialShare_XenResource_Model_Resource
{
	protected $_bdSocialShare_canViewResource = null;

	public function bdSocialShare_setCanViewResource($canView)
	{
		$this->_bdSocialShare_canViewResource = $canView;
	}

	public function canViewResource(array $resource, array $category, &$errorPhraseKey = '', array $viewingUser = null, array $categoryPermissions = null)
	{
		if (is_bool($this->_bdSocialShare_canViewResource))
		{
			return $this->_bdSocialShare_canViewResource;
		}

		return parent::canViewResource($resource, $category, $errorPhraseKey, $viewingUser, $categoryPermissions);
	}

}
