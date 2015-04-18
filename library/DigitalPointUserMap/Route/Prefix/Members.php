<?php

class DigitalPointUserMap_Route_Prefix_Members extends XFCP_DigitalPointUserMap_Route_Prefix_Members
{
	public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
	{
		if ($action === 'usermap' || $action === 'google-earth')
		{
			return 'members/' . $action;
		}
		else
		{
			return parent::buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, $extraParams);
		}
	}
}