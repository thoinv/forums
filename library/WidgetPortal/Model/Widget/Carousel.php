<?php
/**
 * @title Widget Carousel Model
 * @package WidgetPortal
 */

class WidgetPortal_Model_Widget_Carousel extends XenForo_Model
{
    const FETCH_WIDGET = 0x01;

    /**
     * @param $input
     * @param $carouseId
     */
    public function saveCarousel( $input, $carouseId )
    {
        if( WidgetPortal_Helper_Array::arrayOfArray( $input ) )
        {
            $this->prepareSortOrder( $input );
            foreach( $input as $key => $item )
            {
                $this->prepareCarouselIdInput( $item, $key, $carouseId );
                $this->_save( $item );
            }
        }
        else
        {
            $this->prepareCarouselIdInput( $item, 0, $carouseId );
            $this->_save( $input );
        }

    }

    protected function _save( $input )
    {
        $dw = XenForo_DataWriter::create( 'WidgetPortal_DataWriter_Widget_Carousel' );

        if( isset( $input['carousel_id'] ) )
        {
            $dw->setExistingData( $input['carousel_id'] );
            unset( $input['carousel_id'] );
        }

        $dw->bulkSet( $input );

        $dw->save();

        return true;
    }

    public function deleteCarouselById( $id )
    {
        // DB delete
        $dw = XenForo_DataWriter::create( 'WidgetPortal_DataWriter_Widget_Carousel' );
        $dw->setExistingData( $id );
        $dw->delete();

        return true;
    }

    /**
     * Cleans them or returns 0 if it's empty.
     * @param $items
     * @return mixed
     */
    public function prepareItemsForDisplay( $items )
    {
        if( empty( $items ) )
        {
            $items[] = array(
                'carousel_id' => 0
            );
            return $items;
        }
        return $items;
    }

    /**
     * We pass the id through the array key in the form input.
     * Checks to see whether it is already set and if not sets it to the key
     * @param $input
     * @param $key
     * @param $widgetId
     * @return array
     */
    public function prepareCarouselIdInput( &$input, $key, $widgetId )
    {
        // Set widget id
        $input['widget_id'] = $widgetId;

        // Modify carousel id if needed.
        if( isset( $input['carousel_id'] ) &&
            ( $input['carousel_id'] <= 0 || $input['carousel_id'] >= 9000000 )
        )
        {
            unset( $input['carousel_id'] );
            return;
        }
        elseif( !isset( $input['carousel_id'] ) && $key < 9000000 && $key != 0 )
        {
            $input['carousel_id'] = $key;
            return;
        }
    }

    /**
     * Reorders the array by order
     * @param $input
     * @return array
     */
    public function prepareSortOrder( &$input )
    {
        WidgetPortal_Helper_Array::sortBySubArray( $input );
        WidgetPortal_Helper_Array::reorderArray( $input, 'order', 1 );
    }

    /**
     * Adds thread and attachment data to post array
     * @param $thread
     * @param $post
     * @return array
     */
    public function preparePostThreadForDisplay( $thread, $post )
    {
        $post = array_shift( $post );
        $post['thread_id'] = $thread['thread_id'];
        $post['title'] = $thread['title'];
        $post['order'] = $thread['order'];
        $post['attachment_id'] = $thread['attachment_id'];
        return $post;
    }


    public function preparePostsForDisplay( array $posts )
    {
        $p = array();
        foreach( $posts as $post )
        {
            // Check that we have attachment data
            if( isset( $post['attachments'] ) && is_array( $post['attachments'] ) )
            {
                // Check to see if there was an attachment id set, if not pull the first attachment.
                if( empty( $post['attachment_id'] ) )
                {
                    $post['image'] = array_shift( $post['attachments'] );
                }
                else
                {
                    // Check that the attachment id is in the array.
                    if( isset( $post['attachments'][$post['attachment_id']] ) )
                    {
                        $post['image'] = $post['attachments'][$post['attachment_id']];
                        unset( $post['attachments'][$post['attachment_id']] );
                    }
                    else
                    { // If not pull first.
                        $post['image'] = array_shift( $post['attachments'] );
                    }
                }
            }
            $p[$post['order'] - 1] = $post;
        }

        // Parse BBCode
        $p = WidgetPortal_Helper_Post::helperPreparePostDataForDisplay( $p );
        return $p;
    }

    public function getCarouselItems( $fetchOptions = array() )
    {
        $joinOptions = $this->prepareCarouselFetchOptions( $fetchOptions );
        return $this->fetchAllKeyed( '
			SELECT *
			    ' . $joinOptions['selectFields'] . '
				FROM widgetportal_widget_carousel as carousel
			    ' . $joinOptions['joinTables'] . '
			    WHERE 1=1
			    ' . $joinOptions['whereFields'] . '
		', $joinOptions['key'] );
    }

    public function getCarouselItemByCarouselId( $carouselId )
    {
        return $this->_getDb()->fetchRow( '
			SELECT *
				FROM widgetportal_widget_carousel as carousel
				WHERE carousel.carousel_id = ?
		', $carouselId );
    }

    public function getCarouselItemsByWidgetId( $widgetId )
    {
        return $this->fetchAllKeyed( '
			SELECT *
				FROM widgetportal_widget_carousel as carousel
				WHERE carousel.widget_id = ?
		', 'carousel_id', $widgetId );
    }

    public function getCarouselThreadIdsByWidgetId( $widgetId )
    {
        $threadIds = $this->fetchAllKeyed( '
			SELECT thread_id
				FROM widgetportal_widget_carousel as carousel
				WHERE carousel.widget_id = ?
		', 'carousel_id', $widgetId );
        return $this->getThreadIdsFromThreadArray( $threadIds );
    }

    public function getThreadIdsFromThreadArray( $threads )
    {
        $threadIds = array();
        foreach( $threads as $thread )
        {
            $threadIds[] = $thread['thread_id'];
        }
        return $threadIds;
    }

    /**
     * @param $widgetId
     * @param int $attachmentLimit How many attachments per post to pull. If set to 0 it'll pull all.
     * @return array
     */
    public function getThreadAndPostDataFromWidgetId( $widgetId, $attachmentLimit = 1 )
    {
        $posts = array();
        $postModel = $this->_getPostModel();
        $threadModel = $this->_getThreadModel();

        // Get thread data
        $threads = $this->getCarouselItemsByWidgetId( $widgetId );

        // Get first post from threads
        foreach( $threads as $thread )
        {
            $thread += $threadModel->getThreadById( $thread['thread_id'] );
            $post = $postModel->getPostsInThread( $thread['thread_id'], array( 'limit' => 1 ) );
            $post = $this->preparePostThreadForDisplay( $thread, $post );
            $post['carousel_id'] = $thread['carousel_id'];
            $posts[$post['post_id']] = $post;
        }

        // If it's set to 0/null then pull all the attachments for the posts.
        $postOptions = array();
        if( !empty( $attachmentLimit ) )
        {
            $postOptions['limit'] = $attachmentLimit;
        }
        $data = $postModel->getAndMergeAttachmentsIntoPostData( $posts, $postOptions );
        $posts = $this->preparePostsForDisplay(
            $data
        );

        return $posts;
    }

    public function getCarouselPostsAttachments( $posts )
    {

    }

    protected function prepareCarouselFetchOptions( $fetchOptions )
    {
        $selectFields = '';
        $joinTables = '';
        $where = '';
        $order = '';
        $arrayKey = 'carousel_id';

        if( !empty( $fetchOptions['join'] ) )
        {
            if( $fetchOptions['join'] & self::FETCH_WIDGET )
            {
                $joinTables = 'LEFT JOIN xf_widget as widget
                    ON (carousel.widget_id = widget.widget_id)
                    ';
            }
        }
        if( !empty( $fetchOptions['key'] ) )
        {
            if( $fetchOptions['key'] & self::FETCH_WIDGET )
            {
                $arrayKey = 'widget_id';
            }
        }

        return array(
            'selectFields' => $selectFields,
            'joinTables' => $joinTables,
            'whereFields' => $where,
            'orderFields' => $order,
            'key' => $arrayKey,
        );
    }


    /**
     * Returns the thread model
     * @return XenForo_Model_Thread
     */
    protected function _getThreadModel()
    {
        $core = WidgetFramework_Core::getInstance();
        return $core->getModelFromCache( 'XenForo_Model_Thread' );
    }

    /**
     * Returns the post model
     * @return WidgetPortal_Model_Extend_Post
     */
    protected function _getPostModel()
    {
        $core = WidgetFramework_Core::getInstance();
        return $core->getModelFromCache( 'WidgetPortal_Model_Extend_Post' );
    }
}