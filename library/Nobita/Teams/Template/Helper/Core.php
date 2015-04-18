<?php

class Nobita_Teams_Template_Helper_Core
{
	public static function helperAvatarUrl(array $team, $canonical = false)
	{
		$url = self::getAvatarUrl($team);

		if ($canonical)
		{
			$url = XenForo_Link::convertUriToAbsoluteUri($url, true);
		}

		return htmlspecialchars($url);
	}
	

	public static function getAvatarUrl(array $team)
	{
		if (!empty($team['team_id']) && !empty($team['team_avatar_date']))
		{
			return self::_getCustomAvatarUrl($team);
		}

		return self::_getDefaultAvatarUrl();
	}


	protected static function _getDefaultAvatarUrl()
	{
		return "styles/Nobita/Teams/avatars/avatar_l.jpg";
	}
	
	/**
	 * Returns the URL to a team's custom avatar
	 *
	 * @param array $team
	 * @param string $size (s,m,l)
	 *
	 * @return string
	 */
	protected static function _getCustomAvatarUrl(array $team)
	{
		$group = floor($team['team_id'] / 1000);

		return XenForo_Application::$externalDataUrl
			. "/nobita/teams/avatars/$group/$team[team_id].jpg?$team[team_avatar_date]";
	}

	public static function helperCoverUrl(array $team, array $category = null, $fullSource = 1)
	{
		
		if (empty($team['team_id']))
		{
			return 'styles/Nobita/Teams/default.png';
		}

		$group = floor($team['team_id'] / 1000);
		if ($team['cover_date'])
		{
			if ($fullSource)
			{
				return XenForo_Application::$externalDataUrl . "/nobita/teams/covers/$group/$team[team_id].jpg?$team[cover_date]";
			}
			else
			{
				return XenForo_Application::$externalDataUrl
					. "/nobita/teams/covers/$group/$team[team_id]_$team[cover_date]_crop.jpg?$team[cover_date]";
			}
		}
		
		$default = 'styles/Nobita/Teams/default.png';
		if ($category === null)
		{
			$category = array(
				'team_category_id' => $team['team_category_id'],
				'default_cover_path' => $team['default_cover_path']
			);
		}

		return empty($category['default_cover_path']) ? $default : $category['default_cover_path'];
	}

	public static function helperCategoryIcon(array $category)
	{
		if (!$category['icon_date'])
		{
			return '';
		}
		
		$group = floor($category['team_category_id'] / 1000);
		$iconPath = XenForo_Application::$externalDataUrl 
			. "/nobita/teams/category_icons/$group/$category[team_category_id].jpg?$category[icon_date]";
		
		return "<img src='$iconPath' alt='' />";
	}

	public static function routePrefix($full = false)
	{
		if ($full)
		{
			return 'full:' . Nobita_Teams_Model_Team::routePrefix();
		}

		return Nobita_Teams_Model_Team::routePrefix();
	}
}