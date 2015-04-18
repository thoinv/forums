<?php

class Nobita_Teams_ViewPublic_Event_Comment extends XenForo_ViewPublic_Base
{
	public function renderJson()
	{
		$bbCodeParser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create(
			'Nobita_Teams_BbCode_Formatter_Comment', 
			array('view' => $this)
		));

		$this->_params['comment']['messageHtml'] = XenForo_ViewPublic_Helper_Message::getBbCodeWrapper(
			$this->_params['comment'], $bbCodeParser, array()
		);

		$output = $this->_renderer->getDefaultOutputArray(get_class($this), $this->_params, $this->_templateName);

		return XenForo_ViewRenderer_Json::jsonEncodeForOutput($output);
	}

}