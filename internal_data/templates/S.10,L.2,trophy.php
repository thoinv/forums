<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'trophy');
$__output .= '

<div class="trophy" id="trophy-' . htmlspecialchars($trophy['trophy_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="points">' . htmlspecialchars($trophy['trophy_points'], ENT_QUOTES, 'UTF-8') . '</div>
	';
if ($trophy['award_date'])
{
$__output .= '
		<div class="awarded">' . 'Thưởng vào' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($trophy['award_date'],array(
'time' => '$trophy.award_date'
))) . '</div>
	';
}
$__output .= '
	<div class="info">
		<h3 class="title">' . htmlspecialchars($trophy['title'], ENT_QUOTES, 'UTF-8') . '</h3>
		<p class="description">' . $trophy['description'] . '</p>
	</div>
</div>';
