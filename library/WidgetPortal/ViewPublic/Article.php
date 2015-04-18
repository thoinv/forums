<?php
/**
 * @title Widget Portal View Public Article
 * @package Widget Portal
 */

class WidgetPortal_ViewPublic_Article extends XenForo_ViewPublic_Thread_View
{
    public function renderHtml()
    {
        $response = parent::renderHtml();

        if ( !empty( $this->_params['thread']['first_post_id'] ) )
        {
            $this->_params['posts'][$this->_params['thread']['first_post_id']]['attachments'] = false;
            $this->_params['posts'][$this->_params['thread']['first_post_id']]['signature'] = false;
        }
    }
}