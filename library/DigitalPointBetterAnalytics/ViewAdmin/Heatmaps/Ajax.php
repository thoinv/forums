<?php

class DigitalPointBetterAnalytics_ViewAdmin_Heatmaps_Ajax extends XenForo_ViewAdmin_Base
{
	public function renderJson()
	{
		return XenForo_ViewRenderer_Json::jsonEncodeForOutput($this->_params);
	}
}