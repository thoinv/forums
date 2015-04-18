<?php

class FilterTemplatesByAddOn_ControllerAdmin_Template extends XFCP_FilterTemplatesByAddOn_ControllerAdmin_Template
{
	public function actionSearch()
	{
		$parent = parent::actionSearch();
		
		$parent->params['addOns'] = $this->getModelFromCache('XenForo_Model_AddOn')->getAllAddOns();
		
		if ($this->_input->filterSingle('search', XenForo_Input::UINT))
		{
			$addOnId = $this->_input->filterSingle('addon_id', XenForo_Input::STRING);
			
			if ($addOnId && $addOnId != 'XenForo')
			{
				$addOn = $parent->params['addOns'][$addOnId];	
				$parent->params['addOn'] = $addOn;
				
				if (!empty($parent->params['templates']))
				{
					foreach ($parent->params['templates'] AS $key => $template)
					{
						if ($template['addon_id'] != $addOnId)
						{
							unset($parent->params['templates'][$key]);
						}
					}					
				}			
			}
			elseif ($addOnId == 'XenForo')
			{
				$parent->params['addOn'] = array(
					'addon_id' => 'XenForo',
					'title' => 'XenForo'
				);
				
				if (!empty($parent->params['templates']))
				{
					foreach ($parent->params['templates'] AS $key => $template)
					{
						if ($template['addon_id'] != '')
						{
							unset($parent->params['templates'][$key]);
						}
					}
				}
			}
			
			return $parent;
		}		
		
		return $parent;
	}	
}
