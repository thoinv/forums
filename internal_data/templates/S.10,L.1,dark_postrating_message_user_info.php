<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRatingsReceived'))
{
$__output .= '
<dl class="pairsJustified">
';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar1 .= '

<dt>' . 'Ratings' . ':</dt> 

<dd>';
if ($postrating_enabled_ratings['positive'])
{
$__compilerVar1 .= '<span class="dark_postrating_positive">+' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '</span>
	';
if ($postrating_enabled_ratings['neutral'] || $postrating_enabled_ratings['negative'])
{
$__compilerVar1 .= ' / ';
}
$__compilerVar1 .= '
';
}
$__compilerVar1 .= '
	';
if ($postrating_enabled_ratings['neutral'])
{
$__compilerVar1 .= '<span class="dark_postrating_neutral">' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '</span>
	';
if ($postrating_enabled_ratings['negative'])
{
$__compilerVar1 .= ' / ';
}
$__compilerVar1 .= '
';
}
$__compilerVar1 .= '
';
if ($postrating_enabled_ratings['negative'])
{
$__compilerVar1 .= '<span class="dark_postrating_negative">-' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '</span>';
}
$__compilerVar1 .= '
</dd>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
</dl>
';
}
if (XenForo_Template_Helper_Core::styleProperty('messageShowRatingsReceivedBar'))
{
$__output .= '
<dl class="pairsJustified">
';
$dark_postrating_bar_width = '';
$dark_postrating_bar_width .= (XenForo_Template_Helper_Core::styleProperty('messageUserInfo.width') - 20) . 'px';
$__output .= '
';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar2 .= '

<dd class=\'dark_postrating_bar_dd\'><div class=\'dark_postrating_bar\' style=\'width:' . htmlspecialchars($dark_postrating_bar_width, ENT_QUOTES, 'UTF-8') . '\'>';
if ($postrating_enabled_ratings['positive'])
{
$__compilerVar2 .= '<div class="dark_postrating_bar_positive Tooltip" title="' . 'Positive ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '" style="width:' . ($postrating_ratings_total['positive'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
if ($postrating_enabled_ratings['neutral'])
{
$__compilerVar2 .= '<div class="dark_postrating_bar_neutral Tooltip" title="' . 'Neutral ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '" style="width:' . ($postrating_ratings_total['neutral'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
if ($postrating_enabled_ratings['negative'])
{
$__compilerVar2 .= '<div class="dark_postrating_bar_negative Tooltip" title="' . 'Negative ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '" style="width:' . ($postrating_ratings_total['negative'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
$__compilerVar2 .= '</div></dd>
';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
</dl>
';
}
