<?php

class ThreadRating_Listener_Template
{
	public static function template_create (&$templateName, array &$params, XenForo_Template_Abstract $template)
	{
		if ($templateName == 'PAGE_CONTAINER')
		{
			$template->preloadTemplate('threadrating_rate');
		}
	}
}