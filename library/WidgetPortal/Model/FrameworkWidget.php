<?php

class WidgetPortal_Model_FrameworkWidget extends WidgetFramework_Model_Widget
{
    public function getWidgetsByPosition( $position = WidgetPortal_Model_Portal::WIDGET_PORTAL_TEMPLATE, $prepare = true )
    {
            $widgets = $this->fetchAllKeyed("
				SELECT *
				FROM `xf_widget`
				WHERE position = ?
				ORDER BY display_order ASC
			", 'widget_id', $position);


        /* prepare information for widgets */
        if ( $prepare )
        {
            foreach ( $widgets as &$widget )
            {
                $this->_prepare($widget);
            }
        }

        return $widgets;
    }
}