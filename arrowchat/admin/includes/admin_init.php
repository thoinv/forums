<?php

	/*
	|| #################################################################### ||
	|| #                             ArrowChat                            # ||
	|| # ---------------------------------------------------------------- # ||
	|| #    Copyright �2010-2012 ArrowSuites LLC. All Rights Reserved.    # ||
	|| # This file may not be redistributed in whole or significant part. # ||
	|| # ---------------- ARROWCHAT IS NOT FREE SOFTWARE ---------------- # ||
	|| #   http://www.arrowchat.com | http://www.arrowchat.com/license/   # ||
	|| #################################################################### ||
	*/
	
	session_start();
	
	// ########################## INCLUDE BACK-END ###########################
	require_once(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "bootstrap.php");
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "functions/functions.php");
	require_once(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . AC_FOLDER_INCLUDES . DIRECTORY_SEPARATOR . "init.php");
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "functions/functions_update.php");
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "functions/functions_login.php");
	require_once(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . AC_FOLDER_INCLUDES . DIRECTORY_SEPARATOR . "classes/Smarty/Smarty.class.php");
	
	$smarty = new Smarty;
	
	// Get do variable
	$do = get_var('do');
	
	// Admin Login
	if (var_check('login'))
	{
		$error = admin_login(get_var('username'), get_var('password'));
	}
	
	// Admin logout
	if ($do == "logout") 
	{
		admin_logout();
	}
	
	$smarty->assign('username_post', get_var('username'));
	$smarty->assign('password_post', get_var('password'));
	$smarty->assign('login_post', get_var('login'));
	
	// Check if logged in as admin
	admin_check_login($error);
	
	// Various admin checks
	$theme = convert_numeric_theme($theme);
	$write = check_config_file();
	$install = check_install_folder();
	
	//*********Smarty Variables************
	// Check if features are disabled to display message
	$feature_disabled = "";
	if ($chatrooms_on != 1 AND $do == "chatroomsettings")
	{
		$feature_disabled = "Chatrooms";
	}
	
	if ($notifications_on != 1 AND $do == "notificationsettings")
	{
		$feature_disabled = "Notifications";
	}
	
	if ($applications_on != 1 AND $do == "appsettings")
	{
		$feature_disabled = "Applications";
	}
	
	// Sorry it's for best, not to contact ArrowChat servers
	// Oooooh, they might rip your eyes out! :P
	// like... by recording your info, such as IP address ;)
	// Social Engine Forum (www.socialengineforum.com)
	/*
	if ($_COOKIE['arrowchat_update_checked'] != 1)
	{
		// Check if ArrowChat version is up-to-date
		$fp = @fopen("http://www.arrowchat.com/license/version.txt", "r");
		$ac_current_version = @fread($fp, 99); 
		$arrowchat_has_update = false;
		
		if ($fp)
		{
			if (ARROWCHAT_VERSION != $ac_current_version)
			{
				$arrowchat_has_update = true;
			}
			
			fclose ($fp);
		}
		
		// Check if Applications are up-to-date
		$result = $db->execute("
			SELECT update_link, version 
			FROM arrowchat_applications
		");
		
		$applications_have_update = false;
		$applications_update_count = 0;
		
		while ($row = $db->fetch_array($result)) 
		{
			$user_version = $row['version'];
			$current_version = $row['version'];
			
			if (!empty($row['update_link']) && !empty($row['version']))
			{
				$fp = @fopen($row['update_link'], "r");
					
				if ($fp) 
				{
					$current_version = @fread($fp, 99); 
					fclose ($fp);
				} 
			}
			
			if ($user_version != $current_version)
			{
				$applications_have_update = true;
				$applications_update_count++;
			}
		}
		
		// Check if themes are up-to-date
		$result = $db->execute("
			SELECT update_link, version 
			FROM arrowchat_themes
		");
		
		$themes_have_update = false;
		$themes_update_count = 0;
		
		while ($row = $db->fetch_array($result)) 
		{
			$user_version = $row['version'];
			$current_version = $row['version'];
			
			if (!empty($row['update_link']) && !empty($row['version']))
			{
				$fp = @fopen($row['update_link'], "r");
					
				if ($fp) 
				{
					$current_version = @fread($fp, 99); 
					fclose ($fp);
				} 
			}
			
			if ($user_version != $current_version)
			{
				$themes_have_update = true;
				$themes_update_count++;
			}
		}
		
		setcookie("arrowchat_update_count", $ac_current_version, time() + 86400);
		setcookie("arrowchat_applications_count", $applications_update_count, time() + 86400);
		setcookie("arrowchat_themes_count", $themes_update_count, time() + 86400);
	}
	else
	{
		if ($_COOKIE['arrowchat_update_count'] != ARROWCHAT_VERSION)
			$arrowchat_has_update = true;
			
		if ($_COOKIE['arrowchat_applications_count'] != 0 && isset($_COOKIE['arrowchat_applications_count']))
		{
			$applications_have_update = true;
			$applications_update_count = $_COOKIE['arrowchat_applications_count'];
		}
		
		if ($_COOKIE['arrowchat_themes_count'] != 0 && isset($_COOKIE['arrowchat_themes_count']))
		{
			$themes_have_update = true;
			$themes_update_count = $_COOKIE['arrowchat_themes_count'];
		}
	}
	
	setcookie("arrowchat_update_checked", "1", time() + 86400);
	*/
	
	// Assign smarty variables
	$smarty->assign('write', $write);
	$smarty->assign('install', $install);
	$smarty->assign('feature_disabled', $feature_disabled);
	$smarty->assign('arrowchat_has_update', $arrowchat_has_update);
	$smarty->assign('applications_have_update', $applications_have_update);
	$smarty->assign('applications_update_count', $applications_update_count);
	$smarty->assign('themes_have_update', $themes_have_update);
	$smarty->assign('themes_update_count', $themes_update_count);
	
?>