<?php

class FilterTemplatesByAddOn_Listener
{
	public static function templatePostRender($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
	{
		switch ($templateName)
		{
			case 'template_list':

				$params = $template->getParams();
				$params['type'] = 'public';
				
				$replace = $template->create('template_list_addon_filter', $params);
				$content = preg_replace('/<div class="Popup">(.*?<\/div>){3}/is', "\\0 $replace", $content);
				break;
				
			case 'template_search':
			
				$params = $template->getParams();
				
				$replace = $template->create('template_search_addon_filter', $params);
				$content = preg_replace('/<dl class="ctrlUnit">(.*?<\/dl>){1}/is', "\\0 $replace", $content, 1);
				break;
				
			case 'template_search_results':
			
				$params = $template->getParams();
				
				if (!empty($params['addOn']))
				{
					$containerData['title'] .= '<br />' . new XenForo_Phrase('add_on') . ': ' . $params['addOn']['title'];
				}
				break;
				
			case 'admin_template_list':
			
				$params = $template->getParams();
				$params['type'] = 'admin';
								
				$replace = $template->create('template_list_addon_filter', $params);
				$content = preg_replace('/<form action="[^\>]*>(.*?)<\/form>/is', "$replace \\0", $content);
				break;
		}
	}
	
	public static function extendControllers($class, array &$extend)
	{
		switch ($class)
		{
			case 'XenForo_ControllerAdmin_Style':
		
				$extend[] = 'FilterTemplatesByAddOn_ControllerAdmin_Style';
				break;
				
			case 'XenForo_ControllerAdmin_Template':
			
				$extend[] = 'FilterTemplatesByAddOn_ControllerAdmin_Template';
				break;
				
			case 'XenForo_ControllerAdmin_AdminTemplate':
			
				$extend[] = 'FilterTemplatesByAddOn_ControllerAdmin_AdminTemplate';
				break;
		}
	}
	
	public static function extendModels($class, array &$extend)
	{
		switch ($class)
		{
			case 'XenForo_Model_AdminTemplate':
			
				$extend[] = 'FilterTemplatesByAddOn_Model_AdminTemplate';
				break;
		}
	}
}