<?php

class HQCoder_ParseHTML_ViewPublic_Conversation_ViewNewMessages extends XFCP_HQCoder_ParseHTML_ViewPublic_Conversation_ViewNewMessages
{
	public function renderHtml()
	{		
		$bbCodeParser = new HQCoder_ParseHTML_BbCode_Parser(HQCoder_ParseHTML_BbCode_Formatter_Ritsu::create('HQCoder_ParseHTML_BbCode_Formatter_Ritsu', array('view' => $this)));
		$bbCodeOptions = array(
			'states' => array(
				'viewAttachments' => $this->_params['canViewAttachments']
			)
		);
		HQCoder_ParseHTML_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['messages'], $bbCodeParser, $bbCodeOptions);
	}

}