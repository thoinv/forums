<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent">
	<div class="subHeading">' . 'Contributing Editors' . '</div>
	<div class="secondaryContent wikiPage wikiEditors">
		<table style="width: 100%;">
			';
foreach ($editors AS $user)
{
$__output .= '
				';
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="editor">
	<div class="editorAcitivy">
		<span class="muted">' . 'Last Activity' . ': ' . XenForo_Template_Helper_Core::datetime($user['date'], '') . '</span>
	</div>

	<div class="editorUser">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true'
),'')) . '
		<div class="userInfo">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array())) . '</div>
	</div>

	<div class="editorInfo">
		<span class="muted">' . 'Edits' . ': ' . htmlspecialchars($user['count'], ENT_QUOTES, 'UTF-8') . '</span>
	</div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
			';
}
$__output .= '
		</table>
	</div>
</div>';
