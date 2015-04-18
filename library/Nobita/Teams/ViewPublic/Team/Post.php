<?php

class Nobita_Teams_ViewPublic_Team_Post extends XenForo_ViewPublic_Base
{
	public function renderHtml()
	{
		$this->_params['editorTemplate'] = XenForo_ViewPublic_Helper_Editor::getQuickReplyEditor(
			$this, 'message', $this->_params['post']['message'],
			array(
				//'extraClass' => 'NoAutoComplete',
				'json' => array('buttonConfig' => $this->_params['customEditor'])
			)
		);

		$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create(
			'Nobita_Teams_BbCode_Formatter_Base', array('view' => $this))
		);
		$bbCodeOptions = array(
			'states' => array(
				'viewAttachments' => $this->_params['canViewAttachments']
			),
			'contentType' => 'team_post',
			'contentIdKey' => 'post_id'
		);

		$this->_params['post']['messageHtml'] = XenForo_ViewPublic_Helper_Message::getBbCodeWrapper(
			$this->_params['post'], $bbCodeParser, $bbCodeOptions
		);
	}
}