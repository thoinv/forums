<?php
class Dark_Minorin_EventListener_TemplateHook {
	
	public static function listen($hookName, &$content, array $hookParams, XenForo_Template_Abstract $template){
		
		if($hookName == 'editor'){
			$params = $template->getParams();
			
			$options = XenForo_Application::get('options');
			if($options->dark_minorin_enabled){                
				$smilies = array();
				$toolbar_bbcode = array();
				$toolbar_bbcode_temp = explode("\n", str_replace("\r", "", trim($options->dark_minorin_bbcode)));            
				foreach($toolbar_bbcode_temp as $bbcode){
					$bbcode = explode(":", trim($bbcode));
					$toolbar_bbcode[$bbcode[0]] = $bbcode[1];
				}
				
				if (XenForo_Application::isRegistered('smilies'))
				{
					$smilies = XenForo_Application::get('smilies');
				}
				else
				{
					$smilies = XenForo_Model::create('XenForo_Model_Smilie')->getAllSmiliesForCache();
					XenForo_Application::set('smilies', $smilies);
				}
			
				foreach($smilies as &$smilie){
					$smilie['text'] = $smilie['smilieText'][0];
					$smilie['sprite_mode'] = array_key_exists('sprite_params', $smilie);
				}
			
				$params += array('minorin' => array(
					"toolbar_bbcode" => $toolbar_bbcode,
					"toolbar_smilies" => $smilies,
					"enabled" => $options->dark_minorin_enabled,
					"js_modification" => filemtime("js/dark/minorin.js")
				));
			}     
			
			$content .= $template->create('dark_minorin_toolbar', $params);   
		}
				
	}    
}
