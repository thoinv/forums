<?php

if(!file_exists(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'Settings.php'))
{
	die("Please check if cometchat is installed in the correct directory <br> Generally cometchat should be installed in <SMF2_HOME_DIRECTORY>/cometchat");	
}
include_once (dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."Settings.php");
unset($language);
$name_port=explode(":", $db_server);
$server_name= $name_port[0];
$server_port= $name_port[1];
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','0');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','0');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','0');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

define('DB_SERVER',					$server_name								);
define('DB_PORT',					$server_port								);
define('DB_USERNAME',				$db_user									);
define('DB_PASSWORD',				$db_passwd								    );
define('DB_NAME',					$db_name								    );
define('TABLE_PREFIX',				$db_prefix									);
define('DB_USERTABLE',				"members"									);
define('DB_USERTABLE_USERID',		"id_member"								    );
define('DB_USERTABLE_NAME',			"member_name"								);
define('DB_AVATARTABLE',		    " left join ".TABLE_PREFIX."attachments on  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = ".TABLE_PREFIX."attachments.".DB_USERTABLE_USERID."");
define('DB_AVATARFIELD',		    "  concat(".TABLE_PREFIX.DB_USERTABLE.".avatar,'^', COALESCE( (Select ID_ATTACH from ".TABLE_PREFIX."attachments where ".DB_USERTABLE_USERID." = " .TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID."),''))");
define('DB_USERTABLE_LASTACTIVITY',	"lastactivity"							    );
define('ADD_LAST_ACTIVITY', "1");
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* FUNCTIONS */

function getUserID() {
	$userid = 0;
	global $cookiename; //from Settings.php

	if (!empty($_SESSION['basedata']) && $_SESSION['basedata'] != 'null') {
		$_REQUEST['basedata'] = $_SESSION['basedata'];
	}

	if (!empty($_REQUEST['basedata'])) {
		$userid = $_REQUEST['basedata'];
	}

	if(isset($_COOKIE[ $cookiename ]) && !empty($_COOKIE[ $cookiename ])) {
		$cookie = $_COOKIE[$cookiename];
		$user_settings = unserialize($cookie);

		if(isset($user_settings[0]) && !empty($user_settings[0])) {
			$userid = $user_settings[0];
		}
	}

	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE email_address ='".$userName."'";
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE member_name='".$userName."'"; 
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);

	if($row['passwd']== sha1(strtolower($userName).$userPass)){
		$userid = $row['id_member'];
	}
	return $userid;
}

function getFriendsList($userid,$time) {

	 if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {
		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'-lastactivity < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') order by username asc");
	}	
	
	else  {
	$sql_buddy = "Select buddy_list from " . TABLE_PREFIX.DB_USERTABLE . " where " . TABLE_PREFIX.DB_USERTABLE . "." . DB_USERTABLE_USERID . " = " . $userid;
	$res = mysql_fetch_array(mysql_query($sql_buddy));
	if($res[0] <> "")
	{
		$sql = "select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username,
		".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar,
		".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from
		".TABLE_PREFIX."members left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where
		".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." IN ({$res[0]}) order by username asc";
		
	}
}
return $sql;

}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
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
   return 'index.php?action=profile;u='.$link;
}

function getAvatar($image) {

	$avatar = explode('^',$image);
	$avatar_name = $avatar[0];
	$avatar_id = $avatar[1];

	if($avatar_name == "")
	{
		if($avatar_id == "")
		{
			return BASE_URL.'../avatars/blank.gif';
		}
		else
		{
			return BASE_URL.'../index.php?action=dlattach;attach=' . $avatar_id . ';type=avatar';
		}
	}
	elseif(strpos($avatar_name,'http',0) >= -1)
	{
		return $avatar_name;
	}
	else
	{
		return BASE_URL.'../avatars/' . $avatar_name;
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