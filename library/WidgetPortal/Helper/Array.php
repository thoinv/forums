<?php
/**
 * @package WidgetPortal
 */

class WidgetPortal_Helper_Array
{
    /**
     * Checks to see if the given input is an array of arrays.
     * @static
     * @param $array
     * @return bool
     */
    public static function arrayOfArray( $array )
    {
        $arr = array_shift( $array );
        // Checks to see if first item of the array is an array.
        if( is_array( $arr ) )
        {
            // First item is we assume the rest are.
            return true;
        }
        else
        {
            // First item isn't, we assume the rest are not.
            return false;
        }
    }

    public  static function sortBySubArray( &$array )
    {
        uasort( $array, array( "WidgetPortal_Helper_Array", "compareByOrder" ) );
    }

    public static function compareByOrder( $a, $b )
    {
        return $a['order'] - $b['order'];
    }

    /**
     * Reorders the array starting from start or 0
     * @static
     * @param $array
     * @param $value
     * @param int $start
     */
    public static function reorderArray( &$array, $value, $start = 0 )
    {
        $i = $start;
        foreach( $array as &$arr )
        {
            $arr[ $value ] = $i;
            $i++;
        }
    }


}