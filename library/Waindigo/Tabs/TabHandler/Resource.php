<?php

class Waindigo_Tabs_TabHandler_Resource extends Waindigo_Tabs_TabHandler_Abstract
{

    public function getContentById($contentId)
    {
        /* @var $resourceModel XenResource_Model_Resource */
        $resourceModel = XenForo_Model::create('XenResource_Model_Resource');

        $fetchOptions = array(
            'join' => XenResource_Model_Resource::FETCH_CATEGORY,
            'permissionCombinationId' => XenForo_Visitor::getInstance()->permission_combination_id
        );

        $resource = $resourceModel->getResourceById($contentId, $fetchOptions);

        if ($resource) {
            $resource = $resourceModel->prepareResource($resource);
            $resource = $resourceModel->prepareResourceCustomFields($resource, $resource);
            return $resource;
        }

        return false;
    } /* END getContentById */

    public function getTabs(XenForo_ViewPublic_Base $view, array $tab)
    {
        if (empty($tab['selected']) && !empty($tab['content'])) {
            $tab['link'] = XenForo_Link::buildPublicLink('resources', $tab['content']);
            $tabContent = $view->createTemplateObject('waindigo_tab_tabs', $tab);
            $viewParams = array(
                'resource' => $tab['content'],
                'resourceUpdateCount' => $tab['content']['update_count']
            );
            if ($tab['content']['discussion_thread_id']) {
                $threadModel = XenForo_Model::create('XenForo_Model_Thread');
                $viewParams['thread'] = $threadModel->getThreadById($tab['content']['discussion_thread_id']);
            }
            $content = $view->createTemplateObject('resource_view_tabs', $viewParams);
            preg_match('#<ul[^>]*>\s*<li[^>]*>.*?</li>(.*)</ul>#s', $content, $matches);
            if ($matches[1]) {
                return $tabContent . $matches[1];
            }
            return $tabContent;
        }
    } /* END getTabs */

    public function canViewContent(array $content)
    {
        /* @var $resourceModel XenResource_Model_Resource */
        $resourceModel = XenForo_Model::create('XenResource_Model_Resource');
        if (!$resourceModel->canViewResourceAndContainer($content, $content)) {
            return false;
        }
        return true;
    } /* END canViewContent */

    public function createContent($tabId, $tabName, array $createCriteria, array $params)
    {
        if (!$createCriteria['resource_category_id']) {
            return $tabId;
        }

        /* @var $dw XenResource_DataWriter_Resource */
        $dw = XenForo_DataWriter::create('XenResource_DataWriter_Resource', XenForo_DataWriter::ERROR_SILENT);

        $dw->bulkSet(
            array(
                'resource_category_id' => $createCriteria['resource_category_id'],
                'title' => $params['title'],
                'tag_line' => isset($params['tag_line']) ? $params['tag_line'] : new XenForo_Phrase(
                    'waindigo_resource_tag_line_create_tabs', $params, false),
                'user_id' => $params['user_id'],
                'username' => $params['username'],
                'tab_id' => $tabId
            ));
        $dw->setOption(Waindigo_Tabs_Extend_XenResource_DataWriter_Resource::OPTION_CHECK_TAB_RULES, false);

        $descriptionDw = $dw->getDescriptionDw();
        $descriptionDw->set('message', $params['message']);

        $versionDw = $dw->getVersionDw();
        $dw->set('is_fileless', 1);
        $versionDw->setOption(XenResource_DataWriter_Version::OPTION_IS_FILELESS, true);
        $versionDw->set('version_string', XenForo_Locale::date(XenForo_Application::$time, 'Y-m-d'));

        if ($dw->hasErrors()) {
            return $tabId;
        }

        if (!$tabId) {
            $tabId = $this->getTabId();
            $dw->set('tab_id', $tabId);
        }

        if (!$dw->save()) {
            return $tabId;
        }

        $this->insertTab($tabId, 'resource', $dw->get('resource_id'), $tabName);

        return $tabId;
    } /* END createContent */

    protected function _getDefaultTabNameOptionName()
    {
        return 'waindigo_tabs_defaultTabNameResources';
    } /* END _getDefaultTabNameOptionName */

    protected function _getControllerClass()
    {
        return 'XenResource_ControllerPublic_Resource';
    } /* END _getControllerClass */

    protected function _getDataWriterClass()
    {
        return 'XenResource_DataWriter_Resource';
    } /* END _getDataWriterClass */
}