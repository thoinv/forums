<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ol class="messageSimpleList contained section overlayScroll" id="ProfilePostList">
	';
$__compilerVar1 = '1';
$__compilerVar2 = '';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__compilerVar2 .= '

';
if ($__compilerVar1)
{
$__compilerVar2 .= '
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
$__compilerVar2 .= '
';
}
else
{
$__compilerVar2 .= '
	';
$messagePosterHtml = '';
$__compilerVar2 .= '
';
}
$__compilerVar2 .= '

';
$__compilerVar3 = '';
$__compilerVar3 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar4 = '';
$__compilerVar4 .= '

		<div class="messageMeta">
				<div class="privateControls">
					';
if ($profilePost['canInlineMod'])
{
$__compilerVar4 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
					';
$__compilerVar5 = '';
$__compilerVar5 .= '
					';
if ($profilePost['canEdit'])
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/edit', $profilePost, array()) . '" class="OverlayTrigger item control edit"><span></span>' . 'Edit' . '</a>
					';
}
$__compilerVar5 .= '
					';
if ($profilePost['canDelete'])
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/delete', $profilePost, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Delete' . '</a>
					';
}
$__compilerVar5 .= '
					';
if ($profilePost['canCleanSpam'])
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $profilePost, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a
					>';
}
$__compilerVar5 .= '
					';
if ($canViewIps AND $profilePost['ip_id'])
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/ip', $profilePost, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
					';
}
$__compilerVar5 .= '
					
					';
if ($profilePost['canWarn'])
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('members/warn', $profilePost, array(
'content_type' => 'profile_post',
'content_id' => $profilePost['profile_post_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
					';
}
else if ($profilePost['warning_id'] && $canViewWarnings)
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('warnings', $profilePost, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
					';
}
$__compilerVar5 .= '
					';
if ($profilePost['canReport'])
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/report', $profilePost, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
					';
}
$__compilerVar5 .= '
					
					';
$__compilerVar4 .= $this->callTemplateHook('profile_post_private_controls', $__compilerVar5, array(
'profilePost' => $profilePost
));
unset($__compilerVar5);
$__compilerVar4 .= '
				</div>
			';
$__compilerVar6 = '';
$__compilerVar6 .= '
					';
$__compilerVar7 = '';
$__compilerVar7 .= '
					';
if ($profilePost['canLike'])
{
$__compilerVar7 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/like', $profilePost, array()) . '" class="LikeLink item control ' . (($profilePost['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($profilePost['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
					';
}
$__compilerVar7 .= '
					';
if ($profilePost['canComment'])
{
$__compilerVar7 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment', $profilePost, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Comment' . '</a>
					';
}
$__compilerVar7 .= '
					';
$__compilerVar6 .= $this->callTemplateHook('profile_post_public_controls', $__compilerVar7, array(
'profilePost' => $profilePost
));
unset($__compilerVar7);
$__compilerVar6 .= '
				';
if (trim($__compilerVar6) !== '')
{
$__compilerVar4 .= '
				<div class="publicControls">
				' . $__compilerVar6 . '
				</div>
			';
}
unset($__compilerVar6);
$__compilerVar4 .= '
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '">
				';
if ($profilePost['likes'])
{
$__compilerVar4 .= '
					';
$__compilerVar8 = '';
$__compilerVar8 .= XenForo_Template_Helper_Core::link('profile-posts/likes', $profilePost, array());
$__compilerVar9 = '';
if ($profilePost['likes'])
{
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar9 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($profilePost['likes'],$__compilerVar8,$profilePost['like_date'],$profilePost['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar4 .= $__compilerVar9;
unset($__compilerVar8, $__compilerVar9);
$__compilerVar4 .= '
				';
}
$__compilerVar4 .= '
			</li>

			';
if ($profilePost['comments'])
{
$__compilerVar4 .= '

				';
if ($profilePost['comment_count'] > 3)
{
$__compilerVar4 .= '
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
$__compilerVar4 .= '

				';
foreach ($profilePost['comments'] AS $comment)
{
$__compilerVar4 .= '
					';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar10 .= '

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
$__compilerVar10 .= '<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment-delete', $profilePost, array(
'comment' => $comment['profile_post_comment_id']
)) . '" class="OverlayTrigger item control delete"><span></span>' . 'Delete' . '</a>';
}
$__compilerVar10 .= '
		</div>
	</div>
</li>';
$__compilerVar4 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar4 .= '
				';
}
$__compilerVar4 .= '

			';
}
$__compilerVar4 .= '

			';
if ($profilePost['canComment'])
{
$__compilerVar4 .= '
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
$__compilerVar4 .= '

		</ol>

	';
$__compilerVar11 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar11 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar11 .= '

<li id="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($profilePost['isDeleted']) ? ('deleted') : ('')) . ' ' . (($profilePost['is_staff']) ? ('staff') : ('')) . ' ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		';
$__compilerVar12 = '';
$__compilerVar12 .= '
					';
$__compilerVar13 = '';
$__compilerVar13 .= '
						';
if ($profilePost['warning_message'])
{
$__compilerVar13 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($profilePost['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar13 .= '
						';
if ($profilePost['isDeleted'])
{
$__compilerVar13 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($profilePost['isModerated'])
{
$__compilerVar13 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar13 .= '
						';
if ($profilePost['isIgnored'])
{
$__compilerVar13 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar13 .= '
					';
$__compilerVar12 .= $this->callTemplateHook('message_simple_notices', $__compilerVar13, array(
'message' => $profilePost
));
unset($__compilerVar13);
$__compilerVar12 .= '
				';
if (trim($__compilerVar12) !== '')
{
$__compilerVar11 .= '
			<ul class="messageNotices">
				' . $__compilerVar12 . '
			</ul>
		';
}
unset($__compilerVar12);
$__compilerVar11 .= '

		<div class="messageContent">
			';
if ($messagePosterHtml)
{
$__compilerVar11 .= '
				' . $messagePosterHtml . '
			';
}
else
{
$__compilerVar11 .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array(
'class' => 'poster'
))) . '
			';
}
$__compilerVar11 .= '
			<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
		</div>

		' . $__compilerVar4 . '
	</div>
</li>';
$__compilerVar2 .= $__compilerVar11;
unset($__compilerVar3, $__compilerVar4, $__compilerVar11);
$__compilerVar2 .= '
' . '
';
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
</ol>';