<?php
class Ragtek_WHW_Model_OnlineUser extends XenForo_Model_User{

    public function getTodaysUsers(){

        $criteria = array(
            'last_activity' => array('>', $this->_getStartTime()),
            'user_state' => 'valid',
            'is_banned' => false
        );

        return $this->getUsers($criteria);
    }

    public function prepareUserConditions(array $conditions, array &$fetchOptions)
    {
        $return = parent::prepareUserConditions($conditions, $fetchOptions);

        if (!$this->canBypassUserPrivacy()){
            $return .= ' AND (user.visible = 1)';
        }
        return $return;
    }

    protected function _getStartTime(){
        $todayStart = XenForo_Locale::getDayStartTimestamps();
       return $todayStart['today'];
    }

    public  function  getWidgetTemplate(){
        return 'ragtek_todaysusers';
    }
}