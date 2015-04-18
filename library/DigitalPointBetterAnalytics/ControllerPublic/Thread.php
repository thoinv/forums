<?php

class DigitalPointBetterAnalytics_ControllerPublic_Thread extends XFCP_DigitalPointBetterAnalytics_ControllerPublic_Thread
{
	public function actionUnread()
	{
		$return = parent::actionUnread();

		if (@get_class($return) == 'XenForo_ControllerResponse_Redirect')
		{
			$input = $this->_input->filter(array(
				'utm_campaign' => XenForo_Input::STRING,
				'utm_medium' => XenForo_Input::STRING,
				'utm_source' => XenForo_Input::STRING,
			));
			if ($input['utm_campaign'] || $input['utm_medium'] || $input['utm_source'])
			{
				if (!$input['utm_campaign'])
				{
					unset($input['utm_campaign']);
				}
				if (!$input['utm_medium'])
				{
					unset($input['utm_medium']);
				}
				if (!$input['utm_source'])
				{
					unset($input['utm_source']);
				}

				$parsed = parse_url($return->redirectTarget);

				@$parsed['query'] = (!empty($parsed['query']) ? $parsed['query'] . '&' : '') . http_build_query($input);

				$return->redirectTarget = (!empty($parsed['scheme']) ? $parsed['scheme'] . '://' : '') . @$parsed['host'] . @$parsed['path'] . '?' . $parsed['query'] . (!empty($parsed['fragment']) ? '#' . $parsed['fragment'] : '');
			}
		}
		return $return;
	}
}