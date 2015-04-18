<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($title, ENT_QUOTES, 'UTF-8', (false)) . ' - ' . 'So sánh phiên bản';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'So sánh phiên bản';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'edit_history');
$__output .= '

<div class="section">
	<ul class="diffList messageText overlayScroll primaryContent">
	';
foreach ($diffs AS $diff)
{
$__output .= '
		';
$diffHtml = XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => '<br />',
'1' => $diff['1']
));
$__output .= '
		<li class="diff_' . htmlspecialchars($diff['0'], ENT_QUOTES, 'UTF-8') . '">' . ((trim($diffHtml) !== ('')) ? ($diffHtml) : ('&nbsp;')) . '</li>
	';
}
$__output .= '
	</ul>
</div>';
