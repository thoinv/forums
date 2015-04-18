<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($showingNewPosts)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Bài viết mới';
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Bài viết gần đây';
$__output .= '
';
}
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />';
$__output .= '

';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion_list.js');
$__output .= '
	
<div class="pageNavLinkGroup">
	<div class="linkGroup">
		';
if ($visitor['user_id'])
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('forums/-/mark-read', $forum, array(
'date' => $search['search_date']
)) . '" class="OverlayTrigger">' . 'Đánh dấu đã đọc' . '</a>';
}
$__output .= '
		';
if ($showingNewPosts)
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('find-new/posts', '', array(
'recent' => '1'
)) . '">' . 'Bài viết gần đây' . '</a>';
}
$__output .= '
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'find-new/posts', $search, array(), false, array())) . '
</div>

<div class="discussionList section">
	<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post"
		class="DiscussionList InlineModForm"
		data-cookieName="threads"
		data-controls="#InlineModControls"
		data-imodOptions="#ModerationSelect option">

		<dl class="sectionHeaders">
			<dt class="posterAvatar"></dt>
			<dd class="main">
				<a class="title"><span>' . 'Tiêu đề' . '</span></a>
				<a class="postDate"><span></span></a>
			</dd>
			<dd class="stats">
				<a class="major"><span>' . 'Trả lời' . '</span></a>
				<a class="minor"><span>' . 'Đọc' . '</span></a>
			</dd>
			<dd class="lastPost"><a><span>' . 'Bài viết cuối' . '</span></a></dd>
		</dl>
		
		';
$_activityBarShown = '';
$_activityBarShown .= '0';
$__output .= '
	
		<ol class="discussionListItems">
		';
foreach ($threads AS $thread)
{
$__output .= '
			
			';
if ($showingNewPosts AND !$_activityBarShown AND $thread['last_post_date'] < $session['previousActivity'])
{
$__output .= '
				<li class="discussionListItem"><div class="noteRow">' . 'Threads below this have not been updated since your last visit but have unread messages.' . '</div></li>
				';
$_activityBarShown = '';
$_activityBarShown .= '1';
$__output .= '
			';
}
$__output .= '
			
			';
$__compilerVar21 = '';
$__compilerVar21 .= '1';
$__compilerVar22 = '';
$__compilerVar22 .= '1';
$__compilerVar23 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar23 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar24 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar24 .= '

<li id="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="discussionListItem ' . htmlspecialchars($thread['discussion_state'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' new') : ('')) . (($thread['prefix_id']) ? (' prefix' . htmlspecialchars($thread['prefix_id'], ENT_QUOTES, 'UTF-8')) : ('')) . (($thread['isIgnored']) ? (' ignored') : ('')) . '" data-author="' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar25 = '';
$__compilerVar25 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar25 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar25 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar25 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar25 .= '
					';
if ($thread['sticky'])
{
$__compilerVar25 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar25 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar25 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar25 .= '
				';
if (trim($__compilerVar25) !== '')
{
$__compilerVar24 .= '
				<div class="iconKey">
				' . $__compilerVar25 . '
				</div>
			';
}
unset($__compilerVar25);
$__compilerVar24 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar24 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar24 .= '
				' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
				<label for="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '">' . XenForo_Template_Helper_Core::callHelper('wrap', array(
'0' => $thread['title'],
'1' => '50'
)) . '</label>
			</h3>

			<div class="secondRow">
				<div class="deletionNote">
					' . 'Chủ đề này, bắt đầu bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread
)) . ', đã bị xóa.' . '
					';
if ($thread['delete_username'])
{
$__compilerVar24 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar24 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar24 .= '.
					';
}
$__compilerVar24 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'Xem' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar24 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar24 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar23 .= $__compilerVar24;
unset($__compilerVar24);
}
else
{
$__compilerVar23 .= '

<li id="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="discussionListItem ' . htmlspecialchars($thread['discussion_state'], ENT_QUOTES, 'UTF-8') . ((!$thread['discussion_open']) ? (' locked') : ('')) . (($thread['sticky']) ? (' sticky') : ('')) . (($thread['isNew']) ? (' unread') : ('')) . (($thread['prefix_id']) ? (' prefix' . htmlspecialchars($thread['prefix_id'], ENT_QUOTES, 'UTF-8')) : ('')) . (($thread['isIgnored']) ? (' ignored') : ('')) . ' ' . (($thread['thread_is_watched']) ? ('threadWatched') : ('')) . ' ' . (($thread['forum_is_watched']) ? ('forumWatched') : ('')) . '" data-author="' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">
		<span class="avatarContainer">
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '
			';
if ($thread['user_post_count'])
{
$__compilerVar23 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'Bạn đã đăng ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' bài viết trong chủ đề này'
),''));
}
$__compilerVar23 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar26 = '';
$__compilerVar26 .= '
					';
$__compilerVar27 = '';
$__compilerVar27 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar27 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar27 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar27 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar27 .= '
					';
if ($thread['sticky'])
{
$__compilerVar27 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar27 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar27 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar27 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar27 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar27 .= '
					';
$__compilerVar26 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar27, array(
'thread' => $thread
));
unset($__compilerVar27);
$__compilerVar26 .= '
				';
if (trim($__compilerVar26) !== '')
{
$__compilerVar23 .= '
				<div class="iconKey">
				' . $__compilerVar26 . '
				</div>
			';
}
unset($__compilerVar26);
$__compilerVar23 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar23 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar23 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar23 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar23 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar23 .= '
					';
if ($linkPrefix)
{
$__compilerVar23 .= '
						<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'prefix_id' => $thread['prefix_id']
)) . '" class="prefixLink"
							title="' . 'Chỉ hiển thị các chủ đề với tiền tố là \'' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'plain',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'html',
'2' => ''
)) . '</a>
					';
}
else
{
$__compilerVar23 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar23 .= '
				';
}
$__compilerVar23 .= '
				<a href="' . XenForo_Template_Helper_Core::link('threads' . (($thread['isNew'] AND $thread['haveReadData']) ? ('/unread') : ('')), $thread, array()) . '"
					title="' . (($thread['isNew'] AND $thread['haveReadData']) ? ('Đến bài đầu tiên chưa đọc') : ('')) . '"
					class="' . (($thread['hasPreview']) ? ('PreviewTooltip') : ('')) . '"
					data-previewUrl="' . (($thread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $thread, array())) : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('wrap', array(
'0' => $thread['title'],
'1' => '50'
)) . '</a>
				';
if ($thread['isNew'])
{
$__compilerVar23 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Đến bài đầu tiên chưa đọc' . '"></a>';
}
$__compilerVar23 .= '
			</h3>
			
			<div class="secondRow">
				<div class="posterDate muted">
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',false,array(
'title' => 'Thread starter'
))) . '<span class="startDate">,
					<a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '"') : ('')) . ' class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date',
'title' => (($visitor['user_id']) ? ('Go to first message in thread') : (''))
))) . '</a></span>';
if ($__compilerVar21)
{
$__compilerVar23 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar23 .= '

					';
if ($__compilerVar22 AND $thread['lastPageNumbers'])
{
$__compilerVar23 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar23 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar23 .= '
						</span>
					';
}
$__compilerVar23 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar23 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $__compilerVar21
)) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar23 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar23 .= 'Email';
}
$__compilerVar23 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar23 .= '<div class="threadrating">
	';
$__compilerVar28 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar28 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar28 .= '
';
$__compilerVar29 = '';
$__compilerVar30 = '';
$__compilerVar30 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar31 = '';
$__compilerVar32 = '';
$__compilerVar32 .= '1';
$__compilerVar33 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar33 .= '

';
if ($__compilerVar29)
{
$__compilerVar33 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar33 .= '

	<form action="' . htmlspecialchars($__compilerVar29, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar32) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar31 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar30 >= 1) ? ('Full') : ('')) . (($__compilerVar30 >= 0.5 AND $__compilerVar30 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar30 >= 2) ? ('Full') : ('')) . (($__compilerVar30 >= 1.5 AND $__compilerVar30 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar30 >= 3) ? ('Full') : ('')) . (($__compilerVar30 >= 2.5 AND $__compilerVar30 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar30 >= 4) ? ('Full') : ('')) . (($__compilerVar30 >= 3.5 AND $__compilerVar30 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar30 >= 5) ? ('Full') : ('')) . (($__compilerVar30 >= 4.5 AND $__compilerVar30 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar33 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar33 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar33 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar33 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar33 .= 'tr_greyedout';
}
$__compilerVar33 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar31 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar30, '2') . '">
					 <span class="star ' . (($__compilerVar30 >= 1) ? ('Full') : ('')) . (($__compilerVar30 >= 0.5 AND $__compilerVar30 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar30 >= 2) ? ('Full') : ('')) . (($__compilerVar30 >= 1.5 AND $__compilerVar30 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar30 >= 3) ? ('Full') : ('')) . (($__compilerVar30 >= 2.5 AND $__compilerVar30 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar30 >= 4) ? ('Full') : ('')) . (($__compilerVar30 >= 3.5 AND $__compilerVar30 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar30 >= 5) ? ('Full') : ('')) . (($__compilerVar30 >= 4.5 AND $__compilerVar30 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar33 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar33 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar33 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar28 .= $__compilerVar33;
unset($__compilerVar29, $__compilerVar30, $__compilerVar31, $__compilerVar32, $__compilerVar33);
$__compilerVar28 .= '
';
}
$__compilerVar23 .= $__compilerVar28;
unset($__compilerVar28);
$__compilerVar23 .= '
</div>';
}
$__compilerVar23 .= '
			</div>
		</div>
	</div>

	<div class="listBlock stats pairsJustified" title="' . 'Members who liked the first message' . ': ' . (($thread['isRedirect']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0'))) . '">
		<dl class="major"><dt>' . 'Trả lời' . ':</dt> <dd>' . (($thread['isRedirect']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0'))) . '</dd></dl>
		<dl class="minor"><dt>' . 'Đọc' . ':</dt> <dd>' . (($thread['isRedirect']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0'))) . '</dd></dl>
	</div>

	<div class="listBlock lastPost">
		';
if ($thread['isRedirect'])
{
$__compilerVar23 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar23 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar23 .= 'Ignored Member';
}
else
{
$__compilerVar23 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar23 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar23 .= '
	</div>
</li>

';
}
$__output .= $__compilerVar23;
unset($__compilerVar21, $__compilerVar22, $__compilerVar23);
$__output .= '

		';
}
$__output .= '
		</ol>
	
		<div class="sectionFooter">
			<span class="contentSummary">' . 'Hiển thị kết quả từ ' . XenForo_Template_Helper_Core::numberFormat($threadStartOffset, '0') . ' đến ' . XenForo_Template_Helper_Core::numberFormat($threadEndOffset, '0') . ' của ' . XenForo_Template_Helper_Core::numberFormat($totalThreads, '0') . '' . '</span>
	
			';
if ($inlineModOptions)
{
$__output .= '
				';
$__compilerVar34 = '';
$__compilerVar35 = '';
$__compilerVar35 .= 'Thread Moderation';
$__compilerVar36 = '';
$__compilerVar36 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar36 .= '<option value="delete">' . 'Xóa các chủ đề' . '...</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar36 .= '<option value="undelete">' . 'Khôi phục các chủ đề' . '</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar36 .= '<option value="approve">' . 'Approve Threads' . '</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar36 .= '<option value="unapprove">' . 'Unapprove Threads' . '</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['stick'])
{
$__compilerVar36 .= '<option value="stick">' . 'Stick Threads' . '</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['unstick'])
{
$__compilerVar36 .= '<option value="unstick">' . 'Unstick Threads' . '</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['lock'])
{
$__compilerVar36 .= '<option value="lock">' . 'Lock Threads' . '</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['unlock'])
{
$__compilerVar36 .= '<option value="unlock">' . 'Unlock Threads' . '</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar36 .= '<option value="move">' . 'Move Threads' . '...</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['merge'])
{
$__compilerVar36 .= '<option value="merge">' . 'Merge Threads' . '...</option>';
}
$__compilerVar36 .= '
		';
if ($inlineModOptions['edit'])
{
$__compilerVar36 .= '<option value="prefix">' . 'Apply Thread Prefix' . '...</option>';
}
$__compilerVar36 .= '
		<option value="deselect">' . 'Bỏ chọn chủ đề' . '</option>
	';
$__compilerVar37 = '';
$__compilerVar37 .= 'Select / deselect all threads on this page';
$__compilerVar38 = '';
$__compilerVar38 .= 'Chủ đề đã chọn';
$__compilerVar39 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar39 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar39 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar37, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar38, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar39 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar39 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar39 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar39 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar36 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar34 .= $__compilerVar39;
unset($__compilerVar35, $__compilerVar36, $__compilerVar37, $__compilerVar38, $__compilerVar39);
$__output .= $__compilerVar34;
unset($__compilerVar34);
$__output .= '
			';
}
$__output .= '
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
	';
$__compilerVar40 = '';
$__compilerVar40 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar40;
unset($__compilerVar40);
$__output .= '

</div>

<div class="pageNavLinkGroup">
	<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'find-new/posts', $search, array(), false, array())) . '
</div>';
