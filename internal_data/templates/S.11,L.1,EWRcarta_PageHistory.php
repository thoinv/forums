<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'History';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'History';
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<div class="sectionMain">

	<div class="primaryContent wikiPage wikiHistory">
	<table style="width: 100%;">
		';
$i = 0;
$count = count($fullList);
foreach ($fullList AS $history)
{
$i++;
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<tr ' . (($history['history_revert']) ? ('class="reverted"') : ('')) . '>
';
if ($history['history_current'])
{
$__compilerVar1 .= '
	<td>(<a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . 'Current' . '</a>)</td>
';
}
else
{
$__compilerVar1 .= '
	<td>
		(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/compare', $history, array()) . '">' . 'Compare' . '</a>)
		(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive', $history, array()) . '">' . 'View' . '</a>)
	</td>
';
}
$__compilerVar1 .= '
	<td><a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . htmlspecialchars($history['page_name'], ENT_QUOTES, 'UTF-8') . '</a></td>
	<td>' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '</td>
	<td>
		';
if ($history['user_id'])
{
$__compilerVar1 .= '
			<a href="' . XenForo_Template_Helper_Core::link('members', $history, array()) . '" class="username">' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '</a>
		';
}
else
{
$__compilerVar1 .= '
			' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '
		';
}
$__compilerVar1 .= '
	</td>
	<td>
		';
if ($perms['admin'] && $history['ip'])
{
$__compilerVar1 .= '
			(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/ipinfo', $history, array()) . '" class="OverlayTrigger item">' . 'IP' . '</a>)
		';
}
$__compilerVar1 .= '
	</td>
	<td>' . '' . $history['size'] . ' bytes' . '</td>
';
if ($history['history_current'])
{
$__compilerVar1 .= '
	<td>(<a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . 'Current' . '</a>)</td>
';
}
else
{
$__compilerVar1 .= '
	<td>
		';
if ($perms['edit'])
{
$__compilerVar1 .= '(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/revert', $history, array()) . '" class="OverlayTrigger">' . 'Revert' . '</a>)';
}
$__compilerVar1 .= '
		';
if ($perms['delete'])
{
$__compilerVar1 .= '(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/delete', $history, array()) . '" class="OverlayTrigger">x</a>)';
}
$__compilerVar1 .= '
	</td>
';
}
$__compilerVar1 .= '
</tr>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= '
	</table>
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'wiki/history', $page, array(), false, array())) . '
</div>

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
