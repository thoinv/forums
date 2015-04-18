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

include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'settings.php';
ini_set('session.save_handler',     'files');

$data = explode('/',$db_url);
$db = $data[3];
$data2 = explode('@', $data[2]);
$host = $data2[1];
$up=explode(':',$data2[0]);
$user=$up[0];
$pwd=$up[1];

define('DB_SERVER',					$host								     );
define('DB_PORT',					"3306"									 );
define('DB_USERNAME',				$user									 );
define('DB_PASSWORD',				$pwd								     );
define('DB_NAME',					$db								         );
define('TABLE_PREFIX',				$db_prefix								 );
define('DB_USERTABLE',				"users"									 );
define('DB_USERTABLE_NAME',			"name"							         );
define('DB_USERTABLE_USERID',		"uid"								     );
define('DB_AVATARTABLE',		    " "										 );
define('DB_AVATARFIELD',		    " ".TABLE_PREFIX.DB_USERTABLE.".picture	");
define('DB_USERTABLE_LASTACTIVITY',	"lastactivity"							 );
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

	$sess_id = getSessionId();
	
	
	foreach ($_COOKIE as $key=>$val) {
		if(strpos($key, 'SESS') === 0) {
		
		$sess_id = $val;

			if(!empty($sess_id)) {

				$result = mysql_query("SELECT uid FROM ".TABLE_PREFIX."sessions WHERE sid = '".mysql_real_escape_string($sess_id)."'");
				
				if($row=mysql_fetch_array($result)) {
					if (!empty($row['uid'])) {
						$userid = $row['uid'];
					}
				}
			}
		}
	}
	
	return $userid;

}

function chatLogin($userName,$userPass){
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE mail ='".$userName."'"; 
	} else {
		$sql ="SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE name ='".$userName."'"; 		
	}
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);			
		
	if($row['pass']== md5($userPass)){
		$userid = $row['uid'];
	}
	return $userid;
}

function getFriendsList($userid,$time) {

	$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'-lastactivity < '".((ONLINE_TIMEOUT)*2)."') and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline') order by username asc");	 

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
    return '';
}

function getAvatar($image) {
		
    if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$image))   
	{
        return BASE_URL.'../'.$image;
    } else {
        return '';
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

function getSessionId()
{
  foreach($_COOKIE as $key=>$val)
  {
	  if(strpos($key, 'SESS') === 0)
	  {
		  return $val;
	  }
  }

  return '';

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* Nulled by TrioxX */

$p_ = 4;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////