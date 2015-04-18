<?php

class Waindigo_UserBanners_Listener_LoadClass extends Waindigo_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'Waindigo_UserBanners' => array(
                'model' => array(
                    'XenForo_Model_UserGroup'
                ), /* END 'model' */
                'controller' => array(
                    'XenForo_ControllerAdmin_UserGroup'
                ), /* END 'controller' */
                'datawriter' => array(
                    'XenForo_DataWriter_UserGroup'
                ), /* END 'datawriter' */
            ), /* END 'Waindigo_UserBanners' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new Waindigo_UserBanners_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new Waindigo_UserBanners_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */

    public static function loadClassDataWriter($class, array &$extend)
    {
        $loadClassDataWriter = new Waindigo_UserBanners_Listener_LoadClass($class, $extend, 'datawriter');
        $extend = $loadClassDataWriter->run();
    } /* END loadClassDataWriter */
}