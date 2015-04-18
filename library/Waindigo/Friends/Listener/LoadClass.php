<?php

class Waindigo_Friends_Listener_LoadClass extends Waindigo_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'Waindigo_Friends' => array(
                'controller' => array(
                    'XenForo_ControllerPublic_Member'
                ), 
                'datawriter' => array(
                    'XenForo_DataWriter_User'
                ), 
                'model' => array(
                    'XenForo_Model_User'
                ), 
                'deferred' => array(
                    'XenForo_Deferred_User'
                ), 
            ), 
        );
    }

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new Waindigo_Friends_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    }

    public static function loadClassDataWriter($class, array &$extend)
    {
        $loadClassDataWriter = new Waindigo_Friends_Listener_LoadClass($class, $extend, 'datawriter');
        $extend = $loadClassDataWriter->run();
    }

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new Waindigo_Friends_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    }

    public static function loadClassDeferred($class, array &$extend)
    {
        $loadClassDeferred = new Waindigo_Friends_Listener_LoadClass($class, $extend, 'deferred');
        $extend = $loadClassDeferred->run();
    }
}