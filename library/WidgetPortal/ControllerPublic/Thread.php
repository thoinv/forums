<?php

class WidgetPortal_ControllerPublic_Thread extends XFCP_WidgetPortal_ControllerPublic_Thread
{
    public function actionIndex()
    {
        $response = parent::actionIndex();
        $options = XenForo_Application::get( 'options' );
        $format = $this->_input->filterSingle( 'format', XenForo_Input::STRING );

        if( $format != 'default' )
        {
            // Checks to see if the response is a view and if in the selected forums.
            // TODO add check for promoted articles.
            if( $response instanceof XenForo_ControllerResponse_View
                && in_array( $response->params['forum']['node_id'],
                    $options->widgetportal_articleview_forumlist )
            )
            {
                // Returns the Article template
                return $this->responseView( 'XenForo_ViewPublic_Thread_View', 'widgetportal_article', $response->params );
            }
        }

        return $response;
    }
}