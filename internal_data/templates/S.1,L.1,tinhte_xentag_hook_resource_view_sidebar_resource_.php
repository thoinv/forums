<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'displayPositionResource'
)) == ('sidebar_info'))
{
$__output .= '
	';
$__compilerVar1 = '';
$__compilerVar1 .= '
					' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromResource', array(
'0' => $resource,
'1' => '1'
)) . '
				';
if (trim($__compilerVar1) !== '')
{
$__output .= '
		<dl class="resourceCategory">
			<dt>' . 'Tags' . ':</dt>
			<dd>
				' . $__compilerVar1 . '
			</dd>
		</dl>
		<!-- [Tinhte] XenTag / Mark --><dl class="resourceCategory"><!-- [Tinhte] XenTag / Mark -->
	';
}
unset($__compilerVar1);
$__output .= '
';
}
