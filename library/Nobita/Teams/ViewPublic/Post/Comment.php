<?php

class Nobita_Teams_ViewPublic_Post_Comment extends XenForo_ViewPublic_Base
{
	public function renderHtml()
	{
		XenForo_Application::set('view', $this);
		
		$bbCodeBase = XenForo_BbCode_Formatter_Base::create('Nobita_Teams_BbCode_Formatter_Base', array('view' => $this));
		$commentBbCode = XenForo_BbCode_Formatter_Base::create('Nobita_Teams_BbCode_Formatter_Comment', array('view', $this));
		
		$bbCodeParser = XenForo_BbCode_Parser::create($bbCodeBase);
		$commentBbCodeParser = XenForo_BbCode_Parser::create($commentBbCode);

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
		//XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['post']['comments'], $commentBbCodeParser, array());
	}
	
	public function renderJson()
	{
		$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create(
			'Nobita_Teams_BbCode_Formatter_Comment', 
			array('view' => $this)
		));

		//$this->_params['comment']['messageHtml'] = new XenForo_BbCode_TextWrapper($this->_params['comment']['message'], $bbCodeParser);
		$this->_params['comment']['messageHtml'] = XenForo_ViewPublic_Helper_Message::getBbCodeWrapper(
			$this->_params['comment'], $bbCodeParser, array()
		);
		return array(
			'comment' => $this->createTemplateObject('Team_post_comment', $this->_params)
		);
	}
}