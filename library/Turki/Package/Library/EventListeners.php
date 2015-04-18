<?php
/**
 * Created by Turkialawlqy.
 * Web Site: http://www.xf-ar.com
 * Email: turkialawlqy@gmail.com
 * Date: 12/10/2014
 * Time: 08:55 ص
 */

class Turki_Package_Library_EventListeners
{
    protected static $_copyrightNotice = '<div id="xfarcomCopyrightNotice" class="footerLegal" style="clear: both; direction: ltr;"><div class="pageContent"><span class="muted"><a href="http://xf-ar.com/" class="concealed">XenForo add-ons by :: xF-Ar Forum ::</a></span></div></div>';
    protected static $_setCopyright = null;

    protected static function _templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        switch ($hookName) {
            case 'footer_after_copyright':
                if(self::$_copyrightNotice && self::$_setCopyright===null){
                    $contents = $contents.self::$_copyrightNotice;
                    self::$_setCopyright = true;
                }
                break;
        }
    }
}