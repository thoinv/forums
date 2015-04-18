<?php

class bdSocialShare_Shareable_XenGallery_Media extends bdSocialShare_Shareable_Abstract
{
	protected $_mediaDw;
	protected $_attachment = null;

	public function __construct(XenGallery_DataWriter_Media $mediaDw)
	{
		$this->_mediaDw = $mediaDw;
	}

	public function getId()
	{
		return $this->_mediaDw->get('media_id');
	}

	public function getLink(XenForo_Model $model)
	{
		$media = $this->_mediaDw->getMergedData();

		return XenForo_Link::buildPublicLink('full:xengallery', $media);
	}

	public function getImageDataPath(XenForo_Model $model)
	{
		$attachment = $this->_getAttachment($model);

		if (!empty($attachment))
		{
			return $model->getModelFromCache('XenForo_Model_Attachment')->getAttachmentDataFilePath($attachment);
		}

		return parent::getImageDataPath($model);
	}

	public function getTitle(XenForo_Model $model)
	{
		$media = $this->_mediaDw->getMergedData();
		$params = array('media' => $media);

		return $this->_getSimulationTemplate('bdsocialshare_title_xengallery_media', $params);
	}

	public function getDescription(XenForo_Model $model)
	{
		$media = $this->_mediaDw->getMergedData();
		$params = array('media' => $media);

		return $this->_getSimulationTemplate('bdsocialshare_description_xengallery_media', $params);
	}

	public function getImage(XenForo_Model $model)
	{
		$attachment = $this->_getAttachment($model);

		if (!empty($attachment))
		{
			return $this->_getImageForAttachment($attachment, $model);
		}

		return parent::getImageDataPath($model);
	}

	protected function _getAttachment(XenForo_Model $model)
	{
		if ($this->_attachment === null)
		{
			$this->_attachment = $model->getModelFromCache('XenForo_Model_Attachment')->getAttachmentById($this->_mediaDw->get('attachment_id'));
		}

		return $this->_attachment;
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('XenGallery_DataWriter_Media');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
