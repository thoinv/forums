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
$__compilerVar9 = '';
$__compilerVar10 = '';
$__compilerVar10 .= '
			';
$__compilerVar11 = '';
$__compilerVar11 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullViewCount'))
{
$__compilerVar11 .= '
				<span class="viewCount">' . 'Đọc' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar11 .= '<span class="divider">/</span>';
}
$__compilerVar11 .= '
			';
}
$__compilerVar11 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes'))
{
$__compilerVar11 .= '
				<span class="firstPostLikes">' . 'Thích' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar11 .= '<span class="divider">/</span>';
}
$__compilerVar11 .= '
			';
}
$__compilerVar11 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar11 .= '
				<span class="replyCount">' . 'Trả lời' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '</span>
			';
}
$__compilerVar11 .= '

			';
$__compilerVar10 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_counters', $__compilerVar11, array(
'thread' => $thread
));
unset($__compilerVar11);
$__compilerVar10 .= '
		';
if (trim($__compilerVar10) !== '')
{
$__compilerVar9 .= '
	<div class="counters">
		' . $__compilerVar10 . '
	</div>
';
}
unset($__compilerVar10);
$__compilerVar9 .= '

';
$__compilerVar12 = '';
$__compilerVar12 .= '
			';
$__compilerVar13 = '';
$__compilerVar13 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullUser'))
{
$__compilerVar13 .= '
				<span class="user">' . 'by' . ' ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',(true),array())) . '</span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar13 .= '<span class="divider">,</span>';
}
$__compilerVar13 .= '
			';
}
$__compilerVar13 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum'))
{
$__compilerVar13 .= '
				<span class="user">' . 'trong diễn đàn' . ' <a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar13 .= '<span class="divider">,</span>';
}
$__compilerVar13 .= '
			';
}
$__compilerVar13 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar13 .= '
				<a href="' . $link . '">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date'
))) . '</a>
			';
}
$__compilerVar13 .= '

			';
$__compilerVar12 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_main', $__compilerVar13, array(
'thread' => $thread
));
unset($__compilerVar13);
$__compilerVar12 .= '
		';
if (trim($__compilerVar12) !== '')
{
$__compilerVar9 .= '
	<div class="main">
		' . $__compilerVar12 . '
	</div>
';
}
unset($__compilerVar12);
$info .= $__compilerVar9;
unset($__compilerVar9);
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
$__compilerVar14 = '';
$__compilerVar14 .= $info;
if (trim($__compilerVar14) !== '')
{
$__output .= '<div class="info">' . $__compilerVar14 . '</div>';
}
unset($__compilerVar14);
$__output .= '
	';
}
$__output .= '

	<div class="messageInfo">
		';
if ($thread['isNew'])
{
$__output .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__output .= '

		';
$__compilerVar15 = '';
$__compilerVar15 .= '
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
$__output .= $this->callTemplateHook('message_content', $__compilerVar15, array(
'message' => $thread,
'WidgetFramework_WidgetRenderer_Threads_FullThreadList' => '1'
));
unset($__compilerVar15);
$__output .= '

	</div>

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullInfoBottom'))
{
$__output .= '
		';
$__compilerVar16 = '';
$__compilerVar16 .= $info;
if (trim($__compilerVar16) !== '')
{
$__output .= '<div class="info">' . $__compilerVar16 . '</div>';
}
unset($__compilerVar16);
$__output .= '
	';
}
$__output .= '

</div>';
