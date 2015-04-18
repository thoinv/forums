<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '

<dt>' . 'Ratings' . ':</dt> 

<dd>';
if ($postrating_enabled_ratings['positive'])
{
$__output .= '<span class="dark_postrating_positive">+' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '</span>
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
$__output .= '<span class="dark_postrating_neutral">' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '</span>
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
$__output .= '<span class="dark_postrating_negative">-' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '</span>';
}
$__output .= '
</dd>';
