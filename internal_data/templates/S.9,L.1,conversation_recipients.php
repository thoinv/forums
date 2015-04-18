<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul id="ConversationRecipients">
	';
foreach ($recipients AS $recipient)
{
$__output .= '
		<li>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($recipient,(true),array(
'user' => '$recipient',
'size' => 's',
'img' => 'true'
),'')) . '
			';
if ($recipient['user_id'])
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($recipient,'',(true),array())) . '
			';
}
else
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('userNameHtml', array(
'0' => $recipient,
'1' => 'Unknown Member',
'2' => '1'
)) . '
			';
}
$__output .= '
			';
if ($recipient['user_id'])
{
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $recipient
));
if (trim($__compilerVar1) !== '')
{
$__output .= '<div class="userTitle">' . $__compilerVar1 . '</div>';
}
unset($__compilerVar1);
}
$__output .= '
		</li>
	';
}
$__output .= '
</ul>';
