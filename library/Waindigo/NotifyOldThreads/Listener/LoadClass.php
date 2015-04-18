<?php

class Waindigo_NotifyOldThreads_Listener_LoadClass extends Waindigo_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'Waindigo_NotifyOldThreads' => array(
                'model' => array(
                    'XenForo_Model_Thread'
                ), /* END 'model' */
            ), /* END 'Waindigo_NotifyOldThreads' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new Waindigo_NotifyOldThreads_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */
}