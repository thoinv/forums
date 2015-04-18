<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult thread primaryContent' . (($thread['isIgnored']) ? (' ignored') : ('')) . '" data-author="' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '</div>

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . 'Thread' . '</span>
			<h3 class="title' . (($thread['isNew']) ? (' new') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $thread['title'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $post['message'],
'1' => '150',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight',
'stripQuotes' => '1'
)
)) . '</a>
		</blockquote>

		<div class="meta">
			';
if ($enableInlineMod AND $thread['canInlineMod'])
{
$__output .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '
			' . 'Thread by' . ': ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',false,array())) . ',
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date'
))) . ',
			' . '' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . ' replies' . ',
			' . 'in forum' . ': <a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</div>
	</div>

</li>';
