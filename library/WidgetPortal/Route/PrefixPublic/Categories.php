<?php
/**
 * @title Widget Portal Route PrefixPublic Categories
 * @package Widget Portal
 */

/**
 * Extended class for the "categories" route prefix.
 * Fixes the URL generated for categories at depth = 0, when the "Create Pages for Categories"
 * option is disabled. Prepends the generated hash-tag with the forum-index URL.
 *
 * @author Shadab
 * @package GeekPoint_CustomIndex
 */
class WidgetPortal_Route_PrefixPublic_Categories extends XFCP_WidgetPortal_Route_PrefixPublic_Categories implements XenForo_Route_BuilderInterface
{
    /**
     * @see XenForo_Route_BuilderInterface::buildLink()
     * @param $originalPrefix
     * @param $outputPrefix
     * @param $action
     * @param $extension
     * @param $data
     * @param array $extraParams
     * @return string
     */
    public function buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams )
    {
        $link = parent::buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, $extraParams );

        if ( !$link instanceof XenForo_Link )
        {
            return $link;
        }

        return XenForo_Link::buildBasicLink( 'forum', $action, $extension ) . strval( $link );
    }
}