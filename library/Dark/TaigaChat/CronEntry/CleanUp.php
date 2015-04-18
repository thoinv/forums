<?php
  
class Dark_TaigaChat_CronEntry_CleanUp {
	
	public static function runDailyCleanUp(){
		
		$options = XenForo_Application::get('options');
		$model = XenForo_Model::create('Dark_TaigaChat_Model_TaigaChat');
		
		if($options->dark_taigachat_archivethread > 0){			
			
			$messages = array_reverse($model->getMessagesToday());
			
			if(count($messages) > 0){	
				
				$userModel = XenForo_Model::create('XenForo_Model_User');			
				$post = "";
				foreach($messages as $message){
					$date = XenForo_Locale::dateTime($message['date'], 'absolute');
					if($message['user_id'] > 0){
						$url = XenForo_Link::convertUriToAbsoluteUri(XenForo_Link::buildPublicLink("members/".$message['user_id']), true);                        
						$user = "[url='{$url}']{$message['username']}[/url]";
					} else {
						$user = "[b]{$message['username']}[/b]";					
					}
					$post .= "{$date} - {$user}: {$message['message']}\r\n";
				}
				
				$username = "TaigaChat";
				if($options->dark_taigachat_archiveuser > 0){
					$user = $userModel->getUserById($options->dark_taigachat_archiveuser);
					$username = $user['username'];
				}
				
				$writer = XenForo_DataWriter::create('XenForo_DataWriter_DiscussionMessage_Post');
				$writer->setOption(XenForo_DataWriter_DiscussionMessage::OPTION_IS_AUTOMATED, true);
				$writer->set('user_id', $options->dark_taigachat_archiveuser);
				$writer->set('username', $username);
				$writer->set('message', $post);
				$writer->set('thread_id', $options->dark_taigachat_archivethread);
				$writer->save();
			}
		}
		
		$model->deleteOldMessages();
	}
	
}

