<?php

class Waindigo_UserBanners_Install_Controller extends Waindigo_Install
{

    protected $_resourceManagerUrl = 'http://xenforo.com/community/resources/user-banners-by-waindigo.3152/';

    protected $_minVersionId = 1020000;

    protected $_minVersionString = '1.2.0';

    protected function _getTableChanges()
    {
        return array(
        	'xf_user_group' => array(
        	   'banner_description_waindigo' => 'VARCHAR(255) NOT NULL DEFAULT \'\'', /* END 'banner_description_waindigo' */
            ), /* END 'xf_user_group' */
        );
    } /* END _getTableChanges */
}