<?php

class bdSocialShare_Shareable_Status extends bdSocialShare_Shareable_Abstract
{
	protected $_profilePostDw;

	public function __construct(XenForo_DataWriter_DiscussionMessage_ProfilePost $profilePostDw)
	{
		$this->_profilePostDw = $profilePostDw;
	}

	public function getId()
	{
		return $this->_profilePostDw->get('profile_post_id');
	}

	public function getLink(XenForo_Model $model)
	{
		$profilePost = $this->_profilePostDw->getMergedData();

		return XenForo_Link::buildPublicLink('full:profile-posts', $profilePost);
	}

	public function getUserText(XenForo_Model $model)
	{
		$profilePost = $this->_profilePostDw->getMergedData();

		$params = array(
			'status' => $profilePost,
			'snippet' => $this->_getSnippetFromBbCodeMessage($model, $profilePost['message']),
		);

		if ($profilePost['user_id'] == $this->getViewingUserId())
		{
			return $this->_getSimulationTemplate('bdsocialshare_user_text_status', $params);
		}
		else
		{
			return $this->_getSimulationTemplate('bdsocialshare_user_text_status_auto', $params);
		}
	}

	public function getPreConfiguredTargets()
	{
		$profilePost = $this->_profilePostDw->getMergedData();
		if ($profilePost['user_id'] != $profilePost['profile_user_id'])
		{
			// not a status
			return parent::getPreConfiguredTargets();
		}

		if (isset($profilePost['message_state']) AND $profilePost['message_state'] !== 'visible')
		{
			// not visible, no auto share
			return parent::getPreConfiguredTargets();
		}

		$visitor = XenForo_Visitor::getInstance();

		if ($profilePost['user_id'] == $visitor['user_id'] AND $visitor->hasPermission('general', 'bdSocialShare_statusAuto'))
		{
			$option = bdSocialShare_Option::get('statusAuto');
			if (is_array($option))
			{
				return $option;
			}
		}

		return parent::getPreConfiguredTargets();
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_DiscussionMessage_ProfilePost');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
