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

include_once(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'mainfile.php';


define('DB_SERVER',					XOOPS_DB_HOST					          );
define('DB_PORT',					"3306"							          );
define('DB_USERNAME',				XOOPS_DB_USER					          );
define('DB_PASSWORD',				XOOPS_DB_PASS					          );
define('DB_NAME',					XOOPS_DB_NAME					          );
define('TABLE_PREFIX',				XOOPS_DB_PREFIX.'_'				          );
define('DB_USERTABLE',				"users"							          );
define('DB_USERTABLE_USERID',		"uid"							          );
define('DB_USERTABLE_NAME',			"uname"							          );
define('DB_AVATARTABLE',		    " "										  );
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX.DB_USERTABLE.".user_avatar " );
define('DB_USERTABLE_LASTACTIVITY',	"lastactivity"					          );
define('ADD_LAST_ACTIVITY', '1' );

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

	if (!empty($_SESSION['xoopsUserId'])) {
		$userid = $_SESSION['xoopsUserId'];
	}

	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE email ='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE uname ='".$userName."'"; 
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);			 
	if($row['pass']== md5($userPass)){
		$userid = $row['uid'];			
	}		
	return $userid;
}

function getFriendsList($userid,$time) {

	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".mysql_real_escape_string($time)."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') order by username asc");

	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link,  ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
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
	$path = explode('/',XOOPS_ROOT_PATH);
    return BASE_URL.'../'.array_pop($path).'/modules/profile/userinfo.php?uid='.$link;
}

function getAvatar($image) {
	$path = explode('/',XOOPS_ROOT_PATH);
    if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$image)) {
        return BASE_URL.'../'.array_pop($path).'/uploads/'.$image;
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