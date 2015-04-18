<?php

class DigitalPointBetterAnalytics_DataWriter_ReportComment extends XFCP_DigitalPointBetterAnalytics_DataWriter_ReportComment
{
	/**
	 * Post-save handling.
	 *
	 * Note: not run when importing
	 */
	protected function _postSave()
	{
		parent::_postSave();

		if ($this->isInsert() && !empty(XenForo_Application::getOptions()->dpAnalyticsEvents['report']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			if (XenForo_Application::isRegistered('fc'))
			{
				if (XenForo_Application::getFc()->route()->getAction() == 'report')
				{
					$customFields = XenForo_Visitor::getInstance()->get('customFields');

					$label = null;

					$reportModel = $this->_getReportModel();
					if ($report = $reportModel->getReportById($this->get('report_id')))
					{
						if ($reportHandler = Xenforo_Model::create('XenForo_Model_Report')->getReportHandler($report['content_type']))
						{
							$label = (string)$reportHandler->getContentTitle($report, unserialize($report['content_info']));
						}
					}

					DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
						XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
						@$customFields['analytics_cid'],
						XenForo_Visitor::getUserId(),
						@$_SERVER['REMOTE_ADDR'],
						'Report',
						'Reported',
						$label
					);

				}
			}
		}
	}
}