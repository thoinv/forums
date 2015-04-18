<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="systemMessage">

	';
if ($user['user_state'] == ('email_confirm'))
{
$__output .= '
		' . 'Thanks for registering. In order to complete your registration, you must follow the link in the email that has been sent to you.' . '
	';
}
else if ($user['user_state'] == ('moderated'))
{
$__output .= '
		' . 'Thanks for registering. Your registration must now be approved by an administrator. You will receive an email when a decision has been taken.' . '
	';
}
else if ($facebook)
{
$__output .= '
		' . 'Thanks for creating an account using Facebook. Your account is now fully active.' . '
	';
}
else
{
$__output .= '
		' . 'Thanks for registering. Your registration is now complete.' . '
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
