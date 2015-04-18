<?php

class XenPlaza_XPDaysLimit_ControllerPublic_Forum extends XFCP_XenPlaza_XPDaysLimit_ControllerPublic_Forum
{
	public function actionAddThread()
    {
		$this->_assertPostOnly();
		$input['message'] = $this->getHelper('Editor')->getMessageText('message', $this->_input);
		$input['message'] = XenForo_Helper_String::autoLinkBbCode($input['message']);
		
		
		$str = strtoupper($input['message']);
		$numberLink = substr_count($str, '[/URL]');
		
		$visitor = XenForo_Visitor::getInstance();
		$daysRegistered = XenForo_Permission::hasPermission($visitor['permissions'], 'forum', 'daysRegistered');
		
		if($daysRegistered && $daysRegistered > 0)
		{
			$canPostLink = $visitor['register_date'] + $daysRegistered*60*60*24;
			if($canPostLink > XenForo_Application::$time && $numberLink)
			{
				return $this->responseError(new XenForo_Phrase('XP_you_must_wait_x_days_to_post_link',array('days'=>$daysRegistered)));
			}
		}
		
		return parent::actionAddThread();
    }
}