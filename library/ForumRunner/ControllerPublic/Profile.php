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

class ForumRunner_ControllerPublic_Profile extends XenForo_ControllerPublic_Member
{

    public function actionGetProfile ()
    {
        $visitor = XenForo_Visitor::getInstance();
        $permissions = $visitor->getPermissions();
	$session_model = $this->getModelFromCache('XenForo_Model_Session');

	$userid = $this->_input->filterSingle('userid', XenForo_Input::UINT);
	if (!$userid) {
	    $userid = XenForo_Visitor::getUserId();
	}
	try {
	    $user = $this->getHelper('UserProfile')->assertUserProfileValidAndViewable($userid,
		array(
		    'join' => XenForo_Model_User::FETCH_LAST_ACTIVITY,
		)
	    );
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	$online_info = $session_model->getSessionActivityRecords(
	    array(
		'user_id' => $user['user_id'],
		'cutOff' => array('>', $session_model->getOnlineStatusTimeout())
	    )
	);
	$is_online = false;
	if (count($online_info) == 1) {
	    $is_online = true;
	}

        $posts = $user['message_count'];
        $joindate = prepare_utf8_string(XenForo_Locale::date($user['register_date'], 'absolute'));

	$out = array(
	    'username' => prepare_utf8_string(strip_tags($user['username'])),
	    'posts' => $posts,
	    'joindate' => $joindate,
            'online' => $is_online,
            'avatar_upload' => $visitor->canUploadAvatar(),
        );

        $maxFileSize = XenForo_Permission::hasPermission($permissions, 'avatar', 'maxFileSize');
        if ($maxFileSize > 0) {
            $out['avatar_resize'] = true;
        }

	$avatarurl = process_avatarurl(XenForo_Template_Helper_Core::getAvatarUrl($user, 'm'));
	if (strpos($avatarurl, '/xenforo/avatars/avatar_') !== false) {
	    $avatarurl = '';
	}
	if ($avatarurl != '') {
	    $out['avatarurl'] = $avatarurl;
	}
	if ($visitor->hasAdminPermission('ban')) {
	    $out['ban'] = true;
        }

        // New Profile Fields
        $groups = array();

        // About
        $out_group = array(
            'name' => 'about',
            'values' => array(
                array(
                    'name' => prepare_utf8_string(fr_get_phrase('messages')),
                    'value' => strval($posts),
                ),
                array(
                    'name' => prepare_utf8_string(fr_get_phrase('joined')),
                    'value' => $joindate,
                ),
                array(
                    'name' => prepare_utf8_string(fr_get_phrase('likes_received')),
                    'value' => strval($user['like_count']),
                ),
            ),
        );

        $groups[] = $out_group;

        // Additional information
        $out_group = array(
            'name' => 'additional',
        );
        
        // Status
        if (!empty($user['status'])) {
            $out_group['values'][] = array(
                'name' => prepare_utf8_string(fr_get_phrase('status')),
                'value' => prepare_utf8_string($user['status']),
            );
        }

        // Location
        if (!empty($user['location'])) {
            $out_group['values'][] = array(
                'name' => prepare_utf8_string(fr_get_phrase('location')),
                'value' => prepare_utf8_string($user['location']),
            );
        }

        // Occupation
        if (!empty($user['occupation'])) {
            $out_group['values'][] = array(
                'name' => prepare_utf8_string(fr_get_phrase('occupation')),
                'value' => prepare_utf8_string($user['occupation']),
            );
        }

        // About
        if (!empty($user['about'])) {
            $out_group['values'][] = array(
                'name' => prepare_utf8_string(fr_get_phrase('about')),
                'value' => prepare_utf8_string(remove_bbcode($user['about'], true, true)),
            );
        }

        if (count($out_group['values'])) {
            $groups[] = $out_group;
        }

        $out['groups'] = $groups;

	return $out;
    }

    public function actionUploadAvatar ()
    {
        $this->_assertPostOnly();

        if (!XenForo_Visitor::getInstance()->canUploadAvatar()) {
            return $this->responseNoPermission();
        }

        $avatar = XenForo_Upload::getUploadedFile('upload');

        $avatarModel = $this->getModelFromCache('XenForo_Model_Avatar');

        $visitor = XenForo_Visitor::getInstance();

        // upload new avatar
        if ($avatar) {
            try {
                $avatarData = $avatarModel->uploadAvatar($avatar, $visitor['user_id'], $visitor->getPermissions());
            } catch (Exception $e) {
                json_error($e->getMessages());
            }
        }

        // merge new data into $visitor, if there is any
        if (isset($avatarData) && is_array($avatarData)) {
            foreach ($avatarData AS $key => $val) {
                $visitor[$key] = $val;
            }
        }

        return array('success' => true);
    }

    protected function _checkCsrf($action) {}
}
