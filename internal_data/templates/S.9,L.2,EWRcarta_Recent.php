<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Hoạt động gần đây';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Hoạt động gần đây';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '

<div class="sectionMain">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'wiki/special/recent', false, array(), false, array())) . '

	<div class="primaryContent wikiPage">
	<table style="width: 100%;">
		';
$i = 0;
$count = count($fullList);
foreach ($fullList AS $history)
{
$i++;
$__output .= '
			';
$__compilerVar3 = '';
$__compilerVar3 .= '<tr ' . (($history['history_revert']) ? ('class="reverted"') : ('')) . '>
';
if ($history['history_current'])
{
$__compilerVar3 .= '
	<td>(<a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . 'Current' . '</a>)</td>
';
}
else
{
$__compilerVar3 .= '
	<td>
		(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/compare', $history, array()) . '">' . 'Compare' . '</a>)
		(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive', $history, array()) . '">' . 'Xem' . '</a>)
	</td>
';
}
$__compilerVar3 .= '
	<td><a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . htmlspecialchars($history['page_name'], ENT_QUOTES, 'UTF-8') . '</a></td>
	<td>' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' lúc ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '</td>
	<td>
		';
if ($history['user_id'])
{
$__compilerVar3 .= '
			<a href="' . XenForo_Template_Helper_Core::link('members', $history, array()) . '" class="username">' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '</a>
		';
}
else
{
$__compilerVar3 .= '
			' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '
		';
}
$__compilerVar3 .= '
	</td>
	<td>
		';
if ($perms['admin'] && $history['ip'])
{
$__compilerVar3 .= '
			(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/ipinfo', $history, array()) . '" class="OverlayTrigger item">' . 'IP' . '</a>)
		';
}
$__compilerVar3 .= '
	</td>
	<td>' . '' . $history['size'] . ' bytes' . '</td>
';
if ($history['history_current'])
{
$__compilerVar3 .= '
	<td>(<a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . 'Current' . '</a>)</td>
';
}
else
{
$__compilerVar3 .= '
	<td>
		';
if ($perms['edit'])
{
$__compilerVar3 .= '(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/revert', $history, array()) . '" class="OverlayTrigger">' . 'Revert' . '</a>)';
}
$__compilerVar3 .= '
		';
if ($perms['delete'])
{
$__compilerVar3 .= '(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/delete', $history, array()) . '" class="OverlayTrigger">x</a>)';
}
$__compilerVar3 .= '
	</td>
';
}
$__compilerVar3 .= '
</tr>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
		';
}
$__output .= '
	</table>
	</div>
</div>

';
$__compilerVar4 = '';
$__compilerVar4 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
