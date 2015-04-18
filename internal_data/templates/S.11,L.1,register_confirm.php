<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="systemMessage">

	';
if ($user['user_state'] == ('moderated'))
{
$__output .= '
		' . 'Your email has been confirmed. Your registration must now be approved by an administrator. You will receive an email when a decision has been taken.' . '
	';
}
else if ($oldUserState == ('email_confirm_edit'))
{
$__output .= '
		' . 'Your email has been confirmed and your account is now fully active again.' . '
	';
}
else
{
$__output .= '
		' . 'Your email has been confirmed and your registration is now complete.' . '
	';
}
$__output .= '
	
	
	<div class="baseHtml">
		<ul>
			';
if ($redirect)
{
$__output .= '<li><a href="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '">' . 'Return to the page you were viewing' . '</a></li>';
}
$__output .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('index', false, array()) . '">' . 'Return to the forum home page' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('account', false, array()) . '">' . 'Edit your account details' . '</a></li>
		</ul>
	</div>

</div>';
