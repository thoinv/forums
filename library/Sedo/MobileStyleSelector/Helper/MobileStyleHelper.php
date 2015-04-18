<?php
class Sedo_MobileStyleSelector_Helper_MobileStyleHelper
{
	public static function CheckMobile($option = null)
	{
		$options = XenForo_Application::get('options');
		$visitor = XenForo_Visitor::getInstance();
		
		if($option == 'ifForced' && !$options->sedoForceMobileStyle)
		{
			return false;
		}

		if($option == 'ifMember' && empty($visitor['user_id']))
		{
			return false;
		}

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

		if(empty($isMobile))
		{
			return false;
		}
		
		$mobileStyle = $options->sedoDefaultMobileStyle;

		if(!empty($isTablet))
		{
			$mobileStyle = $options->sedoDefaultTabletStyle;
		}
		
		return $mobileStyle;
	}
}
//Zend_Debug::dump($class);