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
class Nobita_Teams_bdCache_Model_Cache extends XFCP_Nobita_Teams_bdCache_Model_Cache
{
	// to do extend [bd] Cache
	// this will make some page running faster :)
	public function isSupportedRoute($controllerName, $action)
	{
		$supported = parent::isSupportedRoute($controllerName, $action);
		
		if (!$supported)
		{
			$this->_normalizeControllerNameAndAction($controllerName, $action);

			if ($controllerName === 'nobita_teams_controllerpublic_team')
			{
				static $supportedActions = array(
					'index',
					'view'
				);

				if (in_array($action, $supportedActions))
				{
					return true;
				}
			}
		}

		return $supported;
	}


}