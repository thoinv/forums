<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bbm_editor_redactor_autocss');
$__output .= '

';
if ($bbmCustomCss)
{
$__output .= '
	<style type="text/css">
		';
foreach ($bbmCustomCss AS $button)
{
$__output .= '
			.redactor_toolbar li a.redactor_btn_' . htmlspecialchars($button['code'], ENT_QUOTES, 'UTF-8') . ',
			.redactor_toolbar li a.redactor_btn_' . htmlspecialchars($button['code'], ENT_QUOTES, 'UTF-8') . ':hover {
				';
if ($button['isSprite'] AND $button['url'] == 'styles/default/xenforo/editor/icons.png')
{
$__output .= '
					background-position: ' . htmlspecialchars($button['pos']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($button['pos']['y'], ENT_QUOTES, 'UTF-8') . 'px;
				';
}
else if ($button['isSprite'])
{
$__output .= '
					background-image: url("' . htmlspecialchars($button['url'], ENT_QUOTES, 'UTF-8') . '");
					background-position: ' . htmlspecialchars($button['pos']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($button['pos']['y'], ENT_QUOTES, 'UTF-8') . 'px;
				';
}
else
{
$__output .= '
					background: url("' . htmlspecialchars($button['url'], ENT_QUOTES, 'UTF-8') . '") no-repeat 0 0;
				';
}
$__output .= '
			}
		';
}
$__output .= '
	</style>
';
}
