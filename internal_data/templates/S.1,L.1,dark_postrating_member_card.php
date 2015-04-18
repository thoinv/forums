<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dt>' . 'Ratings Received' . ':</dt> 
<dd>';
if ($postrating_enabled_ratings['positive'])
{
$__output .= '<span style="color:#C6FF8C">+' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '</span>
	';
if ($postrating_enabled_ratings['neutral'] || $postrating_enabled_ratings['negative'])
{
$__output .= ' / ';
}
$__output .= '
';
}
$__output .= '
';
if ($postrating_enabled_ratings['neutral'])
{
$__output .= XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '
	';
if ($postrating_enabled_ratings['negative'])
{
$__output .= ' / ';
}
$__output .= '
';
}
$__output .= '
';
if ($postrating_enabled_ratings['negative'])
{
$__output .= '<span style="color:#FF9D8C">-' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '</span>';
}
$__output .= '
</dd>';
