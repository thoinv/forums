<?php
/**
 * WidgetPortal
 * License: BSD
 */

class WidgetPortal_Model_Widget extends WidgetFramework_Model_Widget
{


    /**
     * Save input data either to portal table or WF table depending on whether it is content or sidebar targeted.
     * @param $widgetId
     * @param $dwInput
     * @param $options
     * @param $input
     * @return bool
     */
    public function saveWidget( $widgetId, $dwInput, $options, $input )
    {
        $flagGoBackToEdit = false;

        $dw = XenForo_DataWriter::create('WidgetFramework_DataWriter_Widget');

        if ($widgetId)
        {
            $dw->setExistingData($widgetId);
        }
        $dw->bulkSet($dwInput);

        if ($options == $dwInput['class'])
        {
            // process options now
            $renderer = WidgetFramework_Core::getRenderer($dwInput['class']);
            $widgetOptions = $renderer->parseOptionsInput($input, $dw->getMergedData());
            $dw->set('options', $widgetOptions);
        }
        else
        {
            // skip options, mark to redirect later
            $flagGoBackToEdit = true;
        }

        $dw->save();

        return $flagGoBackToEdit;
    }
    /**
     * Returns all widgets from widget portal table.
     * @param bool $useCached
     * @param bool $prepare
     * @return array|bool|false|mixed
     */
    public function getAllWidgets( $useCached = true, $prepare = true )
    {
        $widgets = false;

        /* try to use cached data */
        if ( $useCached )
        {
            $widgets = XenForo_Application::getSimpleCacheData(self::SIMPLE_CACHE_KEY);
        }

        /* fallback to database */
        if ( $widgets === false )
        {
            $portalModel = $this->_getPortalModel();
            $pos = $this->_getDb()->quote($portalModel->getPortalWidgetPositions());
            $widgets = $this->fetchAllKeyed("
				SELECT *
				FROM `xf_widget`
				WHERE position IN (" . $pos . ")
				ORDER BY display_order ASC
			", 'widget_id' );
        }

        /* prepare information for widgets */
        if ( $prepare )
        {
            foreach ( $widgets as &$widget )
            {
                $this->_prepare($widget);
            }
        }

        return $widgets;
    }

    public function getAllFrontendEditableWidgets()
    {
        $editable = WidgetPortal_Model_Portal::getportalEditableWidgets();

        return $this->fetchAllKeyed( '
			SELECT *
				FROM xf_widget as widget
			    WHERE 1=1 AND
			    class IN (' . $this->_getDb()->quote( $editable ) . ')
		', 'widget_id' );
    }

    /**
     * Returns the portal model
     * @return WidgetPortal_Model_Portal
     */
    protected function _getPortalModel()
    {
        return $this->getModelFromCache('WidgetPortal_Model_Portal');
    }

}