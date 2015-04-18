<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('chat/online', false, array()) . '" title="' . 'Members on chat now' . '" class="OverlayTrigger">' . 'Members on chat now' . '</a></h3>
		
		';
if ($AjaxChatOnline['onlineUsers'])
{
$__output .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($AjaxChatOnline['onlineUsers'] AS $user)
{
$i++;
$__output .= '
					';
if ($i <= $AjaxChatOnline['limit'])
{
$__output .= '
						<li>
						';
if ($user['user_id'])
{
$__output .= '
							';
if ($user['visible'] || $visitor['is_moderator'] || $visitor['user_id'] == $user['user_id'])
{
$__output .= '
								<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
									class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $AjaxChatOnline['limit'])
{
$__output .= ',';
}
$__output .= '
							';
}
$__output .= '
						';
}
else
{
$__output .= '
							' . 'Khách';
if ($i < $AjaxChatOnline['limit'])
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
if ($AjaxChatOnline['recordsUnseen'])
{
$__output .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('chat/online', false, array()) . '" title="' . 'See all visitors' . '" class="OverlayTrigger">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($AjaxChatOnline['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__output .= '
			</ol>
		';
}
$__output .= '
		
		<div class="footnote">
			';
if ($AjaxChatOnline['guests'])
{
$__output .= '
			' . 'online_now_x_members_y_guests_z' . '
			';
}
else
{
$__output .= '
			' . 'Online now: ' . XenForo_Template_Helper_Core::numberFormat($AjaxChatOnline['total'], '0') . ' member(s).' . '
			';
}
$__output .= '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->';
