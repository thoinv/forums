<?php
class WidgetPortal_DataWriter_Helper_Carousel extends WidgetFramework_DataWriter_Helper_Widget
{
    public static function verifyWidgetId( $id, XenForo_DataWriter $dw, $fieldName = false )
    {
        $portalModel = XenForo_Model::create( 'WidgetPortal_Model_Portal' );
        $portalModel->validWidgetIdOrError( $id );

        return true;
    }

    public static function verifyThreadId( $id, XenForo_DataWriter $dw, $fieldName = false )
    {
        $portalModel = XenForo_Model::create( 'WidgetPortal_Model_Portal' );
        $portalModel->validThreadIdOrError( $id );

        return true;
    }

    public static function verifyAttachmentId( $id, XenForo_DataWriter $dw, $fieldName = false )
    {
        $portalModel = XenForo_Model::create( 'WidgetPortal_Model_Portal' );
        $portalModel->validAttachmentIdOrError( $id );

        return true;
    }
}
