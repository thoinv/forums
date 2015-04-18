<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($category['fieldCache'][$fieldGroup])
{
$__output .= '
	';
$__compilerVar3 = '';
$__compilerVar3 .= '
			';
foreach ($category['fieldCache'][$fieldGroup] AS $fieldId)
{
$__compilerVar3 .= '
				';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('resourceFieldValue', array(
'0' => $resource,
'1' => $fieldId,
'2' => $resource['customFields'][$fieldId]
));
if (trim($__compilerVar4) !== '')
{
$__compilerVar3 .= '
					<dl class="customResourceField' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
						<dt>' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
						<dd>' . $__compilerVar4 . '</dd>
					</dl>
				';
}
unset($__compilerVar4);
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
		';
if (trim($__compilerVar3) !== '')
{
$__output .= '
		<div class="customResourceFields ' . htmlspecialchars($extraFieldClass, ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar3 . '
		</div>
	';
}
unset($__compilerVar3);
$__output .= '
';
}
