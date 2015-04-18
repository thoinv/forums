<?php

class IncreaseLatestUsers_Listener
{
	public static function extendControllers($class, array &$extend)
	{
		if ($class == 'XenForo_ControllerPublic_Member')
		{
			$extend[] = 'IncreaseLatestUsers_ControllerPublic_Member';
		}
	}
}
