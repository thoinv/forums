<?php
/**
 * @title Portal Carousel
 * @package WidgetPortal
 */

class WidgetPortal_WidgetRenderer_PortalFrontendEdit extends WidgetFramework_WidgetRenderer
{
    protected function _getConfiguration()
    {
        return array(
            'name' => '[Portal] Frontend Configuration',
            'useCache' => true,
            'useUserCache' => true,
            'cacheSeconds' => 300, // cache for 5 minutes
        );
    }

    /**
     * Outputs admin template when this widget is selected.
     * @return string
     */
    protected function _getOptionsTemplate()
    {
        return '';
    }

    /**
     * Display public template for rendering the widget
     * @param array $widget
     * @param string $positionCode
     * @param array $params
     * @return string
     */
    protected function _getRenderTemplate( array $widget, $positionCode, array $params )
    {
        return 'widgetportal_widget_portalFrontendEdit';
    }

    /**
     * Renders the widget.
     * Add variables to the template obj: $renderTemplateObject->setParam('users', $users);
     * @param array $widget
     * @param string $positionCode
     * @param array $params
     * @param XenForo_Template_Abstract $renderTemplateObject
     * @return string
     */
    protected function _render( array $widget, $positionCode, array $params, XenForo_Template_Abstract $renderTemplateObject )
    {
        /* Widget Info */
        $widgets = array();
        /* Carousel Info */
        if( $canEditCarousel =  WidgetPortal_Helper_Permission_Carousel::canEditCarousel() )
        {
            $widgetModel = $this->_getWidgetModel();
            $widgets['carousel'] = $widgetModel->getAllFrontendEditableWidgets();
        }

        /* TODO add future editable widgets here */

        /* Permissions */
        $renderTemplateObject->setParam( 'canEditCarousel', $canEditCarousel);

        $renderTemplateObject->setParam( 'widgets', $widgets );

        return $renderTemplateObject->render();
    }

    /**
     * Returns the carousel model
     * @return WidgetPortal_Model_Widget_Carousel
     */
    protected function _getCarouselModel()
    {
        $core = WidgetFramework_Core::getInstance();
        return $core->getModelFromCache( 'WidgetPortal_Model_Widget_Carousel' );
    }

    /**
     * @return WidgetPortal_Model_Widget
     */
    protected function _getWidgetModel()
    {
        $core = WidgetFramework_Core::getInstance();
        return $core->getModelFromCache( 'WidgetPortal_Model_Widget' );
    }

}