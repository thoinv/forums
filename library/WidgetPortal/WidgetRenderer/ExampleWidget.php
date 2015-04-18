<?php
class WidgetFramework_WidgetRenderer_ExampleWidget extends WidgetFramework_WidgetRenderer
{
    protected function _getConfiguration()
    {
        return array(
            'name' => 'Example Widget Name',
            'options' => array( /* Inputs from the options template */
                'subname' => XenForo_Input::STRING, /* Variable named subname, of the type string */
                'cutoff' => XenForo_Input::UINT, /* Variable named cutoff, of the type unsigned int */
                'size' => XenForo_Input::INT, /* Variable named cutoff, of the type int */
                'forums' => XenForo_Input::ARRAY_SIMPLE, /* Variable named forums, of the type array */
            ),
            'useCache' => true, // Output of this widget can be cached
            'useUserCache' => true, // Output should be cached by user permission (must have `useCache` enabled)
            'useLiveCache' => false, // Output will be cached with live cache only (bypass database completely)
            'cacheSeconds' => 0, // Cache older will be ignored, 0 means forever
            'useWrapper' => true, // Wraps the widget in sidebar html markup.
        );
    }

    /**
     * Template that will be used to display the options for the widget in the admin.
     * @return string
     */
    protected function _getOptionsTemplate()
    {
        return 'wf_widget_options_example_widget';
    }

    protected function _renderOptions( XenForo_Template_Abstract $template )
    {
        // Get previously selected options
        $params = $template->getParams();

        // Check if an option is set and selects it. Not all options need this.
        $forums = $this->_helperPrepareForumsOption( $params['options']['forums'] );

        $template->setParam( 'subname', $params['options']['subname'] );
        $template->setParam( 'cutoff', $params['options']['cutoff'] );
        $template->setParam( 'size', $params['options']['size'] );
        $template->setParam( 'forums', $forums );
    }

    protected function _validateOptionValue( $optionKey, &$optionValue )
    {
        if ( 'type' == $optionKey )
        {
            if ( !in_array( $optionValue, array( 'new', 'recent', 'popular', 'most_replied', 'most_liked', 'polls' ) ) )
            {
                throw new XenForo_Exception( new XenForo_Phrase( 'wf_widget_threads_invalid_type' ), true );
            }
        }
        elseif ( 'limit' == $optionKey )
        {
            if ( empty( $optionValue ) ) $optionValue = 5;
        }
        elseif ( 'cutoff' == $optionKey )
        {
            if ( empty( $optionValue ) ) $optionValue = 5;
        }

        return true;
    }

    protected function _getRenderTemplate( array $widget, $positionCode, array $params )
    {
        return 'wf_widget_example_widget';
    }

    protected function _render( array $widget, $positionCode, array $params, XenForo_Template_Abstract $renderTemplateObject )
    {
        $core = WidgetFramework_Core::getInstance();
        $threadModel = $core->getModelFromCache( 'XenForo_Model_Thread' );
        $visitor = XenForo_Visitor::getInstance();

        // Get data for each param.
        $new = $this->_getDataForThisVar();
        $recent = $this->_getDataForThisVar();
        $popular = $this->_getDataForThisVar();
        $mostReplied = $this->_getDataForThisVar();
        $mostLiked = $this->_getDataForThisVar();
        $polls = $this->_getDataForThisVar();

        $renderTemplateObject->setParam( 'new', $new );
        $renderTemplateObject->setParam( 'recent', $recent );
        $renderTemplateObject->setParam( 'popular', $popular );
        $renderTemplateObject->setParam( 'mostReplied', $mostReplied );
        $renderTemplateObject->setParam( 'mostLiked', $mostLiked );
        $renderTemplateObject->setParam( 'polls', $polls );

        return $renderTemplateObject->render();
    }

    public function useUserCache( array $widget )
    {
        if ( !empty( $widget['options']['as_guest'] ) )
        {
            // using guest permission
            // there is no reason to use the user cache
            return false;
        }

        return parent::useUserCache( $widget );
    }

    protected function _getCacheId( array $widget, $positionCode, array $params, array $suffix = array() )
    {
        // Do special processing before getting cache id if needed.
        // See Recent Threads for example.

        return parent::_getCacheId( $widget, $positionCode, $params, $suffix );
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
            sprintf('(%s)', new XenForo_Phrase('unspecified')),
            'Forum'
        );
    }

    protected function _getDataForThisVar()
    {
        // DO something
        return;
    }
}