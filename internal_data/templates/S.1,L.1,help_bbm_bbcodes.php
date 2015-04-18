<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($bbmBbCodes)
{
$__output .= '
	';
foreach ($bbmBbCodes AS $bbmBbCode)
{
$__output .= '
		<li class="primaryContent">
			<div class="bbCode">
				<h3 class="title">[' . htmlspecialchars($bbmBbCode['tag'], ENT_QUOTES, 'UTF-8') . '] - ' . htmlspecialchars($bbmBbCode['title'], ENT_QUOTES, 'UTF-8') . '</h3>
				<p class="description">' . htmlspecialchars($bbmBbCode['description'], ENT_QUOTES, 'UTF-8') . '</p>

				';
$__compilerVar1 = '';
$__compilerVar1 .= $bbmBbCode['example'];
$__compilerVar2 = '';
$__compilerVar2 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar1
)) . '</dd>
</dl>';
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
			</div>
		</li>
	';
}
$__output .= '
';
}
