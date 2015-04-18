<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Editors';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Editors';
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<div class="sectionMain">
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
</div>

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
