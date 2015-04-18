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

include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR."config.php";

// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW

define('DB_SERVER',					$config['MasterServer']['servername']	);
define('DB_PORT',					$config['MasterServer']['port']			);
define('DB_USERNAME',				$config['MasterServer']['username']		);
define('DB_PASSWORD',				$config['MasterServer']['password']		);
define('DB_NAME',					$config['Database']['dbname']			);
define('TABLE_PREFIX',				$config['Database']['tableprefix']		);
define('DB_USERTABLE',				"user"									);
define('DB_USERTABLE_USERID',		"userid"								);
define('DB_USERTABLE_NAME',			"username"								);
define('DB_AVATARTABLE',		    " "								);
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID."");
define('DB_USERTABLE_LASTACTIVITY',	"lastactivity"							);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* FUNCTIONS */

function getUserID() {
	$userid = 0;
	global $config;

	if (!empty($_SESSION['basedata']) && $_SESSION['basedata'] != 'null') {
		$_REQUEST['basedata'] = $_SESSION['basedata'];
	}

	if (!empty($_REQUEST['basedata'])) {
		$userid = $_REQUEST['basedata'];
	}

	$cookie = $config['Misc']['cookieprefix'].'sessionhash';

	if (!empty($_COOKIE[$cookie])) {
		$sql = ("select userid from ".TABLE_PREFIX."session where sessionhash = '".mysql_real_escape_string($_COOKIE[$cookie])."'");
		$query = mysql_query($sql);
		$session = mysql_fetch_array($query);
		$userid = $session['userid'];
	}

	$cookie = $config['Misc']['cookieprefix'].'_sessionhash';

	if (!empty($_COOKIE[$cookie])) {
		$sql = ("select userid from ".TABLE_PREFIX."session where sessionhash = '".mysql_real_escape_string($_COOKIE[$cookie])."'");
		$query = mysql_query($sql);
		$session = mysql_fetch_array($query);
		$userid = $session['userid'];
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
	if($row['password']== md5(md5($userPass).$row['salt']) ){
		$userid = $row['userid'];
	}
	return $userid;
}

function getFriendsList($userid,$time) {

	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."userlist join ".TABLE_PREFIX.DB_USERTABLE." on  ".TABLE_PREFIX."userlist.relationid = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX."userlist.friend = 'yes' and ".TABLE_PREFIX."userlist.userid = '".mysql_real_escape_string($userid)."' order by username asc");

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {

		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'-lastactivity < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') order by username asc");

	}
	
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
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
	return BASE_URL."../member.php?u=".$link;
}

function getAvatar($image) {
	return BASE_URL."../ccpic.php?userid=".$image;
}

function getTimeStamp() {
	return time();
}

function processTime($time) {
	return $time;
}

function processName($name) {
//	For vBulletin users ONLY
//	Uncomment the next two lines and change only ISO-8859-9 to your site encoding type

//	$name = iconv("UTF-8", "ISO-8859-1", $name);
//	$name = iconv("ISO-8859-9", "UTF-8", $name);

	return $name;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* HOOKS */

function hooks_statusupdate($userid,$unsanitizedmessage) {
	
}

function hooks_forcefriends() {
	
}

function hooks_activityupdate($userid,$unsanitizedstatus) {

}

function hooks_message($fromid,$toid,$unsanitizedmessage) {
	
}

function hooks_displaybar($currentstate) {
	return $currentstate;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* Nulled by TrioxX */

$p_ = 4;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////