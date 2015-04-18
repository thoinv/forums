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
$__compilerVar22 = '';
$__compilerVar22 .= XenForo_Template_Helper_Core::link('canonical:forums', false, array());
$__compilerVar23 = '';
$__compilerVar23 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
$__compilerVar24 = '';
$__compilerVar24 .= htmlspecialchars($xenOptions['boardDescription'], ENT_QUOTES, 'UTF-8');
$__compilerVar25 = '';
$__compilerVar25 .= 'website';
$__compilerVar26 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar26 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar26 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar26 .= '
	<meta property="og:image" content="';
$__compilerVar27 = '';
$__compilerVar27 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar26 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar27, array());
unset($__compilerVar27);
$__compilerVar26 .= '" />
	<meta property="og:type" content="' . (($__compilerVar25) ? (htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar22 . '" />
	<meta property="og:title" content="' . $__compilerVar23 . '" />
	';
if ($__compilerVar24)
{
$__compilerVar26 .= '<meta property="og:description" content="' . $__compilerVar24 . '" />';
}
$__compilerVar26 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar26 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar26 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar26 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar26 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar26;
unset($__compilerVar22, $__compilerVar23, $__compilerVar24, $__compilerVar25, $__compilerVar26);
$__output .= '

';
$__compilerVar28 = '';
$__compilerVar28 .= '
	';
if ($renderedNodes)
{
$__compilerVar29 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar29 .= '

';
$__compilerVar30 = '';
$__compilerVar30 .= '
		';
foreach ($renderedNodes AS $node)
{
$__compilerVar30 .= $node;
}
$__compilerVar30 .= '
	';
if (trim($__compilerVar30) !== '')
{
$__compilerVar29 .= '
	<ol class="nodeList sectionMain" id="forums">
	' . $__compilerVar30 . '
	</ol>
';
}
unset($__compilerVar30);
$__compilerVar29 .= '

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
$__compilerVar28 .= $__compilerVar29;
unset($__compilerVar29);
}
$__compilerVar28 .= '
';
$__output .= $this->callTemplateHook('forum_list_nodes', $__compilerVar28, array());
unset($__compilerVar28);
$__output .= '
	
';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
	' . '
	
	';
$__compilerVar31 = '';
$__compilerVar31 .= '
		';
if ($canViewMemberList)
{
$__compilerVar31 .= '
			';
$__compilerVar32 = '';
$__compilerVar33 = '';
$__compilerVar32 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar33, array(
'type' => 'threads',
'slot' => 'above'
));
unset($__compilerVar33);
$__compilerVar32 .= '
' . '
	<div class="section infoBlock">
	
	</div>
<!-- block: sidebar_online_staff -->
';
$__compilerVar34 = '';
$__compilerVar34 .= '
					';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar34 .= '
						';
if ($user['is_staff'])
{
$__compilerVar34 .= '
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
$__compilerVar34 .= '
					';
}
$__compilerVar34 .= '
				';
if (trim($__compilerVar34) !== '')
{
$__compilerVar32 .= '
	<div class="section staffOnline avatarList">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'BQT đang trực tuyến' . '</a></h3>
			<ul>
				' . $__compilerVar34 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar34);
$__compilerVar32 .= '
<!-- end block: sidebar_online_staff -->

<!-- block: sidebar_online_users -->
<div class="section membersOnline userList">		
	<div class="secondaryContent">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'Xem tất cả thành viên đang trực tuyến' . '">' . 'Thành viên trực tuyến' . '</a></h3>
		
		';
if ($onlineUsers['records'])
{
$__compilerVar32 .= '
		
			';
if ($visitor['user_id'])
{
$__compilerVar32 .= '
				';
$__compilerVar35 = '';
$__compilerVar35 .= '
						';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar35 .= '
							';
if ($user['followed'])
{
$__compilerVar35 .= '
								<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '</li>
							';
}
$__compilerVar35 .= '
						';
}
$__compilerVar35 .= '
					';
if (trim($__compilerVar35) !== '')
{
$__compilerVar32 .= '
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi' . ':</a></h4>
				<ul class="followedOnline">
					' . $__compilerVar35 . '
				</ul>
				<h4 class="minorHeading"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên' . ':</a></h4>
				';
}
unset($__compilerVar35);
$__compilerVar32 .= '
			';
}
$__compilerVar32 .= '
			
			<ol class="listInline">
				';
$i = 0;
foreach ($onlineUsers['records'] AS $user)
{
$i++;
$__compilerVar32 .= '
					';
if ($i <= $onlineUsers['limit'])
{
$__compilerVar32 .= '
						<li>
						';
if ($user['user_id'])
{
$__compilerVar32 .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '"
								class="username' . ((!$user['visible']) ? (' invisible') : ('')) . (($user['followed']) ? (' followed') : ('')) . '">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($i < $onlineUsers['limit'])
{
$__compilerVar32 .= ',';
}
$__compilerVar32 .= '
						';
}
else
{
$__compilerVar32 .= '
							' . 'Khách';
if ($i < $onlineUsers['limit'])
{
$__compilerVar32 .= ',';
}
$__compilerVar32 .= '
						';
}
$__compilerVar32 .= '
						</li>
					';
}
$__compilerVar32 .= '
				';
}
$__compilerVar32 .= '
				';
if ($onlineUsers['recordsUnseen'])
{
$__compilerVar32 .= '
					<li class="moreLink">... <a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all visitors' . '">' . 'and ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['recordsUnseen'], '0') . ' more' . '</a></li>
				';
}
$__compilerVar32 .= '
			</ol>
		';
}
$__compilerVar32 .= '
		
		<div class="footnote">
			' . 'Tổng: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['total'], '0') . ' (Thành viên: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['members'], '0') . ', Khách: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['guests'], '0') . ', Robots: ' . XenForo_Template_Helper_Core::numberFormat($onlineUsers['robots'], '0') . ')' . '
		</div>
	</div>
</div>
<!-- end block: sidebar_online_users -->
';
$__compilerVar36 = '';
$__compilerVar32 .= $this->callTemplateCallback('DigitalPointBetterAnalytics_Callback_Trending', 'renderSidebar', $__compilerVar36, array(
'type' => 'threads',
'slot' => 'below'
));
unset($__compilerVar36);
$__compilerVar31 .= $__compilerVar32;
unset($__compilerVar32);
$__compilerVar31 .= '
		';
}
$__compilerVar31 .= '
		
		';
if ($profilePosts)
{
$__compilerVar31 .= '
			<div class="section profilePostList">
				<div class="secondaryContent">
					<h3><a href="' . XenForo_Template_Helper_Core::link('find-new/profile-posts', false, array()) . '">' . 'New Profile Posts' . '</a></h3>
					';
$__compilerVar37 = '';
if ($canUpdateStatus)
{
$__compilerVar37 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/quick_reply_profile.js');
$__compilerVar37 .= '
	<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post" id="ProfilePoster" class="statusPoster AutoValidator" data-optInOut="OptIn" data-hide-submit="true">
		<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Cập nhật trạng thái' . '..." rows="1" cols="40" data-statusEditorCounter="#statusEditorCounter"></textarea>
		<div class="submitUnit">
			<span id="statusEditorCounter" title="' . 'Số ký tự còn lại' . '"></span>
			<input type="submit" class="button primary" value="' . 'Đăng' . '" />
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
			<input type="hidden" name="simple" value="1" />
		</div>
	</form>
';
}
$__compilerVar37 .= '
<ul id="ProfilePostList" class="' . (($canUpdateStatus) ? ('nonInitial') : ('')) . '">
';
foreach ($profilePosts AS $profilePost)
{
$__compilerVar37 .= '
	';
$__compilerVar38 = '';
$this->addRequiredExternal('css', 'profile_post_list_simple');
$__compilerVar38 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar38 .= '

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
$__compilerVar38 .= '
					<span class="muted">' . (($pageIsRtl) ? ('&#9668;') : ('&#9658;')) . '</span> ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost['profileUser'],'',(true),array())) . '
				';
}
$__compilerVar38 .= '
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
				<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" class="item Tooltip OverlayTrigger" title="' . 'Tương tác' . '" data-tipclass="flipped" data-offsetX="7" data-offsetY="-7">&#8226;&#8226;&#8226;</a>
			</div>
		</div>

	</div>
</li>';
$__compilerVar37 .= $__compilerVar38;
unset($__compilerVar38);
$__compilerVar37 .= '
';
}
$__compilerVar37 .= '
</ul>';
$__compilerVar31 .= $__compilerVar37;
unset($__compilerVar37);
$__compilerVar31 .= '
				</div>
			</div>
		';
}
$__compilerVar31 .= '
		
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
$__compilerVar39 = '';
$__compilerVar39 .= XenForo_Template_Helper_Core::link('canonical:forums', false, array());
$__compilerVar40 = '';
$__compilerVar40 .= '<!--';
$__compilerVar41 = '';
$__compilerVar41 .= '
				';
$__compilerVar42 = '';
$__compilerVar42 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar42 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar39, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar42 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar42 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar42 .= '
						<fb:like href="' . htmlspecialchars($__compilerVar39, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar42 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar42 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar39, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar42 .= '	
				';
$__compilerVar41 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar42, array());
unset($__compilerVar42);
$__compilerVar41 .= '		
			';
if (trim($__compilerVar41) !== '')
{
$__compilerVar40 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar40 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar41 . '
		</div>
	</div>
';
}
unset($__compilerVar41);
$__compilerVar40 .= '-->';
$__compilerVar31 .= $__compilerVar40;
unset($__compilerVar39, $__compilerVar40);
$__compilerVar31 .= '
		
	';
$__extraData['sidebar'] .= $this->callTemplateHook('forum_list_sidebar', $__compilerVar31, array());
unset($__compilerVar31);
$__extraData['sidebar'] .= '
';
