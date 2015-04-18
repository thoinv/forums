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

class sonnb_LiveThread_Install
{

    protected $_db;

    protected function _getDb()
    {
        if($this->_db === null)
        {
            $this->_db = XenForo_Application::getDb();
        }

        return $this->_db;
    }

    public static function install($existingAddOn, $addOnData)
    {
        $install = new self();

        if(!$existingAddOn)
        {
            return $install->_installClean();
        }
        
        if($existingAddOn['version_string'] == $addOnData['version_string'])
        {
            return;
        }

        switch($existingAddOn['version_string'])
        {
            case '1.0.0':
            case '1.0.1':
            case '1.0.2':
            case '1.1.0':
            case '1.1.1':
            case '1.1.2':
                return $install->_install_113();
                break;
        }
    }
    
    protected function _install_113()
    {
        $sql_alter_thread = "ALTER TABLE  `xf_thread`
                                    CHANGE  `sonnb_live_thread` `sonnb_live_thread` TINYINT(3) NOT NULL DEFAULT 0";
        
        $this->_getDb()->beginTransaction();
        $this->_getDb()->query($sql_alter_thread);
        $this->_getDb()->commit();
    }

    protected function _installClean()
    {
        $sql_alter_thread = "ALTER TABLE  `xf_thread` 
                                    ADD  `sonnb_live_thread` TINYINT(3) NOT NULL DEFAULT 0";

        $this->_getDb()->beginTransaction();
        $this->_getDb()->query($sql_alter_thread);
        $this->_getDb()->commit();
    }

    public static function uninstall($existingAddOn)
    {
        if(!$existingAddOn)
        {
            return;
        }

        $uninstall = new self();

        $sql_alter_thread = "ALTER TABLE `xf_thread` DROP `sonnb_live_thread`;";

        $uninstall->_getDb()->beginTransaction();
        $uninstall->_getDb()->query($sql_alter_thread);
        $uninstall->_getDb()->commit();
    }

}