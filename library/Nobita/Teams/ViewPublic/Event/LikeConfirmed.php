<?php

class Nobita_Teams_ViewPublic_Event_LikeConfirmed extends XenForo_ViewPublic_Base
{
	public function renderJson()
	{
		$event = $this->_params['event'];

		if (!empty($event['likeUsers']))
		{
			$params = array(
				'message' => $event,
				'likesUrl' => XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/events/likes', $event)
			);

			$output = $this->_renderer->getDefaultOutputArray(get_class($this), $params, 'likes_summary');
		}
		else
		{
			$output = array('templateHtml' => '', 'js' => '', 'css' => '');
		}

		$output += XenForo_ViewPublic_Helper_Like::getLikeViewParams($this->_params['liked']);

		return XenForo_ViewRenderer_Json::jsonEncodeForOutput($output);
	}
}