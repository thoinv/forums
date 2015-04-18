<?php

/**
 * Class to handle preparing tabs of a specified type for display.
 */
abstract class Waindigo_Tabs_TabHandler_Abstract
{

    /**
     * Standard approach to caching other model objects for the lifetime of the
     * model.
     *
     * @var array
     */
    protected $_modelCache = array();

    /**
     * Factory method to get the named tab handler.
     * The class must exist and be autoloadable or an exception will be thrown.
     *
     * @param string Class to load
     *
     * @return Waindigo_Tabs_TabHandler_Abstract
     */
    public static function create($class)
    {
        $createClass = XenForo_Application::resolveDynamicClass($class, 'tab_handler');
        if ($createClass) {
            $obj = new $createClass();
            if ($obj instanceof Waindigo_Tabs_TabHandler_Abstract) {
                return $obj;
            }
        }

        throw new XenForo_Exception("Invalid tab handler '$class' specified");
    } /* END create */

    abstract public function getContentById($contentId);

    abstract public function getTabs(XenForo_ViewPublic_Base $view, array $tab);

    abstract public function canViewContent(array $content);

    abstract public function createContent($tabId, $tabName, array $createCriteria, array $params);

    public function getTabId(array $content = null)
    {
        if ($content === null) {
            return $this->_getTabModel()->getTabId();
        }

        return $content['tab_id'];
    } /* END getTabId */

    public function insertTab($tabId, $contentType, $contentId, $tabNameId)
    {
        return $this->_getTabModel()->insertTab($tabId, $contentType, $contentId, $tabNameId);
    } /* END insertTab */

    public function getDefaultTabName()
    {
        $tabNameModel = $this->_getTabNameModel();

        $tabNameId = $this->getDefaultTabNameId();

        if ($tabNameId) {
            return $tabNameModel->getTabNameMasterTitlePhraseValue($tabNameId);
        }

        return false;
    } /* END getDefaultTabName */

    public function getDefaultTabNameId()
    {
        $tabNameModel = $this->_getTabNameModel();

        $xenOptions = XenForo_Application::get('options');

        $defaultTabNameOptionName = $this->_getDefaultTabNameOptionName();

        $tabNameId = $xenOptions->$defaultTabNameOptionName;

        return $tabNameId;
    } /* END getDefaultTabNameId */

    abstract protected function _getDefaultTabNameOptionName();

    public function getSelectExistingTabReroute()
    {
        return array(
            'controllerName' => $this->_getControllerClass(),
            'action' => 'select-existing-tab'
        );
    } /* END getSelectExistingTabReroute */

    abstract protected function _getControllerClass();

    public function changeTabId($contentId, $newTabId)
    {
        $dataWriterClass = $this->_getDataWriterClass();

        if (!$dataWriterClass) {
            return false;
        }

        $dw = XenForo_DataWriter::create($dataWriterClass);
        $dw->setExistingData($contentId);
        $dw->set('tab_id', $newTabId);
        return $dw->save();
    } /* END changeTabId */

    abstract protected function _getDataWriterClass();

    public function getCreateTemplate($tabRuleId, array $createCriteria, XenForo_View $view)
    {
        $params = $this->_getCreateTemplateParams();

        $params = array_merge($params, array(
        	'tabRuleId' => $tabRuleId,
            'createCriteria' => $createCriteria
        ));

        return $view->createTemplateObject($this->_getCreateTemplateName(), $params);
    } /* END getCreateTemplate */

    protected function _getCreateTemplateName()
    {
        return '';
    } /* END _getCreateTemplateName */

    protected function _getCreateTemplateParams()
    {
        return array();
    } /* END _getCreateTemplateParams */

    /**
     *
     * @return Waindigo_Tabs_Model_Tab
     */
    protected function _getTabModel()
    {
        return $this->getModelFromCache('Waindigo_Tabs_Model_Tab');
    } /* END _getTabModel */

    /**
     *
     * @return Waindigo_Tabs_Model_TabName
     */
    protected function _getTabNameModel()
    {
        return $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
    } /* END _getTabNameModel */

    /**
     * Gets the specified model object from the cache.
     * If it does not exist, it will be instantiated.
     *
     * @param string $class Name of the class to load
     *
     * @return XenForo_Model
     */
    public function getModelFromCache($class)
    {
        if (!isset($this->_modelCache[$class])) {
            $this->_modelCache[$class] = XenForo_Model::create($class);
        }

        return $this->_modelCache[$class];
    } /* END getModelFromCache */
}