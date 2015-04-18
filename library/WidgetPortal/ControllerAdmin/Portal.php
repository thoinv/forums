<?php
class WidgetPortal_ControllerAdmin_Portal extends WidgetFramework_ControllerAdmin_Widget {

	public function actionIndex() {
		if ($this->_request->isPost()) {
			// probably a toggle request
			$widgetExists = $this->_input->filterSingle(
                'widgetExists', array(XenForo_Input::UINT, 'array' => true)
            );
			$widgets = $this->_input->filterSingle(
                'widget', array(XenForo_Input::UINT, 'array' => true)
            );
			
			if (!empty($widgetExists)) {
				$widgetModel = $this->_getWidgetModel();
		
				foreach ($widgetModel->getAllWidgets(false) AS $widgetId => $widget) {
					if (isset($widgetExists[$widgetId])) {
						$widgetActive = (isset($widgets[$widgetId]) && $widgets[$widgetId] ? 1 : 0);
		
						if ($widget['active'] != $widgetActive) {
							$dw = XenForo_DataWriter::create('WidgetFramework_DataWriter_Widget');
							$dw->setExistingData($widgetId);
							$dw->set('active', $widgetActive);
							$dw->save();
						}
					}
				}
		
				return $this->responseRedirect(
					XenForo_ControllerResponse_Redirect::SUCCESS,
					XenForo_Link::buildAdminLink('widget-portal')
				);
			}
		} 
		
		// a simple listing request
		$widgetModel = $this->_getWidgetModel();
        $widgets = $widgetModel->getAllWidgets( false );

		$viewParams = array(
            'widgets' => $widgets,
		);

		return $this->responseView('WidgetPortal_ViewAdmin_Widget_List', 'widgetportal_widget_list', $viewParams);
	}

	public function actionAdd()
    {
		$viewParams = array(
			'widget' => array(
				'active' => 1,
			),
			'renderers' => WidgetPortal_Helper_Portal::convertRendererListForPortal($this->_getRenderersList()),
            'positions' => $this->_getPortalModel()->getPortalWidgetPositionsList(),
		);

		return $this->responseView('WidgetFramework_ViewAdmin_Widget_Edit', 'widgetportal_widget_edit', $viewParams);
	}

	public function actionEdit()
    {
		$widgetId = $this->_input->filterSingle('widget_id', XenForo_Input::UINT);
		$widget = $this->_getWidgetOrError($widgetId);

		$viewParams = array(
			'widget' => $widget,
			'renderers' => WidgetPortal_Helper_Portal::convertRendererListForPortal($this->_getRenderersList()),
            'positions' => $this->_getPortalModel()->getPortalWidgetPositionsList(),
		);

		return $this->responseView('WidgetFramework_ViewAdmin_Widget_Edit', 'widgetportal_widget_edit', $viewParams);
	}

	public function actionSave()
    {
		$this->_assertPostOnly();

		$widgetId = $this->_input->filterSingle('widget_id', XenForo_Input::UINT);
        $options = $this->_input->filterSingle('options_loaded', XenForo_Input::STRING);

		$dwInput = $this->_input->filter(array(
			'class' => XenForo_Input::STRING,
			'title' => XenForo_Input::STRING,
			'position' => XenForo_Input::STRING,
			'display_order' => XenForo_Input::UINT,
			'active' => XenForo_INput::UINT,
		));

        $flagGoBackToEdit = $this->_getWidgetModel()->saveWidget( $widgetId, $dwInput, $options, $this->_input );

        $dw = XenForo_DataWriter::create('WidgetFramework_DataWriter_Widget');
		if ($this->_noRedirect())
        {
			return $this->responseView('WidgetFramework_ViewAdmin_Widget_Save', '', array('widget' => $widgetId));
		}
        elseif (!empty($flagGoBackToEdit))
        {
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
				XenForo_Link::buildAdminLink('widget-portal/edit', $dw->getMergedData())
			);
		}
        else
        {
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('widget-portal')
			);
		}
	}

	public function actionDelete()
    {
		$widgetId = $this->_input->filterSingle('widget_id', XenForo_Input::UINT);
		$widget = $this->_getWidgetOrError($widgetId);

		if ( $this->isConfirmedPost() )
        {
			$dw = XenForo_DataWriter::create('WidgetFramework_DataWriter_Widget');
			$dw->setExistingData($widgetId);
			$dw->delete();

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('widget-portal')
			);
		}
        else
        {
			$viewParams = array(
				'widget' => $widget
			);

			return $this->responseView('WidgetFramework_ViewAdmin_Widget_Delete',
                'widgetportal_widget_delete',
                $viewParams
            );
		}
	}

    /**
     * Forwards to front end for widget configuration.
     * In a future version I'll move that to the backend.
     * @return XenForo_ControllerResponse_Redirect
     */
    public function actionConfigure()
    {
        return $this->responseRedirect(
            XenForo_ControllerResponse_Redirect::SUCCESS,
            XenForo_Link::buildPublicLink('home-widget'),
            array()
        );
    }
	
	protected function _switchWidgetActiveStateAndGetResponse( $widgetId, $activeState )
    {
        parent::_switchWidgetActiveStateAndGetResponse( $widgetId, $activeState );

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('widget-portal')
		);
	}

    /**
     * @return WidgetPortal_Model_Widget
     */
    protected function _getWidgetModel()
    {
        return $this->getModelFromCache('WidgetPortal_Model_Widget');
    }

    /**
     * @return WidgetPortal_Model_FrameworkWidget
     */
    protected function _getWidgetFrameworkWidgetModel()
    {
        return $this->getModelFromCache('WidgetPortal_Model_FrameworkWidget');
    }

    /**
     * @return WidgetPortal_Model_Portal
     */
    protected function _getPortalModel()
    {
        return $this->getModelFromCache('WidgetPortal_Model_Portal');
    }
}