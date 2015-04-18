<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Điểm thưởng dành cho ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['noindex'] = '';
$__extraData['head']['noindex'] .= '
	<meta name="robots" content="noindex" />';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="section">
	';
if ($trophies)
{
$__output .= '
		<ol class="overlayScroll">
		';
foreach ($trophies AS $trophy)
{
$__output .= '
			<li class="primaryContent">
				';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'trophy');
$__compilerVar2 .= '

<div class="trophy" id="trophy-' . htmlspecialchars($trophy['trophy_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="points">' . htmlspecialchars($trophy['trophy_points'], ENT_QUOTES, 'UTF-8') . '</div>
	';
if ($trophy['award_date'])
{
$__compilerVar2 .= '
		<div class="awarded">' . 'Thưởng vào' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($trophy['award_date'],array(
'time' => '$trophy.award_date'
))) . '</div>
	';
}
$__compilerVar2 .= '
	<div class="info">
		<h3 class="title">' . htmlspecialchars($trophy['title'], ENT_QUOTES, 'UTF-8') . '</h3>
		<p class="description">' . $trophy['description'] . '</p>
	</div>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
			</li>
		';
}
$__output .= '
		</ol>
		<div class="sectionFooter opposedOptions">
			<span class="left">' . 'Tổng điểm' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['trophy_points'], '0') . '</span>
			<div class="right">
				<input type="button" class="button primary overlayOnly OverlayCloser" value="' . 'Đóng' . '" />
				<a href="' . XenForo_Template_Helper_Core::link('help/trophies', false, array()) . '" class="button">' . 'Xem tất cả thành tích có thể đạt được' . '</a>
			</div>
		</div>
	';
}
else
{
$__output .= '
		<div class="primaryContent">' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has not been awarded any trophies yet.' . '</div>
		<div class="sectionFooter">
			<input type="button" class="button primary overlayOnly OverlayCloser" value="' . 'Đóng' . '" />
			<a href="' . XenForo_Template_Helper_Core::link('help/trophies', false, array()) . '" class="right button">' . 'Xem tất cả thành tích có thể đạt được' . '</a>
		</div>
	';
}
$__output .= '
</div>';
