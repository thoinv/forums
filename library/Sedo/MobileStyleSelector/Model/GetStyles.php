<?php
class Sedo_MobileStyleSelector_Model_GetStyles extends XenForo_Model
{
	public function getStylesOptions($selectedId)
	{
		$visitor = XenForo_Visitor::getInstance();
		
		if( class_exists('Sedo_DetectBrowser_Listener_Visitor') && isset($visitor->getBrowser['isMobile']))
            	{
			$styles = array();
			foreach ($this->getDbStyles() AS $style)
			{
				$styles[$style['style_id']] = array(
					'value' => $style['style_id'],
					'label' => $style['title'],
					'selected' => ($selectedId == $style['style_id'])
				);
			}
		}
		else
		{
			 $styles[1] = array('value'=> 0, 'label' => new XenForo_Phrase('MobileStyleSelector_addon_not_installed'), 'selected'=> true);
		}

		return $styles;
	}

	public function getDbStyles()
	{
		return $this->_getDb()->fetchAll('
			SELECT style_id, title
			FROM xf_style
			WHERE style_id
			ORDER BY style_id
		');
	}
}

	
	
	