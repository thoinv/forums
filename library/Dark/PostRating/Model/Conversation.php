<?php
  
class Dark_PostRating_Model_Conversation extends XFCP_Dark_PostRating_Model_Conversation
{
	
	private function getExtraSelect(){		
		$options = XenForo_Application::get('options');
		/** @var Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		$ratings = $ratingModel->getRatings();		
		
		$positive = $negative = $neutral = array();
		foreach($ratings as $id => $rating){
			if($rating['type'] == 1)
				$positive[]=$id;
			else if($rating['type'] == -1)
				$negative[]=$id;
			else $neutral[]=$id;
		}					

		$extraSelect = '';
		
		if(!empty($positive))
			$extraSelect .= "
				,(select sum(count_received) from dark_postrating_count where user_id = message.user_id and rating in (".implode(",", $positive).")) as positive_rating_count
			";
		if(!empty($negative))
			$extraSelect .= "
				,(select sum(count_received) from dark_postrating_count where user_id = message.user_id and rating in (".implode(",", $negative).")) as negative_rating_count
			";
		if(!empty($neutral))
			$extraSelect .= "
				,(select sum(count_received) from dark_postrating_count where user_id = message.user_id and rating in (".implode(",", $neutral).")) as neutral_rating_count
			";
			
		return $extraSelect;
	}
	

	public function prepareMessageFetchOptions(array $fetchOptions){
		// pre-1.4
		if(XenForo_Application::get('options')->currentVersionId < 1040000){
			// noop
			return parent::prepareMessageFetchOptions($fetchOptions);		
		// 1.4+	
		} else {			
			$fetchOptions = parent::prepareMessageFetchOptions($fetchOptions);			
			$fetchOptions['selectFields'] .= $this->getExtraSelect();
			return $fetchOptions;
		}
	}
	
	
	public function getConversationMessages($conversationId, array $fetchOptions = array()){					
		// pre-1.4
		if(XenForo_Application::get('options')->currentVersionId < 1040000){
			
			$extraSelect = $this->getExtraSelect();	
			$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);
				
			return $this->fetchAllKeyed($this->limitQueryResults(
				'
					SELECT message.*,
						user.*, IF(user.username IS NULL, message.username, user.username) AS username,
						user_profile.*
						'.$extraSelect.'
					FROM xf_conversation_message AS message
					LEFT JOIN xf_user AS user ON
						(user.user_id = message.user_id)
					LEFT JOIN xf_user_profile AS user_profile ON
						(user_profile.user_id = message.user_id)
					WHERE message.conversation_id = ?
					ORDER BY message.message_date
				', $limitOptions['limit'], $limitOptions['offset']
			), 'message_id', $conversationId);			
		// 1.4+
		} else {			
			//noop
			return parent::getConversationMessages($conversationId, $fetchOptions);				
		}
	}

	
	/**
	 * Finds the newest conversation messages after the specified date.
	 *
	 * @param integer $conversationId
	 * @param integer $date
	 * @param array $fetchOptions
	 *
	 * @return array [message id] => info
	 */
	public function getNewestConversationMessagesAfterDate($conversationId, $date, array $fetchOptions = array()){		
		// pre-1.4
		if(XenForo_Application::get('options')->currentVersionId < 1040000){
			
			$extraSelect = $this->getExtraSelect();
			
			$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

			return $this->fetchAllKeyed($this->limitQueryResults(
				'
					SELECT message.*,
						user.*, IF(user.username IS NULL, message.username, user.username) AS username,
						user_profile.*
						'.$extraSelect.'
					FROM xf_conversation_message AS message
					LEFT JOIN xf_user AS user ON
						(user.user_id = message.user_id)
					LEFT JOIN xf_user_profile AS user_profile ON
						(user_profile.user_id = message.user_id)
					WHERE message.conversation_id = ?
						AND message.message_date > ?
					ORDER BY message.message_date DESC
				', $limitOptions['limit'], $limitOptions['offset']
			), 'message_id', array($conversationId, $date));
		// 1.4+
		} else {			
			//noop
			return parent::getNewestConversationMessagesAfterDate($conversationId, $date, $fetchOptions);		
		}
	}
	
}

						