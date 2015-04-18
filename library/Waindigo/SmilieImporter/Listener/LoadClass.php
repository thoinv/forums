<?php

class Waindigo_SmilieImporter_Listener_LoadClass extends Waindigo_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'Waindigo_SmilieImporter' => array(
                'controller' => array(
                    'XenForo_ControllerAdmin_Smilie'
                ), /* END 'controller' */
                'model' => array(
                    'XenForo_Model_Smilie'
                ), /* END 'model' */
            ), /* END 'Waindigo_SmilieImporter' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new Waindigo_SmilieImporter_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new Waindigo_SmilieImporter_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */
}