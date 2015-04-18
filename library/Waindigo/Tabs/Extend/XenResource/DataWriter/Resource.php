<?php

/**
 *
 * @see XenResource_DataWriter_Resource
 */
class Waindigo_Tabs_Extend_XenResource_DataWriter_Resource extends XFCP_Waindigo_Tabs_Extend_XenResource_DataWriter_Resource
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
     * @see XenResource_DataWriter_Resource::_getFields()
     */
    protected function _getFields()
    {
        $fields = parent::_getFields();

        $fields['xf_resource']['tab_id'] = array(
            'type' => self::TYPE_UINT_FORCED,
            'default' => 0
        );

        return $fields;
    } /* END _getFields */

    /**
     *
     * @see XenResource_DataWriter_Resource::_getDefaultOptions()
     */
    protected function _getDefaultOptions()
    {
        $defaultOptions = parent::_getDefaultOptions();

        $defaultOptions[self::OPTION_CHECK_TAB_RULES] = true;

        return $defaultOptions;
    } /* END _getDefaultOptions */

    /**
     *
     * @see XenResource_DataWriter_Resource::_postSave()
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
                    'match_content_type' => 'resource'
                ));

            $tabId = $this->get('tab_id');

            $extraTabData = array();
            if (isset($GLOBALS['XenResource_ControllerPublic_Resource'])) {
                /* @var $controller XenResource_ControllerPublic_Resource */
                $controller = $GLOBALS['XenResource_ControllerPublic_Resource'];

                $extraTabData = $controller->getInput()->filterSingle('extra_tab_data', XenForo_Input::ARRAY_SIMPLE);
            }

            $resource = $this->getMergedData();
            $messageText = $this->_descriptionDw->get('message');
            $parser = XenForo_BbCode_Parser::create(
                XenForo_BbCode_Formatter_Base::create('XenForo_BbCode_Formatter_BbCode_AutoLink', false));
            $snippet = $parser->render(XenForo_Helper_String::wholeWordTrim($messageText, 500));
            $messageParams = array(
                'title' => $this->get('title'),
                'tagLine' => $this->get('tag_line'),
                'username' => $this->get('username'),
                'resourceLink' => XenForo_Link::buildPublicLink('canonical:resources', $resource),
                'snippet' => $snippet
            );
            $defaultMessage = new XenForo_Phrase('resource_message_create_resource', $messageParams, false);

            $params = array(
                'user_id' => $this->get('user_id'),
                'username' => $this->get('username'),
                'title' => $this->get('title'),
                'content_type' => 'resource',
                'content_id' => $this->get('resource_id'),
                'tag_line' => $this->get('tag_line')
            );

            $tabNameId = '';
            foreach ($tabRules as $tabRuleId => $tabRule) {
                if (Waindigo_Tabs_Helper_Criteria::resourceMatchesCriteria($tabRule['match_criteria'], true, $resource)) {
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
                    $tabModel->insertTab($this->get('tab_id'), 'resource', $this->get('resource_id'), $tabNameId);
                }
            }
        }

        if (isset($GLOBALS['XenResource_ControllerPublic_Resource'])) {
            /* @var $controller XenResource_ControllerPublic_Resource */
            $controller = $GLOBALS['XenResource_ControllerPublic_Resource'];

            // TODO: check permissions?
            $tabNameId = $controller->getInput()->filterSingle('tab_name_id', XenForo_Input::UINT);
            if ($tabNameId) {
                $this->_db->update('xf_tab_content',
                    array(
                        'tab_name_id' => $tabNameId
                    ),
                    'content_id = ' . $this->_db->quote($this->get('resource_id')) . ' AND content_type = \'resource\'');
            }
        }

        if ($postSaveChanges) {
            $this->_db->update('xf_resource', $postSaveChanges,
                'resource_id = ' . $this->_db->quote($this->get('resource_id')));
        }

        if ($this->isChanged('tab_id') && $this->getExisting('tab_id') && $this->get('tab_id')) {
            $this->_db->update('xf_tab_content', array(
                'tab_id' => $this->get('tab_id')
            ), 'content_id = ' . $this->_db->quote($this->getExisting('media_id')) . ' AND content_type = \'resource\'');
        }
    } /* END _postSave */

    /**
     * @see XenResource_DataWriter_Resource::_postDelete()
     */
    protected function _postDelete()
    {
        parent::_postDelete();

        $this->_db->delete('xf_tab_content', 'content_type = \'resource\' AND content_id = ' . $this->_db->quote($this->get('resource_id')));
    } /* END _postDelete */
}