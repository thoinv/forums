<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
			';
$__compilerVar2 = '';
$__compilerVar2 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullViewCount'))
{
$__compilerVar2 .= '
				<span class="viewCount">' . 'Views' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar2 .= '<span class="divider">/</span>';
}
$__compilerVar2 .= '
			';
}
$__compilerVar2 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes'))
{
$__compilerVar2 .= '
				<span class="firstPostLikes">' . 'Likes' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar2 .= '<span class="divider">/</span>';
}
$__compilerVar2 .= '
			';
}
$__compilerVar2 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar2 .= '
				<span class="replyCount">' . 'Replies' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '</span>
			';
}
$__compilerVar2 .= '

			';
$__compilerVar1 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_counters', $__compilerVar2, array(
'thread' => $thread
));
unset($__compilerVar2);
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<div class="counters">
		' . $__compilerVar1 . '
	</div>
';
}
unset($__compilerVar1);
$__output .= '

';
$__compilerVar3 = '';
$__compilerVar3 .= '
			';
$__compilerVar4 = '';
$__compilerVar4 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullUser'))
{
$__compilerVar4 .= '
				<span class="user">' . 'by' . ' ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',(true),array())) . '</span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar4 .= '<span class="divider">,</span>';
}
$__compilerVar4 .= '
			';
}
$__compilerVar4 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum'))
{
$__compilerVar4 .= '
				<span class="user">' . 'in forum' . ' <a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar4 .= '<span class="divider">,</span>';
}
$__compilerVar4 .= '
			';
}
$__compilerVar4 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar4 .= '
				<a href="' . $link . '">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date'
))) . '</a>
			';
}
$__compilerVar4 .= '

			';
$__compilerVar3 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_main', $__compilerVar4, array(
'thread' => $thread
));
unset($__compilerVar4);
$__compilerVar3 .= '
		';
if (trim($__compilerVar3) !== '')
{
$__output .= '
	<div class="main">
		' . $__compilerVar3 . '
	</div>
';
}
unset($__compilerVar3);
