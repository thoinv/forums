<?php

class ChipXF_MobileSwitcher_Listener {
	
	public static function init_dependencies(XenForo_Dependencies_Abstract $dependencies, array $data)
	{
		if($dependencies instanceof XenForo_Dependencies_Public AND ChipXF_MobileSwitcher_Detecter::isMobile()) 
		{
			foreach($data['codeEventListeners'] as $event => &$callbackList)
			{
				foreach($callbackList as $key => $callback)
				{
					if(in_array($callback[0], XenForo_Application::get('options')->ChipXF_MS_AddonsDisabled))
					{
						unset($data['codeEventListeners'][$event][$key]);
					}
				}
			}
			XenForo_CodeEvent::removeListeners();
			XenForo_CodeEvent::setListeners($data['codeEventListeners']);
			ChipXF_MobileSwitcher_Detecter::$isMobile = true;	
		}	
	}
	
	public static function visitor_setup(XenForo_Visitor &$visitor)
	{
		if(ChipXF_MobileSwitcher_Detecter::$isMobile AND $styleId = XenForo_Application::getOptions()->ChipXF_MS_MobileStyleId)
		{
			$visitor['style_id'] = $styleId;
		}
	}
}