<?php

class Nobita_Teams_ControllerPublic_XenMedia_Media extends Nobita_Teams_ControllerPublic_Abstract
{
	public function actionIndex()
	{
		$mediaId = $this->_input->filterSingle('media_id', XenForo_Input::UINT);
		if ($mediaId)
		{
			return $this->responseReroute(__CLASS__, 'view');
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
			$this->_buildLink(TEAM_ROUTE_PREFIX)
		);
	}

	public function actionView()
	{
		$mediaId = $this->_input->filterSingle('media_id', XenForo_Input::UINT);

		$controllerRequest = new Zend_Controller_Request_Http();
		$controllerRequest->setParam('media_id', $mediaId);

		$routeMatch = new XenForo_RouteMatch();
		$controllerResponse = new Zend_Controller_Response_Http();

		$mediaController = new XenGallery_ControllerPublic_Media($controllerRequest, $controllerResponse, $routeMatch);
		$mediaController->preDispatch('view', get_class($mediaController));

		$controllerResponse = $mediaController->{'actionView'}();

		$mediaParams = $controllerResponse->params;

		if (isset($mediaParams['media']['social_group_id']))
		{
			list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable($mediaParams['media']['social_group_id']);
		}

		return $this->_getTeamHelper()->getTeamViewWrapper('photos', $team, $category,
			$this->responseView('XenGallery_ViewPublic_Media_View', 'Team_xenmedia_view', array_merge($mediaParams, array(
				'team' => $team,
				'category' => $category
			)))
		);
	}

	public function actionAdd()
	{
		list ($team, $category) = $this->_getTeamValidAndViewable();

		return $this->_getMediaEditOrResponse($team, $category);
	}

	protected function _getMediaEditOrResponse(array $team, array $category)
	{
		$setup = Nobita_Teams_Setup::getInstance();
		$xenCatId = $setup->getOption('XenMediaCategoryId');

		$mediaCategoryModel = $this->getModelFromCache('XenGallery_Model_Category');
		$mediaModel = $this->getModelFromCache('XenGallery_Model_Media');

		$mediaCategory = $mediaCategoryModel->getCategoryById($xenCatId);

		if (!$mediaCategory)
		{
			throw $this->getNoPermissionResponseException();
		}
		$mediaCategory = $mediaCategoryModel->prepareCategory($mediaCategory);

		if (!$mediaCategoryModel->canAddMediaToCategory($mediaCategory, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
		$container = $mediaCategory;


		$mediaSites = $this->getModelFromCache('XenForo_Model_BbCode')->getAllBbCodeMediaSites();
		$allowedSites = XenForo_Application::getOptions()->xengalleryMediaSites;

		foreach ($mediaSites AS $key => $mediaSite)
		{
			if (!in_array($mediaSite['media_site_id'], $allowedSites))
			{
				unset ($mediaSites[$key]);
			}
		}

		$viewParams = array(
			'team' => $team,
			'category' => $category,

			'container' => $container,
			'mediaSites' => $mediaSites,
			'imageUploadParams' => $mediaModel->getAttachmentParams($container),
			'videoUploadParams' => $mediaModel->getAttachmentParams($container, 'video'),
			'imageUploadConstraints' => $mediaModel->getUploadConstraints(),
			'videoUploadConstraints' => $mediaModel->getUploadConstraints('video'),
			'canUploadImage' => $container['canUploadImage'],
			'canUploadVideo' => false,
			'canEmbedVideo' => $container['canEmbedVideo'],
			'mediaCategoryId' => $mediaCategory['category_id'],

			'groupId' => $team['team_id']
		);

		return $this->_getTeamHelper()->getTeamViewWrapper('photos', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_XenMedia_Add', 'Team_xenmedia_add', $viewParams)
		);
	}

	protected function _getTeamValidAndViewable()
	{
		$teamId = $this->_input->filterSingle('group_id', XenForo_Input::UINT);

		list ($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable($teamId);
		return array($team, $category);
	}

}