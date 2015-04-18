<?php
/*======================================================================*\
|| #################################################################### ||
|| # Most Online User  1.2
|| # Build: 8
|| # ---------------------------------------------------------------- # ||
|| #################################################################### ||
\*======================================================================*/


class Ragtek_MOU_Extend_ControllerMisc extends
     #XenForo_ControllerPublic_Misc
    XFCP_Ragtek_MOU_Extend_ControllerMisc

{
    public function actionResetMostOnline(){
       $visitor = XenForo_Visitor::getInstance();

        if (!$visitor['is_admin']){
            return $this->responseNoPermission();
        }

        if ($this->isConfirmedPost())
        {

            $this->getModelFromCache('Ragtek_MOU_Model_OnlineUsers')->reset();
            return  $this->responseRedirect(
                XenForo_ControllerResponse_Redirect::SUCCESS,
                $this->getDynamicRedirect(false, false)
            );
        }

        return $this->responseView('View_MostOnlineUserConfirm', 'ragtek_mou_resetconfirm');
    }
}