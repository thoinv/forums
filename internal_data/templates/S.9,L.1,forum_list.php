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
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:forums', false, array());
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar3 .= 'website';
$__compilerVar4 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar4 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	<meta property="og:image" content="';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar4 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '" />
	<meta property="og:type" content="' . (($__compilerVar3) ? (htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($description)
{
$__compilerVar4 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar4 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar4 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar4 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar4;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4);
$__output .= '

';
$__compilerVar6 = '';
$__compilerVar6 .= '
	';
if ($renderedNodes)
{
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar7 .= '

';
$__compilerVar8 = '';
$__compilerVar8 .= '
		';
foreach ($renderedNodes AS $node)
{
$__compilerVar8 .= $node;
}
$__compilerVar8 .= '
	';
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
	<ol class="nodeList" id="forums">
	' . $__compilerVar8 . '
	</ol>
';
}
unset($__compilerVar8);
$__compilerVar7 .= '

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
$__compilerVar6 .= $__compilerVar7;
unset($__compilerVar7);
}
$__compilerVar6 .= '
';
$__output .= $this->callTemplateHook('forum_list_nodes', $__compilerVar6, array());
unset($__compilerVar6);
$__output .= '
	
';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
	' . '
	
	';
$__compilerVar9 = '';
$__compilerVar9 .= '
		';
$__compilerVar10 = '';
$__compilerVar11 = '';
$__compilerVar10 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar11, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar11);
$__compilerVar10 .= '
' . '

<!-- block: sidebar_online_staff -->
';
$__compilerVar12 = '';
$__compilerVar12 .= '
					';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar12 .= '
						';
if ($user['is_staff'])
{
$__compilerVar12 .= '
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
$__compilerVar12 .= '
					';
}
$__compilerVar12 .= '
				';
if (trim($__compilerVar12) !== '')
{
$__compilerVar10 .= '
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'Staff Online Now' . '</a></h3>
			<ul>
				' . $__compilerVar12 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar12);
$__compilerVar10 .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all online users' . '">' . 'Members Online Now' . '</a></h3>
		
		';
if ($onlineUsers['records'])
{
$__compilerVar10 .= '
		
			';
if ($visitor['user_id'])
{
$__compilerVar10 .= '
				';
$__compilerVar13 = '';
$__compilerVar13 .= '
						';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar13 .= '
							';
if ($user['followed'])
{
$__compilerVar13 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar13 .= '
						';
}
$__compilerVar13 .= '
					';
if (trim($__compilerVar13) !== '')
{
$__compilerVar10 .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar13 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Members' . ':</a></h4>
				';
}
unset($__compilerVar13);
$__compilerVar10 .= '
			';
}
$__compilerVar10 .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($onlineUsers['records'] AS $user)
{
$i++;
$__compilerVar10 .= '
					';
if ($i <= $onlineUsers['limit'])
{
$__compilerVar10 .= '
						<li>
						';
if ($user['user_id'])
{
$__compilerVar10 .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $onlineUsers['limit'])
{
$__compilerVar10 .= ',';
}
$__compilerVar10 .= '
						';
}
else
{
$__compilerVar10 .= '
							' . 'Guest';
if ($i < $onlineUsers['limit'])
{
$__compilerVar10 .= ',';
}
$__compilerVar10 .= '
						';
}
$__compilerVar10 .= '
						</li>
					';
}
$__compilerVar10 .= '
				';
}
$__compilerVar10 .= '
				';
if ($onlineUsers['recordsUnseen'])
{
$__compilerVar10 .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__compilerVar10 .= '
			</ol>
		';
}
$__compilerVar10 .= '
		
		<div class="footnote">
			' . 'Total: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['total'], '0') . ' (members: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['members'], '0') . ', guests: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['guests'], '0') . ', robots: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar14 = '';
$__compilerVar10 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar14, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar14);
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
		
		<!-- block: forum_stats -->
		<div class="section">
			<div class="secondaryContent statsList" id="boardStats">
				<h3>' . 'Forum Statistics' . '</h3>
				<div class="pairsJustified">
					<dl class="discussionCount"><dt>' . 'Discussions' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['discussions'], '0') . '</dd></dl>
					<dl class="messageCount"><dt>' . 'Messages' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['messages'], '0') . '</dd></dl>
					<dl class="memberCount"><dt>' . 'Members' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['users'], '0') . '</dd></dl>
					<dl><dt>' . 'Latest Member' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($boardTotals['latestUser'],'',false,array())) . '</dd></dl>
					<!-- slot: forum_stats_extra -->
				</div>
			</div>
		</div>
		<!-- end block: forum_stats -->
		
		';
$__compilerVar15 = '';
$__compilerVar15 .= XenForo_Template_Helper_Core::link('canonical:forums', false, array());
$__compilerVar16 = '';
$__compilerVar17 = '';
$__compilerVar17 .= '
				';
$__compilerVar18 = '';
$__compilerVar18 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar18 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar15, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar18 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar18 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar18 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar18 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar18 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar15, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar18 .= '	
				';
$__compilerVar17 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar18, array());
unset($__compilerVar18);
$__compilerVar17 .= '		
			';
if (trim($__compilerVar17) !== '')
{
$__compilerVar16 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar16 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar17 . '
		</div>
	</div>
';
}
unset($__compilerVar17);
$__compilerVar9 .= $__compilerVar16;
unset($__compilerVar15, $__compilerVar16);
$__compilerVar9 .= '
		
	';
$__extraData['sidebar'] .= $this->callTemplateHook('forum_list_sidebar', $__compilerVar9, array());
unset($__compilerVar9);
$__extraData['sidebar'] .= '
';
