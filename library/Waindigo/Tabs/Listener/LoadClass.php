<?php

class Waindigo_Tabs_Listener_LoadClass extends Waindigo_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'Waindigo_Tabs' => array(
                'controller' => array(
                    'XenForo_ControllerPublic_Thread',
                    'XenResource_ControllerPublic_Resource',
                    'Waindigo_FreeAgent_ControllerPublic_Project',
                    'XenForo_ControllerPublic_Conversation',
                    'XenGallery_ControllerPublic_Media',
                    'XenForo_ControllerPublic_Forum',
                    'XenProduct_ControllerPublic_Product'
                ), /* END 'controller' */
                'view' => array(
                    'XenResource_ViewPublic_Resource_View',
                    'XenForo_ViewPublic_Thread_View',
                    'XenForo_ViewPublic_Conversation_View',
                    'Waindigo_FreeAgent_ViewPublic_Project_View',
                    'XenGallery_ViewPublic_Media_View',
                    'XenForo_ViewPublic_Thread_Create',
                    'XenForo_ViewPublic_Conversation_Add',
                    'XenGallery_ViewPublic_Media_Add',
                    'XenResource_ViewPublic_Resource_Add',
                    'XenProduct_ViewPublic_Product_View'
                ), /* END 'view' */
                'datawriter' => array(
                    'XenForo_DataWriter_Discussion_Thread',
                    'XenResource_DataWriter_Resource',
                    'XenForo_DataWriter_AddOn',
                    'XenForo_DataWriter_ConversationMaster',
                    'XenGallery_DataWriter_Media',
                    'XenProduct_DataWriter_Product'
                ), /* END 'datawriter' */
            ), /* END 'Waindigo_Tabs' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassController($class, array &$extend)
    {
        $extend = self::createAndRun('Waindigo_Tabs_Listener_LoadClass', $class, $extend, 'controller');
    } /* END loadClassController */

    public static function loadClassView($class, array &$extend)
    {
        $extend = self::createAndRun('Waindigo_Tabs_Listener_LoadClass', $class, $extend, 'view');
    } /* END loadClassView */

    public static function loadClassDataWriter($class, array &$extend)
    {
        $extend = self::createAndRun('Waindigo_Tabs_Listener_LoadClass', $class, $extend, 'datawriter');
    } /* END loadClassDataWriter */
}