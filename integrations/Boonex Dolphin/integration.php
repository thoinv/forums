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

include(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."inc".DIRECTORY_SEPARATOR."header.inc.php";

define('DB_SERVER',					$db['host']								);
define('DB_PORT',					$db['port']								);
define('DB_USERNAME',				$db['user']								);
define('DB_PASSWORD',				$db['passwd']							);
define('DB_NAME',					$db['db']								);
define('TABLE_PREFIX',				""										);
define('DB_USERTABLE',				"Profiles"								);
define('DB_USERTABLE_USERID',		"ID"								    );
define('DB_USERTABLE_NAME',			"NickName"								);
define('DB_AVATARTABLE',		    " "                                     );
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX.DB_USERTABLE.".Avatar ");
define('DB_USERTABLE_LASTACTIVITY',	"DateLastNav"							);

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
	if (!empty($_COOKIE['memberID'])) {
		$userid = $_COOKIE['memberID'];
	}

	return $userid;

}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE Email ='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE NickName ='".$userName."'"; 		
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);			
		
	if($row['Password']== sha1(md5($userPass).$row['Salt'])) {
		$userid = $row['ID'];
	}
	return $userid;	
}	 

function getFriendsList($userid,$time) {
	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1){
		 $sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".mysql_real_escape_string($time)."'- UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') order by username asc");	 
	} else {
		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from (SELECT ID,  profile FROM sys_friend_list UNION SELECT profile, ID FROM sys_friend_list) friends join ".TABLE_PREFIX.DB_USERTABLE." on  ".TABLE_PREFIX."friends.profile = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX."friends.ID = '".mysql_real_escape_string($userid)."' order by username asc");
	 }
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link,  ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = NOW() where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	 $sql = ("select cometchat_status.message, cometchat_status.status from cometchat_status where userid = '".mysql_real_escape_string($userid)."'");
	 return $sql;
}

function getLink($link) {
    return BASE_URL.'../users.php?id='.$link;
}

function getAvatar($image) {
    if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR.'boonex'.DIRECTORY_SEPARATOR.'avatar'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$image.'.jpg')) {
        return BASE_URL.'../modules/boonex/avatar/data/images/'.$image.'.jpg';
    } else {
        return BASE_URL.'../templates/tmpl_uni/images/spacer.gif';
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