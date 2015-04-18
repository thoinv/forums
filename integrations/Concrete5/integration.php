<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','CONCRETE5');			// Session name
define('DO_NOT_START_SESSION','0');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','1');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','1');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

include_once (dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."site.php");

define('DB_SERVER',					DB_SERVER								);
define('DB_PORT',					"3306"									);
define('DB_USERNAME',				DB_USERNAME								);
define('DB_PASSWORD',				DB_PASSWORD								);
define('DB_NAME',					DB_DATABASE								);
define('TABLE_PREFIX',				""										);
define('DB_USERTABLE',				"Users"									);
define('DB_USERTABLE_USERID',		"uID"								    );
define('DB_USERTABLE_NAME',			"uName"								    );
define('DB_AVATARTABLE',		    " "                                     );
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." ");
define('DB_USERTABLE_LASTACTIVITY',	"uLastOnline"							);

/* DATABASE */

/* FUNCTIONS */

function getUserID() {
	$userid = 0;
	
	if (!empty($_SESSION['basedata']) && $_SESSION['basedata'] != 'null') {
        $_REQUEST['basedata'] = $_SESSION['basedata'];
    }

    if (!empty($_REQUEST['basedata'])) {
        $userid = $_REQUEST['basedata'];
    }
	
	if (!empty($_SESSION['uID'])) {
		$userid = $_SESSION['uID'];
	}

	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM `Users` WHERE uEmail ='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM `Users` WHERE uName ='".$userName."'"; 
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);			
		
	if($row['uPassword']== md5($userPass.":".PASSWORD_SALT)) {
		$userid = $row['uID'];			
	}
	return $userid;
}

function getFriendsList($userid,$time) {
	
	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from (select uID,friendUID from usersfriends where uID='".mysql_real_escape_string($userid)."' union select friendUID,uID from usersfriends where friendUID='".mysql_real_escape_string($userid)."' ) friends join ".TABLE_PREFIX.DB_USERTABLE." on  ".TABLE_PREFIX."friends.friendUID = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX."friends.uID = '".mysql_real_escape_string($userid)."' order by username asc");
	
	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {

		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." < 180) order by username asc");

	}
	
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
    return BASE_URL.'../index.php/profile/view/'.$link.'/';
}

function getAvatar($image) {
	
    if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'avatars'.DIRECTORY_SEPARATOR.$image.'.jpg')) {
        return BASE_URL.'../files/avatars/'.$image.'.jpg';
    } else {
        return BASE_URL.'../cometchat/default_avatar.gif';
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