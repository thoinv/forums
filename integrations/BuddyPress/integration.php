<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');
define('DO_NOT_START_SESSION','0');	
define('DO_NOT_DESTROY_SESSION','0');
define('ADD_LAST_ACTIVITY','1');	
define('SWITCH_ENABLED','1');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','1');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."wp-load.php";

define('DB_SERVER',					DB_HOST									);
define('DB_PORT',					"3306"									);
define('DB_USERNAME',				DB_USER									);
define('TABLE_PREFIX',				$table_prefix							);
define('DB_USERTABLE',				"users"									);
define('DB_USERTABLE_USERID',		"ID"									);
define('DB_USERTABLE_NAME',			"display_name"							);
define('DB_AVATARTABLE',		    " "                                     );
define('DB_AVATARFIELD',		    " CONCAT(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.",'|',".TABLE_PREFIX.DB_USERTABLE.".user_email)");
define('DB_USERTABLE_LASTACTIVITY',	"lastactivity"							);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* FUNCTIONS */

function getUserID() {
	global $current_user;
    get_currentuserinfo();

	$userid = 0;
	if (!empty($_SESSION['basedata']) && $_SESSION['basedata'] != 'null') {
		$_REQUEST['basedata'] = $_SESSION['basedata'];
	}

	if (!empty($_REQUEST['basedata'])) {
		$userid = $_REQUEST['basedata'];
	}

	if (!empty($current_user->ID)) {
		$userid = $current_user->ID;
	}

	return $userid;
}


function chatLogin($userName,$userPass){
	$userid = 0;
	include(dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."wp-includes".DIRECTORY_SEPARATOR."class-phpass.php");
	$hasher = new PasswordHash(8, false);	

	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE user_email='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE user_login='".$userName."'"; 
	}
	
	$result=mysql_query($sql);
	$row = mysql_fetch_array( $result );		
	$check = $hasher->CheckPassword($userPass, $row['user_pass']);	
	   
	if ($check) { 
		$userid = $row['ID'];
	}
	
	return $userid;
}

function getFriendsList($userid,$time) {

	$sql = ("(select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".TABLE_PREFIX.DB_USERTABLE.".user_nicename link, ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."bp_friends join ".TABLE_PREFIX.DB_USERTABLE." on  ".TABLE_PREFIX."bp_friends.friend_user_id = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ". DB_AVATARTABLE." where ".TABLE_PREFIX."bp_friends.initiator_user_id = '".mysql_real_escape_string($userid)."' and is_confirmed = 1)
	
	union
	
	(select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".TABLE_PREFIX.DB_USERTABLE.".user_nicename link, ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."bp_friends join ".TABLE_PREFIX.DB_USERTABLE." on  ".TABLE_PREFIX."bp_friends.initiator_user_id = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ". DB_AVATARTABLE." where ".TABLE_PREFIX."bp_friends.friend_user_id = '".mysql_real_escape_string($userid)."' and is_confirmed = 1 )
	order by username asc
	");

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {

		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".TABLE_PREFIX.DB_USERTABLE.".user_nicename link, ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ". DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." < '".((ONLINE_TIMEOUT)*2)."') order by username asc");

	}
 
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".user_nicename link,  ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ". DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
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
    return '/members/'.$link;
}

function getAvatar($data) {

	$data = explode('|',$data);
	$id = $data[0];

	if (is_dir((dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'wp-content'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'avatars' .DIRECTORY_SEPARATOR. $id))) {
		$files = "";
		if ($handle = opendir(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'wp-content'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'avatars' .DIRECTORY_SEPARATOR. $id)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					if(substr($file, -11, 7) == "bpthumb" ) {
						$files .= $file;
					}
				}
			}
			closedir($handle);
		}

		if (file_exists((dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'wp-content'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'avatars' .DIRECTORY_SEPARATOR. $id .DIRECTORY_SEPARATOR. $files))) {
			return BASE_URL.'../wp-content/uploads/avatars/' . $id . '/' . $files;
		}
	}

	return 'http://www.gravatar.com/avatar/'.md5($data[1]).'?d=wavatar&s=80';
}


function getTimeStamp() {
	return current_time('timestamp');
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