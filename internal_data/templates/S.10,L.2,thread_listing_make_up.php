<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$threadListPrefixClass = '';
$threadListPrefixClass .= '
	';
if ($thread['sticky'])
{
$threadListPrefixClass .= '
		' . 'Dán lên cao' . '
	';
}
else if (!$thread['discussion_open'])
{
$threadListPrefixClass .= '
		' . 'Closed' . '
	';
}
else if ($thread['discussion_type'] == ('poll'))
{
$threadListPrefixClass .= '
		' . 'Poll' . '
	';
}
else if ($thread['isModerated'])
{
$threadListPrefixClass .= '
		' . 'Cần kiểm duyệt' . '
	';
}
else if ($thread['isRedirect'])
{
$threadListPrefixClass .= '
		' . 'Moved' . '
	';
}
else
{
$threadListPrefixClass .= '

	';
}
$threadListPrefixClass .= '
';
$__output .= '

';
$threadListPrefix = '';
$threadListPrefix .= '
	';
if ($thread['sticky'] && $xenOptions['ThreadMakeUp_sticky_prefix'])
{
$threadListPrefix .= '
		' . 'Dán lên cao' . '
	';
}
$threadListPrefix .= '
	';
if (!$thread['discussion_open'] && $xenOptions['ThreadMakeUp_closed_prefix'])
{
$threadListPrefix .= '
		' . 'Closed' . '
	';
}
$threadListPrefix .= '
	';
if ($thread['discussion_type'] == ('poll') && $xenOptions['ThreadMakeUp_poll_prefix'])
{
$threadListPrefix .= '
		' . 'Poll' . '
	';
}
$threadListPrefix .= '
	';
if ($thread['isModerated'] && $xenOptions['ThreadMakeUp_moderated_prefix'])
{
$threadListPrefix .= '
		' . 'Cần kiểm duyệt' . '
	';
}
$threadListPrefix .= '
	';
if ($thread['isRedirect'] && $xenOptions['ThreadMakeUp_moved_prefix'])
{
$threadListPrefix .= '
		' . 'Moved' . '
	';
}
$threadListPrefix .= '
';
$__output .= '

';
$this->addRequiredExternal('css', 'thread_listing_make_up');
$__output .= '

<span class="threadListMakeUp ' . $threadListPrefixClass . '">
	' . $threadListPrefix;
