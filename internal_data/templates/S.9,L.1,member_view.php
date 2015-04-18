<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__output .= ' 

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:members', $user, array(
'page' => $page
)) . '" />';
$__output .= '

';
$__extraData['head']['description'] = '';
$__extraData['head']['description'] .= '
	<meta name="description" content="' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' is a ' . XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
))
)) . ' at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '" />';
$__output .= '
	
';
$__extraData['head']['openGraph'] = '';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:members', $user, array());
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar3 .= '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' is a ' . XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
))
)) . ' at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'm',
'2' => '',
'3' => 'true'
));
$__compilerVar5 = '';
$__compilerVar5 .= 'profile';
$__compilerVar6 = '';
$__compilerVar6 .= '
		<meta property="profile:username" content="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" />
		';
if ($user['gender'])
{
$__compilerVar6 .= '<meta property="profile:gender" content="' . htmlspecialchars($user['gender'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar6 .= '
	';
$__compilerVar7 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar7 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($__compilerVar4)
{
$__compilerVar7 .= '<meta property="og:image" content="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar7 .= '
	<meta property="og:image" content="';
$__compilerVar8 = '';
$__compilerVar8 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar7 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar7 .= '" />
	<meta property="og:type" content="' . (($__compilerVar5) ? (htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($__compilerVar3)
{
$__compilerVar7 .= '<meta property="og:description" content="' . $__compilerVar3 . '" />';
}
$__compilerVar7 .= '
	' . $__compilerVar6 . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar7 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar7 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar7 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar7 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar7;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4, $__compilerVar5, $__compilerVar6, $__compilerVar7);
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'member_view');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/quick_reply_profile.js');
$__output .= '

<div class="profilePage" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">

	<div class="mast">
		<div class="avatarScaler">
			';
if ($visitor['user_id'] == $user['user_id'])
{
$__output .= '
				<a class="Av' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . 'l OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '">
					<img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'l',
'2' => '',
'3' => 'true'
)) . '" alt="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" style="' . XenForo_Template_Helper_Core::callHelper('avatarCropCss', array(
'0' => $user
)) . '" itemprop="photo" />
				</a>
			';
}
else
{
$__output .= '
				<span class="Av' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . 'l">
					<img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'l',
'2' => '',
'3' => 'true'
)) . '" alt="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" style="' . XenForo_Template_Helper_Core::callHelper('avatarCropCss', array(
'0' => $user
)) . '" itemprop="photo" />
				</span>
			';
}
$__output .= '
		</div>
		
		';
$__compilerVar9 = '';
$__compilerVar10 = '';
$__compilerVar9 .= $this->callTemplateHook('ad_member_view_below_avatar', $__compilerVar10, array());
unset($__compilerVar10);
$__output .= $__compilerVar9;
unset($__compilerVar9);
$__output .= '

		';
$__compilerVar11 = '';
$__output .= $this->callTemplateHook('member_view_sidebar_start', $__compilerVar11, array(
'user' => $user
));
unset($__compilerVar11);
$__output .= '

		<div class="section infoBlock">
			<div class="secondaryContent pairsJustified">

				';
$__compilerVar12 = '';
$__compilerVar12 .= '
				
				';
if ($canViewOnlineStatus)
{
$__compilerVar12 .= '
					<dl><dt>' . 'Last Activity' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['effective_last_activity'],array(
'time' => '$user.effective_last_activity'
))) . '</dd></dl>
				';
}
$__compilerVar12 .= '

				<dl><dt>' . 'Joined' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::date($user['register_date'], '') . '</dd></dl>

				<dl><dt>' . 'Messages' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</dd></dl>

				<dl><dt>' . 'Likes Received' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($user['like_count'], '0') . '</dd></dl>

				<dl><dt>' . 'Trophy Points' . ':</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $user, array()) . '" class="OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($user['trophy_points'], '0') . '</a></dd></dl>
					
				';
if ($canViewWarnings)
{
$__compilerVar12 .= '
					<dl><dt>' . 'Warning Points' . ':</dt><dd>' . XenForo_Template_Helper_Core::numberFormat($user['warning_points'], '0') . '</dd></dl>
				';
}
$__compilerVar12 .= '
					
				
';
if ($user['resource_count'] AND $canViewResources)
{
$__compilerVar12 .= '
<dl><dt>' . 'Tài nguyên' . ':</dt>
	<dd><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $user, array()) . '">' . XenForo_Template_Helper_Core::numberFormat($user['resource_count'], '0') . '</a></dd></dl>
';
}
$__compilerVar12 .= '
';
$__output .= $this->callTemplateHook('member_view_info_block', $__compilerVar12, array());
unset($__compilerVar12);
$__output .= '

			</div>
		</div>

		';
$__compilerVar13 = '';
$__output .= $this->callTemplateHook('member_view_sidebar_middle1', $__compilerVar13, array(
'user' => $user
));
unset($__compilerVar13);
$__output .= '

		';
if ($following OR $followers)
{
$__output .= '
		<div class="followBlocks">
			';
if ($following)
{
$__output .= '
				<div class="section">
					<h3 class="subHeading textWithCount" title="' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' is following ' . XenForo_Template_Helper_Core::numberFormat($followingCount, '0') . ' members.' . '">
						<span class="text">' . 'Following' . '</span>
						<a href="' . XenForo_Template_Helper_Core::link('members/following', $user, array()) . '" class="count OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($followingCount, '0') . '</a>
					</h3>
					<div class="primaryContent avatarHeap">
						<ol>
						';
foreach ($following AS $followUserId => $followUser)
{
$__output .= '
							<li>
								' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($followUser,false,array(
'user' => '$followUser',
'size' => 's',
'text' => htmlspecialchars($followUser['username'], ENT_QUOTES, 'UTF-8'),
'class' => 'Tooltip',
'title' => htmlspecialchars($followUser['username'], ENT_QUOTES, 'UTF-8'),
'itemprop' => 'contact'
),'')) . '
							</li>
						';
}
$__output .= '
						</ol>
					</div>
					';
if ($followingCount > count($following))
{
$__output .= '
						<div class="sectionFooter"><a href="' . XenForo_Template_Helper_Core::link('members/following', $user, array()) . '" class="OverlayTrigger">' . 'Show All' . '</a></div>
					';
}
$__output .= '
				</div>
			';
}
$__output .= '

			';
if ($followers)
{
$__output .= '
				<div class="section">
					<h3 class="subHeading textWithCount" title="' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' is being followed by ' . XenForo_Template_Helper_Core::numberFormat($followersCount, '0') . ' members.' . '">
						<span class="text">' . 'Followers' . '</span>
						<a href="' . XenForo_Template_Helper_Core::link('members/followers', $user, array()) . '" class="count OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($followersCount, '0') . '</a>
					</h3>
					<div class="primaryContent avatarHeap">
						<ol>
						';
foreach ($followers AS $followUserId => $followUser)
{
$__output .= '
							<li>
								' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($followUser,false,array(
'user' => '$followUser',
'size' => 's',
'text' => htmlspecialchars($followUser['username'], ENT_QUOTES, 'UTF-8'),
'class' => 'Tooltip',
'title' => htmlspecialchars($followUser['username'], ENT_QUOTES, 'UTF-8'),
'itemprop' => 'contact'
),'')) . '
							</li>
						';
}
$__output .= '
						</ol>
					</div>
					';
if ($followersCount > count($followers))
{
$__output .= '
						<div class="sectionFooter"><a href="' . XenForo_Template_Helper_Core::link('members/followers', $user, array()) . '" class="OverlayTrigger">' . 'Show All' . '</a></div>
					';
}
$__output .= '
				</div>
			';
}
$__output .= '
		</div>
		';
}
$__output .= '

		';
$__compilerVar14 = '';
$__output .= $this->callTemplateHook('member_view_sidebar_middle2', $__compilerVar14, array(
'user' => $user
));
unset($__compilerVar14);
$__output .= '

		';
$__compilerVar15 = '';
$__compilerVar15 .= '
				';
if ($user['gender'])
{
$__compilerVar15 .= '
					<dl><dt>' . 'Gender' . ':</dt>
						<dd itemprop="gender">';
if ($user['gender'] == ('male'))
{
$__compilerVar15 .= 'Male';
}
else
{
$__compilerVar15 .= 'Female';
}
$__compilerVar15 .= '</dd></dl>
				';
}
$__compilerVar15 .= '

				';
if ($birthday)
{
$__compilerVar15 .= '
					<dl><dt>' . 'Birthday' . ':</dt>
						<dd><span class="dob" itemprop="dob">' . XenForo_Template_Helper_Core::date($birthday['timeStamp'], $birthday['format']) . '</span> ';
if ($birthday['age'])
{
$__compilerVar15 .= '<span class="age">(' . 'Age' . ': ' . XenForo_Template_Helper_Core::numberFormat($birthday['age'], '0') . ')</span>';
}
$__compilerVar15 .= '</dd></dl>
				';
}
$__compilerVar15 .= '

				';
if ($user['homepage'])
{
$__compilerVar15 .= '
					<dl><dt>' . 'Home Page' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => 'x'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd></dl>
				';
}
$__compilerVar15 .= '

				';
if ($user['location'])
{
$__compilerVar15 .= '
					<dl><dt>' . 'Location' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $user['location'],
'1' => 'x'
))
)) . '" rel="nofollow" target="_blank" itemprop="address">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd></dl>
				';
}
$__compilerVar15 .= '

				';
if ($user['occupation'])
{
$__compilerVar15 .= '
					<dl><dt>' . 'Occupation' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd></dl>
				';
}
$__compilerVar15 .= '
			';
if (trim($__compilerVar15) !== '')
{
$__output .= '
		<div class="section infoBlock">
			<dl class="secondaryContent pairsJustified">
			' . $__compilerVar15 . '
			</dl>
		</div>
		';
}
unset($__compilerVar15);
$__output .= '
		
		';
if ($user['allow_view_profile'] == ('everyone'))
{
$__output .= '
			';
$__compilerVar16 = '';
$__compilerVar16 .= XenForo_Template_Helper_Core::link('canonical:members', $user, array());
$__compilerVar17 = '';
$__compilerVar18 = '';
$__compilerVar18 .= '
				';
$__compilerVar19 = '';
$__compilerVar19 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar19 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar19 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar19 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar19 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar19 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar19 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar19 .= '	
				';
$__compilerVar18 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar19, array());
unset($__compilerVar19);
$__compilerVar18 .= '		
			';
if (trim($__compilerVar18) !== '')
{
$__compilerVar17 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar17 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar18 . '
		</div>
	</div>
';
}
unset($__compilerVar18);
$__output .= $__compilerVar17;
unset($__compilerVar16, $__compilerVar17);
$__output .= '
		';
}
$__output .= '

		';
$__compilerVar20 = '';
$__output .= $this->callTemplateHook('member_view_sidebar_end', $__compilerVar20, array(
'user' => $user
));
unset($__compilerVar20);
$__output .= '
		
		';
$__compilerVar21 = '';
$__compilerVar22 = '';
$__compilerVar21 .= $this->callTemplateHook('ad_member_view_sidebar_bottom', $__compilerVar22, array());
unset($__compilerVar22);
$__output .= $__compilerVar21;
unset($__compilerVar21);
$__output .= '

	</div>

	<div class="mainProfileColumn">

		<div class="section primaryUserBlock">
			<div class="mainText secondaryContent">
				<div class="followBlock">
					';
$__compilerVar23 = '';
$__compilerVar23 .= '
						';
$__compilerVar24 = '';
$__compilerVar24 .= '
										';
if ($canWarn)
{
$__compilerVar24 .= '
											<li><a href="' . XenForo_Template_Helper_Core::link('members/warn', $user, array()) . '">' . 'Warn' . '</a></li>
										';
}
$__compilerVar24 .= '
										';
if ($canCleanSpam)
{
$__compilerVar24 .= '
											<li><a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $user, array(
'noredirect' => '1'
)) . '" class="deleteSpam OverlayTrigger">' . 'Spam' . '</a></li>
										';
}
$__compilerVar24 .= '
										';
if ($canViewIps)
{
$__compilerVar24 .= '
											<li><a href="' . XenForo_Template_Helper_Core::link('members/shared-ips', $user, array()) . '" class="OverlayTrigger">' . 'Shared IPs' . '</a></li>
										';
}
$__compilerVar24 .= '
										';
if ($canBanUsers)
{
$__compilerVar24 .= '
											';
if ($user['is_banned'])
{
$__compilerVar24 .= '
												<li><a href="' . XenForo_Template_Helper_Core::adminLink('banning/users/lift', $user, array()) . '">' . 'Lift Ban' . '</a></li>
											';
}
else
{
$__compilerVar24 .= '
												<li><a href="' . XenForo_Template_Helper_Core::adminLink('banning/users/add', $user, array()) . '">' . 'Ban' . '</a></li>
											';
}
$__compilerVar24 .= '
										';
}
$__compilerVar24 .= '
										';
if ($canEditUser)
{
$__compilerVar24 .= '
											<li><a href="' . XenForo_Template_Helper_Core::link('members/edit', $user, array()) . '">' . 'Edit' . '</a></li>
										';
}
$__compilerVar24 .= '
									';
if (trim($__compilerVar24) !== '')
{
$__compilerVar23 .= '
							<li><div class="Popup moderatorToolsPopup">
								<a rel="Menu">' . 'Moderator Tools' . '</a>
								<div class="Menu">
									<div class="primaryContent menuHeader"><h3>' . 'Moderator Tools' . '</h3></div>
									<ul class="secondaryContent blockLinksList">
									' . $__compilerVar24 . '
									</ul>
								</div>
							</div></li>
						';
}
unset($__compilerVar24);
$__compilerVar23 .= '

						' . XenForo_Template_Helper_Core::callHelper('followhtml', array($user,array(
'user' => '$user',
'title' => '',
'tag' => 'li'
))) . '
						';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $user['user_id']
)))
{
$__compilerVar23 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('members/unignore', $user, array()) . '" class="FollowLink">' . 'Unignore' . '</a></li>
						';
}
else if ($canIgnore)
{
$__compilerVar23 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('members/ignore', $user, array()) . '" class="FollowLink">' . 'Ignore' . '</a></li>
						';
}
$__compilerVar23 .= '
						';
if ($canReport)
{
$__compilerVar23 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('members/report', $user, array()) . '" class="OverlayTrigger">' . 'Report' . '</a></li>
						';
}
$__compilerVar23 .= '
						';
if (trim($__compilerVar23) !== '')
{
$__output .= '
					<ul>
						' . $__compilerVar23 . '
					</ul>
					';
}
unset($__compilerVar23);
$__output .= '
					';
if ($visitor['user_id'] AND $user['user_id'] != $visitor['user_id'])
{
$__output .= '
						<div class="muted">
							';
if ($user['isFollowingVisitor'])
{
$__output .= '
								' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' is following you' . '
							';
}
else
{
$__output .= '
								' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' is not following you' . '
							';
}
$__output .= '
						</div>
					';
}
$__output .= '
				</div>

				<h1 itemprop="name" class="username">' . XenForo_Template_Helper_Core::callHelper('richUserName', array(
'0' => $user
)) . '</h1>

				<p class="userBlurb">
					' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $user
)) . '
				</p>
				';
$__compilerVar25 = '';
$__compilerVar25 .= XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $user
));
if (trim($__compilerVar25) !== '')
{
$__output .= '
					<div class="userBanners">
						' . $__compilerVar25 . '
					</div>
				';
}
unset($__compilerVar25);
$__output .= '

				';
if ($user['status'])
{
$__output .= '<p class="userStatus" id="UserStatus">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $user['status']
)) . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['status_date'],array(
'time' => '$user.status_date'
))) . '</p>';
}
$__output .= '

				';
if ($canViewOnlineStatus)
{
$__output .= '
					<dl class="pairsInline lastActivity">
						<dt>' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' was last seen' . ':</dt>
						<dd>
							';
if ($user['activity'] AND $canViewCurrentActivity)
{
$__output .= '
								';
if ($user['activity']['description'])
{
$__output .= '
									' . htmlspecialchars($user['activity']['description'], ENT_QUOTES, 'UTF-8');
if ($user['activity']['itemTitle'])
{
$__output .= ' <em><a href="' . htmlspecialchars($user['activity']['itemUrl'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($user['activity']['itemTitle'], ENT_QUOTES, 'UTF-8') . '</a></em>';
}
$__output .= ',
								';
}
else
{
$__output .= '
									' . 'Viewing unknown page' . ',
								';
}
$__output .= '
								' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['effective_last_activity'],array(
'time' => htmlspecialchars($user['effective_last_activity'], ENT_QUOTES, 'UTF-8'),
'class' => 'muted'
))) . '
							';
}
else
{
$__output .= '
								' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['effective_last_activity'],array(
'time' => htmlspecialchars($user['effective_last_activity'], ENT_QUOTES, 'UTF-8')
))) . '
							';
}
$__output .= '
						</dd>
					</dl>
				';
}
$__output .= '
			</div>
			
			<ul class="tabs mainTabs Tabs" data-panes="#ProfilePanes > li" data-history="on">
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#profilePosts">' . 'Profile Posts' . '</a></li>
				';
if ($showRecentActivity)
{
$__output .= '<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#recentActivity">' . 'Recent Activity' . '</a></li>';
}
$__output .= '
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#postings">' . 'Postings' . '</a></li>
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#info">' . 'Information' . '</a></li>
				';
if ($warningCount)
{
$__output .= '<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#warnings">' . 'Warnings' . ' (' . XenForo_Template_Helper_Core::numberFormat($warningCount, '0') . ')</a></li>';
}
$__output .= '
				';
if ($user['resource_count'] AND $canViewResources)
{
$__output .= '
<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#resources">' . 'Tài nguyên' . '</a></li>
';
}
$__output .= '
';
if ($canViewAnalytics)
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '#analytics">' . 'Analytics' . '</a></li>';
}
$__output .= '
';
$__compilerVar26 = '';
$__output .= $this->callTemplateHook('member_view_tabs_heading', $__compilerVar26, array(
'user' => $user
));
unset($__compilerVar26);
$__output .= '
			</ul>
		</div>

		<ul id="ProfilePanes">
			<li id="profilePosts" class="profileContent">

			';
if ($canViewProfilePosts)
{
$__output .= '
				';
$this->addRequiredExternal('css', 'message_simple');
$__output .= '

				';
if ($canPostOnProfile)
{
$__output .= '
					<form action="' . XenForo_Template_Helper_Core::link('members/post', $user, array()) . '" method="post"
						class="messageSimple profilePoster AutoValidator primaryContent" id="ProfilePoster"
						data-optInOut="optIn">
						' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true'
),'')) . '
						<div class="messageInfo">
							';
if ($visitor['user_id'] == $user['user_id'])
{
$__output .= '
								<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Update your status' . '..." rows="3" cols="50" data-statusEditorCounter="#statusEditorCounter"></textarea>
							';
}
else
{
$__output .= '
								<textarea name="message" class="textCtrl UserTagger Elastic" placeholder="' . 'Write something' . '..." rows="3" cols="50"></textarea>
							';
}
$__output .= '
							<div class="submitUnit">
								<span id="statusEditorCounter" title="' . 'Characters remaining' . '"></span>
								<input type="submit" class="button primary" value="' . 'Post' . '" accesskey="s" />
								<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
							</div>
						</div>
					</form>
				';
}
$__output .= '
				
				';
$__compilerVar27 = '';
$__compilerVar28 = '';
$__compilerVar27 .= $this->callTemplateHook('ad_member_view_above_messages', $__compilerVar28, array());
unset($__compilerVar28);
$__output .= $__compilerVar27;
unset($__compilerVar27);
$__output .= '

				<form action="' . XenForo_Template_Helper_Core::link('inline-mod/profile-post/switch', false, array()) . '" method="post"
					class="InlineModForm section"
					data-cookieName="profilePosts"
					data-controls="#InlineModControls"
					data-imodOptions="#ModerationSelect option">

					<ol class="messageSimpleList" id="ProfilePostList">
						';
if ($profilePosts)
{
$__output .= '
							';
foreach ($profilePosts AS $profilePost)
{
$__output .= '
								';
if ($profilePost['isDeleted'])
{
$__output .= '
									';
$__compilerVar29 = '';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar29 .= '

';
$__compilerVar30 = '';
$__compilerVar30 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar31 = '';
$__compilerVar31 .= '
		';
if ($profilePost['canInlineMod'])
{
$__compilerVar31 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar31 .= '
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date',
'class' => 'muted item'
))) . '
		<a href="' . XenForo_Template_Helper_Core::link('profile-posts/show', $profilePost, array()) . '" class="MessageLoader control item show" data-messageSelector="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>
	';
$__compilerVar32 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar32 .= '

<li id="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '" class="messageSimple deleted placeholder ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '">

	<div class="placeholderContent secondaryContent">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
				
		<p>
			' . 'This message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost
)) . ' has been removed from public view.' . '
			';
if ($profilePost['delete_username'])
{
$__compilerVar32 .= '
				' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['delete_date'],array(
'time' => htmlspecialchars($profilePost['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($profilePost['delete_reason'])
{
$__compilerVar32 .= ', ' . 'Reason' . ': ' . htmlspecialchars($profilePost['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar32 .= '.
			';
}
$__compilerVar32 .= '
		</p>
		<div class="privateControls">' . $__compilerVar31 . '</div>
		
	</div>

</li>';
$__compilerVar29 .= $__compilerVar32;
unset($__compilerVar30, $__compilerVar31, $__compilerVar32);
$__output .= $__compilerVar29;
unset($__compilerVar29);
$__output .= '
								';
}
else
{
$__output .= '
									';
$__compilerVar33 = '';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__compilerVar33 .= '

';
if ($showReceiverName)
{
$__compilerVar33 .= '
	';
$messagePosterHtml = '';
$messagePosterHtml .= '
		<span class="poster">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array())) . '
			';
if ($profilePost['user_id'] != $profilePost['profile_user_id'] AND $profilePost['profileUser'])
{
$messagePosterHtml .= '
				<span class="muted">' . (($pageIsRtl) ? ('&#9668;') : ('&#9658;')) . '</span> ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost['profileUser'],'',(true),array())) . '
			';
}
$messagePosterHtml .= '
		</span>
	';
$__compilerVar33 .= '
';
}
else
{
$__compilerVar33 .= '
	';
$messagePosterHtml = '';
$__compilerVar33 .= '
';
}
$__compilerVar33 .= '

';
$__compilerVar34 = '';
$__compilerVar34 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar35 = '';
$__compilerVar35 .= '

		<div class="messageMeta">
				<div class="privateControls">
					';
if ($profilePost['canInlineMod'])
{
$__compilerVar35 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar35 .= '
					<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
					';
$__compilerVar36 = '';
$__compilerVar36 .= '
					';
if ($profilePost['canEdit'])
{
$__compilerVar36 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/edit', $profilePost, array()) . '" class="OverlayTrigger item control edit"><span></span>' . 'Edit' . '</a>
					';
}
$__compilerVar36 .= '
					';
if ($profilePost['canDelete'])
{
$__compilerVar36 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/delete', $profilePost, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Delete' . '</a>
					';
}
$__compilerVar36 .= '
					';
if ($profilePost['canCleanSpam'])
{
$__compilerVar36 .= '
						<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $profilePost, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a
					>';
}
$__compilerVar36 .= '
					';
if ($canViewIps AND $profilePost['ip_id'])
{
$__compilerVar36 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/ip', $profilePost, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
					';
}
$__compilerVar36 .= '
					
					';
if ($profilePost['canWarn'])
{
$__compilerVar36 .= '
						<a href="' . XenForo_Template_Helper_Core::link('members/warn', $profilePost, array(
'content_type' => 'profile_post',
'content_id' => $profilePost['profile_post_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
					';
}
else if ($profilePost['warning_id'] && $canViewWarnings)
{
$__compilerVar36 .= '
						<a href="' . XenForo_Template_Helper_Core::link('warnings', $profilePost, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
					';
}
$__compilerVar36 .= '
					';
if ($profilePost['canReport'])
{
$__compilerVar36 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/report', $profilePost, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
					';
}
$__compilerVar36 .= '
					
					';
$__compilerVar35 .= $this->callTemplateHook('profile_post_private_controls', $__compilerVar36, array(
'profilePost' => $profilePost
));
unset($__compilerVar36);
$__compilerVar35 .= '
				</div>
			';
$__compilerVar37 = '';
$__compilerVar37 .= '
					';
$__compilerVar38 = '';
$__compilerVar38 .= '
					';
if ($profilePost['canLike'])
{
$__compilerVar38 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/like', $profilePost, array()) . '" class="LikeLink item control ' . (($profilePost['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($profilePost['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
					';
}
$__compilerVar38 .= '
					';
if ($profilePost['canComment'])
{
$__compilerVar38 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment', $profilePost, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Comment' . '</a>
					';
}
$__compilerVar38 .= '
					';
$__compilerVar37 .= $this->callTemplateHook('profile_post_public_controls', $__compilerVar38, array(
'profilePost' => $profilePost
));
unset($__compilerVar38);
$__compilerVar37 .= '
				';
if (trim($__compilerVar37) !== '')
{
$__compilerVar35 .= '
				<div class="publicControls">
				' . $__compilerVar37 . '
				</div>
			';
}
unset($__compilerVar37);
$__compilerVar35 .= '
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '">
				';
if ($profilePost['likes'])
{
$__compilerVar35 .= '
					';
$__compilerVar39 = '';
$__compilerVar39 .= XenForo_Template_Helper_Core::link('profile-posts/likes', $profilePost, array());
$__compilerVar40 = '';
if ($profilePost['likes'])
{
$__compilerVar40 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar40 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($profilePost['likes'],$__compilerVar39,$profilePost['like_date'],$profilePost['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar35 .= $__compilerVar40;
unset($__compilerVar39, $__compilerVar40);
$__compilerVar35 .= '
				';
}
$__compilerVar35 .= '
			</li>

			';
if ($profilePost['comments'])
{
$__compilerVar35 .= '

				';
if ($profilePost['comment_count'] > 3)
{
$__compilerVar35 .= '
					<li class="commentMore secondaryContent">
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comments', $profilePost, array()) . '"
							class="CommentLoader"
							data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $profilePost['first_shown_comment_date']
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '...</a>
					</li>
				';
}
$__compilerVar35 .= '

				';
foreach ($profilePost['comments'] AS $comment)
{
$__compilerVar35 .= '
					';
$__compilerVar41 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar41 .= '

<li class="comment secondaryContent ' . (($comment['isIgnored']) ? ('ignored') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="commentInfo">
		<div class="commentContent">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($comment,'',(true),array(
'class' => 'poster'
))) . '
			<article><blockquote>' . XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $comment['message']
)) . '</blockquote></article>
		</div>
		<div class="commentControls">
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date',
'class' => 'muted'
))) . '
			';
if ($comment['canDelete'])
{
$__compilerVar41 .= '<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment-delete', $profilePost, array(
'comment' => $comment['profile_post_comment_id']
)) . '" class="OverlayTrigger item control delete"><span></span>' . 'Delete' . '</a>';
}
$__compilerVar41 .= '
		</div>
	</div>
</li>';
$__compilerVar35 .= $__compilerVar41;
unset($__compilerVar41);
$__compilerVar35 .= '
				';
}
$__compilerVar35 .= '

			';
}
$__compilerVar35 .= '

			';
if ($profilePost['canComment'])
{
$__compilerVar35 .= '
				<li id="commentSubmit-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent" style="display:none">
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true'
),'')) . '
					<div class="elements">
						<textarea name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input type="submit" class="button primary" value="' . 'Post Comment' . '" /></div>
					</div>
				</li>
			';
}
$__compilerVar35 .= '

		</ol>

	';
$__compilerVar42 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar42 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar42 .= '

<li id="' . htmlspecialchars($__compilerVar34, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($profilePost['isDeleted']) ? ('deleted') : ('')) . ' ' . (($profilePost['is_staff']) ? ('staff') : ('')) . ' ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		';
$__compilerVar43 = '';
$__compilerVar43 .= '
					';
$__compilerVar44 = '';
$__compilerVar44 .= '
						';
if ($profilePost['warning_message'])
{
$__compilerVar44 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($profilePost['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar44 .= '
						';
if ($profilePost['isDeleted'])
{
$__compilerVar44 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($profilePost['isModerated'])
{
$__compilerVar44 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar44 .= '
						';
if ($profilePost['isIgnored'])
{
$__compilerVar44 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar44 .= '
					';
$__compilerVar43 .= $this->callTemplateHook('message_simple_notices', $__compilerVar44, array(
'message' => $profilePost
));
unset($__compilerVar44);
$__compilerVar43 .= '
				';
if (trim($__compilerVar43) !== '')
{
$__compilerVar42 .= '
			<ul class="messageNotices">
				' . $__compilerVar43 . '
			</ul>
		';
}
unset($__compilerVar43);
$__compilerVar42 .= '

		<div class="messageContent">
			';
if ($messagePosterHtml)
{
$__compilerVar42 .= '
				' . $messagePosterHtml . '
			';
}
else
{
$__compilerVar42 .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array(
'class' => 'poster'
))) . '
			';
}
$__compilerVar42 .= '
			<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
		</div>

		' . $__compilerVar35 . '
	</div>
</li>';
$__compilerVar33 .= $__compilerVar42;
unset($__compilerVar34, $__compilerVar35, $__compilerVar42);
$__compilerVar33 .= '
' . '
';
$__output .= $__compilerVar33;
unset($__compilerVar33);
$__output .= '
								';
}
$__output .= '
							';
}
$__output .= '
						';
}
else
{
$__output .= '
							<li id="NoProfilePosts">' . 'There are no messages on ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s profile yet.' . '</li>
						';
}
$__output .= '
					</ol>

					';
if ($inlineModOptions)
{
$__output .= '
						<div class="sectionFooter InlineMod Hide">
							<label for="ModerationSelect">' . 'Perform action with selected posts' . '...</label>

							';
$__compilerVar45 = '';
$__compilerVar46 = '';
$__compilerVar46 .= 'Post Moderation';
$__compilerVar47 = '';
$__compilerVar47 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar47 .= '<option value="delete">' . 'Delete Posts' . '</option>';
}
$__compilerVar47 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar47 .= '<option value="undelete">' . 'Undelete Posts' . '</option>';
}
$__compilerVar47 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar47 .= '<option value="approve">' . 'Approve Posts' . '</option>';
}
$__compilerVar47 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar47 .= '<option value="unapprove">' . 'Unapprove Posts' . '</option>';
}
$__compilerVar47 .= '
		<option value="deselect">' . 'Deselect Posts' . '</option>
	';
$__compilerVar48 = '';
$__compilerVar48 .= 'Select / deselect all posts on this page';
$__compilerVar49 = '';
$__compilerVar49 .= 'Selected Posts';
$__compilerVar50 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar50 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar50 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar48, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar49, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar50 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar50 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar50 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar50 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar47 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar45 .= $__compilerVar50;
unset($__compilerVar46, $__compilerVar47, $__compilerVar48, $__compilerVar49, $__compilerVar50);
$__output .= $__compilerVar45;
unset($__compilerVar45);
$__output .= '
						</div>
					';
}
$__output .= '

					<div class="pageNavLinkGroup">
						<div class="linkGroup SelectionCountContainer"></div>
						<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>
						' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($profilePostsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalProfilePosts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'members', $user, array(), false, array())) . '
					</div>

					<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				</form>

			';
}
else
{
$__output .= '
				<div id="NoProfilePosts">' . 'There are no messages on ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s profile yet.' . '</div>
			';
}
$__output .= '

			</li>

			';
if ($showRecentActivity)
{
$__output .= '
			<li id="recentActivity" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/recent-activity', $user, array()) . '">
				<span class="JsOnly">' . 'Loading' . '...</span>
				<noscript><a href="' . XenForo_Template_Helper_Core::link('members/recent-activity', $user, array()) . '">' . 'View' . '</a></noscript>
			</li>
			';
}
$__output .= '

			<li id="postings" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/recent-content', $user, array()) . '">
				<span class="JsOnly">' . 'Loading' . '...</span>
				<noscript><a href="' . XenForo_Template_Helper_Core::link('members/recent-content', $user, array()) . '">' . 'View' . '</a></noscript>
			</li>

			<li id="info" class="profileContent">

				';
$__compilerVar51 = '';
$__compilerVar51 .= '
								';
$__compilerVar52 = '';
$__compilerVar52 .= '
										';
if ($user['gender'])
{
$__compilerVar52 .= '
											<dl><dt>' . 'Gender' . ':</dt> <dd>';
if ($user['gender'] == ('male'))
{
$__compilerVar52 .= 'Male';
}
else
{
$__compilerVar52 .= 'Female';
}
$__compilerVar52 .= '</dd></dl>
										';
}
$__compilerVar52 .= '

										';
if ($birthday)
{
$__compilerVar52 .= '
											<dl><dt>' . 'Birthday' . ':</dt> <dd>' . XenForo_Template_Helper_Core::date($birthday['timeStamp'], $birthday['format']) . ' ';
if ($birthday['age'])
{
$__compilerVar52 .= '(' . 'Age' . ': ' . XenForo_Template_Helper_Core::numberFormat($birthday['age'], '0') . ')';
}
$__compilerVar52 .= '</dd></dl>
										';
}
$__compilerVar52 .= '

										';
if ($user['homepage'])
{
$__compilerVar52 .= '
											<dl><dt>' . 'Home Page' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => 'x'
)) . '" rel="nofollow" target="_blank">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd></dl>
										';
}
$__compilerVar52 .= '

										';
if ($user['location'])
{
$__compilerVar52 .= '
											<dl><dt>' . 'Location' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $user['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd></dl>
										';
}
$__compilerVar52 .= '

										';
if ($user['occupation'])
{
$__compilerVar52 .= '
											<dl><dt>' . 'Occupation' . ':</dt> <dd>' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd></dl>
										';
}
$__compilerVar52 .= '
										
										';
if ($customFieldsGrouped['personal'])
{
$__compilerVar52 .= '
											';
foreach ($customFieldsGrouped['personal'] AS $field)
{
$__compilerVar52 .= '
												';
$__compilerVar53 = '';
$__compilerVar54 = '';
$__compilerVar54 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar54 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar54 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar54 .= '
				</ul>
			';
}
else
{
$__compilerVar54 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar54 .= '
		';
if (trim($__compilerVar54) !== '')
{
$__compilerVar53 .= '
	<dl>
		<dt>' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar54 . '</dd>
	</dl>
';
}
unset($__compilerVar54);
$__compilerVar52 .= $__compilerVar53;
unset($__compilerVar53);
$__compilerVar52 .= '
											';
}
$__compilerVar52 .= '
										';
}
$__compilerVar52 .= '
									';
if (trim($__compilerVar52) !== '')
{
$__compilerVar51 .= '
									<div class="pairsColumns aboutPairs">
									' . $__compilerVar52 . '
									</div>
								';
}
unset($__compilerVar52);
$__compilerVar51 .= '

								';
if ($user['about'])
{
$__compilerVar51 .= '<div class="baseHtml ugc">' . $user['aboutHtml'] . '</div>';
}
$__compilerVar51 .= '
							';
if (trim($__compilerVar51) !== '')
{
$__output .= '
					<div class="section">
						<h3 class="textHeading">' . 'About' . '</h3>

						<div class="primaryContent">
							' . $__compilerVar51 . '
						</div>
					</div>
				';
}
unset($__compilerVar51);
$__output .= '

				<div class="section">
					<h3 class="textHeading">' . 'Interact' . '</h3>

					<div class="primaryContent">
						<div class="pairsColumns contactInfo">
							<dl>
								<dt>' . 'Content' . ':</dt>
								<dd><ul>
									';
$__compilerVar55 = '';
$__compilerVar55 .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $user['user_id']
)) . '" rel="nofollow">' . 'Find all content by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '</a></li>
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $user['user_id'],
'content' => 'thread'
)) . '" rel="nofollow">' . 'Find all threads by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '</a></li>
									';
$__output .= $this->callTemplateHook('member_view_search_content_types', $__compilerVar55, array());
unset($__compilerVar55);
$__output .= '
								</ul></dd>
							</dl>
							';
if ($canStartConversation)
{
$__output .= '
								<dl><dt>' . 'Conversation' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('conversations/add', '', array(
'to' => $user['username']
)) . '">' . 'Start a Conversation' . '</a></dd></dl>
							';
}
$__output .= '
							';
if ($customFieldsGrouped['contact'])
{
$__output .= '
								';
foreach ($customFieldsGrouped['contact'] AS $field)
{
$__output .= '
									';
$__compilerVar56 = '';
$__compilerVar57 = '';
$__compilerVar57 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar57 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar57 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar57 .= '
				</ul>
			';
}
else
{
$__compilerVar57 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar57 .= '
		';
if (trim($__compilerVar57) !== '')
{
$__compilerVar56 .= '
	<dl>
		<dt>' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar57 . '</dd>
	</dl>
';
}
unset($__compilerVar57);
$__output .= $__compilerVar56;
unset($__compilerVar56);
$__output .= '
								';
}
$__output .= '
							';
}
$__output .= '
						</div>
					</div>
				</div>
				
				';
if ($user['signature'])
{
$__output .= '
					<div class="section">
						<h3 class="textHeading">' . 'Signature' . '</h3>
						<div class="primaryContent">
							<div class="baseHtml signature ugc">' . $user['signatureHtml'] . '</div>
						</div>
					</div>
				';
}
$__output .= '

			</li>
			
			';
if ($warningCount)
{
$__output .= '
				<li id="warnings" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/warnings', $user, array()) . '">
					' . 'Loading' . '...
					<noscript><a href="' . XenForo_Template_Helper_Core::link('members/warnings', $user, array()) . '">' . 'View' . '</a></noscript>
				</li>
			';
}
$__output .= '
			
			';
if ($user['resource_count'] AND $canViewResources)
{
$__output .= '
<li id="resources" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('resources/authors', $user, array(
'profile' => '1'
)) . '">
	<span class="jsOnly">' . 'Loading' . '...</span>
	<noscript><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $user, array()) . '">' . 'View' . '</a></noscript>
</li>
';
}
$__output .= '

';
if ($canViewAnalytics)
{
$__output .= '<li id="analytics" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/analytics', $user, array()) . '">
	' . 'Loading' . '...
';
$this->addRequiredExternal('css', 'better_analytics');
$__output .= '
';
$this->addRequiredExternal('js', '//www.google.com/jsapi?autoload=%7B%0A%27modules%27%3A%5B%7B%0A%27name%27%3A%27visualization%27%2C%0A%27version%27%3A%271%27%2C%0A%27packages%27%3A%5B%27corechart%27%5D%0A%7D%5D%0A%7D');
$__output .= '
	<noscript><a href="' . XenForo_Template_Helper_Core::link('members/analytics', $user, array()) . '">' . 'View' . '</a></noscript>
</li>';
}
$__output .= '
';
$__compilerVar58 = '';
$__output .= $this->callTemplateHook('member_view_tabs_content', $__compilerVar58, array(
'user' => $user
));
unset($__compilerVar58);
$__output .= '
		</ul>
	</div>

</div>';
