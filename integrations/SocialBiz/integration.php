<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			
define('DO_NOT_START_SESSION','0');		
define('DO_NOT_DESTROY_SESSION','0');	
define('SWITCH_ENABLED','1');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW

include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR.'config.php';

define('DB_SERVER',					$config['dbhost']					);
define('DB_PORT',					'3306'									);
define('DB_USERNAME',				$config['dbuname']					);
define('DB_PASSWORD',				$config['dbpass']					);
define('DB_NAME',					$config['dbname']					);
define('TABLE_PREFIX',				$config['table_prefix']				);
define('DB_USERTABLE',				'user'								);
define('DB_USERTABLE_NAME',			'login'								);
define('DB_USERTABLE_USERID',		'id'								);
define('DB_AVATARTABLE', " left join ".TABLE_PREFIX."user_upload on ".TABLE_PREFIX."user_upload.id = ".TABLE_PREFIX.DB_USERTABLE.".icon_path "											);
define('DB_AVATARFIELD', " concat(".TABLE_PREFIX."user_upload.path_upload,".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.",'/thumb_',".TABLE_PREFIX."user_upload.upload_path) "		    );
define('DB_USERTABLE_LASTACTIVITY',	'date_last_seen'					);

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

	if(isset($_COOKIE['PHPSESSID']) && !empty($_COOKIE['PHPSESSID'])) {
		$sql = "select id_user from ".TABLE_PREFIX."active_sessions where session='".$_COOKIE['PHPSESSID']."'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if($row[0] <> '2') {
			$userid = $row[0];
		}
	}
	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE email ='".$userName."'";
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE login ='".$userName."'";
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);

	if($row['password']== md5($userPass)) {
		$userid = $row['id'];
	}
	return $userid;
}


function getFriendsList($userid,$time) {
	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {
		$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."user left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." not in ( '".mysql_real_escape_string($userid)."',1) and ('".$time."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." < '".((ONLINE_TIMEOUT)*2)."') order by username asc");	
	} else {
		$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."user left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." in (select id_user from ".TABLE_PREFIX."hotlist where id_friend = '".mysql_real_escape_string($userid)."' and accepted = '1' UNION select id_friend from ".TABLE_PREFIX."hotlist where id_user = '".mysql_real_escape_string($userid)."' and accepted = '1') order by username asc");
	}
	
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
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
    return BASE_URL.'../viewprofile.php?id='.$link;
}

function getAvatar($image) {
	if($image){ 
	  return BASE_URL.'../uploades/photos/'.$image; 
	} else {
	  return BASE_URL.'../templates/pilot_3_theme/images/thumb_default_icon_member.png'; 
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

function hooks_activityupdate($userid,$status) {

}

function hooks_forcefriends() {
   
}

function hooks_message($fromid,$toid,$unsanitizedmessage) {
    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* Nulled by TrioxX */

$p_ = 4;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////