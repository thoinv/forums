<?php
class WidgetPortal_DataWriter_Helper_Widget extends WidgetFramework_DataWriter_Helper_Widget
{
	public static function verifyPosition( $position, XenForo_DataWriter $dw, $fieldName = false)
    {
		$portalModel = XenForo_Model::create('WidgetPortal_Model_Portal');
		$portalModel->validPositionSelectionOrError( $position );
		
		return true;
	}
}
