<?php

class DigitalPointAdPositioning_Model_Conversation extends XFCP_DigitalPointAdPositioning_Model_Conversation
{
	public function getConversationForUser($conversationId, $viewingUser, array $fetchOptions = array())
	{
		$joinOptions = $this->prepareConversationFetchOptions($fetchOptions);

		return $this->_getDb()->fetchRow('
			SELECT conversation_master.*,
				conversation_user.*,
				conversation_recipient.recipient_state, conversation_recipient.last_read_date
				' . $joinOptions['selectFields'] . '
			FROM xf_conversation_user AS conversation_user
			INNER JOIN xf_conversation_master AS conversation_master ON
				(conversation_user.conversation_id = conversation_master.conversation_id)
			INNER JOIN xf_conversation_recipient AS conversation_recipient ON
					(conversation_user.conversation_id = conversation_recipient.conversation_id
					AND conversation_user.owner_user_id = conversation_recipient.user_id)
				' . $joinOptions['joinTables'] . '
			WHERE conversation_user.conversation_id = ?
		', array($conversationId));
	}
}