<?php

class Waindigo_JokePoll_Listener_LoadClass extends Waindigo_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'Waindigo_JokePoll' => array(
                'controller' => array(
                    'XenForo_ControllerPublic_Forum',
                    'XenForo_ControllerPublic_Thread'
                ), /* END 'controller' */
                'datawriter' => array(
                    'XenForo_DataWriter_Discussion_Thread',
                    'XenForo_DataWriter_Poll'
                ), /* END 'datawriter' */
                'model' => array(
                    'XenForo_Model_Forum',
                    'XenForo_Model_Poll'
                ), /* END 'model' */
            ), /* END 'Waindigo_JokePoll' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new Waindigo_JokePoll_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */

    public static function loadClassDataWriter($class, array &$extend)
    {
        $loadClassDataWriter = new Waindigo_JokePoll_Listener_LoadClass($class, $extend, 'datawriter');
        $extend = $loadClassDataWriter->run();
    } /* END loadClassDataWriter */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new Waindigo_JokePoll_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */
}