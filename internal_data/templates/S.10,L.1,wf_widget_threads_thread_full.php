<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

';
$link = '';
$link .= (($thread['_link']) ? ($thread['_link']) : (XenForo_Template_Helper_Core::link('threads', $thread, array())));
$__output .= '
';
$info = '';
$__compilerVar1 = '';
$__compilerVar2 = '';
$__compilerVar2 .= '
			';
$__compilerVar3 = '';
$__compilerVar3 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullViewCount'))
{
$__compilerVar3 .= '
				<span class="viewCount">' . 'Views' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar3 .= '<span class="divider">/</span>';
}
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes'))
{
$__compilerVar3 .= '
				<span class="firstPostLikes">' . 'Likes' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar3 .= '<span class="divider">/</span>';
}
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar3 .= '
				<span class="replyCount">' . 'Replies' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '</span>
			';
}
$__compilerVar3 .= '

			';
$__compilerVar2 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_counters', $__compilerVar3, array(
'thread' => $thread
));
unset($__compilerVar3);
$__compilerVar2 .= '
		';
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
	<div class="counters">
		' . $__compilerVar2 . '
	</div>
';
}
unset($__compilerVar2);
$__compilerVar1 .= '

';
$__compilerVar4 = '';
$__compilerVar4 .= '
			';
$__compilerVar5 = '';
$__compilerVar5 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullUser'))
{
$__compilerVar5 .= '
				<span class="user">' . 'by' . ' ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',(true),array())) . '</span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar5 .= '<span class="divider">,</span>';
}
$__compilerVar5 .= '
			';
}
$__compilerVar5 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum'))
{
$__compilerVar5 .= '
				<span class="user">' . 'in forum' . ' <a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar5 .= '<span class="divider">,</span>';
}
$__compilerVar5 .= '
			';
}
$__compilerVar5 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar5 .= '
				<a href="' . $link . '">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date'
))) . '</a>
			';
}
$__compilerVar5 .= '

			';
$__compilerVar4 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_main', $__compilerVar5, array(
'thread' => $thread
));
unset($__compilerVar5);
$__compilerVar4 .= '
		';
if (trim($__compilerVar4) !== '')
{
$__compilerVar1 .= '
	<div class="main">
		' . $__compilerVar4 . '
	</div>
';
}
unset($__compilerVar4);
$info .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

<div id="post-' . htmlspecialchars($thread['first_post_id'], ENT_QUOTES, 'UTF-8') . '" class="message section sectionMain' . (($thread['isNew']) ? (' unread') : ('')) . '" data-author="' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="subHeading thread">
		<a href="' . $link . '">' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a>
	</div>

	';
if (!XenForo_Template_Helper_Core::styleProperty('wf_threads_fullInfoBottom'))
{
$__output .= '
		';
$__compilerVar6 = '';
$__compilerVar6 .= $info;
if (trim($__compilerVar6) !== '')
{
$__output .= '<div class="info">' . $__compilerVar6 . '</div>';
}
unset($__compilerVar6);
$__output .= '
	';
}
$__output .= '

	<div class="messageInfo">
		';
if ($thread['isNew'])
{
$__output .= '<strong class="newIndicator"><span></span>' . 'New' . '</strong>';
}
$__output .= '

		';
$__compilerVar7 = '';
$__compilerVar7 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText ugc baseHtml">
					' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => '0',
'2' => array(
'link' => $link
)
)) . '
				</blockquote>
			</article>
		</div>
		';
$__output .= $this->callTemplateHook('message_content', $__compilerVar7, array(
'message' => $thread,
'WidgetFramework_WidgetRenderer_Threads_FullThreadList' => '1'
));
unset($__compilerVar7);
$__output .= '

	</div>

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullInfoBottom'))
{
$__output .= '
		';
$__compilerVar8 = '';
$__compilerVar8 .= $info;
if (trim($__compilerVar8) !== '')
{
$__output .= '<div class="info">' . $__compilerVar8 . '</div>';
}
unset($__compilerVar8);
$__output .= '
	';
}
$__output .= '

</div>';
