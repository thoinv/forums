<?php

class Waindigo_KeywordReplace_Listener_LoadClass extends Waindigo_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'Waindigo_KeywordReplace' => array(
                'bb_code' => array(
                    'XenForo_BbCode_Formatter_Base'
                ), /* END 'bb_code' */
            ), /* END 'Waindigo_KeywordReplace' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassBbCode($class, array &$extend)
    {
        $loadClassBbCode = new Waindigo_KeywordReplace_Listener_LoadClass($class, $extend, 'bb_code');
        $extend = $loadClassBbCode->run();
    } /* END loadClassBbCode */
}