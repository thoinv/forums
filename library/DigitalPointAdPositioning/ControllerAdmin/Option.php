<?php

class DigitalPointAdPositioning_ControllerAdmin_Option extends XFCP_DigitalPointAdPositioning_ControllerAdmin_Option
{
	public function actionCrawlerAccess()
	{
		return $this->responseView('DigitalPointAdPositioning_ViewPublic_Option_CrawlerAccess', 'crawler_access', array(
			'board_url' => XenForo_Application::getOptions()->boardUrl, 
			'login_url' => XenForo_Link::buildPublicLink('full:misc/adsense-auth'), 
			'password' => XenForo_Application::getOptions()->dppa_adsense_password, 
		));
	}
}