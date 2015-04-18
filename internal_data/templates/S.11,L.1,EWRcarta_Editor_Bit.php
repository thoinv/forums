<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="editor">
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
