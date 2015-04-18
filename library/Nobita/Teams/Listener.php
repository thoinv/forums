<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
$teamSetup = Nobita_Teams_Setup::getInstance();
$constants = array(
	'TEAM_DATAREGISTRY_KEY' => 'Teams_group_perms',
	'TEAM_ROUTE_PREFIX' 	=> $teamSetup->getOption('routePrefix'),
	'TEAM_ROUTE_ACTION' 	=> $teamSetup->getOption('routePrefix')
);

foreach($constants as $defineName => $defineValue) {
	if (!defined($defineName)) define($defineName, $defineValue);
}

class Nobita_Teams_Listener
{
	const TEAM_CONTROLLERPUBLIC_FORUM_ADDTHREAD 		= 'Nobita_Teams_XenForo_ControllerPublic_Forum::actionAddThread';
	const XENGALLERY_CONTROLLERPUBLIC_ALBUM_ACTIONSAVE 	= 'Nobita_Teams_sonnb_XenGallery_ControllerPublic_XenGallery_Album::actionSave';

	public static function loadControllers($class, array &$extend)
	{
		static $_classes = array(
			'XenForo_ControllerPublic_SpamCleaner',
			'XenForo_ControllerPublic_Forum',
			'XenForo_ControllerPublic_Thread',

			'XenForo_Model_Post',
			'XenForo_Model_Forum',
			'XenForo_Model_Thread',
			'XenForo_Model_Import',

			'XenForo_DataWriter_Forum',
			'XenForo_DataWriter_User',
			'XenForo_DataWriter_Discussion_Thread',

			'XenForo_BbCode_Formatter_BbCode_Filter',

			// required addon: [bd] Cache
			'bdCache_Model_Cache',

			// sonnb XenGallery
			'sonnb_XenGallery_Model_Album',
			'sonnb_XenGallery_ControllerPublic_XenGallery',
			'sonnb_XenGallery_ControllerPublic_XenGallery_Author',
			'sonnb_XenGallery_ControllerPublic_XenGallery_Album',
			'sonnb_XenGallery_DataWriter_Album',

			// XenMedia
			'XenGallery_ControllerPublic_Media',
			'XenGallery_DataWriter_Media',
			'XenGallery_Model_Media',
			'XenGallery_ViewPublic_Media_Wrapper'
		);

		if (in_array($class, $_classes))
		{
			$extend[] = 'Nobita_Teams_' . $class;
		}

		if ($class === 'XenForo_Model_Import')
		{
			XenForo_Model_Import::$extraImporters['nSocialGroups_wSocial'] = 'Nobita_Teams_Importer_Waindigo_Social';
		}
	}

	public static function controller_post_dispatch(XenForo_Controller $controller, $controllerResponse, $controllerName, $action)
	{
		$type = $controller->getInput()->filterSingle('type', XenForo_Input::STRING);
		if (empty($type))
			$type = $controller->getInput()->filterSingle('t', XenForo_Input::STRING);

		if ('team' == $type)
		{
			$controller->getRouteMatch()->setSections(TEAM_ROUTE_ACTION);
		}
	}
	
	public static function threadViewDispatch(XenForo_Controller $controller, $response, $controllerName, $action)
	{
		if (!($response instanceof XenForo_ControllerResponse_View))
		{
			return;
		}

		if ($response->viewName != 'XenForo_ViewPublic_Thread_View' || empty($response->params['thread']))
		{
			return;
		}

		$thread = $response->params['thread'];

		if ($thread['discussion_type'] != 'team' || !XenForo_Visitor::getInstance()->hasPermission('Teams', 'view'))
		{
			return;
		}
		
		if (!$thread['team_id'])
		{
			return;
		}
		
		$teamModel = $controller->getModelFromCache('Nobita_Teams_Model_Team');

		$team = $teamModel->getFullTeamById($thread['team_id'], array(
			'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
		));
		if (!$team)
		{
			return;
		}

		if (!$teamModel->canViewTeamAndContainer($team, $team))
		{
			return;
		}
		$team = $teamModel->prepareTeam($team, $team);
		//$team = $teamModel->prepareTeamCustomFields($team, $team);

		$response->params['team'] = $team;
	}

	public static function widget_framework(array &$renderers)
	{
		// support widget framework.
		$renderers[] = 'Nobita_Teams_WidgetFramework_WidgetRenderer_Suggestions';
	}

	protected static $_addedUsernameChange = false;
	public static function loadUserModel($class, array &$extend)
	{
		if (!self::$_addedUsernameChange)
		{
			self::$_addedUsernameChange = true;
			XenForo_Model_User::$userContentChanges['xf_team'] = array(array('user_id', 'username'));
			XenForo_Model_User::$userContentChanges['xf_team_post_comment'] = array(array('user_id', 'username'));
			XenForo_Model_User::$userContentChanges['xf_team_member'] = array(array('user_id', 'username'), array('action_user_id', 'action_username'));
			XenForo_Model_User::$userContentChanges['xf_team_post'] = array(array('user_id', 'username'));

			// 1.0.7
			XenForo_Model_User::$userContentChanges['xf_team_category_watch'] = array(array('user_id'));

			XenForo_Model_User::$userContentChanges['xf_team_ban'] = array(array('user_id'), array('ban_user_id'));
			XenForo_Model_User::$userContentChanges['xf_team_event'] = array(array('user_id', 'username'));
		}
		
		$extend[] = 'Nobita_Teams_' . $class;
	}

	public static function template_hook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		switch($hookName)
		{
			case 'search_form_tabs':
				$contents .= $template->create('Team_search_form_tabs_team', $template->getParams())->render();
				break;
			case 'member_view_tabs_heading':
				$contents .= $template->create('Team_member_view_tabs_heading', $template->getParams())->render();
				break;
			case 'member_view_tabs_content':
				$contents .= $template->create('Team_member_view_tabs_content', $template->getParams())->render();
				break;
			case 'message_user_info_text':
				$params = $template->getParams();
				$params += $hookParams;

				$contents .= $template->create('Team_message_user_info_text', $params)->render();
				break;
			case 'account_alerts_extra':
				$contents .= $template->create('Team_account_alert_preferences', $template->getParams())->render();
				break;
			case 'thread_view_tools_links':
				$contents .= $template->create('Team_thread_view_tools_links', $template->getParams())->render();
				break;
			case 'Team_sidebar_before_stats':
				$params = $template->getParams();
				if (!empty($params['_subView']) && ($params['_subView'] instanceof XenForo_Template_Public))
				{
					$subView = $params['_subView'];
					if ($subView->getTemplateName() == 'Team_event_list')
					{
						$params = array_merge($params, $subView->getParams());
						$contents .= $template->create('Team_event_list_sidebar', $params)->render();
					}
				}

				break;
			case 'member_view_info_block':
			case 'member_card_stats':
				$params = $template->getParams();
				$params += $hookParams;

				$params['_view_hook'] = $hookName;
				$contents .= $template->create('Team_user_view_info', $params)->render();
				break;
			//case 'member_card_stats'
			// admin CP
			case 'user_criteria_content':
				$contents .= $template->create('Team_user_criteria_extra', $template->getParams())->render();
				break;
		}
	}

	protected static $_canViewTeams;
	public static function template_create(&$templateName, array &$params, XenForo_Template_Abstract $template)
	{
		if (self::$_canViewTeams === null)
		{
			self::$_canViewTeams = XenForo_Visitor::getInstance()->hasPermission('Teams', 'view');
		}

		if (!array_key_exists('canViewTeams', $params))
		{
			$params['canViewTeams'] = self::$_canViewTeams;
		}

		switch ($templateName) 
		{
			case 'member_view':
				if (self::$_canViewTeams)
				{
					$template->preloadTemplate('Team_member_view_tabs_content');
					$template->preloadTemplate('Team_member_view_tabs_heading');
				}

				$template->preloadTemplate('Team_user_view_info');
				break;
			
			case 'search_form':
				if (self::$_canViewTeams)
				{
					$template->preloadTemplate('Team_search_form_tabs_team');
				}
				break;
			case 'thread_view':
				$template->preloadTemplate('Team_message_user_info_text');
				$template->preloadTemplate('Team_thread_view_tools_links');
				break;
			case 'Team_event_list':
				$template->preloadTemplate('Team_event_list_sidebar');
				break;
		}
	}

	public static function navigation_tabs(array &$extraTabs, $selectedTabId)
	{
		if (self::$_canViewTeams)
		{
			$extraTabs[TEAM_ROUTE_ACTION] = array(
				'href' => XenForo_Link::buildPublicLink("full:" . TEAM_ROUTE_PREFIX),
				'title' => new XenForo_Phrase("Teams_teams"),
				'position' => "middle",
				'selected' => ($selectedTabId == TEAM_ROUTE_PREFIX),
				'linksTemplate' => 'Team_navigation_tab_links'
			);
		}
		
	}

	public static function template_post_render($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
	{
		if ($template instanceof XenForo_Template_Admin)
		{
			if ($templateName == "tools_rebuild")
			{
				$content .= $template->create('Team_tools_rebuild', $template->getParams())->render();
			}

			if ($templateName == 'option_list')
			{
				$params = $template->getParams();
				if ($params['group'] && $params['group']['group_id'] == 'nobita_Teams')
				{
					$content = $template->create('Team_option_list', $params)->render();
				}
			}
		}
		
	}

	public static function init_dependencies(XenForo_Dependencies_Abstract $dependencies, array $data)
	{
		//XenForo_Model_Import::$extraImporters['teamImporter'] = 'Nobita_Teams_Importer_xFGroupsPaid';
		if ($dependencies instanceof XenForo_Dependencies_Public)
		{
			// define syntax: {xen:helper teamavatar $variable}
			XenForo_Template_Helper_Core::$helperCallbacks['teamavatar'] = array(
				'Nobita_Teams_Template_Helper_Core', 
				'helperAvatarUrl'
			);
		
			// helper to get routePrefix
			XenForo_Template_Helper_Core::$helperCallbacks['route_prefix'] = array(
				'Nobita_Teams_Template_Helper_Core', 
				'routePrefix'
			);
	
			XenForo_Template_Helper_Core::$helperCallbacks['commenttext'] = array(
				'Nobita_Teams_Template_Helper_Core',
				'helperCommentBodyText'
			);
			
			XenForo_Template_Helper_Core::$helperCallbacks['teamcover'] = array(
				'Nobita_Teams_Template_Helper_Core',
				'helperCoverUrl'
			);

			XenForo_Template_Helper_Core::$helperCallbacks['teamfieldtitle'] = array(
				'Nobita_Teams_ViewPublic_Helper_Team', 'getTeamFieldTitle'
			);

			XenForo_Template_Helper_Core::$helperCallbacks['teamfieldvalue'] = array(
				'Nobita_Teams_ViewPublic_Helper_Team', 'getTeamFieldValueHtml'
			);
		}
		else
		{
			//XenForo_CacheRebuilder_Abstract::$builders['Team'] = 'Nobita_Teams_CacheRebuilder_Team';
			//XenForo_CacheRebuilder_Abstract::$builders['TeamCategory'] = 'Nobita_Teams_CacheRebuilder_Category';
		}
		
		XenForo_Template_Helper_Core::$helperCallbacks['teamcategoryicon'] = array(
			'Nobita_Teams_Template_Helper_Core', 'helperCategoryIcon'
		);
	}

	public static function criteria_user($rule, array $data, array $user, &$returnValue)
	{
		if ($rule == 'team_created')
		{
			if (array_key_exists('team_count', $user) && $user['team_count'] == intval($data['teams']))
			{
				$returnValue = true;
			}
		}

	}

	public static function file_health_check(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
	{
		$hashes += Nobita_Teams_FileSums::getHashes();
	}
}