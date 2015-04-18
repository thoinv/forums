<?php

class Nobita_Teams_ControllerPublic_XenGallery_Album extends Nobita_Teams_ControllerPublic_XenGallery_Abstract
{
	public function actionIndex()
	{
		$album = $this->_getAlbumOrError();
		if (empty($album['team_id']))
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
				$this->_buildLink('gallery/albums', $albums)
			);
		}

		list ($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable($album['team_id']);
		$this->_assertCanViewTab($team, $category);

		$options = XenForo_Application::get('options');
		$visitor = XenForo_Visitor::getInstance();

		$albumModel = $this->_getAlbumModel();

		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		
		$order = $this->_input->filterSingle('order', XenForo_Input::STRING);
		$orderDirection = $this->_input->filterSingle('direction', XenForo_Input::STRING);

		Nobita_Teams_sonnb_XenGallery_Helper::getContentSort(
			$order, $orderDirection, $defaultOrder, $defaultOrderDirection
		);

		$contentPerPage = $options->sonnbXG_photoPerPage;
		$commentOnLoad = $options->sonnbXG_commentPerPage;

		$contentFetchCondition = $this->_getContentModel()->getPermissionBasedContentFetchConditions();
		$contentFetchOptions = array(
			'join' => sonnb_XenGallery_Model_Content::FETCH_DATA
				| sonnb_XenGallery_Model_Content::FETCH_PHOTO
				| sonnb_XenGallery_Model_Content::FETCH_VIDEO,
			'likeUserId' => $visitor['user_id'],
			'watchUserId' => $visitor['user_id'],
			'followingUserId' => $visitor['user_id'],
			'perPage' => $contentPerPage,
			'page' => $page,
			'order' => $order,
			'orderDirection' => $orderDirection
		);

		$totalContents = $this->_getContentModel()->countContentsByAlbumId($album['album_id'], $contentFetchCondition, $contentFetchOptions);
		$contents = $this->_getContentModel()->getContentsByAlbumId($album['album_id'], $contentFetchCondition, $contentFetchOptions);
		$contents = $this->_getContentModel()->prepareContents($contents, $contentFetchOptions);

		if (!empty($contents))
		{
			$album['contents'] = array_slice($contents, 0, 4);
		}

		foreach ($contents as $_contentId => $_content)
		{
			if (!$_content['canView'])
			{
				unset($contents[$_contentId]);
			}
		}

		if ($commentOnLoad > 0)
		{
			$commentConditions = array(
				'content_id' => $album['album_id'],
				'content_type' => sonnb_XenGallery_Model_Album::$contentType
			)+$this->_getCommentModel()->getPermissionBasedCommentFetchConditions();
			$commentFetchOptions = array(
				'join' => sonnb_XenGallery_Model_Comment::FETCH_USER,
				'likeUserId' => $visitor['user_id'],
				'limit' => $commentOnLoad,
				'order' => 'comment_date',
				'orderDirection' => 'desc'
			);
			$album['comments'] = $this->_getCommentModel()->getComments($commentConditions, $commentFetchOptions);
			$album['comments'] = $this->_getCommentModel()->prepareComments($album['comments'], $commentFetchOptions);
			$album['comments'] = array_reverse($album['comments'], true);
		}
		
		if (!empty($album['comments']))
		{
			$firstShownComment = reset($album['comments']);
			$firstShownCommentDate = $firstShownComment['comment_date'];
			$lastShownComment = end($album['comments']);
			$lastShownCommentDate = $lastShownComment['comment_date'];
		}
		else
		{
			$firstShownCommentDate = 0;
			$lastShownCommentDate = 0;
		}

		/*
		 * Get page params for default sort, just for future use.
		 */
		$pageNavParams = array();
		$pageNavParams['order'] = ($order != $defaultOrder ? $order : false);
		$pageNavParams['direction'] = ($orderDirection != $defaultOrderDirection ? $orderDirection : false);

		$albumModel->logAlbumView($album['album_id']);

		$inlineModOptions = $this->_getContentModel()->getInlineModeration();

		$XG_category = null;
		$XG_categories = $this->_getCategoryModel()->getAllCachedCategories();
		if (isset($XG_categories[$album['category_id']]))
		{
			$XG_category = $XG_categories[$album['category_id']];
		}
		$fields = $this->_getFieldModel()->getApplicableFieldsByContentId(
			sonnb_XenGallery_Model_Album::$contentType,
			$album['album_id'],
			$XG_category,
			true,
			false
		);

		$viewParams = array(
			'album' => $album,
			'team' => $team,
			'category' => $category,

			'inlineModOptions' => $inlineModOptions,
			'contents' => $contents,

			'order' => $order,
			'orderDirection' => $orderDirection,

			'pageNavParams' => $pageNavParams,
			'page' => $page,

			'photosPerPage' => $contentPerPage,
			'totalPhotos' => $totalContents,

			'commentOnLoad' => $commentOnLoad,
			'firstShownCommentDate' => $firstShownCommentDate,
			'lastShownCommentDate' => $lastShownCommentDate,
			'commentShownCount' => $album['comment_count'] > $commentOnLoad ? $commentOnLoad : $album['comment_count'],

			'canEmbedVideos' => $this->_getGalleryModel()->canEmbedVideo(),

			'includeTaggerJs' => $this->_getGalleryModel()->includeJsTagger(),
			'XenGallery_categories' => $XG_categories,
			'XenGallery_category' => $XG_category
		);
		return $this->_getTeamHelper()->getTeamViewWrapper('photos', $team, $category,
			$this->responseView('sonnb_XenGallery_ViewPublic_Album_View', 'Team_xengallery_album_view', $viewParams)
		);
	}

	public function actionCreate()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->_getTeamAlbumModel()->canCreateAlbum($error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$albumPrivacy = array(
			'allow_view' => 'everyone',
			'allow_comment' => 'everyone',
			'allow_download' => 'everyone',
			'allow_add_photo' => 'none',
			'allow_add_video' => 'none'
		);

		$album = array(
			'album_id' => 0,
			'title' => '',
			'description' => '',
			'album_state' => 'visible',
			'category_id' => 0,
			'collection_id' => 0,
			'album_location' => '',
			'cover_content_id' => 0,

			'album_privacy' => $albumPrivacy
		);

		return $this->_getAlbumEditOrResponse($album, $team, $category);
	}

	protected function _getAlbumEditOrResponse(array $album, array $team, array $category)
	{
		$this->_assertCanViewTab($team, $category);
		$this->_assertCanUploadContents();

		$xenOptions = XenForo_Application::getOptions();

		$contents = array();
		$totalPhotos = 0;

		$contentPerPage = $xenOptions->sonnbXG_photoPerPage;
		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));

		$contentDataParams = array(
			'hash' => md5(uniqid('', true)),
			'album_id' => $album['album_id']
		);

		if (!empty($album['album_id']))
		{
			$totalPhotos = $album['content_count'];
			$conditions = $this->_getContentModel()->getPermissionBasedContentFetchConditions();
			$contentFetchOptions = array(
				'join' => sonnb_XenGallery_Model_Content::FETCH_DATA
							| sonnb_XenGallery_Model_Content::FETCH_PHOTO
							| sonnb_XenGallery_Model_Content::FETCH_VIDEO,
				'page' => $page,
				'perPage' => $contentPerPage
			);

			$contents = $this->_getContentModel()->getContentsByAlbumId($album['album_id'], $conditions, $contentFetchOptions);
			$contents = $this->_getContentModel()->prepareContents($contents, $contentFetchOptions);

			foreach ($contents as $contentId => $content)
			{
				if (!$this->_getContentModel()->canViewContent($content))
				{
					unset($contents[$contentId]);
				}
			}
		}

		$viewParams = array(
			'team' => $team,
			'category' => $category,

			'album' => $album,

			'contents' => $contents,
			'page' => $page,
			'perPage' => $contentPerPage,
			'pageNavParams' => array(),
			'totalPhotos' => $totalPhotos,
			'canEmbedVideos' => $this->_getGalleryModel()->canEmbedVideo(),
			'disableLocation' => $xenOptions->sonnb_XG_disableLocation,

			'contentDataParams' => $contentDataParams,
			'photoDataConstraints' => $this->_getPhotoModel()->getPhotoDataConstraints($xenOptions->sonnbXG_enableResize ? true: false),

			'categories' => $this->_getCategoryModel()->getAllCachedCategories(),
			'group_albumPrivacy' => 1
		);

		return $this->_getTeamHelper()->getTeamViewWrapper('photos', $team, $category,
			$this->responseView('sonnb_XenGallery_ViewPublic_Album_Edit', 'sonnb_xengallery_album_edit', $viewParams)
		);
	}

	public function actionEdit()
	{
		$album = $this->_getAlbumOrError();
		if (!$album['canEdit'])
		{
			throw $this->_throwFriendlyNoPermission('sonnb_xengallery_you_do_not_have_permission_to_edit_this_album');
		}
		if (!empty($album['albumStreams']))
		{
			$album['stream_name'] = implode(', ', $album['albumStreams']);
		}

		list ($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable($album['team_id']);
		return $this->_getAlbumEditOrResponse($album, $team, $category);
	}

	protected function _assertCanViewTab(array $team, array $category)
	{
		if (!$this->_getTeamModel()->canViewTabAndContainer('photos', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
	}

	protected function _getAlbumOrError($albumId = null, $fetchCover = false)
	{
		if ($albumId === null)
		{
			$albumId = $this->_input->filterSingle('album_id', XenForo_Input::UINT);
		}

		$fetchElements = $this->_getAlbumFetchElements();

		/* @var $galleryHelper sonnb_XenGallery_ControllerHelper_Gallery */
		$galleryHelper = $this->getHelper('sonnb_XenGallery_ControllerHelper_Gallery');

		$album = $galleryHelper->assertAlbumValidAndViewable($albumId, $fetchElements['options']);

		if ($fetchCover)
		{
			$album = $this->_getAlbumModel()->attachCoverToAlbum($album, $fetchElements['options']);
		}

		return $album;
	}

	protected function _getAlbumFetchElements(array $conditions = array())
	{
		$albumModel = $this->_getAlbumModel();
		$visitor = XenForo_Visitor::getInstance();
	
		$albumFetchConditions = $conditions + $albumModel->getPermissionBasedAlbumFetchConditions();

		$albumFetchOptions = array(
			'join' => sonnb_XenGallery_Model_Album::FETCH_USER | sonnb_XenGallery_Model_Album::FETCH_COVER_PHOTO,
			'likeUserId' => $visitor['user_id'],
			'watchUserId' => $visitor['user_id'],
			'followingUserId' => $visitor['user_id']
		);
	
		return array(
			'conditions' => $albumFetchConditions,
			'options' => $albumFetchOptions
		);
	}

	protected function _getTeamAlbumModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_XenGallery_Album');
	}
}