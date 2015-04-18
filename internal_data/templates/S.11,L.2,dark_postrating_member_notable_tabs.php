<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($postrating_enabled_ratings['negative'] || $postrating_enabled_ratings['positive'])
{
$__output .= '
	';
if ($postrating_enabled_ratings['positive'])
{
$__output .= '
		<li class="' . (($type == ('positive_ratings')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'positive_ratings'
)) . '">' . 'Most Positive Ratings' . '</a></li>
	';
}
$__output .= '
	';
if ($postrating_enabled_ratings['negative'])
{
$__output .= '
		<li class="' . (($type == ('negative_ratings')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'negative_ratings'
)) . '">' . 'Most Negative Ratings' . '</a></li>
	';
}
$__output .= '
';
}
else
{
$__output .= '
	<li class="' . (($type == ('likes')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'likes'
)) . '">' . 'Có nhiều lượt yêu thích' . '</a></li>
';
}
