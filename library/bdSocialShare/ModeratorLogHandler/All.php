<?php

class bdSocialShare_ModeratorLogHandler_All extends XenForo_ModeratorLogHandler_Abstract
{
	protected function _log(array $logUser, array $content, $action, array $actionParams = array(), $parentContent = null)
	{
		$title = '';
		if (isset($content['title']))
		{
			$title = $content['title'];
		}

		$dw = XenForo_DataWriter::create('XenForo_DataWriter_ModeratorLog');
		$dw->bulkSet(array(
			'user_id' => $logUser['user_id'],
			'content_type' => 'bdsocialshare_all',
			'content_id' => '',
			'content_user_id' => 0,
			'content_username' => 'N/A',
			'content_title' => $content['title'] ? $content['title'] : '',
			'content_url' => $content['link'] ? $content['link'] : '',
			'discussion_content_type' => '',
			'discussion_content_id' => 0,
			'action' => $action,
			'action_params' => array_merge($content, $actionParams)
		));
		$dw->save();

		return $dw->get('moderator_log_id');
	}

	protected function _prepareEntry(array $entry)
	{
		if (empty($entry['content_title']))
		{
			$entry['content_title'] = $entry['content_url'];
		}
		
		// avoid being complained by DevHelper file export script
		// new XenForo_Phrase('moderator_log_bdsocialshare_all_facebook')
		// new XenForo_Phrase('moderator_log_bdsocialshare_all_twitter')

		return $entry;
	}

}
