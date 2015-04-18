<?php

/**
 *
 * @see XenForo_DataWriter_AddOn
 */
class Waindigo_Tabs_Extend_XenForo_DataWriter_AddOn extends XFCP_Waindigo_Tabs_Extend_XenForo_DataWriter_AddOn
{

    /**
     *
     * @see XenForo_DataWriter_AddOn::_postDelete()
     */
    protected function _postDelete()
    {
        if ($this->get('addon_id') == 'XenResource') {
            $this->_db->delete('xf_tab_content', 'content_type = \'resource\'');
        }

        parent::_postDelete();
    } /* END _postDelete */
}