<?php

class OpenFire_LiveSearch_Listener
{
    /* Load our Controller, special thanks to him. without you, this couldn't happen :* */
    public static function load_class_controller($class, array &$extend)
    {
        switch ($class) {
            case 'XenForo_ControllerPublic_Forum':
                $extend[] = 'OpenFire_LiveSearch_ControllerPublic_Forum';
                break;
        }
    }

    public static function template_hook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        switch ($hookName) {
            /* Display below the top breadcrumbs to ensure that our LiveSearch is where we want it to be, on the Top ;) */
            case 'ad_below_top_breadcrumb':
                if (! XenForo_Application::get('options')->openfire_livesearch_custom_location) {
                    $contents .= $template->create('openfire_livesearch', $template->getParams());
                }
                break;
            case 'openfire_livesearch':
                if (XenForo_Application::get('options')->openfire_livesearch_custom_location) {
                    $contents .= $template->create('openfire_livesearch', $template->getParams());
                }
                break;
            case 'openfire_livesearch_header':
                $contents .= XenForo_Application::get('options')->openfire_livesearch_header;
                break;
        }
    }

    public static function templatePostRender($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
    {
        /* If the template is the one we want to change */
        if ($templateName == 'option_list') {
            /* If we are viewing our addon options page */
            if ($containerData['title'] == 'Options: [OpenFire] - LiveSearch') {
                /* Change the default options list template to our new one */
                $content = $template->create('openfire_livesearch_options', $template->getParams());
            }
        }
    }
}

?>