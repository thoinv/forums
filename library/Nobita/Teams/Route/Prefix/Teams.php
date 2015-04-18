<?php

class Nobita_Teams_Route_Prefix_Teams implements XenForo_Route_Interface
{
	protected $_subComponents = array(
		'categories' => array(
			'intId' => 'team_category_id',
			'title' => 'category_title',
			'controller' => 'Nobita_Teams_ControllerPublic_Category'
		),
		'posts' => array(
			'intId' => 'post_id',
			'controller' => 'Nobita_Teams_ControllerPublic_Post'
		),
		'authors' => array(
			'intId' => 'user_id',
			'title' => 'username',
			'controller' => 'Nobita_Teams_ControllerPublic_Author'
		),
		'members' => array(
			'stringId' => 'member_id',
			'controller' => 'Nobita_Teams_ControllerPublic_Member'
		),
		'banning' => array(
			'stringId' => Nobita_Teams_Banning::BANNING_ID_KEY,
			'controller' => 'Nobita_Teams_ControllerPublic_Banning'
		),
		'events' => array(
			'intId' => 'event_id',
			'title' => 'event_title',
			'controller' => 'Nobita_Teams_ControllerPublic_Event'
		),
		'comments' => array(
			'intId' => 'comment_id',
			'controller' => 'Nobita_Teams_ControllerPublic_Comment'
		),
		'post-inline-mod' => array(
			'controller' => 'Nobita_Teams_ControllerPublic_InlineMod_Post'
		),
		'team-inline-mod' => array(
			'controller' => 'Nobita_Teams_ControllerPublic_InlineMod_Team'
		),

		// XenGallery routes
		'albums' => array(
			'intId' => 'album_id',
			'title' => 'title',
			'controller' => 'Nobita_Teams_ControllerPublic_XenGallery_Album'
		),
		// XenMedia routes
		'media' => array(
			'intId' => 'media_id',
			'title' => 'media_title',
			'controller' => 'Nobita_Teams_ControllerPublic_XenMedia_Media'
		)
	);

	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$controller = 'Nobita_Teams_ControllerPublic_Team';
		$action = $router->getSubComponentAction($this->_subComponents, $routePath, $request, $controller);

		if ($action === false)
		{
			$parts = explode('/', $routePath);
			$customUrl = reset($parts);

			$customUrl = str_replace('-', '', $customUrl);
			$customUrl = strtolower($customUrl);

			if (in_array($customUrl, Nobita_Teams_Blacklist::$blacklist))
			{
				// sytem action filter out
				$action = $router->resolveActionWithIntegerParam($routePath, $request, 'team_id');
			}
			else
			{
				$action = $router->resolveActionWithIntegerOrStringParam($routePath, $request, 'team_id', 'custom_url');
			}
			$action = $router->resolveActionAsPageNumber($action, $request);
		}

		return $router->getRouteMatch($controller, $action, TEAM_ROUTE_ACTION);
	}

	public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
	{
		$csrf = false;
		if (isset($extraParams['t']))
		{
			$csrf = true;
			unset($extraParams['t']);
		}

		// special params to banning
		if (!empty($data[Nobita_Teams_Banning::BANNING_ID_KEY]))
		{
			$banData = Nobita_Teams_Banning::getBanningParamsFromData($data);
			if ($banData)
			{
				$extraParams['team_id'] = $banData[0];
				$extraParams['type'] = $banData[1];
				$extraParams['user_id'] = $banData[2];
			}
			unset($data[Nobita_Teams_Banning::BANNING_ID_KEY]);
		}

		// comment extraData
		if (!empty($data['comment_type']) && !empty($data['team_id']))
		{
			$extraParams['comment_type'] = $data['comment_type'];
			$extraParams['team_id'] = $data['team_id'];
			$extraParams[$data['comment_type'] . '_id'] = $data['post_id'];
		}

		if ($csrf)
		{
			// set csrf token into last params
			$extraParams['t'] = XenForo_Visitor::getInstance()->csrf_token_page;
		}

		$link = XenForo_Link::buildSubComponentLink($this->_subComponents, $outputPrefix, $action, $extension, $data);

		if (!$link)
		{
			$action = XenForo_Link::getPageNumberAsAction($action, $extraParams);

			if (is_array($data) && !empty($data['custom_url']))
			{
				$link = XenForo_Link::buildBasicLinkWithStringParam($outputPrefix, $action, $extension, $data, 'custom_url');
			}
			else
			{
				if ($data && isset($data['team_title']))
				{
					$data['title'] = $data['team_title'];
				}

				$link = XenForo_Link::buildBasicLinkWithIntegerParam($outputPrefix, $action, $extension, $data, 'team_id', 'title');
			}		
		}
	
		return $link;
	}

}