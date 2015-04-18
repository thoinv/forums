<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($notices)
{
$__output .= '

';
$this->addRequiredExternal('css', 'panel_scroller');
$__output .= '
' . '

<div class="' . ((XenForo_Template_Helper_Core::styleProperty('scrollableNotices')) ? ('PanelScroller') : ('PanelScrollerOff')) . '" id="Notices" data-vertical="' . XenForo_Template_Helper_Core::styleProperty('noticeVertical') . '" data-speed="' . XenForo_Template_Helper_Core::styleProperty('noticeSpeed') . '" data-interval="' . XenForo_Template_Helper_Core::styleProperty('noticeInterval') . '">
	<div class="scrollContainer">
		<div class="PanelContainer">
			<ol class="Panels">
				';
foreach ($notices AS $noticeId => $notice)
{
$__output .= '
					';
$__compilerVar3 = '';
$__compilerVar3 .= $notice['message'];
$__compilerVar4 = '';
$__compilerVar4 .= '<li class="panel Notice DismissParent notice_' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '">
	<div class="' . (($notice['wrap']) ? ('baseHtml noticeContent') : ('')) . '">' . $__compilerVar3 . '</div>
	
	';
if ($notice['dismissible'])
{
$__compilerVar4 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account/dismiss-notice', '', array(
'notice_id' => $noticeId
)) . '"
			title="' . 'Dismiss Notice' . '" class="DismissCtrl Tooltip" data-offsetx="7" data-tipclass="flipped">' . 'Dismiss Notice' . '</a>';
}
$__compilerVar4 .= '
</li>';
$__output .= $__compilerVar4;
unset($__compilerVar3, $__compilerVar4);
$__output .= '
				';
}
$__output .= '
			</ol>
		</div>
	</div>
	
	';
if (XenForo_Template_Helper_Core::styleProperty('scrollableNotices') AND XenForo_Template_Helper_Core::numberFormat(count($notices), '0') > 1)
{
$__output .= '<div class="navContainer">
		<span class="navControls Nav JsOnly">
			';
$i = 0;
foreach ($notices AS $noticeId => $notice)
{
$i++;
$__output .= '
				<a id="n' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#n' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '"' . (($i == 1) ? (' class="current"') : ('')) . '>
					<span class="arrow"><span></span></span>
					<!--' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . ' -->' . htmlspecialchars($notice['title'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
$__output .= '
		</span>
	</div>';
}
$__output .= '
</div>

';
}
