<?php
/**
 * @title Widget Portal Route PrefixPublic Thread
 * @package Widget Portal
 */

class WidgetPortal_Route_PrefixPublic_Thread extends XFCP_WidgetPortal_Route_PrefixPublic_Thread
{
    public function buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams )
    {
        if ( !empty( $data['format'] ) )
        {
            $extraParams['format'] = $data['format'];
        }

        return parent::buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, $extraParams );
    }
}