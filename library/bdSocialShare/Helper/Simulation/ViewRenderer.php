<?php

class bdSocialShare_Helper_Simulation_ViewRenderer extends XenForo_ViewRenderer_HtmlPublic
{
	protected static $_bdSocialShare_Helper_dependencies = null;
	protected static $_bdSocialShare_Helper_response = null;
	protected static $_bdSocialShare_Helper_request = null;

	public function bdSocialShare_Helper_getResponse()
	{
		return $this->_response;
	}

	public static function create()
	{
		if (self::$_bdSocialShare_Helper_dependencies === null)
		{
			self::$_bdSocialShare_Helper_dependencies = new bdSocialShare_Helper_Simulation_Dependencies();
		}

		if (self::$_bdSocialShare_Helper_request === null)
		{
			self::$_bdSocialShare_Helper_request = new Zend_Controller_Request_Http();
		}

		if (self::$_bdSocialShare_Helper_response === null)
		{
			self::$_bdSocialShare_Helper_response = new Zend_Controller_Response_Http();
		}

		return new bdSocialShare_Helper_Simulation_ViewRenderer(self::$_bdSocialShare_Helper_dependencies, self::$_bdSocialShare_Helper_response, self::$_bdSocialShare_Helper_request);
	}

}
