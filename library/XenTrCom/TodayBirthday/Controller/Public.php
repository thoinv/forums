<?php
 class XenTrCom_TodayBirthday_Controller_Public extends XFCP_XenTrCom_TodayBirthday_Controller_Public
{
        public function actionIndex()
        {
                $response = parent::actionIndex();

                if ($response instanceof XenForo_ControllerResponse_View)
                {
                        $XenTrCom_TodayBirthday = XenTrCom_TodayBirthday_Model_XTodayBirthday::XenTrCom_TodayBirthdayArray();
                }

                $response->params += array('XenTrCom_TodayBirthday' => $XenTrCom_TodayBirthday);
                return $response;
        }
}
?>