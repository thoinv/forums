<?php

/**
 *
 * @see XenForo_Model_UserGroup
 */
class Waindigo_UserBanners_Extend_XenForo_Model_UserGroup extends XFCP_Waindigo_UserBanners_Extend_XenForo_Model_UserGroup
{

    /**
     *
     * @see XenForo_Model_UserGroup::rebuildUserBannerCache()
     */
    public function rebuildUserBannerCache()
    {
        $cache = parent::rebuildUserBannerCache();

        $userGroups = $this->getAllUserGroups();

        $updateRegistry = false;
        foreach ($userGroups as $userGroupId => $userGroup) {
            if (!empty($cache[$userGroupId]) && !empty($userGroup['banner_description_waindigo'])) {
                $updateRegistry = true;
                $cache[$userGroupId]['text'] = '<a class="Tooltip" text="Test" title="' . $userGroup['banner_description_waindigo'] . '">' .
                     $cache[$userGroupId]['text'] . '</a>';
            }
        }

        if ($updateRegistry) {
            $this->_getDataRegistryModel()->set('userBanners', $cache);
        }

        return $cache;
    } /* END rebuildUserBannerCache */
}