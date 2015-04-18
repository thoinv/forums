<?php
class Sedo_MobileStyleSelector_Listener_ControllerPreDispatch
{
	public static function Diktat(XenForo_Controller $controller, $action)
	{
		$visitor = XenForo_Visitor::getInstance();
		
		if( class_exists('Sedo_DetectBrowser_Listener_Visitor') && isset($visitor->getBrowser['isMobile']))
		{
		    //External Addon
		    $isMobile = $visitor->getBrowser['isMobile'];
		    $isTablet = $visitor->getBrowser['isTablet'];		    
		}
		else
		{
		    //XenForo
		    $isMobile = XenForo_Visitor::isBrowsingWith('mobile');
		    $isTablet = '';
		}

		if(!empty($isMobile))
		{
			$options = XenForo_Application::get('options');
			$mobileStyle = $options->sedoDefaultMobileStyle;
			//$visitor->style_id = $mobileStyle;

			if(!empty($isTablet))
			{
				$mobileStyle = $options->sedoDefaultTabletStyle;
			}

			$options->defaultStyleId = $mobileStyle;

			if($options->sedoForceMobileStyle && $visitor->style_id != $mobileStyle)
			{
				//Should not be needed
				XenForo_Helper_Cookie::setCookie('style_id', $mobileStyle, 86400 * 365);
			}
		}
	}
}
//Zend_Debug::dump($class);