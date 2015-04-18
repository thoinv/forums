<?php

class bdSocialShare_Shareable_XenResource_Update extends bdSocialShare_Shareable_Abstract
{
	protected $_updateDw;

	public function __construct(XenResource_DataWriter_Update $updateDw)
	{
		$this->_updateDw = $updateDw;
	}

	public function getId()
	{
		return $this->_updateDw->get('resource_resource_id');
	}

	public function getLink(XenForo_Model $model)
	{
		return XenForo_Link::buildPublicLink('full:resources', array('resource_id' => $this->_updateDw->get('resource_id')));
	}

	public function getTitle(XenForo_Model $model)
	{
		$update = $this->_updateDw->getMergedData();
		$params = array('update' => $update);

		return $this->_getSimulationTemplate('bdsocialshare_title_xenresource_update', $params);
	}

	public function getDescription(XenForo_Model $model)
	{
		$update = $this->_updateDw->getMergedData();
		$params = array(
			'update' => $update,
			'snippet' => $this->_getSnippetFromBbCodeMessage($model, $update['message']),
		);

		return $this->_getSimulationTemplate('bdsocialshare_description_xenresource_update', $params);
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('XenResource_DataWriter_Update');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
