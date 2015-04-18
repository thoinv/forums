<?php
class Nobita_Teams_ViewPublic_Team_Wall extends XenForo_ViewPublic_Base
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

		$this->_params['team']['aboutHtml'] = new XenForo_BbCode_TextWrapper($this->_params['team']['about'], $bbCodeParser);
		XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['posts'], $bbCodeParser, $bbCodeOptions);

		foreach ($this->_params['posts'] as &$post)
		{
			if (!$post['comments'])
			{
				continue;
			}

			XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($post['comments'], $commentBbCodeParser, array());
		}

		XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['stickyPosts'], $bbCodeParser, $bbCodeOptions);
		foreach ($this->_params['stickyPosts'] as &$post)
		{
			if (!$post['comments'])
			{
				continue;
			}
			XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($post['comments'], $commentBbCodeParser, array());
		}
		unset($post);

		$this->_params['editorTemplate'] = XenForo_ViewPublic_Helper_Editor::getEditorTemplate(
			$this, 'message', '',
			array(
				'json' => array('buttonConfig' => $this->_params['customEditor']),
				'height' => '60px'
			)
		);


	}
}