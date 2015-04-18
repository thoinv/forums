<?php

class DigitalPointBetterAnalytics_Helper_Api
{
	/**
	 * Item ID is the numeric identifier for the item in the Digital Point Marketplace
	 * 
	 * For example, this item: https://marketplace.digitalpoint.com/better-analytics.1787/item
	 * 
	 * ...has an item ID of 1787
	 **/
	protected static $_itemId = 1787;

	protected static $_addOnId = 'dpBetterAnalytics';

	public static function check($force = false)
	{
		if ($force || XenForo_Application::getoptions()->dpAnalyticsInternal['d'] + 3600 < Xenforo_Application::$time)
		{
			$addOn = XenForo_Model::create('XenForo_Model_AddOn')->getAddOnVersion(self::$_addOnId);

			$client = XenForo_Helper_Http::getClient('https://api.digitalpoint.com/v1/marketplace/licensed.json');
			$client->setParameterGet(array(
				'item_id' => self::$_itemId,
				'url' => XenForo_Application::get('options')->boardUrl,
				'item_version' => $addOn['version_string']
			));

			try {
				$response = $client->request('GET');
				$response = @json_decode($response->getBody());
			} catch (Exception $e) {
			}
			XenForo_Model::create('XenForo_Model_Option')->updateOption('dpAnalyticsInternal', array('d' => XenForo_Application::$time, 'v' => @$response->results->good));

			return @$response->results->good;
		}
		else
		{
			return @XenForo_Application::getoptions()->dpAnalyticsInternal['v'];
		}
	}

}