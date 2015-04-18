<?php
/**
 * WidgetPortal
 * License: BSD
 */

class WidgetPortal_Model_Portal extends XenForo_Model
{
    const WIDGET_PORTAL_TEMPLATE = 'widgetportal_portal';

    /**
     * Positions of the widgets.
     * @var array
     */
    protected $portalWidgetPositions = array(
        'Main Content' => 'hook:widgetportal_portal_main_content', /* Portal hook location */
        'Left Sidebar' => 'hook:widgetportal_portal_left_sidebar', /* Portal hook location */
        'Right Sidebar' => self::WIDGET_PORTAL_TEMPLATE ,/* Saving sidebar widget to WF with position of portal */
        'Featured Content' => 'hook:widgetportal_portal_featured_content',/* Saving sidebar widget to WF with position of portal */
    );

    /**
     * @var array
     */
    protected static $portalEditableWidgets = array(
        'WidgetPortal_WidgetRenderer_Carousel',
    );

    /**
     * Validate that the position is valid or throw an error
     * @param $input
     * @throws XenForo_Exception
     */
    public function validPositionSelectionOrError( $input )
    {
        if( ! $this->validatePositionSelection( $input ) )
        {
            throw new XenForo_Exception( new XenForo_Phrase('widgetportal_invalid_portal_widget_location') );
        }
    }

    /**
     * Validate that the widget id exists or throw an error
     * @param $input
     * @throws XenForo_Exception
     */
    public function validWidgetIdOrError( $input )
    {
        if( ! $this->validateWidgetId( $input ) )
        {
            throw new XenForo_Exception( new XenForo_Phrase('widgetportal_invalid_widget_id') );
        }
    }

    /**
     * Validate that the thread id is valid or throw an error
     * @param $input
     * @throws XenForo_Exception
     */
    public function validThreadIdOrError( $input )
    {
        if( ! $this->validateThreadId( $input ) )
        {
            throw new XenForo_Exception( new XenForo_Phrase('widgetportal_invalid_thread_id') );
        }
    }

    /**
     * Validate that the thread id is valid or throw an error
     * @param $input
     * @throws XenForo_Exception
     */
    public function validAttachmentIdOrError( $input )
    {
        if( ! $this->validateAttachmentId( $input ) )
        {
            throw new XenForo_Exception( new XenForo_Phrase('widgetportal_invalid_attachment_id') );
        }
    }

    /**
     * Validate that the input is a valid portal location.
     * @param $input string|array
     * @return bool
     */
    public function validatePositionSelection( $input )
    {
        if( is_array( $input ) )
        {
            if( isset( $input['position'] ) )
            {
                return in_array( $input['position'], $this->getPortalWidgetPositions() );
            }
            return false;
        }
        else
        {
            return in_array( $input, $this->getPortalWidgetPositions() );
        }
    }

    /**
     * Validate Widget Id exists
     * @param $id
     * @return bool
     */
    public function validateWidgetId( $id )
    {
        if( $this->getPortalWidgetById( $id ) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Validate that the thread id exists.
     * @param $id
     * @return bool
     */
    public function validateThreadId( $id )
    {
        $threadModel = $this->_getThreadModel();
        if( $threadModel->getThreadById( $id ) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Validate that the attachment id exists.
     * @param $id
     * @return bool
     */
    public function validateAttachmentId( $id )
    {
        $attachmentModel = $this->_getAttachmentModel();
        if( $attachmentModel->getAttachmentById( $id ) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Converts template name to display name
     * Given "Left Sidebar" returns left_sidebar
     * @param $templateName
     * @return mixed
     */
    public function convertTemplateNameToDisplayName( $templateName )
    {
        $positions = $this->getPortalWidgetPositions();
        return $positions[ $templateName ];
    }

    /**
     * Returns all portal widget positions
     * @return array
     */
    public function getPortalWidgetPositions()
    {
        return $this->portalWidgetPositions;
    }

    /**
     * Returns all positions
     * @return array
     */
    public function getPortalWidgetPositionsList()
    {
        $positions = array();
        foreach ( $this->getPortalWidgetPositions() as $name => $position )
        {
            $positions[] = array(
                'value' => $position,
                'label' => $name,
            );
        }
        return $positions;
    }

    public static function getportalEditableWidgets()
    {
        return self::$portalEditableWidgets;
    }

    /**
     * Get portal widget by id
     * @param $id
     * @return array
     */
    public function getPortalWidgetById( $id )
    {
        return $this->_getDb()->fetchRow('
			SELECT *
				FROM xf_widget as widget
				WHERE widget_id = ?
		', $id );
    }

    /**
     * Returns the thread model
     * @return XenForo_Model_Thread
     */
    protected function _getThreadModel()
    {
        return $this->getModelFromCache('XenForo_Model_Thread');
    }

    /**
     * Returns the attachment model
     * @return XenForo_Model_Attachment
     */
    protected function _getAttachmentModel()
    {
        return $this->getModelFromCache('XenForo_Model_Attachment');
    }

}