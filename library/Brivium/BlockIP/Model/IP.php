<?php

class Brivium_BlockIP_Model_IP extends XenForo_Model
{
	public function isLoggedIp($ip)
	{
		$options = XenForo_Application::get('options');
		$match = $options->BlockIP_match == 'registration' ? ' AND action = \'register\'' : '';

		if (empty($ip))
		{
			return false;
		}

		return $this->_getDb()->fetchRow('
			SELECT * FROM xf_ip
			WHERE ip = ? ' . $match . '
		', $ip);
	}
}