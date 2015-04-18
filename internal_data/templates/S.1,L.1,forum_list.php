<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
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
$__compilerVar3 .= htmlspecialchars($xenOptions['boardDescription'], ENT_QUOTES, 'UTF-8');
$__compilerVar4 = '';
$__compilerVar4 .= 'website';
$__compilerVar5 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar5 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar5 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar5 .= '
	<meta property="og:image" content="';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar5 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar6, array());
unset($__compilerVar6);
$__compilerVar5 .= '" />
	<meta property="og:type" content="' . (($__compilerVar4) ? (htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($__compilerVar3)
{
$__compilerVar5 .= '<meta property="og:description" content="' . $__compilerVar3 . '" />';
}
$__compilerVar5 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar5 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar5 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar5 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar5 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar5;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4, $__compilerVar5);
$__output .= '

';
$__compilerVar7 = '';
$__compilerVar7 .= '
	';
if ($renderedNodes)
{
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar8 .= '

';
$__compilerVar9 = '';
$__compilerVar9 .= '
		';
foreach ($renderedNodes AS $node)
{
$__compilerVar9 .= $node;
}
$__compilerVar9 .= '
	';
if (trim($__compilerVar9) !== '')
{
$__compilerVar8 .= '
	<ol class="nodeList sectionMain" id="forums">
	' . $__compilerVar9 . '
	</ol>
';
}
unset($__compilerVar9);
$__compilerVar8 .= '

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
$__compilerVar7 .= $__compilerVar8;
unset($__compilerVar8);
}
$__compilerVar7 .= '
';
$__output .= $this->callTemplateHook('forum_list_nodes', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '
	
';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
	' . '
	
	';
$__compilerVar10 = '';
$__compilerVar10 .= '
		';
if ($canViewMemberList)
{
$__compilerVar10 .= '
			';
$__compilerVar11 = '';
$__compilerVar12 = '';
$__compilerVar11 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar12, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar12);
$__compilerVar11 .= '
' . '
	<div class="section infoBlock">
	
	</div>
<!-- block: sidebar_online_staff -->
';
$__compilerVar13 = '';
$__compilerVar13 .= '
					';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar13 .= '
						';
if ($user['is_staff'])
{
$__compilerVar13 .= '
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
$__compilerVar13 .= '
					';
}
$__compilerVar13 .= '
				';
if (trim($__compilerVar13) !== '')
{
$__compilerVar11 .= '
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'Staff Online Now' . '</a></h3>
			<ul>
				' . $__compilerVar13 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar13);
$__compilerVar11 .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all online users' . '">' . 'Members Online Now' . '</a></h3>
		
		';
if ($onlineUsers['records'])
{
$__compilerVar11 .= '
		
			';
if ($visitor['user_id'])
{
$__compilerVar11 .= '
				';
$__compilerVar14 = '';
$__compilerVar14 .= '
						';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar14 .= '
							';
if ($user['followed'])
{
$__compilerVar14 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar14 .= '
						';
}
$__compilerVar14 .= '
					';
if (trim($__compilerVar14) !== '')
{
$__compilerVar11 .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar14 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Members' . ':</a></h4>
				';
}
unset($__compilerVar14);
$__compilerVar11 .= '
			';
}
$__compilerVar11 .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($onlineUsers['records'] AS $user)
{
$i++;
$__compilerVar11 .= '
					';
if ($i <= $onlineUsers['limit'])
{
$__compilerVar11 .= '
						<li>
						';
if ($user['user_id'])
{
$__compilerVar11 .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $onlineUsers['limit'])
{
$__compilerVar11 .= ',';
}
$__compilerVar11 .= '
						';
}
else
{
$__compilerVar11 .= '
							' . 'Guest';
if ($i < $onlineUsers['limit'])
{
$__compilerVar11 .= ',';
}
$__compilerVar11 .= '
						';
}
$__compilerVar11 .= '
						</li>
					';
}
$__compilerVar11 .= '
				';
}
$__compilerVar11 .= '
				';
if ($onlineUsers['recordsUnseen'])
{
$__compilerVar11 .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__compilerVar11 .= '
			</ol>
		';
}
$__compilerVar11 .= '
		
		<div class="footnote">
			' . 'Total: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['total'], '0') . ' (members: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['members'], '0') . ', guests: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['guests'], '0') . ', robots: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar15 = '';
$__compilerVar11 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar15, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar15);
$__compilerVar10 .= $__compilerVar11;
unset($__compilerVar11);
$__compilerVar10 .= '
		';
}
$__compilerVar10 .= '
		
		';
if ($profilePosts)
{
$__compilerVar10 .= '
			<div class="section profilePostList">
				<div class="secondaryContent">
					<h3><a href="' . XenForo_Template_Helper_Core::link('find-new/profile-posts', false, array()) . '">' . 'New Profile Posts' . '</a></h3>
					';
$__compilerVar16 = '';
if ($canUpdateStatus)
{
$__compilerVar16 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/quick_reply_profile.js');
$__compilerVar16 .= '
	<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post" id="ProfilePoster" class="statusPoster AutoValidator" data-optInOut="OptIn" data-hide-submit="true">
		<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Update your status' . '..." rows="1" cols="40" data-statusEditorCounter="#statusEditorCounter"></textarea>
		<div class="submitUnit">
			<span id="statusEditorCounter" title="' . 'Characters remaining' . '"></span>
			<input type="submit" class="button primary" value="' . 'Post' . '" />
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
			<input type="hidden" name="simple" value="1" />
		</div>
	</form>
';
}
$__compilerVar16 .= '
<ul id="ProfilePostList" class="' . (($canUpdateStatus) ? ('nonInitial') : ('')) . '">
';
foreach ($profilePosts AS $profilePost)
{
$__compilerVar16 .= '
	';
$__compilerVar17 = '';
$this->addRequiredExternal('css', 'profile_post_list_simple');
$__compilerVar17 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar17 .= '

<li id="profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="profilePostListItem ' . (($profilePost['isDeleted']) ? ('deleted') : ('')) . ' ' . (($profilePost['is_staff']) ? ('staff') : ('')) . ' ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$profilePost',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		<div class="messageContent">
			<span class="poster">
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array())) . '
				';
if ($profilePost['user_id'] != $profilePost['profile_user_id'] AND $profilePost['profileUser'])
{
$__compilerVar17 .= '
					<span class="muted">' . (($pageIsRtl) ? ('&#9668;') : ('&#9658;')) . '</span> ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost['profileUser'],'',(true),array())) . '
				';
}
$__compilerVar17 .= '
			</span>
			<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
		</div>

		<div class="messageMeta">
			<div class="privateControls">
				<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
			</div>

			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" class="item Tooltip OverlayTrigger" title="' . 'Interact' . '" data-tipclass="flipped" data-offsetX="7" data-offsetY="-7">&#8226;&#8226;&#8226;</a>
			</div>
		</div>

	</div>
</li>';
$__compilerVar16 .= $__compilerVar17;
unset($__compilerVar17);
$__compilerVar16 .= '
';
}
$__compilerVar16 .= '
</ul>';
$__compilerVar10 .= $__compilerVar16;
unset($__compilerVar16);
$__compilerVar10 .= '
				</div>
			</div>
		';
}
$__compilerVar10 .= '
		
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
$__compilerVar18 = '';
$__compilerVar18 .= XenForo_Template_Helper_Core::link('canonical:forums', false, array());
$__compilerVar19 = '';
$__compilerVar19 .= '<!--';
$__compilerVar20 = '';
$__compilerVar20 .= '
				';
$__compilerVar21 = '';
$__compilerVar21 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar21 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar21 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar21 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar21 .= '
						<fb:like href="' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar21 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar21 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar21 .= '	
				';
$__compilerVar20 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar21, array());
unset($__compilerVar21);
$__compilerVar20 .= '		
			';
if (trim($__compilerVar20) !== '')
{
$__compilerVar19 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar19 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar20 . '
		</div>
	</div>
';
}
unset($__compilerVar20);
$__compilerVar19 .= '-->';
$__compilerVar10 .= $__compilerVar19;
unset($__compilerVar18, $__compilerVar19);
$__compilerVar10 .= '
		
	';
$__extraData['sidebar'] .= $this->callTemplateHook('forum_list_sidebar', $__compilerVar10, array());
unset($__compilerVar10);
$__extraData['sidebar'] .= '
';
