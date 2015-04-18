<?php
/**
 * @title Widget Carousel Public Controller
 * @package WidgetPortal
 * @license Modified BSD License
 */

class WidgetPortal_ControllerPublic_Widget_Carousel extends XenForo_ControllerPublic_Abstract
{
    /**
     *  Displays the edit page for the edit carousel overlay.
     * @throws XenForo_Exception
     * @return XenForo_ControllerResponse_View
     */
    public function actionEdit()
    {
        // Check that the current user has access to edit.
        $this->_verifyCanEditCarousel();

        // Check that the widget id exists
        $widgetModel = $this->_getWidgetModel();
        $widgetId = $this->_input->filterSingle('widget_id', XenForo_Input::UINT);
        $widget = $widgetModel->getWidgetById( $widgetId );
        // If there isn't a widget then throw error.
        if( empty( $widget ) )
        {
            throw new XenForo_Exception( new XenForo_Phrase('widgetportal_invalid_widget_id') );
        }

        // Get the current carousel items.
        $carouselModel = $this->_getCarouselModel();
        $items = $carouselModel->getThreadAndPostDataFromWidgetId( $widgetId, 0 );

        // Need to fake some data until xF allows non scalar values to be passed via template includes. http://bit.ly/PoWPta
        $items = $carouselModel->prepareItemsForDisplay( $items );

        $viewParams = array(
            'widget_id' => $widgetId,
            'carousel' => $items,
        );

        return $this->responseView(
            'WidgetPortal_ViewPublic_Carousel',
            'widgetportal_widget_carousel_edit',
            $viewParams
        );
    }

    public function actionSave()
    {
        // Check that the current user has access to edit.
        $this->_verifyCanEditCarousel();
        // Check that it's a post.
        $this->_assertPostOnly();

        // Input from save field.
        $input = $this->_input->filter(array(
            'widget_id' => XenForo_Input::UINT,
            'item' => XenForo_Input::ARRAY_SIMPLE,
        ));

        $carouselModel = $this->_getCarouselModel();
        $carouselModel->saveCarousel( $input['item'], $input['widget_id']);

        return $this->responseRedirect(
            XenForo_ControllerResponse_Redirect::SUCCESS,
            XenForo_Link::buildPublicLink('home')
        );
    }

    /**
     * Returns the item template for the edit page.
     * @return XenForo_ControllerResponse_View
     */
    public function actionAddCarouselItem()
    {
        // Check that the current user has access to edit.
        $this->_verifyCanEditCarousel();

        $counter = $this->_input->filterSingle('counter', XenForo_Input::UINT);
        // Item. Using 9000000 because I need a unique identifier for the array.
        // TODO pass the last in the array from JS. #nextversion
        $item = array(
            'carousel_id' => 9000000 + $counter,
        );

        return $this->responseView(
            'BuzzArtist_ViewPublic_AddCarouselItem',
            'widgetportal_widget_carousel_edit_item',
            array( 'item' => $item )
        );
    }

    public function actionDeleteCarouselItem()
    {
        // Check perms and is post request
        $this->_assertPostOnly();
        $this->_verifyCanEditCarousel();

        // Get input variables
        $input = $this->_input->filter(array(
            'widget_id' => XenForo_Input::UINT,
        ));

        // Delete audio data
        $audioModel = $this->_getCarouselModel();
        $audioModel->deleteCarouselById( $input['widget_id'] );

        return $this->responseView(
            'WidgetPortal_ViewPublic_CarouselItem',
            'widgetportal_widget_carousel_item',
            array()
        );

    }

    /* === Permissions === */

    /**
     * Checks the current user for the canEditCarousel permission and returns error if they don't.
     * @throws XenForo_ControllerResponse_Exception
     */
    protected function _verifyCanEditCarousel()
    {
        if( ! WidgetPortal_Helper_Permission_Carousel::canEditCarousel() )
        {
            throw $this->getNoPermissionResponseException();
        }
    }

    /* === Models === */

    /**
     * Returns the carousel model
     * @return WidgetPortal_Model_Widget_Carousel
     */
    protected function _getCarouselModel()
    {
        return $this->getModelFromCache('WidgetPortal_Model_Widget_Carousel');
    }
    /**
     * Returns the carousel model
     * @return WidgetFramework_Model_Widget
     */
    protected function _getWidgetModel()
    {
        return $this->getModelFromCache('WidgetFramework_Model_Widget');
    }
}