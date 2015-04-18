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

class sonnb_LiveThread_ViewPublic_Thread_ReplyLive extends XenForo_ViewPublic_Thread_View
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

	    if (XenForo_Application::getOptions()->sonnb_LiveThread_reserveOrder)
	    {
		    $lastPost = reset($this->_params['posts']);
	    }
	    else
	    {
		    $lastPost = end($this->_params['posts']);
	    }

	    $template = $this->createTemplateObject('', $viewParams);
	    $viewOutput = $template->render();
	    $output['css'] = $template->getRequiredExternals('css');
	    $output['js'] = $template->getRequiredExternals('js');

        $output['lastDate'] = $lastPost['post_date'];
	    $output['reserveOrder'] = isset($viewParams['reserveOrder']) ? $viewParams['reserveOrder'] : false;

	    return XenForo_ViewRenderer_Json::jsonEncodeForOutput($output);
    }

}