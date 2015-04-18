<?php
class DigitalPointAdPositioning_Listener_LoadClassViewPublic_Conversation
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointAdPositioning_ViewPublic_Conversation_View';
	}
}