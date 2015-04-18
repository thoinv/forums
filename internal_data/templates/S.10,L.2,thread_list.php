<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion_list.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post"
	class="DiscussionList InlineModForm"
	data-cookieName="threads"
	data-controls="#InlineModControls"
	data-imodOptions="#ModerationSelect option">
	
	';
$__compilerVar36 = '';
$__compilerVar36 .= '
			';
if ($displayConditions['prefix_id'])
{
$__compilerVar36 .= '
				<dt>' . 'Tiền tố' . ':</dt>
				<dd><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $pageNavParams,
'prefix_id' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove filter' . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $displayConditions['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . ' <span class="gadget">x</span></a></dd>
			';
}
$__compilerVar36 .= '
			';
if (trim($__compilerVar36) !== '')
{
$__output .= '
		<div class="discussionListFilters secondaryContent">
			<h3 class="filtersHeading">' . 'Filters' . ':</h3>
			<dl class="pairsInline filterPairs">
			' . $__compilerVar36 . '
			</dl>
			<dl class="pairsInline removeAll">
				<dt>' . 'Remove all Filters' . ':</dt>
				<dd><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'order' => $pageNavParams['order'],
'direction' => $pageNavParams['direction']
)) . '" class="removeAllFilters Tooltip" data-tipclass="flipped" data-offsetx="8" title="' . 'Remove all Filters' . '">x</a></dd>
			</dl>
		</div>
	';
}
unset($__compilerVar36);
$__output .= '

	<dl class="sectionHeaders">
		<dt class="posterAvatar"><a><span>' . 'Sort by' . ':</span></a></dt>
		<dd class="main">
			<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['title']
)) . '" class="title"><span>' . 'Tiêu đề' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'title'
)) . '</span></a>
			<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['post_date']
)) . '" class="postDate"><span>' . 'Ngày gửi' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'post_date'
)) . '</span></a>
		</dd>
		<dd class="stats">
			<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['reply_count']
)) . '" class="major"><span>' . 'Trả lời' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'reply_count'
)) . '</span></a>
			<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['view_count']
)) . '" class="minor"><span>' . 'Đọc' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'view_count'
)) . '</span></a>
		</dd>
		<dd class="lastPost"><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['last_post_date']
)) . '"><span>' . 'Bài viết cuối' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'last_post_date'
)) . '</span></a></dd>
	</dl>

	<ol class="discussionListItems">
	';
if ($stickyThreads OR $threads)
{
$__output .= '
		';
$showLastPageNumbers = '';
$showLastPageNumbers .= '1';
$__output .= '
		';
$linkPrefix = '';
$linkPrefix .= '1';
$__output .= '
	
		';
$__compilerVar37 = '';
$__compilerVar37 .= '
		';
foreach ($stickyThreads AS $thread)
{
$__compilerVar37 .= '
			';
$__compilerVar38 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar38 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar39 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar39 .= '

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
$__compilerVar40 = '';
$__compilerVar40 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar40 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar40 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar40 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar40 .= '
					';
if ($thread['sticky'])
{
$__compilerVar40 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar40 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar40 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar40 .= '
				';
if (trim($__compilerVar40) !== '')
{
$__compilerVar39 .= '
				<div class="iconKey">
				' . $__compilerVar40 . '
				</div>
			';
}
unset($__compilerVar40);
$__compilerVar39 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar39 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar39 .= '
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
$__compilerVar39 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar39 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar39 .= '.
					';
}
$__compilerVar39 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'Xem' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar39 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar39 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar38 .= $__compilerVar39;
unset($__compilerVar39);
}
else
{
$__compilerVar38 .= '

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
$__compilerVar38 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'Bạn đã đăng ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' bài viết trong chủ đề này'
),''));
}
$__compilerVar38 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar41 = '';
$__compilerVar41 .= '
					';
$__compilerVar42 = '';
$__compilerVar42 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar42 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar42 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar42 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar42 .= '
					';
if ($thread['sticky'])
{
$__compilerVar42 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar42 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar42 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar42 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar42 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar42 .= '
					';
$__compilerVar41 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar42, array(
'thread' => $thread
));
unset($__compilerVar42);
$__compilerVar41 .= '
				';
if (trim($__compilerVar41) !== '')
{
$__compilerVar38 .= '
				<div class="iconKey">
				' . $__compilerVar41 . '
				</div>
			';
}
unset($__compilerVar41);
$__compilerVar38 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar38 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar38 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar38 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar38 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar38 .= '
					';
if ($linkPrefix)
{
$__compilerVar38 .= '
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
$__compilerVar38 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar38 .= '
				';
}
$__compilerVar38 .= '
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
$__compilerVar38 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Đến bài đầu tiên chưa đọc' . '"></a>';
}
$__compilerVar38 .= '
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
if ($showForumLink)
{
$__compilerVar38 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar38 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar38 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar38 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar38 .= '
						</span>
					';
}
$__compilerVar38 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar38 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar38 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar38 .= 'Email';
}
$__compilerVar38 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar38 .= '<div class="threadrating">
	';
$__compilerVar43 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar43 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar43 .= '
';
$__compilerVar44 = '';
$__compilerVar45 = '';
$__compilerVar45 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar46 = '';
$__compilerVar47 = '';
$__compilerVar47 .= '1';
$__compilerVar48 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar48 .= '

';
if ($__compilerVar44)
{
$__compilerVar48 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar48 .= '

	<form action="' . htmlspecialchars($__compilerVar44, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar47) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar46 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar45 >= 1) ? ('Full') : ('')) . (($__compilerVar45 >= 0.5 AND $__compilerVar45 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar45 >= 2) ? ('Full') : ('')) . (($__compilerVar45 >= 1.5 AND $__compilerVar45 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar45 >= 3) ? ('Full') : ('')) . (($__compilerVar45 >= 2.5 AND $__compilerVar45 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar45 >= 4) ? ('Full') : ('')) . (($__compilerVar45 >= 3.5 AND $__compilerVar45 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar45 >= 5) ? ('Full') : ('')) . (($__compilerVar45 >= 4.5 AND $__compilerVar45 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar45, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar48 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar48 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar48 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar48 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar48 .= 'tr_greyedout';
}
$__compilerVar48 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar46 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar45, '2') . '">
					 <span class="star ' . (($__compilerVar45 >= 1) ? ('Full') : ('')) . (($__compilerVar45 >= 0.5 AND $__compilerVar45 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar45 >= 2) ? ('Full') : ('')) . (($__compilerVar45 >= 1.5 AND $__compilerVar45 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar45 >= 3) ? ('Full') : ('')) . (($__compilerVar45 >= 2.5 AND $__compilerVar45 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar45 >= 4) ? ('Full') : ('')) . (($__compilerVar45 >= 3.5 AND $__compilerVar45 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar45 >= 5) ? ('Full') : ('')) . (($__compilerVar45 >= 4.5 AND $__compilerVar45 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar45, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar48 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar48 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar48 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar43 .= $__compilerVar48;
unset($__compilerVar44, $__compilerVar45, $__compilerVar46, $__compilerVar47, $__compilerVar48);
$__compilerVar43 .= '
';
}
$__compilerVar38 .= $__compilerVar43;
unset($__compilerVar43);
$__compilerVar38 .= '
</div>';
}
$__compilerVar38 .= '
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
$__compilerVar38 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar38 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar38 .= 'Ignored Member';
}
else
{
$__compilerVar38 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar38 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar38 .= '
	</div>
</li>

';
}
$__compilerVar37 .= $__compilerVar38;
unset($__compilerVar38);
$__compilerVar37 .= '
		';
}
$__compilerVar37 .= '
		';
$__output .= $this->callTemplateHook('thread_list_stickies', $__compilerVar37, array());
unset($__compilerVar37);
$__output .= '
		
		';
$__compilerVar49 = '';
$__compilerVar50 = '';
$__compilerVar49 .= $this->callTemplateHook('ad_thread_list_below_stickies', $__compilerVar50, array());
unset($__compilerVar50);
$__output .= $__compilerVar49;
unset($__compilerVar49);
$__output .= '
		
		';
$__compilerVar51 = '';
$__compilerVar51 .= '
		';
foreach ($threads AS $thread)
{
$__compilerVar51 .= '
			';
$__compilerVar52 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar52 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar53 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar53 .= '

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
$__compilerVar54 = '';
$__compilerVar54 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar54 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar54 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar54 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar54 .= '
					';
if ($thread['sticky'])
{
$__compilerVar54 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar54 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar54 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar54 .= '
				';
if (trim($__compilerVar54) !== '')
{
$__compilerVar53 .= '
				<div class="iconKey">
				' . $__compilerVar54 . '
				</div>
			';
}
unset($__compilerVar54);
$__compilerVar53 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar53 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar53 .= '
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
$__compilerVar53 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar53 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar53 .= '.
					';
}
$__compilerVar53 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'Xem' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar53 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar53 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar52 .= $__compilerVar53;
unset($__compilerVar53);
}
else
{
$__compilerVar52 .= '

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
$__compilerVar52 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'Bạn đã đăng ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' bài viết trong chủ đề này'
),''));
}
$__compilerVar52 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar55 = '';
$__compilerVar55 .= '
					';
$__compilerVar56 = '';
$__compilerVar56 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar56 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar56 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar56 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar56 .= '
					';
if ($thread['sticky'])
{
$__compilerVar56 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar56 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar56 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar56 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar56 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar56 .= '
					';
$__compilerVar55 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar56, array(
'thread' => $thread
));
unset($__compilerVar56);
$__compilerVar55 .= '
				';
if (trim($__compilerVar55) !== '')
{
$__compilerVar52 .= '
				<div class="iconKey">
				' . $__compilerVar55 . '
				</div>
			';
}
unset($__compilerVar55);
$__compilerVar52 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar52 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar52 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar52 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar52 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar52 .= '
					';
if ($linkPrefix)
{
$__compilerVar52 .= '
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
$__compilerVar52 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar52 .= '
				';
}
$__compilerVar52 .= '
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
$__compilerVar52 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Đến bài đầu tiên chưa đọc' . '"></a>';
}
$__compilerVar52 .= '
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
if ($showForumLink)
{
$__compilerVar52 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar52 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar52 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar52 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar52 .= '
						</span>
					';
}
$__compilerVar52 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar52 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar52 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar52 .= 'Email';
}
$__compilerVar52 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar52 .= '<div class="threadrating">
	';
$__compilerVar57 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar57 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar57 .= '
';
$__compilerVar58 = '';
$__compilerVar59 = '';
$__compilerVar59 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar60 = '';
$__compilerVar61 = '';
$__compilerVar61 .= '1';
$__compilerVar62 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar62 .= '

';
if ($__compilerVar58)
{
$__compilerVar62 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar62 .= '

	<form action="' . htmlspecialchars($__compilerVar58, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar61) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar60 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar59 >= 1) ? ('Full') : ('')) . (($__compilerVar59 >= 0.5 AND $__compilerVar59 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar59 >= 2) ? ('Full') : ('')) . (($__compilerVar59 >= 1.5 AND $__compilerVar59 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar59 >= 3) ? ('Full') : ('')) . (($__compilerVar59 >= 2.5 AND $__compilerVar59 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar59 >= 4) ? ('Full') : ('')) . (($__compilerVar59 >= 3.5 AND $__compilerVar59 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar59 >= 5) ? ('Full') : ('')) . (($__compilerVar59 >= 4.5 AND $__compilerVar59 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar59, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar62 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar62 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar62 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar62 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar62 .= 'tr_greyedout';
}
$__compilerVar62 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar60 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar59, '2') . '">
					 <span class="star ' . (($__compilerVar59 >= 1) ? ('Full') : ('')) . (($__compilerVar59 >= 0.5 AND $__compilerVar59 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar59 >= 2) ? ('Full') : ('')) . (($__compilerVar59 >= 1.5 AND $__compilerVar59 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar59 >= 3) ? ('Full') : ('')) . (($__compilerVar59 >= 2.5 AND $__compilerVar59 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar59 >= 4) ? ('Full') : ('')) . (($__compilerVar59 >= 3.5 AND $__compilerVar59 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar59 >= 5) ? ('Full') : ('')) . (($__compilerVar59 >= 4.5 AND $__compilerVar59 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar59, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar62 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar62 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar62 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar57 .= $__compilerVar62;
unset($__compilerVar58, $__compilerVar59, $__compilerVar60, $__compilerVar61, $__compilerVar62);
$__compilerVar57 .= '
';
}
$__compilerVar52 .= $__compilerVar57;
unset($__compilerVar57);
$__compilerVar52 .= '
</div>';
}
$__compilerVar52 .= '
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
$__compilerVar52 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar52 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar52 .= 'Ignored Member';
}
else
{
$__compilerVar52 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar52 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar52 .= '
	</div>
</li>

';
}
$__compilerVar51 .= $__compilerVar52;
unset($__compilerVar52);
$__compilerVar51 .= '
		';
}
$__compilerVar51 .= '
		';
$__output .= $this->callTemplateHook('thread_list_threads', $__compilerVar51, array());
unset($__compilerVar51);
$__output .= '
		
		' . '
	';
}
else
{
$__output .= '
		<li class="primaryContent">' . 'Không có chủ đề.' . '</li>
	';
}
$__output .= '
	';
if ($showDateLimitDisabler)
{
$__output .= '
		<li class="discussionListItem"><div class="noteRow secondary"><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $pageNavParams,
'no_date_limit' => '1',
'page' => (($page > 1) ? ($page) : (''))
)) . '">' . 'Click here to display older threads.' . '</a></div></li>
	';
}
$__output .= '
	</ol>

	';
if ($totalThreads OR $inlineModOptions)
{
$__output .= '
		<div class="sectionFooter InlineMod SelectionCountContainer">
			';
if ($totalThreads)
{
$__output .= '<span class="contentSummary">' . 'Hiển thị chủ đề từ ' . XenForo_Template_Helper_Core::numberFormat($threadStartOffset, '0') . ' đến ' . XenForo_Template_Helper_Core::numberFormat($threadEndOffset, '0') . ' của ' . XenForo_Template_Helper_Core::numberFormat($totalThreads, '0') . '' . '</span>';
}
$__output .= '

			';
if ($inlineModOptions)
{
$__output .= '
				';
$__compilerVar63 = '';
$__compilerVar64 = '';
$__compilerVar64 .= 'Thread Moderation';
$__compilerVar65 = '';
$__compilerVar65 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar65 .= '<option value="delete">' . 'Xóa các chủ đề' . '...</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar65 .= '<option value="undelete">' . 'Khôi phục các chủ đề' . '</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar65 .= '<option value="approve">' . 'Approve Threads' . '</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar65 .= '<option value="unapprove">' . 'Unapprove Threads' . '</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['stick'])
{
$__compilerVar65 .= '<option value="stick">' . 'Stick Threads' . '</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['unstick'])
{
$__compilerVar65 .= '<option value="unstick">' . 'Unstick Threads' . '</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['lock'])
{
$__compilerVar65 .= '<option value="lock">' . 'Lock Threads' . '</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['unlock'])
{
$__compilerVar65 .= '<option value="unlock">' . 'Unlock Threads' . '</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar65 .= '<option value="move">' . 'Move Threads' . '...</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['merge'])
{
$__compilerVar65 .= '<option value="merge">' . 'Merge Threads' . '...</option>';
}
$__compilerVar65 .= '
		';
if ($inlineModOptions['edit'])
{
$__compilerVar65 .= '<option value="prefix">' . 'Apply Thread Prefix' . '...</option>';
}
$__compilerVar65 .= '
		<option value="deselect">' . 'Bỏ chọn chủ đề' . '</option>
	';
$__compilerVar66 = '';
$__compilerVar66 .= 'Select / deselect all threads on this page';
$__compilerVar67 = '';
$__compilerVar67 .= 'Chủ đề đã chọn';
$__compilerVar68 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar68 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar68 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar66, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar67, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar68 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar68 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar68 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar68 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar65 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar63 .= $__compilerVar68;
unset($__compilerVar64, $__compilerVar65, $__compilerVar66, $__compilerVar67, $__compilerVar68);
$__output .= $__compilerVar63;
unset($__compilerVar63);
$__output .= '
			';
}
$__output .= '
		</div>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

<h3 id="DiscussionListOptionsHandle" class="JsOnly"><a href="#">' . 'Tùy chọn hiển thị chủ đề' . '</a></h3>

<form action="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" method="post" class="DiscussionListOptions secondaryContent">

	';
$__compilerVar69 = '';
$__compilerVar69 .= '
	<div class="controlGroup">
		<label for="ctrl_order">' . 'Xếp chủ đề theo' . ':</label>
		<select name="order" id="ctrl_order" class="textCtrl">
			<option value="last_post_date" ' . (($order == ('last_post_date')) ? ' selected="selected"' : '') . '>' . 'Lần gửi bài cuối' . '</option>
			<option value="post_date" ' . (($order == ('post_date')) ? ' selected="selected"' : '') . '>' . 'Thời gian tạo chủ đề' . '</option>
			<option value="title" ' . (($order == ('title')) ? ' selected="selected"' : '') . '>' . 'Tiêu đề (sắp xếp ABC)' . '</option>
			<option value="reply_count" ' . (($order == ('reply_count')) ? ' selected="selected"' : '') . '>' . 'Số lượng trả lời' . '</option>
			<option value="view_count" ' . (($order == ('view_count')) ? ' selected="selected"' : '') . '>' . 'Số lượt xem' . '</option>
			<option value="first_post_likes" ' . (($order == ('first_post_likes')) ? ' selected="selected"' : '') . '>' . 'Bài viết đầu được yêu thích' . '</option>
			';
if ($threadrating['canView'])
{
$__compilerVar69 .= '<option value="rating" ' . (($order == ('rating')) ? ' selected="selected"' : '') . '>' . 'Thread Rating' . '</option>';
}
$__compilerVar69 .= '
		</select>
	</div>

	<div class="controlGroup">
		<label for="ctrl_direction">' . 'Xếp chủ đề kiểu' . ':</label>
		<select name="direction" id="ctrl_direction" class="textCtrl">
			<option value="desc" ' . (($orderDirection == ('desc')) ? ' selected="selected"' : '') . '>' . 'Thứ tự giảm dần' . '</option>
			<option value="asc" ' . (($orderDirection == ('asc')) ? ' selected="selected"' : '') . '>' . 'Thứ tự tăng dần' . '</option>
		</select>
	</div>
	
	';
if ($forum['prefixCache'])
{
$__compilerVar69 .= '
		<div class="controlGroup">
			<label for="ctrl_prefix_id">' . 'Tiền tố' . ':</label>
			<select name="prefix_id" id="ctrl_prefix_id" class="textCtrl">
				<option value="0" ' . ((!$displayConditions['prefix_id']) ? ' selected="selected"' : '') . '>(' . 'Mọi' . ')</option>
				';
foreach ($forum['prefixCache'] AS $prefixGroupId => $prefixes)
{
$__compilerVar69 .= '
					';
if ($prefixGroupId)
{
$__compilerVar69 .= '
						<optgroup label="' . XenForo_Template_Helper_Core::callHelper('threadPrefixGroup', array(
'0' => $prefixGroupId
)) . '">
						';
foreach ($prefixes AS $prefixId)
{
$__compilerVar69 .= '
							<option value="' . htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8') . '" ' . (($displayConditions['prefix_id'] == $prefixId) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefixId,
'1' => 'escaped',
'2' => ''
)) . '</option>
						';
}
$__compilerVar69 .= '
						</optgroup>
					';
}
else
{
$__compilerVar69 .= '
						';
foreach ($prefixes AS $prefixId)
{
$__compilerVar69 .= '
							<option value="' . htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8') . '" ' . (($displayConditions['prefix_id'] == $prefixId) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefixId,
'1' => 'escaped',
'2' => ''
)) . '</option>
						';
}
$__compilerVar69 .= '
					';
}
$__compilerVar69 .= '
				';
}
$__compilerVar69 .= '
			</select>
		</div>
	';
}
$__compilerVar69 .= '

	<div class="buttonGroup">
		<input type="submit" class="button primary" value="' . 'Đặt tùy chọn' . '" />
		<input type="reset" class="button" value="' . 'Hủy bỏ' . '" />
	</div>
	';
$__output .= $this->callTemplateHook('thread_list_options', $__compilerVar69, array());
unset($__compilerVar69);
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
$__compilerVar70 = '';
$__compilerVar70 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar70;
unset($__compilerVar70);
