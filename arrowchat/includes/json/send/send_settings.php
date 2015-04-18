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

	// ########################## INCLUDE BACK-END ###########################
	require_once (dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'bootstrap.php');
	require_once (dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . AC_FOLDER_INCLUDES . DIRECTORY_SEPARATOR . 'init.php');

	// ########################### GET POST DATA #############################
	$hide 					= get_var('hide');
	$sound 					= get_var('sound');
	$window 				= get_var('window');
	$name 					= get_var('name');
	$focus_chat 			= get_var('focus_chat');
	$unfocus_chat 			= get_var('unfocus_chat');
	$close_chat 			= get_var('close_chat');
	$clear_user				= get_var('clear_chat');
	$tab_alert				= get_var('tab_alert');
	$announce_read 			= get_var('announce');
	$changed_theme 			= get_var('theme');
	$chatroom_window		= get_var('chatroom_window');
	$chatroom_stay			= get_var('chatroom_stay');
	$chatroom_block_chats	= get_var('chatroom_block_chats');
	$chatroom_sound			= get_var('chatroom_sound');
	$chatroom_mod			= get_var('chatroom_mod');
	$chatroom_remove_mod	= get_var('chatroom_remove_mod');
	$chatroom_ban			= get_var('chatroom_ban');
	$chatroom_ban_length	= get_var('chatroom_ban_length');
	$chatroom_id			= get_var('chatroom_id');
	$bookmarks_list			= get_var('arrowchatapplist');
	$block_chat				= get_var('block_chat');
	$unblock_chat			= get_var('unblock_chat');
	$app_keep				= get_var('app_keep');

	// ########################### CHECK USER ID #############################
	if (!logged_in($userid)) 
	{
		exit(0);
	}

	// ######################## START POST HIDE BAR ##########################
	if (!empty($_POST['hide'])) 
	{
		if ($hide == "-1")
		{
			$hide = 0;
		}
		
		$db->execute("
			INSERT INTO arrowchat_status (
				userid,
				hide_bar
			) 
			VALUES (
				'" . $db->escape_string($userid) . "',
				'" . $db->escape_string($hide) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE hide_bar = '" . $db->escape_string($hide) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ####################### START POST POPOUT CHAT ########################
	if (!empty($_POST['popoutchat'])) 
	{
		if ($_POST['popoutchat'] == "99") 
		{
			$time = 99;
		} 
		else 
		{
			$time = time();
		}
		
		$db->execute("
			INSERT INTO arrowchat_status (
				userid,
				popout
			) 
			VALUES (
				'" . $db->escape_string($userid) . "',
				'" . $db->escape_string($time) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE popout = '" . $db->escape_string($time) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ######################### START POST SOUND ############################
	if (!empty($_POST['sound'])) 
	{
		if ($sound == "-1")
		{
			$sound = 0;
		}
		
		$db->execute("
			INSERT INTO arrowchat_status (
				userid, 
				play_sound
			) 
			VALUES (
				'" . $db->escape_string($userid) . "',
				'" . $db->escape_string($sound) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE play_sound = '" . $db->escape_string($sound) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ##################### START POST KEEP WINDOW OPEN #####################
	if (!empty($_POST['window'])) 
	{
		if ($window == "-1") 
		{
			$window = 0;
		
			$db->execute("
				INSERT INTO arrowchat_status (
					userid, 
					window_open
				) 
				VALUES (
					'" . $db->escape_string($userid) . "',
					'" . $db->escape_string($window) . "'
				) 
				ON DUPLICATE KEY 
					UPDATE window_open = '" . $db->escape_string($window) . "'
			");
		} 
		else 
		{
			$db->execute("
				INSERT INTO arrowchat_status (
					userid, 
					window_open, 
					chatroom_window
				) 
				VALUES (
					'" . $db->escape_string($userid) . "',
					'" . $db->escape_string($window) . "', 
					'-1'
				) 
				ON DUPLICATE KEY 
					UPDATE window_open = '" . $db->escape_string($window) . "', chatroom_window = '-1'
			");
		}

		echo "1";
		close_session();
		exit(0);
	}

	// ##################### START POST SHOW ONLY NAMES ######################
	if (!empty($_POST['name'])) 
	{
		if ($name == "-1")
		{
			$name = 0;
		}
		
		$db->execute("
			INSERT INTO arrowchat_status (
				userid, 
				only_names
			) 
			VALUES (
				'" . $db->escape_string($userid) . "',
				'" . $db->escape_string($name) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE only_names = '" . $db->escape_string($name) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ######################## START POST FOCUS CHAT ########################
	if (!empty($_POST['focus_chat'])) 
	{
		if ($tab_alert == "1") 
		{
			$db->execute("
				UPDATE arrowchat 
				SET arrowchat.user_read = '1', arrowchat.read = '1'
				WHERE arrowchat.from = '" . $db->escape_string($focus_chat) . "' 
					AND arrowchat.to = '" . $db->escape_string($userid) . "' 
					AND arrowchat.user_read = '0'
			");
		}
		
		$result = $db->execute("
			SELECT unfocus_chat, focus_chat 
			FROM arrowchat_status 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$row = $db->fetch_array($result);
			
			$unfocus_chat = $row['unfocus_chat'];
			$unfocus_chat = preg_replace('/(^|:)' . $focus_chat . ':/', ':', $unfocus_chat);
			
			if (substr($unfocus_chat, 0, 1) == ":")
			{
				$unfocus_chat = substr($unfocus_chat, 1);
			}
			
			if (!empty($row['focus_chat']) AND $row['focus_chat'] != $focus_chat) 
			{
				$unfocus_chat .= $row['focus_chat'] . ":";
			}
		}
		
		$db->execute("
			INSERT INTO arrowchat_status (
				userid, 
				unfocus_chat, 
				focus_chat
			) 
			VALUES (
				'" . $db->escape_string($userid) . "',
				'" . $db->escape_string($unfocus_chat) . "', 
				'" . $db->escape_string($focus_chat) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE focus_chat = '" . $db->escape_string($focus_chat) . "', unfocus_chat = '" . $db->escape_string($unfocus_chat) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ###################### START POST UNFOCUS CHAT ########################
	if (!empty($_POST['unfocus_chat'])) 
	{
		if ($tab_alert == "1") 
		{
			$db->execute("
				UPDATE arrowchat 
				SET arrowchat.user_read = '1' , arrowchat.read = '1'
				WHERE arrowchat.from = '" . $db->escape_string($unfocus_chat) . "' 
					AND arrowchat.to = '" . $db->escape_string($userid) . "' 
					AND arrowchat.user_read = '0'
			");
		}
		
		$result = $db->execute("
			SELECT unfocus_chat 
			FROM arrowchat_status 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$row = $db->fetch_array($result);
			
			$unfocus_chat = $row['unfocus_chat'];
			$unfocus_chat .= $_POST['unfocus_chat'] . ":";
			$focus_chat = "";
		}
		
		$db->execute("
			INSERT INTO arrowchat_status (
				userid, 
				unfocus_chat, 
				focus_chat
			) 
			VALUES (
				'" . $db->escape_string($userid) . "',
				'" . $db->escape_string($unfocus_chat) . "', 
				'" . $db->escape_string($focus_chat) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE focus_chat = '" . $db->escape_string($focus_chat) . "', unfocus_chat = '" . $db->escape_string($unfocus_chat) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ######################## START POST CLOSE CHAT ########################
	if (!empty($_POST['close_chat'])) 
	{
		if ($tab_alert == "1") 
		{
			$db->execute("
				UPDATE arrowchat 
				SET arrowchat.user_read = '1', arrowchat.read = '1'
				WHERE arrowchat.from = '" . $db->escape_string($close_chat) . "' 
					AND arrowchat.to = '" . $db->escape_string($userid) . "' 
					AND arrowchat.user_read = '0'
			");
		}
		
		$result = $db->execute("
			SELECT unfocus_chat, focus_chat 
			FROM arrowchat_status 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$row = $db->fetch_array($result);
			
			$unfocus_chat = $row['unfocus_chat'];
			$focus_chat = $row['focus_chat'];
			$focus_chat = preg_replace('/' . $close_chat . '/', '', $focus_chat);
			$unfocus_chat = preg_replace('/(^|:)' . $close_chat . ':/', ':', $unfocus_chat);
			
			if (substr($unfocus_chat, 0, 1) == ":")
			{
				$unfocus_chat = substr($unfocus_chat, 1);
			}
		}
		
		$db->execute("
			INSERT INTO arrowchat_status (
				userid, 
				unfocus_chat, 
				focus_chat
			) 
			VALUES (
				'" . $db->escape_string($userid) . "',
				'" . $db->escape_string($unfocus_chat) . "', 
				'" . $db->escape_string($focus_chat) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE focus_chat = '" . $db->escape_string($focus_chat) . "', unfocus_chat = '" . $db->escape_string($unfocus_chat) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ######################## START POST CLEAR CHAT ########################
	if (!empty($_POST['clear_chat'])) 
	{	
		$result = $db->execute("
			SELECT last_message 
			FROM arrowchat_status 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$row = $db->fetch_array($result);
			
			$last_message = $row['last_message'];
			$new_time = time() + 3600;
			
			if (empty($last_message)) 
			{
				$last_message = ":".$clear_user."/".$new_time;
			} 
			else 
			{
				$old_data = $last_message;
				
				if (preg_match("#:$clear_user/[0-9]+#", $old_data, $matches)) 
				{
					$last_message = str_replace($matches[0], ":".$clear_user."/".$new_time."", $old_data);
				} 
				else 
				{
					$last_message .= ":".$clear_user."/".$new_time;
				}
			}
		}
		
		$db->execute("
			INSERT INTO arrowchat_status (
				userid, 
				last_message
			) 
			VALUES (
				'" . $db->escape_string($userid) . "', 
				'" . $db->escape_string($last_message) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE last_message = '" . $db->escape_string($last_message) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ################### START POST ANNOUNCEMENT READ ######################
	if (!empty($_POST['announce'])) 
	{

		$db->execute("
			UPDATE arrowchat_status 
			SET announcement = '1' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
		
		echo "1";
		close_session();
		exit(0);
	}

	// ###################### START POST THEME CHANGE ########################
	if (!empty($_POST['theme'])) 
	{
		$db->execute("
			UPDATE arrowchat_status 
			SET theme = '" . $db->escape_string($changed_theme) . "' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");

		echo time();
		close_session();
		exit(0);
	}

	// #################### START POST CHATROOM WINDOW #######################
	if (var_check('chatroom_window')) 
	{
		if ($chatroom_window != "-1") 
		{
			$db->execute("
				UPDATE arrowchat_status 
				SET chatroom_window = '" . $db->escape_string($chatroom_window) . "', 
					chatroom_stay = '-1', 
					window_open = '0' 
				WHERE userid = '" . $db->escape_string($userid) . "'
			");
		} 
		else 
		{
			$db->execute("
				UPDATE arrowchat_status 
				SET chatroom_window = '" . $db->escape_string($chatroom_window) . "',
					chatroom_stay = '-1'
				WHERE userid = '" . $db->escape_string($userid) . "'
			");
		}

		echo "1";
		close_session();
		exit(0);
	}

	// ##################### START POST CHATROOM STAY ########################
	if (var_check('chatroom_stay')) 
	{
		$db->execute("
			UPDATE arrowchat_status 
			SET chatroom_stay = '" . $db->escape_string($chatroom_stay) . "',
				chatroom_window = '-1' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ################## START POST BLOCK PRIVATE CHATS #####################
	if (var_check('chatroom_block_chats')) 
	{
		if ($chatroom_block_chats == "-1") 
		{
			$chatroom_block_chats = 0;
		}

		$db->execute("
			UPDATE arrowchat_status 
			SET chatroom_block_chats = '" . $db->escape_string($chatroom_block_chats) . "' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
		
		$db->execute("
			UPDATE arrowchat_chatroom_users  
			SET block_chats = '" . $db->escape_string($chatroom_block_chats) . "' 
			WHERE user_id = '" . $db->escape_string($userid) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}
	
	// ################## START POST CHAT ROOM SOUND #####################
	if (var_check('chatroom_sound')) 
	{
		if ($chatroom_sound == "-1") 
		{
			$chatroom_sound = 0;
		}

		$db->execute("
			UPDATE arrowchat_status 
			SET chatroom_sound = '" . $db->escape_string($chatroom_sound) . "' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");

		echo "1";
		close_session();
		exit(0);
	}

	// ##################### START POST MAKE MODERATOR #######################
	if (var_check('chatroom_mod')) 
	{
		$result = $db->execute("
			SELECT is_mod, is_admin 
			FROM arrowchat_chatroom_users 
			WHERE user_id = '" . $db->escape_string($userid) . "'
				AND chatroom_id = '" . $db->escape_string($chatroom_id) . "'
				AND (is_admin = '1'
					OR is_mod = '1')
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$sql = get_user_details($chatroom_mod);
			$result = $db->execute($sql);
			
			if ($result AND $db->count_select() > 0) 
			{
				$row = $db->fetch_array($result);
				$mod_username = $row['username'];
			}
			
			$mod_message = $mod_username . $language[106] . $db->escape_string(strip_tags(get_username($userid))) . ".";
			
			$db->execute("
				INSERT INTO arrowchat_chatroom_messages (
					chatroom_id,
					user_id,
					username,
					message,
					global_message,
					sent
				) 
				VALUES (
					'" . $db->escape_string($chatroom_id) . "', 
					'" . $db->escape_string($userid) . "', 
					'Global',
					'" . $mod_message . "',
					'1',
					'" . time() . "'
				)
			");
			
			if ($push_on == 1)
			{
				$pubnub->publish(array(
					'channel' => 'chatroom' . $chatroom_id,
					'message' => array('chatroommessage' => array("id" => $db->last_insert_id(), "name" => 'Global', "message" => $mod_message, "userid" => $userid, "sent" => time(), "global" => '1'))
				));
			}
			
			$db->execute("
				UPDATE arrowchat_chatroom_users 
				SET is_mod = '1' 
				WHERE user_id = '" . $db->escape_string($chatroom_mod) . "'
					AND chatroom_id = '" . $db->escape_string($chatroom_id) . "'
			");
		}

		echo "1";
		close_session();
		exit(0);
	}

	// ################### START POST REMOVE MODERATOR #######################
	if (var_check('chatroom_remove_mod')) 
	{
		$result = $db->execute("
			SELECT is_mod, is_admin 
			FROM arrowchat_chatroom_users 
			WHERE user_id = '" . $db->escape_string($userid) . "'
				AND chatroom_id = '" . $db->escape_string($chatroom_id) . "'
				AND (is_admin = '1'
					OR is_mod = '1')
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$db->execute("
				UPDATE arrowchat_chatroom_users 
				SET is_mod = '0' 
				WHERE user_id = '" . $db->escape_string($chatroom_remove_mod) . "'
					AND chatroom_id = '" . $db->escape_string($chatroom_id) . "'
			");
		}

		echo "1";
		close_session();
		exit(0);
	}

	// ####################### START POST BAN USER ##########################
	if (var_check('chatroom_ban')) 
	{
		$result = $db->execute("
			SELECT is_mod, is_admin 
			FROM arrowchat_chatroom_users 
			WHERE user_id = '" . $db->escape_string($userid) . "'
				AND chatroom_id = '" . $db->escape_string($chatroom_id) . "'
				AND (is_admin = '1'
					OR is_mod = '1')
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$sql = get_user_details($chatroom_ban);
			$result = $db->execute($sql);
			
			if ($result AND $db->count_select() > 0) 
			{
				$row = $db->fetch_array($result);
				$ban_username = $row['username'];
			}
			
			$ban_message = $ban_username . $language[107] . $db->escape_string(strip_tags(get_username($userid))) . ".";
			
			$db->execute("
				INSERT INTO arrowchat_chatroom_messages (
					chatroom_id,
					user_id,
					username,
					message,
					global_message,
					sent
				) 
				VALUES (
					'" . $db->escape_string($chatroom_id) . "', 
					'" . $db->escape_string($userid) . "', 
					'Global',
					'" . $ban_message . "',
					'1',
					'" . time() . "'
				)
			");
			
			if ($push_on == 1)
			{
				$pubnub->publish(array(
					'channel' => 'chatroom' . $chatroom_id,
					'message' => array('chatroommessage' => array("id" => $db->last_insert_id(), "name" => 'Global', "message" => $ban_message, "userid" => $userid, "sent" => time(), "global" => '1'))
				));
			}
		
			$db->execute("
				INSERT INTO arrowchat_chatroom_banlist (
					user_id, 
					chatroom_id, 
					ban_length, 
					ban_time
				) 
				VALUES (
					'" . $db->escape_string($chatroom_ban) . "',
					'" . $db->escape_string($chatroom_id) . "',
					'" . $db->escape_string($chatroom_ban_length) . "',
					'" . time() . "'
				) 
				ON DUPLICATE KEY 
					UPDATE ban_length = '" . $db->escape_string($chatroom_ban_length) . "', ban_time = '" . time() . "'
			");
			
			$db->execute("
				UPDATE arrowchat_chatroom_users 
				SET session_time = '0'
				WHERE user_id = '" . $db->escape_string($chatroom_ban) . "'
					AND chatroom_id = '" . $db->escape_string($chatroom_id) . "'
			");
		}
		
		echo "1";
		close_session();
		exit(0);
	}

	// #################### START BOOKMARKS UPDATE ########################
	if (var_check('arrowchat_applications')) 
	{
		$update_string = "";
		
		if (empty($bookmarks_list)) 
		{
			$update_string = "-1";
		} 
		else 
		{
			foreach ($bookmarks_list as $val) 
			{
				$update_string = $update_string.$val.":";
			}
		}
		
		$db->execute("
			UPDATE arrowchat_status 
			SET apps_bookmarks = '" . $db->escape_string($update_string) . "' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");

		echo "1";
		close_session();
		exit (0);
	}

	// ################# START OTHER APPLICATIONS UPDATE ##################
	if (var_check('arrowchat_other_applications')) 
	{
		$update_string = "";
		
		if (empty($bookmarks_list)) 
		{
			$update_string = "-1";
		} 
		else 
		{
			foreach ($bookmarks_list as $val) 
			{
				$update_string = $update_string.$val.":";
			}
		}
		
		$db->execute("
			UPDATE arrowchat_status 
			SET apps_other = '" . $db->escape_string($update_string) . "' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");

		echo "1";
		close_session();
		exit (0);
	}
	
	// ################# START BLOCK CHAT ##################
	if (var_check('block_chat')) 
	{	
		if ($userid == $block_chat)
		{
			// Cannot block yourself
			echo "-1";
			close_session();
			exit (0);
		}
		
		$result = $db->execute("
			SELECT block_chats 
			FROM arrowchat_status 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$row = $db->fetch_array($result);
			
			if (!empty($row['block_chats']))
			{
				$block_chat_array = unserialize($row['block_chats']);
			}
			else
			{
				$block_chat_array = array();
			}
		}
		else
		{
			$block_chat_array = array();
		}
		
		if (!in_array($block_chat, $block_chat_array))
		{
			$block_chat_array[] = $block_chat;
		}
		
		$block_chat_serialized = serialize($block_chat_array);
		
		$db->execute("
			UPDATE arrowchat_status 
			SET block_chats = '" . $db->escape_string($block_chat_serialized) . "' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");

		echo "1";
		close_session();
		exit (0);
	}
	
	// ################# START UNBLOCK CHAT ##################
	if (var_check('unblock_chat')) 
	{	
		$result = $db->execute("
			SELECT block_chats 
			FROM arrowchat_status 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
		
		if ($result AND $db->count_select() > 0) 
		{
			$row = $db->fetch_array($result);
			
			if (!empty($row['block_chats']))
			{
				$block_chat_array = unserialize($row['block_chats']);
			}
			else
			{
				$block_chat_array = array();
			}
		}
		else
		{
			$block_chat_array = array();
		}
		
		foreach ($block_chat_array as $key => $value)
		{
			if ($unblock_chat == $value)
			{
				unset($block_chat_array[$key]);
			}
		}
		
		$block_chat_serialized = serialize($block_chat_array);
		
		$db->execute("
			UPDATE arrowchat_status 
			SET block_chats = '" . $db->escape_string($block_chat_serialized) . "' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");

		echo "1";
		close_session();
		exit (0);
	}
	
	// ################# START UNBLOCK CHAT ##################
	if (var_check('app_keep')) 
	{	
		if ($app_keep == "-1")
		{
			$app_keep = "0";
		}
		
		if (!is_numeric($app_keep))
		{
			echo "-1";
			close_session();
			exit (0);
		}
		
		$db->execute("
			UPDATE arrowchat_status 
			SET apps_open = '" . $db->escape_string($app_keep) . "' 
			WHERE userid = '" . $db->escape_string($userid) . "'
		");
	
		echo "1";
		close_session();
		exit (0);
	}
	
?>