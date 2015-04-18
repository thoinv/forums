<?php

class TPUSigPic_ControllerPublicAccount extends XFCP_TPUSigPic_ControllerPublicAccount
{
	public function actionSigPic()
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('signature', 'sigpic'))
		{
			return $this->responseNoPermission();
		}

		$visitor = XenForo_Visitor::getInstance();

		$viewParams = array(
			'filesize' => XenForo_Application::getOptions()->sigpicMaxFileSize,
			'width' => XenForo_Application::getOptions()->sigpicMaxDimensions['width'],
			'height' => XenForo_Application::getOptions()->sigpicMaxDimensions['height'],
		);

		return $this->_getWrapper(
			'account', 'signature',
			$this->responseView(
				'XenForo_ViewPublic_Account_Avatar',
				'tpu_account_sigpic',
				$viewParams
			)
		);
	}
	
	public function actionSigPicUpload()
	{
		$this->_assertPostOnly();

		if (!XenForo_Visitor::getInstance()->hasPermission('signature', 'sigpic'))
		{
			return $this->responseNoPermission();
		}

		$sigpic= XenForo_Upload::getUploadedFile('sigpic');

		$sigpicModel = $this->getModelFromCache('TPUSigPic_Model_SigPic');

		$visitor = XenForo_Visitor::getInstance();

		$inputData = $this->_input->filter(array(
			'delete' => XenForo_Input::UINT,
		));

		if ($sigpic)
		{
			$sigpicData = $sigpicModel->uploadSigPic($sigpic, $visitor['user_id'], $visitor->getPermissions());
		}
		else if ($inputData['delete'])
		{
			$sigpicData = $sigpicModel->deleteSigPic(XenForo_Visitor::getUserId());
		}
		
		if (isset($sigpicData) && is_array($sigpicData))
		{
			foreach ($sigpicData AS $key => $val)
			{
				$visitor[$key] = $val;
			}
		}

		$message = new XenForo_Phrase('upload_completed_successfully');

		if ($this->_noRedirect())
		{
			// TODO
		}
		else
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink('account/signature'),
				$message
			);
		}
	}	
	
	protected function _saveVisitorSettings($settings, &$errors, $extras = array())
	{
		if (isset($settings['signature']))
		{
			$userid=XenForo_Visitor::getInstance()->get('user_id');

			$settings['signature']=preg_replace('/\[sigpic\].*?\[\/sigpic\]/im', '[sigpic]'.$userid.'[/sigpic]', $settings['signature']);
		}
		
		return parent::_saveVisitorSettings($settings, $errors, $extras);
	}
}