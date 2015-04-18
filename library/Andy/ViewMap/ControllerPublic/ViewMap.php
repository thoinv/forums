<?php

class Andy_ViewMap_ControllerPublic_ViewMap extends XenForo_ControllerPublic_Abstract
{	
	public function actionIndex()
	{
		// get options from Admin CP -> Options -> View Map -> Location
		$location = XenForo_Application::get('options')->viewMapLocation;
				
		// get coordinate from URL
		$coordinates = $this->_input->filterSingle('coordinates', XenForo_Input::STRING);
		
		// get default coordinates
		if ($coordinates == '')
		{
			// get options from Admin CP -> Options -> View Map -> Location
			$coordinates = XenForo_Application::get('options')->viewMapDefaultCoordinates;		
		}
		
		// throw error if data is missing
		if ($location == '' OR $coordinates == '')
		{
			return $this->responseError(new XenForo_Phrase('viewmap_default_location_or_coordinates_missing_in_options'));
		}
		
		// redirect to viewmap.php location
		header ('location: ' . $location . '?coordinates=' . $coordinates);
		
		// exit
		exit();	
	}
}