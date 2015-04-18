<?php

class Waindigo_NotifyOldThreads_Option_NotifyOldThreads
{

    public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        $value = $preparedOption['option_value'];
        
        $threads = array();
        foreach ($value as $thread) {
            if (!empty($thread['thread_id'])) {
                $threads[] = $thread;
            }
        }
        
        $editLink = $view->createTemplateObject('option_list_option_editlink', 
            array(
                'preparedOption' => $preparedOption,
                'canEditOptionDefinition' => $canEdit
            ));
        
        return $view->createTemplateObject('waindigo_option_template_notifyoldthreads', 
            array(
                'fieldPrefix' => $fieldPrefix,
                'listedFieldName' => $fieldPrefix . '_listed[]',
                'preparedOption' => $preparedOption,
                'formatParams' => $preparedOption['formatParams'],
                'editLink' => $editLink,
                
                'threads' => $threads,
                'nextCounter' => count($threads)
            ));
    } /* END renderOption */

    public static function verifyOption(array &$threads, XenForo_DataWriter $dw, $fieldName)
    {
        $output = array();
        
        $threadModel = XenForo_Model::create('XenForo_Model_Thread');
        $threadsFound = $threadModel->getThreadsByIds($threads);
        foreach ($threads as $threadId) {
            if (!empty($threadsFound[$threadId])) {
                $output[$threadsFound[$threadId]['thread_id']] = array(
                    'thread_id' => $threadsFound[$threadId]['thread_id'],
                    'title' => $threadsFound[$threadId]['title']
                );
            }
        }
        
        $threads = $output;
        
        return true;
    } /* END verifyOption */

    public static function get($key)
    {
        return XenForo_Application::get('options')->get('waindigo_notifyOldThreads_' . $key);
    } /* END get */
}