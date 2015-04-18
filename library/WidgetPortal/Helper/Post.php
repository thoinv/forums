<?php

class WidgetPortal_Helper_Post
{
    public static function helperPreparePostDataForDisplay( $posts )
    {
        $bbCodeFormatter = XenForo_BbCode_Formatter_Base::create( 'Base' );
        $bbCodeParser = new XenForo_BbCode_Parser( $bbCodeFormatter );
        $bbCodeOptions = array( 'states' => array( 'viewAttachments' => true ) );
        XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages( $posts, $bbCodeParser, $bbCodeOptions );


        foreach( $posts AS &$message )
        {
            $bbCodeParser = new XenForo_BbCode_Parser( XenForo_BbCode_Formatter_Base::create( 'XenForo_BbCode_Formatter_Text' ) );
            $message['messageText'] = $bbCodeParser->render( str_ireplace( '\n', ' ', $message['message'] ) );
            $message['messageText'] = str_ireplace( "\n", " ", $message['messageText'] );
        }

        return $posts;

    }
}