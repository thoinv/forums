<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '
<dl class="pairsJustified">
<dt>' . 'Ratings' . ':</dt> 
	<dd>';
if ($postrating_enabled_ratings['positive'])
{
$__output .= '<span class="dark_postrating_positive">' . htmlspecialchars($postrating_ratings_total['positive'], ENT_QUOTES, 'UTF-8') . '</span>';
if ($postrating_enabled_ratings['neutral'] || $postrating_enabled_ratings['negative'])
{
$__output .= '/';
}
}
if ($postrating_enabled_ratings['neutral'])
{
$__output .= '<span class="dark_postrating_neutral">' . htmlspecialchars($postrating_ratings_total['neutral'], ENT_QUOTES, 'UTF-8') . '</span>';
if ($postrating_enabled_ratings['negative'])
{
$__output .= '/';
}
}
if ($postrating_enabled_ratings['negative'])
{
$__output .= '<span class="dark_postrating_negative">' . htmlspecialchars($postrating_ratings_total['negative'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__output .= '</dd></dl>

';
