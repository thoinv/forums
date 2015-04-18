<?php

class bdSocialShare_Shareable_XenResource_Resource extends bdSocialShare_Shareable_Abstract
{
	// 10 minutes should be enough for user to upload the icon...
	const SECONDS_WAIT_FOR_ICON = 666;

	protected $_resourceDw;
	protected $_waitForIcon = false;

	public function __construct(XenResource_DataWriter_Resource $resourceDw)
	{
		$this->_resourceDw = $resourceDw;
	}

	public function setWaitForIcon()
	{
		$this->_waitForIcon = true;
	}

	public function getId()
	{
		return $this->_resourceDw->get('resource_id');
	}

	public function getLink(XenForo_Model $model)
	{
		return XenForo_Link::buildPublicLink('full:resources', $this->_resourceDw->getMergedData());
	}

	public function getImage(XenForo_Model $model)
	{
		$resource = $this->_resourceDw->getMergedData();

		if (isset(XenForo_Template_Helper_Core::$helperCallbacks['resourceiconurl']))
		{
			$iconUrl = XenForo_Template_Helper_Core::callHelper('resourceiconurl', array($resource));
			return XenForo_Link::convertUriToAbsoluteUri($iconUrl, true);
		}

		return parent::getImage($model);
	}

	public function getTitle(XenForo_Model $model)
	{
		$resource = $this->_resourceDw->getMergedData();
		$resource = $model->getModelFromCache('XenResource_Model_Resource')->prepareResource($resource, null, $this->getViewingUser());
		$resource = $model->getModelFromCache('XenResource_Model_Resource')->prepareResourceCustomFields($resource, array(), $this->getViewingUser());
		$params = array('resource' => $resource);

		if ($resource['user_id'] == $this->getViewingUserId())
		{
			return $this->_getSimulationTemplate('bdsocialshare_title_xenresource_resource', $params);
		}
		else
		{
			return $this->_getSimulationTemplate('bdsocialshare_title_xenresource_resource_auto', $params);
		}
	}

	public function getDescription(XenForo_Model $model)
	{
		$resource = $this->_resourceDw->getMergedData();
		$resource = $model->getModelFromCache('XenResource_Model_Resource')->prepareResource($resource, null, $this->getViewingUser());
		$resource = $model->getModelFromCache('XenResource_Model_Resource')->prepareResourceCustomFields($resource, array(), $this->getViewingUser());
		$params = array('resource' => $resource);

		if ($resource['user_id'] == $this->getViewingUserId())
		{
			return $this->_getSimulationTemplate('bdsocialshare_description_xenresource_resource', $params);
		}
		else
		{
			return $this->_getSimulationTemplate('bdsocialshare_description_xenresource_resource_aut', $params);
		}
	}

	public function getQueueDate(XenForo_Model $model)
	{
		if ($this->_waitForIcon)
		{
			$resource = $this->_resourceDw->getMergedData();

			return $resource['resource_date'] + self::SECONDS_WAIT_FOR_ICON;
		}

		return parent::getQueueDate($model);
	}

	public function getPreConfiguredTargets()
	{
		$resource = $this->_resourceDw->getMergedData();
		$visitor = XenForo_Visitor::getInstance();

		if ($resource['user_id'] == $visitor['user_id'] AND $visitor->hasPermission('general', 'bdSocialShare_resourceAut'))
		{
			$option = bdSocialShare_Option::get('resourceAddAuto');
			if (is_array($option))
			{
				return $option;
			}
		}

		return parent::getPreConfiguredTargets();
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('XenResource_DataWriter_Resource');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
