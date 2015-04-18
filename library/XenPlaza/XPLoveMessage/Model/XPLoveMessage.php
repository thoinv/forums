<?php

class XenPlaza_XPLoveMessage_Model_XPLoveMessage extends XenForo_Model
{
	public function getLoveMessageById($messageId)
	{
		return $this->_getDb()->fetchRow('
			SELECT *
			FROM xf_love_message
			WHERE message_id = ?
		', $messageId);
	}
	
	public function getLoveMessageByIds(array $messageIds, array $fetchOptions = array())
	{
		if (!$messageIds)
		{
			return array();
		}
		
		return $this->fetchAllKeyed('
			SELECT *
			FROM xf_love_message
			WHERE message_id IN (' . $this->_getDb()->quote($messageIds) . ')
		', 'message_id');
	}
	
	public function getAllLoveMessage()
	{
	    return $this->fetchAllKeyed('
	    	SELECT message.*,
	    		sender.display_style_group_id AS from_usergroup,
	    		reciever.display_style_group_id AS to_usergroup
	    	FROM xf_love_message AS message
	    	INNER JOIN xf_user AS sender ON
	    		(sender.user_id = message.from_user_id)
	    	INNER JOIN xf_user AS reciever ON
	    		(reciever.user_id = message.to_user_id)
	    	ORDER BY message_date DESC
	    ', 'messages_id');
	}
	
	public function getLoveMessage()
	{
		$options = XenForo_Application::get('options');
		$limit = $options->XPLoveMessage_limit;

	    return $this->fetchAllKeyed('
	    	SELECT message.*,
	    		sender.display_style_group_id AS from_usergroup,
	    		reciever.display_style_group_id AS to_usergroup
	    	FROM xf_love_message AS message
	    	INNER JOIN xf_user AS sender ON
	    		(sender.user_id = message.from_user_id)
	    	INNER JOIN xf_user AS reciever ON
	    		(reciever.user_id = message.to_user_id)
	    	WHERE message.active = 1
	    	ORDER BY message_date DESC
	    	LIMIT 0,'.$limit.'
	    ', 'messages_id');
	}
	
	public function getActivedLoveMessage()
	{
	    return $this->fetchAllKeyed('
	    	SELECT message.*,
	    		sender.display_style_group_id AS from_usergroup,
	    		reciever.display_style_group_id AS to_usergroup
	    	FROM xf_love_message AS message
	    	INNER JOIN xf_user AS sender ON
	    		(sender.user_id = message.from_user_id)
	    	INNER JOIN xf_user AS reciever ON
	    		(reciever.user_id = message.to_user_id)
	    	WHERE message.active = 1
	    	ORDER BY message_date DESC
	    ', 'messages_id');
	}
	
	public function getUnapproveLoveMessage()
	{
	    return $this->fetchAllKeyed('
	    	SELECT message.*,
	    		sender.display_style_group_id AS from_usergroup,
	    		reciever.display_style_group_id AS to_usergroup
	    	FROM xf_love_message AS message
	    	INNER JOIN xf_user AS sender ON
	    		(sender.user_id = message.from_user_id)
	    	INNER JOIN xf_user AS reciever ON
	    		(reciever.user_id = message.to_user_id)
	    	WHERE message.active = 0
	    	ORDER BY message_date DESC
	    ', 'messages_id');
	}
	
	public function getUserIdByName($username)
	{
		return $this->_getDb()->fetchOne('
			SELECT user_id
			FROM xf_user
			WHERE username = ?
		', $username);
	}
	
	public function getUserField($userId)
	{
		$options = XenForo_Application::get('options');
		$moneySystem = $options->XPLoveMessage_moneySystem;
		
		return $this->_getDb()->fetchOne('
			SELECT '.$moneySystem.'
			FROM xf_user
			WHERE user_id = ?
		',$userId);
	}
	
	public function updateUserField($userId)
	{
		$options = XenForo_Application::get('options');
		$moneySystem = $options->XPLoveMessage_moneySystem;
		$messageFee = $options->XPLoveMessage_messageFee;
		
		$db = $this->_getDb();
		
		$db->query('
			UPDATE xf_user
			SET '.$moneySystem.' = '.$moneySystem.' - '.$messageFee.'
			WHERE user_id = ?
		',$userId);
	}
	
	public function addReceiverUserName($username)
	{
		$toUser = $this->getModelFromCache('XenForo_Model_User')->getUserByName($username, array(
				'join' => XenForo_Model_User::FETCH_USER_FULL
		));
		if (!$toUser)
		{
			return $this->responseError(new XenForo_Phrase('requested_user_not_found'));
		}
		$to = $toUser['username'];
	}
	
	public function processLoveMessageModeration(array $message, $action)
	{
		
		if ($message['active'] != '0')
		{
			return false;
		}
		
		if ($action == 'approve')
		{
			$dw = XenForo_DataWriter::create('XenPlaza_XPLoveMessage_DataWriter_XPLoveMessage');
			$dw->setExistingData($message);
			$dw->set('active', '1');
			$dw->save();
			
			return true;
		}
		else if ($action == 'reject')
		{
			$dw = XenForo_DataWriter::create('XenPlaza_XPLoveMessage_DataWriter_XPLoveMessage');
			$dw->setExistingData($message);
			$dw->delete();

			return true;
		}

		return false;
	}
	
	public function canSendLoveMessage(array $user = null)
	{
		$this->standardizeViewingUserReference($user);

		return XenForo_Permission::hasPermission($user['permissions'], 'XPLoveMessage', 'send');		
	}
	
	public function canApproveLoveMessage(array $user = null)
	{
		$this->standardizeViewingUserReference($user);

		return XenForo_Permission::hasPermission($user['permissions'], 'XPLoveMessage', 'approve');		
	}
	
	public function canManageLoveMessage(array $user = null)
	{
		$this->standardizeViewingUserReference($user);

		return XenForo_Permission::hasPermission($user['permissions'], 'XPLoveMessage', 'manage');		
	}
}