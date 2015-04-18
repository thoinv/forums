<?php

class Brivium_CaptchaPosting_EventListeners_Listener extends Brivium_BriviumLibrary_EventListeners
{
	public static function loadClassController($class, &$extend)
	{
		$classes = array(
			'ControllerPublic_Thread',
			'ControllerPublic_Forum',
		);
		foreach($classes AS $clas){if ($class == 'XenForo_' .$clas){$extend[] = 'Brivium_CaptchaPosting_' .$clas;}}
	}
	public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
		/*
		switch ($hookName) {
			case 'thread_view_qr_before':
				$posAdd = strpos($contents,'recaptcha_image');
				if(!$posAdd){
					$newTemplate = $template->create('BRCCP_' .$hookName, $template->getParams());
					$contents = $contents. $newTemplate->render();
				}
				break;
		}
		*/
		self::_templateHook($hookName, $contents, $hookParams, $template);
    }
}