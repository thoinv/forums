<?php

class bdSocialShare_Shareable_NFLJ_Showcase_Item extends bdSocialShare_Shareable_Abstract
{
	protected $_itemDw;
	protected $_image = false;

	public function __construct(NFLJ_Showcase_DataWriter_Item $itemDw)
	{
		$this->_itemDw = $itemDw;
	}

	public function getId()
	{
		return $this->_itemDw->get('item_id');
	}

	public function getLink(XenForo_Model $model)
	{
		$item = $this->_itemDw->getMergedData();

		return XenForo_Link::buildPublicLink('full:showcase', $item);
	}

	public function getImage(XenForo_Model $model)
	{
		$item = $this->_itemDw->getMergedData();

		if ($item['attach_count'] > 0)
		{
			if ($this->_image === false)
			{
				$item = $model->getModelFromCache('NFLJ_Showcase_Model_Item')->getAndMergeAttachmentsIntoItem($item);
				if (!empty($item['cover_image']))
				{
					$this->_image = XenForo_Link::convertUriToAbsoluteUri($item['cover_image']['thumbnailUrl'], true);
				}
				else
				{
					$this->_image = '';
				}
			}

			if (!empty($this->_image))
			{
				return $this->_image;
			}
		}

		return parent::getImage($model);
	}

	public function getTitle(XenForo_Model $model)
	{
		$item = $this->_itemDw->getMergedData();
		$params = array('item' => $item);

		return $this->_getSimulationTemplate('bdsocialshare_title_nflj_showcase_item', $params);
	}

	public function getDescription(XenForo_Model $model)
	{
		$item = $this->_itemDw->getMergedData();
		$params = array('item' => $item);

		return $this->_getSimulationTemplate('bdsocialshare_description_nflj_showcase_item', $params);
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('NFLJ_Showcase_DataWriter_Item');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
