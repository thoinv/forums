<?php
//Look! The name of the class follow our directory structure!
//nameOfTheAddon_File (without the ".php" for sure!)
//This can be: nameOfTheAddon_Folder_File or nameOfTheAddon_Folder_Folder_File
class TopUsers_Listener
{
	//Our callback signature! We are using here! Look:
	public static function template_hook ($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		//Yey! its our template hook!
		if ($hookName == 'navigation_tabs_members')
		{
			//Our tab!
			$var = new XenForo_Phrase('top_users');
			$contents .= "<li><a href='" . XenForo_Link::buildPublicLink('top-users') . "'>$var</a></li>";
		}
	}
}
?>