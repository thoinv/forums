<?php

/**
 *
 * @see XenForo_ViewPublic_Thread_Create
 */
class Waindigo_Tabs_Extend_XenForo_ViewPublic_Thread_Create extends XFCP_Waindigo_Tabs_Extend_XenForo_ViewPublic_Thread_Create
{

    /**
     *
     * @see XenForo_ViewPublic_Thread_Create::renderHtml()
     */
    public function renderHtml()
    {
        parent::renderHtml();

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = XenForo_Model::create('Waindigo_Tabs_Model_Tab');

        /* @var $tabRuleModel Waindigo_Tabs_Model_TabRule */
        $tabRuleModel = XenForo_Model::create('Waindigo_Tabs_Model_TabRule');
        $tabRules = $tabRuleModel->getTabRules(array(
            'match_content_type' => 'thread'
        ));

        $thread = array(
            'node_id' => $this->_params['forum']['node_id']
        );
        $tabCreateTemplates = array();
        foreach ($tabRules as $tabRuleId => $tabRule) {
            if (Waindigo_Tabs_Helper_Criteria::threadMatchesCriteria($tabRule['match_criteria'], true, $thread)) {
                $tabCreateTemplates[$tabRuleId] = $tabModel->getCreateTemplate($tabRule, $this);
            }
        }

        $this->_params['tabCreateTemplates'] = $tabCreateTemplates;
    } /* END renderHtml */
}