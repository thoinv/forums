<?php
/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

class sonnb_LiveThread_ViewPublic_Thread_PostLoader extends XenForo_ViewPublic_Thread_View
{

    public function renderJson()
    {
        $output = array();

        $bbCodeParser = new XenForo_BbCode_Parser(XenForo_BbCode_Formatter_Base::create('Base', array('view' => $this)));
        $bbCodeOptions = array(
            'states' => array(
                'viewAttachments' => $this->_params['canViewAttachments']
            )
        );
        XenForo_ViewPublic_Helper_Message::bbCodeWrapMessages($this->_params['posts'], $bbCodeParser, $bbCodeOptions);

	    $viewParams = $this->_params;
	    unset($viewParams['posts']);

        foreach ($this->_params['posts'] as &$post)
        {
            $viewParams['post'] = $post;

	        $template = $this->createTemplateObject('post', $viewParams);
            $output['posts'][] = $template->render();
        }

	    $template = $this->createTemplateObject('', $viewParams);
	    $viewOutput = $template->render();
	    $output['css'] = $template->getRequiredExternals('css');
	    $output['js'] = $template->getRequiredExternals('js');

        $output['postsPerPage'] = $this->_params['postsPerPage'];
        $output['oldPostsRemaining'] = $this->_params['oldPostsRemaining'];
        $output['firstPostDate'] = $this->_params['firstPostDate'];
	    $output['reserveOrder'] = isset($viewParams['reserveOrder']) ? $viewParams['reserveOrder'] : false;

	    return XenForo_ViewRenderer_Json::jsonEncodeForOutput($output);
    }

}