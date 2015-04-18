<?php

class DigitalPointUserMap_Uninstall
{
	public static function Uninstall($addOnData)
	{
		XenForo_Model::create('XenForo_Model_DataRegistry')->delete('userMap');
	}
}
