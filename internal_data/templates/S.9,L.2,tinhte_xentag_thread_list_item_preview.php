<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread
));
if (trim($__compilerVar2) !== '')
{
$__output .= '
	<div class="text muted">
		' . 'Tags' . ':
		' . $__compilerVar2 . '
	</div>
	<!-- [Tinhte] XenTag / Mark --></div><!-- [Tinhte] XenTag / Mark -->
	<!-- [Tinhte] XenTag / Revert Mark -->
';
}
unset($__compilerVar2);
