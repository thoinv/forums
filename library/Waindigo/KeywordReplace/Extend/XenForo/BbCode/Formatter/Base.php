<?php

/**
 *
 * @see XenForo_BbCode_Formatter_Base
 */
class Waindigo_KeywordReplace_Extend_XenForo_BbCode_Formatter_Base extends XFCP_Waindigo_KeywordReplace_Extend_XenForo_BbCode_Formatter_Base
{

    /**
     *
     * @see XenForo_BbCode_Formatter_Base::filterString()
     */
    public function filterString($string, array $rendererStates)
    {
        $string = parent::filterString($string, $rendererStates);

        $userGroupIds = XenForo_Application::get('options')->waindigo_keywordReplace_excludedUserGroups;

        $user = XenForo_Visitor::getInstance()->toArray();

        /* @var $userModel XenForo_Model_User */
        $userModel = XenForo_Model::create('XenForo_Model_User');

        if (!$userModel->isMemberOfUserGroup($user, $userGroupIds) && !isset($rendererStates['insideUrl'])) {
            $string = Waindigo_KeywordReplace_Helper_String::keywordReplaceString($string);
        }

        return $string;
    } /* END filterString */

    /**
     *
     * @see XenForo_BbCode_Formatter_Base::renderTagUrl()
     */
    public function renderTagUrl(array $tag, array $rendererStates)
    {
        if (!empty($tag['option'])) {
            $rendererStates['insideUrl'] = true;
        }
        return parent::renderTagUrl($tag, $rendererStates);
    } /* END renderTagUrl */
}