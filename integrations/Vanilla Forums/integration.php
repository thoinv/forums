<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','0');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','0');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','0');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');
define('FORCE_ALL_USERS','1');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

define('APPLICATION','1');
include_once(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'conf'.DIRECTORY_SEPARATOR.'config-defaults.php';
$table_prefix = $Configuration['Database']['DatabasePrefix'];
include_once(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'conf'.DIRECTORY_SEPARATOR.'config.php';

define('DB_SERVER',					$Configuration['Database']['Host']								);
define('DB_PORT',					"3306"															);
define('DB_USERNAME',				$Configuration['Database']['User']								);
define('DB_PASSWORD',				$Configuration['Database']['Password']							);
define('DB_NAME',					$Configuration['Database']['Name']								);
define('TABLE_PREFIX',				$table_prefix													);
define('DB_USERTABLE',				"User"															);
define('DB_USERTABLE_USERID',		"UserID"														);
define('DB_USERTABLE_NAME',			"Name"															);
define('DB_AVATARTABLE',		    " "																);
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX.DB_USERTABLE.".Photo"							);
define('DB_USERTABLE_LASTACTIVITY',	"lastactivity"													);
define('ADD_LAST_ACTIVITY',			"1"																);

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

	if (!empty($_COOKIE['Vanilla'])) {
		$cookie = explode('-',$_COOKIE['Vanilla']);
		if ($cookie[0] > 0) {
			$userid = $cookie[0];
		}
	}
	
	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	include(dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."library".DIRECTORY_SEPARATOR."vendors".DIRECTORY_SEPARATOR."phpass".DIRECTORY_SEPARATOR."PasswordHash.php");
	$hasher = new PasswordHash(8, false);

	if (filter_var($userName, FILTER_VALIDATE_EMAIL))
	{
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE Email ='".$userName."'"; 
	}
	else{
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE Name ='".$userName."'";		
	}
	
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);	
	$check = $hasher->CheckPassword($userPass, $row['Password']);	
	
	if ($check) { 
		$userid = $row['UserID'];
	} 
	return $userid;
}

function getFriendsList($userid,$time) {

	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid " .DB_AVATARTABLE. " where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".mysql_real_escape_string($time)."'-lastactivity < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') order by username asc");

	return $sql;
}

function getUserDetails($userid) {

	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." link, ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid " .DB_AVATARTABLE. " where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	
	return $sql;

}

function updateLastActivity($userid) {
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = '".getTimeStamp()."' where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	 $sql = ("select cometchat_status.message, cometchat_status.status from cometchat_status where userid = '".mysql_real_escape_string($userid)."'");
	 return $sql;
}

function getLink($link) {
    return BASE_URL.'../index.php?p=/profile/'.$link;
}

function getAvatar($image) {

	if (!empty($image)) {
		$avatar = explode('/',$image);
		if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$avatar[0].DIRECTORY_SEPARATOR.'n'.$avatar[1])) {
			return BASE_URL.'../uploads/'.$avatar[0].'/n'.$avatar[1];
		} else {
			return '';
		}
	} else {
		return '';
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