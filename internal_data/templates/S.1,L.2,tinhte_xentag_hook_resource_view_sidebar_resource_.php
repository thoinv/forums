<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'displayPositionResource'
)) == ('sidebar_info'))
{
$__output .= '
	';
$__compilerVar2 = '';
$__compilerVar2 .= '
					' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromResource', array(
'0' => $resource,
'1' => '1'
)) . '
				';
if (trim($__compilerVar2) !== '')
{
$__output .= '
		<dl class="resourceCategory">
			<dt>' . 'Tags' . ':</dt>
			<dd>
				' . $__compilerVar2 . '
			</dd>
		</dl>
		<!-- [Tinhte] XenTag / Mark --><dl class="resourceCategory"><!-- [Tinhte] XenTag / Mark -->
	';
}
unset($__compilerVar2);
$__output .= '
';
}
