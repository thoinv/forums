<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Recent Activity';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Activity stream for all registered members at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.';
$__output .= '

';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__output .= '

<div class="newsFeed">
	';
$__compilerVar1 = '';
$__compilerVar1 .= 'The news feed is currently empty.';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'events');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'news_feed');
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__compilerVar2 .= '

';
if ($newsFeed)
{
$__compilerVar2 .= '
	<ol class="eventList">
		';
foreach ($newsFeed AS $item)
{
$__compilerVar2 .= '		
			';
$__compilerVar3 = '';
$__compilerVar3 .= $item['template'];
$__compilerVar4 = '';
$__compilerVar4 .= htmlspecialchars($item['event_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar5 = '';
$__compilerVar5 .= '<li id="item_' . htmlspecialchars($item['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($item,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $__compilerVar3 . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($__compilerVar4,array(
'time' => htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
$__compilerVar2 .= $__compilerVar5;
unset($__compilerVar3, $__compilerVar4, $__compilerVar5);
$__compilerVar2 .= '
		';
}
$__compilerVar2 .= '
	</ol>
';
}
else
{
$__compilerVar2 .= '
	' . $__compilerVar1 . '
';
}
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
	';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::link('recent-activity', false, array());
$__compilerVar7 = '';
if (!$feedEnds)
{
$__compilerVar7 .= '
<div class="NewsFeedEnd">
	<div class="sectionFooter">
		<a href="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" class="NewsFeedLoader" data-oldestItemId="' . htmlspecialchars($oldestItemId, ENT_QUOTES, 'UTF-8') . '">' . 'Show older items' . '</a>
	</div>
</div>
';
}
$__output .= $__compilerVar7;
unset($__compilerVar6, $__compilerVar7);
$__output .= '
	';
$__compilerVar8 = '';
$__compilerVar8 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
	<div class="extra">
		';
if ($visitor['user_id'])
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '" class="button smallButton">' . 'Your News Feed' . '</a>';
}
$__output .= '
	</div>
</div>

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	' . '
	
	';
$__compilerVar9 = '';
$__compilerVar10 = '';
$__compilerVar9 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar10, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar10);
$__compilerVar9 .= '
' . '
	<div class="section infoBlock">
	
	</div>
<!-- block: sidebar_online_staff -->
';
$__compilerVar11 = '';
$__compilerVar11 .= '
					';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar11 .= '
						';
if ($user['is_staff'])
{
$__compilerVar11 .= '
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
$__compilerVar11 .= '
					';
}
$__compilerVar11 .= '
				';
if (trim($__compilerVar11) !== '')
{
$__compilerVar9 .= '
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'Staff Online Now' . '</a></h3>
			<ul>
				' . $__compilerVar11 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar11);
$__compilerVar9 .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all online users' . '">' . 'Members Online Now' . '</a></h3>
		
		';
if ($onlineUsers['records'])
{
$__compilerVar9 .= '
		
			';
if ($visitor['user_id'])
{
$__compilerVar9 .= '
				';
$__compilerVar12 = '';
$__compilerVar12 .= '
						';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar12 .= '
							';
if ($user['followed'])
{
$__compilerVar12 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar12 .= '
						';
}
$__compilerVar12 .= '
					';
if (trim($__compilerVar12) !== '')
{
$__compilerVar9 .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar12 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Members' . ':</a></h4>
				';
}
unset($__compilerVar12);
$__compilerVar9 .= '
			';
}
$__compilerVar9 .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($onlineUsers['records'] AS $user)
{
$i++;
$__compilerVar9 .= '
					';
if ($i <= $onlineUsers['limit'])
{
$__compilerVar9 .= '
						<li>
						';
if ($user['user_id'])
{
$__compilerVar9 .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $onlineUsers['limit'])
{
$__compilerVar9 .= ',';
}
$__compilerVar9 .= '
						';
}
else
{
$__compilerVar9 .= '
							' . 'Guest';
if ($i < $onlineUsers['limit'])
{
$__compilerVar9 .= ',';
}
$__compilerVar9 .= '
						';
}
$__compilerVar9 .= '
						</li>
					';
}
$__compilerVar9 .= '
				';
}
$__compilerVar9 .= '
				';
if ($onlineUsers['recordsUnseen'])
{
$__compilerVar9 .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__compilerVar9 .= '
			</ol>
		';
}
$__compilerVar9 .= '
		
		<div class="footnote">
			' . 'Total: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['total'], '0') . ' (members: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['members'], '0') . ', guests: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['guests'], '0') . ', robots: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar13 = '';
$__compilerVar9 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar13, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar13);
$__extraData['sidebar'] .= $__compilerVar9;
unset($__compilerVar9);
$__extraData['sidebar'] .= '
	
	';
if ($xenOptions['facebookLike'])
{
$__extraData['sidebar'] .= '
		<div class="section fbRecommendations">
			<div class="secondaryContent">
				<h3>' . 'Facebook Recommendations' . '</h3>
				<div class="fbWidgetBlock" style="margin: 0 -' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.padding-left') . ' -' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.padding-bottom') . '">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__extraData['sidebar'] .= '
					<fb:recommendations site="' . htmlspecialchars($requestPaths['host'], ENT_QUOTES, 'UTF-8') . '" width="' . XenForo_Template_Helper_Core::styleProperty('sidebar.width') . '" height="300" header="false" font="trebuchet ms" border_color="' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background-color') . '" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:recommendations>
				</div>
			</div>
		</div>
	';
}
$__extraData['sidebar'] .= '

';
