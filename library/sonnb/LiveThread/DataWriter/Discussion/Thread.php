<?php
/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

class sonnb_LiveThread_DataWriter_Discussion_Thread extends XFCP_sonnb_LiveThread_DataWriter_Discussion_Thread
{
    protected function _getFields()
    {
        $fields = parent::_getFields();
        $fields['xf_thread']['sonnb_live_thread'] = array(
            'type' => self::TYPE_UINT, 
            'default' => 0
        );
        
        return $fields;
    }
    
    protected function _discussionPreSave()
    {
        if (isset($GLOBALS[sonnb_LiveThread_Listener::SONNB_LIVETHREAD_LIVE_SWITCH]))
        {
            $this->set('sonnb_live_thread', $GLOBALS[sonnb_LiveThread_Listener::SONNB_LIVETHREAD_LIVE_SWITCH]);
            unset($GLOBALS[sonnb_LiveThread_Listener::SONNB_LIVETHREAD_LIVE_SWITCH]);
        }

        parent::_discussionPreSave();
    }
}

?>
