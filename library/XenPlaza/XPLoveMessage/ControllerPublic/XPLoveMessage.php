<?php

class XenPlaza_XPLoveMessage_ControllerPublic_XPLoveMessage extends XenForo_ControllerPublic_Abstract
{
	protected function _preDispatch($action)
	{
		$this->_assertRegistrationRequired();
	}
	
	public function actionIndex()
	{
		$canApproveLoveMessages = $this->_getLoveMessageModel()->canApproveLoveMessage();
    	$canManageLoveMessages = $this->_getLoveMessageModel()->canManageLoveMessage();
		
    	$visitor = XenForo_Visitor::getInstance();
		$userMoney = $this->_getLoveMessageModel()->getUserField($visitor['user_id']);
		
		if (!$this->_getLoveMessageModel()->canSendLoveMessage())
		{
			throw $this->getErrorOrNoPermissionResponseException('XP_you_do_not_have_permission_or_perform_this_action');
		}

		$viewParams = array(
        	'canApproveLoveMessages' => $canApproveLoveMessages,
        	'canManageLoveMessages' => $canManageLoveMessages,
        	'userMoney' => $userMoney
        );
		
		//return $this->responseView('', 'XP_love_message_send', array());
		return $this->responseView('', 'XP_love_message_send', $viewParams);
	}
	
	public function actionSend()
    {
    	$this->_assertPostOnly();
    	
    	$visitor = XenForo_Visitor::getInstance();
    	$options = XenForo_Application::get('options');
    	$to = $this->_input->filterSingle('to', XenForo_Input::STRING);
    	$receiver = $this->_input->filterSingle('receiver', XenForo_Input::STRING);
    	$text = $this->_input->filterSingle('love_message', XenForo_Input::STRING);
		
    	if (!$receiver) 
    	{
    		return $this->responseError(new XenForo_Phrase('please_enter_valid_name'));
    	}
    	else 
    	{
    		$toUser = $this->getModelFromCache('XenForo_Model_User')->getUserByName($receiver, array(
				'join' => XenForo_Model_User::FETCH_USER_FULL
			));
			if (!$toUser)
			{
				return $this->responseError(new XenForo_Phrase('requested_user_not_found'));
			}
			
    		$receiverId = $this->_getLoveMessageModel()->getUserIdByName($receiver);
    	}
    	
    	if (!$text) 
    	{
    		return $this->responseError(new XenForo_Phrase('please_enter_valid_message'));
    	}
    	
    	if (strlen($text) > $options->XPLoveMessage_messageLength)
		{
    		return $this->responseError(new XenForo_Phrase('submitted_message_is_too_long_to_be_processed'));
    	}
    	
		if (!$this->_getLoveMessageModel()->canSendLoveMessage())
		{
			throw $this->getErrorOrNoPermissionResponseException('XP_you_do_not_have_permission_or_perform_this_action');
		}

        $active = !$options->XPLoveMessage_moderation ? '1' : '0';
        
        $LoveMessageDw = XenForo_DataWriter::create('XenPlaza_XPLoveMessage_DataWriter_XPLoveMessage');
        $LoveMessageDw->set('message', $text);
        $LoveMessageDw->set('from_user_id', $visitor['user_id']);
		$LoveMessageDw->set('from_username', $visitor['username']);
		$LoveMessageDw->set('to_user_id', $receiverId);
		$LoveMessageDw->set('to_username', $receiver);
		$LoveMessageDw->set('active', $active);

        $LoveMessageDw->save();
        
        /*
        $LoveMessageDw->preSave();

		if (!$LoveMessageDw->hasErrors())
		{
			$this->assertNotFlooding('conversation');
		}
		*/
		
		$messageFee = $options->XPLoveMessage_messageFee;
		$userMoney = $this->_getLoveMessageModel()->getUserField($visitor['user_id']);
		if ($userMoney < $messageFee)
		{
			throw $this->getErrorOrNoPermissionResponseException('XP_you_do_not_have_enough_money');
		}
		
		$this->_getLoveMessageModel()->updateUserField($visitor['user_id']);
		
        return $this->responseRedirect(
            XenForo_ControllerResponse_Redirect::SUCCESS,
            $this->getDynamicRedirect()
        );
    }
    
    public function actionActived()
    {
    	$canManageLoveMessages = $this->_getLoveMessageModel()->canManageLoveMessage();
    	
    	if (!$canManageLoveMessages)
		{
			throw $this->getErrorOrNoPermissionResponseException('XP_you_do_not_have_permission_or_perform_this_action');
		}
    	
    	$loveMessages = $this->_getLoveMessageModel()->getActivedLoveMessage();
    	if (!$loveMessages)
    	{
    		return $this->responseMessage(new XenForo_Phrase('XP_no_messages_awaiting_approval'));
    	}
    	
    	$viewParams = array(
        	'loveMsgs' => $loveMessages,
        );
    	return $this->responseView('XenPlaza_XPLoveMessage_ViewPublic_XPLoveMessage', 'XP_love_message_actived', $viewParams);
    }
    
    public function actionEdit()
    {
    	$messageId = $this->_input->filterSingle('message_id', XenForo_Input::UINT);
    	$message = $this->_getLoveMessageModel()->getLoveMessageById($messageId);
    	
    	$canManageLoveMessages = $this->_getLoveMessageModel()->canManageLoveMessage();
    	
    	if (!$canManageLoveMessages)
		{
			throw $this->getErrorOrNoPermissionResponseException('XP_you_do_not_have_permission_or_perform_this_action');
		}

		if($this->_input->inRequest("message"))
		{
			$input = $this->_input->filter(array(
				'message' => XenForo_Input::STRING
			));
			//$input['message'] = XenForo_Helper_String::autoLinkBbCode($input['message']);

			$dw = XenForo_DataWriter::create('XenPlaza_XPLoveMessage_DataWriter_XPLoveMessage');
			$dw->setExistingData($message);
			$dw->set('message', $input['message']);
			$dw->save();
			
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				$this->getDynamicRedirect()
			);		
			
		} else {			
		
			$viewParams = array(
				'message' => $message
			);
					
			return $this->responseView('', 'XP_love_message_edit', $viewParams); 
		}
    }
    
    public function actionDelete()
    {
    	$messageId = $this->_input->filterSingle('message_id', XenForo_Input::UINT);
    	$message = $this->_getLoveMessageModel()->getLoveMessageById($messageId);
    	
    	$canManageLoveMessages = $this->_getLoveMessageModel()->canManageLoveMessage();
    	
    	if (!$canManageLoveMessages)
		{
			throw $this->getErrorOrNoPermissionResponseException('XP_you_do_not_have_permission_or_perform_this_action');
		}
    	
    	$loveMessages = $this->_getLoveMessageModel()->getActivedLoveMessage();
    	
    	if (!$loveMessages)
    	{
    		//return $this->responseMessage(new XenForo_Phrase('XP_no_actived_messages')); //Bugged
    		throw $this->getErrorOrNoPermissionResponseException('XP_no_actived_messages');
    	}
    	
    	
    	$dw = XenForo_DataWriter::create('XenPlaza_XPLoveMessage_DataWriter_XPLoveMessage');
		$dw->setExistingData($message);
		$dw->delete();
    	
    	return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			//XenForo_Link::buildPublicLink('love-message')
			$this->getDynamicRedirect()
		);
    }
   	
    public function actionModerated()
    {
    	$canApproveLoveMessages = $this->_getLoveMessageModel()->canApproveLoveMessage();
    	$canManageLoveMessages = $this->_getLoveMessageModel()->canManageLoveMessage();
    	
    	if (!$canApproveLoveMessages AND !$canManageLoveMessages)
		{
			throw $this->getErrorOrNoPermissionResponseException('XP_you_do_not_have_permission_or_perform_this_action');
		}
    	
    	$unapproveLoveMessages = $this->_getLoveMessageModel()->getUnapproveLoveMessage();
    	
    	if (!$unapproveLoveMessages)
    	{
    		//return $this->responseMessage(new XenForo_Phrase('XP_no_messages_awaiting_approval')); //Bugged
    		throw $this->getErrorOrNoPermissionResponseException('XP_no_messages_awaiting_approval');
    	}
    	
    	
        $viewParams = array(
        	'loveMsgs' => $unapproveLoveMessages,
        	'canApproveLoveMessages' => $canApproveLoveMessages,
        	'canManageLoveMessages' => $canManageLoveMessages
        );
        return $this->responseView('', 'XP_love_message_moderated', $viewParams);
    }
    
    public function actionModeratedUpdate()
	{
		$this->_assertPostOnly();

		$messagesInput = $this->_input->filterSingle('messages', XenForo_Input::ARRAY_SIMPLE);
		$messages = $this->_getLoveMessageModel()->getLoveMessageByIds(array_keys($messagesInput));

		foreach ($messages AS $message)
		{
			if (!isset($messagesInput[$message['message_id']]))
			{
				continue;
			}

			$messageControl = $messagesInput[$message['message_id']];
			if (empty($messageControl['action']) || $messageControl['action'] == 'none')
			{
				continue;
			}

			$this->getModelFromCache('XenPlaza_XPLoveMessage_Model_XPLoveMessage')->processLoveMessageModeration(
				$message, $messageControl['action']
			);
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			//XenForo_Link::buildPublicLink('love-message')
			$this->getDynamicRedirect()
		);
	}
    
    protected function _getLoveMessageModel()
    {
        return $this->getModelFromCache ( 'XenPlaza_XPLoveMessage_Model_XPLoveMessage' );
    }
}
?>