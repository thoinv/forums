<?php

class DigitalPointBetterAnalytics_DataWriter_ModeratorLog extends XFCP_DigitalPointBetterAnalytics_DataWriter_ModeratorLog
{
	/**
	 * Post-save handling.
	 */
	protected function _postSave()
	{
		parent::_postSave();

		if ($this->isInsert() && !empty(XenForo_Application::getOptions()->dpAnalyticsEvents['moderator']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			$customFields = XenForo_Visitor::getInstance()->get('customFields');

			DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
				XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
				@$customFields['analytics_cid'],
				XenForo_Visitor::getUserId(),
				@$_SERVER['REMOTE_ADDR'],
				'Moderator',
				ucwords(str_replace('_', ' ', $this->get('action'))),
				(string)new XenForo_Phrase(
					'moderator_log_' . $this->get('content_type') . '_' . $this->get('action'),
					@json_decode($this->get('action_params'), true)
				)
			);
		}
	}
}