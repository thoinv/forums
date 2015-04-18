<?php

class Turki_Adv_ControllerAdmin_Hooks extends XenForo_ControllerAdmin_StyleAbstract
{

	protected function _preDispatch($action)
	{
		$this->assertAdminPermission('advxenforo');
	}

	public function actionIndex()
	{
		$advModel   = $this->_getAdvHookModel();
		$viewParams = array(
			'hooks'      => $advModel->getAllAdvHook(),
			'exportView' => $this->_input->filterSingle('export', XenForo_Input::UINT)
		);
		return $this->responseView('Turki_Adv_ViewAdmin_HookList', 'adv_hook_xenforo_list', $viewParams);
	}

	public function actionAdd()
	{

		$viewParams = array(
			'hooks'   => array('active' => TRUE),
			'canEdit' => TRUE
		);
		return $this->responseView('XenForo_ViewAdmin_AdvHookXenforo_Edit', 'adv_hook_xenfor_edit', $viewParams);
	}

	public function actionAutoComplete()
	{
		$q = $this->_input->filterSingle('q', XenForo_Input::STRING);

		if ($q) {
			$templates = $this->_getTemplateModel()->getEffectiveTemplateListForStyle(0,
				array('title' => array($q, 'r')),
				array('limit' => 10)
			);
		} else {
			$templates = array();
		}

		$view             = $this->responseView();
		$view->jsonParams = array(
			'results' => XenForo_Application::arrayColumn($templates, 'title', 'title')
		);
		return $view;
	}

	public function actionContents()
	{
		$templateName = $this->_input->filterSingle('template', XenForo_Input::STRING);
		$template     = $this->_getTemplateModel()->getEffectiveTemplateByTitle($templateName, 0);

		$view             = $this->responseView();
		$view->jsonParams = array(
			'template' => $template ? $this->_adjustTemplateContentForDisplay($template['template']) : FALSE
		);
		return $view;
	}

	protected function _adjustTemplateContentForDisplay($content)
	{
		$propertyModel = $this->_getStylePropertyModel();
		$properties    = $propertyModel->keyPropertiesByName(
			$propertyModel->getEffectiveStylePropertiesInStyle(0)
		);
		return $propertyModel->replacePropertiesInTemplateForEditor(
			$content, 0, $properties, TRUE
		);
	}

	public function actionEdit()
	{
		$advId = $this->_input->filterSingle('hook_id', XenForo_Input::STRING);
		$adv   = $this->_getAdvHookOrError($advId);

		$viewParams = array(
			'hooks'   => $adv,
			'canEdit' => TRUE
		);
		return $this->responseView('Turki_Adv_ViewAdmin_AdvHookXenforo_Edit', 'adv_hook_xenfor_edit', $viewParams);
	}

	public function actionSave()
	{
		$this->_assertPostOnly();
		$originalAdvHookId = $this->_input->filterSingle('original_adv_hooks_id', XenForo_Input::STRING);
		$dwInput           = $this->_input->filter(array(
			'hook_title' => XenForo_Input::STRING,
			'hook_name'  => XenForo_Input::STRING,
			'template'   => XenForo_Input::STRING,
			'active'     => XenForo_Input::UINT,
		));
		$dw                = XenForo_DataWriter::create('Turki_Adv_DataWriter_Hooks');
		if ($originalAdvHookId) {
			$dw->setExistingData($originalAdvHookId);
		}
		$dw->bulkSet($dwInput);
		$dw->save();

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('advxf-hook')
		);
	}

	public function actionDelete()
	{
		$hookId = $this->_input->filterSingle('hook_id', XenForo_Input::UINT);

		if ($this->isConfirmedPost()) {
			return $this->_deleteData(
				'Turki_Adv_DataWriter_Hooks', 'hook_id',
				XenForo_Link::buildAdminLink('advxf-hook')
			);
		} else {
			$viewParams = array('hooks' => $this->_getAdvHookOrError($hookId));

			return $this->responseView('Turki_Adv_ViewAdmin_AdvHookXenforo_Delete', 'adv_hook_xenforo_delete', $viewParams);
		}
	}

	protected function _switchAdvActiveStateAndGetResponse($advId, $activeState)
	{
		$dw = XenForo_DataWriter::create('Turki_Adv_DataWriter_Hooks');
		$dw->setExistingData($advId);
		$dw->set('active', $activeState);
		$dw->save();

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('advxf-hook')
		);
	}


	public function actionEnable()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('_xfToken', XenForo_Input::STRING));
		$advId = $this->_input->filterSingle('hook_id', XenForo_Input::STRING);
		die(var_dump($advId));
		return $this->_switchAdvActiveStateAndGetResponse($advId, 1);
	}

	public function actionDisable()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('_xfToken', XenForo_Input::STRING));
		$advId = $this->_input->filterSingle('hook_id', XenForo_Input::STRING);
		return $this->_switchAdvActiveStateAndGetResponse($advId, 0);
	}

	public function actionToggle()
	{
		return $this->_getToggleResponse(
			$this->_getAdvHookModel()->getAllAdvHook(),
			'Turki_Adv_DataWriter_Hooks',
			'advxf-hook');
	}

	public function actionExport()
	{
		$this->_assertPostOnly();

		$export = $this->_input->filterSingle('hookId', array(XenForo_Input::STRING, 'array' => TRUE));
		if (!$export) {
			return $this->responseError(new XenForo_Phrase('please_select_at_least_one_item'));
		}


		$this->_routeMatch->setResponseType('xml');
		$viewParams = array(
			'xml' => $this->_getAdvHookModel()->getHookExportXml($export)
		);

		return $this->responseView('Turki_Adv_ViewAdmin_Hooks_Export', '', $viewParams);
	}

	public function actionImport()
	{
		if ($this->isConfirmedPost()) {

			if ($_input = $this->_getInputFromSerialized('_xfHookImportData', TRUE)) {
				$this->_input = $_input;
			}

			$input = $this->_input->filter(array(
				'import' => XenForo_Input::ARRAY_SIMPLE,
				'hooks'  => XenForo_Input::ARRAY_SIMPLE,
			));

			$_hooks = array();

			foreach ($input['import'] AS $hookId) {
				if (empty($input['hooks'][$hookId])) {
					continue;
				}

				$hookInput = new XenForo_Input($input['hooks'][$hookId]);

				$_hooks[$hookId] = $hookInput->filter(array(
					'hook_title' => XenForo_Input::STRING,
					'template'   => XenForo_Input::STRING,
					'hook_name'  => XenForo_Input::STRING,
					'active'     => XenForo_Input::UINT,
				));
			}

			$this->_getAdvHookModel()->massImportHooks($_hooks, $errors);

			if (empty($errors)) {
				return $this->responseRedirect(
					XenForo_ControllerResponse_Redirect::SUCCESS,
					XenForo_Link::buildAdminLink('advxf-hook')
				);
			} else {
				return $this->responseError($errors);
			}
		} else {
			return $this->responseView('Turki_Adv_ViewAdmin_Hook_Import', 'adv_hook_xenforo_import', array());
		}
	}

	public function actionImportForm()
	{
		$this->_assertPostOnly();


		$hookModel = $this->_getAdvHookModel();

		$upload = XenForo_Upload::getUploadedFile('upload');
		if (!$upload) {
			return $this->responseError(new XenForo_Phrase('please_upload_valid_hooks_xml_file'));
		}

		$document = $this->getHelper('Xml')->getXmlFromFile($upload);
		$hookData = $hookModel->getHookDataFromXml($document);

		$viewParams = array(
			'hooks' => $hookData['hooks'],
		);

		return $this->responseView('Turki_Adv_ViewAdmin_Hook_ImportForm', 'adv_hook_xenforo_import_form', $viewParams);
	}


	protected function _getAdvHookOrError($hookId)
	{
		$info = $this->_getAdvHookModel()->getAdvHookById($hookId);
		if (!$info) {
			throw $this->responseException($this->responseError(new XenForo_Phrase('requested_adv_hooks_xenforo_not_found'), 404));
		}

		return $info;
	}

	protected function _getAdvHookModel()
	{
		return $this->getModelFromCache('Turki_Adv_Model_Hooks');
	}

	protected function _getTemplateModel()
	{
		return $this->getModelFromCache('XenForo_Model_Template');
	}

	protected function _getStylePropertyModel()
	{
		return $this->getModelFromCache('XenForo_Model_StyleProperty');
	}
}