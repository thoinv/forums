<?php
class addThisPost_Listener
{
    public static function template_create($templateName, array &$params, XenForo_Template_Abstract $template)
    {
        switch ($templateName) {
            case 'ad_message_below':
                $template->preloadTemplate('addthis_ajax_post');
                break;
        }
    }
    
    public static function template_hook ($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        switch ($hookName)
        {
            case 'ad_message_below':
                $ourTemplate = $template->create('addthis_ajax_post', $template->getParams());
                $rendered = $ourTemplate->render();
                $contents .= $rendered;
                break;
        }
    }
}
?>