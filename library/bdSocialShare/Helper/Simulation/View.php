<?php

class bdSocialShare_Helper_Simulation_View extends XenForo_View
{
	protected static $_bdSocialShare_Helper_viewRenderer = null;

	public static function create()
	{
		if (self::$_bdSocialShare_Helper_viewRenderer === null)
		{
			self::$_bdSocialShare_Helper_viewRenderer = bdSocialShare_Helper_Simulation_ViewRenderer::create();
		}

		return new bdSocialShare_Helper_Simulation_View(self::$_bdSocialShare_Helper_viewRenderer, self::$_bdSocialShare_Helper_viewRenderer->bdSocialShare_Helper_getResponse());
	}

}
