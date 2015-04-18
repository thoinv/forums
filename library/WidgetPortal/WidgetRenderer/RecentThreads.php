<?php

class WidgetPortal_WidgetRenderer_RecentThreads extends WidgetFramework_WidgetRenderer_Threads
{
    protected function _getConfiguration()
    {
        $config = parent::_getConfiguration();
        $config['name'] = '[Portal] Recent Threads';
        $config['useWrapper'] = false;
        return $config;
    }

    /**
     * Outputs admin template when this widget is selected.
     * @return string
     */
    protected function _getOptionsTemplate()
    {
        return parent::_getOptionsTemplate();
    }

    /**
     * Renders the options template with added variables.
     * Pulls the forum list for the carousel
     * @param XenForo_Template_Abstract $template
     */
    protected function _renderOptions( XenForo_Template_Abstract $template )
    {
        parent::_renderOptions( $template );
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
        return 'widgetportal_widget_recent_threads';
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
//        $widget['passObject']=true;
//        return parent::_render( $widget, $positionCode, $params, $renderTemplateObject );
        $core = WidgetFramework_Core::getInstance();
        $threadModel = $core->getModelFromCache( 'XenForo_Model_Thread' );
        $visitor = XenForo_Visitor::getInstance();

        $forumIds = $this->_helperGetForumIdsFromOption(
            $widget['options']['forums'],
            $params,
            empty( $widget['options']['as_guest'] ) ? false : true
        );

        $conditions = array(
            'node_id' => $forumIds,
            'deleted' => $visitor->isSuperAdmin() AND empty( $widget['options']['as_guest'] ),
            'moderated' => $visitor->isSuperAdmin() AND empty( $widget['options']['as_guest'] ),
        );
        $fetchOptions = array(
            // 'readUserId' => XenForo_Visitor::getUserId(), -- disable this to save some headeach of db join
            // 'includeForumReadDate' => true, -- this's not necessary too
            'limit' => $widget['options']['limit'],
            'join' => XenForo_Model_Thread::FETCH_AVATAR | XenForo_Model_Thread::FETCH_FIRSTPOST,
        );

        // process prefix
        // since 1.3.4
        if( !empty( $widget['options']['prefixes'] ) )
        {
            $conditions['prefix_id'] = $widget['options']['prefixes'];
        }

        if( in_array( $widget['options']['type'], array( 'new', 'all' ) ) )
        {
            $new = $threadModel->getThreads(
                $conditions
                , array_merge( $fetchOptions, array(
                    'order' => 'post_date',
                    'orderDirection' => 'desc'
                ) )
            );
        }
        else
        {
            $new = array();
        }

        if( in_array( $widget['options']['type'], array( 'recent', 'all' ) ) )
        {
            $recent = $threadModel->getThreads(
                $conditions
                , array_merge( $fetchOptions, array(
                    'order' => 'last_post_date',
                    'orderDirection' => 'desc',
                    'last_post_join' => XenForo_Model_Thread::FETCH_AVATAR,
                ) )
            );

            foreach( $recent as &$thread )
            {
                $thread['user_id'] = $thread['last_post_user_id'];
                $thread['username'] = $thread['last_post_username'];
            }
        }
        else
        {
            $recent = array();
        }

        if( in_array( $widget['options']['type'], array( 'popular', 'all' ) ) )
        {
            $popular = $threadModel->getThreads(
                array_merge( $conditions, array(
                    'post_date' => array( '>', XenForo_Application::$time - $widget['options']['cutoff'] * 86400 ),
                ) )
                , array_merge( $fetchOptions, array(
                    'order' => 'view_count',
                    'orderDirection' => 'desc',
                ) )
            );
        }
        else
        {
            $popular = array();
        }

        if( in_array( $widget['options']['type'], array( 'most_replied', 'all' ) ) )
        {
            $mostReplied = $threadModel->getThreads(
                array_merge( $conditions, array(
                    'post_date' => array( '>', XenForo_Application::$time - $widget['options']['cutoff'] * 86400 ),
                ) )
                , array_merge( $fetchOptions, array(
                    'order' => 'reply_count',
                    'orderDirection' => 'desc',
                ) )
            );

            foreach( array_keys( $mostReplied ) as $postId )
            {
                if( $mostReplied[$postId]['reply_count'] == 0 )
                {
                    // remove threads with zero reply_count
                    unset( $mostReplied[$postId] );
                }
            }
        }
        else
        {
            $mostReplied = array();
        }

        if( in_array( $widget['options']['type'], array( 'most_liked', 'all' ) ) )
        {
            $mostLiked = $threadModel->getThreads(
                array_merge( $conditions, array(
                    'post_date' => array( '>', XenForo_Application::$time - $widget['options']['cutoff'] * 86400 ),
                ) )
                , array_merge( $fetchOptions, array(
                    'order' => 'first_post_likes',
                    'orderDirection' => 'desc',
                ) )
            );

            foreach( array_keys( $mostLiked ) as $postId )
            {
                if( $mostLiked[$postId]['first_post_likes'] == 0 )
                {
                    // remove threads with zero first_post_likes
                    unset( $mostLiked[$postId] );
                }
            }
        }
        else
        {
            $mostLiked = array();
        }

        if( in_array( $widget['options']['type'], array( 'polls', 'all' ) ) )
        {
            $polls = $threadModel->getThreads(
                array_merge( $conditions, array(
                    'discussion_type' => 'poll',
                ) )
                , array_merge( $fetchOptions, array(
                    'order' => 'post_date',
                    'orderDirection' => 'desc',
                ) )
            );
        }
        else
        {
            $polls = array();
        }

        $renderTemplateObject->setParam( 'new', WidgetPortal_Helper_Post::helperPreparePostDataForDisplay( $new ) );
        $renderTemplateObject->setParam( 'recent', WidgetPortal_Helper_Post::helperPreparePostDataForDisplay( $recent ) );
        $renderTemplateObject->setParam( 'popular', WidgetPortal_Helper_Post::helperPreparePostDataForDisplay( $popular ) );
        $renderTemplateObject->setParam( 'mostReplied', WidgetPortal_Helper_Post::helperPreparePostDataForDisplay( $mostReplied ) );
        $renderTemplateObject->setParam( 'mostLiked', WidgetPortal_Helper_Post::helperPreparePostDataForDisplay( $mostLiked ) );
        $renderTemplateObject->setParam( 'polls', WidgetPortal_Helper_Post::helperPreparePostDataForDisplay( $polls ) );

        return $renderTemplateObject->render();
    }

    protected function _helperPrepareForumsOptionSource( array $selected = array(), $useSpecialForums = false )
    {
        // force false for special forums. Can't use those on the portal.
        return parent::_helperPrepareForumsOptionSource( $selected, false );
    }

}