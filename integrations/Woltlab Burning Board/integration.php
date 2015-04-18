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

include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'wcf'.DIRECTORY_SEPARATOR.'config.inc.php';

define('DB_SERVER',					$dbHost					            );
define('DB_PORT',					''									);
define('DB_USERNAME',				$dbUser					            );
define('DB_PASSWORD',				$dbPassword					        );
define('DB_NAME',					$dbName					            );
define('TABLE_PREFIX',				"wcf".WCF_N."_"				        );
define('DB_USERTABLE',				'user'								);
define('DB_USERTABLE_NAME',			'username'							);
define('DB_USERTABLE_USERID',		'userID'							);
define('DB_AVATARTABLE', ''                                             );
define('DB_AVATARFIELD', " concat(".TABLE_PREFIX.DB_USERTABLE.".avatarID,'^',".TABLE_PREFIX.DB_USERTABLE.".disableAvatar) ");
define('DB_USERTABLE_LASTACTIVITY',	'lastActivityTime'					);


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

	if(isset($_COOKIE['wcf_cookieHash'])){	
		$sql = ("select userID from ".TABLE_PREFIX."session where sessionID = '".$_COOKIE['wcf_cookieHash']."'");
		$res = mysql_query($sql);
		$result = mysql_fetch_array($res);
		$userid = $result['userID'];
	}	
	
	return $userid;
}

function chatLogin($userName,$userPass){
	$userid = 0;

	if(filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql = "SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE email ='".$userName."'";
	} else {
		$sql = "SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE username ='".$userName."'";
	}

	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);

	include_once (dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'options.inc.php';


	function getSaltedHash($value, $salt) {
		if (!defined('ENCRYPTION_ENABLE_SALTING') || ENCRYPTION_ENABLE_SALTING) {
			$hash = '';
			
			if (!defined('ENCRYPTION_SALT_POSITION') || ENCRYPTION_SALT_POSITION == 'before') {
				$hash .= $salt;
			}
			
			if (!defined('ENCRYPTION_ENCRYPT_BEFORE_SALTING') || ENCRYPTION_ENCRYPT_BEFORE_SALTING) {
				$hash .= encrypt($value);
			}
			else {
				$hash .= $value;
			}
			
			if (defined('ENCRYPTION_SALT_POSITION') && ENCRYPTION_SALT_POSITION == 'after') {
				$hash .= $salt;
			}
			
			return encrypt($hash);
		}
		else {
			return encrypt($value);
		}
	}

	function getDoubleSaltedHash($value, $salt) {
		return encrypt($salt . getSaltedHash($value, $salt));
	}

	function encrypt($value) {
		if (defined('ENCRYPTION_METHOD')) {
			switch (ENCRYPTION_METHOD) {
				case 'sha1': return sha1($value);
				case 'md5': return md5($value);
				case 'crc32': return crc32($value);
				case 'crypt': return crypt($value);
			}
		}
		return sha1($value);
	}

	$password=getDoubleSaltedHash($userPass,$row['salt']);
	if($row['password']==$password ) {
		$userid = $row['userID'];
	}
	
	if($row['password']==$password ) {
		$userid = $row['userID'];
	}

	return $userid;
}

function getFriendsList($userid,$time) {
   $sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity, ".DB_AVATARFIELD." avatar,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from   ".TABLE_PREFIX.DB_USERTABLE."   left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." in (select whiteUserId from ".TABLE_PREFIX.DB_USERTABLE."_whitelist where ".TABLE_PREFIX.DB_USERTABLE."_whitelist.userID = '".mysql_real_escape_string($userid)."' and confirmed = '1') order by username asc");

	if (defined('DISPLAY_ALL_USERS') && DISPLAY_ALL_USERS == 1) {
       $sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,".DB_AVATARFIELD." avatar,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE."  left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' and ('".$time."'-".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." < '".((ONLINE_TIMEOUT)*2)."') order by username asc");

       }
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link , ".DB_AVATARFIELD." avatar,  cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = ".getTimeStamp()." where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	 $sql = ("select cometchat_status.message, cometchat_status.status from cometchat_status where userid = '".mysql_real_escape_string($userid)."'");
	 return $sql;
}

function getLink($link) {
	 return BASE_URL.'../index.php?page=User&userID='.$link;
}

function getAvatar($image) {
	$images1=explode('^',$image);
	if($images1[1]=='0' && $images1[0]!='0' ){
		return BASE_URL.'../wcf/images/avatars/avatar-'.$images1[0].'.jpg';
	}else
		return BASE_URL.'../wcf/images/avatars/avatar-default.png';
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