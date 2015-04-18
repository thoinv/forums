<?php

class bdSocialShare_Shareable_sonnb_XenGallery_Video extends bdSocialShare_Shareable_Abstract
{
	protected $_videoDw;
	protected $_videoData = null;

	public function __construct(sonnb_XenGallery_DataWriter_Video $videoDw)
	{
		$this->_videoDw = $videoDw;
	}

	public function getId()
	{
		return $this->_videoDw->get('content_id');
	}

	public function getLink(XenForo_Model $model)
	{
		$video = $this->_videoDw->getMergedData();

		return XenForo_Link::buildPublicLink('full:gallery/videos', $video);
	}

	public function getImageDataPath(XenForo_Model $model)
	{
		$video = $this->_videoDw->getMergedData();
		$videoData = $this->_getVideoData($model);

		if (!empty($videoData))
		{
			$path = $model->getModelFromCache('sonnb_XenGallery_Model_VideoData')->getContentDataFile($videoData);

			if (!file_exists($path))
			{
				// TODO: remove this?
				$path = $model->getModelFromCache('sonnb_XenGallery_Model_VideoData')->getContentDataLargeThumbnailFile($videoData);
			}

			return $path;
		}

		return parent::getImageDataPath($model);
	}

	public function getTitle(XenForo_Model $model)
	{
		$video = $this->_videoDw->getMergedData();
		$params = array('video' => $video);

		return $this->_getSimulationTemplate('bdsocialshare_title_sonnb_xengallery_video', $params);
	}

	public function getDescription(XenForo_Model $model)
	{
		$video = $this->_videoDw->getMergedData();
		$params = array('video' => $video);

		return $this->_getSimulationTemplate('bdsocialshare_description_sonnb_xengallery_video', $params);
	}
	
	public function getImage(XenForo_Model $model)
	{
		$videoData = $this->_getVideoData($model);

		$image = $model->getModelFromCache('sonnb_XenGallery_Model_ContentData')->getContentDataLargeThumbnailUrl($videoData);
		$image = XenForo_Link::convertUriToAbsoluteUri($image, true);

		return $image;
	}

	protected function _getVideoData(XenForo_Model $model)
	{
		if ($this->_videoData === null)
		{
			$this->_videoData = $model->getModelFromCache('sonnb_XenGallery_Model_VideoData')->getDataByDataId($this->_videoDw->get('content_data_id'));
		}

		return $this->_videoData;
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('sonnb_XenGallery_DataWriter_Video');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
