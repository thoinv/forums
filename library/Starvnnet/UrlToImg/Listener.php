<?php
class Starvnnet_UrlToImg_Listener
{
	    public static function formatter($class, array &$extend)
    {
        if ($class == 'XenForo_BbCode_Formatter_Base')
        {
            $extend[] = 'Starvnnet_UrlToImg_BBcode';
        }
    }
	
}