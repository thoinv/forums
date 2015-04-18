<?php

class Nobita_Teams_WidgetFramework_WidgetRenderer_Suggestions extends WidgetFramework_WidgetRenderer
{
	public function extraPrepareTitle(array $widget)
	{
		if (empty($widget['title']))
		{
			//return new XenForo_Phrase('Teams_team_suggestions');
			if (empty($widget['options']['type']))
			{
				$widget['options']['type'] = 'new';
			}
			
			switch ($widget['options']['type'])
			{
				case 'suggestion':
					return new XenForo_Phrase('Teams_team_suggestions');
				case 'most_message':
					return new XenForo_Phrase('Teams_widget_most_messages');
				case 'most_member':
					return new XenForo_Phrase('Teams_widget_most_members');
				case 'new':
				default:
					return new XenForo_Phrase('Teams_widget_new_teams');
			}
		}

		return parent::extraPrepareTitle($widget);
	}
	
	protected function _getConfiguration()
	{
		return array(
			'name' => '[Nobita] Social Groups (Teams): Suggestions widget',
			'options' => array(
				'limit' => XenForo_Input::UINT,
				'type' => XenForo_Input::STRING
			),
			'useCache' => true,
			'cacheSeconds' => 3600*2, // cache for 2 hours
		);
	}

	protected function _validateOptionValue($optionKey, &$optionValue)
	{
		switch ($optionKey)
		{
			case 'limit':
				if (empty($optionValue))
				{
					$optionValue = 5;
				}
				break;
			case 'type':
				if (empty($optionValue))
				{
					$optionValue = 'new';
				}
				break;
		}

		return parent::_validateOptionValue($optionKey, $optionValue);
	}

	protected function _getOptionsTemplate()
	{
		return 'Teams_wf_widget_options_suggestions';
	}
	
	protected function _getRenderTemplate(array $widget, $positionCode, array $params)
	{
		return 'Team_widget_suggestions';
	}
	
	protected function _render(array $widget, $positionCode, array $params, XenForo_Template_Abstract $renderTemplateObject)
	{
		if (empty($widget['options']['limit']))
		{
			$widget['options']['limit'] = 5;
		}
		if (empty($widget['options']['type']))
		{
			$widget['options']['type'] = 'new';
		}

		$core = WidgetFramework_Core::getInstance();
		$visitor = XenForo_Visitor::getInstance();
		
		$userModel = $core->getModelFromCache('XenForo_Model_User');
		$teamModel = $core->getModelFromCache('Nobita_Teams_Model_Team');
		$memberModel = $core->getModelFromCache('Nobita_Teams_Model_Member');

		$conditions = array(
			'moderated' => false,
			'deleted' => false,
			'privacy_state' => array(Nobita_Teams_Model_Team::PRIVACY_OPEN, Nobita_Teams_Model_Team::PRIVACY_CLOSED)
		);

		$fetchOptions = array(
			'join' => Nobita_Teams_Model_Team::FETCH_PROFILE
						| Nobita_Teams_Model_Team::FETCH_PRIVACY
						| Nobita_Teams_Model_Team::FETCH_CATEGORY,
		);
		switch($widget['options']['type'])
		{
			case 'new':
				$teams = $teamModel->getTeams($conditions, array_merge($fetchOptions, array(
					'order' => 'team_date',
					'direction' => 'desc',
					'limit' => $widget['options']['limit']
				)));
				break;
			case 'most_message':
				$teams = $teamModel->getTeams($conditions, array_merge($fetchOptions, array(
					'order' => 'message_count',
					'direction' => 'desc',
					'limit' => $widget['options']['limit']
				)));
				break;
			case 'most_member':
				$teams = $teamModel->getTeams($conditions, array_merge($fetchOptions, array(
					'order' => 'member_count',
					'direction' => 'desc',
					'limit' => $widget['options']['limit']
				)));
				break;
			case 'suggestion':
				$users = $userModel->getUsersFollowing($visitor['user_id'], array(
					'limit' =>  $widget['options']['limit']*3 // will process later.
				));
				$setup = Nobita_Teams_Setup::getInstance();
				
				$teamIds = $memberModel->getTeamIdsByUserId(array_keys($users));
				$user = $visitor->toArray();

				foreach ($teamIds as $key => &$val)
				{
					if ($setup->getTeamFromVisitor($val, $user))
					{
						unset($teamIds[$key]); // remove team which visitor has joined
					}
				}

				if (empty($users))
				{
					if (empty($teamIds))
					{
						$teams = array();
					}
					else
					{
						$teams = $teamModel->getTeams($conditions, array_merge($fetchOptions, array(
							'team_id' => $teamIds,
							'order' => 'random',
							'limit' => $widget['options']['limit']*3
						)));
					}
				}
				else
				{
					if (empty($teamIds))
					{
						$teams = array();
					}
					else
					{
						$teams = $teamModel->getTeams($conditions, array_merge($fetchOptions, array(
							'team_id' => $teamIds,
							'order' => 'random',
							'limit' => $widget['options']['limit']*3
						)));
					}
				}
				break;

		}

		$teams = $teamModel->filterUnviewableTeams($teams);
		$teams = $teamModel->prepareTeams($teams);
		
		if (count($teams) >  $widget['options']['limit'])
		{
			// too many teams (because we fetched 3 times as needed)
			$teams = array_slice($teams, 0, $widget['options']['limit'], true);
		}
		
		$renderTemplateObject->setParam('teams', $teams);
		return $renderTemplateObject->render();
	}

	public function useUserCache(array $widget)
	{
		if (!empty($widget['options']['as_guest']))
		{
			// using guest permission
			// there is no reason to use the user cache
			return false;
		}

		return parent::useUserCache($widget);
	}
	// i'll build later.
}