<?php

/**
 *
 * @see XenGallery_DataWriter_Media
 */
class Waindigo_Tabs_Extend_XenGallery_DataWriter_Media extends XFCP_Waindigo_Tabs_Extend_XenGallery_DataWriter_Media
{

    /**
     * Option that controls whether tab rules should be checked.
     * Defaults to true.
     *
     * @var string
     */
    const OPTION_CHECK_TAB_RULES = 'checkTabRules';

    /**
     *
     * @see XenGallery_DataWriter_Media::_getFields()
     */
    protected function _getFields()
    {
        $fields = parent::_getFields();

        $fields['xengallery_media']['tab_id'] = array(
            'type' => self::TYPE_UINT_FORCED,
            'default' => 0
        );

        return $fields;
    } /* END _getFields */

    /**
     *
     * @see XenGallery_DataWriter_Media::_getDefaultOptions()
     */
    protected function _getDefaultOptions()
    {
        $defaultOptions = parent::_getDefaultOptions();

        $defaultOptions[self::OPTION_CHECK_TAB_RULES] = true;

        return $defaultOptions;
    } /* END _getDefaultOptions */

    /**
     *
     * @see XenGallery_DataWriter_Media::_postSave()
     */
    protected function _postSave()
    {
        parent::_postSave();

        $postSaveChanges = array();

        if ($this->isInsert() && $this->getOption(self::OPTION_CHECK_TAB_RULES)) {
            /* @var $tabModel Waindigo_Tabs_Model_Tab */
            $tabModel = $this->getModelFromCache('Waindigo_Tabs_Model_Tab');

            /* @var $tabRuleModel Waindigo_Tabs_Model_TabRule */
            $tabRuleModel = $this->getModelFromCache('Waindigo_Tabs_Model_TabRule');
            $tabRules = $tabRuleModel->getTabRules(
                array(
                    'match_content_type' => 'xengallery_media'
                ));

            $tabId = $this->get('tab_id');

            $extraTabData = array();
            if (isset($GLOBALS['XenGallery_ControllerPublic_Media'])) {
                /* @var $controller XenGallery_ControllerPublic_Media */
                $controller = $GLOBALS['XenGallery_ControllerPublic_Media'];

                $extraTabData = $controller->getInput()->filterSingle('extra_tab_data', XenForo_Input::ARRAY_SIMPLE);
            }

            $media = $this->getMergedData();
            $messageText = $this->get('media_description');
            $parser = XenForo_BbCode_Parser::create(
                XenForo_BbCode_Formatter_Base::create('XenForo_BbCode_Formatter_BbCode_AutoLink', false));
            $snippet = $parser->render(XenForo_Helper_String::wholeWordTrim($messageText, 500));
            $messageParams = array(
                'title' => $this->get('media_title'),
                'username' => $this->get('username'),
                'contentLink' => XenForo_Link::buildPublicLink('canonical:xengallery', $media),
                'snippet' => $snippet
            );
            $defaultMessage = new XenForo_Phrase('waindigo_media_message_create_tabs', $messageParams, false);

            $params = array(
                'user_id' => $this->get('user_id'),
                'username' => $this->get('username'),
                'title' => $this->get('media_title'),
                'content_type' => 'xengallery_media',
                'content_id' => $this->get('media_id'),
            );

            $tabNameId = '';
            foreach ($tabRules as $tabRuleId => $tabRule) {
                if (Waindigo_Tabs_Helper_Criteria::mediaMatchesCriteria($tabRule['match_criteria'], true, $media)) {
                    if ($tabRule['create_criteria']) {
                        $createCriteria = unserialize($tabRule['create_criteria']);
                    } else {
                        $createCriteria = array();
                    }
                    if (!empty($createCriteria['use_custom_message'])) {
                        $params['message'] = new XenForo_Phrase(
                            $tabRuleModel->getTabRuleCustomMessagePhraseName($tabRuleId), $messageParams, false);
                    } else {
                        $params['message'] = $defaultMessage;
                    }
                    if (!empty($extraTabData[$tabRuleId])) {
                        $params = array_merge($extraTabData[$tabRuleId], $params);
                    }
                    $tabId = $tabModel->createNewTab($tabRule['create_content_type'], $tabId, $tabRule['tab_name_id'],
                        $createCriteria, $params);
                    if ($tabId && !$tabNameId) {
                        $tabNameId = $tabRule['match_tab_name_id'];
                    }
                }
            }

            if ($tabId && $tabId != $this->get('tab_id')) {
                $this->set('tab_id', $tabId, '',
                    array(
                        'setAfterPreSave' => true
                    ));
                $postSaveChanges['tab_id'] = $tabId;
                if ($tabNameId) {
                    $tabModel->insertTab($this->get('tab_id'), 'xengallery_media', $this->get('media_id'), $tabNameId);
                }
            }
        }

        if (isset($GLOBALS['XenGallery_ControllerPublic_Media'])) {
            /* @var $controller XenGallery_ControllerPublic_Media */
            $controller = $GLOBALS['XenGallery_ControllerPublic_Media'];

            // TODO: check permissions?
            $tabNameId = $controller->getInput()->filterSingle('tab_name_id', XenForo_Input::UINT);
            if ($tabNameId) {
                $this->_db->update('xf_tab_content',
                    array(
                        'tab_name_id' => $tabNameId
                    ),
                    'content_id = ' . $this->_db->quote($this->get('media_id')) . ' AND content_type = \'xengallery_media\'');
            }
        }

        if ($postSaveChanges) {
            $this->_db->update('xengallery_media', $postSaveChanges,
                'media_id = ' . $this->_db->quote($this->get('media_id')));
        }

        if ($this->isChanged('tab_id') && $this->getExisting('tab_id') && $this->get('tab_id')) {
            $this->_db->update('xf_tab_content', array(
                'tab_id' => $this->get('tab_id')
            ), 'content_id = ' . $this->_db->quote($this->getExisting('media_id')) . ' AND content_type = \'xengallery_media\'');
        }
    } /* END _postSave */

    /**
     *
     * @see XenGallery_DataWriter_Media::_postDelete()
     */
    protected function _postDelete()
    {
        parent::_postDelete();

        $this->_db->delete('xf_tab_content',
            'content_type = \'xengallery_media\' AND content_id = ' . $this->_db->quote($this->get('media_id')));
    } /* END _postDelete */
}