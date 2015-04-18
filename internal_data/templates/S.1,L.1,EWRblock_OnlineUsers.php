<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar2 = '';
$__compilerVar1 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar2, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar2);
$__compilerVar1 .= '
' . '
	<div class="section infoBlock">
	
	</div>
<!-- block: sidebar_online_staff -->
';
$__compilerVar3 = '';
$__compilerVar3 .= '
					';
foreach ($OnlineUsers['records'] AS $user)
{
$__compilerVar3 .= '
						';
if ($user['is_staff'])
{
$__compilerVar3 .= '
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
$__compilerVar3 .= '
					';
}
$__compilerVar3 .= '
				';
if (trim($__compilerVar3) !== '')
{
$__compilerVar1 .= '
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'Staff Online Now' . '</a></h3>
			<ul>
				' . $__compilerVar3 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar3);
$__compilerVar1 .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all online users' . '">' . 'Members Online Now' . '</a></h3>
		
		';
if ($OnlineUsers['records'])
{
$__compilerVar1 .= '
		
			';
if ($visitor['user_id'])
{
$__compilerVar1 .= '
				';
$__compilerVar4 = '';
$__compilerVar4 .= '
						';
foreach ($OnlineUsers['records'] AS $user)
{
$__compilerVar4 .= '
							';
if ($user['followed'])
{
$__compilerVar4 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar4 .= '
						';
}
$__compilerVar4 .= '
					';
if (trim($__compilerVar4) !== '')
{
$__compilerVar1 .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar4 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Members' . ':</a></h4>
				';
}
unset($__compilerVar4);
$__compilerVar1 .= '
			';
}
$__compilerVar1 .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($OnlineUsers['records'] AS $user)
{
$i++;
$__compilerVar1 .= '
					';
if ($i <= $OnlineUsers['limit'])
{
$__compilerVar1 .= '
						<li>
						';
if ($user['user_id'])
{
$__compilerVar1 .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $OnlineUsers['limit'])
{
$__compilerVar1 .= ',';
}
$__compilerVar1 .= '
						';
}
else
{
$__compilerVar1 .= '
							' . 'Guest';
if ($i < $OnlineUsers['limit'])
{
$__compilerVar1 .= ',';
}
$__compilerVar1 .= '
						';
}
$__compilerVar1 .= '
						</li>
					';
}
$__compilerVar1 .= '
				';
}
$__compilerVar1 .= '
				';
if ($OnlineUsers['recordsUnseen'])
{
$__compilerVar1 .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__compilerVar1 .= '
			</ol>
		';
}
$__compilerVar1 .= '
		
		<div class="footnote">
			' . 'Total: ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['total'], '0') . ' (members: ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['members'], '0') . ', guests: ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['guests'], '0') . ', robots: ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar5 = '';
$__compilerVar1 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar5, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar5);
$__output .= $__compilerVar1;
unset($__compilerVar1);
