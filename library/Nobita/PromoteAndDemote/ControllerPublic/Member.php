<?php

class Nobita_PromoteAndDemote_ControllerPublic_Member extends XFCP_Nobita_PromoteAndDemote_ControllerPublic_Member
{
	public function actionPromote() {
		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
		
		$userModel = $this->_getUserModel();
		$user = $userModel->getUserById($userId);
		if(!$user)
		{
			return $this->responseError(new XenForo_Phrase('requested_member_not_found'), 404);
		}
		
		if(!$userModel->canPromote($user, $errorPhraseKey)) {
			throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}

		$canPromotePrimary = $userModel->canPromotePrimary($user);
		$canPromoteSecondary = $userModel->canPromoteSecondary($user);
		$userGroups = Nobita_PromoteAndDemote_Helper::userGroups();
		
		$primaryGroupId = $this->_input->filterSingle('primary_group', XenForo_Input::UINT);
		$secondaryGroupIdsFromInput = $this->_input->filterSingle('secondary_groups', XenForo_Input::UINT, array('array' => true));	
		$sendMail = $this->_input->filterSingle('send_mail', XenForo_Input::UINT);
		$remove = $this->_input->filterSingle('remove', XenForo_Input::UINT);
		
		if($this->isConfirmedPost())
		{
			$writer = XenForo_DataWriter::create('XenForo_DataWriter_User');
			$writer->setExistingData($user['user_id']);
			
			if ($primaryGroupId && $canPromotePrimary)
			{
				$writer->set('user_group_id', $primaryGroupId);
			}
			
			if ($canPromoteSecondary)
			{
				if ($remove)
				{
					$writer->setSecondaryGroups($secondaryGroupIdsFromInput);
				}
				else
				{
					$currentGroupIds = $user['secondary_group_ids'];
					if (!empty($currentGroupIds)) {
						$currentGroupIds = explode(',', $currentGroupIds);
						
						$secondaryGroupIdsFromInput = array_merge($secondaryGroupIdsFromInput, $currentGroupIds);
					}
					
					$writer->setSecondaryGroups($secondaryGroupIdsFromInput);
				}
			}
			
			$writer->save();
			if ($sendMail)
			{
				$options = XenForo_Application::get('options');
				
				$boardTitle = $options->boardTitle;
				$boardUrl = $options->boardUrl;
				
				$subject = $options->PromoteAndDemote_subject;
				$subject = nl2br(strtr($subject, array('{boardTitle}' => $boardTitle)));
				
				$contents = $options->PromoteAndDemote_contents;
				
				$secondaryGroupsName = array();
				if(!empty($secondaryGroupIdsFromInput))
				{
					foreach($secondaryGroupIdsFromInput as $groupId) {
						if(isset($userGroups[$groupId])) {
							$secondaryGroupsName[] = $userGroups[$groupId]['title']; 
						}
					}
				}
				
				$contents = nl2br(strtr($contents, 
					array(
						'{username}' => $user['username'],
						'{boardTitle}' => $boardTitle,
						'{boardUrl}' => $boardUrl,
						'{primaryGroup}' => isset($userGroups[$primaryGroupId]) ? $userGroups[$primaryGroupId]['title'] : '',
						'{secondaryGroup}' => implode(', ', $secondaryGroupsName)
					)
				));
				
				if(!$primaryGroupId) {
					$pattern1 = '#{checkPrimary}(.*){/checkPrimary}#Ui';
					$contents = preg_replace($pattern1, '', $contents);
				}
				
				if(empty($secondaryGroupIdsFromInput)) {
					$pattern2 = '#{checkSecondary}(.*){/checkSecondary}#Ui';
					$contents = preg_replace($pattern2, '', $contents);
				}
				
				$contents = strtr($contents, array(
					'{checkPrimary}' => '',
					'{/checkPrimary}' => '',
					'{checkSecondary}' => '',
					'{/checkSecondary}' => ''
				));
				
				$mailParams = array(
					'boardTitle' => $options->boardTitle,
					'boardUrl' => $options->boardUrl,
					//'plainText' => $contents,
					'htmlText' => $contents,
					'subject' => $subject
				);
				
				$mailParams['username'] = $user['username'];
				$mail = XenForo_Mail::create('promote_send_mail', $mailParams, $user['language_id']);
				
				$mail->enableAllLanguagePreCache();
				$mail->queue($user['email'], $user['username']);
			}
			
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				$this->getDynamicRedirect()
			);
			
		}
		else
		{
			
			$secondaryGroupIds = array();
			if(!empty($user['secondary_group_ids']))
			{
				$secondaryGroupIds = explode(',',$user['secondary_group_ids']);
			}
			
			$viewParams = array(
				'user' => $user,
				'canPromotePrimary' => $canPromotePrimary,
				'canPromoteSecondary' => $canPromoteSecondary,
				
				'userGroups' => $userGroups,
				'secondaryGroupIds' => $secondaryGroupIds,
			);
			
			return $this->responseView('Nobita_PromoteAndDemote_ViewPublic_Promote', 'promote_member', $viewParams);
		}
	}
}