<?php

class bdSocialShare_Shareable_sonnb_XenGallery_Photo extends bdSocialShare_Shareable_Abstract
{
	protected $_photoDw;
	protected $_photoData = null;

	public function __construct(sonnb_XenGallery_DataWriter_Photo $photoDw)
	{
		$this->_photoDw = $photoDw;
	}

	public function getId()
	{
		$id = $this->_photoDw->get('photo_id');
		if (empty($id))
		{
			// sonnb - XenGallery v2.0.0
			$id = $this->_photoDw->get('content_id');
		}

		return $id;
	}

	public function getLink(XenForo_Model $model)
	{
		$photo = $this->_photoDw->getMergedData();

		return XenForo_Link::buildPublicLink('full:gallery/photos', $photo);
	}

	public function getImageDataPath(XenForo_Model $model)
	{
		$photo = $this->_photoDw->getMergedData();
		$photoData = $this->_getPhotoData($model);

		if (!empty($photoData))
		{
			$photoDataModel = $model->getModelFromCache('sonnb_XenGallery_Model_PhotoData');

			if (method_exists($photoDataModel, 'getPhotoDataFile'))
			{
				// sonnb - XenGallery v1.0.0
				return $photoDataModel->getPhotoDataFile($photoData);
			}
			else
			{
				// sonnb - XenGallery v2.0.0
				return $photoDataModel->getContentDataFile($photoData);
			}
		}

		return parent::getImageDataPath($model);
	}

	public function getTitle(XenForo_Model $model)
	{
		$photo = $this->_photoDw->getMergedData();
		$params = array('photo' => $photo);

		return $this->_getSimulationTemplate('bdsocialshare_title_sonnb_xengallery_photo', $params);
	}

	public function getDescription(XenForo_Model $model)
	{
		$photo = $this->_photoDw->getMergedData();
		$params = array('photo' => $photo);

		return $this->_getSimulationTemplate('bdsocialshare_description_sonnb_xengallery_photo', $params);
	}

	public function getImage(XenForo_Model $model)
	{
		$photoData = $this->_getPhotoData($model);

		$image = $model->getModelFromCache('sonnb_XenGallery_Model_ContentData')->getContentDataLargeThumbnailUrl($photoData);
		$image = XenForo_Link::convertUriToAbsoluteUri($image, true);

		return $image;
	}

	protected function _getPhotoData(XenForo_Model $model)
	{
		if ($this->_photoData === null)
		{
			$dataId = $this->_photoDw->get('photo_data_id');
			if (empty($dataId))
			{
				// sonnb - XenGallery v2.0.0
				$dataId = $this->_photoDw->get('content_data_id');
			}

			$this->_photoData = $model->getModelFromCache('sonnb_XenGallery_Model_PhotoData')->getDataByDataId($dataId);
		}

		return $this->_photoData;
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('sonnb_XenGallery_DataWriter_Photo');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
