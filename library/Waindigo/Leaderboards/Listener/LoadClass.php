<?php

class Waindigo_Leaderboards_Listener_LoadClass extends Waindigo_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'Waindigo_Leaderboards' => array(
                'controller' => array(
                    'XenForo_ControllerPublic_Member'
                ), /* END 'controller' */
            ), /* END 'Waindigo_Leaderboards' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassController($class, array &$extend)
    {
        $extend = self::createAndRun('Waindigo_Leaderboards_Listener_LoadClass', $class, $extend, 'controller');
    } /* END loadClassController */
}