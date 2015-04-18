<?php

class bdSocialShare_ControllerHelper_Content extends XenForo_ControllerHelper_Abstract
{
	public function getErrorOrNoPermissionResponse(XenForo_ControllerResponse_View $response, $errorPhraseKey, $stringToPhrase = true)
	{
		$responseCode = 403;

		if (XenForo_Visitor::getUserId() == 0)
		{
			$viewParams = array('text' => new XenForo_Phrase('login_required'));

			$response2 = $this->_controller->responseView('XenForo_ViewPublic_Error_RegistrationRequired', 'error_with_login', $viewParams);
		}
		else
		{
			if (empty($errorPhraseKey))
			{
				$error = new XenForo_Phrase('do_not_have_permission');
			}
			elseif ($errorPhraseKey && (is_string($errorPhraseKey) || is_array($errorPhraseKey)) && $stringToPhrase)
			{
				$error = new XenForo_Phrase($errorPhraseKey);

				if (preg_match('/^requested_.*_not_found$/i', $error->getPhraseName()))
				{
					$responseCode = 404;
				}
			}
			else
			{
				$error = $errorPhraseKey;
			}

			if (is_array($error))
			{
				$errors = $error;
			}
			else
			{
				$errors = array($error);
			}

			$viewParams = array('error' => $errors);

			$response2 = $this->_controller->responseView('', 'error', $viewParams);

		}

		// TODO: improve response code
		// as far as I know, Facebook hates 4xx
		// $response2->responseCode = $responseCode;

		$response2->subView = $response;
		$response2->params['_bdSocialShare_renderSubView'] = true;

		// copy params from $response->params to $response2->params for better
		// compatibility with other add-ons
		foreach ($response->params as $responseParamKey => $responseParamValue)
		{
			if (!isset($response2->params[$responseParamKey]))
			{
				$response2->params[$responseParamKey] = $responseParamValue;
			}
		}

		return $response2;
	}

}
