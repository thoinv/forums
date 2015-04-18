<?php

class FilterTemplatesByAddOn_ControllerAdmin_Style extends XFCP_FilterTemplatesByAddOn_ControllerAdmin_Style
{
	public function actionTemplates()
	{
		$parent = parent::actionTemplates();
		
		$addOnId = $this->_input->filterSingle('addon_id', XenForo_Input::STRING);
		
		$addOns = $this->getModelFromCache('XenForo_Model_AddOn')->getAllAddOns();
		if (!$addOnId)
		{
			$parent->params['addOns'] = $addOns;
			
			return $parent;
		}
		
		$selectedAddOn = isset($addOns[$addOnId]) ? $addOns[$addOnId] : false;
		if (!$selectedAddOn && $addOnId != 'XenForo')
		{
			return $this->responseError(new XenForo_Phrase('requested_addon_not_found'), 404);
		}
		
		foreach ($parent->params['templates'] AS $key => &$template)
		{			
			if ($addOnId == 'XenForo')
			{
				if ($template['addon_id'] != '')
				{
					$selectedAddOn = array(
						'addon_id' => 'XenForo',
						'title' => 'XenForo'
					);
					unset ($parent->params['templates'][$key]);
				}				
			}
			elseif ($template['addon_id'] != $addOnId)
			{
				unset ($parent->params['templates'][$key]);
			}
		}
		
		$parent->params += array(
			'addOns' => $addOns,
			'selectedAddOn' => $selectedAddOn,
			'addOnId' => $addOnId
		);
					
		return $parent;
	}
}
