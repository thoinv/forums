<?php

/**
 * Model for tabs.
 */
class Waindigo_Tabs_Model_Tab extends XenForo_Model
{

    /**
     * Array to store tab handler classes
     *
     * @var array
     */
    protected $_handlerCache = array();

    /**
     * Gets tabs that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions
     *
     * @return array [tab id] => info.
     */
    public function getTabs(array $conditions = array(), array $fetchOptions = array())
    {
        $whereClause = $this->prepareTabConditions($conditions, $fetchOptions);

        $sqlClauses = $this->prepareTabFetchOptions($fetchOptions);
        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->fetchAllKeyed(
            $this->limitQueryResults(
                '
                SELECT tab.*
                    ' . $sqlClauses['selectFields'] . '
                FROM xf_tab AS tab
                ' . $sqlClauses['joinTables'] . '
                WHERE ' . $whereClause . '
                ' . $sqlClauses['orderClause'] . '
            ', $limitOptions['limit'], $limitOptions['offset']),
            'tab_id');
    } /* END getTabs */

    /**
     * Gets the tab that matches the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions Options that affect what is fetched.
     *
     * @return array false
     */
    public function getTab(array $conditions = array(), array $fetchOptions = array())
    {
        $tabs = $this->getTabs($conditions, $fetchOptions);

        return reset($tabs);
    } /* END getTab */

    /**
     * Gets a tab by ID.
     *
     * @param integer $tabId
     * @param array $fetchOptions Options that affect what is fetched.
     *
     * @return array false
     */
    public function getTabById($tabId, array $fetchOptions = array())
    {
        $conditions = array(
            'tab_id' => $tabId
        );

        return $this->getTab($conditions, $fetchOptions);
    } /* END getTabById */

    /**
     * Gets tabs by tab id.
     *
     * @param integer $tabId
     *
     * @return array false
     */
    public function getTabContentsByTabId($tabId)
    {
        return $this->_getDb()->fetchAll(
            '
            SELECT *
            FROM xf_tab_content AS tab_content
            LEFT JOIN xf_tab_name AS tab_name ON (tab_content.tab_name_id = tab_name.tab_name_id)
            WHERE tab_content.tab_id = ?
            ORDER BY tab_name.display_order ASC, tab_content.content_id ASC, tab_content.content_type ASC
            ', $tabId);
    } /* END getTabContentsByTabId */

    public function getTabId()
    {
        $this->_getDb()->insert('xf_tab', array());

        return $this->_getDb()->lastInsertId();
    } /* END getTabId */

    public function insertTab($tabId, $contentType, $contentId, $tabNameId)
    {
        $this->_getDb()->insert('xf_tab_content',
            array(
                'tab_id' => $tabId,
                'content_type' => $contentType,
                'content_id' => $contentId,
                'tab_name_id' => $tabNameId
            ));
    } /* END insertTab */

    public function prepareTabContents(array $tabContents, $selectedContentType = '', $selectedContentId = 0,
        array $selectedContent = array())
    {
        foreach ($tabContents as &$tabContent) {
            $tabContent = $this->prepareTabContent($tabContent, $selectedContentType, $selectedContentId,
                $selectedContent);
        }

        return $tabContents;
    } /* END prepareTabContents */

    public function prepareTabContent(array $tabContent, $selectedContentType = '', $selectedContentId = 0,
        array $selectedContent = array())
    {
        $tabNameModel = $this->_getTabNameModel();
        $tabContent['handler'] = $this->_getTabHandlerFromCache($tabContent['content_type']);
        $tabContent['canView'] = false;
        if ($tabContent['content_type'] != $selectedContentType || $tabContent['content_id'] != $selectedContentId) {
            if ($tabContent['handler']) {
                $tabContent['content'] = $tabContent['handler']->getContentById($tabContent['content_id']);
                if ($tabContent['content'] && $tabContent['handler']->canViewContent($tabContent['content'])) {
                    $tabContent['canView'] = true;
                }
            }
        } else {
            $tabContent['content'] = $selectedContent;
            $tabContent['selected'] = true;
            $tabContent['canView'] = true;
        }
        if ($tabContent['canView']) {
            $tabContent['title'] = new XenForo_Phrase(
                $tabNameModel->getTabNameTitlePhraseName($tabContent['tab_name_id']));
        }
        return $tabContent;
    } /* END prepareTabContent */

    /**
     * Gets the total number of a tab that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     *
     * @return integer
     */
    public function countTabs(array $conditions = array())
    {
        $fetchOptions = array();

        $whereClause = $this->prepareTabConditions($conditions, $fetchOptions);
        $joinOptions = $this->prepareTabFetchOptions($fetchOptions);

        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->_getDb()->fetchOne(
            '
            SELECT COUNT(*)
            FROM xf_tab AS tab
            ' . $joinOptions['joinTables'] . '
            WHERE ' . $whereClause . '
        ');
    } /* END countTabs */

    /**
     * Gets all tabs titles.
     *
     * @return array [tab id] => title.
     */
    public static function getTabTitles()
    {
        $tabs = XenForo_Model::create(__CLASS__)->getTabs();
        $titles = array();
        foreach ($tabs as $tabId => $tab) {
            $titles[$tabId] = $tab['title'];
        }
        return $titles;
    } /* END getTabTitles */

    /**
     * Gets the default tab record.
     *
     * @return array
     */
    public function getDefaultTab()
    {
        return array(
            'tab_id' => '', /* END 'tab_id' */
        );
    } /* END getDefaultTab */

    /**
     * Prepares a set of conditions to select tabs against.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions The fetch options that have been provided. May
     * be edited if criteria requires.
     *
     * @return string Criteria as SQL for where clause
     */
    public function prepareTabConditions(array $conditions, array &$fetchOptions)
    {
        $db = $this->_getDb();
        $sqlConditions = array();

        if (isset($conditions['tab_ids']) && !empty($conditions['tab_ids'])) {
            $sqlConditions[] = 'tab.tab_id IN (' . $db->quote($conditions['tab_ids']) . ')';
        } else
            if (isset($conditions['tab_id'])) {
                $sqlConditions[] = 'tab.tab_id = ' . $db->quote($conditions['tab_id']);
            }

        $this->_prepareTabConditions($conditions, $fetchOptions, $sqlConditions);

        return $this->getConditionsForClause($sqlConditions);
    } /* END prepareTabConditions */

    /**
     * Method designed to be overridden by child classes to add to set of
     * conditions.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions The fetch options that have been provided. May
     * be edited if criteria requires.
     * @param array $sqlConditions List of conditions as SQL snippets. May be
     * edited if criteria requires.
     */
    protected function _prepareTabConditions(array $conditions, array &$fetchOptions, array &$sqlConditions)
    {
    } /* END _prepareTabConditions */

    /**
     * Checks the 'join' key of the incoming array for the presence of the
     * FETCH_x bitfields in this class
     * and returns SQL snippets to join the specified tables if required.
     *
     * @param array $fetchOptions containing a 'join' integer key built from
     * this class's FETCH_x bitfields.
     *
     * @return string containing selectFields, joinTables, orderClause keys.
     * Example: selectFields = ', user.*, foo.title'; joinTables = ' INNER JOIN
     * foo ON (foo.id = other.id) '; orderClause = 'ORDER BY x.y'
     */
    public function prepareTabFetchOptions(array &$fetchOptions)
    {
        $selectFields = '';
        $joinTables = '';
        $orderBy = '';

        $this->_prepareTabFetchOptions($fetchOptions, $selectFields, $joinTables, $orderBy);

        return array(
            'selectFields' => $selectFields,
            'joinTables' => $joinTables,
            'orderClause' => ($orderBy ? "ORDER BY $orderBy" : '')
        );
    } /* END prepareTabFetchOptions */

    /**
     * Method designed to be overridden by child classes to add to SQL snippets.
     *
     * @param array $fetchOptions containing a 'join' integer key built from
     * this class's FETCH_x bitfields.
     * @param string $selectFields = ', user.*, foo.title'
     * @param string $joinTables = ' INNER JOIN foo ON (foo.id = other.id) '
     * @param string $orderBy = 'x.y ASC, x.z DESC'
     */
    protected function _prepareTabFetchOptions(array &$fetchOptions, &$selectFields, &$joinTables, &$orderBy)
    {
    } /* END _prepareTabFetchOptions */

    public function createNewTab($contentType, $tabId, $tabNameId, array $createCriteria, array $params)
    {
        $handler = $this->_getTabHandlerFromCache($contentType);

        $tabId = $handler->createContent($tabId, $tabNameId, $createCriteria, $params);

        return $tabId;
    } /* END createNewTab */

    /**
     *
     * @param array $tabRule
     * @param XenForo_View $view
     *
     * @return XenForo_Template_Abstract
     */
    public function getCreateTemplate(array $tabRule, XenForo_View $view)
    {
        $contentType = $tabRule['create_content_type'];

        $handler = $this->_getTabHandlerFromCache($contentType);

        if ($tabRule['create_criteria']) {
            $createCriteria = unserialize($tabRule['create_criteria']);
        } else {
            $createCriteria = array();
        }

        $template = $handler->getCreateTemplate($tabRule['tab_rule_id'], $createCriteria, $view);

        return $template->render();
    } /* END getCreateTemplate */ /* END createNewTab */

    public function canAddExistingContentToTab(array $tab, &$errorPhraseKey = '', array $viewingUser = null)
    {
        $this->standardizeViewingUserReference($viewingUser);

        if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'addExistingContentToTabs')) {
            return true;
        }

        return false;
    } /* END canAddExistingContentToTab */

    public function getContentTypes()
    {
        if (XenForo_Application::$versionId >= 1020000) {
            $addOns = XenForo_Application::get('addOns');
        } else {
            /* @var $addOnModel XenForo_Model_AddOn */
            $addOnModel = $this->getModelFromCache('XenForo_Model_AddOn');
            $addOns = $addOnModel->getAllAddOns();
            foreach ($addOns as $addOnId => $addOn) {
                if (!$addOn['active']) {
                    unset($addOns[$addOnId]);
                }
            }
        }

        $contentTypes = array(
            'thread' => new XenForo_Phrase('thread'),
            'conversation' => new XenForo_Phrase('conversation')
        );
        $isRmInstalled = isset($addOns['XenResource']);
        if ($isRmInstalled) {
            $contentTypes['resource'] = new XenForo_Phrase('resource');
        }
        $isFaInstalled = isset($addOns['Waindigo_FreeAgent']);
        if ($isFaInstalled) {
            $contentTypes['freeagent_project'] = new XenForo_Phrase('waindigo_project_freeagent');
        }
        $isXmgInstalled = isset($addOns['XenGallery']);
        if ($isXmgInstalled) {
            $contentTypes['xengallery_media'] = new XenForo_Phrase('xengallery_media');
        }
        $isXpmInstalled = isset($addOns['XenProduct']);
        if ($isXpmInstalled) {
            $contentTypes['xenproduct_product'] = new XenForo_Phrase('xenproduct_product');
        }

        return $contentTypes;
    } /* END getContentTypes */

    public function getCreateContentTypes()
    {
        if (XenForo_Application::$versionId >= 1020000) {
            $addOns = XenForo_Application::get('addOns');
        } else {
            /* @var $addOnModel XenForo_Model_AddOn */
            $addOnModel = $this->getModelFromCache('XenForo_Model_AddOn');
            $addOns = $addOnModel->getAllAddOns();
            foreach ($addOns as $addOnId => $addOn) {
                if (!$addOn['active']) {
                    unset($addOns[$addOnId]);
                }
            }
        }

        $contentTypes = array(
            'thread' => new XenForo_Phrase('thread'),
            'conversation' => new XenForo_Phrase('conversation')
        );
        $isRmInstalled = isset($addOns['XenResource']);
        if ($isRmInstalled) {
            $contentTypes['resource'] = new XenForo_Phrase('resource');
        }
        $isXmgInstalled = isset($addOns['XenGallery']);
        if ($isXmgInstalled) {
            $contentTypes['xengallery_media'] = new XenForo_Phrase('xengallery_media');
        }

        return $contentTypes;
    } /* END getCreateContentTypes */

    public function getMatchContentTypes()
    {
        if (XenForo_Application::$versionId >= 1020000) {
            $addOns = XenForo_Application::get('addOns');
        } else {
            /* @var $addOnModel XenForo_Model_AddOn */
            $addOnModel = $this->getModelFromCache('XenForo_Model_AddOn');
            $addOns = $addOnModel->getAllAddOns();
            foreach ($addOns as $addOnId => $addOn) {
                if (!$addOn['active']) {
                    unset($addOns[$addOnId]);
                }
            }
        }

        $contentTypes = array(
            'thread' => new XenForo_Phrase('thread'),
            'conversation' => new XenForo_Phrase('conversation')
        );
        $isRmInstalled = isset($addOns['XenResource']);
        if ($isRmInstalled) {
            $contentTypes['resource'] = new XenForo_Phrase('resource');
        }
        $isXmgInstalled = isset($addOns['XenGallery']);
        if ($isXmgInstalled) {
            $contentTypes['xengallery_media'] = new XenForo_Phrase('xengallery_media');
        }

        return $contentTypes;
    } /* END getMatchContentTypes */

    /**
     *
     * @param string $contentType
     * @return string
     */
    protected function _getTabHandlerForContent($contentType)
    {
        return $this->getContentTypeField($contentType, 'tab_handler_class');
    } /* END _getTabHandlerForContent */

    /**
     * Fetches an instance of the specified tab handler
     *
     * @param string $contentType
     *
     * @return Waindigo_Tabs_TabHandler_Abstract boolean
     */
    protected function _getTabHandlerFromCache($contentType)
    {
        $class = $this->_getTabHandlerForContent($contentType);
        if (!$class || !class_exists($class)) {
            return false;
        }

        if (!isset($this->_handlerCache[$contentType])) {
            $this->_handlerCache[$contentType] = Waindigo_Tabs_TabHandler_Abstract::create($class);
        }

        return $this->_handlerCache[$contentType];
    } /* END _getTabHandlerFromCache */

    /**
     * Fetches an instance of the specified tab handler
     *
     * @param string $contentType
     *
     * @return Waindigo_Tabs_TabHandler_Abstract boolean
     */
    public function getTabHandlerForContentType($contentType)
    {
        return $this->_getTabHandlerFromCache($contentType);
    } /* END getTabHandlerForContentType */

    public function mergeTabIds($newTabId, $existingTabId)
    {
        if ($newTabId == $existingTabId) {
            return false;
        }

        $tabContents = $this->getTabContentsByTabId($existingTabId);

        $tabContents = $this->prepareTabContents($tabContents);

        foreach ($tabContents as $tabContent) {
            $handler = $tabContent['handler'];

            $handler->changeTabId($tabContent['content_id'], $newTabId);
        }

        $db = $this->_getDb();

        $db->delete('xf_tab', 'tab_id = ' . $db->quote($existingTabId));
        $db->delete('xf_tab_content', 'tab_id = ' . $db->quote($existingTabId));
    } /* END mergeTabIds */

    /**
     *
     * @return Waindigo_Tabs_Model_TabName
     */
    protected function _getTabNameModel()
    {
        return $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
    } /* END _getTabNameModel */
}