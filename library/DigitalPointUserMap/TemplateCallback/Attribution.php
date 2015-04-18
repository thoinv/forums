<?php

class DigitalPointUserMap_TemplateCallback_Attribution
{
	/*
	 * Item ID is the numeric identifier for the item in the Digital Point Marketplace
	 * 
	 * For example, this item: https://marketplace.digitalpoint.com/digital-point-spy.993/item
	 * 
	 * ...has an item ID of 993
	 */
	protected static $_itemId = 992;
	
	/*
	 * This should be the HTML of your attribution link that is returned if the user does not have a brand-free license.
	*/
	protected static $_attributionHtml = '<xen:if is="{$controllerName} == \'DigitalPointUserMap_ControllerPublic_Member\' && {$controllerAction} == \'Usermap\'"><div><a href="https://marketplace.digitalpoint.com/digital-point-user-map.992/item" target="_blank">User Map</a> by <a href="https://www.digitalpoint.com/" target="_blank">Digital Point</a></div></xen:if>';
	
	
	
	protected static function _checkBranding($matches)
	{
		$return = @$matches[1];
		
		$client = XenForo_Helper_Http::getClient('https://api.digitalpoint.com/v1/marketplace/branding');
		$client->setParameterGet(array(
			'item_id' => self::$_itemId,
			'url' => XenForo_Application::get('options')->boardUrl
		));

		try
		{
			$response = $client->request('GET');
			$response = @json_decode($response->getBody());
		}
		catch (Exception $e) {
		}
		
		if (!@$response->results->has_brand_removal)
		{			
			$return .= self::$_attributionHtml;
		}
		return $return;
	}
	
	public static function insert($matches)
	{		
		return self::_checkBranding($matches);
	}
}