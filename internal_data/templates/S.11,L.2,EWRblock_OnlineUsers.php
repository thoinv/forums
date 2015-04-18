<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar6 = '';
$__compilerVar7 = '';
$__compilerVar6 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar7, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar7);
$__compilerVar6 .= '
' . '
	<div class="section infoBlock">
	
	</div>
<!-- block: sidebar_online_staff -->
';
$__compilerVar8 = '';
$__compilerVar8 .= '
					';
foreach ($OnlineUsers['records'] AS $user)
{
$__compilerVar8 .= '
						';
if ($user['is_staff'])
{
$__compilerVar8 .= '
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
$__compilerVar8 .= '
					';
}
$__compilerVar8 .= '
				';
if (trim($__compilerVar8) !== '')
{
$__compilerVar6 .= '
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'BQT đang trực tuyến' . '</a></h3>
			<ul>
				' . $__compilerVar8 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar8);
$__compilerVar6 .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'Xem tất cả thành viên đang trực tuyến' . '">' . 'Thành viên trực tuyến' . '</a></h3>
		
		';
if ($OnlineUsers['records'])
{
$__compilerVar6 .= '
		
			';
if ($visitor['user_id'])
{
$__compilerVar6 .= '
				';
$__compilerVar9 = '';
$__compilerVar9 .= '
						';
foreach ($OnlineUsers['records'] AS $user)
{
$__compilerVar9 .= '
							';
if ($user['followed'])
{
$__compilerVar9 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar9 .= '
						';
}
$__compilerVar9 .= '
					';
if (trim($__compilerVar9) !== '')
{
$__compilerVar6 .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar9 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên' . ':</a></h4>
				';
}
unset($__compilerVar9);
$__compilerVar6 .= '
			';
}
$__compilerVar6 .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($OnlineUsers['records'] AS $user)
{
$i++;
$__compilerVar6 .= '
					';
if ($i <= $OnlineUsers['limit'])
{
$__compilerVar6 .= '
						<li>
						';
if ($user['user_id'])
{
$__compilerVar6 .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $OnlineUsers['limit'])
{
$__compilerVar6 .= ',';
}
$__compilerVar6 .= '
						';
}
else
{
$__compilerVar6 .= '
							' . 'Khách';
if ($i < $OnlineUsers['limit'])
{
$__compilerVar6 .= ',';
}
$__compilerVar6 .= '
						';
}
$__compilerVar6 .= '
						</li>
					';
}
$__compilerVar6 .= '
				';
}
$__compilerVar6 .= '
				';
if ($OnlineUsers['recordsUnseen'])
{
$__compilerVar6 .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__compilerVar6 .= '
			</ol>
		';
}
$__compilerVar6 .= '
		
		<div class="footnote">
			' . 'Tổng: ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['total'], '0') . ' (Thành viên: ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['members'], '0') . ', Khách: ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['guests'], '0') . ', Robots: ' . XenForo_Template_Helper_Core::numberFormat($OnlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar10 = '';
$__compilerVar6 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar10, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar10);
$__output .= $__compilerVar6;
unset($__compilerVar6);
