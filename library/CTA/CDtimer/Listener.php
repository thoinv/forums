<?php

class CTA_CDtimer_Listener
{
	public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		switch ($hookName) 
		{
			case 'page_container_sidebar':
			{
				$contents .= $template->create('cta_countdown_main', $template->getParams());
				break;				
			}
		}
	}
}