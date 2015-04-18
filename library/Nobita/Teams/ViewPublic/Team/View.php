<?php

class Nobita_Teams_ViewPublic_Team_View extends XenForo_ViewPublic_Base
{
	public function renderHtml()
	{
		XenForo_Application::set('view', $this);
		
		$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('Base', array('view' => $this)));
		foreach ($this->_params['customFieldsGrouped'] AS $fieldId => &$fields)
		{
			if (empty($fields['fieldChoices']))
			{
				unset($this->_params['customFieldsGrouped'][$fieldId]);
				continue;
			}

			foreach ($fields as &$field)
			{
				if ($field['field_type'] == 'bbcode') 
				{
					$field['fieldValueHtml'] = new XenForo_BbCode_TextWrapper($field['field_value'], $bbCodeParser);
				}
				else
				{
					$field['fieldValueHtml'] = Nobita_Teams_ViewPublic_Helper_Team::getTeamFieldValueHtml($this->_params['team'], $field, $field['field_value']);
				}
			}
		}

	}
}