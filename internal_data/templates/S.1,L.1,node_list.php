<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'node_list');
$__output .= '

';
$__compilerVar1 = '';
$__compilerVar1 .= '
		';
foreach ($renderedNodes AS $node)
{
$__compilerVar1 .= $node;
}
$__compilerVar1 .= '
	';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<ol class="nodeList sectionMain" id="forums">
	' . $__compilerVar1 . '
	</ol>
';
}
unset($__compilerVar1);
$__output .= '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
';
