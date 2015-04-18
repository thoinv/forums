<?php
class DigitalPointAdPositioning_Listener_ControllerPreDispatch
{
	public static function loadControllerListener($controller, $action)
	{
		if (@$_COOKIE['as_username'] == 'google_adsense' && @$_COOKIE['as_password'] == XenForo_Application::getOptions()->dppa_adsense_password)
		{
			$superAdmins = preg_split(
				'#\s*,\s*#', XenForo_Application::get('config')->superAdmins,
				-1, PREG_SPLIT_NO_EMPTY
			);

			$permissionComboId = XenForo_Application::getDb()->fetchOne('
				SELECT permission_combination_id
				FROM xf_user
				WHERE user_id = ?
			', array(array_shift($superAdmins)));
			
			XenForo_Visitor::getInstance()->offsetSet('permission_combination_id', $permissionComboId);
		}
	}
}