<?php

/**
 *
 * @see XenGallery_ViewPublic_Media_Add
 */
class Waindigo_Tabs_Extend_XenGallery_ViewPublic_Media_Add extends XFCP_Waindigo_Tabs_Extend_XenGallery_ViewPublic_Media_Add
{

    /**
     *
     * @see XenGallery_ViewPublic_Media_Add::renderJson()
     */
    public function renderJson()
    {
        if (!empty($this->_params['container']['category_id'])) {
            /* @var $tabModel Waindigo_Tabs_Model_Tab */
            $tabModel = XenForo_Model::create('Waindigo_Tabs_Model_Tab');

            /* @var $tabRuleModel Waindigo_Tabs_Model_TabRule */
            $tabRuleModel = XenForo_Model::create('Waindigo_Tabs_Model_TabRule');
            $tabRules = $tabRuleModel->getTabRules(array(
                'match_content_type' => 'xengallery_media'
            ));

            $media = array(
                'category_id' => $this->_params['container']['category_id']
            );
            $tabCreateTemplates = array();
            foreach ($tabRules as $tabRuleId => $tabRule) {
                if (Waindigo_Tabs_Helper_Criteria::mediaMatchesCriteria($tabRule['match_criteria'], true, $media)) {
                    $tabCreateTemplates[$tabRuleId] = $tabModel->getCreateTemplate($tabRule, $this);
                }
            }

            $this->_params['tabCreateTemplates'] = $tabCreateTemplates;
        }

        return parent::renderJson();
    } /* END renderJson */
}