<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar5 = '';
$__compilerVar5 .= '
			';
$__compilerVar6 = '';
$__compilerVar6 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullViewCount'))
{
$__compilerVar6 .= '
				<span class="viewCount">' . 'Đọc' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar6 .= '<span class="divider">/</span>';
}
$__compilerVar6 .= '
			';
}
$__compilerVar6 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes'))
{
$__compilerVar6 .= '
				<span class="firstPostLikes">' . 'Thích' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar6 .= '<span class="divider">/</span>';
}
$__compilerVar6 .= '
			';
}
$__compilerVar6 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar6 .= '
				<span class="replyCount">' . 'Trả lời' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '</span>
			';
}
$__compilerVar6 .= '

			';
$__compilerVar5 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_counters', $__compilerVar6, array(
'thread' => $thread
));
unset($__compilerVar6);
$__compilerVar5 .= '
		';
if (trim($__compilerVar5) !== '')
{
$__output .= '
	<div class="counters">
		' . $__compilerVar5 . '
	</div>
';
}
unset($__compilerVar5);
$__output .= '

';
$__compilerVar7 = '';
$__compilerVar7 .= '
			';
$__compilerVar8 = '';
$__compilerVar8 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullUser'))
{
$__compilerVar8 .= '
				<span class="user">' . 'by' . ' ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',(true),array())) . '</span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar8 .= '<span class="divider">,</span>';
}
$__compilerVar8 .= '
			';
}
$__compilerVar8 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum'))
{
$__compilerVar8 .= '
				<span class="user">' . 'trong diễn đàn' . ' <a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar8 .= '<span class="divider">,</span>';
}
$__compilerVar8 .= '
			';
}
$__compilerVar8 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar8 .= '
				<a href="' . $link . '">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date'
))) . '</a>
			';
}
$__compilerVar8 .= '

			';
$__compilerVar7 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_main', $__compilerVar8, array(
'thread' => $thread
));
unset($__compilerVar8);
$__compilerVar7 .= '
		';
if (trim($__compilerVar7) !== '')
{
$__output .= '
	<div class="main">
		' . $__compilerVar7 . '
	</div>
';
}
unset($__compilerVar7);
