<?php

include (dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."library".DIRECTORY_SEPARATOR."config.php"; //Xenforo DB configuration file

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

define('DB_SERVER',					$config['db']['host']		);
define('DB_PORT',					$config['db']['port']		);
define('DB_USERNAME',				$config['db']['username']	);
define('DB_PASSWORD',				$config['db']['password']	);
define('DB_NAME',					$config['db']['dbname']		);
define('TABLE_PREFIX',				"xf_"						);
define('DB_USERTABLE',				"user"						);
define('DB_USERTABLE_USERID',		"user_id"					);
define('DB_USERTABLE_NAME',			"username"					);
define('DB_AVATARTABLE',		    " "							);
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID."");
define('DB_USERTABLE_LASTACTIVITY',	"lastactivity"				);
define('ADD_LAST_ACTIVITY', "1");

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

	if (!empty($_COOKIE['xf_session'])) {
		
		$sql = ("SELECT  `session_data` FROM  `".TABLE_PREFIX."session` WHERE  `session_id` =  '".$_COOKIE['xf_session']."'");
		
		$query = mysql_query($sql);
		$sess2 = mysql_fetch_array($query);

		$sess3 = unserialize($sess2[0]);
		$userid = $sess3['user_id'];
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
	
	$sql1 ="SELECT * FROM `".TABLE_PREFIX."user_authenticate` WHERE user_id ='".$row['user_id']."'";
	$result1=mysql_query($sql1);
	$row1 = mysql_fetch_array($result1);
	
	$res=unserialize($row1['data']);
	
	$var=hash($res['hashFunc'],hash($res['hashFunc'],$userPass).$res['salt']);
	
	if($res['hash']== $var){
		$userid = $row['user_id'];
	}
	return $userid;
}

function getFriendsList($userid,$time) {

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1)	{
		 $sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, CONCAT(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME.",'.',".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.") link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".mysql_real_escape_string($time)."'-lastactivity < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') order by username asc");	 
	} else {
		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, CONCAT(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME.",'.',".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.") link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."user_follow friends join ".TABLE_PREFIX.DB_USERTABLE." on friends.user_id = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where friends.follow_user_id = '".mysql_real_escape_string($userid)."' order by username asc");
	}
	
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  CONCAT(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME.",'.',".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.") link,  ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
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
	return BASE_URL.'../index.php?members/'.$link;
}

function getAvatar($image) {
	
    if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'avatars'.DIRECTORY_SEPARATOR.'s'.DIRECTORY_SEPARATOR.'0'.DIRECTORY_SEPARATOR.$image.'.jpg')) {
        return BASE_URL.'../data/avatars/s/0/'.$image.'.jpg';
    } else {
        return BASE_URL.'../styles/default/xenforo/avatars/avatar_s.png';
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