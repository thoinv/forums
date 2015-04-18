<?php

class Nobita_Teams_ViewPublic_Event_View extends XenForo_ViewPublic_Base
{
	public function renderHtml()
	{
		XenForo_Application::set('view', $this);
		
		$bbCodeOptions = array(
			'states' => array(
				'viewAttachments' => $this->_params['canViewAttachments']
			),
			'contentType' => 'team_event',
			'contentIdKey' => 'event_id'
		);

		$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('Base', array('view' => $this)));

		$event =& $this->_params['event'];
		$event['message'] = $event['event_description'];

		unset($event['event_description']);

		$event['descriptionHtml'] = XenForo_ViewPublic_Helper_Message::getBbCodeWrapper($event, $bbCodeParser, $bbCodeOptions);

		$commentBbCode = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create(
			'Nobita_Teams_BbCode_Formatter_Comment', 
			array('view' => $this)
		));
		XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['comments'], $commentBbCode, array());

		// Simple comment form
		$this->_params['editorTemplate'] = XenForo_ViewPublic_Helper_Editor::getEditorTemplate(
			$this, 'message', '',
			array(
				'extraClass' => 'NoAutoComplete',
				'json' => array('buttonConfig' => $this->_params['configButtons'])
			)
		);

	}

	



}