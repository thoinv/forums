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

class sonnb_LiveThread_Listener
{
    const SONNB_LIVETHREAD_LIVE_SWITCH = 'SONNB_LIVETHREAD_LIVE_SWITCH';

    public static function load_class($class, array &$extend)
    {
        switch ($class)
        {
            case 'XenForo_DataWriter_Discussion_Thread':
                $extend[] = 'sonnb_LiveThread_DataWriter_Discussion_Thread';
                break;

            case 'XenForo_ControllerPublic_Thread':
                $extend[] = 'sonnb_LiveThread_ControllerPublic_Thread';
                break;

            case 'XenForo_Model_Post':
                $extend[] = 'sonnb_LiveThread_Model_Post';
                break;
            case 'XenForo_Model_Thread':
                $extend[] = 'sonnb_LiveThread_Model_Thread';
                break;

            case 'XenForo_Route_Prefix_Threads':
                $extend[] = 'sonnb_LiveThread_Route_Prefix_Threads';
                break;
        }
    }
    
    public static function template_create($templateName, array &$params, XenForo_Template_Abstract $template)
    {
        switch ($templateName)
        {
	        case 'thread_online':
            case 'thread_view':
                $visitor = XenForo_Visitor::getInstance();
                $options = XenForo_Application::get('options');
        
                $livedNodes = $options->sonnb_LiveThread_EnabledNodes;
        
                $hasViewPermission =  ($visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Use') || $visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Manage'));
                
                if (isset($params['thread']) && 
                		($params['thread']['sonnb_live_thread'] || in_array($params['thread']['node_id'], $livedNodes)) && 
                		$hasViewPermission)
                {
                    $template->addRequiredExternal('js', 'js/sonnb/LiveThread/LiveThread.js');
                    $template->addRequiredExternal('css', 'thread_view_live');
                }
                break;
        }
    }

	public static function template_post_render($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
	{
		if ($template instanceof XenForo_Template_Admin)
		{
			return;
		}

		switch ($templateName)
		{
			case 'post':
				$params = $template->getParams();
				$visitor = XenForo_Visitor::getInstance();

				$xenOptions = XenForo_Application::get('options');
				$showFb = $xenOptions->sonnb_LiveThread_showFb;
				$hideSignature = $xenOptions->sonnb_LiveThread_Signature;
				$livedNodes = $xenOptions->sonnb_LiveThread_EnabledNodes;

				$hasManagePermission = $visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Manage');
				$hasViewPermission = $visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Use') || $hasManagePermission;

				if (isset($params['thread']) &&
					($params['thread']['sonnb_live_thread'] || in_array($params['thread']['node_id'], $livedNodes)) &&
					$hasViewPermission)
				{
					if ($hideSignature)
					{
						libxml_use_internal_errors(true);

						$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
						$dom = new DOMDocument('1.0', 'UTF-8');
						$dom->loadHTML($content);
						$xpath = new DOMXPath($dom);
						$matchSignatures = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' baseHtml ')][contains(concat(' ', normalize-space(@class), ' '), ' signature ')]");

						if ($matchSignatures->length)
						{
							foreach ($matchSignatures as $signature)
							{
								$signature->parentNode->removeChild($signature);
							}

							$content = $dom->saveHTML();
							$content = preg_replace('#<(?:!DOCTYPE|/?(?:html|head|body))[^>]*>\s*#i', '', $content);
						}

						$content = htmlspecialchars_decode(utf8_decode(htmlentities($content, ENT_COMPAT, 'UTF-8', false)));
						libxml_use_internal_errors(false);
					}

					if (!empty($showFb['show']))
					{
						if (!empty($showFb['position']) && $showFb['position'] === 'first' && $params['post']['position'] > 0)
						{
							return;
						}

						libxml_use_internal_errors(true);

						$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
						$dom = new DOMDocument('1.0', 'UTF-8');
						$dom->loadHTML($content);

						$append = $template->create(
							'sonnb_LiveThread_facebook_comment',
							array(
								'post' => $params['post'],
								'options' => $showFb,
								'ajaxCall' => true
							)
						);
						$frag = $dom->createCDATASection($append);
						$dom->childNodes->item(1)->firstChild->firstChild->appendChild($frag);

						$content = $dom->saveHTML();
						$content = preg_replace('#<(?:!DOCTYPE|/?(?:html|head|body))[^>]*>\s*#i', '', $content);

						$content = htmlspecialchars_decode(utf8_decode(htmlentities($content, ENT_COMPAT, 'UTF-8', false)));
						libxml_use_internal_errors(false);
					}
				}
				break;
			case 'thread_online':
			case 'thread_view':
				$params = $template->getParams();
				$visitor = XenForo_Visitor::getInstance();

				$xenOptions = XenForo_Application::get('options');
				$enablePagination = $xenOptions->sonnb_LiveThread_Pagination;
				$livedNodes = $xenOptions->sonnb_LiveThread_EnabledNodes;

				$hasManagePermission = $visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Manage');
				$hasViewPermission = $visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Use') || $hasManagePermission;

				if ($hasManagePermission && preg_match_all('#<ul[^>]*?\bclass="secondaryContent\s*blockLinksList\s*checkboxColumns"[^>]*+>(.*)<\/ul>#Usi', $content, $matchCheckboxes))
				{
					foreach ($matchCheckboxes[0] as $_key => $checkboxes)
					{
						$checkboxTemplate = $template->create('sonnb_LiveThread_sticker', $params);

						$checkboxesLive = str_replace($matchCheckboxes[1][$_key], $matchCheckboxes[1][$_key].$checkboxTemplate, $checkboxes);
						$content = str_replace($checkboxes, $checkboxesLive, $content);
					}
				}

				if (isset($params['thread']) &&
					($params['thread']['sonnb_live_thread'] || in_array($params['thread']['node_id'], $livedNodes)) &&
					$hasViewPermission)
				{
					$hideSignature = $xenOptions->sonnb_LiveThread_Signature;
					$showFb = $xenOptions->sonnb_LiveThread_showFb;
					$interval = $xenOptions->sonnb_LiveThread_Interval;
					$postsRemaining = isset($params['oldPostsRemaining']) ? $params['oldPostsRemaining'] : 0;
					$isLastPage = isset($params['isLastPage']) ? $params['isLastPage'] : 0;
					$QuickReplyOnTop = $xenOptions->sonnbLT_FormOnTop;

					if ($hideSignature)
					{
						libxml_use_internal_errors(true);

						$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
						$dom = new DOMDocument('1.0', 'UTF-8');
						$dom->formatOutput = false;
						$dom->loadHTML($content);
						$xpath = new DOMXPath($dom);
						$matchSignatures = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' baseHtml ')][contains(concat(' ', normalize-space(@class), ' '), ' signature ')]");

						if ($matchSignatures->length)
						{
							foreach ($matchSignatures as $signature)
							{
								$signature->parentNode->removeChild($signature);
							}

							$content = $dom->saveHTML();
							$content = preg_replace('#<(?:!DOCTYPE|/?(?:html|head|body))[^>]*>\s*#i', '', $content);
						}

						$content = htmlspecialchars_decode(utf8_decode(htmlentities($content, ENT_COMPAT, 'UTF-8', false)));
						libxml_use_internal_errors(false);
					}

					if (!empty($showFb['show']))
					{
						libxml_use_internal_errors(true);

						$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
						$dom = new DOMDocument('1.0', 'UTF-8');
						$dom->loadHTML($content);
						$xpath = new DOMXPath($dom);
						$matchPosts = $xpath->query("//li[contains(concat(' ', normalize-space(@class), ' '), ' message ')]");

						if ($matchPosts->length)
						{
							/* @var $_post DOMElement*/
							foreach ($matchPosts as $_post)
							{
								$postId = preg_replace("/[^0-9]/","", $_post->getAttribute('id'));
								$postId = intval($postId);

								if (!isset($params['posts'][$postId]))
								{
									continue;
								}

								$__post = $params['posts'][$postId];

								if (!empty($showFb['position']) && $showFb['position'] === 'first' && $__post['position'] > 0)
								{
									continue;
								}

								$append = $template->create(
									'sonnb_LiveThread_facebook_comment',
									array(
										'post' => $__post,
										'options' => $showFb
									)
								);
								$frag = $dom->createCDATASection($append);
								$_post->appendChild($frag);
							}

							$content = $dom->saveHTML();
							$content = preg_replace('#<(?:!DOCTYPE|/?(?:html|head|body))[^>]*>\s*#i', '', $content);
						}

						$content = htmlspecialchars_decode(utf8_decode(htmlentities($content, ENT_COMPAT, 'UTF-8', false)));
						libxml_use_internal_errors(false);
					}

					if (preg_match_all('#<a[^>]*?\bclass="ReplyQuote.*"[^>]*+>.*<\/a>#Usi', $content, $matchReplyQuote))
					{
						foreach ($matchReplyQuote[0] as $replyQuote)
						{
							$replyQuoteLive = str_replace('ReplyQuote', 'ReplyQuoteLive', $replyQuote);
							$content = str_replace($replyQuote, $replyQuoteLive, $content);
						}
					}

					if ($QuickReplyOnTop
						&& preg_match('#<form[^>]*?\bclass="InlineModForm\s*section"[^>]*+#Usi', $content, $matchInlineForm))
					{
						libxml_use_internal_errors(true);

						$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
						$dom = new DOMDocument('1.0', 'UTF-8');
						$dom->loadHTML($content);
						$xpath = new DOMXPath($dom);
						$matchDivQuickReply = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' quickReply ')][contains(concat(' ', normalize-space(@class), ' '), ' message ')]");

						$quickReplyHtml = '';
						if ($matchDivQuickReply->length)
						{
							/* @var $_QuickReply DOMElement*/
							foreach ($matchDivQuickReply as $_quickReply)
							{
								$quickReplyHtml = $dom->saveHTML($_quickReply);
								$_quickReply->parentNode->removeChild($_quickReply);
							}

							$content = $dom->saveHTML();
							$content = preg_replace('#<(?:!DOCTYPE|/?(?:html|head|body))[^>]*>\s*#i', '', $content);
						}

						$content = htmlspecialchars_decode(utf8_decode(htmlentities($content, ENT_COMPAT, 'UTF-8', false)));
						libxml_use_internal_errors(false);

						$content = str_replace($matchInlineForm[0], $quickReplyHtml.$matchInlineForm[0], $content);
					}

					if (preg_match('#<form[^>]*?\bid="QuickReply"[^>]*+>.*<\/form>#Usi', $content, $matchReplyForm))
					{
						$replyFormLive = str_replace('AutoValidator', 'AutoValidator QuickReplyLive', $matchReplyForm[0]);
						$content = str_replace($matchReplyForm[0], $replyFormLive, $content);
					}

					if (preg_match('#<form[^>]*?\bclass="InlineModForm\s*section"[^>]*+#Usi', $content, $matchInlineForm))
					{
						$fetchLink = XenForo_Link::buildPublicLink('threads/live-thread-updates', $params['thread']);
						$timestamp = isset($params['timestamp']) ? $params['timestamp'] : 0;

						$inlineFormLive = $matchInlineForm[0].'
							data-timestamp="'.$timestamp.'"
							data-config=\'{"isLastPage":"'.$isLastPage.'","pagination":"'.$enablePagination.'","intervalInSeconds":"'.$interval.'","ajaxTimeoutInSeconds": 10,"postUrl":"'.$fetchLink.'","debug":"1"}\'
						';

						$content = str_replace($matchInlineForm[0], $inlineFormLive, $content);
					}

					if ($enablePagination)
					{
						if (preg_match('#<input[^>]*?(?=[^>]*\bname="last_date")(?=[^>]*\btype="hidden")[^>]*+>#Usi', $content, $matchLastDate))
						{
							$lastDateTemplate = $template->create('sonnb_LiveThread_last_date', $params);
							$content = str_replace($matchLastDate[0], $matchLastDate[0].$lastDateTemplate, $content);
						}
					}
					else
					{
						$posts = $params['posts'];

						if ($xenOptions->sonnb_LiveThread_reserveOrder)
						{
							$firstPost = end($posts);

							if (!empty($firstPost) && empty($firstPost['position']) && $postsRemaining)
							{
								$pattern = '#<li[^>]*?(?=[^>]*\bid="post-'.$firstPost['post_id'].'")(?=[^>]*\bclass="message[^"]*")[^>]*+>.*<\/li>\s*(?:(<\/ol>|<li[^>]*?(?=[^>]*\bid="post-([0-9]+)")(?=[^>]*\bclass="message[^"]*")[^>]*+>))#Usi';

								if (preg_match($pattern, $content, $matchFirstPost))
								{
									$loadOlderPostsTemplate = $template->create('sonnb_LiveThread_load_previous', $params);
									$content = str_replace($matchFirstPost[0], $loadOlderPostsTemplate.$matchFirstPost[0], $content);
								}
							}
						}
						else
						{
							$firstPost = reset($posts);

							if (!empty($firstPost) && empty($firstPost['position']) && $postsRemaining)
							{
								$pattern = '#<li[^>]*?(?=[^>]*\bid="post-'.$firstPost['post_id'].'")(?=[^>]*\bclass="message[^"]*")[^>]*+>.*<\/li>\s*(?:(<\/ol>|<li[^>]*?(?=[^>]*\bid="post-([0-9]+)")(?=[^>]*\bclass="message[^"]*")[^>]*+>))#Usi';

								if (preg_match($pattern, $content, $matchFirstPost))
								{
									$loadOlderPostsTemplate = $template->create('sonnb_LiveThread_load_previous', $params);
									$firstPostNew = str_replace($matchFirstPost[1], $loadOlderPostsTemplate.$matchFirstPost[1], $matchFirstPost[0]);
									$content = str_replace($matchFirstPost[0], $firstPostNew, $content);
								}
							}
						}

						libxml_use_internal_errors(true);

						$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
						$dom = new DOMDocument('1.0', 'UTF-8');
						$dom->loadHTML($content);
						$xpath = new DOMXPath($dom);
						$matchPageNav = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' PageNav ')]");
						$matchRemainCount = $xpath->query("//a[contains(concat(' ', normalize-space(@class), ' '), ' postsRemaining ')]");

						if ($matchPageNav->length)
						{
							foreach ($matchPageNav as $pageNav)
							{
								$pageNav->parentNode->removeChild($pageNav);
							}
						}

						if ($matchRemainCount->length)
						{
							foreach ($matchRemainCount as $remainCount)
							{
								$remainCount->parentNode->removeChild($remainCount);
							}
						}

						if ($matchPageNav->length || $matchRemainCount->length)
						{
							$content = $dom->saveHTML();
							$content = preg_replace('#<(?:!DOCTYPE|/?(?:html|head|body))[^>]*>\s*#i', '', $content);
						}

						$content = htmlspecialchars_decode(utf8_decode(htmlentities($content, ENT_COMPAT, 'UTF-8', false)));
						libxml_use_internal_errors(false);
					}

					$fbEscaped = array("<like", "</like>", "<comments", "</comments>");
					$fbOriginal = array("<fb:like", "</fb:like>", "<fb:comments", "</fb:comments>");
					$content = str_replace($fbEscaped, $fbOriginal, $content);
				}

				break;
		}
	}
    
    public static function template_hook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
    	switch ($hookName)
    	{
    		case 'thread_view_qr_after':
			    $options = XenForo_Application::get('options');
    			if (XenForo_Application::getConfig()->get('sonnbLiveThreadCopyrightRemoved') !== true &&
				        isset($hookParams['thread']) && ($hookParams['thread']['sonnb_live_thread'] ||
			            in_array($hookParams['thread']['node_id'], $options->sonnb_LiveThread_EnabledNodes)))
    			{
    				$contents .= $template->create('sonnb_LiveThread_copyright')->render();
    			}
    			break;
    	}
    }
    
    public static function renderNodes(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        $preparedOption['formatParams'] = self::getNodeOptions(
                $preparedOption['option_value']
        );

        return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
                'sonnb_LiveThread_Nodes', $view, $fieldPrefix, $preparedOption, $canEdit
        );
    }

    public static function getNodeOptions($selectedForum, $includeRoot = false)
    {
        $nodeModel = XenForo_Model::create('XenForo_Model_Node');

        $options = array();

        foreach ($nodeModel->getAllNodes() AS $nodeId => $node)
        {
            $node['depth'] += (($includeRoot && $nodeId) ? 1 : 0);

            $options[$nodeId] = array(
                'value' => $nodeId,
                'label' => $node['title'],
                'selected' => in_array($nodeId, $selectedForum),
                'depth' => $node['depth'],
                'node_type_id' => $node['node_type_id']
            );
        }

        return $options;
    }
}
