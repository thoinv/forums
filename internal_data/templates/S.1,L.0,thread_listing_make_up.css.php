<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($xenOptions['ThreadMakeUp_sticky_type'] != ('none'))
{
$__output .= '
	';
if ($xenOptions['ThreadMakeUp_sticky_type'] == ('all'))
{
$__output .= '
	.threadListMakeUp.Sticky,
	.threadListMakeUp.Sticky a {' . htmlspecialchars($xenOptions['ThreadMakeUp_sticky_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
else if ($xenOptions['ThreadMakeUp_sticky_type'] == ('prefix'))
{
$__output .= '
	.threadListMakeUp.Sticky {' . htmlspecialchars($xenOptions['ThreadMakeUp_sticky_css'], ENT_QUOTES, 'UTF-8') . '}
	.threadListMakeUp.Sticky a {color: ' . XenForo_Template_Helper_Core::styleProperty('link.color') . ' !important;}
	';
}
else if ($xenOptions['ThreadMakeUp_sticky_type'] == ('title'))
{
$__output .= '
	.threadListMakeUp.Sticky {color: ' . XenForo_Template_Helper_Core::styleProperty('body.color') . ' !important;}
	.threadListMakeUp.Sticky a {' . htmlspecialchars($xenOptions['ThreadMakeUp_sticky_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
$__output .= '
';
}
$__output .= '

';
if ($xenOptions['ThreadMakeUp_closed_type'] != ('none'))
{
$__output .= '
	';
if ($xenOptions['ThreadMakeUp_closed_type'] == ('all'))
{
$__output .= '
	.threadListMakeUp.Closed {' . htmlspecialchars($xenOptions['ThreadMakeUp_closed_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
else if ($xenOptions['ThreadMakeUp_closed_type'] == ('prefix'))
{
$__output .= '
	.threadListMakeUp.Closed {' . htmlspecialchars($xenOptions['ThreadMakeUp_closed_css'], ENT_QUOTES, 'UTF-8') . '}
	.threadListMakeUp.Closed a {color: ' . XenForo_Template_Helper_Core::styleProperty('link.color') . ' !important;}
	';
}
else if ($xenOptions['ThreadMakeUp_closed_type'] == ('title'))
{
$__output .= '
	.threadListMakeUp.Closed {color: ' . XenForo_Template_Helper_Core::styleProperty('body.color') . ' !important;}
	.threadListMakeUp.Closed a {' . htmlspecialchars($xenOptions['ThreadMakeUp_closed_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
$__output .= '
';
}
$__output .= '

';
if ($xenOptions['ThreadMakeUp_poll_type'] != ('none'))
{
$__output .= '
	';
if ($xenOptions['ThreadMakeUp_poll_type'] == ('all'))
{
$__output .= '
	.threadListMakeUp.Poll {' . htmlspecialchars($xenOptions['ThreadMakeUp_poll_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
else if ($xenOptions['ThreadMakeUp_poll_type'] == ('prefix'))
{
$__output .= '
	.threadListMakeUp.Poll {' . htmlspecialchars($xenOptions['ThreadMakeUp_poll_css'], ENT_QUOTES, 'UTF-8') . '}
	.threadListMakeUp.Poll a {color: ' . XenForo_Template_Helper_Core::styleProperty('link.color') . ' !important;}
	';
}
else if ($xenOptions['ThreadMakeUp_poll_type'] == ('title'))
{
$__output .= '
	.threadListMakeUp.Poll {color: ' . XenForo_Template_Helper_Core::styleProperty('body.color') . ' !important;}
	.threadListMakeUp.Poll a {' . htmlspecialchars($xenOptions['ThreadMakeUp_poll_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
$__output .= '
';
}
$__output .= '

';
if ($xenOptions['ThreadMakeUp_moderated_type'] != ('none'))
{
$__output .= '
	';
if ($xenOptions['ThreadMakeUp_moderated_type'] == ('all'))
{
$__output .= '
	.threadListMakeUp.Moderated {' . htmlspecialchars($xenOptions['ThreadMakeUp_moderated_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
else if ($xenOptions['ThreadMakeUp_moderated_type'] == ('prefix'))
{
$__output .= '
	.threadListMakeUp.Moderated {' . htmlspecialchars($xenOptions['ThreadMakeUp_moderated_css'], ENT_QUOTES, 'UTF-8') . '}
	.threadListMakeUp.Moderated a {color: ' . XenForo_Template_Helper_Core::styleProperty('link.color') . ' !important;}
	';
}
else if ($xenOptions['ThreadMakeUp_moderated_type'] == ('title'))
{
$__output .= '
	.threadListMakeUp.Moderated {color: ' . XenForo_Template_Helper_Core::styleProperty('body.color') . ' !important;}
	.threadListMakeUp.Moderated a {' . htmlspecialchars($xenOptions['ThreadMakeUp_moderated_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
$__output .= '
';
}
$__output .= '

';
if ($xenOptions['ThreadMakeUp_moved_type'] != ('none'))
{
$__output .= '
	';
if ($xenOptions['ThreadMakeUp_moved_type'] == ('all'))
{
$__output .= '
	.threadListMakeUp.Moved {' . htmlspecialchars($xenOptions['ThreadMakeUp_moved_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
else if ($xenOptions['ThreadMakeUp_moved_type'] == ('prefix'))
{
$__output .= '
	.threadListMakeUp.Moved {' . htmlspecialchars($xenOptions['ThreadMakeUp_moved_css'], ENT_QUOTES, 'UTF-8') . '}
	.threadListMakeUp.Moved a {color: ' . XenForo_Template_Helper_Core::styleProperty('link.color') . ' !important;}
	';
}
else if ($xenOptions['ThreadMakeUp_moved_type'] == ('title'))
{
$__output .= '
	.threadListMakeUp.Moved {color: ' . XenForo_Template_Helper_Core::styleProperty('body.color') . ' !important;}
	.threadListMakeUp.Moved a {' . htmlspecialchars($xenOptions['ThreadMakeUp_moved_css'], ENT_QUOTES, 'UTF-8') . '}
	';
}
$__output .= '
';
}
$__output .= '
';
