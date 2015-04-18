<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($RecentThreads)
{
$__output .= '
	';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '
	';
$this->addRequiredExternal('css', 'EWRblock_RecentThreads');
$__output .= '

	';
if ($position == ('top-left') OR $position == ('mid-left') OR $position == ('btm-left') OR $position == ('sidebar'))
{
$__output .= '

		<div class="section avatarList threadList">
			<div class="secondaryContent" id="recentThreads">
				<h3>' . 'Recent Threads' . '</h3>

				<ol class="discussionListItems">
					';
foreach ($RecentThreads AS $thread)
{
$__output .= '
						<li id="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="' . htmlspecialchars($thread['discussion_state'], ENT_QUOTES, 'UTF-8') . ' ' . (($thread['sticky']) ? ('sticky') : ('')) . ' ' . (($thread['isNew']) ? ('unread') : ('')) . '" data-author="' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '">
							' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '
							<div class="title">
								<a href="' . XenForo_Template_Helper_Core::link('threads' . (($thread['isNew'] AND $thread['haveReadData']) ? ('/unread') : ('')), $thread, array()) . '"
									title="' . (($thread['isNew'] AND $thread['haveReadData']) ? ('Đến bài đầu tiên chưa đọc') : ('')) . '"
									class="' . (($thread['hasPreview']) ? ('PreviewTooltip') : ('')) . '"
									data-previewUrl="' . (($thread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $thread, array())) : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => '50'
)) . '</a>
							</div>
							<div class="muted">
								<a href="' . XenForo_Template_Helper_Core::link('members', $thread['lastPostInfo'], array()) . '">' . htmlspecialchars($thread['lastPostInfo']['username'], ENT_QUOTES, 'UTF-8') . '</a> @
								<a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a>
							</div>
						</li>
					';
}
$__output .= '
				</ol>
			</div>
		</div>

	';
}
else
{
$__output .= '

		';
$this->addRequiredExternal('css', 'inline_mod');
$__output .= '
		';
$this->addRequiredExternal('js', 'js/xenforo/discussion_list.js');
$__output .= '

		<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post"
			class="DiscussionList InlineModForm"
			data-cookieName="threads"
			data-controls="#InlineModControls"
			data-imodOptions="#ModerationSelect option">

			<div class="discussionList section sectionMain" id="recentThreads">
				<dl class="sectionHeaders">
					<dt class="posterAvatar"></dt>
					<dd class="main">
						<a class="title"><span>' . 'Recent Threads' . '</span></a>
						<a class="postDate"><span>' . 'Ngày gửi' . '</span></a>
					</dd>
					<dd class="stats">
						<a class="major"><span>' . 'Trả lời' . '</span></a>
						<a class="minor"><span>' . 'Đọc' . '</span></a>
					</dd>
					<dd class="lastPost"><a><span>' . 'Bài viết cuối' . '</span></a></dd>
				</dl>

				<ol class="discussionListItems">
					';
foreach ($RecentThreads AS $thread)
{
$__output .= '
						';
$__compilerVar13 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar13 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar14 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar14 .= '

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
$__compilerVar15 = '';
$__compilerVar15 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar15 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar15 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar15 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar15 .= '
					';
if ($thread['sticky'])
{
$__compilerVar15 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar15 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar15 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar15 .= '
				';
if (trim($__compilerVar15) !== '')
{
$__compilerVar14 .= '
				<div class="iconKey">
				' . $__compilerVar15 . '
				</div>
			';
}
unset($__compilerVar15);
$__compilerVar14 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar14 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar14 .= '
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
$__compilerVar14 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar14 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar14 .= '.
					';
}
$__compilerVar14 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'Xem' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar14 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar14 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar13 .= $__compilerVar14;
unset($__compilerVar14);
}
else
{
$__compilerVar13 .= '

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
$__compilerVar13 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'Bạn đã đăng ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' bài viết trong chủ đề này'
),''));
}
$__compilerVar13 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar16 = '';
$__compilerVar16 .= '
					';
$__compilerVar17 = '';
$__compilerVar17 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar17 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar17 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar17 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar17 .= '
					';
if ($thread['sticky'])
{
$__compilerVar17 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar17 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar17 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar17 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar17 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar17 .= '
					';
$__compilerVar16 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar17, array(
'thread' => $thread
));
unset($__compilerVar17);
$__compilerVar16 .= '
				';
if (trim($__compilerVar16) !== '')
{
$__compilerVar13 .= '
				<div class="iconKey">
				' . $__compilerVar16 . '
				</div>
			';
}
unset($__compilerVar16);
$__compilerVar13 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar13 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar13 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar13 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar13 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar13 .= '
					';
if ($linkPrefix)
{
$__compilerVar13 .= '
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
$__compilerVar13 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar13 .= '
				';
}
$__compilerVar13 .= '
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
$__compilerVar13 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Đến bài đầu tiên chưa đọc' . '"></a>';
}
$__compilerVar13 .= '
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
if ($thread['showForumLink'])
{
$__compilerVar13 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar13 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar13 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar13 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar13 .= '
						</span>
					';
}
$__compilerVar13 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar13 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $thread['showForumLink']
)) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar13 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar13 .= 'Email';
}
$__compilerVar13 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar13 .= '<div class="threadrating">
	';
$__compilerVar18 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar18 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar18 .= '
';
$__compilerVar19 = '';
$__compilerVar20 = '';
$__compilerVar20 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar21 = '';
$__compilerVar22 = '';
$__compilerVar22 .= '1';
$__compilerVar23 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar23 .= '

';
if ($__compilerVar19)
{
$__compilerVar23 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar23 .= '

	<form action="' . htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar22) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar21 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar20 >= 1) ? ('Full') : ('')) . (($__compilerVar20 >= 0.5 AND $__compilerVar20 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar20 >= 2) ? ('Full') : ('')) . (($__compilerVar20 >= 1.5 AND $__compilerVar20 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar20 >= 3) ? ('Full') : ('')) . (($__compilerVar20 >= 2.5 AND $__compilerVar20 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar20 >= 4) ? ('Full') : ('')) . (($__compilerVar20 >= 3.5 AND $__compilerVar20 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar20 >= 5) ? ('Full') : ('')) . (($__compilerVar20 >= 4.5 AND $__compilerVar20 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar20, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar23 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar23 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar23 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar23 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar23 .= 'tr_greyedout';
}
$__compilerVar23 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar21 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar20, '2') . '">
					 <span class="star ' . (($__compilerVar20 >= 1) ? ('Full') : ('')) . (($__compilerVar20 >= 0.5 AND $__compilerVar20 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar20 >= 2) ? ('Full') : ('')) . (($__compilerVar20 >= 1.5 AND $__compilerVar20 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar20 >= 3) ? ('Full') : ('')) . (($__compilerVar20 >= 2.5 AND $__compilerVar20 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar20 >= 4) ? ('Full') : ('')) . (($__compilerVar20 >= 3.5 AND $__compilerVar20 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar20 >= 5) ? ('Full') : ('')) . (($__compilerVar20 >= 4.5 AND $__compilerVar20 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar20, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar23 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar23 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar23 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar18 .= $__compilerVar23;
unset($__compilerVar19, $__compilerVar20, $__compilerVar21, $__compilerVar22, $__compilerVar23);
$__compilerVar18 .= '
';
}
$__compilerVar13 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar13 .= '
</div>';
}
$__compilerVar13 .= '
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
$__compilerVar13 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar13 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar13 .= 'Ignored Member';
}
else
{
$__compilerVar13 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar13 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar13 .= '
	</div>
</li>

';
}
$__output .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '
					';
}
$__output .= '
				</ol>
			</div>

			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>

	';
}
$__output .= '

	';
$__compilerVar24 = '';
$__compilerVar24 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar24;
unset($__compilerVar24);
$__output .= '
';
}
