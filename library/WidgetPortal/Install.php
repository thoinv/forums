<?php
/**
 * Widget Portal
 * Portal for XenForo using [bd] Widget Framework
 * License: BSD
 */

class WidgetPortal_Install
{
    public static function install()
    {
        $db = XenForo_Application::get('db');

        $db->query("
			CREATE TABLE IF NOT EXISTS `widgetportal_widget_carousel` (
              `carousel_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `widget_id` int(11) NOT NULL,
              `thread_id` int(11) NOT NULL,
              `attachment_id` int(11) NOT NULL,
              `order` int(2) NOT NULL,
              PRIMARY KEY (`carousel_id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
		");
    }

    public static function uninstall()
    {
        $db = XenForo_Application::get('db');

        // Remove widget tables
        $db->query("DROP TABLE IF EXISTS `widgetportal_widget_carousel`");

        // Remove widgets in portal positions
        self::removePortalWidgets();
    }

    protected static function removePortalWidgets()
    {
        $portalModel = new WidgetPortal_Model_Portal();
        $templates = $portalModel->getPortalWidgetPositions();

        $db = XenForo_Application::get('db');
        $db->query("DELETE FROM xf_widget WHERE position IN (" . $db->quote($templates) . ")");
    }
}