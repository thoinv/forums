<?php
/**
 *
 * Handler for AjaxChat messages reports in XenForo
 * @author lauthoma
 *
 */
class MODM_AJAXChat_ReportHandler_AJAXChatMessage extends XenForo_ReportHandler_Abstract
{
	public function getReportDetailsFromContent(array $content)
	{
		if (!$content)
		{
			return array(false, false, false);
		}

		return array(
				$content['message_id'],
				$content['user_id'],
				
				array(
						'username' => $content['username'],
						'message' => $content['text'],
						'user_id' => $content['user_id'],
						'channel_id' => $content['channel_id']	
				)
		);
	}

	public function getVisibleReportsForUser(array $reports, array $viewingUser)
	{
		//TODO: Check for moderation perms.
		
		$reportsByUser = array();
		foreach ($reports AS $reportId => $report)
		{
			$info = unserialize($report['content_info']);
			$reportsByUser[$info['user_id']] = $reportId;
		}

		$users = XenForo_Model::create('XenForo_Model_User')->getUsersByIds(array_keys($reportsByUser), array(
				'join' => XenForo_Model_User::FETCH_USER_PRIVACY,
				'followingUserId' => $viewingUser['user_id']
		));

		foreach ($reportsByUser AS $userId => $userReports)
		{
			$remove = false;

			if (!isset($users[$userId]))
			{
				$remove = true;
			}

			if ($remove)
			{
				foreach ($userReports AS $reportId)
				{
					unset($reports[$reportId]);
				}
			}
		}

		return $reports;
	}

	public function getContentLink(array $report, array $contentInfo)
	{
		return XenForo_Link::buildPublicLink('chat/chat-logs', array(), array('id' => $report['content_id']));
	}

	public function getContentTitle(array $report, array $contentInfo)
	{
		return new XenForo_Phrase('modm_ajaxchat_message_from_x', array('username' => $contentInfo['username']));
	}

	/**
	 * A callback that is called when viewing the full report.
	 *
	 * @see XenForo_ReportHandler_Abstract::viewCallback()
	 */
	public function viewCallback(XenForo_View $view, array &$report, array &$contentInfo)
	{
		return $view->createTemplateObject('modm_ajaxchat_report_content', array(
				'report' => $report,
				'content' => $contentInfo
		));
	}

	public function prepareExtraContent(array $contentInfo)
	{
		if ($contentInfo['channel_id'])
		{
			/* @var $nodeModel XenForo_Model_Node */
			$nodeModel = XenForo_Model::create("XenForo_Model_Node");
			
			$node = $nodeModel->getNodeById($contentInfo['channel_id']);
			
			if ($node) {
				$contentInfo['channel'] = $node['title'];
			}
		}
		
		return $contentInfo;
	}
	
	protected function _getChatModel()
	{
		/* @var $chatModel MODM_AJAXChat_Model_Chat */
		$chatModel = XenForo_Model::create("MODM_AJAXChat_Model_Chat");

		return $chatModel;
	}
}