<?php

class Nobita_Teams_ViewPublic_Post_Comments extends XenForo_ViewPublic_Base
{
	public function renderJson()
	{
		$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create(
			'Nobita_Teams_BbCode_Formatter_Comment', 
			array('view' => $this)
		));

		XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['comments'], $bbCodeParser, array());
		$comments = array();

		if ($this->_params['post']['first_comment_date'] < $this->_params['firstCommentShown']['comment_date'])
		{
			$comments[] = $this->createTemplateObject(
				'Team_post_comments_before', $this->_params
			);
		}

		foreach ($this->_params['comments'] AS $comment)
		{
			$comments[] = $this->createTemplateObject(
				'Team_post_comment', array('comment' => $comment) + $this->_params
			);
		}

		return array(
			'comments' => $comments
		);
	}
}