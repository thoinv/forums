<?php

class bdSocialShare_Shareable_XI_Blog_Entry extends bdSocialShare_Shareable_Abstract
{
	protected $_entryDw;

	public function __construct(XI_Blog_DataWriter_Discussion_Entry $entryDw)
	{
		$this->_entryDw = $entryDw;
	}

	public function getId()
	{
		return $this->_entryDw->get('entry_id');
	}

	public function getLink(XenForo_Model $model)
	{
		$entry = $this->_entryDw->getMergedData();

		return XenForo_Link::buildPublicLink('full:blog-entries', $entry);
	}

	public function getImage(XenForo_Model $model)
	{
		$entry = $this->_entryDw->getMergedData();

		$image = $this->_getImageFromBbCodeMessage($model, $entry, 'blog_entry', $entry['entry_id']);
		if (!empty($image))
		{
			return $image;
		}

		return parent::getImage($model);
	}

	public function getTitle(XenForo_Model $model)
	{
		$entry = $this->_entryDw->getMergedData();
		$params = array('entry' => $entry);

		return $this->_getSimulationTemplate('bdsocialshare_title_xi_blog_entry', $params);
	}

	public function getDescription(XenForo_Model $model)
	{
		$entry = $this->_entryDw->getMergedData();
		$params = array(
			'entry' => $entry,
			'snippet' => $this->_getSnippetFromBbCodeMessage($model, $entry['message']),
		);

		return $this->_getSimulationTemplate('bdsocialshare_description_xi_blog_entry', $params);
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('XI_Blog_DataWriter_Discussion_Entry');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
