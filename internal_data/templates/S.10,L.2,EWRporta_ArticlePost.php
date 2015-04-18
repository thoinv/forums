<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar13 = '';
$__compilerVar13 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar14 = '';
$__compilerVar14 .= XenForo_Template_Helper_Core::link('posts/likes', $post, array());
$__compilerVar15 = '';
if ($post['attachments'])
{
$__compilerVar16 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar16 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Các file đính kèm' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($post['attachments'] AS $attachment)
{
$__compilerVar16 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar17 = '';
$__compilerVar17 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar17 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar17 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar17 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar17 .= '
					</div>
					';
$__compilerVar16 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar17, array(
'attachment' => $attachment
));
unset($__compilerVar17);
$__compilerVar16 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'Kích thước' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Đọc' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar16 .= '
	</ul>
</div>

';
$__compilerVar15 .= $__compilerVar16;
unset($__compilerVar16);
}
$__compilerVar18 = '';
$__compilerVar18 .= '
				
		<div class="messageMeta">
			
			<div class="privateControls">
				';
if ($post['canInlineMod'])
{
$__compilerVar18 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar18 .= '
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
$__compilerVar19 = '';
$__compilerVar19 .= '
				';
if ($post['canEdit'])
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $post, array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $post, array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Sửa' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar19 .= '
				';
}
$__compilerVar19 .= '
				';
if ($post['canDelete'])
{
$__compilerVar19 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $post, array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar19 .= '
				';
if ($post['canCleanSpam'])
{
$__compilerVar19 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $post, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar19 .= '
				';
if ($canViewIps AND $post['ip_id'])
{
$__compilerVar19 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $post, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar19 .= '
				
				';
if ($post['canWarn'])
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $post, array(
'content_type' => 'post',
'content_id' => $post['post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($post['warning_id'] && $canViewWarnings)
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $post, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar19 .= '
				';
if ($post['canReport'])
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $post, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar19 .= '
				
				';
$__compilerVar18 .= $this->callTemplateHook('post_private_controls', $__compilerVar19, array(
'post' => $post
));
unset($__compilerVar19);
$__compilerVar18 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $post, array()) . '">#' . ($post['position'] + 1) . '</a>
				';
$__compilerVar20 = '';
$__compilerVar20 .= '
				';
if ($post['canLike'])
{
$__compilerVar20 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $post, array()) . '" class="LikeLink item control ' . (($post['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($post['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
				';
}
$__compilerVar20 .= '
				';
if ($canReply)
{
$__compilerVar20 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '" data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $post, array()) . '" class="ReplyQuote item control reply" title="' . 'Trả lời, trích dẫn nội dung bài viết này' . '"><span></span>' . 'Trả lời' . '</a>
				';
}
$__compilerVar20 .= '
				';
$__compilerVar18 .= $this->callTemplateHook('post_public_controls', $__compilerVar20, array(
'post' => $post
));
unset($__compilerVar20);
$__compilerVar18 .= '
			</div>
		</div>
	';
$__compilerVar21 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar21 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar21 .= '

<li id="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($post['isDeleted']) ? ('deleted') : ('')) . ' ' . (($post['is_admin'] OR $post['is_moderator']) ? ('staff') : ('')) . ' ' . (($post['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		';
if ($post['isNew'])
{
$__compilerVar21 .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__compilerVar21 .= '

		';
$__compilerVar22 = '';
$__compilerVar22 .= '
					';
$__compilerVar23 = '';
$__compilerVar23 .= '
						';
if ($post['warning_message'])
{
$__compilerVar23 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($post['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar23 .= '
						';
if ($post['isDeleted'])
{
$__compilerVar23 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($post['isModerated'])
{
$__compilerVar23 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar23 .= '
						';
if ($post['isIgnored'])
{
$__compilerVar23 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar23 .= '
					';
$__compilerVar22 .= $this->callTemplateHook('message_simple_notices', $__compilerVar23, array(
'message' => $post
));
unset($__compilerVar23);
$__compilerVar22 .= '
				';
if (trim($__compilerVar22) !== '')
{
$__compilerVar21 .= '
			<ul class="messageNotices">
				' . $__compilerVar22 . '
			</ul>
		';
}
unset($__compilerVar22);
$__compilerVar21 .= '

		<div class="messageContent">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',false,array(
'class' => 'poster'
))) . '
			<article><blockquote class="ugc baseHtml' . (($post['isIgnored']) ? (' ignored') : ('')) . '">' . $post['messageHtml'] . '</blockquote></article>

			' . $__compilerVar15 . '
		</div>

		';
$__compilerVar24 = '';
$__compilerVar21 .= $this->callTemplateHook('dark_postrating_likes_bar_xenporta', $__compilerVar24, array(
'post' => $post,
'message_id' => $__compilerVar13
));
unset($__compilerVar24);
$__compilerVar21 .= '

		' . $__compilerVar18 . '
	</div>
</li>
';
$__output .= $__compilerVar21;
unset($__compilerVar13, $__compilerVar14, $__compilerVar15, $__compilerVar18, $__compilerVar21);
$__output .= '
';
