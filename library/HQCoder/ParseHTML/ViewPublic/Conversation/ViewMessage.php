<?php

class HQCoder_ParseHTML_ViewPublic_Conversation_ViewMessage extends XFCP_HQCoder_ParseHTML_ViewPublic_Conversation_ViewMessage
{
	public function renderHtml()
	{
		$response = parent::renderHtml();
		
		$bbCodeParser = new HQCoder_ParseHTML_BbCode_Parser(HQCoder_ParseHTML_BbCode_Formatter_Ritsu::create('HQCoder_ParseHTML_BbCode_Formatter_Ritsu', array('view' => $this)));
		$bbCodeOptions = array(
			'states' => array(
				'viewAttachments' => $this->_params['canViewAttachments']
			)
		);

		$this->_params['message']['messageHtml'] = HQCoder_ParseHTML_ViewPublic_Helper_Message::getBbCodeWrapper(
			$this->_params['message'], $bbCodeParser, $bbCodeOptions);
			
		return $response;
	}
}