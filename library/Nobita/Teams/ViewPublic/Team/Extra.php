<?php

class Nobita_Teams_ViewPublic_Team_Extra extends XenForo_ViewPublic_Base
{
	public function renderHtml()
	{
		XenForo_Application::set('view', $this);

		$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('Base', array('view' => $this)));
		
		$this->_params['team']['aboutHtml'] = new XenForo_BbCode_TextWrapper(
			$this->_params['team']['about'], $bbCodeParser
		);

		foreach ($this->_params['customFieldsGrouped'] AS $id => &$fields)
		{
			if (empty($fields['fieldChoices']))
			{
				// hard remove if custom fields did not have any values
				// @link https://nobita.me/threads/227/
				unset($this->_params['customFieldsGrouped'][$id]);
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
		unset($fields, $field);
		foreach ($this->_params['parentTabsGrouped'] as &$fields)
		{
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