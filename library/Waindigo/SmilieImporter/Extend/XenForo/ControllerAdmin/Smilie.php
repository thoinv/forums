<?php

class Waindigo_SmilieImporter_Extend_XenForo_ControllerAdmin_Smilie extends XFCP_Waindigo_SmilieImporter_Extend_XenForo_ControllerAdmin_Smilie
{
	public function actionExportXml()
	{
		/* @var $smilieModel XenForo_Model_Smilie */
		$smilieModel = $this->_getSmilieModel();

		$allSmilies = $smilieModel->getAllSmilies();

		if ($this->isConfirmedPost()) {
			$smilies = $this->_input->filterSingle('smilies', XenForo_Input::ARRAY_SIMPLE);
			foreach ($smilies as $smilieId) {
				if (isset($allSmilies[$smilieId])) {
					$exportSmilies[] = $allSmilies[$smilieId];
				}
			}

			$this->_routeMatch->setResponseType('xml');

			$viewParams = array(
				'xml' => $smilieModel->getSmilieImporterXml($exportSmilies)
			);

			return $this->responseView('Waindigo_SmilieImporter_ViewAdmin_Smilie_Export', '', $viewParams);
		} else {
			$viewParams = array(
				'smilies' => $smilieModel->prepareSmiliesForList($allSmilies)
			);

			return $this->responseView('Waindigo_SmilieImporter_ViewAdmin_Smilie_Export', 'waindigo_smilie_export_smilieexporter', $viewParams);
		}
	} /* END actionExportXml */

	public function actionImportXml()
	{
		if ($this->isConfirmedPost()) {
			/* @var $smilieModel XenForo_Model_Smilie */
			$smilieModel = $this->_getSmilieModel();

			$input = $this->_input->filter(array(
				'overwrite' => XenForo_Input::UINT
			));

			$upload = XenForo_Upload::getUploadedFile('upload');
			if (!$upload) {
				return $this->responseError(new XenForo_Phrase('waindigo_please_upload_valid_smilies_xml_file_smilieimporter'));
			}

			$document = $this->getHelper('Xml')->getXmlFromFile($upload);
			$caches = $smilieModel->importSmiliesXml($document, $input['overwrite']);

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('smilies')
			);
		} else {
			return $this->responseView('Waindigo_SmilieImporter_ViewAdmin_Smilie_Import', 'waindigo_smilie_import_smilieimporter');
		}
	} /* END actionImportXml */
}