<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '

';
if ($postrating_total_numeric)
{
$__output .= '
	';
if ($postrating_enabled_ratings['positive'])
{
$__output .= '
	<dl>
		<dt>' . 'Positive ratings received' . ':</dt>
			<dd class=\'dark_postrating_positive\'>' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '</dd>
	</dl>
	';
}
$__output .= '


	';
if ($postrating_enabled_ratings['neutral'])
{
$__output .= '
	<dl>
		<dt>' . 'Neutral ratings received' . ':</dt>
			<dd class=\'dark_postrating_neutral\'>' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '</dd>
	</dl>
	';
}
$__output .= '
			
	';
if ($postrating_enabled_ratings['negative'])
{
$__output .= '
	<dl>
		<dt>' . 'Negative ratings received' . ':</dt>
			<dd class=\'dark_postrating_negative\'>' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '</dd>	
	</dl>
	';
}
$__output .= '
';
}
$__output .= '

';
if ($postrating_total_bar)
{
$__output .= '
	<dl>
	';
$dark_postrating_bar_width = '';
$dark_postrating_bar_width .= (XenForo_Template_Helper_Core::styleProperty('profilePageSidebarWidth') - 30) . 'px';
$__output .= '
	';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar1 .= '

<dd class=\'dark_postrating_bar_dd\'><div class=\'dark_postrating_bar\' style=\'width:' . htmlspecialchars($dark_postrating_bar_width, ENT_QUOTES, 'UTF-8') . '\'>';
if ($postrating_enabled_ratings['positive'])
{
$__compilerVar1 .= '<div class="dark_postrating_bar_positive Tooltip" title="' . 'Positive ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['positive'], '0') . '" style="width:' . ($postrating_ratings_total['positive'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
if ($postrating_enabled_ratings['neutral'])
{
$__compilerVar1 .= '<div class="dark_postrating_bar_neutral Tooltip" title="' . 'Neutral ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['neutral'], '0') . '" style="width:' . ($postrating_ratings_total['neutral'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
if ($postrating_enabled_ratings['negative'])
{
$__compilerVar1 .= '<div class="dark_postrating_bar_negative Tooltip" title="' . 'Negative ratings received' . ': ' . XenForo_Template_Helper_Core::numberFormat($postrating_ratings_total['negative'], '0') . '" style="width:' . ($postrating_ratings_total['negative'] / $postrating_ratings_total['all'] * 100) . '%"></div>';
}
$__compilerVar1 .= '</div></dd>
';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '	
	</dl>
';
}
