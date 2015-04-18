<?php
class DigitalPointAdPositioning_Listener_ControllerPostDispatch
{
	public static function loadControllerListener($controller, $controllerResponse, $controllerName, $action)
	{

		$controllerResponse->params['dp_ads'] = array(
			'adsense_restrict' => false,
			'node_id' => @$controllerResponse->params['forum']['node_id']
		);

		if (
			in_array($controllerResponse->params['dp_ads']['node_id'], XenForo_Application::getOptions()->dppa_adsense_blacklist_nodeids) || 
			$controllerName === 'XenForo_ControllerPublic_Register'	||
			$controllerName === 'XenForo_ControllerPublic_Login' ||
			$controllerName === 'XenForo_ControllerPublic_Logout' ||
			@$controllerResponse->responseCode != 200 ||
			@$controllerResponse->params['thread']['block_adsense']
		)
		{
			$controllerResponse->params['dp_ads']['adsense_restrict'] = true;
		}

		elseif ($controllerName === 'XenForo_ControllerPublic_Thread' && in_array($controllerResponse->params['dp_ads']['node_id'], XenForo_Application::getOptions()->dppa_adsense_block_img_nodeids))
		{
			if (!empty($controllerResponse->params['posts']))
			{
				foreach ($controllerResponse->params['posts'] as &$post)
				{
					if (stripos($post['message'], '[IMG') !== false)
					{
						$controllerResponse->params['dp_ads']['adsense_restrict'] = true;
						break;
					}
				}
			}
		}
		
		// allows us to utilize the variable in any template.
		$GLOBALS['adsenseRestrict'] = $controllerResponse->params['dp_ads']['adsense_restrict'];
	}
}