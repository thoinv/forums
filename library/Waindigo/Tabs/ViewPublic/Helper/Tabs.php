<?php

/**
 * Class to help display tabs.
 */
class Waindigo_Tabs_ViewPublic_Helper_Tabs
{

    /**
     * Calling view.
     *
     * @var XenForo_View
     */
    protected $_view;

    /**
     * Constructor.
     * Sets up view.
     *
     * @param XenForo_View $view
     */
    public function __construct(XenForo_View $view)
    {
        $this->_view = $view;
    } /* END __construct */

    public function getTabs()
    {
        $allContentKeys = array(
            'resource' => array(
                'resource_id',
                'resource'
            ),
            'thread' => array(
                'thread_id',
                'thread'
            ),
            'conversation' => array(
                'conversation_id',
                'conversation'
            ),
            'project' => array(
                'project_id',
                'freeagent_project'
            ),
            'media' => array(
                'media_id',
                'xengallery_media'
            ),
            'product' => array(
                'product_id',
                'xenproduct_product'
            )
        );

        $contentKeys = array();
        $params = $this->_view->getParams();
        foreach ($allContentKeys as $contentKeyId => $contentTypeInfo) {
            if (isset($params[$contentKeyId])) {
                $contentTypes[] = $contentTypeInfo[1];
                $contentIdKeys[] = $contentTypeInfo[0];
                $contentKeys[] = $contentKeyId;
            }
        }

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = XenForo_Model::create('Waindigo_Tabs_Model_Tab');

        $canAddExistingContentToTab = false;

        for ($i = 0; $i < isset($contentKeys) ? count($contentKeys) : 0; $i++) {
            $content = $params[$contentKeys[$i]];

            if (!isset($content['tab_id']) || !$content['tab_id']) {
                continue;
            }

            if (!$canAddExistingContentToTab) {
                $canAddExistingContentToTab = $tabModel->canAddExistingContentToTab(
                    array(
                        'tab_id' => $content['tab_id']
                    ));
            }

            $tabContents = $tabModel->getTabContentsByTabId($content['tab_id']);
            $tabContents = $tabModel->prepareTabContents($tabContents, $contentTypes[$i], $content[$contentIdKeys[$i]],
                $content);

            $this->_view->setParams(array(
                'tabContents' => $tabContents
            ));
            break;
        }

        if (!$canAddExistingContentToTab) {
            $canAddExistingContentToTab = $tabModel->canAddExistingContentToTab(array());
        }

        $this->_view->setParams(
            array(
                'canAddExistingContentToTab' => $canAddExistingContentToTab
            ));
    } /* END getTabs */
}