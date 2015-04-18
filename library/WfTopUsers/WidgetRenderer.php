<?php

class WfTopUsers_WidgetRenderer extends WidgetFramework_WidgetRenderer {
	protected function _getConfiguration() {
		return array(
			'name' => 'TopUsers',
			'options' => array(
				'range' => XenForo_Input::UINT,
				'criterion' => XenForo_Input::STRING,
				'excluded_usergroups' => XenForo_Input::STRING,
				'excluded_users' => XenForo_Input::STRING,
				'limit' => XenForo_Input::UINT,
			),
			'useCache' => true,
			'cacheSeconds' => 300,
		);
	}
	
	protected function _getOptionsTemplate() {
		return 'wf_widget_options_top_users';
	}
	
	protected function _validateOptionValue($optionKey, &$optionValue) {
		if ('limit' == $optionKey) {
			if (empty($optionValue)) $optionValue = 5;
		} 
		
		return true;
	}
	
	
	protected function _getRenderTemplate(array $widget, $templateName, array $params) {
		return 'wf_widget_users';
	}
	
	
	protected function _render(array $widget, $templateName, array $params, XenForo_Template_Abstract $renderTemplateObject) {
		
		$userModel = WidgetFramework_Core::getInstance()->getModelFromCache('XenForo_Model_User');
		
		$fetchOptions = array();
		
		$users = $userModel->getTopUsers($widget['options']);

		$renderTemplateObject->setParam('users', $users);
		
		return $renderTemplateObject->render();		
	}
}