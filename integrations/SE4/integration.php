<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','0');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','1');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','1');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');
define('ADD_LAST_ACTIVITY','1');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

define('_ENGINE', true);
$db = include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."settings".DIRECTORY_SEPARATOR."database.php";

// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW

define('DB_SERVER',					$db['params']['host']         );
define('DB_PORT',					'3306'                        );
define('DB_USERNAME',				$db['params']['username']     );
define('DB_PASSWORD',				$db['params']['password']     );
define('DB_NAME',					$db['params']['dbname']       );
define('TABLE_PREFIX',				$db['tablePrefix']            );
define('DB_USERTABLE',				'users'                       );
define('DB_USERTABLE_NAME',			'displayname'                 );
define('DB_USERTABLE_USERID',		'user_id'                     );
define('DB_AVATARTABLE', " left join ".TABLE_PREFIX."storage_files on file_id = ".TABLE_PREFIX.DB_USERTABLE.".photo_id" );
define('DB_AVATARFIELD',		    " (select storage_path from ".TABLE_PREFIX."storage_files where parent_file_id is null and file_id = ".TABLE_PREFIX.DB_USERTABLE.".photo_id)" );
define('DB_USERTABLE_LASTACTIVITY',	'lastactivity');
define('ADD_LAST_ACTIVITY',	'1');
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

    if (!empty($_COOKIE['PHPSESSID'])) {
        $sql = "SELECT data from ".TABLE_PREFIX."core_session where id = '".mysql_real_escape_string($_COOKIE['PHPSESSID'])."'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
		$_SESSION['Zend_Auth']['storage']=0;
		session_decode($row['data']);
		$userid=$_SESSION['Zend_Auth']['storage'];  
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
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".username link, cometchat_status.message, cometchat_status.status from  ".TABLE_PREFIX."user_membership join ".TABLE_PREFIX.DB_USERTABLE."  on ".TABLE_PREFIX."user_membership.user_id = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX."user_membership.resource_id = '".mysql_real_escape_string($userid)."' and active = 1 order by username asc");

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {
		$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".username link, cometchat_status.message, cometchat_status.status from  ".TABLE_PREFIX.DB_USERTABLE."  left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." < '".((ONLINE_TIMEOUT)*2)."') order by username asc");
	}

	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".username link, ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = '".getTimeStamp()."' where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	 $sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".status message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	 return $sql;
}

function getLink($link) {
	return BASE_URL."../profile/".$link;
}

function getAvatar($image) {
	if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$image)) {
		return BASE_URL."../".$image;
	} else {
		return BASE_URL."../application/modules/User/externals/images/nophoto_user_thumb_icon.png";
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
	$sql = ("update ".TABLE_PREFIX.DB_USERTABLE." set status = '".mysql_real_escape_string($statusmessage)."', status_date = '".date("Y-m-d H:i:s",getTimeStamp())."' where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
 	$query = mysql_query($sql);
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