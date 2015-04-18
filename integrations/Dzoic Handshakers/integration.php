<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','0');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','0');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','1');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."config.inc.php";

// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW

define('DB_SERVER',					SQL_HOST								);
define('DB_PORT',					"3306"									);
define('DB_USERNAME',				SQL_USER								);
define('DB_PASSWORD',				SQL_PASS								);
define('DB_NAME',					SQL_DB									);
define('TABLE_PREFIX',				""										);
define('DB_USERTABLE',				"members"								);
define('DB_USERTABLE_USERID',		"mem_id"								);
define('DB_USERTABLE_NAME',			"username"								);
define('DB_AVATARTABLE',		    " left join profiles on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = ".TABLE_PREFIX."profiles.mem_id");
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX."profiles.photo_small"	);
define('DB_USERTABLE_LASTACTIVITY',	""										);

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
	if (!empty($_COOKIE['mem_id'])) {
		$userid = $_COOKIE['mem_id'];
	}

	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE email ='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE username ='".$userName."'"; 
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);		
	if($row['password']== md5($userPass)){
		return $row['mem_id'];		
	}	
	return $userid;
}

function getFriendsList($userid,$time) {
	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX."hsim_status.last_activity lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX."profiles.folder link, cometchat_status.message, cometchat_status.status from  ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid left join ".TABLE_PREFIX."hsim_status on  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = ".TABLE_PREFIX."hsim_status.mem_id ".DB_AVATARTABLE." where FIND_IN_SET(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.",TRIM(BOTH ',' from (select contacts from hsim_contacts where mem_id = '".mysql_real_escape_string($userid)."'))) order by username asc");

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {
		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX."hsim_status.last_activity lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX."profiles.folder link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid left join ".TABLE_PREFIX."hsim_status on  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = ".TABLE_PREFIX."hsim_status.mem_id ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'- ".TABLE_PREFIX."hsim_status.last_activity < '".((ONLINE_TIMEOUT)*2)."') order by username asc");
	}
 
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX."hsim_status.last_activity lastactivity,  ".TABLE_PREFIX."profiles.folder link,  ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid left join ".TABLE_PREFIX."hsim_status on  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = ".TABLE_PREFIX."hsim_status.mem_id ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$sql = ("insert into hsim_status (mem_id,logged_in,last_activity) values ('".mysql_real_escape_string($userid)."','".getTimeStamp()."','".getTimeStamp()."') on duplicate key update last_activity = '".getTimeStamp()."'");
	return $sql;
}

function getUserStatus($userid) {
	 $sql = ("select cometchat_status.message, cometchat_status.status from cometchat_status where userid = '".mysql_real_escape_string($userid)."'");
	 return $sql;
}

function getLink($link) {
	return URL.'/profiles/'.$link;
}

function getAvatar($image) {
	return URL.'/photos/'.$image;
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