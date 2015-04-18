<?php

/**
 *
 * @see XenForo_ControllerAdmin_UserGroup
 */
class Waindigo_UserBanners_Extend_XenForo_ControllerAdmin_UserGroup extends XFCP_Waindigo_UserBanners_Extend_XenForo_ControllerAdmin_UserGroup
{

    /**
     *
     * @see XenForo_ControllerAdmin_UserGroup::actionSave()
     */
    public function actionSave()
    {
        $GLOBALS['XenForo_ControllerAdmin_UserGroup'] = $this;

        return parent::actionSave();
    } /* END actionSave */
}