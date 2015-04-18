<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

define('_JEXEC',1);
define('DS',DIRECTORY_SEPARATOR);
define('JPATH_BASE',dirname(dirname(__FILE__)));
include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'configuration.php';
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'defines.php';
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'framework.php';

$config = new JConfig;

// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW

define('DB_SERVER',					$config->host						);
define('DB_PORT',					'3306'								);
define('DB_USERNAME',				$config->user						);
define('DB_PASSWORD',				$config->password					);
define('DB_NAME',					$config->db						    );
define('TABLE_PREFIX',				$config->dbprefix					);
define('DB_USERTABLE',				'users'								);
define('DB_USERTABLE_NAME',			'username'							);
define('DB_USERTABLE_USERID',		'id'								);
define('DB_USERTABLE_LASTACTIVITY',	'lastactivity'						);
define('DB_AVATARTABLE'," "								                );
define('DB_AVATARFIELD', TABLE_PREFIX.DB_USERTABLE.".params"		    );
define('ADD_LAST_ACTIVITY','1'											);

$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','1');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','1');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','0');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');

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

	$my =& JFactory::getUser();

	if (!empty($my->id)) {
		$userid = $my->id;
	}
	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE ".TABLE_PREFIX.DB_USERTABLE.".email ='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." ='".$userName."'"; 
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	$hash_salt = explode(":",$row['password']);
	if($row['password']== md5($userPass.$hash_salt[1]).':'.$hash_salt[1]){
		$userid = $row['id'];		
	}
	return $userid;			
}

function getFriendsList($userid,$time) {
	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD."  avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and  ('".mysql_real_escape_string($time)."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." < '".((ONLINE_TIMEOUT)*2)."') and  (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible') order by username asc");               
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." link,  ".DB_AVATARFIELD."  avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
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
	return BASE_URL.'../component/profile/?view=display&user='.$link;
}

function getAvatar($image) {
	$img=explode('thumb_',$image);
	if(isset($img[1])) {
		$img1=explode('"',$img[1]);
		if(!empty($img1[0])) {
			$img2 = BASE_URL.'../images/avatar/thumb_'.$img1[0];
		} else {
			$img2 = BASE_URL.'../images/avatar/user.png';
		}
	} else {
		$img2 = BASE_URL.'../images/avatar/user.png';
	}
	return $img2;
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