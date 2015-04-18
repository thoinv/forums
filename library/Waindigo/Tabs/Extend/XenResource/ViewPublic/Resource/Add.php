<?php

/**
 *
 * @see XenResource_ViewPublic_Resource_Add
 */
class Waindigo_Tabs_Extend_XenResource_ViewPublic_Resource_Add extends XFCP_Waindigo_Tabs_Extend_XenResource_ViewPublic_Resource_Add
{

    /**
     *
     * @see XenGallery_ViewPublic_Media_Add::renderHtml()
     */
    public function renderHtml()
    {
        parent::renderHtml();

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = XenForo_Model::create('Waindigo_Tabs_Model_Tab');

        /* @var $tabRuleModel Waindigo_Tabs_Model_TabRule */
        $tabRuleModel = XenForo_Model::create('Waindigo_Tabs_Model_TabRule');
        $tabRules = $tabRuleModel->getTabRules(array(
            'match_content_type' => 'resource'
        ));

        $resource = array(
            'resource_category_id' => $this->_params['category']['resource_category_id']
        );
        $tabCreateTemplates = array();
        foreach ($tabRules as $tabRuleId => $tabRule) {
            if (Waindigo_Tabs_Helper_Criteria::resourceMatchesCriteria($tabRule['match_criteria'], true, $resource)) {
                $tabCreateTemplates[$tabRuleId] = $tabModel->getCreateTemplate($tabRule, $this);
            }
        }

        $this->_params['tabCreateTemplates'] = $tabCreateTemplates;
    } /* END renderHtml */
}