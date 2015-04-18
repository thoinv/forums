<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($category['fieldCache'][$fieldGroup])
{
$__output .= '
	';
$__compilerVar1 = '';
$__compilerVar1 .= '
			';
foreach ($category['fieldCache'][$fieldGroup] AS $fieldId)
{
$__compilerVar1 .= '
				';
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('resourceFieldValue', array(
'0' => $resource,
'1' => $fieldId,
'2' => $resource['customFields'][$fieldId]
));
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
					<dl class="customResourceField' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
						<dt>' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
						<dd>' . $__compilerVar2 . '</dd>
					</dl>
				';
}
unset($__compilerVar2);
$__compilerVar1 .= '
			';
}
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
		<div class="customResourceFields ' . htmlspecialchars($extraFieldClass, ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar1 . '
		</div>
	';
}
unset($__compilerVar1);
$__output .= '
';
}
