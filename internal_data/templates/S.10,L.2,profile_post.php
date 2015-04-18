<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__output .= '

';
if ($showReceiverName)
{
$__output .= '
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
$__output .= '
';
}
else
{
$__output .= '
	';
$messagePosterHtml = '';
$__output .= '
';
}
$__output .= '

';
$__compilerVar12 = '';
$__compilerVar12 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar13 = '';
$__compilerVar13 .= '

		<div class="messageMeta">
				<div class="privateControls">
					';
if ($profilePost['canInlineMod'])
{
$__compilerVar13 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar13 .= '
					<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
					';
$__compilerVar14 = '';
$__compilerVar14 .= '
					';
if ($profilePost['canEdit'])
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/edit', $profilePost, array()) . '" class="OverlayTrigger item control edit"><span></span>' . 'Sửa' . '</a>
					';
}
$__compilerVar14 .= '
					';
if ($profilePost['canDelete'])
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/delete', $profilePost, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
					';
}
$__compilerVar14 .= '
					';
if ($profilePost['canCleanSpam'])
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $profilePost, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a
					>';
}
$__compilerVar14 .= '
					';
if ($canViewIps AND $profilePost['ip_id'])
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/ip', $profilePost, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
					';
}
$__compilerVar14 .= '
					
					';
if ($profilePost['canWarn'])
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('members/warn', $profilePost, array(
'content_type' => 'profile_post',
'content_id' => $profilePost['profile_post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
					';
}
else if ($profilePost['warning_id'] && $canViewWarnings)
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('warnings', $profilePost, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
					';
}
$__compilerVar14 .= '
					';
if ($profilePost['canReport'])
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/report', $profilePost, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
					';
}
$__compilerVar14 .= '
					
					';
$__compilerVar13 .= $this->callTemplateHook('profile_post_private_controls', $__compilerVar14, array(
'profilePost' => $profilePost
));
unset($__compilerVar14);
$__compilerVar13 .= '
				</div>
			';
$__compilerVar15 = '';
$__compilerVar15 .= '
					';
$__compilerVar16 = '';
$__compilerVar16 .= '
					';
if ($profilePost['canLike'])
{
$__compilerVar16 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/like', $profilePost, array()) . '" class="LikeLink item control ' . (($profilePost['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($profilePost['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar16 .= '
					';
if ($profilePost['canComment'])
{
$__compilerVar16 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment', $profilePost, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Bình luận' . '</a>
					';
}
$__compilerVar16 .= '
					';
$__compilerVar15 .= $this->callTemplateHook('profile_post_public_controls', $__compilerVar16, array(
'profilePost' => $profilePost
));
unset($__compilerVar16);
$__compilerVar15 .= '
				';
if (trim($__compilerVar15) !== '')
{
$__compilerVar13 .= '
				<div class="publicControls">
				' . $__compilerVar15 . '
				</div>
			';
}
unset($__compilerVar15);
$__compilerVar13 .= '
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '">
				';
if ($profilePost['likes'])
{
$__compilerVar13 .= '
					';
$__compilerVar17 = '';
$__compilerVar17 .= XenForo_Template_Helper_Core::link('profile-posts/likes', $profilePost, array());
$__compilerVar18 = '';
if ($profilePost['likes'])
{
$__compilerVar18 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar18 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($profilePost['likes'],$__compilerVar17,$profilePost['like_date'],$profilePost['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar13 .= $__compilerVar18;
unset($__compilerVar17, $__compilerVar18);
$__compilerVar13 .= '
				';
}
$__compilerVar13 .= '
			</li>

			';
if ($profilePost['comments'])
{
$__compilerVar13 .= '

				';
if ($profilePost['comment_count'] > 3)
{
$__compilerVar13 .= '
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
$__compilerVar13 .= '

				';
foreach ($profilePost['comments'] AS $comment)
{
$__compilerVar13 .= '
					';
$__compilerVar19 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar19 .= '

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
$__compilerVar19 .= '<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment-delete', $profilePost, array(
'comment' => $comment['profile_post_comment_id']
)) . '" class="OverlayTrigger item control delete"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar19 .= '
		</div>
	</div>
</li>';
$__compilerVar13 .= $__compilerVar19;
unset($__compilerVar19);
$__compilerVar13 .= '
				';
}
$__compilerVar13 .= '

			';
}
$__compilerVar13 .= '

			';
if ($profilePost['canComment'])
{
$__compilerVar13 .= '
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
$__compilerVar13 .= '

		</ol>

	';
$__compilerVar20 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar20 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar20 .= '

<li id="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($profilePost['isDeleted']) ? ('deleted') : ('')) . ' ' . (($profilePost['is_staff']) ? ('staff') : ('')) . ' ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		';
$__compilerVar21 = '';
$__compilerVar21 .= '
					';
$__compilerVar22 = '';
$__compilerVar22 .= '
						';
if ($profilePost['warning_message'])
{
$__compilerVar22 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($profilePost['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar22 .= '
						';
if ($profilePost['isDeleted'])
{
$__compilerVar22 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($profilePost['isModerated'])
{
$__compilerVar22 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar22 .= '
						';
if ($profilePost['isIgnored'])
{
$__compilerVar22 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar22 .= '
					';
$__compilerVar21 .= $this->callTemplateHook('message_simple_notices', $__compilerVar22, array(
'message' => $profilePost
));
unset($__compilerVar22);
$__compilerVar21 .= '
				';
if (trim($__compilerVar21) !== '')
{
$__compilerVar20 .= '
			<ul class="messageNotices">
				' . $__compilerVar21 . '
			</ul>
		';
}
unset($__compilerVar21);
$__compilerVar20 .= '

		<div class="messageContent">
			';
if ($messagePosterHtml)
{
$__compilerVar20 .= '
				' . $messagePosterHtml . '
			';
}
else
{
$__compilerVar20 .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array(
'class' => 'poster'
))) . '
			';
}
$__compilerVar20 .= '
			<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
		</div>

		' . $__compilerVar13 . '
	</div>
</li>';
$__output .= $__compilerVar20;
unset($__compilerVar12, $__compilerVar13, $__compilerVar20);
$__output .= '
' . '
';
