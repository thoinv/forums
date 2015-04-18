<?php
class xenCODE_ForceRegister_Listener {
	public static function template_create($templateName, array &$params, XenForo_Template_Abstract $template) {
		switch ($templateName) {
			case 'PAGE_CONTAINER':
			$template->preloadTemplate('xenCODE_ForceRegister');
			break;
		}
	}
	
	public static function template_render($name, &$contents, $params, XenForo_Template_Abstract $template) {
		if ($name == 'xenCODE_ForceRegister_css') {
			
			$images = array('v1','v2','v3','v4','v5');
			$randomzie = $images[rand(0,4)];

			$addtemplate =  'div.xenCODE_ForceRegister{ background: url("styles/default/xenCODE/ForceRegister/'.$randomzie.'.png") no-repeat scroll 0 0 transparent; bottom: 0; height: 200px; position: fixed; right: 1px; width: 300px; z-index: 1; }';
			$needle = 'div.xenCODE_ForceRegister{}';
			$contents = str_replace($needle, $addtemplate, $contents);

			return $contents;
		}
		
		if ($name == 'body') {
			$addtemplate = $template->create('xenCODE_ForceRegister', $template->getParams());
			$rendered = $addtemplate->render();
			
			$needle = '</footer>';
			
			$contents = str_replace($needle, $rendered.$needle, $contents);
			return $contents;
		}
	}
}
?>