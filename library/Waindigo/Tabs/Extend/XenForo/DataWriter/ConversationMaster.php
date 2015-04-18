<?php

/**
 *
 * @see XenForo_DataWriter_ConversationMaster
 */
class Waindigo_Tabs_Extend_XenForo_DataWriter_ConversationMaster extends XFCP_Waindigo_Tabs_Extend_XenForo_DataWriter_ConversationMaster
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
     * @see XenForo_DataWriter_ConversationMaster::_getFields()
     */
    protected function _getFields()
    {
        $fields = parent::_getFields();

        $fields['xf_conversation_master']['tab_id'] = array(
            'type' => self::TYPE_UINT_FORCED,
            'default' => 0
        );

        return $fields;
    } /* END _getFields */

    /**
     *
     * @see XenForo_DataWriter_ConversationMaster::_getDefaultOptions()
     */
    protected function _getDefaultOptions()
    {
        $defaultOptions = parent::_getDefaultOptions();

        $defaultOptions[self::OPTION_CHECK_TAB_RULES] = true;

        return $defaultOptions;
    } /* END _getDefaultOptions */

    /**
     *
     * @see XenForo_DataWriter_ConversationMaster::_postSave()
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
                    'match_content_type' => 'conversation'
                ));

            $tabId = $this->get('tab_id');

            $extraTabData = array();
            if (isset($GLOBALS['XenForo_ControllerPublic_Conversation'])) {
                /* @var $controller XenForo_ControllerPublic_Conversation */
                $controller = $GLOBALS['XenForo_ControllerPublic_Conversation'];

                $extraTabData = $controller->getInput()->filterSingle('extra_tab_data', XenForo_Input::ARRAY_SIMPLE);
            }

            $conversation = $this->getMergedData();
            $firstMessage = $this->_firstMessageDw;
            if ($firstMessage) {
                $messageText = $firstMessage->get('message');
                $parser = XenForo_BbCode_Parser::create(
                    XenForo_BbCode_Formatter_Base::create('XenForo_BbCode_Formatter_BbCode_AutoLink', false));
                $snippet = $parser->render(XenForo_Helper_String::wholeWordTrim($messageText, 500));
                $messageParams = array(
                    'title' => $this->get('title'),
                    'username' => $this->get('username'),
                    'contentLink' => XenForo_Link::buildPublicLink('canonical:conversations', $conversation),
                    'snippet' => $snippet
                );
                $defaultMessage = new XenForo_Phrase('waindigo_conversation_message_create_tabs', $messageParams, false);

                $params = array(
                    'user_id' => $this->get('user_id'),
                    'username' => $this->get('username'),
                    'title' => $this->get('title'),
                    'content_type' => 'conversation',
                    'content_id' => $this->get('conversation_id'),
                    'tag_line' => XenForo_Helper_String::wholeWordTrim(XenForo_Helper_string::bbCodeStrip($messageText),
                        100)
                );

                $tabNameId = '';
                foreach ($tabRules as $tabRuleId => $tabRule) {
                    if (Waindigo_Tabs_Helper_Criteria::conversationMatchesCriteria($tabRule['match_criteria'], true, $conversation)) {
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
                        $tabModel->insertTab($this->get('tab_id'), 'conversation', $this->get('conversation_id'), $tabNameId);
                    }
                }
            }
        }

        if (isset($GLOBALS['XenForo_ControllerPublic_Conversation'])) {
            /* @var $controller XenForo_ControllerPublic_Conversation */
            $controller = $GLOBALS['XenForo_ControllerPublic_Conversation'];

            // TODO: check permissions?
            $tabNameId = $controller->getInput()->filterSingle('tab_name_id', XenForo_Input::UINT);
            if ($tabNameId) {
                $this->_db->update('xf_tab_content',
                    array(
                        'tab_name_id' => $tabNameId
                    ), 'content_id = ' . $this->_db->quote($this->get('conversation_id')) . ' AND content_type = \'conversation\'');
            }
        }

        if ($postSaveChanges) {
            $this->_db->update('xf_conversation_master', $postSaveChanges,
                'conversation_id = ' . $this->_db->quote($this->get('conversation_id')));
        }

        if ($this->isChanged('tab_id') && $this->getExisting('tab_id') && $this->get('tab_id')) {
            $this->_db->update('xf_tab_content', array(
                'tab_id' => $this->get('tab_id')
            ), 'content_id = ' . $this->_db->quote($this->getExisting('conversation_id')) . ' AND content_type = \'conversation\'');
        }
    } /* END _postSave */

    /**
     * @see XenForo_DataWriter_ConversationMaster::_postDelete()
     */
    protected function _postDelete()
    {
        parent::_postDelete();

        $this->_db->delete('xf_tab_content', 'content_type = \'conversation\' AND content_id = ' . $this->_db->quote($this->get('conversation_id')));
    } /* END _postDelete */
}