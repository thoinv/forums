<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','0');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','0');	// Set to 1 if you do not want to destroy session on logout
define('SWITCH_ENABLED','0');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');
define('FORCE_ALL_USERS','1');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

include_once(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'settings.cfg.php';

$dbdetails = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'.htpasswd';
$fh = fopen($dbdetails, 'r');
$i = 0;

while(!(feof($fh))) {
	$dbdata[$i] = fgets($fh);
    $i++;  
}

$host = explode('"',base64_decode($dbdata[0]));
$dbname = explode('"',base64_decode($dbdata[1]));
$username = explode('"',base64_decode($dbdata[2]));
$password = explode('"',base64_decode($dbdata[3]));
      
fclose($fh);

define('DB_SERVER',						$host[1]			); 
define('DB_PORT',						"3306"				);
define('DB_USERNAME',					$username[1]		);
define('DB_PASSWORD',					$password[1]		);
define('DB_NAME',						$dbname[1]			);
define('TABLE_PREFIX',					$config['db_prefix']);
define('DB_USERTABLE',					"user"				);
define('DB_USERTABLE_USERID',			"user_id"			);
define('DB_USERTABLE_NAME',				"user_nickname"		);
define('DB_AVATARTABLE',		        " "					);
define('DB_AVATARFIELD',		        " CONCAT(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.",'^',".TABLE_PREFIX.DB_USERTABLE.".user_band_id)");    
define('DB_USERTABLE_LASTACTIVITY',		"lastactivity"		);
define('ADD_LAST_ACTIVITY',				"1"					);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* FUNCTIONS */

function getUserID() {
	$userid = 0;

	if (!empty($_SESSION['basedata']) && $_SESSION['basedata'] != 'null') {
		$_REQUEST['basedata'] = $_SESSION['basedata'];
	}

	if (!empty($_REQUEST['basedata'])) {
		$userid = $_REQUEST['basedata'];
	}

	if(!empty($_COOKIE['JamroomID'])) {
		
		$query = 'select user_id from '.TABLE_PREFIX.'session where SID="'.mysql_real_escape_string($_COOKIE['JamroomID']).'"';
		$res = mysql_query($query);
		$row = mysql_fetch_array($res);
		$userid = $row[0];

	}

	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE user_emailadr ='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE user_nickname ='".$userName."'"; 		
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);			
	if($row['user_password']== md5($userPass)){
		$userid = $row['user_id'];			
	}		
	return $userid;		
}


function getFriendsList($userid,$time) {

	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, " .DB_AVATARFIELD. " avatar, CONCAT(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.",'^',".TABLE_PREFIX.DB_USERTABLE.".user_band_id) link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".mysql_real_escape_string($time)."'-lastactivity < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') order by username asc");         

    return $sql;
}

function getUserDetails($userid) {

	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, CONCAT(".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID.",'^',".TABLE_PREFIX.DB_USERTABLE.".user_band_id) link, " .DB_AVATARFIELD. " avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");

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
	$url = explode('^',$link);
	$user_id = $url[0];
	$band_id = $url[1];
    return BASE_URL.'../members/'.$band_id.'/user_'.$user_id.'.php';
}

function getAvatar($image) {
	$avatar = explode('^',$image);
	$user_id = $avatar[0];
	$band_id = $avatar[1];
    if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'members'.DIRECTORY_SEPARATOR.$band_id.DIRECTORY_SEPARATOR.'user_'.$user_id.'_image.jpeg')) {
        return BASE_URL.'../members/'.$band_id.'/user_'.$user_id.'_image.jpeg';
    } else {
        return BASE_URL.'../images/default_user_image.png';
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