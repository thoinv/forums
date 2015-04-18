<?php

/**
 *
 * @see XenForo_ControllerPublic_Member
 */
class Waindigo_Friends_Extend_XenForo_ControllerPublic_Member extends XFCP_Waindigo_Friends_Extend_XenForo_ControllerPublic_Member
{

    /**
     *
     * @see XenForo_ControllerPublic_Member::actionMember()
     */
    public function actionMember()
    {
        $response = parent::actionMember();

        if ($response instanceof XenForo_ControllerResponse_View) {
            $xenOptions = XenForo_Application::get('options');

            /* @var $userModel XenForo_Model_User */
            $userModel = $this->_getUserModel();

            $fetchOptions = array(
                'join' => XenForo_Model_User::FETCH_USER_PROFILE,
                'order' => 'RAND()',
                'limit' => 6
            );

            $friendUserIds = $response->params['user']['friends'];
            if ($friendUserIds) {
                $friendUserIds = explode(',', $friendUserIds);
                $response->params['friends'] = $userModel->getUsersByIds($friendUserIds, $fetchOptions);
                $response->params['friendsCount'] = count($friendUserIds);
            }

            $visitor = XenForo_Visitor::getInstance();

            if ($xenOptions->waindigo_friends_mutualFriends && $visitor['user_id'] != $response->params['user']['user_id']) {
                $mutualFriendUserIds = $response->params['user']['mutual_friends_' . $visitor['user_id']];
                if ($mutualFriendUserIds) {
                    $mutualFriendUserIds = explode(',', $mutualFriendUserIds);
                    $response->params['mutualFriends'] = $userModel->getUsersByIds($mutualFriendUserIds, $fetchOptions);
                    $response->params['mutualFriendsCount'] = count($mutualFriendUserIds);
                }
            }

            $friendRecord = $this->_getUserModel()->getFriendRecord($response->params['user']['user_id']);
            if (isset($friendRecord['friend_state'])) {
                $response->params['friend_record'] = $friendRecord;
            }
        }

        return $response;
    }

    /**
     *
     * @see XenForo_ControllerPublic_Member::actionCard()
     */
    public function actionCard()
    {
        /* @var $response XenForo_ControllerResponse_View */
        $response = parent::actionCard();

        if ($response instanceof XenForo_ControllerResponse_View) {
            $friendRecord = $this->_getUserModel()->getFriendRecord($response->params['user']['user_id']);
            if (isset($friendRecord['friend_state'])) {
                $response->params['friend_record'] = $friendRecord;
            }
        }

        return $response;
    }

    /**
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionFriends()
    {
        $userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
        $user = $this->getHelper('UserProfile')->assertUserProfileValidAndViewable($userId);

        /* @var $userModel XenForo_Model_User */
        $userModel = $this->_getUserModel();

        $friendsUserIds = explode(',', $user['friends']);

        $viewParams = array(
            'user' => $user,
            'friends' => $userModel->getUsersByIds($friendsUserIds,
                array(
                    'join' => XenForo_Model_User::FETCH_USER_PROFILE | XenForo_Model_User::FETCH_USER_OPTION
                ))
        );

        return $this->responseView('Waindigo_Friends_ViewPublic_Member_Friends', 'waindigo_member_friends_friends',
            $viewParams);
    }

    /**
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionMutualFriends()
    {
        $userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
        $user = $this->getHelper('UserProfile')->assertUserProfileValidAndViewable($userId);

        $userModel = $this->_getUserModel();

        $visitor = XenForo_Visitor::getInstance();

        $friendsUserIds = explode(',', $user['mutual_friends_' . $visitor['user_id']]);

        $viewParams = array(
            'user' => $user,
            'friends' => $userModel->getUsersByIds($friendsUserIds,
                array(
                    'join' => XenForo_Model_User::FETCH_USER_PROFILE | XenForo_Model_User::FETCH_USER_OPTION
                ))
        );

        return $this->responseView('Waindigo_Friends_ViewPublic_Member_MutualFriends',
            'waindigo_member_mutual_friends_friends', $viewParams);
    }

    /**
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionFriend()
    {
        $this->_assertRegistrationRequired();

        $userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
        $message = $this->_input->filterSingle('message', XenForo_Input::STRING);
        $knowPersonally = $this->_input->filterSingle('know_personally', XenForo_Input::UINT);

        if (!$user = $this->_getUserModel()->getUserById($userId,
            array(
                'join' => XenForo_Model_User::FETCH_USER_OPTION
            ))) {
            return $this->responseError(new XenForo_Phrase('requested_member_not_found'), 404);
        }

        $visitor = XenForo_Visitor::getInstance();

        $options = XenForo_Application::get('options');

        if (!$this->_getUserModel()->isFollowing($userId) && $options->waindigo_friends_requireFollow) {
            return $this->responseError(new XenForo_Phrase('waindigo_you_must_be_following_before_friend'));
        }

        if ($this->isConfirmedPost()) {
            $this->_getUserModel()->friend($user, null, $message, $knowPersonally);

            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildPublicLink('members', $user));
        } else {
            $friend = $this->_getUserModel()->getFriendRecord($userId);
            $viewParams = array(
                'user' => $user,
                'friend' => $friend
            );

            return $this->responseView('Waindigo_Friends_ViewPublic_Member_Friend', 'waindigo_member_friend_friend',
                $viewParams);
        }
    }

    /**
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionUnfriend()
    {
        $this->_assertRegistrationRequired();

        $userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);

        if (!$user = $this->_getUserModel()->getUserById($userId)) {
            return $this->responseError(new XenForo_Phrase('requested_member_not_found'), 404);
        }

        $visitor = XenForo_Visitor::getInstance();

        if ($this->isConfirmedPost()) {
            $this->_getUserModel()->unfriend($userId);

            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildPublicLink('members', $user));
        } else {
            $viewParams = array(
                'user' => $user
            );

            return $this->responseView('Waindigo_Friend_ViewPublic_Member_Unfriend', 'waindigo_member_unfriend_friend',
                $viewParams);
        }
    }
}