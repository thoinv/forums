<?php
/**
 * @title Widget Portal Helper Portal
 * @package Widget Portal
 */

/**
 * Resorts the renderer list so that Portal widgets are at the top.
 */
class WidgetPortal_Helper_Portal
{
    public static function convertRendererListForPortal( $list )
    {
        $renderers = array();

        foreach( $list as $key => $item )
        {
            $p = substr( $item['label'], 0, 8 );
            if( $p == '[Portal]' )
            {
                $renderers[] = $item;
                unset( $list[$key] );
            }
        }
        $renderers += $list;
        return $renderers;
    }
}