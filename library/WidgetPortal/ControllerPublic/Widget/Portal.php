<?php
/**
 * @title Widget Portal Widgets Public Controller
 * @description Redirects the home-widget to home
 * @package WidgetPortal
 * @license BSD
 */

class WidgetPortal_ControllerPublic_Widget_Portal extends XenForo_ControllerPublic_Abstract
{
    public function actionIndex()
    {
        // Check edit permissions. If nothing returned there's no edit ability.
        $permissions = WidgetPortal_Helper_Permission_Permission::canEditPortalWidgets();
        if( empty( $permissions ) )
        {
            // Forward to home.
            return $this->responseRedirect(
                XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildPublicLink('home'),
                array()
            );
        }

        $widgets = array();

        if( in_array( 'canEditCarousel', $permissions ) )
        {
            $carouselModel = $this->_getCarouselModel();
            $widgets['carousel'] = $carouselModel->getCarouselItems(
                array(
                    'join' => WidgetPortal_Model_Widget_Carousel::FETCH_WIDGET,
                    'key' => WidgetPortal_Model_Widget_Carousel::FETCH_WIDGET,
                )
            );
        }

        return $this->responseView(
            'WidgetPortal_PublicView_Home_Widget',
            'widgetportal_home_widget',
            array(
                'permissions' => $permissions,
                'widgets' => $widgets,
            )
        );
    }


    /**
     * Returns the carousel model
     * @return WidgetPortal_Model_Widget_Carousel
     */
    protected function _getCarouselModel()
    {
        return $this->getModelFromCache('WidgetPortal_Model_Widget_Carousel');
    }
}