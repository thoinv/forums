<?php

class Nobita_Teams_XenGallery_ControllerPublic_Media extends XFCP_Nobita_Teams_XenGallery_ControllerPublic_Media
{
	
	public function actionSaveMedia()
	{
		$groupId = $this->_input->filterSingle('group_id', XenForo_Input::UINT);
		$containerType = $this->_input->filterSingle('container_type', XenForo_Input::STRING);

		Nobita_Teams_XenGallery_Media::setGroupId($groupId);

		$response = parent::actionSaveMedia();
		if ($response instanceof XenForo_ControllerResponse_Redirect
			&& $groupId
		)
		{
			$response->redirectTarget = $this->_buildLink(TEAM_ROUTE_PREFIX . '/photos', array('team_id' => $groupId));
		}

		return $response;
	}

	public function actionView()
	{
		$response = parent::actionView();
		if ($response instanceof XenForo_ControllerResponse_View)
		{
			$params = $response->params;
			if (!empty($params['media']['social_group_id']))
			{
				return $this->responseRedirect(
					XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
					$this->_buildLink(TEAM_ROUTE_PREFIX . '/media', $params['media'])
				);
			}
		}

		return $response;
	}

}