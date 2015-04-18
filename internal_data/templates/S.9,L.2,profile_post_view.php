<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ol class="messageSimpleList contained section overlayScroll" id="ProfilePostList">
	';
$__compilerVar14 = '1';
$__compilerVar15 = '';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__compilerVar15 .= '

';
if ($__compilerVar14)
{
$__compilerVar15 .= '
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
$__compilerVar15 .= '
';
}
else
{
$__compilerVar15 .= '
	';
$messagePosterHtml = '';
$__compilerVar15 .= '
';
}
$__compilerVar15 .= '

';
$__compilerVar16 = '';
$__compilerVar16 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar17 = '';
$__compilerVar17 .= '

		<div class="messageMeta">
				<div class="privateControls">
					';
if ($profilePost['canInlineMod'])
{
$__compilerVar17 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar17 .= '
					<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
					';
$__compilerVar18 = '';
$__compilerVar18 .= '
					';
if ($profilePost['canEdit'])
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/edit', $profilePost, array()) . '" class="OverlayTrigger item control edit"><span></span>' . 'Sửa' . '</a>
					';
}
$__compilerVar18 .= '
					';
if ($profilePost['canDelete'])
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/delete', $profilePost, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
					';
}
$__compilerVar18 .= '
					';
if ($profilePost['canCleanSpam'])
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $profilePost, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a
					>';
}
$__compilerVar18 .= '
					';
if ($canViewIps AND $profilePost['ip_id'])
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/ip', $profilePost, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
					';
}
$__compilerVar18 .= '
					
					';
if ($profilePost['canWarn'])
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('members/warn', $profilePost, array(
'content_type' => 'profile_post',
'content_id' => $profilePost['profile_post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
					';
}
else if ($profilePost['warning_id'] && $canViewWarnings)
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('warnings', $profilePost, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
					';
}
$__compilerVar18 .= '
					';
if ($profilePost['canReport'])
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/report', $profilePost, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
					';
}
$__compilerVar18 .= '
					
					';
$__compilerVar17 .= $this->callTemplateHook('profile_post_private_controls', $__compilerVar18, array(
'profilePost' => $profilePost
));
unset($__compilerVar18);
$__compilerVar17 .= '
				</div>
			';
$__compilerVar19 = '';
$__compilerVar19 .= '
					';
$__compilerVar20 = '';
$__compilerVar20 .= '
					';
if ($profilePost['canLike'])
{
$__compilerVar20 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/like', $profilePost, array()) . '" class="LikeLink item control ' . (($profilePost['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($profilePost['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar20 .= '
					';
if ($profilePost['canComment'])
{
$__compilerVar20 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment', $profilePost, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Bình luận' . '</a>
					';
}
$__compilerVar20 .= '
					';
$__compilerVar19 .= $this->callTemplateHook('profile_post_public_controls', $__compilerVar20, array(
'profilePost' => $profilePost
));
unset($__compilerVar20);
$__compilerVar19 .= '
				';
if (trim($__compilerVar19) !== '')
{
$__compilerVar17 .= '
				<div class="publicControls">
				' . $__compilerVar19 . '
				</div>
			';
}
unset($__compilerVar19);
$__compilerVar17 .= '
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '">
				';
if ($profilePost['likes'])
{
$__compilerVar17 .= '
					';
$__compilerVar21 = '';
$__compilerVar21 .= XenForo_Template_Helper_Core::link('profile-posts/likes', $profilePost, array());
$__compilerVar22 = '';
if ($profilePost['likes'])
{
$__compilerVar22 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar22 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($profilePost['likes'],$__compilerVar21,$profilePost['like_date'],$profilePost['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar17 .= $__compilerVar22;
unset($__compilerVar21, $__compilerVar22);
$__compilerVar17 .= '
				';
}
$__compilerVar17 .= '
			</li>

			';
if ($profilePost['comments'])
{
$__compilerVar17 .= '

				';
if ($profilePost['comment_count'] > 3)
{
$__compilerVar17 .= '
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
$__compilerVar17 .= '

				';
foreach ($profilePost['comments'] AS $comment)
{
$__compilerVar17 .= '
					';
$__compilerVar23 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar23 .= '

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
$__compilerVar23 .= '<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment-delete', $profilePost, array(
'comment' => $comment['profile_post_comment_id']
)) . '" class="OverlayTrigger item control delete"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar23 .= '
		</div>
	</div>
</li>';
$__compilerVar17 .= $__compilerVar23;
unset($__compilerVar23);
$__compilerVar17 .= '
				';
}
$__compilerVar17 .= '

			';
}
$__compilerVar17 .= '

			';
if ($profilePost['canComment'])
{
$__compilerVar17 .= '
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
$__compilerVar17 .= '

		</ol>

	';
$__compilerVar24 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar24 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar24 .= '

<li id="' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($profilePost['isDeleted']) ? ('deleted') : ('')) . ' ' . (($profilePost['is_staff']) ? ('staff') : ('')) . ' ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		';
$__compilerVar25 = '';
$__compilerVar25 .= '
					';
$__compilerVar26 = '';
$__compilerVar26 .= '
						';
if ($profilePost['warning_message'])
{
$__compilerVar26 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($profilePost['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar26 .= '
						';
if ($profilePost['isDeleted'])
{
$__compilerVar26 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($profilePost['isModerated'])
{
$__compilerVar26 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar26 .= '
						';
if ($profilePost['isIgnored'])
{
$__compilerVar26 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar26 .= '
					';
$__compilerVar25 .= $this->callTemplateHook('message_simple_notices', $__compilerVar26, array(
'message' => $profilePost
));
unset($__compilerVar26);
$__compilerVar25 .= '
				';
if (trim($__compilerVar25) !== '')
{
$__compilerVar24 .= '
			<ul class="messageNotices">
				' . $__compilerVar25 . '
			</ul>
		';
}
unset($__compilerVar25);
$__compilerVar24 .= '

		<div class="messageContent">
			';
if ($messagePosterHtml)
{
$__compilerVar24 .= '
				' . $messagePosterHtml . '
			';
}
else
{
$__compilerVar24 .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array(
'class' => 'poster'
))) . '
			';
}
$__compilerVar24 .= '
			<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
		</div>

		' . $__compilerVar17 . '
	</div>
</li>';
$__compilerVar15 .= $__compilerVar24;
unset($__compilerVar16, $__compilerVar17, $__compilerVar24);
$__compilerVar15 .= '
' . '
';
$__output .= $__compilerVar15;
unset($__compilerVar14, $__compilerVar15);
$__output .= '
</ol>';
