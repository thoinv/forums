<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'node_list');
$__output .= '

';
$__compilerVar2 = '';
$__compilerVar2 .= '
		';
foreach ($renderedNodes AS $node)
{
$__compilerVar2 .= $node;
}
$__compilerVar2 .= '
	';
if (trim($__compilerVar2) !== '')
{
$__output .= '
	<ol class="nodeList" id="forums">
	' . $__compilerVar2 . '
	</ol>
';
}
unset($__compilerVar2);
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
