<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Hoạt động gần đây';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Luồng hoạt động của tất cả thành viên tại ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.';
$__output .= '

';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__output .= '

<div class="newsFeed">
	';
$__compilerVar14 = '';
$__compilerVar14 .= 'Luồng tin hiện tại đang trống.';
$__compilerVar15 = '';
$this->addRequiredExternal('css', 'events');
$__compilerVar15 .= '
';
$this->addRequiredExternal('css', 'news_feed');
$__compilerVar15 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__compilerVar15 .= '

';
if ($newsFeed)
{
$__compilerVar15 .= '
	<ol class="eventList">
		';
foreach ($newsFeed AS $item)
{
$__compilerVar15 .= '		
			';
$__compilerVar16 = '';
$__compilerVar16 .= $item['template'];
$__compilerVar17 = '';
$__compilerVar17 .= htmlspecialchars($item['event_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar18 = '';
$__compilerVar18 .= '<li id="item_' . htmlspecialchars($item['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($item,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $__compilerVar16 . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($__compilerVar17,array(
'time' => htmlspecialchars($__compilerVar17, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
$__compilerVar15 .= $__compilerVar18;
unset($__compilerVar16, $__compilerVar17, $__compilerVar18);
$__compilerVar15 .= '
		';
}
$__compilerVar15 .= '
	</ol>
';
}
else
{
$__compilerVar15 .= '
	' . $__compilerVar14 . '
';
}
$__output .= $__compilerVar15;
unset($__compilerVar14, $__compilerVar15);
$__output .= '
	';
$__compilerVar19 = '';
$__compilerVar19 .= XenForo_Template_Helper_Core::link('recent-activity', false, array());
$__compilerVar20 = '';
if (!$feedEnds)
{
$__compilerVar20 .= '
<div class="NewsFeedEnd">
	<div class="sectionFooter">
		<a href="' . htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8') . '" class="NewsFeedLoader" data-oldestItemId="' . htmlspecialchars($oldestItemId, ENT_QUOTES, 'UTF-8') . '">' . 'Hiển thị mục cũ hơn' . '</a>
	</div>
</div>
';
}
$__output .= $__compilerVar20;
unset($__compilerVar19, $__compilerVar20);
$__output .= '
	';
$__compilerVar21 = '';
$__compilerVar21 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar21;
unset($__compilerVar21);
$__output .= '
	<div class="extra">
		';
if ($visitor['user_id'])
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '" class="button smallButton">' . 'Thông tin bạn' . '</a>';
}
$__output .= '
	</div>
</div>

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	' . '
	
	';
$__compilerVar22 = '';
$__compilerVar23 = '';
$__compilerVar22 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar23, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar23);
$__compilerVar22 .= '
' . '
	<div class="section infoBlock">
	
	</div>
<!-- block: sidebar_online_staff -->
';
$__compilerVar24 = '';
$__compilerVar24 .= '
					';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar24 .= '
						';
if ($user['is_staff'])
{
$__compilerVar24 .= '
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
$__compilerVar24 .= '
					';
}
$__compilerVar24 .= '
				';
if (trim($__compilerVar24) !== '')
{
$__compilerVar22 .= '
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'BQT đang trực tuyến' . '</a></h3>
			<ul>
				' . $__compilerVar24 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar24);
$__compilerVar22 .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'Xem tất cả thành viên đang trực tuyến' . '">' . 'Thành viên trực tuyến' . '</a></h3>
		
		';
if ($onlineUsers['records'])
{
$__compilerVar22 .= '
		
			';
if ($visitor['user_id'])
{
$__compilerVar22 .= '
				';
$__compilerVar25 = '';
$__compilerVar25 .= '
						';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar25 .= '
							';
if ($user['followed'])
{
$__compilerVar25 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar25 .= '
						';
}
$__compilerVar25 .= '
					';
if (trim($__compilerVar25) !== '')
{
$__compilerVar22 .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar25 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên' . ':</a></h4>
				';
}
unset($__compilerVar25);
$__compilerVar22 .= '
			';
}
$__compilerVar22 .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($onlineUsers['records'] AS $user)
{
$i++;
$__compilerVar22 .= '
					';
if ($i <= $onlineUsers['limit'])
{
$__compilerVar22 .= '
						<li>
						';
if ($user['user_id'])
{
$__compilerVar22 .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $onlineUsers['limit'])
{
$__compilerVar22 .= ',';
}
$__compilerVar22 .= '
						';
}
else
{
$__compilerVar22 .= '
							' . 'Khách';
if ($i < $onlineUsers['limit'])
{
$__compilerVar22 .= ',';
}
$__compilerVar22 .= '
						';
}
$__compilerVar22 .= '
						</li>
					';
}
$__compilerVar22 .= '
				';
}
$__compilerVar22 .= '
				';
if ($onlineUsers['recordsUnseen'])
{
$__compilerVar22 .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__compilerVar22 .= '
			</ol>
		';
}
$__compilerVar22 .= '
		
		<div class="footnote">
			' . 'Tổng: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['total'], '0') . ' (Thành viên: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['members'], '0') . ', Khách: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['guests'], '0') . ', Robots: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar26 = '';
$__compilerVar22 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar26, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar26);
$__extraData['sidebar'] .= $__compilerVar22;
unset($__compilerVar22);
$__extraData['sidebar'] .= '
	
	';
if ($xenOptions['facebookLike'])
{
$__extraData['sidebar'] .= '
		<div class="section fbRecommendations">
			<div class="secondaryContent">
				<h3>' . 'Khuyến khích trên Facebook' . '</h3>
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
