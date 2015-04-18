<?php 
/*
 * SolidMean Floating Login for XenForo
 *
 * Copyright (c) 2012 Solid Mean Technology(tm), LLC
 *
 * This file is licensed under a Creative Commons 
 * Attribution 3.0 Unported (CC BY 3.0) license.
 * 
 * Information on the uses and restrictions of this 
 * license can be found at:
 *
 * http://creativecommons.org/licenses/by/3.0/
 * 
 */
 
class SolidMean_FloatingLogIn_Listener {
	public static function templateCreate($templateName, array &$params, Xenforo_Template_Abstract $template)
	{
		switch($template){
			case 'page_container_js_body':  // template name of where template hook is located
				$template->preloadTemplate('SolidMean_floating_login');  // pre-cache template that xF doesn't already know about
				break;
		}
	}
	
	public static function templateHook($hookName, &$content, array $hookParams, Xenforo_Template_Abstract $template) 
	{
		switch($hookName){
			case 'page_container_js_body';
				$content .= $template->create('SolidMean_floating_login'); // the actual floating login conditional and js
		}	
	}
}

?>