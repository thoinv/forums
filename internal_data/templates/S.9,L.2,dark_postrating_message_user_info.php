<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRatingsReceived'))
{
$__output .= '
<dl class="pairsJustified">
';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar3 .= '

<dt>' . 'Ratings' . ':</dt> 

<dd>';
if ($postrating_enabled_ratings['positive'])
{
$__compilerVar3 .= '<span class="dark_postrating_positive">+' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '</span>
	';
if ($postrating_enabled_ratings['neutral'] || $postrating_enabled_ratings['negative'])
{
$__compilerVar3 .= ' / ';
}
$__compilerVar3 .= '
';
}
$__compilerVar3 .= '
	';
if ($postrating_enabled_ratings['neutral'])
{
$__compilerVar3 .= '<span class="dark_postrating_neutral">' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '</span>
	';
if ($postrating_enabled_ratings['negative'])
{
$__compilerVar3 .= ' / ';
}
$__compilerVar3 .= '
';
}
$__compilerVar3 .= '
';
if ($postrating_enabled_ratings['negative'])
{
$__compilerVar3 .= '<span class="dark_postrating_negative">-' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '</span>';
}
$__compilerVar3 .= '
</dd>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
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
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar4 .= '

<dd class=\'dark_postrating_bar_dd\'><div class=\'dark_postrating_bar\' style=\'width:' . htmlspecialchars($dark_postrating_bar_width, ENT_QUOTES, 'UTF-8') . '\'>';
if ($postrating_enabled_ratings['positive'])
{
$__compilerVar4 .= '<div class="dark_postrating_bar_positive Tooltip" title="' . 'Positive ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '" style="width:' . ($postrating_ratings_total['positive'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
if ($postrating_enabled_ratings['neutral'])
{
$__compilerVar4 .= '<div class="dark_postrating_bar_neutral Tooltip" title="' . 'Neutral ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '" style="width:' . ($postrating_ratings_total['neutral'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
if ($postrating_enabled_ratings['negative'])
{
$__compilerVar4 .= '<div class="dark_postrating_bar_negative Tooltip" title="' . 'Negative ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '" style="width:' . ($postrating_ratings_total['negative'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
$__compilerVar4 .= '</div></dd>
';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
</dl>
';
}
