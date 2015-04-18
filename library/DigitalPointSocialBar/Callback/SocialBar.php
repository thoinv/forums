<?php

class DigitalPointSocialBar_Callback_SocialBar
{
	public static function renderTwitterSlugList($contents, $params, $template)
	{
		$slugs = array('' => '(' . new XenForo_Phrase('none') . ')') +
			XenForo_Model::create('DigitalPointSocialBar_Model_SocialBar')->getSlugsFromList();

		$forum = $template->getParam('forum');

		return '<fieldset>' .
				XenForo_Template_Helper_Admin::selectUnit(
					new XenForo_Phrase('twitter_list') . ':',
					'dp_twitter_slug',
					htmlspecialchars(@$forum['dp_twitter_slug'], ENT_QUOTES, 'UTF-8'),
					$slugs,
					array('explain' => new XenForo_Phrase('explain_twitter_list', array('extra' => (XenForo_Application::getOptions()->dpTwitterUsername ? new XenForo_Phrase('explain_twitter_list_2', array('username' => XenForo_Application::getOptions()->dpTwitterUsername)) : '')))),
					array()
				) .
			'</fieldset>';
	}


	protected static function _getTitle($string)
	{
		preg_match('#.*/(.*?)\.([0-9]?)#', $string, $matches);
		return $matches[1];
	}

	public static function renderSocialBar($contents, $params, $template)
	{
		try
		{
			$requestParams = XenForo_Application::getFc()->getRequest()->getParams();
		}
		catch(Exception $e)
		{
			return;
		}

		$route = substr($requestParams['_origRoutePath'], 0, strpos($requestParams['_origRoutePath'], '/'));

		switch (true)
		{
			case isset($requestParams['thread_id']):
				$title = self::_getTitle($requestParams['_matchedRoutePath']);
				$url = XenForo_Link::buildPublicLink('full:threads', array('thread_id' => $requestParams['thread_id'], 'title' => $title));
				break;

			case isset($requestParams['user_id']):
				$title = self::_getTitle($requestParams['_matchedRoutePath']);
				$url = XenForo_Link::buildPublicLink('full:members', array('user_id' => $requestParams['user_id'], 'username' => $title));
				break;

			case isset($requestParams['resource_id']):
				$title = self::_getTitle($requestParams['_matchedRoutePath']);
				$url = XenForo_Link::buildPublicLink('full:resources', array('resource_id' => $requestParams['resource_id'], 'title' => $title));
				break;

			case isset($requestParams['resource_category_id']):
				$title = self::_getTitle($requestParams['_matchedRoutePath']);
				$url = XenForo_Link::buildPublicLink('full:resources/categories', array('resource_category_id' => $requestParams['resource_category_id'], 'category_title' => $title));
				break;

			case substr($route, 0, 9) == 'resources':
				$url = XenForo_Link::buildPublicLink('full:resources');
				break;

			case substr($route, 0, 21) == 'subdomain-marketplace':
				if (isset($requestParams['item_id']) && substr($requestParams['_origRoutePath'], -9) == '/articles')
				{
					$title = self::_getTitle($requestParams['_matchedRoutePath']);
					$url = XenForo_Link::buildPublicLink('subdomain-marketplace/articles', array('article_category_id' => $requestParams['item_id'], 'category_name' => $title));
				}
				elseif (isset($requestParams['item_id']) && substr($requestParams['_origRoutePath'], -8) == '/article')
				{
					$title = self::_getTitle($requestParams['_matchedRoutePath']);
					$url = XenForo_Link::buildPublicLink('subdomain-marketplace/article', array('article_group_id' => $requestParams['item_id'], 'title' => $title));
				}
				elseif (isset($requestParams['item_id']) && substr($requestParams['_origRoutePath'], -9) != '/category')
				{
					$title = self::_getTitle($requestParams['_matchedRoutePath']);
					$url = XenForo_Link::buildPublicLink('subdomain-marketplace/item', array('item_id' => $requestParams['item_id'], 'title' => $title));
				}
				elseif (isset($requestParams['item_id']))
				{
					$title = self::_getTitle($requestParams['_matchedRoutePath']);
					$url = XenForo_Link::buildPublicLink('subdomain-marketplace/category', array('category_id' => $requestParams['item_id'], 'name' => $title));
				}
				else
				{
					$url = XenForo_Link::buildPublicLink('subdomain-marketplace');
				}
				break;
				
			case substr($route, 0, 22) == 'subdomain-advertising':
				$url = XenForo_Link::buildPublicLink('subdomain-advertising');
				break;

			case substr($route, 0, 9) == 'subdomain':
				if (substr_count($requestParams['_origRoutePath'], '/') > 1)
				{
					$url = XenForo_Link::buildPublicLink('full:' . $route);
				}
				else
				{
					$url = XenForo_Link::buildPublicLink('full:' . $requestParams['_origRoutePath']);
				}
				break;
				
			case substr($requestParams['_origRoutePath'], 0, 5) == 'help/':

				$urlBuild = parse_url(XenForo_Link::buildPublicLink('full:help'));
				$url = $urlBuild['scheme'] . '://' . $urlBuild['host'] . '/';
				break;

			default:
				if (!empty($requestParams['node_id']) || !empty($requestParams['node_name']))
				{
					$title = self::_getTitle($requestParams['_matchedRoutePath']);

					if (substr($requestParams['_matchedRoutePath'], 0, 6) == 'pages/')
					{
						$url = XenForo_Link::buildPublicLink('full:pages', array('node_id' => @$requestParams['node_id'], 'node_name' => @$requestParams['node_name'], 'title' => $title));
						break;
					}
					elseif (substr($requestParams['_matchedRoutePath'], 0, 7) == 'forums/')
					{
						$url = XenForo_Link::buildPublicLink('full:forums', array('node_id' => @$requestParams['node_id'], 'node_name' => @$requestParams['node_name'], 'title' => $title));
						break;
					}
				}
				$url = XenForo_Link::buildPublicLink('full:index');
		}

		if (substr($url, 0, 2) == '//')
		{
			$url = 'https:' . $url;
		}

		$forum = $template->getParam('forum');

		if (empty($forum['dp_twitter_slug']))
		{
			$twitterSlug = XenForo_Application::getOptions()->dpTwitterDefaultList;
		}
		else
		{
			$twitterSlug = $forum['dp_twitter_slug'];
		}

		return $template->create('social_bar',
			array (
				'twitter_slug' => $twitterSlug,
				'url' => $url,
				'xenOptions' => XenForo_Application::getOptions()->getOptions()
			)
		)->render();

	}
}