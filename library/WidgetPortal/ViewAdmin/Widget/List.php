<?php
class WidgetPortal_ViewAdmin_Widget_List extends WidgetFramework_ViewAdmin_Widget_List
{
    public function renderHtml()
    {
        $this->_params['positions'] = $this->renderPositions( $this->_params['widgets'] );
    }

    protected function renderPositions( $widgets )
    {
        $positions = array();
        foreach ( $widgets as &$widget )
        {
            $widgetPositions = explode( ',', $widget['position'] );

            foreach ( $widgetPositions as $position )
            {
                $position = trim( $position );
                if ( empty( $position ) ) continue;

                if ( !isset( $positions[$position] ) )
                {
                    $positions[$position] = array(
                        'position' => $position,
                        'widgets' => array(),
                    );
                }

                if ( !empty( $widget['options']['tab_group'] ) )
                {
                    if ( !isset( $positions[$position]['widgets'][$widget['options']['tab_group']] ) )
                    {
                        $positions[$position]['widgets'][$widget['options']['tab_group']] = array(
                            'tabGroup' => $widget['options']['tab_group'],
                            'widgets' => array(),
                        );
                    }
                    $positions[$position]['widgets'][$widget['options']['tab_group']]['widgets'][] =& $widget;
                }
                else
                {
                    $positions[$position]['widgets'][] =& $widget;
                }
            }
        }

        usort( $positions, create_function( '$a, $b', 'return $a["position"] > $b["position"];' ) );

        return $positions;
    }
}