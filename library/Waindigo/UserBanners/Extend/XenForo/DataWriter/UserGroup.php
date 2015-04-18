<?php

/**
 *
 * @see XenForo_DataWriter_UserGroup
 */
class Waindigo_UserBanners_Extend_XenForo_DataWriter_UserGroup extends XFCP_Waindigo_UserBanners_Extend_XenForo_DataWriter_UserGroup
{

    /**
     *
     * @see XenForo_DataWriter_UserGroup::_getFields()
     */
    protected function _getFields()
    {
        $fields = parent::_getFields();

        $fields['xf_user_group']['banner_description_waindigo'] = array(
            'type' => self::TYPE_STRING,
            'default' => ''
        );

        return $fields;
    } /* END _getFields */

    /**
     *
     * @see XenForo_DataWriter_UserGroup::_preSave()
     */
    protected function _preSave()
    {
        if (!empty($GLOBALS['XenForo_ControllerAdmin_UserGroup'])) {
            /* @var $controller XenForo_ControllerAdmin_UserGroup */
            $controller = $GLOBALS['XenForo_ControllerAdmin_UserGroup'];

            $input = $controller->getInput()->filter(
                array(
                    'banner_description_waindigo' => XenForo_Input::STRING,
                    'banner_description_waindigo_shown' => XenForo_Input::UINT
                ));
            if ($input['banner_description_waindigo_shown']) {
                $this->set('banner_description_waindigo', $input['banner_description_waindigo']);
            }
        }

        parent::_preSave();
    } /* END _preSave */

    protected function _postSave()
    {
        parent::_postSave();

        if ($this->isChanged('banner_css_class') || $this->isChanged('banner_text') ||
             $this->isChanged('display_style_priority')) {
            // user banner cache already rebuilt
        } elseif ($this->isChanged('banner_description_waindigo')) {
            $this->_getUserGroupModel()->rebuildUserBannerCache();
        }
    } /* END _postSave */
}