<?php

class Nobita_Teams_Exception_Abstract extends XenForo_Exception
{
	public function __construct($message, $userPrintable = false)
	{
		$routePrefix = XenForo_Application::getOptions()->Teams_routePrefix;

		switch($routePrefix)
		{
			case 'teams';
				$prefix = '[Nobita] Social Teams'; break;
			case 'groups':
				$prefix = '[Nobita] Social Groups'; break;
			case 'guilds':
				$prefix = '[Nobita] Social Guilds'; break;
			case 'clubs':
				$prefix = '[Nobita] Social Clubs'; break;
			default:
				$prefix = '';
		}

		if (is_array($message) && count($message) > 0)
		{
			$message = reset($message);
		}
		$message = $prefix . ': ' . $message;

		parent::__construct($message, $userPrintable);
	}
}