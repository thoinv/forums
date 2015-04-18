<?php

class Andy_UserAgent_ControllerPublic_UserAgent extends XenForo_ControllerPublic_Abstract
{	
	public function actionIndex()
	{		
		// get userId
		$userId = XenForo_Visitor::getUserId();
		
		// throw error if no userId
		if ($userId == '')
		{
			throw $this->getNoPermissionResponseException();
		}	
				
		// get user group permission
		if (!XenForo_Visitor::getInstance()->hasPermission('userAgentGroupID', 'userAgentID'))
		{
			throw $this->getNoPermissionResponseException();
		}				

		// get results	
		$results = $this->getModelFromCache('Andy_UserAgent_Model')->getResults();
		
		// get total
		$total = count($results);	
		
		// get options from Admin CP -> Options -> User Agent -> Hours
		$hours = XenForo_Application::get('options')->userAgentHours;				
		
		// define variables
		$chrome = 0;
		$firefox = 0;
		$msie = 0;
		$safari = 0;
		
		$android = 0;
		$ipad = 0;
		$iphone = 0;
		
		// get browser totals
		foreach ($results as $k => $v)
		{ 
			// chrome
			$pos1 = stripos($v['user_agent'], "Chrome");
			$pos2 = stripos($v['user_agent'], "Safari");
			if (is_numeric($pos1) AND is_numeric($pos2))
			{
				$chrome = $chrome + 1;
			}
					
			// firefox
			$pos1 = stripos($v['user_agent'], "Firefox");
			if (is_numeric($pos1))
			{
				$firefox = $firefox + 1;
			}
					
			// internet explorer
			$pos1 = stripos($v['user_agent'], "MSIE");
			if (is_numeric($pos1))
			{
				$msie = $msie + 1;
			}
			
			// safari
			$pos1 = stripos($v['user_agent'], "Safari");
			$pos2 = stripos($v['user_agent'], "Chrome");
			if (is_numeric($pos1) AND !is_numeric($pos2))
			{
				$safari = $safari + 1;
			}
			
			// android
			$pos1 = stripos($v['user_agent'], "android");
			if (is_numeric($pos1))
			{
				$android = $android + 1;
			}				
			
			// ipad
			$pos1 = stripos($v['user_agent'], "ipad");
			if (is_numeric($pos1))
			{
				$ipad = $ipad + 1;
			}
			
			// iphone
			$pos1 = stripos($v['user_agent'], "iphone");
			if (is_numeric($pos1))
			{
				$iphone = $iphone + 1;
			}									
		}		
		
		// prepare viewParams
		$viewParams = array(
			'total' => $total,
			'hours' => $hours,
			'results' => $results,
			'chrome' => $chrome,
			'firefox' => $firefox,
			'msie' => $msie,
			'safari' => $safari,
			'android' => $android,
			'ipad' => $ipad,
			'iphone' => $iphone
		);		
		
		// send to template
		return $this->responseView('Andy_UserAgent_ViewPublic_UserAgent', 'andy_useragent', $viewParams);
	}
}