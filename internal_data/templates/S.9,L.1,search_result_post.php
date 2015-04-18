<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult post primaryContent' . (($post['isIgnored']) ? (' ignored') : ('')) . '" data-author="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,(true),array(
'user' => '$post',
'size' => 's',
'img' => 'true'
),'')) . '</div>

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . 'Post' . '</span>
			<h3 class="title' . (($thread['isNew']) ? (' new') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('posts', $post, array()) . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $thread['title'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="' . XenForo_Template_Helper_Core::link('posts', $post, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $post['message'],
'1' => '150',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight',
'stripQuote' => '1'
)
)) . '</a>
		</blockquote>

		<div class="meta">
			';
if ($enableInlineMod AND $post['canInlineMod'])
{
$__output .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__output .= '
			' . 'Post by' . ': ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',false,array())) . ',
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => htmlspecialchars($post['post_date'], ENT_QUOTES, 'UTF-8')
))) . '
			' . 'in forum' . ': <a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</div>
	</div>
</li>';
