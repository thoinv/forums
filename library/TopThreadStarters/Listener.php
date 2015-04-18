<?php
/*!
 * Product version 1.0.4 
 * Top Thread Starters 
 * @Author Eaglebunker 
 * Copyright (c) 2013 - All rights reserved.
*/
class TopThreadStarters_Listener
{
    public static function extendControllers($class, &$extend)
    {
        if ($class == 'XenForo_ControllerPublic_Forum')
        {
            $extend[] = 'TopThreadStarters_ControllerPublic_TopThreadStarters';
        }
    }
}