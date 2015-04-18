<?php

class HQCoder_ParseHTML_EventListener
{	
	public static function LoadClassView($class, array &$extend)
	{
		switch($class){
			case 'XenForo_ViewPublic_Thread_View':
			case 'XenForo_ViewPublic_Thread_ViewNewPosts':
				$extend[] = 'HQCoder_ParseHTML_ViewPublic_Thread_View';
				break;
				
			case 'XenForo_ViewPublic_Thread_ReplyPreview':
			case 'XenForo_ViewPublic_Thread_CreatePreview':
			case 'XenForo_ViewPublic_Post_EditPreview':
				$extend[] = 'HQCoder_ParseHTML_ViewPublic_Thread_ReplyPreview';
				break;
			
			case 'XenForo_ViewPublic_Thread_ViewPosts':
				$extend[] = 'HQCoder_ParseHTML_ViewPublic_Thread_ViewPosts';
				break;
			
			case 'XenForo_ViewPublic_Conversation_EditMessagePreview':
			case 'XenForo_ViewPublic_Conversation_Preview':
				$extend[] = 'HQCoder_ParseHTML_ViewPublic_Conversation_Preview';
				break;
				
			case 'XenForo_ViewPublic_Conversation_View':
				$extend[] = 'HQCoder_ParseHTML_ViewPublic_Conversation_View';
				break;
				
			case 'XenForo_ViewPublic_Conversation_ViewMessage':
				$extend[] = 'HQCoder_ParseHTML_ViewPublic_Conversation_ViewMessage';
				break;
				
			case 'XenForo_ViewPublic_Conversation_ViewNewMessages':
				$extend[] = 'HQCoder_ParseHTML_ViewPublic_Conversation_ViewNewMessages';
				break;
				
		}
		
	}
	
	public static function LoadClassBbCode($class, array &$extend){
		if($class == 'XenForo_BbCode_Formatter_BbCode_AutoLink'){			
			$extend[]='HQCoder_ParseHTML_BbCode_Formatter_AutoLink';
		}
	}
}