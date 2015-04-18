<?php

class OpenGraphImage_Callback
{
	public static function getImage($content, $params, XenForo_Template_Abstract $template)
	{
		$posts = $template->getParam('posts');

		if (!count($posts))
		{
			return $content;
		}

		$visitor = XenForo_Visitor::getInstance();

		$matches = array();
		
		foreach ($posts AS $post)
		{
			if (XenForo_Permission::hasPermission($visitor['permissions'], 'forum', 'viewAttachment'))
			{
				preg_match('#\[attach(=[^\]]*)?\](?P<id>\d+)(\D.*)?\[/attach\]#iU', $post['message'], $matches);

				if (!empty($matches[2]))
				{
					$link = XenForo_Link::buildPublicLink('full:attachments', array('attachment_id' => $matches[2]));

					if (!empty($link))
					{
						return $link;
					}
				}
			}

			preg_match('/\[(img|IMG)\]\s*(https?:\/\/([^*\r\n]+|[a-z0-9\/\\\._\- !]+))\[\/(img|IMG)\]/', $post['message'], $matches);

			if (!empty($matches[2]))
			{
				return $matches[2];
			}
		}
		
		return $content;
	}
}