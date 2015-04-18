<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= '
	' . 'Thảo luận trong \'' . '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '\' bắt đầu bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread
)) . ', ' . '<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . XenForo_Template_Helper_Core::datetime($thread['post_date'], 'html') . '</a>' . '.' . '
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:threads', $thread, array(
'page' => $page
)) . '" />';
$__output .= '
';
$__extraData['head']['description'] = '';
$__extraData['head']['description'] .= '
	<meta name="description" content="' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $firstPost['message'],
'1' => '155'
)) . '" />';
$__output .= '
';
$__extraData['head']['openGraph'] = '';
$__compilerVar108 = '';
$__compilerVar108 .= XenForo_Template_Helper_Core::link('canonical:threads', $thread, array());
$__compilerVar109 = '';
$__compilerVar109 .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar110 = '';
$__compilerVar110 .= XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $thread,
'1' => 'm',
'2' => '0',
'3' => '1'
));
$__compilerVar111 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar111 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($__compilerVar110)
{
$__compilerVar111 .= '<meta property="og:image" content="' . htmlspecialchars($__compilerVar110, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar111 .= '
	<meta property="og:image" content="';
$__compilerVar112 = '';
$__compilerVar112 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar111 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar112, array());
unset($__compilerVar112);
$__compilerVar111 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar108 . '" />
	<meta property="og:title" content="' . $__compilerVar109 . '" />
	';
if ($description)
{
$__compilerVar111 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar111 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar111 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar111 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar111 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar111 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar111;
unset($__compilerVar108, $__compilerVar109, $__compilerVar110, $__compilerVar111);
$__output .= '
';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
));
$__output .= '
';
$__extraData['searchBar']['thread'] = '';
$__compilerVar113 = '';
$__compilerVar113 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar113;
unset($__compilerVar113);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar114 = '';
$__compilerVar114 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar114;
unset($__compilerVar114);
$__output .= '

';
if ($canReply)
{
$__output .= '
	
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'thread_view');
$__output .= '

' . '

<ul class="messageList messageArticle" id="messageArticle">
	<li class="messageAuthor">	
		';
if ($xenOptions['facebookLike'])
{
$__output .= '
			<div class="facebookLike shareControl">
				';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__output .= '
				<fb:like href="' . XenForo_Template_Helper_Core::link('canonical:threads', $thread, array()) . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
			</div>
		';
}
$__output .= '
		';
if ($xenOptions['plusone'])
{
$__output .= '
			<div class="plusone shareControl">
				<div class="g-plusone" data-size="medium" data-count="true" data-url="' . XenForo_Template_Helper_Core::link('canonical:threads', $thread, array()) . '" data-lang="' . htmlspecialchars($visitorLanguage['language_code'], ENT_QUOTES, 'UTF-8') . '"></div>
			</div>
		';
}
$__output .= '
		';
if ($xenOptions['tweet']['enabled'])
{
$__output .= '
			<div class="tweet shareControl">
				<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal"
					data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
					data-url="' . XenForo_Template_Helper_Core::link('canonical:threads', $thread, array()) . '"
					' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
					' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
			</div>
		';
}
$__output .= '	

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($posts[$thread['first_post_id']],false,array(
'user' => '$posts.' . htmlspecialchars($thread['first_post_id'], ENT_QUOTES, 'UTF-8'),
'size' => 's'
),'')) . '

		<div class="messageInfo">
			' . 'by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread
)) . ', ' . XenForo_Template_Helper_Core::datetime($thread['post_date'], 'static') . '' . '
		</div>
	</li>

	';
$__compilerVar115 = '';
$__compilerVar116 = '';
$__compilerVar116 .= 'post-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar117 = '';
$__compilerVar117 .= XenForo_Template_Helper_Core::link('posts/likes', $posts[$thread['first_post_id']], array());
$__compilerVar118 = '';
if ($posts[$thread['first_post_id']]['attachments'])
{
$__compilerVar119 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar119 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Các file đính kèm' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($posts[$thread['first_post_id']]['attachments'] AS $attachment)
{
$__compilerVar119 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar120 = '';
$__compilerVar120 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar120 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar120 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar120 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar120 .= '
					</div>
					';
$__compilerVar119 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar120, array(
'attachment' => $attachment
));
unset($__compilerVar120);
$__compilerVar119 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'Kích thước' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Đọc' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar119 .= '
	</ul>
</div>

';
$__compilerVar118 .= $__compilerVar119;
unset($__compilerVar119);
}
$__compilerVar121 = '';
$__compilerVar121 .= '
				
		<div class="messageMeta ToggleTriggerAnchor">
			
			<div class="privateControls">
				';
if ($posts[$thread['first_post_id']]['canInlineMod'])
{
$__compilerVar121 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($posts[$thread['first_post_id']]['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar121 .= '
				<span class="item muted">
					<span class="authorEnd">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($posts[$thread['first_post_id']],'',false,array(
'class' => 'author'
))) . ',</span>
					<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $posts[$thread['first_post_id']]
)) . '" title="' . 'Permalink' . '" class="datePermalink">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($posts[$thread['first_post_id']]['post_date'],array(
'time' => '$post.post_date'
))) . '</a>
				</span>
				';
$__compilerVar122 = '';
$__compilerVar122 .= '
				';
if ($posts[$thread['first_post_id']]['canEdit'])
{
$__compilerVar122 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $posts[$thread['first_post_id']], array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $posts[$thread['first_post_id']], array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Sửa' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar122 .= '
				';
}
$__compilerVar122 .= '
				';
if ($posts[$thread['first_post_id']]['edit_count'] && $posts[$thread['first_post_id']]['canViewHistory'])
{
$__compilerVar122 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/history', $posts[$thread['first_post_id']], array()) . '" class="item control history ToggleTrigger"><span></span>' . 'Lịch sử' . '</a>';
}
$__compilerVar122 .= '
				';
if ($posts[$thread['first_post_id']]['canDelete'])
{
$__compilerVar122 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $posts[$thread['first_post_id']], array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar122 .= '
				';
if ($posts[$thread['first_post_id']]['canCleanSpam'])
{
$__compilerVar122 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $posts[$thread['first_post_id']], array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar122 .= '
				';
if ($canViewIps AND $posts[$thread['first_post_id']]['ip_id'])
{
$__compilerVar122 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $posts[$thread['first_post_id']], array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar122 .= '
				
				';
if ($posts[$thread['first_post_id']]['canWarn'])
{
$__compilerVar122 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $posts[$thread['first_post_id']], array(
'content_type' => 'post',
'content_id' => $posts[$thread['first_post_id']]['post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($posts[$thread['first_post_id']]['warning_id'] && $canViewWarnings)
{
$__compilerVar122 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $posts[$thread['first_post_id']], array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar122 .= '
				';
if ($posts[$thread['first_post_id']]['canReport'])
{
$__compilerVar122 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $posts[$thread['first_post_id']], array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar122 .= '
				
				';
$__compilerVar121 .= $this->callTemplateHook('post_private_controls', $__compilerVar122, array(
'post' => $posts[$thread['first_post_id']]
));
unset($__compilerVar122);
$__compilerVar121 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $posts[$thread['first_post_id']]
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $posts[$thread['first_post_id']], array()) . '">#' . ($posts[$thread['first_post_id']]['position'] + 1) . '</a>
				';
$__compilerVar123 = '';
$__compilerVar123 .= '
				';
if ($posts[$thread['first_post_id']]['canLike'])
{
$__compilerVar123 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $posts[$thread['first_post_id']], array()) . '" class="LikeLink item control ' . (($posts[$thread['first_post_id']]['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($posts[$thread['first_post_id']]['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
				';
}
$__compilerVar123 .= '
				';
if ($canReply)
{
$__compilerVar123 .= '
					';
if ($xenOptions['multiQuote'])
{
$__compilerVar123 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $posts[$thread['first_post_id']]['post_id']
)) . '"
						data-messageid="' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="MultiQuoteControl JsOnly item control"
						title="' . 'Toggle Multi-Quote' . '"><span></span><span class="symbol">' . '+ Quote' . '</span></a>';
}
$__compilerVar123 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $posts[$thread['first_post_id']]['post_id']
)) . '"
						data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $posts[$thread['first_post_id']], array()) . '"
						data-tip="#MQ-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="ReplyQuote item control reply"
						title="' . 'Trả lời, trích dẫn nội dung bài viết này' . '"><span></span>' . 'Trả lời' . '</a>
				';
}
$__compilerVar123 .= '
				';
$__compilerVar121 .= $this->callTemplateHook('post_public_controls', $__compilerVar123, array(
'post' => $posts[$thread['first_post_id']]
));
unset($__compilerVar123);
$__compilerVar121 .= '
			</div>
		</div>
	';
$__compilerVar124 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar124 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar124 .= '

<li id="' . htmlspecialchars($__compilerVar116, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($posts[$thread['first_post_id']]['isDeleted']) ? ('deleted') : ('')) . ' ' . (($posts[$thread['first_post_id']]['is_staff']) ? ('staff') : ('')) . ' ' . (($posts[$thread['first_post_id']]['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($posts[$thread['first_post_id']]['username'], ENT_QUOTES, 'UTF-8') . '">

	';
$__compilerVar125 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar125 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($posts[$thread['first_post_id']]['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar126 = '';
$__compilerVar126 .= '
		<div class="avatarHolder">
			<span class="helper"></span>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($posts[$thread['first_post_id']],(true),array(
'user' => '$user',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
if ($posts[$thread['first_post_id']]['isOnline'])
{
$__compilerVar126 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar126 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar125 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar126, array(
'user' => $posts[$thread['first_post_id']],
'isQuickReply' => $isQuickReply
));
unset($__compilerVar126);
$__compilerVar125 .= '

';
if (!$isQuickReply)
{
$__compilerVar125 .= '
	';
$__compilerVar127 = '';
$__compilerVar127 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($posts[$thread['first_post_id']],'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar128 = '';
$__compilerVar128 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $posts[$thread['first_post_id']],
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar128) !== '')
{
$__compilerVar127 .= '<em class="userTitle" itemprop="title">' . $__compilerVar128 . '</em>';
}
unset($__compilerVar128);
$__compilerVar127 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $posts[$thread['first_post_id']],
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar125 .= $this->callTemplateHook('message_user_info_text', $__compilerVar127, array(
'user' => $posts[$thread['first_post_id']],
'isQuickReply' => $isQuickReply
));
unset($__compilerVar127);
$__compilerVar125 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar129 = '';
$__compilerVar129 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar129 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar129 .= '
';
}
$__compilerVar129 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar129 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar129 .= '
';
}
$__compilerVar129 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar129 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar129 .= '
';
}
$__compilerVar129 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar129 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar129 .= '
';
}
$__compilerVar129 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar129 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar129 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar129 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar129 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar129 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar129 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar129 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar129 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar129 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar129 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar129 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar129 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar129 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar129 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar129 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar129 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar129 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar129 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar129 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar129 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar129 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar129 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar129 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar129 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar129 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar129 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar129 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar129 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar129 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar129 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar129 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar129 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar129 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar129 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar129 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar129 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar129 .= '
		
	</ul>
';
}
$__compilerVar125 .= $__compilerVar129;
unset($__compilerVar129);
}
$__compilerVar125 .= '
    ';
$__compilerVar130 = '';
$__compilerVar130 .= '
			';
$__compilerVar131 = '';
$__compilerVar131 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $posts[$thread['first_post_id']]['user_id'])
{
$__compilerVar131 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($posts[$thread['first_post_id']]['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar131 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $posts[$thread['first_post_id']]['user_id'])
{
$__compilerVar131 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $posts[$thread['first_post_id']]['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($posts[$thread['first_post_id']]['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar131 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $posts[$thread['first_post_id']]['user_id'])
{
$__compilerVar131 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($posts[$thread['first_post_id']]['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar131 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $posts[$thread['first_post_id']]['user_id'])
{
$__compilerVar131 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $posts[$thread['first_post_id']], array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($posts[$thread['first_post_id']]['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar131 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $posts[$thread['first_post_id']]['gender'])
{
$__compilerVar131 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($posts[$thread['first_post_id']]['gender'] == ('male'))
{
$__compilerVar131 .= 'Nam';
}
else
{
$__compilerVar131 .= 'Nữ';
}
$__compilerVar131 .= '</dd>
					</dl>
				';
}
$__compilerVar131 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $posts[$thread['first_post_id']]['occupation'])
{
$__compilerVar131 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($posts[$thread['first_post_id']]['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar131 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $posts[$thread['first_post_id']]['location'])
{
$__compilerVar131 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nơi ở' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $posts[$thread['first_post_id']]['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($posts[$thread['first_post_id']]['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar131 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $posts[$thread['first_post_id']]['homepage'])
{
$__compilerVar131 .= '
					<dl class="pairsJustified">
						<dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($posts[$thread['first_post_id']]['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($posts[$thread['first_post_id']]['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar131 .= '
							
			';
$__compilerVar130 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar131, array(
'user' => $posts[$thread['first_post_id']],
'isQuickReply' => $isQuickReply
));
unset($__compilerVar131);
$__compilerVar130 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $posts[$thread['first_post_id']]['customFields'])
{
$__compilerVar130 .= '
			';
$__compilerVar132 = '';
$__compilerVar132 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar132 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $posts[$thread['first_post_id']]['allow_view_identities'] == ('everyone') OR ($posts[$thread['first_post_id']]['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar132 .= '
						';
$__compilerVar133 = '';
$__compilerVar133 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $posts[$thread['first_post_id']],
'2' => $posts[$thread['first_post_id']]['customFields'][$fieldId]
));
if (trim($__compilerVar133) !== '')
{
$__compilerVar132 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar133 . '</dd>
							</dl>
						';
}
unset($__compilerVar133);
$__compilerVar132 .= '
					';
}
$__compilerVar132 .= '
				';
}
$__compilerVar132 .= '
				
			';
$__compilerVar130 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar132, array(
'user' => $posts[$thread['first_post_id']],
'isQuickReply' => $isQuickReply
));
unset($__compilerVar132);
$__compilerVar130 .= '
			';
}
$__compilerVar130 .= '
			';
if (trim($__compilerVar130) !== '')
{
$__compilerVar125 .= '
		<div class="extraUserInfo">
			' . $__compilerVar130 . '
		</div>
	';
}
unset($__compilerVar130);
$__compilerVar125 .= '
		
';
}
$__compilerVar125 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar124 .= $__compilerVar125;
unset($__compilerVar125);
$__compilerVar124 .= '

	<div class="messageInfo primaryContent">
		';
if ($posts[$thread['first_post_id']]['isNew'])
{
$__compilerVar124 .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__compilerVar124 .= '
		
		';
$__compilerVar134 = '';
$__compilerVar134 .= '
					';
$__compilerVar135 = '';
$__compilerVar135 .= '
						';
if ($posts[$thread['first_post_id']]['warning_message'])
{
$__compilerVar135 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($posts[$thread['first_post_id']]['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar135 .= '
						';
if ($posts[$thread['first_post_id']]['isDeleted'])
{
$__compilerVar135 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($posts[$thread['first_post_id']]['isModerated'])
{
$__compilerVar135 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar135 .= '
						';
if ($posts[$thread['first_post_id']]['isIgnored'])
{
$__compilerVar135 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar135 .= '
					';
$__compilerVar134 .= $this->callTemplateHook('message_notices', $__compilerVar135, array(
'message' => $posts[$thread['first_post_id']]
));
unset($__compilerVar135);
$__compilerVar134 .= '
				';
if (trim($__compilerVar134) !== '')
{
$__compilerVar124 .= '
			<ul class="messageNotices">
				' . $__compilerVar134 . '
			</ul>
		';
}
unset($__compilerVar134);
$__compilerVar124 .= '
		
		';
$__compilerVar136 = '';
$__compilerVar136 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText SelectQuoteContainer ugc baseHtml' . (($posts[$thread['first_post_id']]['isIgnored']) ? (' ignored') : ('')) . '">
					';
$__compilerVar137 = '';
$__compilerVar138 = '';
$__compilerVar137 .= $this->callTemplateHook('ad_message_body', $__compilerVar138, array());
unset($__compilerVar138);
$__compilerVar136 .= $__compilerVar137;
unset($__compilerVar137);
$__compilerVar136 .= '
					' . $posts[$thread['first_post_id']]['messageHtml'] . '
					<div class="messageTextEndMarker">&nbsp;</div>
				</blockquote>
			</article>
			
			' . $__compilerVar118 . '
		</div>
		';
$__compilerVar124 .= $this->callTemplateHook('message_content', $__compilerVar136, array(
'message' => $posts[$thread['first_post_id']]
));
unset($__compilerVar136);
$__compilerVar124 .= '
		
		';
if ($posts[$thread['first_post_id']]['last_edit_date'])
{
$__compilerVar124 .= '
			<div class="editDate">
			';
if ($posts[$thread['first_post_id']]['user_id'] == $posts[$thread['first_post_id']]['last_edit_user_id'])
{
$__compilerVar124 .= '
				' . 'Chỉnh sửa cuối' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($posts[$thread['first_post_id']]['last_edit_date'],array(
'time' => htmlspecialchars($posts[$thread['first_post_id']]['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar124 .= '
				' . 'Last edited by a moderator' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($posts[$thread['first_post_id']]['last_edit_date'],array(
'time' => htmlspecialchars($posts[$thread['first_post_id']]['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar124 .= '
			</div>
		';
}
$__compilerVar124 .= '
		
		';
if ($visitor['content_show_signature'] && $posts[$thread['first_post_id']]['signature'])
{
$__compilerVar124 .= '
			<div class="baseHtml signature messageText ugc' . (($posts[$thread['first_post_id']]['isIgnored']) ? (' ignored') : ('')) . '"><aside>' . $posts[$thread['first_post_id']]['signatureHtml'] . '</aside></div>
		';
}
$__compilerVar124 .= '
		
		' . $__compilerVar121 . '
		
		';
$__compilerVar139 = '';
$__compilerVar124 .= $this->callTemplateHook('dark_postrating_likes_bar', $__compilerVar139, array(
'post' => $posts[$thread['first_post_id']],
'message_id' => $__compilerVar116
));
unset($__compilerVar139);
$__compilerVar124 .= '
	</div>

	';
$__compilerVar140 = '';
$__compilerVar124 .= $this->callTemplateHook('message_below', $__compilerVar140, array(
'post' => $posts[$thread['first_post_id']],
'message_id' => $__compilerVar116
));
unset($__compilerVar140);
$__compilerVar124 .= '
	
	';
$__compilerVar141 = '';
$__compilerVar142 = '';
$__compilerVar141 .= $this->callTemplateHook('ad_message_below', $__compilerVar142, array());
unset($__compilerVar142);
$__compilerVar124 .= $__compilerVar141;
unset($__compilerVar141);
$__compilerVar124 .= '
';
$__compilerVar143 = '';
$__compilerVar124 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAd', $__compilerVar143, array(
'dp_ads' => $dp_ads
));
unset($__compilerVar143);
$__compilerVar124 .= '
</li>';
$__compilerVar115 .= $__compilerVar124;
unset($__compilerVar116, $__compilerVar117, $__compilerVar118, $__compilerVar121, $__compilerVar124);
$__output .= $__compilerVar115;
unset($__compilerVar115);
$__output .= '

	<div class="categorySummary secondaryContent">
		';
if ($canEditThread)
{
$__output .= '
			<div class="categoryEdit">
				<a href="' . XenForo_Template_Helper_Core::link('threads/category', $thread, array()) . '" class="button OverlayTrigger">' . 'Sửa' . '</a>
			</div>
		';
}
$__output .= '

		' . 'Categories' . ': 

		';
if ($categories)
{
$__output .= '
			<ul>
			';
foreach ($categories AS $category)
{
$__output .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('articles', $category, array()) . '" class="button">' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . '</a></li>
			';
}
$__output .= '
			</ul>
		';
}
else
{
$__output .= '
			Uncategorized
		';
}
$__output .= '
	</div>
</ul>

</div><div class="mainContent mainComments">

<div class="titleBar">
	<h1>' . 'Bình luận' . '</h1>
	<p id="pageDescription" class="muted">
	' . 'Thảo luận trong \'' . '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '\' bắt đầu bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread
)) . ', ' . '<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . XenForo_Template_Helper_Core::datetime($thread['post_date'], 'html') . '</a>' . '.' . '
	</p>
</div>

';
if ($poll)
{
$__output .= '
	';
$__compilerVar144 = '';
$__compilerVar144 .= '
			';
if ($poll['canVote'])
{
$__compilerVar144 .= '
				';
$__compilerVar145 = '';
$__compilerVar145 .= '
		
<div>		
	<ol class="pollOptions">
		';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar145 .= '
			<li class="pollOption"><label>';
if ($poll['max_votes'] != 1)
{
$__compilerVar145 .= '
				<input type="checkbox" name="response_multiple[]" class="PollResponse" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
else
{
$__compilerVar145 .= '
				<input type="radio" name="response" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar145 .= '
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '</label></li>				
		';
}
$__compilerVar145 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar146 = '';
$__compilerVar146 .= '
				';
if ($poll['max_votes'] == 0 OR $poll['max_votes'] > count($poll['responses']))
{
$__compilerVar146 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
else if ($poll['max_votes'] > 1)
{
$__compilerVar146 .= '
					<span class="multipleNote muted">' . 'You may select up to ' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . ' choices.' . '</span>
				';
}
$__compilerVar146 .= '
				';
if ($poll['public_votes'])
{
$__compilerVar146 .= '
					<span class="publicWarning muted">' . 'Your vote will be publicly visible.' . '</span>
				';
}
$__compilerVar146 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar146 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar146 .= '
			';
if (trim($__compilerVar146) !== '')
{
$__compilerVar145 .= '
			<div class="pollNotes">
			' . $__compilerVar146 . '
			</div>
		';
}
unset($__compilerVar146);
$__compilerVar145 .= '
			
		<input type="submit" class="button primary" value="' . 'Bỏ phiếu của bạn' . '" accesskey="s" />
		';
if ($poll['canViewResults'])
{
$__compilerVar145 .= '
			<input type="button" value="' . 'Xem kết quả' . '" class="button OverlayTrigger JsOnly" data-href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" />
			<noscript><a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" class="button">' . 'Xem kết quả' . '</a></noscript>
		';
}
$__compilerVar145 .= '
	</div>
</div>';
$__compilerVar144 .= $__compilerVar145;
unset($__compilerVar145);
$__compilerVar144 .= '
			';
}
else
{
$__compilerVar144 .= '
				';
$__compilerVar147 = '';
$__compilerVar147 .= '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults ' . ((!$poll['canViewResults']) ? ('noResults') : ('')) . '">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar147 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar147 .= '
				<div class="votedIconCell" title="' . 'Bình chọn của bạn' . '">*</div>
			';
}
else
{
$__compilerVar147 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar147 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Bình chọn của bạn' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>
			';
if ($poll['canViewResults'])
{
$__compilerVar147 .= '
				<div class="barCell">
					<span class="barContainer">
						';
if ($response['response_vote_count'])
{
$__compilerVar147 .= '<span class="bar" style="width: ' . (100 * $response['response_vote_count'] / $poll['voter_count']) . '%"></span>';
}
$__compilerVar147 .= '
					</span>
				</div>
				<div class="count">
					';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar147 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '</a>
					';
}
else
{
$__compilerVar147 .= '
						' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '
					';
}
$__compilerVar147 .= '
				</div>
				<div class="percentage">
					';
if ($poll['voter_count'])
{
$__compilerVar147 .= '
						' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%
					';
}
else
{
$__compilerVar147 .= '
						' . XenForo_Template_Helper_Core::numberFormat('0', '1') . '%
					';
}
$__compilerVar147 .= '
				</div>
			';
}
$__compilerVar147 .= '
		</li>
	';
}
$__compilerVar147 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar148 = '';
$__compilerVar148 .= '
				';
if ($poll['max_votes'] != 1)
{
$__compilerVar148 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
$__compilerVar148 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar148 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar148 .= '
			';
if (trim($__compilerVar148) !== '')
{
$__compilerVar147 .= '
			<div class="pollNotes">
			' . $__compilerVar148 . '
			</div>
		';
}
unset($__compilerVar148);
$__compilerVar147 .= '
		
		';
if ($poll['canVote'])
{
$__compilerVar147 .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" class="button PollChangeVote nonOverlayOnly">' . 'Change Your Vote' . '</a>
		';
}
$__compilerVar147 .= '
	</div>
</div>';
$__compilerVar144 .= $__compilerVar147;
unset($__compilerVar147);
$__compilerVar144 .= '
			';
}
$__compilerVar144 .= '
		';
$__compilerVar149 = '';
$this->addRequiredExternal('css', 'polls');
$__compilerVar149 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar149 .= '

<div class="NoAutoHeader PollContainer">
	<form action="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" method="post"
	class="sectionMain pollBlock AutoValidator PollVoteForm" data-max-votes="' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . '">
	
		<div class="secondaryContent">	
			<div class="pollContent">
				<div class="questionMark">?</div>
			
				<div class="question">
					<h2 class="questionText">' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '</h2>
					';
if ($poll['canEdit'])
{
$__compilerVar149 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/poll/edit', $thread, array()) . '" class="editLink">' . 'Sửa' . '</a>';
}
$__compilerVar149 .= '
					
					';
if ($poll['close_date'])
{
$__compilerVar149 .= '
						<div class="pollNotes closeDate muted">
							';
if ($poll['open'])
{
$__compilerVar149 .= '
								' . 'This poll will close on ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], 'absolute') . '.' . '
							';
}
else
{
$__compilerVar149 .= '
								' . 'Poll closed ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], '') . '.' . '
							';
}
$__compilerVar149 .= '
						</div>
					';
}
$__compilerVar149 .= '
				</div>
					
				' . $__compilerVar144 . '
			</div>
		</div>
	
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>';
$__output .= $__compilerVar149;
unset($__compilerVar144, $__compilerVar149);
$__output .= '
';
}
$__output .= '

';
if ($showPostedNotice)
{
$__output .= '
	<div class="importantMessage">' . 'Your message has been submitted and will be displayed pending approval by a moderator.' . '</div>
';
}
$__output .= '

';
$threadStatusHtml = '';
$threadStatusHtml .= '
	';
$__compilerVar150 = '';
$__compilerVar150 .= '
				';
if ($thread['discussion_state'] == ('deleted'))
{
$__compilerVar150 .= '
					<dd class="deletedAlert">
						<span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip"></span>
							' . 'Removed from public view.' . '</dd>
				';
}
else if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar150 .= '
					<dd class="moderatedAlert">
						<span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip"></span>
							' . 'Awaiting moderation before being displayed publicly.' . '</dd>
				';
}
$__compilerVar150 .= '
	
				';
if (!$thread['discussion_open'])
{
$__compilerVar150 .= '
					<dd class="lockedAlert">
						<span class="icon Tooltip" title="' . 'Đã khóa' . '" data-tipclass="iconTip"></span>
							' . 'Không mở trả lời sau này.' . '</dd>
				';
}
$__compilerVar150 .= '
			';
if (trim($__compilerVar150) !== '')
{
$threadStatusHtml .= '
		<dl class="threadAlerts secondaryContent">
			<dt>' . 'Trạng thái chủ đề' . ':</dt>
			' . $__compilerVar150 . '
		</dl>
	';
}
unset($__compilerVar150);
$threadStatusHtml .= '
';
$__output .= '
' . $threadStatusHtml . '

';
$__compilerVar151 = '';
$__output .= $this->callTemplateHook('thread_view_pagenav_before', $__compilerVar151, array(
'thread' => $thread
));
unset($__compilerVar151);
$__output .= '

<div class="pageNavLinkGroup">
	<div class="linkGroup SelectionCountContainer">
		';
$__compilerVar152 = '';
$__compilerVar152 .= '
							';
if ($canEditThread)
{
$__compilerVar152 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/edit', $thread, array()) . '" class="OverlayTrigger">' . 'Sửa chủ đề' . '</a></li>
							';
}
$__compilerVar152 .= '
							';
if ($canDeleteThread)
{
$__compilerVar152 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/delete', $thread, array()) . '" class="OverlayTrigger">' . 'Xóa chủ đề' . '</a></li>
							';
}
$__compilerVar152 .= '
							';
if ($canMoveThread)
{
$__compilerVar152 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/move', $thread, array()) . '" class="OverlayTrigger">' . 'Di chuyển chủ đề' . '</a></li>
							';
}
$__compilerVar152 .= '
							';
if ($deletedPosts)
{
$__compilerVar152 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'page' => $page
)) . '" class="MessageLoader" data-messageSelector="#messageList .message.deleted.placeholder">' . 'Show Deleted Posts' . '</a></li>
							';
}
$__compilerVar152 .= '
						';
if (trim($__compilerVar152) !== '')
{
$__output .= '
			<div class="Popup">
				<a rel="Menu">' . 'Công cụ chủ đề' . '</a>
				<div class="Menu">
					<div class="primaryContent menuHeader"><h3>' . 'Công cụ chủ đề' . '</h3></div>
					<ul class="secondaryContent blockLinksList">
						' . $__compilerVar152 . '
					</ul>
					';
$__compilerVar153 = '';
$__compilerVar153 .= '
							';
if ($canLockUnlockThread)
{
$__compilerVar153 .= '
							<li><label><input type="checkbox" name="discussion_open" value="1" class="SubmitOnChange" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' />
								' . 'Mở' . '</label>
								<input type="hidden" name="set[discussion_open]" value="1" /></li>';
}
$__compilerVar153 .= '
							';
if ($canStickUnstickThread)
{
$__compilerVar153 .= ' 
							<li><label><input type="checkbox" name="sticky" value="1" class="SubmitOnChange" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' />
								' . 'Dán lên cao' . '</label>
								<input type="hidden" name="set[sticky]" value="1" /></li>';
}
$__compilerVar153 .= '
						';
if (trim($__compilerVar153) !== '')
{
$__output .= '
					<form action="' . XenForo_Template_Helper_Core::link('threads/quick-update', $thread, array()) . '" method="post" class="AutoValidator">
						<ul class="secondaryContent blockLinksList checkboxColumns">
						' . $__compilerVar153 . '
						</ul>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
					';
}
unset($__compilerVar153);
$__output .= '
					';
if ($thread['canInlineMod'])
{
$__output .= '
					<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post" class="InlineModForm sectionFooter" id="threadViewThreadCheck"
						data-cookieName="threads">
						<label><input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" /> ' . 'Chọn để Quản lý chủ đề' . '</label>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
					';
}
$__output .= '
				</div>
			</div>
		';
}
unset($__compilerVar152);
$__output .= '
		';
if ($canWatchThread)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/watch-confirm', $thread, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($thread['thread_is_watched']) ? ('Bỏ theo dõi chủ đề') : ('Theo dõi chủ đề')) . '</a>
		';
}
$__output .= '
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($postsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPosts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'threads', $thread, array(), htmlspecialchars($unreadLink, ENT_QUOTES, 'UTF-8'), array())) . '
</div>

';
$__compilerVar154 = '';
$__compilerVar155 = '';
$__compilerVar154 .= $this->callTemplateHook('ad_thread_view_above_messages', $__compilerVar155, array());
unset($__compilerVar155);
$__output .= $__compilerVar154;
unset($__compilerVar154);
$__output .= '

';
$__compilerVar156 = '';
$__output .= $this->callTemplateHook('thread_view_form_before', $__compilerVar156, array(
'thread' => $thread
));
unset($__compilerVar156);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/post/switch', false, array()) . '" method="post"
	class="InlineModForm section"
	data-cookieName="posts"
	data-controls="#InlineModControls"
	data-imodOptions="#ModerationSelect option">

	<ol class="messageList" id="messageList">
		';
foreach ($posts AS $post)
{
$__output .= '
			';
if ($post['message_state'] == ('deleted'))
{
$__output .= '
				';
$__compilerVar157 = '';
$__compilerVar158 = '';
$__compilerVar158 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar159 = '';
$__compilerVar159 .= '
		';
if ($post['canInlineMod'])
{
$__compilerVar159 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" title="' . 'Select this post' . '" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar159 .= '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date',
'class' => 'muted item'
))) . '
		
		<a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'post_id' => $post['post_id']
)) . '" class="MessageLoader control item show" data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>		
	';
$__compilerVar160 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar160 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar160 .= '

<li id="' . htmlspecialchars($__compilerVar158, ENT_QUOTES, 'UTF-8') . '" class="message deleted placeholder ' . (($post['isIgnored']) ? ('ignored') : ('')) . '">
	<div class="placeholderContent">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
		
		<div class="messageInfo primaryContent">
			<div>
				' . 'This message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post
)) . ' has been removed from public view.' . '
				
				';
if ($post['delete_username'])
{
$__compilerVar160 .= '
					' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post['deleteInfo']
)) . '' . ',
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['delete_date'],array(
'time' => htmlspecialchars($post['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($post['delete_reason'])
{
$__compilerVar160 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($post['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar160 .= '.
				';
}
$__compilerVar160 .= '
			</div>
			
			';
$__compilerVar161 = '';
$__compilerVar160 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAdCounterAdvance', $__compilerVar161, array());
unset($__compilerVar161);
$__compilerVar160 .= '
<div class="messageMeta">
				<div class="privateControls">' . $__compilerVar159 . '</div>
			</div>
		</div>
		
	</div>
</li>';
$__compilerVar157 .= $__compilerVar160;
unset($__compilerVar158, $__compilerVar159, $__compilerVar160);
$__output .= $__compilerVar157;
unset($__compilerVar157);
$__output .= '
			';
}
else
{
$__output .= '
				';
if ($post['post_id'] != $thread['first_post_id'])
{
$__compilerVar162 = '';
$__compilerVar163 = '';
$__compilerVar163 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar164 = '';
$__compilerVar164 .= XenForo_Template_Helper_Core::link('posts/likes', $post, array());
$__compilerVar165 = '';
if ($post['attachments'])
{
$__compilerVar166 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar166 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Các file đính kèm' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($post['attachments'] AS $attachment)
{
$__compilerVar166 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar167 = '';
$__compilerVar167 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar167 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar167 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar167 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar167 .= '
					</div>
					';
$__compilerVar166 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar167, array(
'attachment' => $attachment
));
unset($__compilerVar167);
$__compilerVar166 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'Kích thước' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Đọc' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar166 .= '
	</ul>
</div>

';
$__compilerVar165 .= $__compilerVar166;
unset($__compilerVar166);
}
$__compilerVar168 = '';
$__compilerVar168 .= '
				
		<div class="messageMeta">
			
			<div class="privateControls">
				';
if ($post['canInlineMod'])
{
$__compilerVar168 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar168 .= '
				<span class="item muted">
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',false,array(
'class' => 'author'
))) . ',
					<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="datePermalink">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date'
))) . '</a>
				</span>
				';
$__compilerVar169 = '';
$__compilerVar169 .= '
				';
if ($post['canEdit'])
{
$__compilerVar169 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $post, array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $post, array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Sửa' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar169 .= '
				';
}
$__compilerVar169 .= '
				';
if ($post['canDelete'])
{
$__compilerVar169 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $post, array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar169 .= '
				';
if ($post['canCleanSpam'])
{
$__compilerVar169 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $post, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar169 .= '
				';
if ($canViewIps AND $post['ip_id'])
{
$__compilerVar169 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $post, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar169 .= '
				
				';
if ($post['canWarn'])
{
$__compilerVar169 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $post, array(
'content_type' => 'post',
'content_id' => $post['post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($post['warning_id'] && $canViewWarnings)
{
$__compilerVar169 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $post, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar169 .= '
				';
if ($post['canReport'])
{
$__compilerVar169 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $post, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar169 .= '
				
				';
$__compilerVar168 .= $this->callTemplateHook('post_private_controls', $__compilerVar169, array(
'post' => $post
));
unset($__compilerVar169);
$__compilerVar168 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $post, array()) . '">#' . ($post['position'] + 1) . '</a>
				';
$__compilerVar170 = '';
$__compilerVar170 .= '
				';
if ($post['canLike'])
{
$__compilerVar170 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $post, array()) . '" class="LikeLink item control ' . (($post['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($post['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
				';
}
$__compilerVar170 .= '
				';
if ($canReply)
{
$__compilerVar170 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '" data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $post, array()) . '" class="ReplyQuote item control reply" title="' . 'Trả lời, trích dẫn nội dung bài viết này' . '"><span></span>' . 'Trả lời' . '</a>
				';
}
$__compilerVar170 .= '
				';
$__compilerVar168 .= $this->callTemplateHook('post_public_controls', $__compilerVar170, array(
'post' => $post
));
unset($__compilerVar170);
$__compilerVar168 .= '
			</div>
		</div>
	';
$__compilerVar171 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar171 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar171 .= '

<li id="' . htmlspecialchars($__compilerVar163, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($post['isDeleted']) ? ('deleted') : ('')) . ' ' . (($post['is_admin'] OR $post['is_moderator']) ? ('staff') : ('')) . ' ' . (($post['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		';
if ($post['isNew'])
{
$__compilerVar171 .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__compilerVar171 .= '

		';
$__compilerVar172 = '';
$__compilerVar172 .= '
					';
$__compilerVar173 = '';
$__compilerVar173 .= '
						';
if ($post['warning_message'])
{
$__compilerVar173 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($post['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar173 .= '
						';
if ($post['isDeleted'])
{
$__compilerVar173 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($post['isModerated'])
{
$__compilerVar173 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar173 .= '
						';
if ($post['isIgnored'])
{
$__compilerVar173 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar173 .= '
					';
$__compilerVar172 .= $this->callTemplateHook('message_simple_notices', $__compilerVar173, array(
'message' => $post
));
unset($__compilerVar173);
$__compilerVar172 .= '
				';
if (trim($__compilerVar172) !== '')
{
$__compilerVar171 .= '
			<ul class="messageNotices">
				' . $__compilerVar172 . '
			</ul>
		';
}
unset($__compilerVar172);
$__compilerVar171 .= '

		<div class="messageContent">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',false,array(
'class' => 'poster'
))) . '
			<article><blockquote class="ugc baseHtml' . (($post['isIgnored']) ? (' ignored') : ('')) . '">' . $post['messageHtml'] . '</blockquote></article>

			' . $__compilerVar165 . '
		</div>

		';
$__compilerVar174 = '';
$__compilerVar171 .= $this->callTemplateHook('dark_postrating_likes_bar_xenporta', $__compilerVar174, array(
'post' => $post,
'message_id' => $__compilerVar163
));
unset($__compilerVar174);
$__compilerVar171 .= '

		' . $__compilerVar168 . '
	</div>
</li>
';
$__compilerVar162 .= $__compilerVar171;
unset($__compilerVar163, $__compilerVar164, $__compilerVar165, $__compilerVar168, $__compilerVar171);
$__compilerVar162 .= '
';
$__output .= $__compilerVar162;
unset($__compilerVar162);
}
$__output .= '
			';
}
$__output .= '
		';
}
$__output .= '
		' . '
	</ol>

	';
if ($inlineModOptions)
{
$__output .= '
		<div class="sectionFooter InlineMod Hide">
			<label for="ModerationSelect">' . 'Perform action with selected posts' . '...</label>

			';
$__compilerVar175 = '';
$__compilerVar175 .= 'Post Moderation';
$__compilerVar176 = '';
$__compilerVar176 .= '
					';
if ($inlineModOptions['delete'])
{
$__compilerVar176 .= '<option value="delete">' . 'Xóa bài viết' . '...</option>';
}
$__compilerVar176 .= '
					';
if ($inlineModOptions['undelete'])
{
$__compilerVar176 .= '<option value="undelete">' . 'Bỏ xóa bài viết' . '</option>';
}
$__compilerVar176 .= '
					';
if ($inlineModOptions['approve'])
{
$__compilerVar176 .= '<option value="approve">' . 'Duyệt bài viết' . '</option>';
}
$__compilerVar176 .= '
					';
if ($inlineModOptions['unapprove'])
{
$__compilerVar176 .= '<option value="unapprove">' . 'Không duyệt bài viết' . '</option>';
}
$__compilerVar176 .= '
					';
if ($inlineModOptions['move'])
{
$__compilerVar176 .= '<option value="move">' . 'Di chuyển bài viết' . '...</option>';
}
$__compilerVar176 .= '
					';
if ($inlineModOptions['merge'])
{
$__compilerVar176 .= '<option value="merge">' . 'Gộp bài' . '...</option>';
}
$__compilerVar176 .= '
					<option value="deselect">' . 'Bỏ chọn bài viết' . '</option>
				';
$__compilerVar177 = '';
$__compilerVar177 .= 'Select / deselect all posts on this page';
$__compilerVar178 = '';
$__compilerVar178 .= 'Bài viết đã chọn';
$__compilerVar179 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar179 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar179 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar177, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar178, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar179 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar179 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar179 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar179 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar176 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__output .= $__compilerVar179;
unset($__compilerVar175, $__compilerVar176, $__compilerVar177, $__compilerVar178, $__compilerVar179);
$__output .= '
		</div>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>

';
$__compilerVar180 = '';
$__compilerVar180 .= '
			';
if ($canQuickReply)
{
$__compilerVar180 .= '
				';
if ($postsRemaining)
{
$__compilerVar180 .= '
					<div class="linkGroup">
						';
if ($postsRemaining == 1)
{
$__compilerVar180 .= '
							<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => ($page + 1)
)) . '" class="postsRemaining">' . '1 tin nhắn thêm' . '...</a>
						';
}
else
{
$__compilerVar180 .= '
							<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => ($page + 1)
)) . '" class="postsRemaining">' . '' . XenForo_Template_Helper_Core::numberFormat($postsRemaining, '0') . ' more messages' . '...</a>
						';
}
$__compilerVar180 .= '
					</div>
				';
}
$__compilerVar180 .= '
			';
}
else
{
$__compilerVar180 .= '
				<div class="linkGroup">
					';
if ($canReply)
{
$__compilerVar180 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array()) . '" class="callToAction"><span>' . 'Trả lời vào chủ đề' . '</span></a>
					';
}
else if ($visitor['user_id'])
{
$__compilerVar180 .= '
						(' . 'You have insufficient privileges to reply here.' . ')
					';
}
else
{
$__compilerVar180 .= '
						<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed">(' . 'Bạn phải Đăng nhập hoặc Đăng ký để trả lời bài viết.' . ')</a></label>
					';
}
$__compilerVar180 .= '
				</div>
			';
}
$__compilerVar180 .= '
			<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted jsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>

			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($postsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPosts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'threads', $thread, array(), htmlspecialchars($unreadLink, ENT_QUOTES, 'UTF-8'), array())) . '
		';
if (trim($__compilerVar180) !== '')
{
$__output .= '
	<div class="pageNavLinkGroup">
		' . $__compilerVar180 . '
	</div>
';
}
unset($__compilerVar180);
$__output .= '

';
$__compilerVar181 = '';
$__compilerVar182 = '';
$__compilerVar181 .= $this->callTemplateHook('ad_thread_view_below_messages', $__compilerVar182, array());
unset($__compilerVar182);
$__compilerVar181 .= '
<li id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_admin'] OR $message['is_moderator']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">
<div class="comment_fbdiv" ></div>
<div id="fb-root"></div>
<h4 class="threadinfohead blockhead" style="background-color: #45619D;margin:-1px;padding:10px">Bình Luận Bằng Facebook</h4>
<div class="fb-comments" data-href="http://techlife.com.vn/' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" data-num-posts="10" data-width="1200"></div>
</li>';
$__output .= $__compilerVar181;
unset($__compilerVar181);
$__output .= '

';
$__compilerVar183 = '';
$__output .= $this->callTemplateHook('thread_view_qr_before', $__compilerVar183, array(
'thread' => $thread
));
unset($__compilerVar183);
$__output .= '

';
if ($canQuickReply)
{
$__output .= '
	';
$__compilerVar184 = '';
$__compilerVar184 .= XenForo_Template_Helper_Core::link('threads/add-reply', $thread, array());
$__compilerVar185 = '';
$__compilerVar185 .= htmlspecialchars($lastPost['post_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar186 = '';
$__compilerVar186 .= '1';
$__compilerVar187 = '';
$this->addRequiredExternal('css', 'quick_reply');
$__compilerVar187 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar187 .= '

<div class="quickReply message">
	
	';
$__compilerVar188 = '';
$__compilerVar188 .= '1';
$__compilerVar189 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar189 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($visitor['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar190 = '';
$__compilerVar190 .= '
		<div class="avatarHolder">
			<span class="helper"></span>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$user',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
if ($visitor['isOnline'])
{
$__compilerVar190 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar190 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar189 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar190, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar188
));
unset($__compilerVar190);
$__compilerVar189 .= '

';
if (!$__compilerVar188)
{
$__compilerVar189 .= '
	';
$__compilerVar191 = '';
$__compilerVar191 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($visitor,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar192 = '';
$__compilerVar192 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $visitor,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar192) !== '')
{
$__compilerVar191 .= '<em class="userTitle" itemprop="title">' . $__compilerVar192 . '</em>';
}
unset($__compilerVar192);
$__compilerVar191 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $visitor,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar189 .= $this->callTemplateHook('message_user_info_text', $__compilerVar191, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar188
));
unset($__compilerVar191);
$__compilerVar189 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar193 = '';
$__compilerVar193 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar193 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar193 .= '
';
}
$__compilerVar193 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar193 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar193 .= '
';
}
$__compilerVar193 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar193 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar193 .= '
';
}
$__compilerVar193 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar193 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar193 .= '
';
}
$__compilerVar193 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar193 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar193 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar193 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar193 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar193 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar193 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar193 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar193 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar193 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar193 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar193 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar193 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar193 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar193 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar193 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar193 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar193 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar193 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar193 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar193 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar193 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar193 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar193 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar193 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar193 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar193 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar193 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar193 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar193 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar193 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar193 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar193 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar193 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar193 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar193 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar193 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar193 .= '
		
	</ul>
';
}
$__compilerVar189 .= $__compilerVar193;
unset($__compilerVar193);
}
$__compilerVar189 .= '
    ';
$__compilerVar194 = '';
$__compilerVar194 .= '
			';
$__compilerVar195 = '';
$__compilerVar195 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $visitor['user_id'])
{
$__compilerVar195 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($visitor['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar195 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $visitor['user_id'])
{
$__compilerVar195 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar195 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $visitor['user_id'])
{
$__compilerVar195 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar195 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $visitor['user_id'])
{
$__compilerVar195 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $visitor, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar195 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $visitor['gender'])
{
$__compilerVar195 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($visitor['gender'] == ('male'))
{
$__compilerVar195 .= 'Nam';
}
else
{
$__compilerVar195 .= 'Nữ';
}
$__compilerVar195 .= '</dd>
					</dl>
				';
}
$__compilerVar195 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $visitor['occupation'])
{
$__compilerVar195 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar195 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $visitor['location'])
{
$__compilerVar195 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nơi ở' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $visitor['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar195 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $visitor['homepage'])
{
$__compilerVar195 .= '
					<dl class="pairsJustified">
						<dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar195 .= '
							
			';
$__compilerVar194 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar195, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar188
));
unset($__compilerVar195);
$__compilerVar194 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $visitor['customFields'])
{
$__compilerVar194 .= '
			';
$__compilerVar196 = '';
$__compilerVar196 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar196 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $visitor['allow_view_identities'] == ('everyone') OR ($visitor['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar196 .= '
						';
$__compilerVar197 = '';
$__compilerVar197 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $visitor,
'2' => $visitor['customFields'][$fieldId]
));
if (trim($__compilerVar197) !== '')
{
$__compilerVar196 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar197 . '</dd>
							</dl>
						';
}
unset($__compilerVar197);
$__compilerVar196 .= '
					';
}
$__compilerVar196 .= '
				';
}
$__compilerVar196 .= '
				
			';
$__compilerVar194 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar196, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar188
));
unset($__compilerVar196);
$__compilerVar194 .= '
			';
}
$__compilerVar194 .= '
			';
if (trim($__compilerVar194) !== '')
{
$__compilerVar189 .= '
		<div class="extraUserInfo">
			' . $__compilerVar194 . '
		</div>
	';
}
unset($__compilerVar194);
$__compilerVar189 .= '
		
';
}
$__compilerVar189 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar187 .= $__compilerVar189;
unset($__compilerVar188, $__compilerVar189);
$__compilerVar187 .= '

	<form action="' . htmlspecialchars($__compilerVar184, ENT_QUOTES, 'UTF-8', (false)) . '" method="post" class="AutoValidator blendedEditor" data-optInOut="OptIn" id="QuickReply">

		' . $qrEditor . '<div class="floatLeft">';
$__compilerVar198 = '';
if ($captcha)
{
$__compilerVar198 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar187 .= $__compilerVar198;
unset($__compilerVar198);
$__compilerVar187 .= '</div>

		<div class="submitUnit">
			<div class="draftUpdate">
				<span class="draftSaved">' . 'Bản thảo đã lưu' . '</span>
				<span class="draftDeleted">' . 'Bản thảo đã xóa' . '</span>
			</div>
			';
if ($xenOptions['multiQuote'] AND $multiQuoteAction)
{
$__compilerVar187 .= '<input type="button" class="button JsOnly MultiQuoteWatcher insertQuotes" id="MultiQuote"
				value="' . 'Insert Quotes' . '..."
				tabindex="1"
				data-href="' . htmlspecialchars($multiQuoteAction, ENT_QUOTES, 'UTF-8', (false)) . '"
				' . (($multiQuoteCookie) ? ('data-mq-cookie="' . htmlspecialchars($multiQuoteCookie, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
				data-add="' . '+ Quote' . '"
				data-add-message="' . 'Message added to multi-quote.' . '"
				data-remove="' . '− Quote' . '"
				data-remove-message="' . 'Message removed from multi-quote.' . '"
				data-cacheOverlay="false" />';
}
$__compilerVar187 .= '
			<input type="submit" class="button primary" value="' . 'Gửi trả lời' . '" accesskey="s" />
			';
$__compilerVar199 = '';
if ($attachmentParams)
{
$__compilerVar199 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar199 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar199 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar199 .= '
	';
}
$__compilerVar199 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar199 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $attachmentButtonKey
)) . '"
		data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $attachmentButtonKey
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar199 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar199 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar187 .= $__compilerVar199;
unset($__compilerVar199);
$__compilerVar187 .= '
			';
if ($__compilerVar186)
{
$__compilerVar187 .= '<input type="submit" class="button DisableOnSubmit" value="' . 'Thêm tùy chọn' . '..." name="more_options" />';
}
$__compilerVar187 .= '
		</div>
		
		';
if ($attachmentParams)
{
$__compilerVar187 .= '
			';
$__compilerVar200 = $attachmentParams['attachments'];
$__compilerVar201 = '';
if ($attachmentParams)
{
$__compilerVar201 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar201 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar201 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar201 .= '
			';
$__compilerVar202 = '';
if ($attachmentParams)
{
$__compilerVar202 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar202 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar202 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar202 .= '
	';
}
$__compilerVar202 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar202 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $attachmentButtonKey
)) . '"
		data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $attachmentButtonKey
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar202 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar202 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar201 .= $__compilerVar202;
unset($__compilerVar202);
$__compilerVar201 .= '
		';
}
$__compilerVar201 .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Chèn các ảnh theo kiểu' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar203 = '';
$__compilerVar203 .= '1';
$__compilerVar204 = '';
$__compilerVar205 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar205 .= '

<li id="' . (($__compilerVar203) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar204['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar204 and $__compilerVar204['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar204 and $__compilerVar204['thumbnailUrl'])
{
$__compilerVar205 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar204, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar204['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar204['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar204['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar204, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar205 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar205 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar204, array()) . '" target="_blank">' . (($__compilerVar204) ? (htmlspecialchars($__compilerVar204['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar203)
{
$__compilerVar205 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar205 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($__compilerVar204['thumbnailUrl'])
{
$__compilerVar205 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar205 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar204, array()) . '" />
			
				';
if ($__compilerVar204['thumbnailUrl'])
{
$__compilerVar205 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar205 .= '
			</div>
		';
}
$__compilerVar205 .= '

	</div>
	
</li>';
$__compilerVar201 .= $__compilerVar205;
unset($__compilerVar203, $__compilerVar204, $__compilerVar205);
$__compilerVar201 .= '
			';
if ($__compilerVar200)
{
$__compilerVar201 .= '
				';
foreach ($__compilerVar200 AS $attachment)
{
$__compilerVar201 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar201 .= '
						';
$__compilerVar206 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar206 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar206 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar206 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar206 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar206 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar206 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar206 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar206 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar206 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar206 .= '
			</div>
		';
}
$__compilerVar206 .= '

	</div>
	
</li>';
$__compilerVar201 .= $__compilerVar206;
unset($__compilerVar206);
$__compilerVar201 .= '
					';
}
$__compilerVar201 .= '
				';
}
$__compilerVar201 .= '
			';
}
$__compilerVar201 .= '
		</ol>
	
		';
if ($__compilerVar200)
{
$__compilerVar201 .= '
			';
$__compilerVar207 = '';
$__compilerVar207 .= '
					';
foreach ($__compilerVar200 AS $attachment)
{
$__compilerVar207 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar207 .= '
							';
$__compilerVar208 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar208 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar208 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar208 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar208 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar208 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar208 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar208 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar208 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar208 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar208 .= '
			</div>
		';
}
$__compilerVar208 .= '

	</div>
	
</li>';
$__compilerVar207 .= $__compilerVar208;
unset($__compilerVar208);
$__compilerVar207 .= '
						';
}
$__compilerVar207 .= '
					';
}
$__compilerVar207 .= '
				';
if (trim($__compilerVar207) !== '')
{
$__compilerVar201 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar207 . '
			</ol>
			';
}
unset($__compilerVar207);
$__compilerVar201 .= '
		';
}
$__compilerVar201 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__compilerVar187 .= $__compilerVar201;
unset($__compilerVar200, $__compilerVar201);
$__compilerVar187 .= '
		';
}
$__compilerVar187 .= '

		<input type="hidden" name="last_date" value="' . htmlspecialchars($__compilerVar185, ENT_QUOTES, 'UTF-8') . '" data-load-value="' . htmlspecialchars($__compilerVar185, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="last_known_date" value="' . htmlspecialchars($lastKnownDate, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

	</form>

</div>';
$__output .= $__compilerVar187;
unset($__compilerVar184, $__compilerVar185, $__compilerVar186, $__compilerVar187);
$__output .= '
';
}
$__output .= '

';
$__compilerVar209 = '';
$__output .= $this->callTemplateHook('thread_view_qr_after', $__compilerVar209, array(
'thread' => $thread
));
unset($__compilerVar209);
$__output .= '

' . $threadStatusHtml . '

';
$__compilerVar210 = '';
$__compilerVar210 .= XenForo_Template_Helper_Core::link('canonical:threads', $thread, array());
$__compilerVar211 = '';
$__compilerVar212 = '';
$__compilerVar212 .= '
			';
$__compilerVar213 = '';
$__compilerVar213 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar213 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar210, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar213 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar213 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar210, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar213 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar213 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar213 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar210, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar213 .= '
			';
$__compilerVar212 .= $this->callTemplateHook('share_page_options', $__compilerVar213, array());
unset($__compilerVar213);
$__compilerVar212 .= '
		';
if (trim($__compilerVar212) !== '')
{
$__compilerVar211 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar211 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar212 . '
	</div>
';
}
unset($__compilerVar212);
$__output .= $__compilerVar211;
unset($__compilerVar210, $__compilerVar211);
$__output .= '

';
$__compilerVar214 = '';
$__output .= $this->callTemplateHook('thread_view_share_after', $__compilerVar214, array(
'thread' => $thread
));
unset($__compilerVar214);
$__output .= '
';
