<?php

class Turki_Adv_ControllerAdmin_Home extends XenForo_ControllerAdmin_Abstract
{

	protected function _preDispatch($action)
	{
		$this->assertAdminPermission('advxenforo');
	}

	public function actionIndex()
	{
		$advXenforo  = $this->_getAdvModel()->getAllAdv();
		$optionModel = $this->getModelFromCache('XenForo_Model_Option');
		$viewParams  = array(
			'advs'                    => $advXenforo,
			'options'                 => $optionModel->prepareOptions($optionModel->getOptionsByIds(array('enableadvxenforo'))),
			'canEditOptionDefinition' => $optionModel->canEditOptionAndGroupDefinitions()
		);

		return $this->responseView('Turki_Adv_ViewAdmin_List', 'adv_xenforo_list', $viewParams);
	}


	public function actionAdd()
	{
		$addOnModel = $this->getModelFromCache('Turki_Adv_Model_Hooks');

		$viewParams = array(
			'userCriteria'     => XenForo_Helper_Criteria::prepareCriteriaForSelection(''),
			'userCriteriaData' => XenForo_Helper_Criteria::getDataForUserCriteriaSelection(),
			'pageCriteria'     => XenForo_Helper_Criteria::prepareCriteriaForSelection(''),
			'pageCriteriaData' => XenForo_Helper_Criteria::getDataForPageCriteriaSelection(),
			'advs'             => array('active' => TRUE),
			'hookOptions'      => $addOnModel->getHooksListIfAvailable(),
			'adv_display'      => array('top' => new XenForo_Phrase('ads_xf_ar_above'), 'bottom' => new XenForo_Phrase('ads_xf_ar_below')),
			'hookSelected'     => $addOnModel->getDefaultHook()
		);
		return $this->responseView('Turki_Adv_ViewAdmin_Edit', 'adv_xenfor_edit', $viewParams);
	}


	public function actionEdit()
	{
		$advId      = $this->_input->filterSingle('adv_id', XenForo_Input::STRING);
		$addOnModel = $this->getModelFromCache('Turki_Adv_Model_Hooks');
		$adv        = $this->_getAdvOrError($advId);
		// die(var_dump($adv['post_criteria']));
		$viewParams = array(
			'userCriteria'     => XenForo_Helper_Criteria::prepareCriteriaForSelection(''),
			'userCriteriaData' => XenForo_Helper_Criteria::getDataForUserCriteriaSelection(),
			'pageCriteria'     => XenForo_Helper_Criteria::prepareCriteriaForSelection(''),
			'pageCriteriaData' => XenForo_Helper_Criteria::getDataForPageCriteriaSelection(),
			'advs'             => $adv,
			'userCriteria'     => XenForo_Helper_Criteria::prepareCriteriaForSelection($adv['user_criteria']),
			'pageCriteria'     => XenForo_Helper_Criteria::prepareCriteriaForSelection($adv['page_criteria']),
			'postCriteria'     => XenForo_Helper_Criteria::prepareCriteriaForSelection($adv['post_criteria']),
			'hookOptions'      => $addOnModel->getHooksListIfAvailable(),
			'adv_display'      => array('top' => new XenForo_Phrase('top'), 'bottom' => new XenForo_Phrase('bottom')),
			'hookSelected'     => (isset($adv['adv_hook_name']) ? $adv['adv_hook_name'] : $addOnModel->getDefaultHook()),
		);
		return $this->responseView('Turki_Adv_ViewAdmin_Edit', 'adv_xenfor_edit', $viewParams);
	}

	public function actionSave()
	{
		$this->_assertPostOnly();
		$originalAdvId = $this->_input->filterSingle('original_adv_id', XenForo_Input::STRING);

		$dwInput = $this->_input->filter(array(
			'title'         => XenForo_Input::STRING,
			'adv_hook_name' => XenForo_Input::STRING,
			'adv_large'     => XenForo_Input::STRING,
			'adv_small'     => XenForo_Input::STRING,
			'display'       => XenForo_Input::STRING,
			'user_criteria' => XenForo_Input::ARRAY_SIMPLE,
			'page_criteria' => XenForo_Input::ARRAY_SIMPLE,
			'post_criteria' => XenForo_Input::ARRAY_SIMPLE,
			'active'        => XenForo_Input::UINT,
		));

		$dw = XenForo_DataWriter::create('Turki_Adv_DataWriter_Adv');
		if ($originalAdvId) {
			$dw->setExistingData($originalAdvId);
		}
		$dw->bulkSet($dwInput);
		$dw->save();
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('advxf')
		);
	}

	public function actionDelete()
	{
		$advId = $this->_input->filterSingle('adv_id', XenForo_Input::UINT);

		if ($this->isConfirmedPost()) {
			$return = $this->_deleteData(
				'Turki_Adv_DataWriter_Adv', 'adv_id',
				XenForo_Link::buildAdminLink('advxf')
			);
			return $return;
		} else {
			$viewParams = array('adv' => $this->_getAdvOrError($advId));
			return $this->responseView('Turki_Adv_ViewAdmin_Delete', 'adv_xenforo_delete', $viewParams);
		}
	}

	protected function _switchAdvActiveStateAndGetResponse($advId, $activeState)
	{
		$dw = XenForo_DataWriter::create('Turki_Adv_DataWriter_Adv');
		$dw->setExistingData($advId);
		$dw->set('active', $activeState);
		$dw->save();
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('advxf')
		);
	}


	public function actionEnable()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('_xfToken', XenForo_Input::STRING));
		$advId = $this->_input->filterSingle('adv_id', XenForo_Input::STRING);
		return $this->_switchAdvActiveStateAndGetResponse($advId, 1);
	}

	public function actionDisable()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('_xfToken', XenForo_Input::STRING));
		$advId = $this->_input->filterSingle('adv_id', XenForo_Input::STRING);
		return $this->_switchAdvActiveStateAndGetResponse($advId, 0);
	}

	public function actionToggle()
	{
		$return = $this->_getToggleResponse(
			$this->_getAdvModel()->getAllAdv(),
			'Turki_Adv_DataWriter_Adv',
			'advxf');

		return $return;

	}

	protected function _getAdvOrError($advnId)
	{
		$info = $this->_getAdvModel()->getAdvById($advnId);
		if (!$info) {
			throw $this->responseException($this->responseError(new XenForo_Phrase('requested_adv_xenforo_not_found'), 404));
		}

		return $info;
	}

	protected function _getAdvModel()
	{
		return $this->getModelFromCache('Turki_Adv_Model_Adv');
	}
}