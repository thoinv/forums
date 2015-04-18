<?php
class Sedo_MobileStyleSelector_Listener_Visitor
{
	public static function getVisitor(XenForo_Visitor &$visitor)
	{
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

			if(!empty($isTablet))
			{
				$mobileStyle = $options->sedoDefaultTabletStyle;
			}

			if(!empty($visitor['user_id']))
			{
				//Only for members => guests use the default style option (unless they have choosen to use another style =>cookie: style_id)
				XenForo_Helper_Cookie::deleteCookie('style_id'); //case: visitor changed the default style, then log
				$getCookie = XenForo_Helper_Cookie::getCookie('mobile_style_id'); // the mobile_style_id is set here: Sedo_MobileStyleSelector_ControllerPublic_Misc
	
				if($getCookie == false) //use false!!!
				{
					//No cookie => continue to force mobile style
					$visitor['style_id'] = $mobileStyle;
				}		
			}
			
			//Force style
			if($options->sedoForceMobileStyle && $visitor->style_id != $mobileStyle)
			{
				$visitor['style_id'] = $mobileStyle;
			}
		}	
	}
}
//Zend_Debug::dump($class);