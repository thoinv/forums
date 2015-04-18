<?php

class WidgetPortal_Listener_NavTabs
{
    public static function listen( array &$extraTabs, $selectedTabId )
    {
        if ( XenForo_Application::get( 'options' )->widgetportal_shownavtab )
        {
            $home = XenForo_Application::get( 'options' )->widgetportal_shownavtabphrase;
            if( empty( $home ) )
            {
                $home = 'home';
            }

            $extraTabs['home'] = array(
                'title' => new XenForo_Phrase( $home ),
                'href' => XenForo_Link::buildPublicLink( 'full:home' ),
                'position' => 'home',
                'linksTemplate' => 'widgetportal_navtabs',
                'perms' => array(),
            );
        }
    }
}