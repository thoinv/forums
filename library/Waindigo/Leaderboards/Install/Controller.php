<?php

/**
 * Installer for Leaderboards by Waindigo.
 */
class Waindigo_Leaderboards_Install_Controller extends Waindigo_Install
{

    protected $_resourceManagerUrl = 'https://xenforo.com/community/resources/leaderboards-by-waindigo.3895/';

    protected $_minVersionId = 1020000;

    protected $_minVersionString = '1.2.0';

    /**
     * Gets the tables (with fields) to be created for this add-on.
     * See parent for explanation.
     *
     * @return array Format: [table name] => fields
     */
    protected function _getTables()
    {
        return array(
            'xf_user_leaderboard_waindigo' => array(
                'leaderboard_id' => 'int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY', /* END 'leaderboard_id' */
                'title' => 'varchar(255) NOT NULL', /* END 'title' */
                'order' => 'varchar(255) NOT NULL DEFAULT \'message_count\'', /* END 'order' */
                'user_criteria' => 'MEDIUMBLOB', /* END 'user_criteria' */
                'use_cached_value' => 'tinyint UNSIGNED NOT NULL DEFAULT 0', /* END 'use_cached_value' */
                'rebuild_frequency' => 'varchar(100) NOT NULL DEFAULT \'hourly\'', /* END 'rebuild_frequency' */
                'last_rebuild' => 'int UNSIGNED NOT NULL DEFAULT 0', /* END 'last_rebuild' */
            ), /* END 'xf_user_leaderboard_waindigo' */
            'xf_user_leaderboard_entry_waindigo' => array(
                'leaderboard_id' => 'int UNSIGNED NOT NULL', /* END 'leaderboard_id' */
                'user_id' => 'int UNSIGNED NOT NULL', /* END 'user_id' */
                'username' => 'varchar(255) NOT NULL DEFAULT \'\'', /* END 'username' */
                'entry' => 'int UNSIGNED NOT NULL', /* END 'entry' */
            ), /* END 'xf_user_leaderboard_entry_waindigo' */
        );
    } /* END _getTables */

    protected function _getUniqueKeys()
    {
        return array(
            'xf_user_leaderboard_entry_waindigo' => array(
                'leaderboard_id_user_id' => array(
                    'leaderboard_id',
                    'user_id'
                ), /* END 'leaderboard_id_user_id' */
            ), /* END 'xf_user_leaderboard_entry_waindigo' */
        );
    } /* END _getUniqueKeys */
}