<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Extra Info';
$__output .= '

<blockquote class="ugc baseHtml messageText section">
	';
$__compilerVar1 = 'extra_tab';
$__compilerVar2 = '';
if ($category['fieldCache'][$__compilerVar1])
{
$__compilerVar2 .= '
	';
$__compilerVar3 = '';
$__compilerVar3 .= '
			';
foreach ($category['fieldCache'][$__compilerVar1] AS $fieldId)
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
$__compilerVar2 .= '
		<div class="customResourceFields ' . htmlspecialchars($extraFieldClass, ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar3 . '
		</div>
	';
}
unset($__compilerVar3);
$__compilerVar2 .= '
';
}
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
</blockquote>';
