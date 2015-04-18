<?php

class Nobita_Teams_ViewPublic_Post_Show extends XenForo_ViewPublic_Base
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
		XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['post']['comments'], $commentBbCodeParser, array());
	}

	public function renderJson()
	{
		$bbCodeBase = XenForo_BbCode_Formatter_Base::create('Nobita_Teams_BbCode_Formatter_Base', array('view' => $this));
		$commentBbCode = XenForo_BbCode_Formatter_Base::create('Nobita_Teams_BbCode_Formatter_Comment', array('view', $this));
		
		$bbCodeParser = XenForo_BbCode_Parser::create($bbCodeBase);
		$commentBbCodeParser = XenForo_BbCode_Parser::create($commentBbCode);

		$bbCodeOptions = array(
			'states' => array(
				'viewAttachments' => $this->_params['canViewAttachments']
			)
		);
		
		$this->_params['post']['messageHtml'] = XenForo_ViewPublic_Helper_Message::getBbCodeWrapper(
			$this->_params['post'], $bbCodeParser, $bbCodeOptions
		);
		XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['post']['comments'], $commentBbCodeParser, array());
		
		$output = array('messagesTemplateHtml' => array());

		$post = $this->_params['post'];
		$output['messagesTemplateHtml']["#post-$post[post_id]"] = $this->createTemplateObject(
			'Team_post', array_merge($this->_params, array('post' => $post)))
			->render();

		$template = $this->createTemplateObject('', array());

		$output['css'] = $template->getRequiredExternals('css');
		$output['js'] = $template->getRequiredExternals('js');

		return XenForo_ViewRenderer_Json::jsonEncodeForOutput($output);
	}
}