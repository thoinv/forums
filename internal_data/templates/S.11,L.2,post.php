<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar29 = '';
$__compilerVar29 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar30 = '';
$__compilerVar30 .= XenForo_Template_Helper_Core::link('posts/likes', $post, array());
$__compilerVar31 = '';
if ($post['attachments'])
{
$__compilerVar32 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar32 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Các file đính kèm' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($post['attachments'] AS $attachment)
{
$__compilerVar32 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar33 = '';
$__compilerVar33 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar33 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar33 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar33 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar33 .= '
					</div>
					';
$__compilerVar32 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar33, array(
'attachment' => $attachment
));
unset($__compilerVar33);
$__compilerVar32 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'Kích thước' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Đọc' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar32 .= '
	</ul>
</div>

';
$__compilerVar31 .= $__compilerVar32;
unset($__compilerVar32);
}
$__compilerVar34 = '';
$__compilerVar34 .= '
				
		<div class="messageMeta ToggleTriggerAnchor">
			
			<div class="privateControls">
				';
if ($post['canInlineMod'])
{
$__compilerVar34 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar34 .= '
				<span class="item muted">
					<span class="authorEnd">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',false,array(
'class' => 'author'
))) . ',</span>
					<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="datePermalink">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date'
))) . '</a>
				</span>
				';
$__compilerVar35 = '';
$__compilerVar35 .= '
				';
if ($post['canEdit'])
{
$__compilerVar35 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $post, array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $post, array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Sửa' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar35 .= '
				';
}
$__compilerVar35 .= '
				';
if ($post['edit_count'] && $post['canViewHistory'])
{
$__compilerVar35 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/history', $post, array()) . '" class="item control history ToggleTrigger"><span></span>' . 'Lịch sử' . '</a>';
}
$__compilerVar35 .= '
				';
if ($post['canDelete'])
{
$__compilerVar35 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $post, array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar35 .= '
				';
if ($post['canCleanSpam'])
{
$__compilerVar35 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $post, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar35 .= '
				';
if ($canViewIps AND $post['ip_id'])
{
$__compilerVar35 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $post, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar35 .= '
				
				';
if ($post['canWarn'])
{
$__compilerVar35 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $post, array(
'content_type' => 'post',
'content_id' => $post['post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($post['warning_id'] && $canViewWarnings)
{
$__compilerVar35 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $post, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar35 .= '
				';
if ($post['canReport'])
{
$__compilerVar35 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $post, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar35 .= '
				
				';
$__compilerVar34 .= $this->callTemplateHook('post_private_controls', $__compilerVar35, array(
'post' => $post
));
unset($__compilerVar35);
$__compilerVar34 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $post, array()) . '">#' . ($post['position'] + 1) . '</a>
				';
$__compilerVar36 = '';
$__compilerVar36 .= '
				';
if ($post['canLike'])
{
$__compilerVar36 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $post, array()) . '" class="LikeLink item control ' . (($post['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($post['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
				';
}
$__compilerVar36 .= '
				';
if ($canReply)
{
$__compilerVar36 .= '
					';
if ($xenOptions['multiQuote'])
{
$__compilerVar36 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '"
						data-messageid="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="MultiQuoteControl JsOnly item control"
						title="' . 'Toggle Multi-Quote' . '"><span></span><span class="symbol">' . '+ Quote' . '</span></a>';
}
$__compilerVar36 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '"
						data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $post, array()) . '"
						data-tip="#MQ-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="ReplyQuote item control reply"
						title="' . 'Trả lời, trích dẫn nội dung bài viết này' . '"><span></span>' . 'Trả lời' . '</a>
				';
}
$__compilerVar36 .= '
				';
$__compilerVar34 .= $this->callTemplateHook('post_public_controls', $__compilerVar36, array(
'post' => $post
));
unset($__compilerVar36);
$__compilerVar34 .= '
			</div>
		</div>
	';
$__compilerVar37 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar37 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar37 .= '

<li id="' . htmlspecialchars($__compilerVar29, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($post['isDeleted']) ? ('deleted') : ('')) . ' ' . (($post['is_staff']) ? ('staff') : ('')) . ' ' . (($post['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '">

	';
$__compilerVar38 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar38 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($post['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar39 = '';
$__compilerVar39 .= '
		<div class="avatarHolder">
			<span class="helper"></span>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,(true),array(
'user' => '$user',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
if ($post['isOnline'])
{
$__compilerVar39 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar39 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar38 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar39, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar39);
$__compilerVar38 .= '

';
if (!$isQuickReply)
{
$__compilerVar38 .= '
	';
$__compilerVar40 = '';
$__compilerVar40 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar41 = '';
$__compilerVar41 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $post,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar41) !== '')
{
$__compilerVar40 .= '<em class="userTitle" itemprop="title">' . $__compilerVar41 . '</em>';
}
unset($__compilerVar41);
$__compilerVar40 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $post,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar38 .= $this->callTemplateHook('message_user_info_text', $__compilerVar40, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar40);
$__compilerVar38 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar42 = '';
$__compilerVar42 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar42 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar42 .= '
';
}
$__compilerVar42 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar42 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar42 .= '
';
}
$__compilerVar42 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar42 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar42 .= '
';
}
$__compilerVar42 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar42 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar42 .= '
';
}
$__compilerVar42 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar42 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar42 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar42 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar42 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar42 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar42 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar42 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar42 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar42 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar42 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar42 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar42 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar42 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar42 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar42 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar42 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar42 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar42 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar42 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar42 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar42 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar42 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar42 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar42 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar42 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar42 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar42 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar42 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar42 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar42 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar42 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar42 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar42 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar42 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar42 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar42 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
	</ul>
';
}
$__compilerVar38 .= $__compilerVar42;
unset($__compilerVar42);
}
$__compilerVar38 .= '
    ';
$__compilerVar43 = '';
$__compilerVar43 .= '
			';
$__compilerVar44 = '';
$__compilerVar44 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $post['user_id'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($post['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $post['user_id'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $post['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($post['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $post['user_id'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($post['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $post['user_id'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $post, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($post['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar44 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $post['gender'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($post['gender'] == ('male'))
{
$__compilerVar44 .= 'Nam';
}
else
{
$__compilerVar44 .= 'Nữ';
}
$__compilerVar44 .= '</dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $post['occupation'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $post['location'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nơi ở' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $post['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar44 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $post['homepage'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar44 .= '
							
			';
$__compilerVar43 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar44, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar44);
$__compilerVar43 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $post['customFields'])
{
$__compilerVar43 .= '
			';
$__compilerVar45 = '';
$__compilerVar45 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar45 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $post['allow_view_identities'] == ('everyone') OR ($post['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar45 .= '
						';
$__compilerVar46 = '';
$__compilerVar46 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $post,
'2' => $post['customFields'][$fieldId]
));
if (trim($__compilerVar46) !== '')
{
$__compilerVar45 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar46 . '</dd>
							</dl>
						';
}
unset($__compilerVar46);
$__compilerVar45 .= '
					';
}
$__compilerVar45 .= '
				';
}
$__compilerVar45 .= '
				
			';
$__compilerVar43 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar45, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar45);
$__compilerVar43 .= '
			';
}
$__compilerVar43 .= '
			';
if (trim($__compilerVar43) !== '')
{
$__compilerVar38 .= '
		<div class="extraUserInfo">
			' . $__compilerVar43 . '
		</div>
	';
}
unset($__compilerVar43);
$__compilerVar38 .= '
		
';
}
$__compilerVar38 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar37 .= $__compilerVar38;
unset($__compilerVar38);
$__compilerVar37 .= '

	<div class="messageInfo primaryContent">
		';
if ($post['isNew'])
{
$__compilerVar37 .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__compilerVar37 .= '
		
		';
$__compilerVar47 = '';
$__compilerVar47 .= '
					';
$__compilerVar48 = '';
$__compilerVar48 .= '
						';
if ($post['warning_message'])
{
$__compilerVar48 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($post['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar48 .= '
						';
if ($post['isDeleted'])
{
$__compilerVar48 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($post['isModerated'])
{
$__compilerVar48 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar48 .= '
						';
if ($post['isIgnored'])
{
$__compilerVar48 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar48 .= '
					';
$__compilerVar47 .= $this->callTemplateHook('message_notices', $__compilerVar48, array(
'message' => $post
));
unset($__compilerVar48);
$__compilerVar47 .= '
				';
if (trim($__compilerVar47) !== '')
{
$__compilerVar37 .= '
			<ul class="messageNotices">
				' . $__compilerVar47 . '
			</ul>
		';
}
unset($__compilerVar47);
$__compilerVar37 .= '
		
		';
$__compilerVar49 = '';
$__compilerVar49 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText SelectQuoteContainer ugc baseHtml' . (($post['isIgnored']) ? (' ignored') : ('')) . '">
					';
$__compilerVar50 = '';
$__compilerVar51 = '';
$__compilerVar50 .= $this->callTemplateHook('ad_message_body', $__compilerVar51, array());
unset($__compilerVar51);
$__compilerVar49 .= $__compilerVar50;
unset($__compilerVar50);
$__compilerVar49 .= '
					' . $post['messageHtml'] . '
					<div class="messageTextEndMarker">&nbsp;</div>
				</blockquote>
			</article>
			
			' . $__compilerVar31 . '
		</div>
		';
$__compilerVar37 .= $this->callTemplateHook('message_content', $__compilerVar49, array(
'message' => $post
));
unset($__compilerVar49);
$__compilerVar37 .= '
		
		';
if ($post['last_edit_date'])
{
$__compilerVar37 .= '
			<div class="editDate">
			';
if ($post['user_id'] == $post['last_edit_user_id'])
{
$__compilerVar37 .= '
				' . 'Chỉnh sửa cuối' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['last_edit_date'],array(
'time' => htmlspecialchars($post['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar37 .= '
				' . 'Last edited by a moderator' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['last_edit_date'],array(
'time' => htmlspecialchars($post['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar37 .= '
			</div>
		';
}
$__compilerVar37 .= '
		
		';
if ($visitor['content_show_signature'] && $post['signature'])
{
$__compilerVar37 .= '
			<div class="baseHtml signature messageText ugc' . (($post['isIgnored']) ? (' ignored') : ('')) . '"><aside>' . $post['signatureHtml'] . '</aside></div>
		';
}
$__compilerVar37 .= '
		
		' . $__compilerVar34 . '
		
		';
$__compilerVar52 = '';
$__compilerVar37 .= $this->callTemplateHook('dark_postrating_likes_bar', $__compilerVar52, array(
'post' => $post,
'message_id' => $__compilerVar29
));
unset($__compilerVar52);
$__compilerVar37 .= '
	</div>

	';
$__compilerVar53 = '';
$__compilerVar37 .= $this->callTemplateHook('message_below', $__compilerVar53, array(
'post' => $post,
'message_id' => $__compilerVar29
));
unset($__compilerVar53);
$__compilerVar37 .= '
	
	';
$__compilerVar54 = '';
$__compilerVar55 = '';
$__compilerVar54 .= $this->callTemplateHook('ad_message_below', $__compilerVar55, array());
unset($__compilerVar55);
$__compilerVar37 .= $__compilerVar54;
unset($__compilerVar54);
$__compilerVar37 .= '
';
$__compilerVar56 = '';
$__compilerVar37 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAd', $__compilerVar56, array(
'dp_ads' => $dp_ads
));
unset($__compilerVar56);
$__compilerVar37 .= '
</li>';
$__output .= $__compilerVar37;
unset($__compilerVar29, $__compilerVar30, $__compilerVar31, $__compilerVar34, $__compilerVar37);
