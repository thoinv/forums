<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="wikiPage wikiThread">
	';
$__compilerVar2 = '';
$__compilerVar2 .= '
		';
if ($perms['edit'])
{
$__compilerVar2 .= '<li><a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">';
if ($page['page_protect'])
{
$__compilerVar2 .= 'LOCKED';
}
else
{
$__compilerVar2 .= 'Sửa';
}
$__compilerVar2 .= '</a></li>';
}
$__compilerVar2 .= '
		<li class="active"><a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '">' . 'Discussion' . ' (' . htmlspecialchars($thread['reply_count'], ENT_QUOTES, 'UTF-8') . ')</a></li>
		';
if (trim($__compilerVar2) !== '')
{
$__output .= '
	<ul class="tabs controlTabs">
		' . $__compilerVar2 . '
	</ul>
	';
}
unset($__compilerVar2);
$__output .= '

	<ul class="tabs mainTabs">
		<li><a href="' . XenForo_Template_Helper_Core::link('wiki', $page, array()) . '#wikiContent">' . 'Page' . '</a></li>
		';
if ($page['attachments'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('wiki', $page, array()) . '#attachments">' . 'Attachments' . ' (' . XenForo_Template_Helper_Core::numberFormat(count($page['attachments']), '0') . ')</a></li>';
}
$__output .= '
		';
if ($perms['history'])
{
$__output .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('wiki', $page, array()) . '#history">' . 'Lịch sử' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('wiki', $page, array()) . '#editors">' . 'Editors' . '</a></li>
		';
}
$__output .= '
	</ul>
</div>';
