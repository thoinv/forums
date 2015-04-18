<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '

<dd class=\'dark_postrating_bar_dd\'><div class=\'dark_postrating_bar\' style=\'width:' . htmlspecialchars($dark_postrating_bar_width, ENT_QUOTES, 'UTF-8') . '\'>';
if ($postrating_enabled_ratings['positive'])
{
$__output .= '<div class="dark_postrating_bar_positive Tooltip" title="' . 'Positive ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '" style="width:' . ($postrating_ratings_total['positive'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
if ($postrating_enabled_ratings['neutral'])
{
$__output .= '<div class="dark_postrating_bar_neutral Tooltip" title="' . 'Neutral ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '" style="width:' . ($postrating_ratings_total['neutral'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
if ($postrating_enabled_ratings['negative'])
{
$__output .= '<div class="dark_postrating_bar_negative Tooltip" title="' . 'Negative ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '" style="width:' . ($postrating_ratings_total['negative'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
$__output .= '</div></dd>
';
