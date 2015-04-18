<?php

/**
 * Installer for Tabs by Waindigo.
 */
class Waindigo_Tabs_Install_Controller extends Waindigo_Install
{

    protected $_resourceManagerUrl = 'https://xenforo.com/community/resources/tabs-by-waindigo.2528/';

    protected function _preInstall()
    {
        $this->_db->query(
            '
                UPDATE xf_content_type
                SET addon_id = \'XenForo\'
                WHERE addon_id = \'Waindigo_Tabs\'
                    AND content_type = \'thread\'
        ');
        $this->_db->query(
            '
                UPDATE xf_content_type
                SET addon_id = \'XenResource\'
                WHERE addon_id = \'Waindigo_Tabs\'
                    AND content_type = \'resource\'
        ');
    } /* END _preInstall */

    protected function _postInstall()
    {
        $options = array(
            'waindigo_tabs_defaultTabNameThreads' => 'Discussion',
            'waindigo_tabs_defaultTabNameResources' => 'Resource',
            'waindigo_tabs_defaultTabNameConversations' => 'Conversation',
            'waindigo_tabs_defaultTabNameProjects' => 'Project',
            'waindigo_tabs_defaultTabNameMedia' => 'Media',
            'waindigo_tabs_defaultTabNameProducts' => 'Product'
        );

        $xenOptions = XenForo_Application::get('options');

        foreach ($options as $optionName => $titlePhrase) {
            if (!isset($xenOptions->$optionName)) {
                $writer = XenForo_DataWriter::create('Waindigo_Tabs_DataWriter_TabName');
                $writer->setExtraData(Waindigo_Tabs_DataWriter_TabName::DATA_TITLE, $titlePhrase);
                $writer->save();
                $tabNameId = $writer->get('tab_name_id');
                if (XenForo_Application::$versionId >= 1020000 && $this->_xml) {
                    foreach ($this->_xml->optiongroups->option as $option) {
                        if ($option['option_id'] == $optionName) {
                            $option->default_value = $tabNameId;
                            break;
                        }
                    }
                }
            }
        }
    } /* END _postInstall */

    /**
     * Gets the tables (with fields) to be created for this add-on.
     * See parent for explanation.
     *
     * @return array Format: [table name] => fields
     */
    protected function _getTables()
    {
        return array(
            'xf_tab' => array(
                'tab_id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY', /* END 'tab_id' */
            ), /* END 'xf_tab' */
            'xf_tab_name' => array(
                'tab_name_id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY', /* END 'tab_name_id' */
                'display_order' => 'INT(3) UNSIGNED NOT NULL DEFAULT 0', /* END 'display_order' */
            ), /* END 'xf_tab_name' */
            'xf_tab_content' => array(
                'tab_name_id' => 'INT(10) UNSIGNED NOT NULL', /* END 'tab_name_id' */
                'content_type' => 'VARCHAR(25) NOT NULL ', /* END 'content_type' */
                'content_id' => 'INT(10) UNSIGNED NOT NULL', /* END 'content_id' */
                'tab_id' => 'INT(10) UNSIGNED NOT NULL', /* END 'tab_id' */
            ), /* END 'xf_tab_content' */
            'xf_tab_rule' => array(
                'tab_rule_id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY', /* END 'tab_rule_id' */
                'title' => 'VARCHAR(255) NOT NULL ', /* END 'title' */
                'match_content_type' => 'VARCHAR(25) NOT NULL', /* END 'match_content_type' */
                'match_criteria' => 'MEDIUMBLOB', /* END 'match_criteria' */
                'create_content_type' => 'VARCHAR(25) NOT NULL', /* END 'create_content_type' */
                'create_criteria' => 'MEDIUMBLOB', /* END 'create_criteria' */
                'match_tab_name_id' => 'INT(10) UNSIGNED NOT NULL', /* END 'match_tab_name_id' */
                'tab_name_id' => 'INT(10) UNSIGNED NOT NULL', /* END 'tab_name_id' */
            ), /* END 'xf_tab_rule' */
        );
    } /* END _getTables */

    protected function _getKeys()
    {
        return array(
            'xf_tab_content' => array(
                'tab_id' => array(
                    'tab_id'
                ), /* END 'tab_id' */
            ), /* END 'xf_tab_content' */
            'xf_tab_rule' => array(
                'match_content_type' => array(
                    'match_content_type'
                ), /* END 'match_content_type' */
            ), /* END 'xf_tab_rule' */
        );
    } /* END _getKeys */

    protected function _getUniqueKeys()
    {
        return array(
            'xf_tab_content' => array(
                'contentType_contentId' => array(
                    'content_type',
                    'content_id'
                ), /* END 'contentType_contentId' */
            ) /* END 'xf_tab_content' */
        );
    } /* END _getUniqueKeys */

    protected function _getTableChanges()
    {
        return array(
            'xf_thread' => array(
                'tab_id' => 'INT(10) NOT NULL DEFAULT 0', /* END 'tab_id' */
            ), /* END 'xf_thread' */
            'xf_resource' => array(
                'tab_id' => 'INT(10) NOT NULL DEFAULT 0', /* END 'tab_id' */
            ), /* END 'xf_resource' */
            'xf_conversation_master' => array(
                'tab_id' => 'INT(10) NOT NULL DEFAULT 0', /* END 'tab_id' */
            ), /* END 'xf_conversation' */
            'xf_freeagent_user_project_waindigo' => array(
                'tab_id' => 'INT(10) NOT NULL DEFAULT 0', /* END 'tab_id' */
            ), /* END 'xf_freeagent_user_project_waindigo' */
            'xengallery_media' => array(
                'tab_id' => 'INT(10) NOT NULL DEFAULT 0', /* END 'tab_id' */
            ), /* END 'xengallery_media' */
            'xenproduct_product' => array(
                'tab_id' => 'INT(10) NOT NULL DEFAULT 0', /* END 'tab_id' */
            ), /* END 'xenproduct_product' */
        );
    } /* END _getTableChanges */

    protected function _getContentTypeFields()
    {
        return array(
            'thread' => array(
                'tab_handler_class' => 'Waindigo_Tabs_TabHandler_Thread', /* END 'tab_handler_class' */
            ), /* END 'thread' */
            'resource' => array(
                'tab_handler_class' => 'Waindigo_Tabs_TabHandler_Resource', /* END 'tab_handler_class' */
            ), /* END 'resource' */
            'conversation' => array(
                'tab_handler_class' => 'Waindigo_Tabs_TabHandler_Conversation', /* END 'tab_handler_class' */
            ), /* END 'conversation' */
            'freeagent_project' => array(
                'tab_handler_class' => 'Waindigo_Tabs_TabHandler_FreeAgentProject', /* END 'tab_handler_class' */
            ), /* END 'freeagent_project' */
            'xengallery_media' => array(
                'tab_handler_class' => 'Waindigo_Tabs_TabHandler_XenGalleryMedia', /* END 'tab_handler_class' */
            ), /* END 'xengallery_media' */
            'xenproduct_product' => array(
                'tab_handler_class' => 'Waindigo_Tabs_TabHandler_XenProduct', /* END 'tab_handler_class' */
            ), /* END 'xenproduct_product' */
        );
    } /* END _getContentTypeFields */

    protected function _getPermissionEntries()
    {
        return array(
            'general' => array(
                'addExistingContentToTabs' => array(
                    'permission_group_id' => 'forum', /* END 'permission_group_id' */
                    'permission_id' => 'manageAnyThread', /* END 'permission_id' */
                ), /* END 'addExistingContentToTabs' */
            ), /* END 'general' */
        );
    } /* END _getPermissionEntries */
}