<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromPage', array(
'0' => $page,
'1' => '1'
));
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<div class="sectionMain">
		' . 'Tags' . ':
		' . $__compilerVar1 . '
	</div>
';
}
unset($__compilerVar1);
