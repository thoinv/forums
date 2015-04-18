<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Trophies';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('help', false, array()), 'value' => 'Help');
$__output .= '

';
if ($trophies)
{
$__output .= '
	<ol class="section">
	';
foreach ($trophies AS $trophy)
{
$__output .= '
		<li class="primaryContent">
			';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'trophy');
$__compilerVar1 .= '

<div class="trophy" id="trophy-' . htmlspecialchars($trophy['trophy_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="points">' . htmlspecialchars($trophy['trophy_points'], ENT_QUOTES, 'UTF-8') . '</div>
	';
if ($trophy['award_date'])
{
$__compilerVar1 .= '
		<div class="awarded">' . 'Awarded' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($trophy['award_date'],array(
'time' => '$trophy.award_date'
))) . '</div>
	';
}
$__compilerVar1 .= '
	<div class="info">
		<h3 class="title">' . htmlspecialchars($trophy['title'], ENT_QUOTES, 'UTF-8') . '</h3>
		<p class="description">' . $trophy['description'] . '</p>
	</div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		</li>
	';
}
$__output .= '
	</ol>
';
}
else
{
$__output .= '
	<div class="section">' . 'No trophies have been created yet.' . '</div>
';
}
