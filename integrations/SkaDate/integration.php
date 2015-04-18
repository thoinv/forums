<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','0');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','1');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','0');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

if(!file_exists(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'internals'.DIRECTORY_SEPARATOR.'$config.php'))
{
	echo "Please check if cometchat is installed in the correct directory <br> Generally cometchat should be installed in <SKADATE_HOME_DIRECTORY>/cometchat";	
	exit;
}

include_once(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'internals'.DIRECTORY_SEPARATOR.'$config.php';

define('DB_SERVER',					DB_HOST								);
define('DB_PORT',					"3306"								);
define('DB_USERNAME',				DB_USER								);
define('DB_PASSWORD',				DB_PASS								);
define('TABLE_PREFIX',				DB_TBL_PREFIX						);
define('DB_USERTABLE',				"profile"				            );
define('DB_USERTABLE_USERID',		"profile_id"						);
define('DB_USERTABLE_NAME',			"username"							);
define('DB_AVATARTABLE',            " left join (select * from ".TABLE_PREFIX."profile_photo where ".TABLE_PREFIX."profile_photo.status = 'active' and number=0)a on a.profile_id=".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." ");
define('DB_AVATARFIELD',            " concat(COALESCE((concat(a.profile_id,'',a.photo_id,'',a.index)),''),'^', ".TABLE_PREFIX.DB_USERTABLE.".sex) ");
define('DB_USERTABLE_LASTACTIVITY',	"activity_stamp"					);

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

	if(!empty($_SESSION['%http_user%']['profile_id']))
		$userid = $_SESSION['%http_user%']['profile_id'];
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
			
		if($row['password']== $userPass){
			$userid = $row['profile_id'];			
		}		
		return $userid;
}

function getFriendsList($userid,$time) {
	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1)
	{
		 $sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".mysql_real_escape_string($time)."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') and ".TABLE_PREFIX."profile_photostatus = 'active' order by username asc");
	}
	else
	{
		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."profile_friend_list join ".TABLE_PREFIX.DB_USERTABLE." on  ".TABLE_PREFIX."profile_friend_list.profile_id = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX."profile_friend_list.friend_id = '".mysql_real_escape_string($userid)."' order by username asc");	
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
	$path = dirname(dirname(__FILE__));
	$array = explode("/",$path);
    return '/'.array_pop($array).'/../member/profile_'.$link.'.html';
}

function getAvatar($image) {
	$img=explode('^',$image);
	if($img[0])
		return BASE_URL.'../$userfiles/thumb_'.$img[0].'.jpg';
	else
		return BASE_URL.'../layout/themes/fb/img/sex_'.$img[1].'_no_photo_thumb.gif';
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