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

class ForumRunner_ControllerPublic_Login extends XenForo_ControllerPublic_Login
{

    public function actionLogin ()
    {
	global $fr_version, $fr_platform;

	$vals = $this->_input->filter(array(
	    'username' => XenForo_Input::STRING,
	    'password' => XenForo_Input::STRING,
	    'md5_password' => XenForo_Input::STRING,
	    'fr_username' => XenForo_Input::STRING,
            'fr_b' => XenForo_Input::UINT,
            'token' => XenForo_Input::STRING,
	));

	$login_model = $this->_getLoginModel();
	$user_model = $this->_getUserModel();
	$options = XenForo_Application::get('options');

	$navbg = '';
	$style = $options->forumrunnerColor;
	if ($style) {
	    // Convert to right style.  iPhone needs r,g,b.  Android needs #rrggbb.
	    $color = convert_color($style);
	    if (is_iphone() && strlen($color) == 7) {
		$r = hexdec(substr($color, 1, 2));
		$g = hexdec(substr($color, 3, 2));
		$b = hexdec(substr($color, 5, 2));
		$color = "$r,$g,$b";
	    } 
	    $navbg = $color;
	}

	$authenticated = false;
	$requires_authentication = false;
	$out = array();

	if (!$vals['username'] || (!$vals['password'] && !$vals['md5_password'])) {
	    if (!XenForo_Visitor::getInstance()->hasPermission('general', 'view')) {
		$requires_authentication = true;
	    }

	    $options = XenForo_Application::get('options');
	    if (!$options->boardActive && !XenForo_Visitor::getInstance()->get('is_admin')) {
		$requires_authentication = true;
	    }
	} else {
	    $user_id = $user_model->validateAuthentication($vals['username'], $vals['password'], $error);
	    if (!$user_id) {
		$login_model->logLoginAttempt($vals['username']);

		json_error($error->render(), RV_BAD_PASSWORD);
	    }

	    $login_model->clearLoginAttempts($vals['username']);
	    $user_model->setUserRememberCookie($user_id);

	    XenForo_Model_Ip::log($user_id, 'user', $user_id, 'login');

	    XenForo_Application::get('session')->changeUserId($user_id);
	    XenForo_Visitor::setup($user_id);

	    $out['username'] = prepare_utf8_string(XenForo_Visitor::getInstance()->get('username'));

	    $authenticated = true;
	}

	$out += array(
	    'authenticated' => $authenticated,
	    'v' => $fr_version,
	    'p' => $fr_platform,
	    'requires_authentication' => $requires_authentication,
	);

	if ($navbg != '') {
	    $out['navbg'] = $navbg;
	}

	if (is_iphone() && $options->forumrunnerAdsAdMobPublisherIDiPhone) {
	    $out['admob'] = $options->forumrunnerAdsAdMobPublisherIDiPhone;
	} else if (is_android() && $options->forumrunnerAdsAdMobPublisherIDAndroid) {
	    $out['admob'] = $options->forumrunnerAdsAdMobPublisherIDAndroid;
	}

	if ($options->forumrunnerGoogleAnalyticsID && $options->forumrunnerGoogleAnalyticsID != '') {
	    $out['gan'] = $options->forumrunnerGoogleAnalyticsID;
	}

	if ($options->forumrunnerFacebookApplicationID && $options->forumrunnerFacebookApplicationID != '') {
	    $out['fb'] = $options->forumrunnerFacebookApplicationID;
	}
        
        if ($options->forumrunnerRegistration) {
            $out['reg'] = true;
	}

	fr_update_push_user($vals['fr_username'], $vals['fr_b'], $vals['token']);

	return $out;
    }
    
    public function actionLogout ()
    {
	$fr_username = $this->_input->filterSingle('fr_username', XenForo_Input::STRING);

	if (XenForo_Visitor::getInstance()->get('is_admin')) {
	    $admin = new XenForo_Session(array('admin' => true));
	    $admin->start();
	    if ($admin->get('user_id') == XenForo_Visitor::getUserId()) {
		$admin->delete();
	    }
	}

        fr_remove_push_user();

	$this->getModelFromCache('XenForo_Model_Session')->processLastActivityUpdateForLogOut(XenForo_Visitor::getUserId());

	XenForo_Application::get('session')->delete();
	XenForo_Helper_Cookie::deleteAllCookies(
	    array('session'),
	    array('user' => array('httpOnly' => false))
	);

	XenForo_Visitor::setup(0);

	$requires_authentication = false;
	if (!XenForo_Visitor::getInstance()->hasPermission('general', 'view')) {
	    $requires_authentication = true;
	}
	$options = XenForo_Application::get('options');
	if (!$options->boardActive) {
	    $requires_authentication = true;
	}

	return array(
	    'success' => true,
	    'requires_authentication' => $requires_authentication,
	);
    }

    protected function _postDispatch($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf($action) {}
}
