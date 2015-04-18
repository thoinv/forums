<?php

/**
 * @category    XenForo
 * @package     sonnb - XenGallery
 * @version     2.1.3
 * @copyright:  sonnb
 * @link        www.sonnb.com
 * @version     One license is valid for only one nominated domain.
 * @license     You might not copy or redistribute this addon. Any action to public or redistribute must be authorized from author
 */
class sonnb_XenGallery_AlertHandler_Video extends XenForo_AlertHandler_Abstract
{
	/**
	 * @var sonnb_XenGallery_Model_Video
	 */
	protected $_videoModel = null;

	/**
	 * @param array $contentIds
	 * @param XenForo_Model_Alert $model
	 * @param int $userId
	 * @param array $viewingUser
	 * @return array
	 */
	public function getContentByIds(array $contentIds, $model, $userId, array $viewingUser)
	{
		$videoModel = $this->_getVideoModel();

		$fetchOptions = array(
			'join' => sonnb_XenGallery_Model_Video::FETCH_USER |
				sonnb_XenGallery_Model_Video::FETCH_ALBUM |
				sonnb_XenGallery_Model_Video::FETCH_DATA,
			'followingUserId' => XenForo_Visitor::getUserId()
		);
		
		$videos = $videoModel->getContentsByIds($contentIds, $fetchOptions);
		$videos = $videoModel->prepareContents($videos, $fetchOptions);

		return $videos;
	}

	/**
	 * @param array $alert
	 * @param mixed $content
	 * @param array $viewingUser
	 * @return bool
	 */
	public function canViewAlert(array $alert, $content, array $viewingUser)
	{
		return $this->_getVideoModel()->canViewContentAndContainer($content, $content['album'], $errorPhraseKey, $viewingUser);
	}

	/**
	 * @param array $item
	 * @param $content
	 * @param array $viewingUser
	 * @return array
	 */
	protected function _prepareAlertBeforeAction(array $item, $content, array $viewingUser)
	{
		$item = parent::_prepareAlertBeforeAction($item, $content, $viewingUser);
		
		$item['extra_data'] = @unserialize($item['extra_data']);
		
		return $item;
	}

	/**
	 * @param string $contentType
	 * @param string $action
	 * @return string
	 */
	protected function _getDefaultTemplateTitle($contentType, $action)
	{
		return 'sonnb_xengallery_video_alert_' . $action;
	}

	/**
	 * 
	 * @return sonnb_XenGallery_Model_Video
	 */
	protected function _getVideoModel()
	{
		if (!$this->_videoModel)
		{
			$this->_videoModel = XenForo_Model::create('sonnb_XenGallery_Model_Video');
		}

		return $this->_videoModel;
	}
}