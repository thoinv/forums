<?php
class rrssb_Listener
{
	public static function rrssbExtFiles(&$templateName, array &$params, XenForo_Template_Abstract $template)
	{
		if ($templateName == 'thread_view')
		{
			$template->addRequiredExternal('css', 'SV_rrssbDefault');
			$template->preloadTemplate('SV_rrssbShares');
		}
	}

	public static function addButtons($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		
		$xenoptions = XenForo_Application::get('options');
		$optionHookTop = $xenoptions->rrssb_turnOn_top;
		$optionHookBottom = $xenoptions->rrssb_turnOn_bottomHook['hookname'];
		$thread = $template->getParam('thread');
		$excludedForums = $xenoptions->rrssb_excludeForums;

		if (!in_array($thread['node_id'], $excludedForums))
		{
		
			if (!empty($optionHookTop))
			{
				if ($hookName == 'thread_view_pagenav_before')
				{
					$contents .= $template->create('SV_rrssbShares', array_merge($hookParams, $template->getParams()));
				}
			}
			if (!empty($optionHookBottom))
			{
				switch ($hookName) 
				{
					case $optionHookBottom :
					{
						$contents .= $template->create('SV_rrssbShares', array_merge($hookParams, $template->getParams()));
						break;
					}
				}
			}
		}
	}
} 