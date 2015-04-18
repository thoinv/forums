<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($bbCodeEval, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $bbCodeEval
)) . '</dd>
</dl>';
