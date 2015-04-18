<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($friends)
{
$__output .= '
	<div class="section">
		<h3 class="subHeading textWithCount" title="' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' is friends with ' . XenForo_Template_Helper_Core::numberFormat($friendsCount, '0') . ' members' . '">
			<span class="text">' . 'Friends' . '</span>
			<a href="' . XenForo_Template_Helper_Core::link('members/friends', $user, array()) . '" class="count OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($friendsCount, '0') . '</a>
		</h3>
		<div class="primaryContent avatarHeap">
			<ol>
			';
foreach ($friends AS $friendUserId => $friendUser)
{
$__output .= '
				<li>
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($friendUser,false,array(
'user' => '$friendUser',
'size' => 's',
'text' => htmlspecialchars($friendUser['username'], ENT_QUOTES, 'UTF-8'),
'class' => 'Tooltip',
'title' => htmlspecialchars($friendUser['username'], ENT_QUOTES, 'UTF-8'),
'itemprop' => 'contact'
),'')) . '
				</li>
			';
}
$__output .= '
			</ol>
		</div>
		';
if ($friendsCount > count($friends))
{
$__output .= '
			<div class="sectionFooter"><a href="' . XenForo_Template_Helper_Core::link('members/friends', $user, array()) . '" class="OverlayTrigger">' . 'Xem tất cả' . '</a></div>
		';
}
$__output .= '
	</div>
';
}
$__output .= '

';
if ($mutualFriends)
{
$__output .= '
	<div class="section">
		<h3 class="subHeading textWithCount" title="' . 'You and ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' are mutual friends with ' . XenForo_Template_Helper_Core::numberFormat($mutualFriendsCount, '0') . ' members.' . '">
			<span class="text">' . 'Mutual Friends' . '</span>
			<a href="' . XenForo_Template_Helper_Core::link('members/mutual-friends', $user, array()) . '" class="count OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($mutualFriendsCount, '0') . '</a>
		</h3>
		<div class="primaryContent avatarHeap">
			<ol>
			';
foreach ($mutualFriends AS $mutualFriendUserId => $mutualFriendUser)
{
$__output .= '
				<li>
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($mutualFriendUser,false,array(
'user' => '$mutualFriendUser',
'size' => 's',
'text' => htmlspecialchars($mutualFriendUser['username'], ENT_QUOTES, 'UTF-8'),
'class' => 'Tooltip',
'title' => htmlspecialchars($mutualFriendUser['username'], ENT_QUOTES, 'UTF-8'),
'itemprop' => 'contact'
),'')) . '
				</li>
			';
}
$__output .= '
			</ol>
		</div>
		';
if ($mutualFriendsCount > count($mutualFriends))
{
$__output .= '
			<div class="sectionFooter"><a href="' . XenForo_Template_Helper_Core::link('members/mutual-friends', $user, array()) . '" class="OverlayTrigger">' . 'Xem tất cả' . '</a></div>
		';
}
$__output .= '
	</div>
';
}
