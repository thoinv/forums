<?php
class XenTrCom_TodayBirthday_ControllerPublic_Index extends XenForo_ControllerPublic_Abstract{
    public function actionIndex(){
        $options = XenForo_Application::get('options');
        if (!$options->xentrcom_todaybirthday_enable){
		    return $this->responseError(new XenForo_Phrase('xen_tr_com_today_birthday_disabled'));
        }
        $todayBirthdayModel = $this->getModelFromCache('XenTrCom_TodayBirthday_Model_XTodayBirthday');
        $todayBirthday = $todayBirthdayModel->XenTrCom_TodayBirthdayArray();
        $viewParams = array(
			'XenTrCom_TodayBirthday' => $todayBirthday
		);
        return $this->responseView('', 'xen_tr_com_today_birthday_index', $viewParams);
    }
}