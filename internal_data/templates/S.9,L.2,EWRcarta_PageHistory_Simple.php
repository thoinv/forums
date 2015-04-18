<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent">
	<table style="width: 100%;">
		';
$i = 0;
$count = count($fullList);
foreach ($fullList AS $history)
{
$i++;
$__output .= '
			';
$__compilerVar2 = '';
$__compilerVar2 .= '<tr ' . (($history['history_revert']) ? ('class="reverted"') : ('')) . '>
';
if ($history['history_current'])
{
$__compilerVar2 .= '
	<td>(<a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . 'Current' . '</a>)</td>
';
}
else
{
$__compilerVar2 .= '
	<td>
		(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/compare', $history, array()) . '">' . 'Compare' . '</a>)
		(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive', $history, array()) . '">' . 'Xem' . '</a>)
	</td>
';
}
$__compilerVar2 .= '
	<td><a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . htmlspecialchars($history['page_name'], ENT_QUOTES, 'UTF-8') . '</a></td>
	<td>' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' lúc ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '</td>
	<td>
		';
if ($history['user_id'])
{
$__compilerVar2 .= '
			<a href="' . XenForo_Template_Helper_Core::link('members', $history, array()) . '" class="username">' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '</a>
		';
}
else
{
$__compilerVar2 .= '
			' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '
		';
}
$__compilerVar2 .= '
	</td>
	<td>
		';
if ($perms['admin'] && $history['ip'])
{
$__compilerVar2 .= '
			(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/ipinfo', $history, array()) . '" class="OverlayTrigger item">' . 'IP' . '</a>)
		';
}
$__compilerVar2 .= '
	</td>
	<td>' . '' . $history['size'] . ' bytes' . '</td>
';
if ($history['history_current'])
{
$__compilerVar2 .= '
	<td>(<a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . 'Current' . '</a>)</td>
';
}
else
{
$__compilerVar2 .= '
	<td>
		';
if ($perms['edit'])
{
$__compilerVar2 .= '(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/revert', $history, array()) . '" class="OverlayTrigger">' . 'Revert' . '</a>)';
}
$__compilerVar2 .= '
		';
if ($perms['delete'])
{
$__compilerVar2 .= '(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/delete', $history, array()) . '" class="OverlayTrigger">x</a>)';
}
$__compilerVar2 .= '
	</td>
';
}
$__compilerVar2 .= '
</tr>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
		';
}
$__output .= '
	</table>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'wiki/history', $page, array(), false, array())) . '
</div>';
