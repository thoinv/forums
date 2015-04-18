<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar1 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar1 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar1 .= '
				</ul>
			';
}
else
{
$__compilerVar1 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<dl>
		<dt>' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar1 . '</dd>
	</dl>
';
}
unset($__compilerVar1);
