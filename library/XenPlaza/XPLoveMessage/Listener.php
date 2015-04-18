<?php
class XenPlaza_XPLoveMessage_Listener
{
	
	public static function templateCreate($templateName, array &$params, XenForo_Template_Abstract $template) 
	{
		$template->preloadTemplate('XP_love_message');
		$template->preloadTemplate('XP_love_message_view');
		$template->preloadTemplate('XP_love_message_forum_list');
	}
	
    public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template) 
    {
    	
    	$options = XenForo_Application::get('options');
    	
    	$position = $options->XPLoveMessage_position;
    	if ($position != 'other') {
			if ($hookName == $position) {
				$ourTemplate = $template->create('XP_love_message', $template->getParams());
				$contents .= $ourTemplate->render();
			}
		}
		
		if ($hookName == 'navigation_tabs_forums')
		{
			$contents .= '<li><a href="' . XenForo_Link::buildPublicLink('love-message') . '">' . new XenForo_Phrase('XP_love_message') . '</a></li>';
		}
	}
	
	public static function loadClassListener($class, &$extend)
	{
		$classes = array(
			'ControllerPublic_Index',
			'ControllerPublic_Post',
			'ControllerPublic_Thread',
		);
		foreach($classes AS $clas){
			if ($class == 'XenForo_' .$clas)
			{
				$extend[] = 'XenPlaza_XPLoveMessage_' .$clas;
			}
		}
	}
	public static function templatePostRender($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
    {
		$loveMessageModel = new XenPlaza_XPLoveMessage_Model_XPLoveMessage;
		$containerData['loveMessages'] = $loveMessageModel->getLoveMessage();
	}
}