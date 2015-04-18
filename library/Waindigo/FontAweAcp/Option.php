<?php

class Waindigo_FontAweAcp_Option
{

    public static function renderIconsOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        $preparedOption['icons'] = array(
            'options' => new XenForo_Phrase('options'),
            'add_ons' => new XenForo_Phrase('add_ons'),
            'smilies' => new XenForo_Phrase('smilies'),
            'nodes' => new XenForo_Phrase('display_node_tree'),
            'nodes_add' => new XenForo_Phrase('create_new_node'),
            'node_permissions' => new XenForo_Phrase('node_permissions'),
            'feeder' => new XenForo_Phrase('registered_feeds'),
            'spam_cleaner' => new XenForo_Phrase('spam_cleaner_log'),
            'users_list' => new XenForo_Phrase('list_all_users'),
            'users_moderated' => new XenForo_Phrase('users_awaiting_approval'),
            'banning_users' => new XenForo_Phrase('banned_users'),
            'user_groups' => new XenForo_Phrase('user_groups'),
            'user_group_permissions' => new XenForo_Phrase('group_permissions'),
            'trophies' => new XenForo_Phrase('trophies'),
            'trophy_user_titles' => new XenForo_Phrase('trophy_user_titles'),
            'user_upgrades' => new XenForo_Phrase('user_upgrades'),
            'styles' => new XenForo_Phrase('styles'),
            'styles_templates' => new XenForo_Phrase('templates'),
            'style_properties' => new XenForo_Phrase('style_properties'),
            'palette' => new XenForo_Phrase('color_palette'),
            'languages' => new XenForo_Phrase('languages'),
            'phrases' => new XenForo_Phrase('phrases'),
            'cron' => new XenForo_Phrase('cron_entries'),
            'tools_rebuild' => new XenForo_Phrase('rebuild_caches'),
            'import' => new XenForo_Phrase('import_external_data'),
            'qacaptcha' => new XenForo_Phrase('question_and_answer_captchas'),
            'server_error_log' => new XenForo_Phrase('server_error_log'),
            'facebook_test' => new XenForo_Phrase('test_facebook_integration'),
        );
    
        return self::renderOption($view, $fieldPrefix, $preparedOption, $canEdit);
    } /* END renderIconsOption */
    
    public static function renderDevIconsOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        if (!XenForo_Application::debugMode()) {
            return '';
        }
        
        $preparedOption['icons'] = array(
            'add_ons_add' => new XenForo_Phrase('create_add_on'),
            'code_events' => new XenForo_Phrase('code_events'),
            'code_event_listeners' => new XenForo_Phrase('code_event_listeners'),
            'admin_templates' => new XenForo_Phrase('admin_templates'),
            'admin_style_properties' => new XenForo_Phrase('admin_style_properties'),
            'admin_navigation' => new XenForo_Phrase('admin_navigation'),
            'route_prefixes' => new XenForo_Phrase('route_prefixes'),
            'email_templates' => new XenForo_Phrase('email_templates')
        );
    
        return self::renderOption($view, $fieldPrefix, $preparedOption, $canEdit);
    } /* END renderDevIconsOption */
    
    public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal('waindigo_option_list_option_textboxes_fontaweacp', $view, $fieldPrefix, $preparedOption, $canEdit);
    } /* END renderOption */
}