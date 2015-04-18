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
	' . 'Discussion in \'' . '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '\' started by ' . XenForo_Template_Helper_Core::callHelper('username', array(
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
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:threads', $thread, array());
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $thread,
'1' => 'm',
'2' => '0',
'3' => '1'
));
$__compilerVar4 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($__compilerVar3)
{
$__compilerVar4 .= '<meta property="og:image" content="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" />';
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
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
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
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
));
$__output .= '
';
$__extraData['searchBar']['thread'] = '';
$__compilerVar6 = '';
$__compilerVar6 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar7 = '';
$__compilerVar7 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Display results as threads' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar7;
unset($__compilerVar7);
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
$__compilerVar8 = '';
$__compilerVar9 = '';
$__compilerVar9 .= 'post-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar10 = '';
$__compilerVar10 .= XenForo_Template_Helper_Core::link('posts/likes', $posts[$thread['first_post_id']], array());
$__compilerVar11 = '';
if ($posts[$thread['first_post_id']]['attachments'])
{
$__compilerVar12 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar12 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Attached Files' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($posts[$thread['first_post_id']]['attachments'] AS $attachment)
{
$__compilerVar12 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar13 = '';
$__compilerVar13 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar13 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar13 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar13 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar13 .= '
					</div>
					';
$__compilerVar12 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar13, array(
'attachment' => $attachment
));
unset($__compilerVar13);
$__compilerVar12 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'File size' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar12 .= '
	</ul>
</div>

';
$__compilerVar11 .= $__compilerVar12;
unset($__compilerVar12);
}
$__compilerVar14 = '';
$__compilerVar14 .= '
				
		<div class="messageMeta ToggleTriggerAnchor">
			
			<div class="privateControls">
				';
if ($posts[$thread['first_post_id']]['canInlineMod'])
{
$__compilerVar14 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($posts[$thread['first_post_id']]['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar14 .= '
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
$__compilerVar15 = '';
$__compilerVar15 .= '
				';
if ($posts[$thread['first_post_id']]['canEdit'])
{
$__compilerVar15 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $posts[$thread['first_post_id']], array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $posts[$thread['first_post_id']], array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Edit' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar15 .= '
				';
}
$__compilerVar15 .= '
				';
if ($posts[$thread['first_post_id']]['edit_count'] && $posts[$thread['first_post_id']]['canViewHistory'])
{
$__compilerVar15 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/history', $posts[$thread['first_post_id']], array()) . '" class="item control history ToggleTrigger"><span></span>' . 'History' . '</a>';
}
$__compilerVar15 .= '
				';
if ($posts[$thread['first_post_id']]['canDelete'])
{
$__compilerVar15 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $posts[$thread['first_post_id']], array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Delete' . '</a>';
}
$__compilerVar15 .= '
				';
if ($posts[$thread['first_post_id']]['canCleanSpam'])
{
$__compilerVar15 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $posts[$thread['first_post_id']], array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar15 .= '
				';
if ($canViewIps AND $posts[$thread['first_post_id']]['ip_id'])
{
$__compilerVar15 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $posts[$thread['first_post_id']], array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar15 .= '
				
				';
if ($posts[$thread['first_post_id']]['canWarn'])
{
$__compilerVar15 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $posts[$thread['first_post_id']], array(
'content_type' => 'post',
'content_id' => $posts[$thread['first_post_id']]['post_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
				';
}
else if ($posts[$thread['first_post_id']]['warning_id'] && $canViewWarnings)
{
$__compilerVar15 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $posts[$thread['first_post_id']], array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar15 .= '
				';
if ($posts[$thread['first_post_id']]['canReport'])
{
$__compilerVar15 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $posts[$thread['first_post_id']], array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
				';
}
$__compilerVar15 .= '
				
				';
$__compilerVar14 .= $this->callTemplateHook('post_private_controls', $__compilerVar15, array(
'post' => $posts[$thread['first_post_id']]
));
unset($__compilerVar15);
$__compilerVar14 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $posts[$thread['first_post_id']]
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $posts[$thread['first_post_id']], array()) . '">#' . ($posts[$thread['first_post_id']]['position'] + 1) . '</a>
				';
$__compilerVar16 = '';
$__compilerVar16 .= '
				';
if ($posts[$thread['first_post_id']]['canLike'])
{
$__compilerVar16 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $posts[$thread['first_post_id']], array()) . '" class="LikeLink item control ' . (($posts[$thread['first_post_id']]['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($posts[$thread['first_post_id']]['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
				';
}
$__compilerVar16 .= '
				';
if ($canReply)
{
$__compilerVar16 .= '
					';
if ($xenOptions['multiQuote'])
{
$__compilerVar16 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $posts[$thread['first_post_id']]['post_id']
)) . '"
						data-messageid="' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="MultiQuoteControl JsOnly item control"
						title="' . 'Toggle Multi-Quote' . '"><span></span><span class="symbol">' . '+ Quote' . '</span></a>';
}
$__compilerVar16 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $posts[$thread['first_post_id']]['post_id']
)) . '"
						data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $posts[$thread['first_post_id']], array()) . '"
						data-tip="#MQ-' . htmlspecialchars($posts[$thread['first_post_id']]['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="ReplyQuote item control reply"
						title="' . 'Reply, quoting this message' . '"><span></span>' . 'Reply' . '</a>
				';
}
$__compilerVar16 .= '
				';
$__compilerVar14 .= $this->callTemplateHook('post_public_controls', $__compilerVar16, array(
'post' => $posts[$thread['first_post_id']]
));
unset($__compilerVar16);
$__compilerVar14 .= '
			</div>
		</div>
	';
$__compilerVar17 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar17 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar17 .= '

<li id="' . htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($posts[$thread['first_post_id']]['isDeleted']) ? ('deleted') : ('')) . ' ' . (($posts[$thread['first_post_id']]['is_staff']) ? ('staff') : ('')) . ' ' . (($posts[$thread['first_post_id']]['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($posts[$thread['first_post_id']]['username'], ENT_QUOTES, 'UTF-8') . '">

	';
$__compilerVar18 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar18 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($posts[$thread['first_post_id']]['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar19 = '';
$__compilerVar19 .= '
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
$__compilerVar19 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar19 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar18 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar19, array(
'user' => $posts[$thread['first_post_id']],
'isQuickReply' => $isQuickReply
));
unset($__compilerVar19);
$__compilerVar18 .= '

';
if (!$isQuickReply)
{
$__compilerVar18 .= '
	';
$__compilerVar20 = '';
$__compilerVar20 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($posts[$thread['first_post_id']],'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar21 = '';
$__compilerVar21 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $posts[$thread['first_post_id']],
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar21) !== '')
{
$__compilerVar20 .= '<em class="userTitle" itemprop="title">' . $__compilerVar21 . '</em>';
}
unset($__compilerVar21);
$__compilerVar20 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $posts[$thread['first_post_id']],
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar18 .= $this->callTemplateHook('message_user_info_text', $__compilerVar20, array(
'user' => $posts[$thread['first_post_id']],
'isQuickReply' => $isQuickReply
));
unset($__compilerVar20);
$__compilerVar18 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar22 = '';
$__compilerVar22 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar22 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar22 .= '
';
}
$__compilerVar22 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar22 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar22 .= '
';
}
$__compilerVar22 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar22 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar22 .= '
';
}
$__compilerVar22 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar22 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar22 .= '
';
}
$__compilerVar22 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar22 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar22 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar22 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar22 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar22 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar22 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar22 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar22 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar22 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar22 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar22 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar22 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar22 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar22 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar22 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar22 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar22 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar22 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar22 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar22 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar22 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar22 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar22 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar22 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar22 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar22 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar22 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar22 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar22 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar22 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar22 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar22 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar22 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar22 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar22 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $posts[$thread['first_post_id']],
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar22 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar22 .= '
		
	</ul>
';
}
$__compilerVar18 .= $__compilerVar22;
unset($__compilerVar22);
}
$__compilerVar18 .= '
    ';
$__compilerVar23 = '';
$__compilerVar23 .= '
			';
$__compilerVar24 = '';
$__compilerVar24 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $posts[$thread['first_post_id']]['user_id'])
{
$__compilerVar24 .= '
					<dl class="pairsJustified">
						<dt>' . 'Joined' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($posts[$thread['first_post_id']]['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar24 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $posts[$thread['first_post_id']]['user_id'])
{
$__compilerVar24 .= '
					<dl class="pairsJustified">
						<dt>' . 'Messages' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $posts[$thread['first_post_id']]['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($posts[$thread['first_post_id']]['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar24 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $posts[$thread['first_post_id']]['user_id'])
{
$__compilerVar24 .= '
					<dl class="pairsJustified">
						<dt>' . 'Likes Received' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($posts[$thread['first_post_id']]['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar24 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $posts[$thread['first_post_id']]['user_id'])
{
$__compilerVar24 .= '
					<dl class="pairsJustified">
						<dt>' . 'Trophy Points' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $posts[$thread['first_post_id']], array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($posts[$thread['first_post_id']]['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar24 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $posts[$thread['first_post_id']]['gender'])
{
$__compilerVar24 .= '
					<dl class="pairsJustified">
						<dt>' . 'Gender' . ':</dt>
						<dd itemprop="gender">';
if ($posts[$thread['first_post_id']]['gender'] == ('male'))
{
$__compilerVar24 .= 'Male';
}
else
{
$__compilerVar24 .= 'Female';
}
$__compilerVar24 .= '</dd>
					</dl>
				';
}
$__compilerVar24 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $posts[$thread['first_post_id']]['occupation'])
{
$__compilerVar24 .= '
					<dl class="pairsJustified">
						<dt>' . 'Occupation' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($posts[$thread['first_post_id']]['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar24 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $posts[$thread['first_post_id']]['location'])
{
$__compilerVar24 .= '
					<dl class="pairsJustified">
						<dt>' . 'Location' . ':</dt>
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
$__compilerVar24 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $posts[$thread['first_post_id']]['homepage'])
{
$__compilerVar24 .= '
					<dl class="pairsJustified">
						<dt>' . 'Home Page' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($posts[$thread['first_post_id']]['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($posts[$thread['first_post_id']]['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar24 .= '
							
			';
$__compilerVar23 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar24, array(
'user' => $posts[$thread['first_post_id']],
'isQuickReply' => $isQuickReply
));
unset($__compilerVar24);
$__compilerVar23 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $posts[$thread['first_post_id']]['customFields'])
{
$__compilerVar23 .= '
			';
$__compilerVar25 = '';
$__compilerVar25 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar25 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $posts[$thread['first_post_id']]['allow_view_identities'] == ('everyone') OR ($posts[$thread['first_post_id']]['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar25 .= '
						';
$__compilerVar26 = '';
$__compilerVar26 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $posts[$thread['first_post_id']],
'2' => $posts[$thread['first_post_id']]['customFields'][$fieldId]
));
if (trim($__compilerVar26) !== '')
{
$__compilerVar25 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar26 . '</dd>
							</dl>
						';
}
unset($__compilerVar26);
$__compilerVar25 .= '
					';
}
$__compilerVar25 .= '
				';
}
$__compilerVar25 .= '
				
			';
$__compilerVar23 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar25, array(
'user' => $posts[$thread['first_post_id']],
'isQuickReply' => $isQuickReply
));
unset($__compilerVar25);
$__compilerVar23 .= '
			';
}
$__compilerVar23 .= '
			';
if (trim($__compilerVar23) !== '')
{
$__compilerVar18 .= '
		<div class="extraUserInfo">
			' . $__compilerVar23 . '
		</div>
	';
}
unset($__compilerVar23);
$__compilerVar18 .= '
		
';
}
$__compilerVar18 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar17 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar17 .= '

	<div class="messageInfo primaryContent">
		';
if ($posts[$thread['first_post_id']]['isNew'])
{
$__compilerVar17 .= '<strong class="newIndicator"><span></span>' . 'New' . '</strong>';
}
$__compilerVar17 .= '
		
		';
$__compilerVar27 = '';
$__compilerVar27 .= '
					';
$__compilerVar28 = '';
$__compilerVar28 .= '
						';
if ($posts[$thread['first_post_id']]['warning_message'])
{
$__compilerVar28 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($posts[$thread['first_post_id']]['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar28 .= '
						';
if ($posts[$thread['first_post_id']]['isDeleted'])
{
$__compilerVar28 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($posts[$thread['first_post_id']]['isModerated'])
{
$__compilerVar28 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar28 .= '
						';
if ($posts[$thread['first_post_id']]['isIgnored'])
{
$__compilerVar28 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar28 .= '
					';
$__compilerVar27 .= $this->callTemplateHook('message_notices', $__compilerVar28, array(
'message' => $posts[$thread['first_post_id']]
));
unset($__compilerVar28);
$__compilerVar27 .= '
				';
if (trim($__compilerVar27) !== '')
{
$__compilerVar17 .= '
			<ul class="messageNotices">
				' . $__compilerVar27 . '
			</ul>
		';
}
unset($__compilerVar27);
$__compilerVar17 .= '
		
		';
$__compilerVar29 = '';
$__compilerVar29 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText SelectQuoteContainer ugc baseHtml' . (($posts[$thread['first_post_id']]['isIgnored']) ? (' ignored') : ('')) . '">
					';
$__compilerVar30 = '';
$__compilerVar31 = '';
$__compilerVar30 .= $this->callTemplateHook('ad_message_body', $__compilerVar31, array());
unset($__compilerVar31);
$__compilerVar29 .= $__compilerVar30;
unset($__compilerVar30);
$__compilerVar29 .= '
					' . $posts[$thread['first_post_id']]['messageHtml'] . '
					<div class="messageTextEndMarker">&nbsp;</div>
				</blockquote>
			</article>
			
			' . $__compilerVar11 . '
		</div>
		';
$__compilerVar17 .= $this->callTemplateHook('message_content', $__compilerVar29, array(
'message' => $posts[$thread['first_post_id']]
));
unset($__compilerVar29);
$__compilerVar17 .= '
		
		';
if ($posts[$thread['first_post_id']]['last_edit_date'])
{
$__compilerVar17 .= '
			<div class="editDate">
			';
if ($posts[$thread['first_post_id']]['user_id'] == $posts[$thread['first_post_id']]['last_edit_user_id'])
{
$__compilerVar17 .= '
				' . 'Last edited' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($posts[$thread['first_post_id']]['last_edit_date'],array(
'time' => htmlspecialchars($posts[$thread['first_post_id']]['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar17 .= '
				' . 'Last edited by a moderator' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($posts[$thread['first_post_id']]['last_edit_date'],array(
'time' => htmlspecialchars($posts[$thread['first_post_id']]['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar17 .= '
			</div>
		';
}
$__compilerVar17 .= '
		
		';
if ($visitor['content_show_signature'] && $posts[$thread['first_post_id']]['signature'])
{
$__compilerVar17 .= '
			<div class="baseHtml signature messageText ugc' . (($posts[$thread['first_post_id']]['isIgnored']) ? (' ignored') : ('')) . '"><aside>' . $posts[$thread['first_post_id']]['signatureHtml'] . '</aside></div>
		';
}
$__compilerVar17 .= '
		
		' . $__compilerVar14 . '
		
		';
$__compilerVar32 = '';
$__compilerVar17 .= $this->callTemplateHook('dark_postrating_likes_bar', $__compilerVar32, array(
'post' => $posts[$thread['first_post_id']],
'message_id' => $__compilerVar9
));
unset($__compilerVar32);
$__compilerVar17 .= '
	</div>

	';
$__compilerVar33 = '';
$__compilerVar17 .= $this->callTemplateHook('message_below', $__compilerVar33, array(
'post' => $posts[$thread['first_post_id']],
'message_id' => $__compilerVar9
));
unset($__compilerVar33);
$__compilerVar17 .= '
	
	';
$__compilerVar34 = '';
$__compilerVar35 = '';
$__compilerVar34 .= $this->callTemplateHook('ad_message_below', $__compilerVar35, array());
unset($__compilerVar35);
$__compilerVar17 .= $__compilerVar34;
unset($__compilerVar34);
$__compilerVar17 .= '
';
$__compilerVar36 = '';
$__compilerVar17 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAd', $__compilerVar36, array(
'dp_ads' => $dp_ads
));
unset($__compilerVar36);
$__compilerVar17 .= '
</li>';
$__compilerVar8 .= $__compilerVar17;
unset($__compilerVar9, $__compilerVar10, $__compilerVar11, $__compilerVar14, $__compilerVar17);
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '

	<div class="categorySummary secondaryContent">
		';
if ($canEditThread)
{
$__output .= '
			<div class="categoryEdit">
				<a href="' . XenForo_Template_Helper_Core::link('threads/category', $thread, array()) . '" class="button OverlayTrigger">' . 'Edit' . '</a>
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
	<h1>' . 'Comments' . '</h1>
	<p id="pageDescription" class="muted">
	' . 'Discussion in \'' . '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '\' started by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread
)) . ', ' . '<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . XenForo_Template_Helper_Core::datetime($thread['post_date'], 'html') . '</a>' . '.' . '
	</p>
</div>

';
if ($poll)
{
$__output .= '
	';
$__compilerVar37 = '';
$__compilerVar37 .= '
			';
if ($poll['canVote'])
{
$__compilerVar37 .= '
				';
$__compilerVar38 = '';
$__compilerVar38 .= '
		
<div>		
	<ol class="pollOptions">
		';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar38 .= '
			<li class="pollOption"><label>';
if ($poll['max_votes'] != 1)
{
$__compilerVar38 .= '
				<input type="checkbox" name="response_multiple[]" class="PollResponse" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
else
{
$__compilerVar38 .= '
				<input type="radio" name="response" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar38 .= '
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '</label></li>				
		';
}
$__compilerVar38 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar39 = '';
$__compilerVar39 .= '
				';
if ($poll['max_votes'] == 0 OR $poll['max_votes'] > count($poll['responses']))
{
$__compilerVar39 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
else if ($poll['max_votes'] > 1)
{
$__compilerVar39 .= '
					<span class="multipleNote muted">' . 'You may select up to ' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . ' choices.' . '</span>
				';
}
$__compilerVar39 .= '
				';
if ($poll['public_votes'])
{
$__compilerVar39 .= '
					<span class="publicWarning muted">' . 'Your vote will be publicly visible.' . '</span>
				';
}
$__compilerVar39 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar39 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar39 .= '
			';
if (trim($__compilerVar39) !== '')
{
$__compilerVar38 .= '
			<div class="pollNotes">
			' . $__compilerVar39 . '
			</div>
		';
}
unset($__compilerVar39);
$__compilerVar38 .= '
			
		<input type="submit" class="button primary" value="' . 'Cast Your Vote' . '" accesskey="s" />
		';
if ($poll['canViewResults'])
{
$__compilerVar38 .= '
			<input type="button" value="' . 'View Results' . '" class="button OverlayTrigger JsOnly" data-href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" />
			<noscript><a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" class="button">' . 'View Results' . '</a></noscript>
		';
}
$__compilerVar38 .= '
	</div>
</div>';
$__compilerVar37 .= $__compilerVar38;
unset($__compilerVar38);
$__compilerVar37 .= '
			';
}
else
{
$__compilerVar37 .= '
				';
$__compilerVar40 = '';
$__compilerVar40 .= '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults ' . ((!$poll['canViewResults']) ? ('noResults') : ('')) . '">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar40 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar40 .= '
				<div class="votedIconCell" title="' . 'Your vote' . '">*</div>
			';
}
else
{
$__compilerVar40 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar40 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Your vote' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>
			';
if ($poll['canViewResults'])
{
$__compilerVar40 .= '
				<div class="barCell">
					<span class="barContainer">
						';
if ($response['response_vote_count'])
{
$__compilerVar40 .= '<span class="bar" style="width: ' . (100 * $response['response_vote_count'] / $poll['voter_count']) . '%"></span>';
}
$__compilerVar40 .= '
					</span>
				</div>
				<div class="count">
					';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar40 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '</a>
					';
}
else
{
$__compilerVar40 .= '
						' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '
					';
}
$__compilerVar40 .= '
				</div>
				<div class="percentage">
					';
if ($poll['voter_count'])
{
$__compilerVar40 .= '
						' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%
					';
}
else
{
$__compilerVar40 .= '
						' . XenForo_Template_Helper_Core::numberFormat('0', '1') . '%
					';
}
$__compilerVar40 .= '
				</div>
			';
}
$__compilerVar40 .= '
		</li>
	';
}
$__compilerVar40 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar41 = '';
$__compilerVar41 .= '
				';
if ($poll['max_votes'] != 1)
{
$__compilerVar41 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
$__compilerVar41 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar41 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar41 .= '
			';
if (trim($__compilerVar41) !== '')
{
$__compilerVar40 .= '
			<div class="pollNotes">
			' . $__compilerVar41 . '
			</div>
		';
}
unset($__compilerVar41);
$__compilerVar40 .= '
		
		';
if ($poll['canVote'])
{
$__compilerVar40 .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" class="button PollChangeVote nonOverlayOnly">' . 'Change Your Vote' . '</a>
		';
}
$__compilerVar40 .= '
	</div>
</div>';
$__compilerVar37 .= $__compilerVar40;
unset($__compilerVar40);
$__compilerVar37 .= '
			';
}
$__compilerVar37 .= '
		';
$__compilerVar42 = '';
$this->addRequiredExternal('css', 'polls');
$__compilerVar42 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar42 .= '

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
$__compilerVar42 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/poll/edit', $thread, array()) . '" class="editLink">' . 'Edit' . '</a>';
}
$__compilerVar42 .= '
					
					';
if ($poll['close_date'])
{
$__compilerVar42 .= '
						<div class="pollNotes closeDate muted">
							';
if ($poll['open'])
{
$__compilerVar42 .= '
								' . 'This poll will close on ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], 'absolute') . '.' . '
							';
}
else
{
$__compilerVar42 .= '
								' . 'Poll closed ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], '') . '.' . '
							';
}
$__compilerVar42 .= '
						</div>
					';
}
$__compilerVar42 .= '
				</div>
					
				' . $__compilerVar37 . '
			</div>
		</div>
	
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>';
$__output .= $__compilerVar42;
unset($__compilerVar37, $__compilerVar42);
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
$__compilerVar43 = '';
$__compilerVar43 .= '
				';
if ($thread['discussion_state'] == ('deleted'))
{
$__compilerVar43 .= '
					<dd class="deletedAlert">
						<span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip"></span>
							' . 'Removed from public view.' . '</dd>
				';
}
else if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar43 .= '
					<dd class="moderatedAlert">
						<span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip"></span>
							' . 'Awaiting moderation before being displayed publicly.' . '</dd>
				';
}
$__compilerVar43 .= '
	
				';
if (!$thread['discussion_open'])
{
$__compilerVar43 .= '
					<dd class="lockedAlert">
						<span class="icon Tooltip" title="' . 'Locked' . '" data-tipclass="iconTip"></span>
							' . 'Not open for further replies.' . '</dd>
				';
}
$__compilerVar43 .= '
			';
if (trim($__compilerVar43) !== '')
{
$threadStatusHtml .= '
		<dl class="threadAlerts secondaryContent">
			<dt>' . 'Thread Status' . ':</dt>
			' . $__compilerVar43 . '
		</dl>
	';
}
unset($__compilerVar43);
$threadStatusHtml .= '
';
$__output .= '
' . $threadStatusHtml . '

';
$__compilerVar44 = '';
$__output .= $this->callTemplateHook('thread_view_pagenav_before', $__compilerVar44, array(
'thread' => $thread
));
unset($__compilerVar44);
$__output .= '

<div class="pageNavLinkGroup">
	<div class="linkGroup SelectionCountContainer">
		';
$__compilerVar45 = '';
$__compilerVar45 .= '
							';
if ($canEditThread)
{
$__compilerVar45 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/edit', $thread, array()) . '" class="OverlayTrigger">' . 'Edit Thread' . '</a></li>
							';
}
$__compilerVar45 .= '
							';
if ($canDeleteThread)
{
$__compilerVar45 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/delete', $thread, array()) . '" class="OverlayTrigger">' . 'Delete Thread' . '</a></li>
							';
}
$__compilerVar45 .= '
							';
if ($canMoveThread)
{
$__compilerVar45 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/move', $thread, array()) . '" class="OverlayTrigger">' . 'Move Thread' . '</a></li>
							';
}
$__compilerVar45 .= '
							';
if ($deletedPosts)
{
$__compilerVar45 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'page' => $page
)) . '" class="MessageLoader" data-messageSelector="#messageList .message.deleted.placeholder">' . 'Show Deleted Posts' . '</a></li>
							';
}
$__compilerVar45 .= '
						';
if (trim($__compilerVar45) !== '')
{
$__output .= '
			<div class="Popup">
				<a rel="Menu">' . 'Thread Tools' . '</a>
				<div class="Menu">
					<div class="primaryContent menuHeader"><h3>' . 'Thread Tools' . '</h3></div>
					<ul class="secondaryContent blockLinksList">
						' . $__compilerVar45 . '
					</ul>
					';
$__compilerVar46 = '';
$__compilerVar46 .= '
							';
if ($canLockUnlockThread)
{
$__compilerVar46 .= '
							<li><label><input type="checkbox" name="discussion_open" value="1" class="SubmitOnChange" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' />
								' . 'Open' . '</label>
								<input type="hidden" name="set[discussion_open]" value="1" /></li>';
}
$__compilerVar46 .= '
							';
if ($canStickUnstickThread)
{
$__compilerVar46 .= ' 
							<li><label><input type="checkbox" name="sticky" value="1" class="SubmitOnChange" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' />
								' . 'Sticky' . '</label>
								<input type="hidden" name="set[sticky]" value="1" /></li>';
}
$__compilerVar46 .= '
						';
if (trim($__compilerVar46) !== '')
{
$__output .= '
					<form action="' . XenForo_Template_Helper_Core::link('threads/quick-update', $thread, array()) . '" method="post" class="AutoValidator">
						<ul class="secondaryContent blockLinksList checkboxColumns">
						' . $__compilerVar46 . '
						</ul>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
					';
}
unset($__compilerVar46);
$__output .= '
					';
if ($thread['canInlineMod'])
{
$__output .= '
					<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post" class="InlineModForm sectionFooter" id="threadViewThreadCheck"
						data-cookieName="threads">
						<label><input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" /> ' . 'Select for Thread Moderation' . '</label>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
					';
}
$__output .= '
				</div>
			</div>
		';
}
unset($__compilerVar45);
$__output .= '
		';
if ($canWatchThread)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/watch-confirm', $thread, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($thread['thread_is_watched']) ? ('Unwatch Thread') : ('Watch Thread')) . '</a>
		';
}
$__output .= '
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($postsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPosts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'threads', $thread, array(), htmlspecialchars($unreadLink, ENT_QUOTES, 'UTF-8'), array())) . '
</div>

';
$__compilerVar47 = '';
$__compilerVar48 = '';
$__compilerVar47 .= $this->callTemplateHook('ad_thread_view_above_messages', $__compilerVar48, array());
unset($__compilerVar48);
$__output .= $__compilerVar47;
unset($__compilerVar47);
$__output .= '

';
$__compilerVar49 = '';
$__output .= $this->callTemplateHook('thread_view_form_before', $__compilerVar49, array(
'thread' => $thread
));
unset($__compilerVar49);
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
$__compilerVar50 = '';
$__compilerVar51 = '';
$__compilerVar51 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar52 = '';
$__compilerVar52 .= '
		';
if ($post['canInlineMod'])
{
$__compilerVar52 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" title="' . 'Select this post' . '" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar52 .= '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date',
'class' => 'muted item'
))) . '
		
		<a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'post_id' => $post['post_id']
)) . '" class="MessageLoader control item show" data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>		
	';
$__compilerVar53 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar53 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar53 .= '

<li id="' . htmlspecialchars($__compilerVar51, ENT_QUOTES, 'UTF-8') . '" class="message deleted placeholder ' . (($post['isIgnored']) ? ('ignored') : ('')) . '">
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
$__compilerVar53 .= '
					' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post['deleteInfo']
)) . '' . ',
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['delete_date'],array(
'time' => htmlspecialchars($post['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($post['delete_reason'])
{
$__compilerVar53 .= ', ' . 'Reason' . ': ' . htmlspecialchars($post['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar53 .= '.
				';
}
$__compilerVar53 .= '
			</div>
			
			';
$__compilerVar54 = '';
$__compilerVar53 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAdCounterAdvance', $__compilerVar54, array());
unset($__compilerVar54);
$__compilerVar53 .= '
<div class="messageMeta">
				<div class="privateControls">' . $__compilerVar52 . '</div>
			</div>
		</div>
		
	</div>
</li>';
$__compilerVar50 .= $__compilerVar53;
unset($__compilerVar51, $__compilerVar52, $__compilerVar53);
$__output .= $__compilerVar50;
unset($__compilerVar50);
$__output .= '
			';
}
else
{
$__output .= '
				';
if ($post['post_id'] != $thread['first_post_id'])
{
$__compilerVar55 = '';
$__compilerVar56 = '';
$__compilerVar56 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar57 = '';
$__compilerVar57 .= XenForo_Template_Helper_Core::link('posts/likes', $post, array());
$__compilerVar58 = '';
if ($post['attachments'])
{
$__compilerVar59 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar59 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Attached Files' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($post['attachments'] AS $attachment)
{
$__compilerVar59 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar60 = '';
$__compilerVar60 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar60 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar60 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar60 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar60 .= '
					</div>
					';
$__compilerVar59 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar60, array(
'attachment' => $attachment
));
unset($__compilerVar60);
$__compilerVar59 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'File size' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar59 .= '
	</ul>
</div>

';
$__compilerVar58 .= $__compilerVar59;
unset($__compilerVar59);
}
$__compilerVar61 = '';
$__compilerVar61 .= '
				
		<div class="messageMeta">
			
			<div class="privateControls">
				';
if ($post['canInlineMod'])
{
$__compilerVar61 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar61 .= '
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
$__compilerVar62 = '';
$__compilerVar62 .= '
				';
if ($post['canEdit'])
{
$__compilerVar62 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $post, array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $post, array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Edit' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar62 .= '
				';
}
$__compilerVar62 .= '
				';
if ($post['canDelete'])
{
$__compilerVar62 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $post, array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Delete' . '</a>';
}
$__compilerVar62 .= '
				';
if ($post['canCleanSpam'])
{
$__compilerVar62 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $post, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar62 .= '
				';
if ($canViewIps AND $post['ip_id'])
{
$__compilerVar62 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $post, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar62 .= '
				
				';
if ($post['canWarn'])
{
$__compilerVar62 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $post, array(
'content_type' => 'post',
'content_id' => $post['post_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
				';
}
else if ($post['warning_id'] && $canViewWarnings)
{
$__compilerVar62 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $post, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar62 .= '
				';
if ($post['canReport'])
{
$__compilerVar62 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $post, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
				';
}
$__compilerVar62 .= '
				
				';
$__compilerVar61 .= $this->callTemplateHook('post_private_controls', $__compilerVar62, array(
'post' => $post
));
unset($__compilerVar62);
$__compilerVar61 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $post, array()) . '">#' . ($post['position'] + 1) . '</a>
				';
$__compilerVar63 = '';
$__compilerVar63 .= '
				';
if ($post['canLike'])
{
$__compilerVar63 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $post, array()) . '" class="LikeLink item control ' . (($post['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($post['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
				';
}
$__compilerVar63 .= '
				';
if ($canReply)
{
$__compilerVar63 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '" data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $post, array()) . '" class="ReplyQuote item control reply" title="' . 'Reply, quoting this message' . '"><span></span>' . 'Reply' . '</a>
				';
}
$__compilerVar63 .= '
				';
$__compilerVar61 .= $this->callTemplateHook('post_public_controls', $__compilerVar63, array(
'post' => $post
));
unset($__compilerVar63);
$__compilerVar61 .= '
			</div>
		</div>
	';
$__compilerVar64 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar64 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar64 .= '

<li id="' . htmlspecialchars($__compilerVar56, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($post['isDeleted']) ? ('deleted') : ('')) . ' ' . (($post['is_admin'] OR $post['is_moderator']) ? ('staff') : ('')) . ' ' . (($post['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		';
if ($post['isNew'])
{
$__compilerVar64 .= '<strong class="newIndicator"><span></span>' . 'New' . '</strong>';
}
$__compilerVar64 .= '

		';
$__compilerVar65 = '';
$__compilerVar65 .= '
					';
$__compilerVar66 = '';
$__compilerVar66 .= '
						';
if ($post['warning_message'])
{
$__compilerVar66 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($post['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar66 .= '
						';
if ($post['isDeleted'])
{
$__compilerVar66 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($post['isModerated'])
{
$__compilerVar66 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar66 .= '
						';
if ($post['isIgnored'])
{
$__compilerVar66 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar66 .= '
					';
$__compilerVar65 .= $this->callTemplateHook('message_simple_notices', $__compilerVar66, array(
'message' => $post
));
unset($__compilerVar66);
$__compilerVar65 .= '
				';
if (trim($__compilerVar65) !== '')
{
$__compilerVar64 .= '
			<ul class="messageNotices">
				' . $__compilerVar65 . '
			</ul>
		';
}
unset($__compilerVar65);
$__compilerVar64 .= '

		<div class="messageContent">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',false,array(
'class' => 'poster'
))) . '
			<article><blockquote class="ugc baseHtml' . (($post['isIgnored']) ? (' ignored') : ('')) . '">' . $post['messageHtml'] . '</blockquote></article>

			' . $__compilerVar58 . '
		</div>

		';
$__compilerVar67 = '';
$__compilerVar64 .= $this->callTemplateHook('dark_postrating_likes_bar_xenporta', $__compilerVar67, array(
'post' => $post,
'message_id' => $__compilerVar56
));
unset($__compilerVar67);
$__compilerVar64 .= '

		' . $__compilerVar61 . '
	</div>
</li>
';
$__compilerVar55 .= $__compilerVar64;
unset($__compilerVar56, $__compilerVar57, $__compilerVar58, $__compilerVar61, $__compilerVar64);
$__compilerVar55 .= '
';
$__output .= $__compilerVar55;
unset($__compilerVar55);
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
$__compilerVar68 = '';
$__compilerVar68 .= 'Post Moderation';
$__compilerVar69 = '';
$__compilerVar69 .= '
					';
if ($inlineModOptions['delete'])
{
$__compilerVar69 .= '<option value="delete">' . 'Delete Posts' . '...</option>';
}
$__compilerVar69 .= '
					';
if ($inlineModOptions['undelete'])
{
$__compilerVar69 .= '<option value="undelete">' . 'Undelete Posts' . '</option>';
}
$__compilerVar69 .= '
					';
if ($inlineModOptions['approve'])
{
$__compilerVar69 .= '<option value="approve">' . 'Approve Posts' . '</option>';
}
$__compilerVar69 .= '
					';
if ($inlineModOptions['unapprove'])
{
$__compilerVar69 .= '<option value="unapprove">' . 'Unapprove Posts' . '</option>';
}
$__compilerVar69 .= '
					';
if ($inlineModOptions['move'])
{
$__compilerVar69 .= '<option value="move">' . 'Move Posts' . '...</option>';
}
$__compilerVar69 .= '
					';
if ($inlineModOptions['merge'])
{
$__compilerVar69 .= '<option value="merge">' . 'Merge Posts' . '...</option>';
}
$__compilerVar69 .= '
					<option value="deselect">' . 'Deselect Posts' . '</option>
				';
$__compilerVar70 = '';
$__compilerVar70 .= 'Select / deselect all posts on this page';
$__compilerVar71 = '';
$__compilerVar71 .= 'Selected Posts';
$__compilerVar72 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar72 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar72 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar70, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar71, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar72 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar72 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar72 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar72 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar69 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__output .= $__compilerVar72;
unset($__compilerVar68, $__compilerVar69, $__compilerVar70, $__compilerVar71, $__compilerVar72);
$__output .= '
		</div>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>

';
$__compilerVar73 = '';
$__compilerVar73 .= '
			';
if ($canQuickReply)
{
$__compilerVar73 .= '
				';
if ($postsRemaining)
{
$__compilerVar73 .= '
					<div class="linkGroup">
						';
if ($postsRemaining == 1)
{
$__compilerVar73 .= '
							<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => ($page + 1)
)) . '" class="postsRemaining">' . '1 more message' . '...</a>
						';
}
else
{
$__compilerVar73 .= '
							<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => ($page + 1)
)) . '" class="postsRemaining">' . '' . XenForo_Template_Helper_Core::numberFormat($postsRemaining, '0') . ' more messages' . '...</a>
						';
}
$__compilerVar73 .= '
					</div>
				';
}
$__compilerVar73 .= '
			';
}
else
{
$__compilerVar73 .= '
				<div class="linkGroup">
					';
if ($canReply)
{
$__compilerVar73 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array()) . '" class="callToAction"><span>' . 'Reply to Thread' . '</span></a>
					';
}
else if ($visitor['user_id'])
{
$__compilerVar73 .= '
						(' . 'You have insufficient privileges to reply here.' . ')
					';
}
else
{
$__compilerVar73 .= '
						<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed">(' . 'You must log in or sign up to reply here.' . ')</a></label>
					';
}
$__compilerVar73 .= '
				</div>
			';
}
$__compilerVar73 .= '
			<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted jsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>

			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($postsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPosts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'threads', $thread, array(), htmlspecialchars($unreadLink, ENT_QUOTES, 'UTF-8'), array())) . '
		';
if (trim($__compilerVar73) !== '')
{
$__output .= '
	<div class="pageNavLinkGroup">
		' . $__compilerVar73 . '
	</div>
';
}
unset($__compilerVar73);
$__output .= '

';
$__compilerVar74 = '';
$__compilerVar75 = '';
$__compilerVar74 .= $this->callTemplateHook('ad_thread_view_below_messages', $__compilerVar75, array());
unset($__compilerVar75);
$__compilerVar74 .= '
<li id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_admin'] OR $message['is_moderator']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">
<div class="comment_fbdiv" ></div>
<div id="fb-root"></div>
<h4 class="threadinfohead blockhead" style="background-color: #45619D;margin:-1px;padding:10px">Bình Luận Bằng Facebook</h4>
<div class="fb-comments" data-href="http://techlife.com.vn/' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" data-num-posts="10" data-width="1200"></div>
</li>';
$__output .= $__compilerVar74;
unset($__compilerVar74);
$__output .= '

';
$__compilerVar76 = '';
$__output .= $this->callTemplateHook('thread_view_qr_before', $__compilerVar76, array(
'thread' => $thread
));
unset($__compilerVar76);
$__output .= '

';
if ($canQuickReply)
{
$__output .= '
	';
$__compilerVar77 = '';
$__compilerVar77 .= XenForo_Template_Helper_Core::link('threads/add-reply', $thread, array());
$__compilerVar78 = '';
$__compilerVar78 .= htmlspecialchars($lastPost['post_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar79 = '';
$__compilerVar79 .= '1';
$__compilerVar80 = '';
$this->addRequiredExternal('css', 'quick_reply');
$__compilerVar80 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar80 .= '

<div class="quickReply message">
	
	';
$__compilerVar81 = '';
$__compilerVar81 .= '1';
$__compilerVar82 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar82 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($visitor['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar83 = '';
$__compilerVar83 .= '
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
$__compilerVar83 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar83 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar82 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar83, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar81
));
unset($__compilerVar83);
$__compilerVar82 .= '

';
if (!$__compilerVar81)
{
$__compilerVar82 .= '
	';
$__compilerVar84 = '';
$__compilerVar84 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($visitor,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar85 = '';
$__compilerVar85 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $visitor,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar85) !== '')
{
$__compilerVar84 .= '<em class="userTitle" itemprop="title">' . $__compilerVar85 . '</em>';
}
unset($__compilerVar85);
$__compilerVar84 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $visitor,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar82 .= $this->callTemplateHook('message_user_info_text', $__compilerVar84, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar81
));
unset($__compilerVar84);
$__compilerVar82 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar86 = '';
$__compilerVar86 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar86 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar86 .= '
';
}
$__compilerVar86 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar86 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar86 .= '
';
}
$__compilerVar86 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar86 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar86 .= '
';
}
$__compilerVar86 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar86 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar86 .= '
';
}
$__compilerVar86 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar86 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar86 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar86 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar86 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar86 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar86 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar86 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar86 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar86 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar86 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar86 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar86 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar86 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar86 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar86 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar86 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar86 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar86 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar86 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar86 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar86 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar86 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar86 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar86 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar86 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar86 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar86 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar86 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar86 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar86 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar86 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar86 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar86 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar86 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar86 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar86 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar86 .= '
		
	</ul>
';
}
$__compilerVar82 .= $__compilerVar86;
unset($__compilerVar86);
}
$__compilerVar82 .= '
    ';
$__compilerVar87 = '';
$__compilerVar87 .= '
			';
$__compilerVar88 = '';
$__compilerVar88 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $visitor['user_id'])
{
$__compilerVar88 .= '
					<dl class="pairsJustified">
						<dt>' . 'Joined' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($visitor['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar88 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $visitor['user_id'])
{
$__compilerVar88 .= '
					<dl class="pairsJustified">
						<dt>' . 'Messages' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar88 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $visitor['user_id'])
{
$__compilerVar88 .= '
					<dl class="pairsJustified">
						<dt>' . 'Likes Received' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar88 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $visitor['user_id'])
{
$__compilerVar88 .= '
					<dl class="pairsJustified">
						<dt>' . 'Trophy Points' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $visitor, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar88 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $visitor['gender'])
{
$__compilerVar88 .= '
					<dl class="pairsJustified">
						<dt>' . 'Gender' . ':</dt>
						<dd itemprop="gender">';
if ($visitor['gender'] == ('male'))
{
$__compilerVar88 .= 'Male';
}
else
{
$__compilerVar88 .= 'Female';
}
$__compilerVar88 .= '</dd>
					</dl>
				';
}
$__compilerVar88 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $visitor['occupation'])
{
$__compilerVar88 .= '
					<dl class="pairsJustified">
						<dt>' . 'Occupation' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar88 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $visitor['location'])
{
$__compilerVar88 .= '
					<dl class="pairsJustified">
						<dt>' . 'Location' . ':</dt>
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
$__compilerVar88 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $visitor['homepage'])
{
$__compilerVar88 .= '
					<dl class="pairsJustified">
						<dt>' . 'Home Page' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar88 .= '
							
			';
$__compilerVar87 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar88, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar81
));
unset($__compilerVar88);
$__compilerVar87 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $visitor['customFields'])
{
$__compilerVar87 .= '
			';
$__compilerVar89 = '';
$__compilerVar89 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar89 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $visitor['allow_view_identities'] == ('everyone') OR ($visitor['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar89 .= '
						';
$__compilerVar90 = '';
$__compilerVar90 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $visitor,
'2' => $visitor['customFields'][$fieldId]
));
if (trim($__compilerVar90) !== '')
{
$__compilerVar89 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar90 . '</dd>
							</dl>
						';
}
unset($__compilerVar90);
$__compilerVar89 .= '
					';
}
$__compilerVar89 .= '
				';
}
$__compilerVar89 .= '
				
			';
$__compilerVar87 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar89, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar81
));
unset($__compilerVar89);
$__compilerVar87 .= '
			';
}
$__compilerVar87 .= '
			';
if (trim($__compilerVar87) !== '')
{
$__compilerVar82 .= '
		<div class="extraUserInfo">
			' . $__compilerVar87 . '
		</div>
	';
}
unset($__compilerVar87);
$__compilerVar82 .= '
		
';
}
$__compilerVar82 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar80 .= $__compilerVar82;
unset($__compilerVar81, $__compilerVar82);
$__compilerVar80 .= '

	<form action="' . htmlspecialchars($__compilerVar77, ENT_QUOTES, 'UTF-8', (false)) . '" method="post" class="AutoValidator blendedEditor" data-optInOut="OptIn" id="QuickReply">

		' . $qrEditor . '<div class="floatLeft">';
$__compilerVar91 = '';
if ($captcha)
{
$__compilerVar91 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar80 .= $__compilerVar91;
unset($__compilerVar91);
$__compilerVar80 .= '</div>

		<div class="submitUnit">
			<div class="draftUpdate">
				<span class="draftSaved">' . 'Draft saved' . '</span>
				<span class="draftDeleted">' . 'Draft deleted' . '</span>
			</div>
			';
if ($xenOptions['multiQuote'] AND $multiQuoteAction)
{
$__compilerVar80 .= '<input type="button" class="button JsOnly MultiQuoteWatcher insertQuotes" id="MultiQuote"
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
$__compilerVar80 .= '
			<input type="submit" class="button primary" value="' . 'Post Reply' . '" accesskey="s" />
			';
$__compilerVar92 = '';
if ($attachmentParams)
{
$__compilerVar92 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar92 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar92 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar92 .= '
	';
}
$__compilerVar92 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar92 .= '

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
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '"
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
$__compilerVar92 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar92 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar80 .= $__compilerVar92;
unset($__compilerVar92);
$__compilerVar80 .= '
			';
if ($__compilerVar79)
{
$__compilerVar80 .= '<input type="submit" class="button DisableOnSubmit" value="' . 'More Options' . '..." name="more_options" />';
}
$__compilerVar80 .= '
		</div>
		
		';
if ($attachmentParams)
{
$__compilerVar80 .= '
			';
$__compilerVar93 = $attachmentParams['attachments'];
$__compilerVar94 = '';
if ($attachmentParams)
{
$__compilerVar94 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar94 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar94 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar94 .= '
			';
$__compilerVar95 = '';
if ($attachmentParams)
{
$__compilerVar95 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar95 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar95 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar95 .= '
	';
}
$__compilerVar95 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar95 .= '

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
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '"
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
$__compilerVar95 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar95 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar94 .= $__compilerVar95;
unset($__compilerVar95);
$__compilerVar94 .= '
		';
}
$__compilerVar94 .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Insert every image as a' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Full Image' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar96 = '';
$__compilerVar96 .= '1';
$__compilerVar97 = '';
$__compilerVar98 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar98 .= '

<li id="' . (($__compilerVar96) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar97['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar97 and $__compilerVar97['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar97 and $__compilerVar97['thumbnailUrl'])
{
$__compilerVar98 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar97, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar97['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar97['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar97['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar97, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar98 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar98 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar97, array()) . '" target="_blank">' . (($__compilerVar97) ? (htmlspecialchars($__compilerVar97['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar96)
{
$__compilerVar98 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar98 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($__compilerVar97['thumbnailUrl'])
{
$__compilerVar98 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar98 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar97, array()) . '" />
			
				';
if ($__compilerVar97['thumbnailUrl'])
{
$__compilerVar98 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar98 .= '
			</div>
		';
}
$__compilerVar98 .= '

	</div>
	
</li>';
$__compilerVar94 .= $__compilerVar98;
unset($__compilerVar96, $__compilerVar97, $__compilerVar98);
$__compilerVar94 .= '
			';
if ($__compilerVar93)
{
$__compilerVar94 .= '
				';
foreach ($__compilerVar93 AS $attachment)
{
$__compilerVar94 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar94 .= '
						';
$__compilerVar99 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar99 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar99 .= '
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
$__compilerVar99 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar99 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar99 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar99 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar99 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar99 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar99 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar99 .= '
			</div>
		';
}
$__compilerVar99 .= '

	</div>
	
</li>';
$__compilerVar94 .= $__compilerVar99;
unset($__compilerVar99);
$__compilerVar94 .= '
					';
}
$__compilerVar94 .= '
				';
}
$__compilerVar94 .= '
			';
}
$__compilerVar94 .= '
		</ol>
	
		';
if ($__compilerVar93)
{
$__compilerVar94 .= '
			';
$__compilerVar100 = '';
$__compilerVar100 .= '
					';
foreach ($__compilerVar93 AS $attachment)
{
$__compilerVar100 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar100 .= '
							';
$__compilerVar101 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar101 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar101 .= '
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
$__compilerVar101 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar101 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar101 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar101 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar101 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar101 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar101 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar101 .= '
			</div>
		';
}
$__compilerVar101 .= '

	</div>
	
</li>';
$__compilerVar100 .= $__compilerVar101;
unset($__compilerVar101);
$__compilerVar100 .= '
						';
}
$__compilerVar100 .= '
					';
}
$__compilerVar100 .= '
				';
if (trim($__compilerVar100) !== '')
{
$__compilerVar94 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar100 . '
			</ol>
			';
}
unset($__compilerVar100);
$__compilerVar94 .= '
		';
}
$__compilerVar94 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__compilerVar80 .= $__compilerVar94;
unset($__compilerVar93, $__compilerVar94);
$__compilerVar80 .= '
		';
}
$__compilerVar80 .= '

		<input type="hidden" name="last_date" value="' . htmlspecialchars($__compilerVar78, ENT_QUOTES, 'UTF-8') . '" data-load-value="' . htmlspecialchars($__compilerVar78, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="last_known_date" value="' . htmlspecialchars($lastKnownDate, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

	</form>

</div>';
$__output .= $__compilerVar80;
unset($__compilerVar77, $__compilerVar78, $__compilerVar79, $__compilerVar80);
$__output .= '
';
}
$__output .= '

';
$__compilerVar102 = '';
$__output .= $this->callTemplateHook('thread_view_qr_after', $__compilerVar102, array(
'thread' => $thread
));
unset($__compilerVar102);
$__output .= '

' . $threadStatusHtml . '

';
$__compilerVar103 = '';
$__compilerVar103 .= XenForo_Template_Helper_Core::link('canonical:threads', $thread, array());
$__compilerVar104 = '';
$__compilerVar105 = '';
$__compilerVar105 .= '
			';
$__compilerVar106 = '';
$__compilerVar106 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar106 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar103, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar106 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar106 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar103, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar106 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar106 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar106 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar103, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar106 .= '
			';
$__compilerVar105 .= $this->callTemplateHook('share_page_options', $__compilerVar106, array());
unset($__compilerVar106);
$__compilerVar105 .= '
		';
if (trim($__compilerVar105) !== '')
{
$__compilerVar104 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar104 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar105 . '
	</div>
';
}
unset($__compilerVar105);
$__output .= $__compilerVar104;
unset($__compilerVar103, $__compilerVar104);
$__output .= '

';
$__compilerVar107 = '';
$__output .= $this->callTemplateHook('thread_view_share_after', $__compilerVar107, array(
'thread' => $thread
));
unset($__compilerVar107);
$__output .= '
';
