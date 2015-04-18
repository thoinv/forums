<?php

/**
 *
 * @see XenForo_ViewPublic_Thread_View
 */
class Waindigo_Tabs_Extend_XenForo_ViewPublic_Thread_View extends XFCP_Waindigo_Tabs_Extend_XenForo_ViewPublic_Thread_View
{

    public function renderHtml()
    {
        if (method_exists(get_parent_class(), 'renderHtml')) {
            parent::renderHtml();
        }

        $class = XenForo_Application::resolveDynamicClass('Waindigo_Tabs_ViewPublic_Helper_Tabs');
        $helper = new $class($this);

        $helper->getTabs();

        if (!empty($this->_params['tabContents'])) {
            foreach ($this->_params['tabContents'] as $tabId => $tab) {
                if ($tab['canView']) {
                    $this->_params['tabContents'][$tabId]['template'] = $tab['handler']->getTabs($this, $tab);
                }
            }
        } else {
            /* @var $tabNameModel Waindigo_Tabs_Model_TabName */
            $tabNameModel = XenForo_Model::create('Waindigo_Tabs_Model_TabName');

            $this->_params['defaultTabName'] = $tabNameModel->getDefaultTabNameForContentType('thread');
        }

        $this->_params['addTabsLink'] = XenForo_Link::buildPublicLink('threads/add-tab', $this->_params['thread']);
    } /* END renderHtml */
}