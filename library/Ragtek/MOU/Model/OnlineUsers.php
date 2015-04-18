<?php
/*======================================================================*\
|| #################################################################### ||
|| # Most Online User  1.2
|| # Build: 8
|| # ---------------------------------------------------------------- # ||
|| #################################################################### ||
\*======================================================================*/


    class Ragtek_MOU_Model_OnlineUsers extends XenForo_Model_Session
    {

        const CACHE_KEY = 'ragtek_MOU';

        /**
         * @return array (mostUsers / time)
         */
        public function checkAndUpdate()
        {
            $visitor = XenForo_Visitor::getInstance();

            $onlineUsers = $this->getSessionActivityQuickList(
                $visitor->toArray(),
                array('cutOff' => array('>', $this->getOnlineStatusTimeout())),
                ($visitor['user_id'] ? $visitor->toArray() : null)
            );
            $currentUsers = $onlineUsers['total'];


            list($timeWithMostUsers, $cachedValue) = $this->_getFromCache();

            if ($cachedValue < $currentUsers) {

                $this->_set($currentUsers);
                return array($currentUsers, XenForo_Application::$time);
            }
            return array($cachedValue, $timeWithMostUsers);
        }

        /**
         * reset the record to 0
         */
        public function reset()
        {
            $this->_set(0);
        }


        protected function _set($users, $time = null)
        {
            if ($time == NULL) {
                $time = XenForo_Application::$time;
            }
            XenForo_Application::setSimpleCacheData(self::CACHE_KEY, array($time, $users));
        }

        protected function _getFromCache()
        {
            list($cachedValue, $time) = XenForo_Application::getSimpleCacheData(self::CACHE_KEY);
            if (!$cachedValue) {
                return array(0, 0);
            }
            else {
                return array($cachedValue, $time);
            }
        }
    }
 
