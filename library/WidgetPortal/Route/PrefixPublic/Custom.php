<?php
/**
 * @title Widget Portal Route PrefixPublic Custom
 * @package Widget Portal
 */

/**
 * Extended route-prefix class for the class associated with "default" route-prefix.
 * Overrides buildLink() method to return the homepage "/" url when appropriate.
 *
 * @author Shadab Ansari
 * @package GeekPoint_CustomIndex
 */
class WidgetPortal_Route_PrefixPublic_Custom extends XFCP_WidgetPortal_Route_PrefixPublic_Custom implements XenForo_Route_BuilderInterface
{
    /**
     * @see XenForo_Route_BuilderInterface::buildLink()
     * @param $originalPrefix
     * @param $outputPrefix
     * @param $action
     * @param $extension
     * @param $data
     * @param array $extraParams
     * @return bool|string
     */
    public function buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams )
    {
        $customIndex = XenForo_Application::get( 'customIndex' );
        $buildIndexLink = true;

        if ( $action === '' || $action === 'index' )
        {
            if ( $data && $customIndex->params )
            {
                foreach ( $customIndex->params as $param => $value )
                {
                    if ( !isset( $data[$param] ) || $data[$param] !== $value )
                    {
                        $buildIndexLink = false;
                        break;
                    }
                }
            }

            if ( $buildIndexLink )
            {
                return XenForo_Link::buildBasicLink( 'index', $action, $extension );
            }
        }

        if ( method_exists( get_parent_class( $this ), 'buildLink' ) )
        {
            return parent::buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, $extraParams );
        }

        return false;
    }
}