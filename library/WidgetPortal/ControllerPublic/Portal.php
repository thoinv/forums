<?php
/**
 * @title Widget Portal Public Controller
 * @package WidgetPortal
 * @license BSD
 */

class WidgetPortal_ControllerPublic_Portal extends XenForo_ControllerPublic_Abstract
{

    public function actionIndex()
    {
        $this->canonicalizeRequestUrl(XenForo_Link::buildPublicLink('home'));

        $options = XenForo_Application::get('options');

        $viewParams = array(
            'page' => max( 1, $this->_input->filterSingle('page', XenForo_Input::UINT) ),
        );

        return $this->responseView('WidgetPortal_ViewPublic_Portal', 'widgetportal_portal', $viewParams);
    }

    public function actionEdit()
    {
        // Forward to home-widget.
        return $this->responseRedirect(
            XenForo_ControllerResponse_Redirect::SUCCESS,
            XenForo_Link::buildPublicLink('home-widget'),
            array()
        );
    }

    /**
     * Returns the portal model
     * @return WidgetPortal_Model_Portal
     */
    protected function _getPortalModel()
    {
        $core = WidgetFramework_Core::getInstance();
        return $core->getModelFromCache('WidgetPortal_Model_Portal');
    }
}