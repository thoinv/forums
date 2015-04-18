<?php

class Turki_Adv_EventListener_LoadClass
{
	public static function DataWriter($class, array &$extend)
	{
		$extend[] = "Turki_Adv_DataWriter_User";
	}

	public static function ControllerUser($class, array &$extend)
	{
		$extend[] = "Turki_Adv_ControllerPublic_User";
	}

	public static function AdvHtml(XenForo_Dependencies_Abstract $dependencies, array $data)
	{
		XenForo_Template_Helper_Core::$helperCallbacks += array(
			'advhtml' => array('Turki_Adv_Helper_Helpers', 'advhtml')
		);
	}
}