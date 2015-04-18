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

class ForumRunner_ControllerPublic_Register extends XenForo_ControllerPublic_Register
{

    public function actionRegister ()
    {
        $this->_assertRegistrationActive();

        $vals = $this->_input->filter(array(
            'username' => XenForo_Input::STRING,
            'email' => XenForo_Input::STRING,
            'password' => XenForo_Input::STRING,
            'password_md5' => XenForo_Input::STRING,
            'birthday' => XenForo_Input::STRING,
            'timezone_name' => XenForo_Input::STRING,
        ));

        $options = XenForo_Application::get('options');
        if (!$options->forumrunnerRegistration) {
            $p = new XenForo_Phrase('do_not_have_permission');
            json_error($p->render());
        }

        $out = array();
        if ($vals['username']) {
            $writer = XenForo_DataWriter::create('XenForo_DataWriter_User');
            if ($options->registrationDefaults) {
                $writer->bulkSet($options->registrationDefaults, array('ignoreInvalidFields' => true));
            }

            $day = $month = $year = '';
            if ($vals['birthday']) {
                $parts = preg_split('#/#', $vals['birthday']);
                if ($parts[0]) {
                    $month = intval($parts[0]);
                }
                if ($parts[1]) {
                    $day = intval($parts[1]);
                }
                if ($parts[2]) {
                    $year = intval($parts[2]);
                }
            }

            // Figure out Time Zone
            $data = array(
                'username' => $vals['username'],
                'email' => $vals['email'],
                'gender' => '', // maybe later RKJ
                'dob_day' => $day,
                'dob_month' => $month,
                'dob_year' => $year,
                'timezone' => $vals['timezone_name'],
            );

            $writer->bulkSet($data);
            $writer->setPassword($vals['password'], $vals['password']); // verified by client

            // if the email corresponds to an existing Gravatar, use it
            if ($options->gravatarEnable && XenForo_Model_Avatar::gravatarExists($data['email'])) {
                $writer->set('gravatar', $data['email']);
            }

            $writer->set('user_group_id', XenForo_Model_User::$defaultRegisteredGroupId);
            $writer->set('language_id', XenForo_Visitor::getInstance()->get('language_id'));
            $writer->advanceRegistrationUserState();
            $writer->preSave();

            if ($options->get('registrationSetup', 'requireDob')) {
                // dob required
                if (!$data['dob_day'] || !$data['dob_month'] || !$data['dob_year']) {
                    $p = new XenForo_Phrase('please_enter_valid_date_of_birth');
                    json_error($p->render());
                }

                $userAge = $this->_getUserProfileModel()->getUserAge($writer->getMergedData(), true);
                if ($userAge < 1) {
                    $p = new XenForo_Phrase('please_enter_valid_date_of_birth');
                    json_error($p->render());
                }
                if ($userAge < intval($options->get('registrationSetup', 'minimumAge'))) {
                    $p = new XenForo_Phrase('sorry_you_too_young_to_create_an_account');
                    json_error($p->render());
                }
            }

            $errors = $writer->getErrors();
            if (count($errors)) {
                // only show first
                $errors = array_values($errors);
                json_error($errors[0]->render());
            }

            $writer->save();

            $user = $writer->getMergedData();

            // log the ip of the user registering
            XenForo_Model_Ip::log($user['user_id'], 'user', $user['user_id'], 'register');

            if ($user['user_state'] == 'email_confirm') {
                $this->_getUserConfirmationModel()->sendEmailConfirmation($user);
                $out['emailverify'] = true;
            } else {
                $out['emailverify'] = false;
            }

            XenForo_Visitor::setup(0);
        } else {
            $p = new XenForo_Phrase('fr_register_forum_rules');

            $out += array(
                'rules' => preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $p->render()),
                'birthday' => ($options->get('registrationSetup', 'requireDob') ? true : false),
            );
        }

        return $out;
    }

    protected function _postDispatch ($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf ($action) {}
}
