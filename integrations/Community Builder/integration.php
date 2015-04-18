<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

define('_JEXEC',1);
define('DS',DIRECTORY_SEPARATOR);
define('JPATH_BASE',dirname(dirname(__FILE__)));
session_start();
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."configuration.php";
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'defines.php';
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'framework.php';

$config = new JConfig;

// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW

define('DB_SERVER',					$config->host							);
define('DB_PORT',					"3306"									);
define('DB_USERNAME',				$config->user							);
define('DB_PASSWORD',				$config->password						);
define('DB_NAME',					$config->db								);
define('TABLE_PREFIX',				$config->dbprefix						);
define('DB_USERTABLE',				"users"									);
define('DB_USERTABLE_USERID',		"id"									);
define('DB_USERTABLE_NAME',			"name"									);
define('DB_AVATARTABLE',		    "left join ".TABLE_PREFIX."comprofiler on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = ".TABLE_PREFIX."comprofiler.user_id left join ".TABLE_PREFIX."comprofiler_members on ".TABLE_PREFIX."comprofiler_members.referenceid = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID."");
define('DB_AVATARFIELD',		    "" .TABLE_PREFIX."comprofiler.avatar"   );
define('DB_USERTABLE_LASTACTIVITY',	"lastvisitDate"							);

$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');		
define('DO_NOT_START_SESSION','1');	
define('DO_NOT_DESTROY_SESSION','1');
define('SWITCH_ENABLED','1');		
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
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE email ='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE username ='".$userName."'"; 
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	$hash_salt = explode(":",$row['password']);
	if($row['password']== md5($userPass.$hash_salt[1]).':'.$hash_salt[1]) {
		$userid = $row['id'];		
	}	
	return $userid;
}

function getFriendsList($userid,$time) {
	$sql = ("select distinct(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.") userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid  ".DB_AVATARTABLE." where ".TABLE_PREFIX."comprofiler_members.accepted = '1' and  ".TABLE_PREFIX."comprofiler_members.pending = '0' and ".TABLE_PREFIX."comprofiler_members.memberid = '".mysql_real_escape_string($userid)."' order by username asc");

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {

		$sql = ("select UNIX_TIMESTAMP(NOW()) as time");
		$query = mysql_query($sql);
		$now = mysql_fetch_array($query);
		$difference = ONLINE_TIMEOUT+$now['time']-JFactory::getDate()->toUnix();

		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link,  cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."comprofiler left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid left join ".TABLE_PREFIX."comprofiler_members on ".TABLE_PREFIX."comprofiler_members.referenceid = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." ".DB_AVATARTABLE." where (UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") < ".$difference." )  and ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible') order by username asc");           

	}
 
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select distinct ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from  ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid  ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$today	=& JFactory::getDate();
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = '".$today->toMySQL()."' where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	$sql = ("select cometchat_status.message message, cometchat_status.status from cometchat_status where cometchat_status.userid = ".mysql_real_escape_string($userid));
	return $sql;
}

function getLink($link) {
	return str_replace('cometchat/','',JURI::root()).'?option=com_comprofiler&task=userProfile&user='.$link;
}

function getAvatar($image) {
	if (!empty($image)) {
		return BASE_URL.'../images/comprofiler/'.$image;
	} else {
		return BASE_URL.'../components/com_comprofiler/plugin/templates/default/images/avatar/nophoto_n.png';
	}
}

function getTimeStamp() {
	return JFactory::getDate()->toUnix();
}

function processTime($time) {
	return JFactory::getDate($time)->toUnix();
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