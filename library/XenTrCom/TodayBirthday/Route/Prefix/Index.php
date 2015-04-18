<?php
class XenTrCom_TodayBirthday_Route_Prefix_Index implements XenForo_Route_Interface{
    public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router){
        return $router->getRouteMatch('XenTrCom_TodayBirthday_ControllerPublic_Index', $routePath, 'xen_tr_com_today_birthday_index');
    }
}