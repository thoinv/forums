<?php

class Nobita_Teams_Helper_Photo
{
	/**
	 * @var XenForo_Controller
	 */
	protected static $controller;

	/**
	 * @var XenForo_Input
	 */
	protected static $input;

	/**
	 * @var Nobita_Teams_Setup
	 */
	protected static $setup;

	public static function responseView(XenForo_Controller $controller, XenForo_Input $input, array $params = array())
	{
		self::$controller = $controller;
		self::$input = $input;

		$setup = Nobita_Teams_Setup::getInstance();
		self::$setup = $setup;

		$provider = $setup->getOption('photoProvider');

		if ($provider == 'sonnb_xengallery')
		{
			$params = array_merge($params, self::_sonnbPhotoIndexParams());
		}
		else if ($provider == 'XenGallery')
		{
			$params = array_merge($params, self::_xenMediaPhotoIndexParams($params['team']));
		}

		return $controller->getHelper('Nobita_Teams_ControllerHelper_Team')
			->getTeamViewWrapper('photos', $params['team'], $params['category'],
				$controller->responseView($params['viewName'], $params['templateName'], $params)
			);
	}

	protected static function _sonnbPhotoIndexParams()
	{
		$albumModel = self::$controller->getModelFromCache('Nobita_Teams_Model_XenGallery_Album');

		$options = XenForo_Application::get('options');
		$visitor = XenForo_Visitor::getInstance();

		$galleryAlbumModel = self::$controller->getModelFromCache('sonnb_XenGallery_Model_Album');

		$page = max(1, self::$input->filterSingle('page', XenForo_Input::UINT));
		$albumPerPage = $options->Teams_photosPerPage;

		$order = self::$input->filterSingle('order', XenForo_Input::STRING);
		$orderDirection = self::$input->filterSingle('direction', XenForo_Input::STRING);

		Nobita_Teams_sonnb_XenGallery_Helper::getAlbumSort(
			$order, $orderDirection, $defaultOrder, $defaultOrderDirection
		);

		$conditions = self::_getDefaultConditions($team);
		$fetchElements = self::_getAlbumFetchElements($conditions);

		$albumFetchConditions = $fetchElements['conditions'];
		$albumFetchOptions = $fetchElements['options'] + array(
			'perPage' => $albumPerPage,
			'page' => $page,
			'order' => $order,
			'orderDirection' => $orderDirection
		);

		$totalAlbums = $galleryAlbumModel->countAlbums($albumFetchConditions);

		$pageRoute = TEAM_ROUTE_PREFIX . '/photos';
		self::$controller->canonicalizePageNumber($page, $albumPerPage, $totalAlbums, $pageRoute, $team);

		$albums = $galleryAlbumModel->getAlbums($albumFetchConditions, $albumFetchOptions);
		$albums = $galleryAlbumModel->prepareAlbums($albums, $albumFetchOptions);

		foreach ($albums as $albumId => $album)
		{
			if (!$galleryAlbumModel->canViewAlbum($album))
			{
				unset($albums[$albumId]);
			}
		}
		$albums = $galleryAlbumModel->attachCoversToAlbums($albums, $albumFetchOptions);

		$pageNavParams = array();
		$pageNavParams['order'] = ($order != $defaultOrder ? $order : false);
		$pageNavParams['direction'] = ($orderDirection != $defaultOrderDirection ? $orderDirection : false);

		return array(
			'templateName' => 'Team_photo',
			'viewName' => 'sonnb_XenGallery_ViewPublic_Album_List',

			'canCreateAlbum' => $albumModel->canCreateAlbum(),
			'albums' => $albums,

			'displayMostViewed' => false,

			'order' => $order,
			'orderDirection' => $orderDirection,

			'pageNavParams' => $pageNavParams,
			'page' => $page,

			'canEmbedVideos' => false,

			'albumsPerPage' => $albumPerPage,
			'totalAlbums' => $totalAlbums,
			'pageRoute' => $pageRoute,
			'provider' => 'sonnb_xengallery'
		);
	}

	protected static function _getDefaultConditions(array $team)
	{
		return array(
			'album_type' => sonnb_XenGallery_Model_Album::ALBUM_TYPE_NORMAL,
			'content_count' => array('>', 0),
			'team_id' => $team['team_id']
		);
	}

	/**
	 * @param array $conditions
	 * @return array
	 */
	protected static function _getAlbumFetchElements(array $conditions)
	{
		$albumModel = self::$controller->getModelFromCache('sonnb_XenGallery_Model_Album');
		$visitor = XenForo_Visitor::getInstance();
	
		$albumFetchConditions = $conditions + $albumModel->getPermissionBasedAlbumFetchConditions();

		$albumFetchOptions = array(
			'join' => sonnb_XenGallery_Model_Album::FETCH_USER |
						sonnb_XenGallery_Model_Album::FETCH_COVER_PHOTO,
			'likeUserId' => $visitor['user_id'],
			'watchUserId' => $visitor['user_id'],
			'followingUserId' => $visitor['user_id']
		);
	
		return array(
			'conditions' => $albumFetchConditions,
			'options' => $albumFetchOptions
		);
	}

	/**
	 * @param array $album
	 * @return array
	 */
	protected static function _getAlbumSortFields(array $album)
	{
		return array('title', 'album_date', 'album_updated_date', 'view_count', 'likes', 'comment_count');
	}

	protected static function _xenMediaPhotoIndexParams($team)
	{
		$categoryModel = self::$controller->getModelFromCache('XenGallery_Model_Category');

		$category = $categoryModel->getCategoryById(self::$setup->getOption('XenMediaCategoryId'));
		
		$noPermission = false;
		if (! $category)
		{
			$noPermission = true;
		}
		else if (! $categoryModel->canAddMediaToCategory($category))
		{
			$noPermission = true;
		}

		if ($noPermission)
		{
			return array(
				'templateName' => 'Team_photo',
				'viewName' => '',
				'provider' => 'XenGallery',
				'noPermission' => true
			);
		}

		$mediaModel = self::$controller->getModelFromCache('XenGallery_Model_Media');
		$albumModel = self::$controller->getModelFromCache('XenGallery_Model_Album');

		$order = self::$input->filterSingle('order', XenForo_Input::STRING);
		$type = self::$input->filterSingle('type', XenForo_Input::STRING);

		$page = self::$input->filterSingle('page', XenForo_Input::UINT);
		$perPage = XenForo_Application::getOptions()->xengalleryMediaMaxPerPage;

		$visitor = XenForo_Visitor::getInstance();

		$conditions = array(
			'deleted' => $mediaModel->canViewDeletedMedia(),
			'type' => $type ? $type : 'all',
			'privacyUserId' => $visitor->user_id,
			'viewAlbums' => $albumModel->canViewAlbums(),
			'viewCategoryIds' => $mediaModel->getViewableCategoriesForVisitor($visitor->toArray()),
			'newerThan' => $mediaModel->getMediaHomeCutOff(),
			'social_group_id' => $team['team_id']
		);
		$fetchOptions = self::_getMediaFetchOptions() + array(
			'order' => $order ? $order : 'media_date',
			'orderDirection' => 'desc',
			'page' => $page,
			'perPage' => $perPage
		);

		$fetchOptions['join'] |= XenGallery_Model_Media::FETCH_PRIVACY;

		$media = $mediaModel->getMedia($conditions, $fetchOptions);
		$media = $mediaModel->prepareMediaItems($media);

		$inlineModOptions = $mediaModel->prepareInlineModOptions($media);

		$ignoredNames = array();
		foreach ($media AS $item)
		{
			if (!empty($item['isIgnored']))
			{
				$ignoredNames[] = $item['username'];
			}
		}

		$mediaCount = $mediaModel->countMedia($conditions, $fetchOptions);

		self::$controller->canonicalizePageNumber($page, $perPage, $mediaCount, TEAM_ROUTE_PREFIX . '/photos', $team);
		self::$controller->canonicalizeRequestUrl(
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/photos', $team, array('page' => $page))
		);

		$pageNavParams = array(
			'order' => $order,
			'type' => $type
		);

		return array(
			'templateName' => 'Team_photo',
			'viewName' => '',
			'provider' => 'XenGallery',

			'canViewRatings' => $mediaModel->canViewRatings(),
			//'canViewComments' => $this->_getCommentModel()->canViewComments(),
			'mediaHome' => true,
			'media' => $media,
			'ignoredNames' => array_unique($ignoredNames),
			'mediaCount' => $mediaCount,
			'page' => $page <= 1 ? '' : $page,
			'perPage' => $perPage,
			'pageNavParams' => $pageNavParams,
			'order' => $order,
			'type' => $type,
			'time' => XenForo_Application::$time,
			'showTypeTabs' => $albumModel->canViewAlbums(),
			'inlineModOptions' => $inlineModOptions,
			'userPage' => false
		);
	}

	protected static function _getMediaFetchOptions()
	{
		$visitor = XenForo_Visitor::getInstance();

		$mediaFetchOptions = array(
			'join' => XenGallery_Model_Media::FETCH_USER
				| XenGallery_Model_Media::FETCH_ATTACHMENT
				| XenGallery_Model_Media::FETCH_CATEGORY
				| XenGallery_Model_Media::FETCH_ALBUM,
			'watchUserId' => $visitor->getUserId()
		);

		if ($visitor->hasPermission('xengallery', 'viewDeleted'))
		{
			$mediaFetchOptions['join'] |= XenGallery_Model_Media::FETCH_DELETION_LOG;
		}

		return $mediaFetchOptions;
	}

}