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
$__compilerVar59 = '';
$__compilerVar59 .= XenForo_Template_Helper_Core::link('canonical:members', $user, array());
$__compilerVar60 = '';
$__compilerVar60 .= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__compilerVar61 = '';
$__compilerVar61 .= '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' is a ' . XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
))
)) . ' at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '';
$__compilerVar62 = '';
$__compilerVar62 .= XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'm',
'2' => '',
'3' => 'true'
));
$__compilerVar63 = '';
$__compilerVar63 .= 'profile';
$__compilerVar64 = '';
$__compilerVar64 .= '
		<meta property="profile:username" content="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" />
		';
if ($user['gender'])
{
$__compilerVar64 .= '<meta property="profile:gender" content="' . htmlspecialchars($user['gender'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar64 .= '
	';
$__compilerVar65 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar65 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($__compilerVar62)
{
$__compilerVar65 .= '<meta property="og:image" content="' . htmlspecialchars($__compilerVar62, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar65 .= '
	<meta property="og:image" content="';
$__compilerVar66 = '';
$__compilerVar66 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar65 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar66, array());
unset($__compilerVar66);
$__compilerVar65 .= '" />
	<meta property="og:type" content="' . (($__compilerVar63) ? (htmlspecialchars($__compilerVar63, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar59 . '" />
	<meta property="og:title" content="' . $__compilerVar60 . '" />
	';
if ($__compilerVar61)
{
$__compilerVar65 .= '<meta property="og:description" content="' . $__compilerVar61 . '" />';
}
$__compilerVar65 .= '
	' . $__compilerVar64 . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar65 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar65 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar65 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar65 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar65;
unset($__compilerVar59, $__compilerVar60, $__compilerVar61, $__compilerVar62, $__compilerVar63, $__compilerVar64, $__compilerVar65);
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
$__compilerVar67 = '';
$__compilerVar68 = '';
$__compilerVar67 .= $this->callTemplateHook('ad_member_view_below_avatar', $__compilerVar68, array());
unset($__compilerVar68);
$__output .= $__compilerVar67;
unset($__compilerVar67);
$__output .= '

		';
$__compilerVar69 = '';
$__output .= $this->callTemplateHook('member_view_sidebar_start', $__compilerVar69, array(
'user' => $user
));
unset($__compilerVar69);
$__output .= '

		<div class="section infoBlock">
			<div class="secondaryContent pairsJustified">

				';
$__compilerVar70 = '';
$__compilerVar70 .= '
				
				';
if ($canViewOnlineStatus)
{
$__compilerVar70 .= '
					<dl><dt>' . 'Hoạt động cuối' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['effective_last_activity'],array(
'time' => '$user.effective_last_activity'
))) . '</dd></dl>
				';
}
$__compilerVar70 .= '

				<dl><dt>' . 'Tham gia ngày' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::date($user['register_date'], '') . '</dd></dl>

				<dl><dt>' . 'Bài viết' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</dd></dl>

				<dl><dt>' . 'Đã được thích' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($user['like_count'], '0') . '</dd></dl>

				<dl><dt>' . 'Điểm thành tích' . ':</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $user, array()) . '" class="OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($user['trophy_points'], '0') . '</a></dd></dl>
					
				';
if ($canViewWarnings)
{
$__compilerVar70 .= '
					<dl><dt>' . 'Điểm cảnh cáo' . ':</dt><dd>' . XenForo_Template_Helper_Core::numberFormat($user['warning_points'], '0') . '</dd></dl>
				';
}
$__compilerVar70 .= '
					
				
';
if ($user['resource_count'] AND $canViewResources)
{
$__compilerVar70 .= '
<dl><dt>' . 'Tài nguyên' . ':</dt>
	<dd><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $user, array()) . '">' . XenForo_Template_Helper_Core::numberFormat($user['resource_count'], '0') . '</a></dd></dl>
';
}
$__compilerVar70 .= '
';
$__output .= $this->callTemplateHook('member_view_info_block', $__compilerVar70, array());
unset($__compilerVar70);
$__output .= '

			</div>
		</div>

		';
$__compilerVar71 = '';
$__output .= $this->callTemplateHook('member_view_sidebar_middle1', $__compilerVar71, array(
'user' => $user
));
unset($__compilerVar71);
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
					<h3 class="subHeading textWithCount" title="' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' đang theo dõi ' . XenForo_Template_Helper_Core::numberFormat($followingCount, '0') . ' thành viên.' . '">
						<span class="text">' . 'Đang theo dõi' . '</span>
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
						<div class="sectionFooter"><a href="' . XenForo_Template_Helper_Core::link('members/following', $user, array()) . '" class="OverlayTrigger">' . 'Xem tất cả' . '</a></div>
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
					<h3 class="subHeading textWithCount" title="' . '' . XenForo_Template_Helper_Core::numberFormat($followersCount, '0') . ' thành viên đang theo dõi ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '.' . '">
						<span class="text">' . 'Người theo dõi' . '</span>
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
						<div class="sectionFooter"><a href="' . XenForo_Template_Helper_Core::link('members/followers', $user, array()) . '" class="OverlayTrigger">' . 'Xem tất cả' . '</a></div>
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
$__compilerVar72 = '';
$__output .= $this->callTemplateHook('member_view_sidebar_middle2', $__compilerVar72, array(
'user' => $user
));
unset($__compilerVar72);
$__output .= '

		';
$__compilerVar73 = '';
$__compilerVar73 .= '
				';
if ($user['gender'])
{
$__compilerVar73 .= '
					<dl><dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($user['gender'] == ('male'))
{
$__compilerVar73 .= 'Nam';
}
else
{
$__compilerVar73 .= 'Nữ';
}
$__compilerVar73 .= '</dd></dl>
				';
}
$__compilerVar73 .= '

				';
if ($birthday)
{
$__compilerVar73 .= '
					<dl><dt>' . 'Sinh nhật' . ':</dt>
						<dd><span class="dob" itemprop="dob">' . XenForo_Template_Helper_Core::date($birthday['timeStamp'], $birthday['format']) . '</span> ';
if ($birthday['age'])
{
$__compilerVar73 .= '<span class="age">(' . 'Tuổi' . ': ' . XenForo_Template_Helper_Core::numberFormat($birthday['age'], '0') . ')</span>';
}
$__compilerVar73 .= '</dd></dl>
				';
}
$__compilerVar73 .= '

				';
if ($user['homepage'])
{
$__compilerVar73 .= '
					<dl><dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => 'x'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd></dl>
				';
}
$__compilerVar73 .= '

				';
if ($user['location'])
{
$__compilerVar73 .= '
					<dl><dt>' . 'Nơi ở' . ':</dt>
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
$__compilerVar73 .= '

				';
if ($user['occupation'])
{
$__compilerVar73 .= '
					<dl><dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd></dl>
				';
}
$__compilerVar73 .= '
			';
if (trim($__compilerVar73) !== '')
{
$__output .= '
		<div class="section infoBlock">
			<dl class="secondaryContent pairsJustified">
			' . $__compilerVar73 . '
			</dl>
		</div>
		';
}
unset($__compilerVar73);
$__output .= '
		
		';
if ($user['allow_view_profile'] == ('everyone'))
{
$__output .= '
			';
$__compilerVar74 = '';
$__compilerVar74 .= XenForo_Template_Helper_Core::link('canonical:members', $user, array());
$__compilerVar75 = '';
$__compilerVar75 .= '<!--';
$__compilerVar76 = '';
$__compilerVar76 .= '
				';
$__compilerVar77 = '';
$__compilerVar77 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar77 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar77 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar77 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar77 .= '
						<fb:like href="' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar77 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar77 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar77 .= '	
				';
$__compilerVar76 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar77, array());
unset($__compilerVar77);
$__compilerVar76 .= '		
			';
if (trim($__compilerVar76) !== '')
{
$__compilerVar75 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar75 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar76 . '
		</div>
	</div>
';
}
unset($__compilerVar76);
$__compilerVar75 .= '-->';
$__output .= $__compilerVar75;
unset($__compilerVar74, $__compilerVar75);
$__output .= '
		';
}
$__output .= '

		';
$__compilerVar78 = '';
$__output .= $this->callTemplateHook('member_view_sidebar_end', $__compilerVar78, array(
'user' => $user
));
unset($__compilerVar78);
$__output .= '
		
		';
$__compilerVar79 = '';
$__compilerVar80 = '';
$__compilerVar79 .= $this->callTemplateHook('ad_member_view_sidebar_bottom', $__compilerVar80, array());
unset($__compilerVar80);
$__output .= $__compilerVar79;
unset($__compilerVar79);
$__output .= '

	</div>

	<div class="mainProfileColumn">

		<div class="section primaryUserBlock">
			<div class="mainText secondaryContent">
				<div class="followBlock">
					';
$__compilerVar81 = '';
$__compilerVar81 .= '
						';
$__compilerVar82 = '';
$__compilerVar82 .= '
										';
if ($canWarn)
{
$__compilerVar82 .= '
											<li><a href="' . XenForo_Template_Helper_Core::link('members/warn', $user, array()) . '">' . 'Cảnh cáo' . '</a></li>
										';
}
$__compilerVar82 .= '
										';
if ($canCleanSpam)
{
$__compilerVar82 .= '
											<li><a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $user, array(
'noredirect' => '1'
)) . '" class="deleteSpam OverlayTrigger">' . 'Spam' . '</a></li>
										';
}
$__compilerVar82 .= '
										';
if ($canViewIps)
{
$__compilerVar82 .= '
											<li><a href="' . XenForo_Template_Helper_Core::link('members/shared-ips', $user, array()) . '" class="OverlayTrigger">' . 'Chia sẻ IPs' . '</a></li>
										';
}
$__compilerVar82 .= '
										';
if ($canBanUsers)
{
$__compilerVar82 .= '
											';
if ($user['is_banned'])
{
$__compilerVar82 .= '
												<li><a href="' . XenForo_Template_Helper_Core::adminLink('banning/users/lift', $user, array()) . '">' . 'Lift Ban' . '</a></li>
											';
}
else
{
$__compilerVar82 .= '
												<li><a href="' . XenForo_Template_Helper_Core::adminLink('banning/users/add', $user, array()) . '">' . 'Ban' . '</a></li>
											';
}
$__compilerVar82 .= '
										';
}
$__compilerVar82 .= '
										';
if ($canEditUser)
{
$__compilerVar82 .= '
											<li><a href="' . XenForo_Template_Helper_Core::link('members/edit', $user, array()) . '">' . 'Sửa' . '</a></li>
										';
}
$__compilerVar82 .= '
									';
if (trim($__compilerVar82) !== '')
{
$__compilerVar81 .= '
							<li><div class="Popup moderatorToolsPopup">
								<a rel="Menu">' . 'Công cụ quản trị' . '</a>
								<div class="Menu">
									<div class="primaryContent menuHeader"><h3>' . 'Công cụ quản trị' . '</h3></div>
									<ul class="secondaryContent blockLinksList">
									' . $__compilerVar82 . '
									</ul>
								</div>
							</div></li>
						';
}
unset($__compilerVar82);
$__compilerVar81 .= '

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
$__compilerVar81 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('members/unignore', $user, array()) . '" class="FollowLink">' . 'Bỏ ra khỏi danh sách đen' . '</a></li>
						';
}
else if ($canIgnore)
{
$__compilerVar81 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('members/ignore', $user, array()) . '" class="FollowLink">' . 'Thêm vào danh sách đen' . '</a></li>
						';
}
$__compilerVar81 .= '
						';
if ($canReport)
{
$__compilerVar81 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('members/report', $user, array()) . '" class="OverlayTrigger">' . 'Báo cáo' . '</a></li>
						';
}
$__compilerVar81 .= '
						';
if (trim($__compilerVar81) !== '')
{
$__output .= '
					<ul>
						' . $__compilerVar81 . '
					</ul>
					';
}
unset($__compilerVar81);
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
								' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' đang theo dõi bạn' . '
							';
}
else
{
$__output .= '
								' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' đang không theo dõi bạn' . '
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
$__compilerVar83 = '';
$__compilerVar83 .= XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $user
));
if (trim($__compilerVar83) !== '')
{
$__output .= '
					<div class="userBanners">
						' . $__compilerVar83 . '
					</div>
				';
}
unset($__compilerVar83);
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
						<dt>' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' được nhìn thấy lần cuối' . ':</dt>
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
									' . 'Đang xem trang không xác định' . ',
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
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#profilePosts">' . 'Tin nhắn hồ sơ' . '</a></li>
				';
if ($showRecentActivity)
{
$__output .= '<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#recentActivity">' . 'Hoạt động gần đây' . '</a></li>';
}
$__output .= '
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#postings">' . 'Các bài đăng' . '</a></li>
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#info">' . 'Thông tin' . '</a></li>
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
$__compilerVar84 = '';
$__output .= $this->callTemplateHook('member_view_tabs_heading', $__compilerVar84, array(
'user' => $user
));
unset($__compilerVar84);
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
								<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Cập nhật trạng thái' . '..." rows="3" cols="50" data-statusEditorCounter="#statusEditorCounter"></textarea>
							';
}
else
{
$__output .= '
								<textarea name="message" class="textCtrl UserTagger Elastic" placeholder="' . 'Viết một vài điều gì đó' . '..." rows="3" cols="50"></textarea>
							';
}
$__output .= '
							<div class="submitUnit">
								<span id="statusEditorCounter" title="' . 'Số ký tự còn lại' . '"></span>
								<input type="submit" class="button primary" value="' . 'Đăng' . '" accesskey="s" />
								<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
							</div>
						</div>
					</form>
				';
}
$__output .= '
				
				';
$__compilerVar85 = '';
$__compilerVar86 = '';
$__compilerVar85 .= $this->callTemplateHook('ad_member_view_above_messages', $__compilerVar86, array());
unset($__compilerVar86);
$__output .= $__compilerVar85;
unset($__compilerVar85);
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
$__compilerVar87 = '';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar87 .= '

';
$__compilerVar88 = '';
$__compilerVar88 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar89 = '';
$__compilerVar89 .= '
		';
if ($profilePost['canInlineMod'])
{
$__compilerVar89 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar89 .= '
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date',
'class' => 'muted item'
))) . '
		<a href="' . XenForo_Template_Helper_Core::link('profile-posts/show', $profilePost, array()) . '" class="MessageLoader control item show" data-messageSelector="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>
	';
$__compilerVar90 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar90 .= '

<li id="' . htmlspecialchars($__compilerVar88, ENT_QUOTES, 'UTF-8') . '" class="messageSimple deleted placeholder ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '">

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
$__compilerVar90 .= '
				' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['delete_date'],array(
'time' => htmlspecialchars($profilePost['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($profilePost['delete_reason'])
{
$__compilerVar90 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($profilePost['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar90 .= '.
			';
}
$__compilerVar90 .= '
		</p>
		<div class="privateControls">' . $__compilerVar89 . '</div>
		
	</div>

</li>';
$__compilerVar87 .= $__compilerVar90;
unset($__compilerVar88, $__compilerVar89, $__compilerVar90);
$__output .= $__compilerVar87;
unset($__compilerVar87);
$__output .= '
								';
}
else
{
$__output .= '
									';
$__compilerVar91 = '';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__compilerVar91 .= '

';
if ($showReceiverName)
{
$__compilerVar91 .= '
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
$__compilerVar91 .= '
';
}
else
{
$__compilerVar91 .= '
	';
$messagePosterHtml = '';
$__compilerVar91 .= '
';
}
$__compilerVar91 .= '

';
$__compilerVar92 = '';
$__compilerVar92 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar93 = '';
$__compilerVar93 .= '

		<div class="messageMeta">
				<div class="privateControls">
					';
if ($profilePost['canInlineMod'])
{
$__compilerVar93 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar93 .= '
					<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
					';
$__compilerVar94 = '';
$__compilerVar94 .= '
					';
if ($profilePost['canEdit'])
{
$__compilerVar94 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/edit', $profilePost, array()) . '" class="OverlayTrigger item control edit"><span></span>' . 'Sửa' . '</a>
					';
}
$__compilerVar94 .= '
					';
if ($profilePost['canDelete'])
{
$__compilerVar94 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/delete', $profilePost, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
					';
}
$__compilerVar94 .= '
					';
if ($profilePost['canCleanSpam'])
{
$__compilerVar94 .= '
						<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $profilePost, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a
					>';
}
$__compilerVar94 .= '
					';
if ($canViewIps AND $profilePost['ip_id'])
{
$__compilerVar94 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/ip', $profilePost, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
					';
}
$__compilerVar94 .= '
					
					';
if ($profilePost['canWarn'])
{
$__compilerVar94 .= '
						<a href="' . XenForo_Template_Helper_Core::link('members/warn', $profilePost, array(
'content_type' => 'profile_post',
'content_id' => $profilePost['profile_post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
					';
}
else if ($profilePost['warning_id'] && $canViewWarnings)
{
$__compilerVar94 .= '
						<a href="' . XenForo_Template_Helper_Core::link('warnings', $profilePost, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
					';
}
$__compilerVar94 .= '
					';
if ($profilePost['canReport'])
{
$__compilerVar94 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/report', $profilePost, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
					';
}
$__compilerVar94 .= '
					
					';
$__compilerVar93 .= $this->callTemplateHook('profile_post_private_controls', $__compilerVar94, array(
'profilePost' => $profilePost
));
unset($__compilerVar94);
$__compilerVar93 .= '
				</div>
			';
$__compilerVar95 = '';
$__compilerVar95 .= '
					';
$__compilerVar96 = '';
$__compilerVar96 .= '
					';
if ($profilePost['canLike'])
{
$__compilerVar96 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/like', $profilePost, array()) . '" class="LikeLink item control ' . (($profilePost['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($profilePost['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar96 .= '
					';
if ($profilePost['canComment'])
{
$__compilerVar96 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment', $profilePost, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Bình luận' . '</a>
					';
}
$__compilerVar96 .= '
					';
$__compilerVar95 .= $this->callTemplateHook('profile_post_public_controls', $__compilerVar96, array(
'profilePost' => $profilePost
));
unset($__compilerVar96);
$__compilerVar95 .= '
				';
if (trim($__compilerVar95) !== '')
{
$__compilerVar93 .= '
				<div class="publicControls">
				' . $__compilerVar95 . '
				</div>
			';
}
unset($__compilerVar95);
$__compilerVar93 .= '
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '">
				';
if ($profilePost['likes'])
{
$__compilerVar93 .= '
					';
$__compilerVar97 = '';
$__compilerVar97 .= XenForo_Template_Helper_Core::link('profile-posts/likes', $profilePost, array());
$__compilerVar98 = '';
if ($profilePost['likes'])
{
$__compilerVar98 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar98 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($profilePost['likes'],$__compilerVar97,$profilePost['like_date'],$profilePost['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar93 .= $__compilerVar98;
unset($__compilerVar97, $__compilerVar98);
$__compilerVar93 .= '
				';
}
$__compilerVar93 .= '
			</li>

			';
if ($profilePost['comments'])
{
$__compilerVar93 .= '

				';
if ($profilePost['comment_count'] > 3)
{
$__compilerVar93 .= '
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
$__compilerVar93 .= '

				';
foreach ($profilePost['comments'] AS $comment)
{
$__compilerVar93 .= '
					';
$__compilerVar99 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar99 .= '

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
$__compilerVar99 .= '<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment-delete', $profilePost, array(
'comment' => $comment['profile_post_comment_id']
)) . '" class="OverlayTrigger item control delete"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar99 .= '
		</div>
	</div>
</li>';
$__compilerVar93 .= $__compilerVar99;
unset($__compilerVar99);
$__compilerVar93 .= '
				';
}
$__compilerVar93 .= '

			';
}
$__compilerVar93 .= '

			';
if ($profilePost['canComment'])
{
$__compilerVar93 .= '
				<li id="commentSubmit-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent" style="display:none">
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true'
),'')) . '
					<div class="elements">
						<textarea name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input type="submit" class="button primary" value="' . 'Đăng bình luận' . '" /></div>
					</div>
				</li>
			';
}
$__compilerVar93 .= '

		</ol>

	';
$__compilerVar100 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar100 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar100 .= '

<li id="' . htmlspecialchars($__compilerVar92, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($profilePost['isDeleted']) ? ('deleted') : ('')) . ' ' . (($profilePost['is_staff']) ? ('staff') : ('')) . ' ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		';
$__compilerVar101 = '';
$__compilerVar101 .= '
					';
$__compilerVar102 = '';
$__compilerVar102 .= '
						';
if ($profilePost['warning_message'])
{
$__compilerVar102 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($profilePost['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar102 .= '
						';
if ($profilePost['isDeleted'])
{
$__compilerVar102 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($profilePost['isModerated'])
{
$__compilerVar102 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar102 .= '
						';
if ($profilePost['isIgnored'])
{
$__compilerVar102 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar102 .= '
					';
$__compilerVar101 .= $this->callTemplateHook('message_simple_notices', $__compilerVar102, array(
'message' => $profilePost
));
unset($__compilerVar102);
$__compilerVar101 .= '
				';
if (trim($__compilerVar101) !== '')
{
$__compilerVar100 .= '
			<ul class="messageNotices">
				' . $__compilerVar101 . '
			</ul>
		';
}
unset($__compilerVar101);
$__compilerVar100 .= '

		<div class="messageContent">
			';
if ($messagePosterHtml)
{
$__compilerVar100 .= '
				' . $messagePosterHtml . '
			';
}
else
{
$__compilerVar100 .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array(
'class' => 'poster'
))) . '
			';
}
$__compilerVar100 .= '
			<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
		</div>

		' . $__compilerVar93 . '
	</div>
</li>';
$__compilerVar91 .= $__compilerVar100;
unset($__compilerVar92, $__compilerVar93, $__compilerVar100);
$__compilerVar91 .= '
' . '
';
$__output .= $__compilerVar91;
unset($__compilerVar91);
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
							<li id="NoProfilePosts">' . 'Hiện tại không có tin nhắn trong hồ sơ của ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '.' . '</li>
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
$__compilerVar103 = '';
$__compilerVar104 = '';
$__compilerVar104 .= 'Post Moderation';
$__compilerVar105 = '';
$__compilerVar105 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar105 .= '<option value="delete">' . 'Xóa bài viết' . '</option>';
}
$__compilerVar105 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar105 .= '<option value="undelete">' . 'Bỏ xóa bài viết' . '</option>';
}
$__compilerVar105 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar105 .= '<option value="approve">' . 'Duyệt bài viết' . '</option>';
}
$__compilerVar105 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar105 .= '<option value="unapprove">' . 'Không duyệt bài viết' . '</option>';
}
$__compilerVar105 .= '
		<option value="deselect">' . 'Bỏ chọn bài viết' . '</option>
	';
$__compilerVar106 = '';
$__compilerVar106 .= 'Select / deselect all posts on this page';
$__compilerVar107 = '';
$__compilerVar107 .= 'Bài viết đã chọn';
$__compilerVar108 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar108 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar108 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar106, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar107, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar108 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar108 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar108 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar108 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar105 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar103 .= $__compilerVar108;
unset($__compilerVar104, $__compilerVar105, $__compilerVar106, $__compilerVar107, $__compilerVar108);
$__output .= $__compilerVar103;
unset($__compilerVar103);
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
				<div id="NoProfilePosts">' . 'Hiện tại không có tin nhắn trong hồ sơ của ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '.' . '</div>
			';
}
$__output .= '

			</li>

			';
if ($showRecentActivity)
{
$__output .= '
			<li id="recentActivity" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/recent-activity', $user, array()) . '">
				<span class="JsOnly">' . 'Đang tải' . '...</span>
				<noscript><a href="' . XenForo_Template_Helper_Core::link('members/recent-activity', $user, array()) . '">' . 'Xem' . '</a></noscript>
			</li>
			';
}
$__output .= '

			<li id="postings" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/recent-content', $user, array()) . '">
				<span class="JsOnly">' . 'Đang tải' . '...</span>
				<noscript><a href="' . XenForo_Template_Helper_Core::link('members/recent-content', $user, array()) . '">' . 'Xem' . '</a></noscript>
			</li>

			<li id="info" class="profileContent">

				';
$__compilerVar109 = '';
$__compilerVar109 .= '
								';
$__compilerVar110 = '';
$__compilerVar110 .= '
										';
if ($user['gender'])
{
$__compilerVar110 .= '
											<dl><dt>' . 'Giới tính' . ':</dt> <dd>';
if ($user['gender'] == ('male'))
{
$__compilerVar110 .= 'Nam';
}
else
{
$__compilerVar110 .= 'Nữ';
}
$__compilerVar110 .= '</dd></dl>
										';
}
$__compilerVar110 .= '

										';
if ($birthday)
{
$__compilerVar110 .= '
											<dl><dt>' . 'Sinh nhật' . ':</dt> <dd>' . XenForo_Template_Helper_Core::date($birthday['timeStamp'], $birthday['format']) . ' ';
if ($birthday['age'])
{
$__compilerVar110 .= '(' . 'Tuổi' . ': ' . XenForo_Template_Helper_Core::numberFormat($birthday['age'], '0') . ')';
}
$__compilerVar110 .= '</dd></dl>
										';
}
$__compilerVar110 .= '

										';
if ($user['homepage'])
{
$__compilerVar110 .= '
											<dl><dt>' . 'Web' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => 'x'
)) . '" rel="nofollow" target="_blank">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd></dl>
										';
}
$__compilerVar110 .= '

										';
if ($user['location'])
{
$__compilerVar110 .= '
											<dl><dt>' . 'Nơi ở' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $user['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd></dl>
										';
}
$__compilerVar110 .= '

										';
if ($user['occupation'])
{
$__compilerVar110 .= '
											<dl><dt>' . 'Nghề nghiệp' . ':</dt> <dd>' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd></dl>
										';
}
$__compilerVar110 .= '
										
										';
if ($customFieldsGrouped['personal'])
{
$__compilerVar110 .= '
											';
foreach ($customFieldsGrouped['personal'] AS $field)
{
$__compilerVar110 .= '
												';
$__compilerVar111 = '';
$__compilerVar112 = '';
$__compilerVar112 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar112 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar112 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar112 .= '
				</ul>
			';
}
else
{
$__compilerVar112 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar112 .= '
		';
if (trim($__compilerVar112) !== '')
{
$__compilerVar111 .= '
	<dl>
		<dt>' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar112 . '</dd>
	</dl>
';
}
unset($__compilerVar112);
$__compilerVar110 .= $__compilerVar111;
unset($__compilerVar111);
$__compilerVar110 .= '
											';
}
$__compilerVar110 .= '
										';
}
$__compilerVar110 .= '
									';
if (trim($__compilerVar110) !== '')
{
$__compilerVar109 .= '
									<div class="pairsColumns aboutPairs">
									' . $__compilerVar110 . '
									</div>
								';
}
unset($__compilerVar110);
$__compilerVar109 .= '

								';
if ($user['about'])
{
$__compilerVar109 .= '<div class="baseHtml ugc">' . $user['aboutHtml'] . '</div>';
}
$__compilerVar109 .= '
							';
if (trim($__compilerVar109) !== '')
{
$__output .= '
					<div class="section">
						<h3 class="textHeading">' . 'Giới thiệu' . '</h3>

						<div class="primaryContent">
							' . $__compilerVar109 . '
						</div>
					</div>
				';
}
unset($__compilerVar109);
$__output .= '

				<div class="section">
					<h3 class="textHeading">' . 'Tương tác' . '</h3>

					<div class="primaryContent">
						<div class="pairsColumns contactInfo">
							<dl>
								<dt>' . 'Nội dung' . ':</dt>
								<dd><ul>
									';
$__compilerVar113 = '';
$__compilerVar113 .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $user['user_id']
)) . '" rel="nofollow">' . 'Tìm tất cả nội dung bởi ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '</a></li>
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $user['user_id'],
'content' => 'thread'
)) . '" rel="nofollow">' . 'Tìm tất cả chủ đề bởi ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '</a></li>
									';
$__output .= $this->callTemplateHook('member_view_search_content_types', $__compilerVar113, array());
unset($__compilerVar113);
$__output .= '
								</ul></dd>
							</dl>
							';
if ($canStartConversation)
{
$__output .= '
								<dl><dt>' . 'Đối thoại' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('conversations/add', '', array(
'to' => $user['username']
)) . '">' . 'Bắt đầu đối thoại' . '</a></dd></dl>
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
$__compilerVar114 = '';
$__compilerVar115 = '';
$__compilerVar115 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar115 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar115 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar115 .= '
				</ul>
			';
}
else
{
$__compilerVar115 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar115 .= '
		';
if (trim($__compilerVar115) !== '')
{
$__compilerVar114 .= '
	<dl>
		<dt>' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar115 . '</dd>
	</dl>
';
}
unset($__compilerVar115);
$__output .= $__compilerVar114;
unset($__compilerVar114);
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
						<h3 class="textHeading">' . 'Chữ ký' . '</h3>
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
					' . 'Đang tải' . '...
					<noscript><a href="' . XenForo_Template_Helper_Core::link('members/warnings', $user, array()) . '">' . 'Xem' . '</a></noscript>
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
	<span class="jsOnly">' . 'Đang tải' . '...</span>
	<noscript><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $user, array()) . '">' . 'Xem' . '</a></noscript>
</li>
';
}
$__output .= '

';
if ($canViewAnalytics)
{
$__output .= '<li id="analytics" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/analytics', $user, array()) . '">
	' . 'Đang tải' . '...
';
$this->addRequiredExternal('css', 'better_analytics');
$__output .= '
';
$this->addRequiredExternal('js', '//www.google.com/jsapi?autoload=%7B%0A%27modules%27%3A%5B%7B%0A%27name%27%3A%27visualization%27%2C%0A%27version%27%3A%271%27%2C%0A%27packages%27%3A%5B%27corechart%27%5D%0A%7D%5D%0A%7D');
$__output .= '
	<noscript><a href="' . XenForo_Template_Helper_Core::link('members/analytics', $user, array()) . '">' . 'Xem' . '</a></noscript>
</li>';
}
$__output .= '
';
$__compilerVar116 = '';
$__output .= $this->callTemplateHook('member_view_tabs_content', $__compilerVar116, array(
'user' => $user
));
unset($__compilerVar116);
$__output .= '
		</ul>
	</div>

</div>';
