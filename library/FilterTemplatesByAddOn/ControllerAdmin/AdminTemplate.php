<?php

class FilterTemplatesByAddOn_ControllerAdmin_AdminTemplate extends XFCP_FilterTemplatesByAddOn_ControllerAdmin_AdminTemplate
{
	public function actionIndex()
	{
		$parent = parent::actionIndex();
		
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
				unset($parent->params['templates'][$key]);
			}
		}
		
		$parent->params += array(
			'addOns' => $addOns,
			'selectedAddOn' => $selectedAddOn,
			'addOnId' => $addOnId
		);
					
		return $parent;
	}	
	
	public function actionSearch()
	{
		$addOns = $this->_getAddOnModel()->getAllAddOns();
		
		if ($this->_input->filterSingle('search', XenForo_Input::UINT))
		{
			$adminTemplateModel = $this->_getAdminTemplateModel();
			
			$input = $this->_input->filter(array(
				'addon_id' => XenForo_Input::STRING,
				'title' => XenForo_Input::STRING,
				'template' => XenForo_Input::STRING,
			));
			
			$addOn = false;
			
			$conditions = array();
			if (!empty($input['title']))
			{
				$conditions['title'] = $input['title'];
			}
			if (!empty($input['template']))
			{
				// translate @x searches to "{xen:property x" as that is what is stored
				$text = preg_replace('/@property\s*(")?([a-z0-9_]*)/i', '{xen:property \\2', $input['template']);
				$text = preg_replace('/@([a-z0-9_]+)/i', '{xen:property \\1', $text);

				$conditions['template'] = $text;
			}
			if (!empty($input['addon_id']))
			{
				$conditions['addon_id'] = $input['addon_id'] == 'XenForo' ? '' : $input['addon_id'];
				
				$addOn = $this->_getAddOnModel()->getAddOnById($input['addon_id']);
			}
			
			if (empty($conditions))
			{
				return $this->responseError(new XenForo_Phrase('please_complete_required_fields'));
			}
			
			$templates = $adminTemplateModel->getAdminTemplates($conditions);
			
			if ($input['addon_id'] == 'XenForo')
			{
				foreach ($templates AS $key => &$template)
				{
					if ($template['addon_id'] != '')
					{
						unset($templates[$key]);
						
						$addOn = array(
							'addon_id' => 'XenForo',
							'title' => 'XenForo'
						);
					}
				}
			}
			
			$viewParams = array(
				'addOn' => $addOn,
				'templates' => $templates
			);
			return $this->responseView('XenForo_ViewAdmin_AdminTemplate_SearchResults', 'admin_template_search_results', $viewParams);			
		}
		else
		{
			$viewParams = array(
				'addOns' => $addOns
			);
			
			return $this->responseView('XenForo_ViewAdmin_AdminTemplate_Search', 'admin_template_search', $viewParams);
		}
	}
}
