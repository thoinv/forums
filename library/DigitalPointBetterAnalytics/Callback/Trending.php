<?php
class DigitalPointBetterAnalytics_Callback_Trending
{
	public static function renderSidebar($contents, $params, $template)
	{
		if ($params['slot'] != XenForo_Application::getOptions()->dpAnalyticsSidebar)
		{
			return;
		}

		$analyticsModel = XenForo_Model::create('DigitalPointBetterAnalytics_Model_Analytics');
		$urls = $analyticsModel->prepareRealtimeData($params['type']);

		if ($urls)
		{
			$contents .= $template->create('sidebar_analytics_realtime',
				array(
					'type' => $params['type'],
					'urls' => $urls
				)
			)->render();
		}

		return $contents;
	}
}