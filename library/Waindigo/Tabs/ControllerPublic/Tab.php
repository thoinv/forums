<?php

class Waindigo_Tabs_ControllerPublic_Tab extends XenForo_ControllerPublic_Abstract
{

    public function actionSelectExistingTab()
    {
        $this->_assertCanAddExistingContentToTab();

        $contentType = $this->_input->filter(
            array(
                '_value' => XenForo_Input::STRING,
                '_name' => XenForo_Input::STRING
            ));

        $tabModel = $this->_getTabModel();

        $tabHandler = $tabModel->getTabHandlerForContentType($contentType['_value']);

        if ($tabHandler) {
            $reroute = $tabHandler->getSelectExistingTabReroute();

            return $this->responseReroute($reroute['controllerName'], $reroute['action']);
        }

        return $this->responseNoPermission();
    } /* END actionSelectExistingTab */

    public function actionAdd()
    {
        $this->_assertCanAddExistingContentToTab();

        $input = $this->_input->filter(
            array(
                'content_type1' => XenForo_Input::STRING,
                'content_id1' => XenForo_Input::UINT,
                'content_type2' => XenForo_Input::STRING,
                'content_id2' => XenForo_Input::UINT,
                'existing_url' => XenForo_Input::STRING
            ));

        $tabModel = $this->_getTabModel();

        $xenOptions = XenForo_Application::get('options');

        if ($xenOptions->waindigo_tabs_selectExistingContentMethod == 'urlfield') {
            $results = $this->parseRouteUrl($input['existing_url']);

            if ($results) {
                $match = $results['match'];
                $controllerName = $match->getControllerName();

                switch ($controllerName) {
                    case 'XenForo_ControllerPublic_Thread':
                        if (isset($results['params']['thread_id'])) {
                            $input['content_type2'] = 'thread';
                            $input['content_id2'] = $results['params']['thread_id'];
                        }
                        break;

                    case 'XenResource_ControllerPublic_Resource':
                        if (isset($results['params']['resource_id'])) {
                            $input['content_type2'] = 'resource';
                            $input['content_id2'] = $results['params']['resource_id'];
                        }
                        break;

                    case 'XenForo_ControllerPublic_Conversation':
                        if (isset($results['params']['conversation_id'])) {
                            $input['content_type2'] = 'conversation';
                            $input['content_id2'] = $results['params']['conversation_id'];
                        }
                        break;

                    case 'Waindigo_FreeAgent_ControllerPublic_Project':
                        if (isset($results['params']['project_id'])) {
                            $input['content_type2'] = 'freeagent_project';
                            $input['content_id2'] = $results['params']['project_id'];
                        }
                        break;

                    case 'XenGallery_ControllerPublic_Media':
                        if (isset($results['params']['media_id'])) {
                            $input['content_type2'] = 'xengallery_media';
                            $input['content_id2'] = $results['params']['media_id'];
                        }
                        break;

                    case 'XenProduct_ControllerPublic_Product':
                        if (isset($results['params']['product_id'])) {
                            $input['content_type2'] = 'xenproduct_product';
                            $input['content_id2'] = $results['params']['product_id'];
                        }
                        break;
                }
            }
        }

        if (!$input['content_type1'] || !$input['content_type2'] || !$input['content_id1'] || !$input['content_id2']) {
            return $this->responseNoPermission();
        }

        if ($input['content_type1'] == $input['content_type2'] && $input['content_id1'] == $input['content_id2']) {
            return $this->responseError(new XenForo_Phrase('waindigo_cannot_tab_content_to_itself_tabs'));
        }

        $handler1 = $tabModel->getTabHandlerForContentType($input['content_type1']);
        $content1 = $handler1->getContentById($input['content_id1']);
        $tabId1 = $handler1->getTabId($content1);

        $handler2 = $tabModel->getTabHandlerForContentType($input['content_type2']);
        $content2 = $handler2->getContentById($input['content_id2']);
        $tabId2 = $handler2->getTabId($content2);

        if ($tabId1 && $tabId2) {
            $tabId = $tabId1;
            $tabModel->mergeTabIds($tabId1, $tabId2);
        } else {
            if (!$tabId1) {
                $tabNameId1 = $handler1->getDefaultTabNameId();
                if (!$tabNameId1) {
                    return $this->responseError(
                        new XenForo_Phrase('waindigo_you_may_only_select_content_with_tabs_tabs'));
                }
            }
            if (!$tabId2) {
                $tabNameId2 = $handler2->getDefaultTabNameId();
                if (!$tabNameId2) {
                    return $this->responseError(
                        new XenForo_Phrase('waindigo_you_may_only_select_content_with_tabs_tabs'));
                }
            }
            if (!$tabId1 && !$tabId2) {
                $tabId = $tabModel->getTabId();
            } else {
                $tabId = $tabId1 ? $tabId1 : $tabId2;
            }
            if (!$tabId1) {
                $handler1->insertTab($tabId, $input['content_type1'], $input['content_id1'], $tabNameId1);
            }
            if (!$tabId2) {
                $handler2->insertTab($tabId, $input['content_type2'], $input['content_id2'], $tabNameId2);
            }
            if ($tabId1 != $tabId) {
                $handler1->changeTabId($input['content_id1'], $tabId);
            }
            if ($tabId2 != $tabId) {
                $handler2->changeTabId($input['content_id2'], $tabId);
            }
        }

        // TODO: get fallback link from handler instead of using index
        $redirect = $this->getDynamicRedirect(XenForo_Link::buildPublicLink('index'), false);

        return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $redirect);
    } /* END actionAdd */

    /**
     * Asserts that the currently browsing user can add existing content to this
     * thread.
     *
     * @param array $tab
     */
    protected function _assertCanAddExistingContentToTab()
    {
        $tab = array();

        if (!$this->_getTabModel()->canAddExistingContentToTab($tab, $errorPhraseKey)) {
            throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
        }
    } /* END _assertCanAddExistingContentToTab */

    /**
     * Get the tabs model.
     *
     * @return Waindigo_Tabs_Model_Tab
     */
    protected function _getTabModel()
    {
        return $this->getModelFromCache('Waindigo_Tabs_Model_Tab');
    } /* END _getTabModel */
}