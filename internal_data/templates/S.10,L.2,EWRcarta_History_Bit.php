<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<tr ' . (($history['history_revert']) ? ('class="reverted"') : ('')) . '>
';
if ($history['history_current'])
{
$__output .= '
	<td>(<a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . 'Current' . '</a>)</td>
';
}
else
{
$__output .= '
	<td>
		(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/compare', $history, array()) . '">' . 'Compare' . '</a>)
		(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive', $history, array()) . '">' . 'Xem' . '</a>)
	</td>
';
}
$__output .= '
	<td><a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . htmlspecialchars($history['page_name'], ENT_QUOTES, 'UTF-8') . '</a></td>
	<td>' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' lúc ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '</td>
	<td>
		';
if ($history['user_id'])
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('members', $history, array()) . '" class="username">' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '</a>
		';
}
else
{
$__output .= '
			' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '
		';
}
$__output .= '
	</td>
	<td>
		';
if ($perms['admin'] && $history['ip'])
{
$__output .= '
			(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/ipinfo', $history, array()) . '" class="OverlayTrigger item">' . 'IP' . '</a>)
		';
}
$__output .= '
	</td>
	<td>' . '' . $history['size'] . ' bytes' . '</td>
';
if ($history['history_current'])
{
$__output .= '
	<td>(<a href="' . XenForo_Template_Helper_Core::link('wiki', $history, array()) . '">' . 'Current' . '</a>)</td>
';
}
else
{
$__output .= '
	<td>
		';
if ($perms['edit'])
{
$__output .= '(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/revert', $history, array()) . '" class="OverlayTrigger">' . 'Revert' . '</a>)';
}
$__output .= '
		';
if ($perms['delete'])
{
$__output .= '(<a href="' . XenForo_Template_Helper_Core::link('wiki/archive/delete', $history, array()) . '" class="OverlayTrigger">x</a>)';
}
$__output .= '
	</td>
';
}
$__output .= '
</tr>';
