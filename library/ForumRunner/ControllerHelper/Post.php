<?php
/*
 * Forum Runner
 *
 * Copyright (c) 2010-2011 to End of Time Studios, LLC
 *
 * This file may not be redistributed in whole or significant part.
 *
 * http://www.forumrunner.com
 */

class ForumRunner_ControllerHelper_Post extends XenForo_ControllerHelper_Abstract
{
    public static function likesHtml($postid, $number, $like_date = 0, array $users = array())
    {
	$visitor = XenForo_Visitor::getInstance();

	if (empty($users)) {
	    return new XenForo_Phrase('likes_x_people_like_this', array(
		'likes' => self::numberFormat($number),
		'likesLink' => 'tt://likes/' . $postid,
	    ));
	}

	$you_like = false;

	if ($like_date) {
	    $you_like = true;

	    $visitorid = XenForo_Visitor::getUserId();
	    foreach ($users AS $key => $user) {
		if ($user['user_id'] == $visitorid) {
		    unset($users[$key]);
		    break;
		}
	    }

	    if (count($users) == 3) {
		unset($users[2]);
	    }

	    $users = array_values($users);
	}

	$user1 = $user2 = $user3 = '';

	if (isset($users[0])) {
	    $user1 = self::helperUserName($users[0]);

	    if (isset($users[1])) {
		$user2 = self::helperUserName($users[1]);

		if (isset($users[2])) {
		    $user3 = self::helperUserName($users[2]);
		}
	    }
	}

	$phrase_params = array(
	    'user1' => $user1,
	    'user2' => $user2,
	    'user3' => $user3,
	    'others' => XenForo_Locale::numberFormat($number - 3, 0, $visitor->getLanguage()),
	    'likesLink' => 'tt://likes/' . $postid,
	);

	switch ($number) {
	case 1: return new XenForo_Phrase(($you_like ? 'likes_you_like_this' : 'likes_user1_likes_this'), $phrase_params, false);
	case 2: return new XenForo_Phrase(($you_like ? 'likes_you_and_user1_like_this' : 'likes_user1_and_user2_like_this'), $phrase_params, false);
	case 3: return new XenForo_Phrase(($you_like ? 'likes_you_user1_and_user2_like_this' : 'likes_user1_user2_and_user3_like_this'), $phrase_params, false);
	case 4: return new XenForo_Phrase(($you_like ? 'likes_you_user1_user2_and_1_other_like_this' : 'likes_user1_user2_user3_and_1_other_like_this'), $phrase_params, false);
	default: return new XenForo_Phrase(($you_like ? 'likes_you_user1_user2_and_x_others_like_this' : 'likes_user1_user2_user3_and_x_others_like_this'), $phrase_params, false);
	}
    }

    public function helperUserName($user)
    {
	return '<a href="tt://profile/' . $user['user_id'] . '">' . $user['username'] . '</a>';
    }

}
