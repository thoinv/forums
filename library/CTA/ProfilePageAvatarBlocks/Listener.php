<?php

class CTA_ProfilePageAvatarBlocks_Listener
{
	public static function extendMemberController($class, array &$extend)
	{
		$extend[] = 'CTA_ProfilePageAvatarBlocks_ControllerPublic_Member';
	}

}