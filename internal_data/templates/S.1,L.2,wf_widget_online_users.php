<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="userList WidgetFramework_WidgetRenderer_OnlineUsers">
	';
if ($onlineUsers['records'])
{
$__output .= '
		';
if ($widget['options']['hide_following'] == 0 AND $visitor['user_id'])
{
$__output .= '
			';
$__compilerVar2 = '';
$__compilerVar2 .= '
					';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar2 .= '
						';
if ($user['followed'])
{
$__compilerVar2 .= '
							<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip user-' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
						';
}
$__compilerVar2 .= '
					';
}
$__compilerVar2 .= '
				';
if (trim($__compilerVar2) !== '')
{
$__output .= '
			<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi' . ':</a></h4>
			<ul class="followedOnline">
				' . $__compilerVar2 . '
			</ul>
			<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên' . ':</a></h4>
			';
}
unset($__compilerVar2);
$__output .= '
		';
}
$__output .= '
		
		<ol class="listInline">
			';
$i = 0;
foreach ($onlineUsers['records'] AS $user)
{
$i++;
$__output .= '
				';
if ($i <= $onlineUsers['limit'])
{
$__output .= '
					<li class="user-' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">
					';
if ($user['user_id'])
{
$__output .= '
						' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',($widget['options']['rich']),array(
'class' => ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : (''))
)));
if ($i < $onlineUsers['limit'])
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
if ($i < $onlineUsers['limit'])
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
if ($onlineUsers['recordsUnseen'])
{
$__output .= '
				<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
			';
}
$__output .= '
		</ol>
	';
}
$__output .= '
	
	<div class="footnote">
		';
if (isset($onlineUsers['robots']))
{
$__output .= '
			' . 'Tổng: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['total'], '0') . ' (Thành viên: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['members'], '0') . ', Khách: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['guests'], '0') . ', Robots: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['robots'], '0') . ')' . '
		';
}
else
{
$__output .= '
			' . 'online_now_x_members_y_guests_z' . '
		';
}
$__output .= '
	</div>
</div>';
