<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($controllerName, ENT_QUOTES, 'UTF-8') . '::action' . htmlspecialchars($controllerAction, ENT_QUOTES, 'UTF-8') . '() | ' . htmlspecialchars($viewName, ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($controllerName, ENT_QUOTES, 'UTF-8') . '::action' . htmlspecialchars($controllerAction, ENT_QUOTES, 'UTF-8') . '()';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'This is the <b>DEFAULT</b> content template, rendered by <b>' . htmlspecialchars($viewName, ENT_QUOTES, 'UTF-8') . '</b>.';
$__output .= '
';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '<meta name="robots" content="noindex" />';
$__output .= '

<table class="dataTable">
	<caption>' . 'Available Template Parameters' . '</caption>
	<tr class="dataRow">
		<th>' . 'Variable Name' . '</th>
		<th>' . 'Data Type' . '</th>
	</tr>
	';
foreach ($__params AS $key => $value)
{
$__output .= '
		<tr class="dataRow">
			<td>$' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '</td>
			<td>' . XenForo_Template_Helper_Core::callHelper('type', array(
'0' => $value
)) . '</td>
		</tr>
	';
}
$__output .= '
</table>';
