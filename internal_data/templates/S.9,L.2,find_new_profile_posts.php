<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'New Profile Posts';
$__output .= '

';
$__extraData['head']['profilePosterCss'] = '';
$__extraData['head']['profilePosterCss'] .= '
<style>
	.profilePoster
	{
		max-width: 100%;
		width: 250px;
	}

	.profilePoster textarea
	{
		height: 36px;
		width: 100%;
		box-sizing: border-box;
		resize: vertical;
	}
	
	.profilePoster .submitUnit
	{
		margin-top: 5px;
		text-align: ' . (($pageIsRtl) ? ('left') : ('right')) . ';
	}
	
	.profilePoster .formValidationInlineError
	{
		display: none !important;
	}
</style>
';
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/quick_reply_profile.js');
$__output .= '

<div class="pageNavLinkGroup">
	<div class="linkGroup SelectionCountContainer">
		';
if ($canUpdateStatus)
{
$__output .= '
			<div class="Popup">
				<a rel="Menu">' . 'Update Your Status' . '</a>
				<div class="Menu">
					<div class="primaryContent menuHeader"><h3>' . 'Update Your Status' . '</h3></div>
					<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post"
						class="profilePoster AutoValidator secondaryContent" id="ProfilePoster"
						data-optInOut="optIn"
					>
						<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" rows="2" data-statusEditorCounter="#statusEditorCounter"></textarea>

						<div class="submitUnit">
							<span id="statusEditorCounter" title="' . 'Số ký tự còn lại' . '"></span>
							<input type="submit" class="button primary MenuCloser" value="' . 'Đăng' . '" accesskey="s" />
						</div>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
				</div>
			</div>
		';
}
$__output .= '
	</div>
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($total, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'find-new/profile-posts', $search, array(), false, array())) . '
</div>

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/profile-post/switch', false, array()) . '" method="post"
class="InlineModForm section"
data-cookieName="profilePosts"
data-controls="#InlineModControls"
data-imodOptions="#ModerationSelect option">

	<ol class="messageSimpleList topBorder" id="ProfilePostList">
		';
foreach ($profilePosts AS $profilePost)
{
$__output .= '
			';
if ($profilePost['isDeleted'])
{
$__output .= '
				';
$__compilerVar24 = '';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar24 .= '

';
$__compilerVar25 = '';
$__compilerVar25 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar26 = '';
$__compilerVar26 .= '
		';
if ($profilePost['canInlineMod'])
{
$__compilerVar26 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar26 .= '
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date',
'class' => 'muted item'
))) . '
		<a href="' . XenForo_Template_Helper_Core::link('profile-posts/show', $profilePost, array()) . '" class="MessageLoader control item show" data-messageSelector="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>
	';
$__compilerVar27 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar27 .= '

<li id="' . htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8') . '" class="messageSimple deleted placeholder ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '">

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
$__compilerVar27 .= '
				' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['delete_date'],array(
'time' => htmlspecialchars($profilePost['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($profilePost['delete_reason'])
{
$__compilerVar27 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($profilePost['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar27 .= '.
			';
}
$__compilerVar27 .= '
		</p>
		<div class="privateControls">' . $__compilerVar26 . '</div>
		
	</div>

</li>';
$__compilerVar24 .= $__compilerVar27;
unset($__compilerVar25, $__compilerVar26, $__compilerVar27);
$__output .= $__compilerVar24;
unset($__compilerVar24);
$__output .= '
			';
}
else
{
$__output .= '
				';
$__compilerVar28 = '1';
$__compilerVar29 = '';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__compilerVar29 .= '

';
if ($__compilerVar28)
{
$__compilerVar29 .= '
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
$__compilerVar29 .= '
';
}
else
{
$__compilerVar29 .= '
	';
$messagePosterHtml = '';
$__compilerVar29 .= '
';
}
$__compilerVar29 .= '

';
$__compilerVar30 = '';
$__compilerVar30 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar31 = '';
$__compilerVar31 .= '

		<div class="messageMeta">
				<div class="privateControls">
					';
if ($profilePost['canInlineMod'])
{
$__compilerVar31 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar31 .= '
					<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
					';
$__compilerVar32 = '';
$__compilerVar32 .= '
					';
if ($profilePost['canEdit'])
{
$__compilerVar32 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/edit', $profilePost, array()) . '" class="OverlayTrigger item control edit"><span></span>' . 'Sửa' . '</a>
					';
}
$__compilerVar32 .= '
					';
if ($profilePost['canDelete'])
{
$__compilerVar32 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/delete', $profilePost, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
					';
}
$__compilerVar32 .= '
					';
if ($profilePost['canCleanSpam'])
{
$__compilerVar32 .= '
						<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $profilePost, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a
					>';
}
$__compilerVar32 .= '
					';
if ($canViewIps AND $profilePost['ip_id'])
{
$__compilerVar32 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/ip', $profilePost, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
					';
}
$__compilerVar32 .= '
					
					';
if ($profilePost['canWarn'])
{
$__compilerVar32 .= '
						<a href="' . XenForo_Template_Helper_Core::link('members/warn', $profilePost, array(
'content_type' => 'profile_post',
'content_id' => $profilePost['profile_post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
					';
}
else if ($profilePost['warning_id'] && $canViewWarnings)
{
$__compilerVar32 .= '
						<a href="' . XenForo_Template_Helper_Core::link('warnings', $profilePost, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
					';
}
$__compilerVar32 .= '
					';
if ($profilePost['canReport'])
{
$__compilerVar32 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/report', $profilePost, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
					';
}
$__compilerVar32 .= '
					
					';
$__compilerVar31 .= $this->callTemplateHook('profile_post_private_controls', $__compilerVar32, array(
'profilePost' => $profilePost
));
unset($__compilerVar32);
$__compilerVar31 .= '
				</div>
			';
$__compilerVar33 = '';
$__compilerVar33 .= '
					';
$__compilerVar34 = '';
$__compilerVar34 .= '
					';
if ($profilePost['canLike'])
{
$__compilerVar34 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/like', $profilePost, array()) . '" class="LikeLink item control ' . (($profilePost['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($profilePost['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar34 .= '
					';
if ($profilePost['canComment'])
{
$__compilerVar34 .= '
						<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment', $profilePost, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Bình luận' . '</a>
					';
}
$__compilerVar34 .= '
					';
$__compilerVar33 .= $this->callTemplateHook('profile_post_public_controls', $__compilerVar34, array(
'profilePost' => $profilePost
));
unset($__compilerVar34);
$__compilerVar33 .= '
				';
if (trim($__compilerVar33) !== '')
{
$__compilerVar31 .= '
				<div class="publicControls">
				' . $__compilerVar33 . '
				</div>
			';
}
unset($__compilerVar33);
$__compilerVar31 .= '
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '">
				';
if ($profilePost['likes'])
{
$__compilerVar31 .= '
					';
$__compilerVar35 = '';
$__compilerVar35 .= XenForo_Template_Helper_Core::link('profile-posts/likes', $profilePost, array());
$__compilerVar36 = '';
if ($profilePost['likes'])
{
$__compilerVar36 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar36 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($profilePost['likes'],$__compilerVar35,$profilePost['like_date'],$profilePost['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar31 .= $__compilerVar36;
unset($__compilerVar35, $__compilerVar36);
$__compilerVar31 .= '
				';
}
$__compilerVar31 .= '
			</li>

			';
if ($profilePost['comments'])
{
$__compilerVar31 .= '

				';
if ($profilePost['comment_count'] > 3)
{
$__compilerVar31 .= '
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
$__compilerVar31 .= '

				';
foreach ($profilePost['comments'] AS $comment)
{
$__compilerVar31 .= '
					';
$__compilerVar37 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar37 .= '

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
$__compilerVar37 .= '<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment-delete', $profilePost, array(
'comment' => $comment['profile_post_comment_id']
)) . '" class="OverlayTrigger item control delete"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar37 .= '
		</div>
	</div>
</li>';
$__compilerVar31 .= $__compilerVar37;
unset($__compilerVar37);
$__compilerVar31 .= '
				';
}
$__compilerVar31 .= '

			';
}
$__compilerVar31 .= '

			';
if ($profilePost['canComment'])
{
$__compilerVar31 .= '
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
$__compilerVar31 .= '

		</ol>

	';
$__compilerVar38 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar38 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar38 .= '

<li id="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($profilePost['isDeleted']) ? ('deleted') : ('')) . ' ' . (($profilePost['is_staff']) ? ('staff') : ('')) . ' ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		';
$__compilerVar39 = '';
$__compilerVar39 .= '
					';
$__compilerVar40 = '';
$__compilerVar40 .= '
						';
if ($profilePost['warning_message'])
{
$__compilerVar40 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($profilePost['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar40 .= '
						';
if ($profilePost['isDeleted'])
{
$__compilerVar40 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($profilePost['isModerated'])
{
$__compilerVar40 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar40 .= '
						';
if ($profilePost['isIgnored'])
{
$__compilerVar40 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar40 .= '
					';
$__compilerVar39 .= $this->callTemplateHook('message_simple_notices', $__compilerVar40, array(
'message' => $profilePost
));
unset($__compilerVar40);
$__compilerVar39 .= '
				';
if (trim($__compilerVar39) !== '')
{
$__compilerVar38 .= '
			<ul class="messageNotices">
				' . $__compilerVar39 . '
			</ul>
		';
}
unset($__compilerVar39);
$__compilerVar38 .= '

		<div class="messageContent">
			';
if ($messagePosterHtml)
{
$__compilerVar38 .= '
				' . $messagePosterHtml . '
			';
}
else
{
$__compilerVar38 .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array(
'class' => 'poster'
))) . '
			';
}
$__compilerVar38 .= '
			<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
		</div>

		' . $__compilerVar31 . '
	</div>
</li>';
$__compilerVar29 .= $__compilerVar38;
unset($__compilerVar30, $__compilerVar31, $__compilerVar38);
$__compilerVar29 .= '
' . '
';
$__output .= $__compilerVar29;
unset($__compilerVar28, $__compilerVar29);
$__output .= '
			';
}
$__output .= '
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
$__compilerVar41 = '';
$__compilerVar42 = '';
$__compilerVar42 .= 'Post Moderation';
$__compilerVar43 = '';
$__compilerVar43 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar43 .= '<option value="delete">' . 'Xóa bài viết' . '</option>';
}
$__compilerVar43 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar43 .= '<option value="undelete">' . 'Bỏ xóa bài viết' . '</option>';
}
$__compilerVar43 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar43 .= '<option value="approve">' . 'Duyệt bài viết' . '</option>';
}
$__compilerVar43 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar43 .= '<option value="unapprove">' . 'Không duyệt bài viết' . '</option>';
}
$__compilerVar43 .= '
		<option value="deselect">' . 'Bỏ chọn bài viết' . '</option>
	';
$__compilerVar44 = '';
$__compilerVar44 .= 'Select / deselect all posts on this page';
$__compilerVar45 = '';
$__compilerVar45 .= 'Bài viết đã chọn';
$__compilerVar46 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar46 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar46 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar44, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar45, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar46 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar46 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar46 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar46 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar43 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar41 .= $__compilerVar46;
unset($__compilerVar42, $__compilerVar43, $__compilerVar44, $__compilerVar45, $__compilerVar46);
$__output .= $__compilerVar41;
unset($__compilerVar41);
$__output .= '
		</div>
	';
}
$__output .= '
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

<div class="pageNavLinkGroup">
	<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($total, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'find-new/profile-posts', $search, array(), false, array())) . '
</div>';
