<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromForum', array(
'0' => $forum,
'1' => '1'
));
if (trim($__compilerVar2) !== '')
{
$__output .= '
	<div class="sectionMain">
		' . 'Tags' . ':
		' . $__compilerVar2 . '
	</div>
';
}
unset($__compilerVar2);
