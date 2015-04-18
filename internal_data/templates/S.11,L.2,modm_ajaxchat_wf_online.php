<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($AjaxChat['onlineUsers'])
{
$__output .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($AjaxChat['onlineUsers'] AS $user)
{
$i++;
$__output .= '
					';
if ($i <= $AjaxChat['limit'])
{
$__output .= '
						<li>
						';
if ($user['user_id'])
{
$__output .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $AjaxChat['limit'])
{
$__output .= ',';
}
$__output .= '
						';
}
else
{
$__output .= '
							' . 'Khách';
if ($i < $AjaxChat['limit'])
{
$__output .= ',';
}
$__output .= '
						';
}
$__output .= '
						</li>
					';
}
$__output .= '
				';
}
$__output .= '
				';
if ($AjaxChat['recordsUnseen'])
{
$__output .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('chat/online', false, array()) . '" title="' . 'See all visitors' . '" class="OverlayTrigger">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($AjaxChat['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__output .= '
			</ol>
		';
}
$__output .= '
		
		<div class="footnote">
			';
if ($AjaxChat['guests'])
{
$__output .= '
			' . 'online_now_x_members_y_guests_z' . '
			';
}
else
{
$__output .= '
			' . 'Online now: ' . XenForo_Template_Helper_Core::numberFormat($AjaxChat['total'], '0') . ' member(s).' . '
			';
}
$__output .= '
		</div>';
