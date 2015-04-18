<?php

/**
 *
 * @see XenForo_Model_Forum
 */
class Waindigo_JokePoll_Extend_XenForo_Model_Forum extends XFCP_Waindigo_JokePoll_Extend_XenForo_Model_Forum
{

    /**
     * Determines if a joke poll can be created in the specified forum with the
     * given permissions.
     *
     * @param array $forum
     * @param string $errorPhraseKey
     * @param array|null $nodePermissions
     * @param array|null $viewingUser
     *
     * @return boolean
     */
    public function canMakeJokePollInForum(array $forum, &$errorPhraseKey = '', array $nodePermissions = null,
        array $viewingUser = null)
    {
        $this->standardizeViewingUserReferenceForNode($forum['node_id'], $viewingUser, $nodePermissions);

        return XenForo_Permission::hasContentPermission($nodePermissions, 'makeJokePoll');
    } /* END canMakeJokePollInForum */
}