<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','0');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','1');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','1');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."include".DIRECTORY_SEPARATOR."database_config.php";

// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW

define('DB_SERVER',					$database_host                     );
define('DB_PORT',					"3306"                             );
define('DB_USERNAME',				$database_username                 );
define('DB_PASSWORD',				$database_password                 );
define('DB_NAME',					$database_name                     );
define('TABLE_PREFIX',				"se_"                              );
define('DB_USERTABLE',				"users"                            );
define('DB_USERTABLE_USERID',		"user_id"                          );
define('DB_USERTABLE_NAME',			"user_displayname"                 );
define('DB_AVATARTABLE',		    " "								   );
define('DB_AVATARFIELD',		    " CONCAT(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." ,CONCAT('/',".TABLE_PREFIX.DB_USERTABLE.".user_photo))" );
define('DB_USERTABLE_LASTACTIVITY',	"user_lastactive");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* FUNCTIONS */

function getUserID() {
	$userid = 0;

	if (!empty($_SESSION['basedata']) && $_SESSION['basedata'] != 'null') {
		$_REQUEST['basedata'] = $_SESSION['basedata'];
	}

	if (!empty($_REQUEST['basedata'])) {
		$userid = $_REQUEST['basedata'];
	}

	if (!empty($_COOKIE['se_auth_token'])) {
		$sql = ("select session_auth_user_id from ".TABLE_PREFIX."session_auth where session_auth_key = '".mysql_real_escape_string($_COOKIE['se_auth_token'])."'");
		$query = mysql_query($sql);
		$session = mysql_fetch_array($query);
		$userid = $session['session_auth_user_id'];
	}

	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM `".TABLE_PREFIX."users` WHERE email ='".$userName."'";
	} else {
		$sql ="SELECT * FROM `".TABLE_PREFIX."users` WHERE username ='".$userName."'"; 
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	$sql1 ="SELECT * FROM `".TABLE_PREFIX."core_settings` WHERE name='core.secret'";
	$result1=mysql_query($sql1);
	$row1 = mysql_fetch_array($result1);
	
	$salted_password = md5($row1['value'].$userPass.$row['salt']);
	
	if($row['password'] == $salted_password){
		$userid = $row['user_id'];
	}
	return $userid;
}

function getFriendsList($userid,$time) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".user_username link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."friends join ".TABLE_PREFIX."users on  ".TABLE_PREFIX."friends.friend_user_id2 = ".TABLE_PREFIX."users.user_id left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".user_id = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX."friends.friend_user_id1 = '".mysql_real_escape_string($userid)."' and ".TABLE_PREFIX."friends.friend_status = '1' order by username asc");

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {
		$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".user_username link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."users left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".user_id = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY."<'".((ONLINE_TIMEOUT)*2)."') order by username asc");
	}

	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX."users.user_id userid, ".TABLE_PREFIX."users.user_displayname username, ".TABLE_PREFIX."users.user_lastactive lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".user_username link, ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."users left join cometchat_status on ".TABLE_PREFIX."users.user_id = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX."users.user_id = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = '".getTimeStamp()."' where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	 $sql = ("select ".TABLE_PREFIX."users.user_status message, cometchat_status.status from ".TABLE_PREFIX."users left join cometchat_status on ".TABLE_PREFIX."users.user_id = cometchat_status.userid where ".TABLE_PREFIX."users.user_id = '".mysql_real_escape_string($userid)."'");
	 return $sql;
}

function getLink($link) {
	return BASE_URL."../profile.php?user=".$link;
}

function getAvatar($image) {
	$folder = explode('/',$image);
	$number = (((int)($folder[0]/1000))*1000)+1000;
	if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."uploads_user".DIRECTORY_SEPARATOR.$number.DIRECTORY_SEPARATOR.$image)) {
		return BASE_URL."../uploads_user/".$number."/".$image;
	} else {
		return BASE_URL."../images/nophoto.gif";
	}
}


function getTimeStamp() {
	return time();
}

function processTime($time) {
	return $time;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* HOOKS */

function hooks_statusupdate($userid,$statusmessage) {
	$sql = ("update ".TABLE_PREFIX."users set user_status = '".mysql_real_escape_string($statusmessage)."', user_status_date = '".getTimeStamp()."' where user_id = '".mysql_real_escape_string($userid)."'");
 	$query = mysql_query($sql);
	echo mysql_error();
}

function hooks_forcefriends() {
	
}

function hooks_activityupdate($userid,$status) {

}

function hooks_message($userid,$unsanitizedmessage) {
	
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* Nulled by TrioxX */

$p_ = 4;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////