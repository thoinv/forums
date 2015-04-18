<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::link('posts/likes', $post, array());
$__compilerVar3 = '';
if ($post['attachments'])
{
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar4 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Attached Files' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($post['attachments'] AS $attachment)
{
$__compilerVar4 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar5 = '';
$__compilerVar5 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar5 .= '
					</div>
					';
$__compilerVar4 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar5, array(
'attachment' => $attachment
));
unset($__compilerVar5);
$__compilerVar4 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'File size' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar4 .= '
	</ul>
</div>

';
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
}
$__compilerVar6 = '';
$__compilerVar6 .= '
				
		<div class="messageMeta">
			
			<div class="privateControls">
				';
if ($post['canInlineMod'])
{
$__compilerVar6 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar6 .= '
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
$__compilerVar7 = '';
$__compilerVar7 .= '
				';
if ($post['canEdit'])
{
$__compilerVar7 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $post, array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $post, array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Edit' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar7 .= '
				';
}
$__compilerVar7 .= '
				';
if ($post['canDelete'])
{
$__compilerVar7 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $post, array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Delete' . '</a>';
}
$__compilerVar7 .= '
				';
if ($post['canCleanSpam'])
{
$__compilerVar7 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $post, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar7 .= '
				';
if ($canViewIps AND $post['ip_id'])
{
$__compilerVar7 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $post, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar7 .= '
				
				';
if ($post['canWarn'])
{
$__compilerVar7 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $post, array(
'content_type' => 'post',
'content_id' => $post['post_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
				';
}
else if ($post['warning_id'] && $canViewWarnings)
{
$__compilerVar7 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $post, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar7 .= '
				';
if ($post['canReport'])
{
$__compilerVar7 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $post, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
				';
}
$__compilerVar7 .= '
				
				';
$__compilerVar6 .= $this->callTemplateHook('post_private_controls', $__compilerVar7, array(
'post' => $post
));
unset($__compilerVar7);
$__compilerVar6 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $post, array()) . '">#' . ($post['position'] + 1) . '</a>
				';
$__compilerVar8 = '';
$__compilerVar8 .= '
				';
if ($post['canLike'])
{
$__compilerVar8 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $post, array()) . '" class="LikeLink item control ' . (($post['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($post['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
				';
}
$__compilerVar8 .= '
				';
if ($canReply)
{
$__compilerVar8 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '" data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $post, array()) . '" class="ReplyQuote item control reply" title="' . 'Reply, quoting this message' . '"><span></span>' . 'Reply' . '</a>
				';
}
$__compilerVar8 .= '
				';
$__compilerVar6 .= $this->callTemplateHook('post_public_controls', $__compilerVar8, array(
'post' => $post
));
unset($__compilerVar8);
$__compilerVar6 .= '
			</div>
		</div>
	';
$__compilerVar9 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar9 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar9 .= '

<li id="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($post['isDeleted']) ? ('deleted') : ('')) . ' ' . (($post['is_admin'] OR $post['is_moderator']) ? ('staff') : ('')) . ' ' . (($post['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		';
if ($post['isNew'])
{
$__compilerVar9 .= '<strong class="newIndicator"><span></span>' . 'New' . '</strong>';
}
$__compilerVar9 .= '

		';
$__compilerVar10 = '';
$__compilerVar10 .= '
					';
$__compilerVar11 = '';
$__compilerVar11 .= '
						';
if ($post['warning_message'])
{
$__compilerVar11 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($post['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar11 .= '
						';
if ($post['isDeleted'])
{
$__compilerVar11 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($post['isModerated'])
{
$__compilerVar11 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar11 .= '
						';
if ($post['isIgnored'])
{
$__compilerVar11 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar11 .= '
					';
$__compilerVar10 .= $this->callTemplateHook('message_simple_notices', $__compilerVar11, array(
'message' => $post
));
unset($__compilerVar11);
$__compilerVar10 .= '
				';
if (trim($__compilerVar10) !== '')
{
$__compilerVar9 .= '
			<ul class="messageNotices">
				' . $__compilerVar10 . '
			</ul>
		';
}
unset($__compilerVar10);
$__compilerVar9 .= '

		<div class="messageContent">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',false,array(
'class' => 'poster'
))) . '
			<article><blockquote class="ugc baseHtml' . (($post['isIgnored']) ? (' ignored') : ('')) . '">' . $post['messageHtml'] . '</blockquote></article>

			' . $__compilerVar3 . '
		</div>

		';
$__compilerVar12 = '';
$__compilerVar9 .= $this->callTemplateHook('dark_postrating_likes_bar_xenporta', $__compilerVar12, array(
'post' => $post,
'message_id' => $__compilerVar1
));
unset($__compilerVar12);
$__compilerVar9 .= '

		' . $__compilerVar6 . '
	</div>
</li>
';
$__output .= $__compilerVar9;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar6, $__compilerVar9);
$__output .= '
';
