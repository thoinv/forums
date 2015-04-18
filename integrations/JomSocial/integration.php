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
define('DB_PORT',					'3306'									);
define('DB_USERNAME',				$config->user							);
define('DB_PASSWORD',				$config->password						);
define('DB_NAME',					$config->db								);
define('TABLE_PREFIX',				$config->dbprefix						);
define('DB_USERTABLE',				'users'									);
define('DB_USERTABLE_NAME',			'name'									);
define('DB_USERTABLE_USERID',		'id'									);
define('DB_AVATARTABLE',		    " left join ".TABLE_PREFIX."community_users on ".TABLE_PREFIX."community_users.userid = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID."");
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX."community_users.thumb " );
define('DB_USERTABLE_LASTACTIVITY',	'lastvisitDate'							);

$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','1');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','1');	// Set to 1 if you do not want to destroy session on logout
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
	if($row['password']== md5($userPass.$hash_salt[1]).':'.$hash_salt[1]){
		$userid = $row['id'];		
	}	
	return $userid;			
}

function getFriendsList($userid,$time) {
	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, ".TABLE_PREFIX."community_users.status message, cometchat_status.status from ".TABLE_PREFIX."community_connection join ".TABLE_PREFIX.DB_USERTABLE." on  ".TABLE_PREFIX."community_connection.connect_to = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid  ".DB_AVATARTABLE." where ".TABLE_PREFIX."community_connection.status = '1' and ".TABLE_PREFIX."community_connection.connect_from = '".mysql_real_escape_string($userid)."' order by username asc");

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {

		$sql = ("select UNIX_TIMESTAMP(NOW()) as time");
		$query = mysql_query($sql);
		$now = mysql_fetch_array($query);
		$difference = ((ONLINE_TIMEOUT)*2)+$now['time']-JFactory::getDate()->toUnix();
		
		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, ".TABLE_PREFIX."community_users.status message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where (UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY.") < ".$difference." )  and ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible') order by username asc");               
	}
 
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link,  ".DB_AVATARFIELD." avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid  ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$today	=& JFactory::getDate();
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = '".$today->toMySQL()."' where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	 $sql = ("select ".TABLE_PREFIX."community_users.status message, cometchat_status.status from ".TABLE_PREFIX."community_users left join cometchat_status on ".TABLE_PREFIX."community_users.userid = cometchat_status.userid where ".TABLE_PREFIX."community_users.userid = ".mysql_real_escape_string($userid));
	return $sql;
}

function getLink($link) {
	return BASE_URL.'../index.php?option=com_community&view=profile&userid='.$link;
}

function getAvatar($image) {
	if(empty($image)) {
		$image = 'components/com_community/assets/default_thumb.jpg';
	}
	return BASE_URL.'../'.$image;
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
	$today	=& JFactory::getDate();
	$sql = ("insert into ".TABLE_PREFIX."community_activities (actor,target,title,app,cid,created,points) values ('".$userid."','".$userid."','".mysql_real_escape_string(sanitize($statusmessage))."','profile',$userid,'".$today->toMySQL()."',1)");
	$query = mysql_query($sql);	
	$last_id = mysql_insert_id();
	$sql1 = mysql_query("SELECT * FROM ".TABLE_PREFIX."community_activities LIMIT 1"); 
	$query1 = mysql_fetch_array($sql1); 
	
	if($query1['like_id']){
		$sql=("update ".TABLE_PREFIX."community_activities set like_id ='".$last_id."',like_type='profile.status' where id='".$last_id."'");
		$query=mysql_query($sql);
	}
	if($query1['comment_id']){
		$sql=("update ".TABLE_PREFIX."community_activities set comment_id ='".$last_id."',comment_type='profile.status' where id='".$last_id."'");
		$query=mysql_query($sql);
	}
	
	$sql = ("update ".TABLE_PREFIX."community_users set status = '".mysql_real_escape_string(sanitize($statusmessage))."' where ".TABLE_PREFIX."community_users.userid = ".mysql_real_escape_string($userid));
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