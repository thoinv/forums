<?php

class Waindigo_Friends_Deferred_MutualFriend extends XenForo_Deferred_Abstract
{

    public function execute(array $deferred, array $data, $targetRunTime, &$status)
    {
        $data = array_merge(
            array(
                'userId' => 0,
                'startUser' => 0,
                'startFriendUser' => 0,
                'position' => 0,
                'mapped' => false
            ), $data);

        /* @var $userModel XenForo_Model_User */
        $userModel = XenForo_Model::create('XenForo_Model_User');

        $maxExec = $targetRunTime;

        $actionPhrase = new XenForo_Phrase('rebuilding');
        $typePhrase = new XenForo_Phrase('waindigo_mutual_friends_friends');
        $status = sprintf('%s... %s %s', $actionPhrase, $typePhrase, str_repeat(' . ', $data['position']));

        if (!$targetRunTime || $maxExec > 1) {
            if ($data['userId']) {
                $result = $userModel->rebuildMutualFriendsCache($maxExec, $data['userId'], $data['startFriendUser']);
            } else {
                $result = $userModel->rebuildMutualFriendsCaches($maxExec, $data['startUser'], $data['startFriendUser']);
            }
        } else {
            $result = false;
        }

        if ($result === true) {
            return true;
        } else {
            if ($result) {
                $data['startUser'] = $result[0];
                $data['startFriendUser'] = $result[1];
            }
            $data['position']++;

            return $data;
        }
    }
}