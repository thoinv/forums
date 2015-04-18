<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar2 = '';
$__compilerVar2 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar2 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar2 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar2 .= '
				</ul>
			';
}
else
{
$__compilerVar2 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar2 .= '
		';
if (trim($__compilerVar2) !== '')
{
$__output .= '
	<dl>
		<dt>' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar2 . '</dd>
	</dl>
';
}
unset($__compilerVar2);
