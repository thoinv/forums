<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Extra Info';
$__output .= '

<blockquote class="ugc baseHtml messageText section">
	';
$__compilerVar5 = 'extra_tab';
$__compilerVar6 = '';
if ($category['fieldCache'][$__compilerVar5])
{
$__compilerVar6 .= '
	';
$__compilerVar7 = '';
$__compilerVar7 .= '
			';
foreach ($category['fieldCache'][$__compilerVar5] AS $fieldId)
{
$__compilerVar7 .= '
				';
$__compilerVar8 = '';
$__compilerVar8 .= XenForo_Template_Helper_Core::callHelper('resourceFieldValue', array(
'0' => $resource,
'1' => $fieldId,
'2' => $resource['customFields'][$fieldId]
));
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
					<dl class="customResourceField' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
						<dt>' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
						<dd>' . $__compilerVar8 . '</dd>
					</dl>
				';
}
unset($__compilerVar8);
$__compilerVar7 .= '
			';
}
$__compilerVar7 .= '
		';
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '
		<div class="customResourceFields ' . htmlspecialchars($extraFieldClass, ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar7 . '
		</div>
	';
}
unset($__compilerVar7);
$__compilerVar6 .= '
';
}
$__output .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__output .= '
</blockquote>';
