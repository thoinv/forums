<?php
/**
 * @title Portal Carousel
 * @package WidgetPortal
 */

class WidgetPortal_WidgetRenderer_Carousel extends WidgetFramework_WidgetRenderer
{
    protected function _getConfiguration()
    {
        return array(
            'name' => '[Portal] Carousel',
            'options' => array(
                'forums' => XenForo_Input::ARRAY_SIMPLE,
            ),
            'useWrapper' => false,
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
        return 'widgetportal_widget_carousel_options';
    }

    /**
     * Renders the options template with added variables.
     * Pulls the forum list for the carousel
     * @param XenForo_Template_Abstract $template
     */
    protected function _renderOptions( XenForo_Template_Abstract $template )
    {
        $params = $template->getParams();

        $forums = $this->_helperPrepareForumsOption(
            empty( $params['options']['forums'] ) ? array( 0 => 0 ) : $params['options']['forums']
        );

        $template->setParam( 'forums', $forums );
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
        return 'widgetportal_widget_carousel';
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
        $carouselModel = $this->_getCarouselModel();

        // Get posts and attachments.
        $posts = $carouselModel->getThreadAndPostDataFromWidgetId( $widget['widget_id'], 0 );

        $renderTemplateObject->setParam( 'posts', $posts );
        $renderTemplateObject->setParam( 'widget_id', $widget['widget_id'] );

        return $renderTemplateObject->render();
    }

    /**
     * Outputs forum list formatted with depth and categories.
     * @param $selected
     * @return array
     */
    protected function _helperPrepareForumsOption( $selected )
    {
        return XenForo_Option_NodeChooser::getNodeOptions(
            $selected,
            sprintf( '(%s)', new XenForo_Phrase( 'unspecified' ) ),
            'Forum'
        );
    }

    /**
     * Returns the post model
     * @return XenForo_Model_Post
     */
    protected function _getPostModel()
    {
        $core = WidgetFramework_Core::getInstance();
        return $core->getModelFromCache( 'XenForo_Model_Post' );
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

}