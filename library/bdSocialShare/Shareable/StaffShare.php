<?php

class bdSocialShare_Shareable_StaffShare extends bdSocialShare_Shareable_Abstract
{
	protected $_data = array();

	public function __construct(array $data)
	{
		$this->_data = $data;
	}

	public function getLink(XenForo_Model $model)
	{
		if (isset($this->_data['link']))
		{
			return $this->_data['link'];
		}

		return parent::getLink($model);
	}

	public function getImage(XenForo_Model $model)
	{
		if (isset($this->_data['image']))
		{
			return $this->_data['image'];
		}

		return parent::getImage($model);
	}

	public function getTitle(XenForo_Model $model)
	{
		if (isset($this->_data['title']))
		{
			return $this->_data['title'];
		}

		return parent::getTitle($model);
	}

	public function getDescription(XenForo_Model $model)
	{
		if (isset($this->_data['description']))
		{
			return $this->_data['description'];
		}

		return parent::getDescription($model);
	}

	public function getUserText(XenForo_Model $model)
	{
		if (isset($this->_data['userText']))
		{
			return $this->_data['userText'];
		}

		return parent::getUserText($model);
	}

}
