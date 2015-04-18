<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__output .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar1, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar1);
$__output .= '
' . '
	<div class="section infoBlock">
	
	</div>
<!-- block: sidebar_online_staff -->
';
$__compilerVar2 = '';
$__compilerVar2 .= '
					';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar2 .= '
						';
if ($user['is_staff'])
{
$__compilerVar2 .= '
							<li>
								' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true'
),'')) . '
								' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array())) . '
								<div class="userTitle">' . XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $user
)) . '</div>
							</li>
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
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'Staff Online Now' . '</a></h3>
			<ul>
				' . $__compilerVar2 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar2);
$__output .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all online users' . '">' . 'Members Online Now' . '</a></h3>
		
		';
if ($onlineUsers['records'])
{
$__output .= '
		
			';
if ($visitor['user_id'])
{
$__output .= '
				';
$__compilerVar3 = '';
$__compilerVar3 .= '
						';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar3 .= '
							';
if ($user['followed'])
{
$__compilerVar3 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar3 .= '
						';
}
$__compilerVar3 .= '
					';
if (trim($__compilerVar3) !== '')
{
$__output .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar3 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Members' . ':</a></h4>
				';
}
unset($__compilerVar3);
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
						<li>
						';
if ($user['user_id'])
{
$__output .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
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
							' . 'Guest';
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
			' . 'Total: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['total'], '0') . ' (members: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['members'], '0') . ', guests: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['guests'], '0') . ', robots: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar4 = '';
$__output .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar4, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar4);
