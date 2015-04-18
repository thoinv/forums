<?php

class DigitalPointBetterAnalytics_ViewPublic_JavaScript extends XenForo_ViewPublic_Base
{
	public function renderHtml()
	{
		header('Cache-Control: public, max-age=31536000');
		header('Content-Type: application/javascript');

		$templateObject = XenForo_Application::getFc()->getDependencies()->createTemplateObject($this->_templateName);
		$templateObject->setLanguageId(XenForo_Phrase::getLanguageId());
		$templateObject->setStyleId(XenForo_Application::get('options')->defaultStyleId);
		echo $templateObject->render();
		exit;
	}
}