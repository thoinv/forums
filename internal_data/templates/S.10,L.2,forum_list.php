<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['h1'] = '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:forums', false, array()) . '" />';
$__output .= '
';
if ($xenOptions['boardDescription'])
{
$__extraData['head']['description'] = '';
$__extraData['head']['description'] .= '
	<meta name="description" content="' . htmlspecialchars($xenOptions['boardDescription'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '
';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
$__compilerVar19 = '';
$__compilerVar19 .= XenForo_Template_Helper_Core::link('canonical:forums', false, array());
$__compilerVar20 = '';
$__compilerVar20 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
$__compilerVar21 = '';
$__compilerVar21 .= 'website';
$__compilerVar22 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar22 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar22 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar22 .= '
	<meta property="og:image" content="';
$__compilerVar23 = '';
$__compilerVar23 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar22 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar23, array());
unset($__compilerVar23);
$__compilerVar22 .= '" />
	<meta property="og:type" content="' . (($__compilerVar21) ? (htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar19 . '" />
	<meta property="og:title" content="' . $__compilerVar20 . '" />
	';
if ($description)
{
$__compilerVar22 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar22 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar22 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar22 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar22 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar22 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar22;
unset($__compilerVar19, $__compilerVar20, $__compilerVar21, $__compilerVar22);
$__output .= '

';
$__compilerVar24 = '';
$__compilerVar24 .= '
	';
if ($renderedNodes)
{
$__compilerVar25 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar25 .= '

';
$__compilerVar26 = '';
$__compilerVar26 .= '
		';
foreach ($renderedNodes AS $node)
{
$__compilerVar26 .= $node;
}
$__compilerVar26 .= '
	';
if (trim($__compilerVar26) !== '')
{
$__compilerVar25 .= '
	<ol class="nodeList" id="forums">
	' . $__compilerVar26 . '
	</ol>
';
}
unset($__compilerVar26);
$__compilerVar25 .= '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
';
$__compilerVar24 .= $__compilerVar25;
unset($__compilerVar25);
}
$__compilerVar24 .= '
';
$__output .= $this->callTemplateHook('forum_list_nodes', $__compilerVar24, array());
unset($__compilerVar24);
$__output .= '
	
';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
	' . '
	
	';
$__compilerVar27 = '';
$__compilerVar27 .= '
		';
$__compilerVar28 = '';
$__compilerVar29 = '';
$__compilerVar28 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar29, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar29);
$__compilerVar28 .= '
' . '

<!-- block: sidebar_online_staff -->
';
$__compilerVar30 = '';
$__compilerVar30 .= '
					';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar30 .= '
						';
if ($user['is_staff'])
{
$__compilerVar30 .= '
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
$__compilerVar30 .= '
					';
}
$__compilerVar30 .= '
				';
if (trim($__compilerVar30) !== '')
{
$__compilerVar28 .= '
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'BQT đang trực tuyến' . '</a></h3>
			<ul>
				' . $__compilerVar30 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar30);
$__compilerVar28 .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'Xem tất cả thành viên đang trực tuyến' . '">' . 'Thành viên trực tuyến' . '</a></h3>
		
		';
if ($onlineUsers['records'])
{
$__compilerVar28 .= '
		
			';
if ($visitor['user_id'])
{
$__compilerVar28 .= '
				';
$__compilerVar31 = '';
$__compilerVar31 .= '
						';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar31 .= '
							';
if ($user['followed'])
{
$__compilerVar31 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar31 .= '
						';
}
$__compilerVar31 .= '
					';
if (trim($__compilerVar31) !== '')
{
$__compilerVar28 .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar31 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên' . ':</a></h4>
				';
}
unset($__compilerVar31);
$__compilerVar28 .= '
			';
}
$__compilerVar28 .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($onlineUsers['records'] AS $user)
{
$i++;
$__compilerVar28 .= '
					';
if ($i <= $onlineUsers['limit'])
{
$__compilerVar28 .= '
						<li>
						';
if ($user['user_id'])
{
$__compilerVar28 .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $onlineUsers['limit'])
{
$__compilerVar28 .= ',';
}
$__compilerVar28 .= '
						';
}
else
{
$__compilerVar28 .= '
							' . 'Khách';
if ($i < $onlineUsers['limit'])
{
$__compilerVar28 .= ',';
}
$__compilerVar28 .= '
						';
}
$__compilerVar28 .= '
						</li>
					';
}
$__compilerVar28 .= '
				';
}
$__compilerVar28 .= '
				';
if ($onlineUsers['recordsUnseen'])
{
$__compilerVar28 .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__compilerVar28 .= '
			</ol>
		';
}
$__compilerVar28 .= '
		
		<div class="footnote">
			' . 'Tổng: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['total'], '0') . ' (Thành viên: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['members'], '0') . ', Khách: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['guests'], '0') . ', Robots: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar32 = '';
$__compilerVar28 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar32, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar32);
$__compilerVar27 .= $__compilerVar28;
unset($__compilerVar28);
$__compilerVar27 .= '
		
		<!-- block: forum_stats -->
		<div class="section">
			<div class="secondaryContent statsList" id="boardStats">
				<h3>' . 'Thống kê diễn đàn' . '</h3>
				<div class="pairsJustified">
					<dl class="discussionCount"><dt>' . 'Đề tài thảo luận' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['discussions'], '0') . '</dd></dl>
					<dl class="messageCount"><dt>' . 'Bài viết' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['messages'], '0') . '</dd></dl>
					<dl class="memberCount"><dt>' . 'Thành viên' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['users'], '0') . '</dd></dl>
					<dl><dt>' . 'Thành viên mới nhất' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($boardTotals['latestUser'],'',false,array())) . '</dd></dl>
					<!-- slot: forum_stats_extra -->
				</div>
			</div>
		</div>
		<!-- end block: forum_stats -->
		
		';
$__compilerVar33 = '';
$__compilerVar33 .= XenForo_Template_Helper_Core::link('canonical:forums', false, array());
$__compilerVar34 = '';
$__compilerVar35 = '';
$__compilerVar35 .= '
				';
$__compilerVar36 = '';
$__compilerVar36 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar36 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar33, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar36 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar36 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar36 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar36 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar36 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar33, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar36 .= '	
				';
$__compilerVar35 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar36, array());
unset($__compilerVar36);
$__compilerVar35 .= '		
			';
if (trim($__compilerVar35) !== '')
{
$__compilerVar34 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar34 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar35 . '
		</div>
	</div>
';
}
unset($__compilerVar35);
$__compilerVar27 .= $__compilerVar34;
unset($__compilerVar33, $__compilerVar34);
$__compilerVar27 .= '
		
	';
$__extraData['sidebar'] .= $this->callTemplateHook('forum_list_sidebar', $__compilerVar27, array());
unset($__compilerVar27);
$__extraData['sidebar'] .= '
';
