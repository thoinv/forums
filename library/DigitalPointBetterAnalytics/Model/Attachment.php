<?php

class DigitalPointBetterAnalytics_Model_Attachment extends XFCP_DigitalPointBetterAnalytics_Model_Attachment
{

	public function logAttachmentView($attachmentId)
	{
		if (!empty(XenForo_Application::getOptions()->dpAnalyticsEvents['attachment']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			$customFields = XenForo_Visitor::getInstance()->get('customFields');

			$attachment = $this->getAttachmentById($attachmentId);

			DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
				XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
				@$customFields['analytics_cid'],
				XenForo_Visitor::getUserId(),
				@$_SERVER['REMOTE_ADDR'],
				'Attachment',
				'View',
				XenForo_Link::buildPublicLink('full:attachments', $attachment)
			);
		}

		parent::logAttachmentView($attachmentId);
	}

}