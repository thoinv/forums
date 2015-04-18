<?php
/**
 * @title Widget Carousel DataWriter
 * @package WidgetPortal
 */

class WidgetPortal_DataWriter_Widget_Carousel extends XenForo_DataWriter
{

    const EXTRA_DATA_SKIP_REBUILD = 'skipRebuild';

    protected function _getFields()
    {
        return array(
            'widgetportal_widget_carousel' => array(
                'carousel_id' => array( 'type' => self::TYPE_UINT,
                    'autoIncrement' => true ),
                'widget_id' => array( 'type' => self::TYPE_UINT,
                    'verification' => array( 'WidgetPortal_DataWriter_Helper_Carousel', 'verifyWidgetId' ) ),
                'thread_id' => array( 'type' => self::TYPE_UINT,
                    'verification' => array( 'WidgetPortal_DataWriter_Helper_Carousel', 'verifyThreadId' ) ),
                'attachment_id' => array( 'type' => self::TYPE_UINT,
                    'verification' => array( 'WidgetPortal_DataWriter_Helper_Carousel', 'verifyAttachmentId' ),
                    'default' => 0 ),
                'order' => array( 'type' => self::TYPE_UINT, 'default' => 1 ),
            )
        );
    }

    protected function _getExistingData( $data )
    {
        if( !$id = $this->_getExistingPrimaryKey( $data, 'carousel_id' ) )
        {
            return false;
        }

        return array( 'widgetportal_widget_carousel' =>  $this->_getWidgetCarouselModel()->getCarouselItemByCarouselId( $id ) );
    }

    /**
     * TODO Check that portal is being cached properly.
     */

    protected function _postSaveAfterTransaction()
    {
        if( !$this->getExtraData( self::EXTRA_DATA_SKIP_REBUILD ) )
        {
            $this->_getWidgetModel()->buildCache();
        }

        WidgetFramework_Core::clearCachedWidgetById( $this->get( 'widget_id' ) );
    }

    protected function _postDelete()
    {
        if( !$this->getExtraData( self::EXTRA_DATA_SKIP_REBUILD ) )
        {
            $this->_getWidgetModel()->buildCache();
        }

        WidgetFramework_Core::clearCachedWidgetById( $this->get( 'widget_id' ) );
    }

    protected function _getUpdateCondition( $tableName )
    {
        return 'carousel_id = ' . $this->_db->quote( $this->getExisting( 'carousel_id' ) );
    }

    /**
     * @return WidgetFramework_Model_Widget
     */
    protected function _getWidgetModel()
    {
        return $this->getModelFromCache( 'WidgetFramework_Model_Widget' );
    }

    /**
     * @return WidgetPortal_Model_Widget_Carousel
     */
    protected function _getWidgetCarouselModel()
    {
        return $this->getModelFromCache( 'WidgetPortal_Model_Widget_Carousel' );
    }
}