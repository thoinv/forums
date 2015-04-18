<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'VietXfAdvStats');
$__output .= '

<div class="this-is-a-wrapper-to-activate-our-js-correctly">
	<div class="VietXfAdvStats_Section VietXfAdvStats_Users" data-typeMajor="users" data-type="' . htmlspecialchars($requested['type'], ENT_QUOTES, 'UTF-8') . '" data-requestedAction="' . htmlspecialchars($requested['action'], ENT_QUOTES, 'UTF-8') . '" data-requestedParams="' . htmlspecialchars($requested['params'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($usersPrepared AS $prepared)
{
$__output .= '
			' . $prepared . '
		';
}
$__output .= '
	</div>
</div>';
