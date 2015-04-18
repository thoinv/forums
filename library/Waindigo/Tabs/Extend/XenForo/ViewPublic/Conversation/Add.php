<?php

/**
 *
 * @see XenForo_ViewPublic_Conversation_Add
 */
class Waindigo_Tabs_Extend_XenForo_ViewPublic_Conversation_Add extends XFCP_Waindigo_Tabs_Extend_XenForo_ViewPublic_Conversation_Add
{

    /**
     *
     * @see XenForo_ViewPublic_Conversation_Add::renderHtml()
     */
    public function renderHtml()
    {
        parent::renderHtml();

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = XenForo_Model::create('Waindigo_Tabs_Model_Tab');

        /* @var $tabRuleModel Waindigo_Tabs_Model_TabRule */
        $tabRuleModel = XenForo_Model::create('Waindigo_Tabs_Model_TabRule');
        $tabRules = $tabRuleModel->getTabRules(array(
            'match_content_type' => 'conversation'
        ));

        $visitor = XenForo_Visitor::getInstance();

        $conversation = array(
            'username' => $visitor['username']
        );
        $tabCreateTemplates = array();
        foreach ($tabRules as $tabRuleId => $tabRule) {
            if (Waindigo_Tabs_Helper_Criteria::conversationMatchesCriteria($tabRule['match_criteria'], true,
                $conversation)) {
                $tabCreateTemplates[$tabRuleId] = $tabModel->getCreateTemplate($tabRule, $this);
            }
        }

        $this->_params['tabCreateTemplates'] = $tabCreateTemplates;
    } /* END renderHtml */
}