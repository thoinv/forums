<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Tất cả chủ đề đang theo dõi' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Tất cả chủ đề đang theo dõi';
$__output .= '

';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Dưới đây là danh sách tất cả chủ đề mà bạn đang theo dõi.';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:watched/threads', false, array()), 'value' => 'Chủ đề đang theo dõi chưa đọc');
$__output .= '

';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

<div class="pageNavLinkGroup">
	<div class="linkGroup">
		';
if ($threads)
{
$__output .= '
			<div class="Popup">
				<a rel="Menu">' . 'Manage Watched Threads' . '</a>
				<div class="Menu">
					<div class="primaryContent menuHeader"><h3>' . 'Chủ đề đang theo dõi' . '</h3></div>
					<ul class="secondaryContent blockLinksList">
						<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads/all/manage', '', array(
'act' => 'watch_no_email'
)) . '" class="OverlayTrigger">' . 'Tắt thông báo Email' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads/all/manage', '', array(
'act' => ''
)) . '" class="OverlayTrigger">' . 'Stop watching threads' . '</a></li>
					</ul>
				</div>
			</div>
		';
}
$__output .= '
	</div>
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($threadsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'watched/threads/all', false, array(), false, array())) . '
</div>

<form action="' . XenForo_Template_Helper_Core::link('watched/threads/update', false, array()) . '" method="post" class="discussionList sectionMain">
	
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
if ($threads)
{
$__output .= '
		<ol class="discussionListItems">
		';
foreach ($threads AS $thread)
{
$__output .= '
			';
$__compilerVar16 = '';
$__compilerVar16 .= '1';
$__compilerVar17 = '';
$__compilerVar17 .= '1';
$__compilerVar18 = '';
$__compilerVar18 .= '1';
$__compilerVar19 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar19 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar20 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar20 .= '

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
$__compilerVar21 = '';
$__compilerVar21 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar21 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar21 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar21 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar21 .= '
					';
if ($thread['sticky'])
{
$__compilerVar21 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar21 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar21 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar21 .= '
				';
if (trim($__compilerVar21) !== '')
{
$__compilerVar20 .= '
				<div class="iconKey">
				' . $__compilerVar21 . '
				</div>
			';
}
unset($__compilerVar21);
$__compilerVar20 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar20 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar20 .= '
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
$__compilerVar20 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar20 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar20 .= '.
					';
}
$__compilerVar20 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'Xem' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar20 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar20 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar19 .= $__compilerVar20;
unset($__compilerVar20);
}
else
{
$__compilerVar19 .= '

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
$__compilerVar19 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'Bạn đã đăng ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' bài viết trong chủ đề này'
),''));
}
$__compilerVar19 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar22 = '';
$__compilerVar22 .= '
					';
$__compilerVar23 = '';
$__compilerVar23 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar23 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar23 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar23 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar23 .= '
					';
if ($thread['sticky'])
{
$__compilerVar23 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar23 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar23 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar23 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar23 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar23 .= '
					';
$__compilerVar22 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar23, array(
'thread' => $thread
));
unset($__compilerVar23);
$__compilerVar22 .= '
				';
if (trim($__compilerVar22) !== '')
{
$__compilerVar19 .= '
				<div class="iconKey">
				' . $__compilerVar22 . '
				</div>
			';
}
unset($__compilerVar22);
$__compilerVar19 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar19 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar19 .= '
				';
if ($__compilerVar16)
{
$__compilerVar19 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar19 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar19 .= '
					';
if ($linkPrefix)
{
$__compilerVar19 .= '
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
$__compilerVar19 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar19 .= '
				';
}
$__compilerVar19 .= '
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
$__compilerVar19 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Đến bài đầu tiên chưa đọc' . '"></a>';
}
$__compilerVar19 .= '
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
if ($__compilerVar17)
{
$__compilerVar19 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar19 .= '

					';
if ($__compilerVar18 AND $thread['lastPageNumbers'])
{
$__compilerVar19 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar19 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar19 .= '
						</span>
					';
}
$__compilerVar19 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar19 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $__compilerVar17
)) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar19 .= '
					';
if ($__compilerVar16 AND $thread['email_subscribe'])
{
$__compilerVar19 .= 'Email';
}
$__compilerVar19 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar19 .= '<div class="threadrating">
	';
$__compilerVar24 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar24 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar24 .= '
';
$__compilerVar25 = '';
$__compilerVar26 = '';
$__compilerVar26 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar27 = '';
$__compilerVar28 = '';
$__compilerVar28 .= '1';
$__compilerVar29 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar29 .= '

';
if ($__compilerVar25)
{
$__compilerVar29 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar29 .= '

	<form action="' . htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar28) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar27 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar26 >= 1) ? ('Full') : ('')) . (($__compilerVar26 >= 0.5 AND $__compilerVar26 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar26 >= 2) ? ('Full') : ('')) . (($__compilerVar26 >= 1.5 AND $__compilerVar26 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar26 >= 3) ? ('Full') : ('')) . (($__compilerVar26 >= 2.5 AND $__compilerVar26 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar26 >= 4) ? ('Full') : ('')) . (($__compilerVar26 >= 3.5 AND $__compilerVar26 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar26 >= 5) ? ('Full') : ('')) . (($__compilerVar26 >= 4.5 AND $__compilerVar26 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar29 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar29 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar29 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar29 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar29 .= 'tr_greyedout';
}
$__compilerVar29 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar27 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar26, '2') . '">
					 <span class="star ' . (($__compilerVar26 >= 1) ? ('Full') : ('')) . (($__compilerVar26 >= 0.5 AND $__compilerVar26 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar26 >= 2) ? ('Full') : ('')) . (($__compilerVar26 >= 1.5 AND $__compilerVar26 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar26 >= 3) ? ('Full') : ('')) . (($__compilerVar26 >= 2.5 AND $__compilerVar26 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar26 >= 4) ? ('Full') : ('')) . (($__compilerVar26 >= 3.5 AND $__compilerVar26 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar26 >= 5) ? ('Full') : ('')) . (($__compilerVar26 >= 4.5 AND $__compilerVar26 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar29 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar29 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar29 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar24 .= $__compilerVar29;
unset($__compilerVar25, $__compilerVar26, $__compilerVar27, $__compilerVar28, $__compilerVar29);
$__compilerVar24 .= '
';
}
$__compilerVar19 .= $__compilerVar24;
unset($__compilerVar24);
$__compilerVar19 .= '
</div>';
}
$__compilerVar19 .= '
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
$__compilerVar19 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar19 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar19 .= 'Ignored Member';
}
else
{
$__compilerVar19 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar19 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar19 .= '
	</div>
</li>

';
}
$__output .= $__compilerVar19;
unset($__compilerVar16, $__compilerVar17, $__compilerVar18, $__compilerVar19);
$__output .= '
		';
}
$__output .= '
		</ol>
	';
}
else
{
$__output .= '
		<div class="primaryContent">
			';
if ($page > 1)
{
$__output .= '
				' . 'Không có chủ đề.' . '
			';
}
else
{
$__output .= '
				' . 'You are not watching any threads.' . '
			';
}
$__output .= '
		</div>
	';
}
$__output .= '
	
	<div class="sectionFooter">
		<select name="do" class="textCtrl">
			<option>' . 'Lựa chọn với' . '...</option>
			<option value="email">' . 'Bật thông báo Email' . '</option>
			<option value="no_email">' . 'Tắt thông báo Email' . '</option>
			<option value="stop">' . 'Stop watching threads' . '</option>
		</select>
		<input type="submit" value="' . 'Tới' . '" class="button" class="button" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

<div class="pageNavLinkGroup">
	<div class="linkGroup"></div>
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($threadsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'watched/threads/all', false, array(), false, array())) . '
</div>

';
$__compilerVar30 = '';
$__compilerVar30 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar30;
unset($__compilerVar30);
