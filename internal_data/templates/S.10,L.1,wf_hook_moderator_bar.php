<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($visitor['is_admin'])
{
$__output .= '			
	';
if ($session['_WidgetFramework_reveal'])
{
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link('misc/wf-disable-reveal', false, array()) . '" class="permissionTest adminLink">
			<span class="itemLabel">' . 'Disable Reveal Mode (Widget Framework)' . '</span>
		</a>
	';
}
$__output .= '
';
}
