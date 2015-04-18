<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($layout == ('sidebar'))
{
$__output .= '

	';
$__compilerVar35 = '';
$__compilerVar35 .= '
					';
if ($widget['options']['type'] == ('recent') OR $widget['options']['type'] == ('latest_replies'))
{
$__compilerVar35 .= '

						';
foreach ($threads AS $thread)
{
$__compilerVar35 .= '
							';
$__compilerVar36 = '';
$__compilerVar36 .= (($visitor['user_id'] > 0) ? (XenForo_Template_Helper_Core::link('threads/unread', $thread, array())) : (XenForo_Template_Helper_Core::link('posts', array(
'post_id' => $thread['last_post_id']
), array())));
$__compilerVar37 = '';
$__compilerVar37 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '" class="username">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' replied' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['last_post_date'],array(
'time' => htmlspecialchars($thread['last_post_date'], ENT_QUOTES, 'UTF-8')
))) . '
								';
$__compilerVar38 = '';
$__compilerVar38 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar38 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar38 .= '

	<a ' . (($thread['title'] != XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
))) ? ('title="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '
		href="' . (($__compilerVar36) ? ($__compilerVar36) : (XenForo_Template_Helper_Core::link('threads', $thread, array()))) . '">
		' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
)) . '
	</a>

	<div class="userTitle">' . $__compilerVar37 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar38 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar38 .= '
</li>
';
$__compilerVar35 .= $__compilerVar38;
unset($__compilerVar36, $__compilerVar37, $__compilerVar38);
$__compilerVar35 .= '
						';
}
$__compilerVar35 .= '

					';
}
else if ($widget['options']['type'] == ('most_replied'))
{
$__compilerVar35 .= '

						';
foreach ($threads AS $thread)
{
$__compilerVar35 .= '
							';
$__compilerVar39 = '';
$__compilerVar39 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '" class="username">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ', ' . 'Trả lời' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '
								';
$__compilerVar40 = '';
$__compilerVar40 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar40 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar40 .= '

	<a ' . (($thread['title'] != XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
))) ? ('title="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '
		href="' . (($_threadLink) ? ($_threadLink) : (XenForo_Template_Helper_Core::link('threads', $thread, array()))) . '">
		' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
)) . '
	</a>

	<div class="userTitle">' . $__compilerVar39 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar40 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar40 .= '
</li>
';
$__compilerVar35 .= $__compilerVar40;
unset($__compilerVar39, $__compilerVar40);
$__compilerVar35 .= '
						';
}
$__compilerVar35 .= '

					';
}
else if ($widget['options']['type'] == ('most_liked'))
{
$__compilerVar35 .= '

						';
foreach ($threads AS $thread)
{
$__compilerVar35 .= '
							';
$__compilerVar41 = '';
$__compilerVar41 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '" class="username">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ',
									' . 'Thích' . ': <a href="' . XenForo_Template_Helper_Core::link('posts/likes', array(
'post_id' => $thread['first_post_id']
), array()) . '" class="OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0') . '</a>
								';
$__compilerVar42 = '';
$__compilerVar42 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar42 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar42 .= '

	<a ' . (($thread['title'] != XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
))) ? ('title="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '
		href="' . (($_threadLink) ? ($_threadLink) : (XenForo_Template_Helper_Core::link('threads', $thread, array()))) . '">
		' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
)) . '
	</a>

	<div class="userTitle">' . $__compilerVar41 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar42 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar42 .= '
</li>
';
$__compilerVar35 .= $__compilerVar42;
unset($__compilerVar41, $__compilerVar42);
$__compilerVar35 .= '
						';
}
$__compilerVar35 .= '

					';
}
else
{
$__compilerVar35 .= '

						';
foreach ($threads AS $thread)
{
$__compilerVar35 .= '
							';
$__compilerVar43 = '';
$__compilerVar43 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '" class="username">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => htmlspecialchars($thread['post_date'], ENT_QUOTES, 'UTF-8')
))) . '
								';
$__compilerVar44 = '';
$__compilerVar44 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar44 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar44 .= '

	<a ' . (($thread['title'] != XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
))) ? ('title="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '
		href="' . (($_threadLink) ? ($_threadLink) : (XenForo_Template_Helper_Core::link('threads', $thread, array()))) . '">
		' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
)) . '
	</a>

	<div class="userTitle">' . $__compilerVar43 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar44 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar44 .= '
</li>
';
$__compilerVar35 .= $__compilerVar44;
unset($__compilerVar43, $__compilerVar44);
$__compilerVar35 .= '
						';
}
$__compilerVar35 .= '

					';
}
$__compilerVar35 .= '
				';
if (trim($__compilerVar35) !== '')
{
$__output .= '
		<div class="avatarList">
			<ul>
				' . $__compilerVar35 . '
			</ul>
		</div>

		';
$__compilerVar45 = '';
$__compilerVar45 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar45;
unset($__compilerVar45);
$__output .= '
	';
}
unset($__compilerVar35);
$__output .= '

';
}
else if ($layout == ('list'))
{
$__output .= '
	
	';
$__compilerVar46 = '';
$__compilerVar46 .= '
						';
foreach ($threads AS $thread)
{
$__compilerVar46 .= '
							';
$__compilerVar47 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar47 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar48 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar48 .= '

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
$__compilerVar49 = '';
$__compilerVar49 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar49 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar49 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar49 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar49 .= '
					';
if ($thread['sticky'])
{
$__compilerVar49 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar49 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar49 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar49 .= '
				';
if (trim($__compilerVar49) !== '')
{
$__compilerVar48 .= '
				<div class="iconKey">
				' . $__compilerVar49 . '
				</div>
			';
}
unset($__compilerVar49);
$__compilerVar48 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar48 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar48 .= '
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
$__compilerVar48 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar48 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar48 .= '.
					';
}
$__compilerVar48 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'Xem' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar48 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar48 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar47 .= $__compilerVar48;
unset($__compilerVar48);
}
else
{
$__compilerVar47 .= '

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
$__compilerVar47 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'Bạn đã đăng ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' bài viết trong chủ đề này'
),''));
}
$__compilerVar47 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar50 = '';
$__compilerVar50 .= '
					';
$__compilerVar51 = '';
$__compilerVar51 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar51 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar51 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar51 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar51 .= '
					';
if ($thread['sticky'])
{
$__compilerVar51 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar51 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar51 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar51 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar51 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar51 .= '
					';
$__compilerVar50 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar51, array(
'thread' => $thread
));
unset($__compilerVar51);
$__compilerVar50 .= '
				';
if (trim($__compilerVar50) !== '')
{
$__compilerVar47 .= '
				<div class="iconKey">
				' . $__compilerVar50 . '
				</div>
			';
}
unset($__compilerVar50);
$__compilerVar47 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar47 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar47 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar47 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar47 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar47 .= '
					';
if ($linkPrefix)
{
$__compilerVar47 .= '
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
$__compilerVar47 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar47 .= '
				';
}
$__compilerVar47 .= '
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
$__compilerVar47 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Đến bài đầu tiên chưa đọc' . '"></a>';
}
$__compilerVar47 .= '
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
$__compilerVar47 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar47 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar47 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar47 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar47 .= '
						</span>
					';
}
$__compilerVar47 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar47 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar47 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar47 .= 'Email';
}
$__compilerVar47 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar47 .= '<div class="threadrating">
	';
$__compilerVar52 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar52 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar52 .= '
';
$__compilerVar53 = '';
$__compilerVar54 = '';
$__compilerVar54 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar55 = '';
$__compilerVar56 = '';
$__compilerVar56 .= '1';
$__compilerVar57 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar57 .= '

';
if ($__compilerVar53)
{
$__compilerVar57 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar57 .= '

	<form action="' . htmlspecialchars($__compilerVar53, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar56) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar55 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar54 >= 1) ? ('Full') : ('')) . (($__compilerVar54 >= 0.5 AND $__compilerVar54 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar54 >= 2) ? ('Full') : ('')) . (($__compilerVar54 >= 1.5 AND $__compilerVar54 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar54 >= 3) ? ('Full') : ('')) . (($__compilerVar54 >= 2.5 AND $__compilerVar54 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar54 >= 4) ? ('Full') : ('')) . (($__compilerVar54 >= 3.5 AND $__compilerVar54 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar54 >= 5) ? ('Full') : ('')) . (($__compilerVar54 >= 4.5 AND $__compilerVar54 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar54, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar57 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar57 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar57 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar57 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar57 .= 'tr_greyedout';
}
$__compilerVar57 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar55 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar54, '2') . '">
					 <span class="star ' . (($__compilerVar54 >= 1) ? ('Full') : ('')) . (($__compilerVar54 >= 0.5 AND $__compilerVar54 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar54 >= 2) ? ('Full') : ('')) . (($__compilerVar54 >= 1.5 AND $__compilerVar54 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar54 >= 3) ? ('Full') : ('')) . (($__compilerVar54 >= 2.5 AND $__compilerVar54 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar54 >= 4) ? ('Full') : ('')) . (($__compilerVar54 >= 3.5 AND $__compilerVar54 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar54 >= 5) ? ('Full') : ('')) . (($__compilerVar54 >= 4.5 AND $__compilerVar54 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar54, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar57 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar57 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar57 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar52 .= $__compilerVar57;
unset($__compilerVar53, $__compilerVar54, $__compilerVar55, $__compilerVar56, $__compilerVar57);
$__compilerVar52 .= '
';
}
$__compilerVar47 .= $__compilerVar52;
unset($__compilerVar52);
$__compilerVar47 .= '
</div>';
}
$__compilerVar47 .= '
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
$__compilerVar47 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar47 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar47 .= 'Ignored Member';
}
else
{
$__compilerVar47 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar47 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar47 .= '
	</div>
</li>

';
}
$__compilerVar46 .= $__compilerVar47;
unset($__compilerVar47);
$__compilerVar46 .= '
						';
}
$__compilerVar46 .= '
					';
if (trim($__compilerVar46) !== '')
{
$__output .= '
		<div class="discussionList">
			<div class="DiscussionList">

				<dl class="sectionHeaders">
					<dt class="posterAvatar"><a><span>&nbsp;</span></a></dt>
					<dd class="main">
						<a class="title"><span>' . 'Tiêu đề' . '</span></a>
						<a class="postDate"><span>' . 'Ngày gửi' . '</span></a>
					</dd>
					<dd class="stats">
						<a class="major"><span>' . 'Trả lời' . '</span></a>
						<a class="minor"><span>' . 'Đọc' . '</span></a>
					</dd>
					<dd class="lastPost"><a><span>' . 'Bài viết cuối' . '</span></a></dd>
				</dl>

				<ol class="discussionListItems">
					' . $__compilerVar46 . '
				</ol>

			</div>
		</div>

		';
$__compilerVar58 = '';
$__compilerVar58 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar58;
unset($__compilerVar58);
$__output .= '
	';
}
unset($__compilerVar46);
$__output .= '

';
}
else if ($layout == ('full'))
{
$__output .= '

	';
$__compilerVar59 = '';
$__compilerVar59 .= '

				';
foreach ($threads AS $thread)
{
$__compilerVar59 .= '
					';
$__compilerVar60 = '';
$this->addRequiredExternal('css', 'wf_default');
$__compilerVar60 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar60 .= '

';
$link = '';
$link .= (($thread['_link']) ? ($thread['_link']) : (XenForo_Template_Helper_Core::link('threads', $thread, array())));
$__compilerVar60 .= '
';
$info = '';
$__compilerVar61 = '';
$__compilerVar62 = '';
$__compilerVar62 .= '
			';
$__compilerVar63 = '';
$__compilerVar63 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullViewCount'))
{
$__compilerVar63 .= '
				<span class="viewCount">' . 'Đọc' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar63 .= '<span class="divider">/</span>';
}
$__compilerVar63 .= '
			';
}
$__compilerVar63 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes'))
{
$__compilerVar63 .= '
				<span class="firstPostLikes">' . 'Thích' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar63 .= '<span class="divider">/</span>';
}
$__compilerVar63 .= '
			';
}
$__compilerVar63 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar63 .= '
				<span class="replyCount">' . 'Trả lời' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '</span>
			';
}
$__compilerVar63 .= '

			';
$__compilerVar62 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_counters', $__compilerVar63, array(
'thread' => $thread
));
unset($__compilerVar63);
$__compilerVar62 .= '
		';
if (trim($__compilerVar62) !== '')
{
$__compilerVar61 .= '
	<div class="counters">
		' . $__compilerVar62 . '
	</div>
';
}
unset($__compilerVar62);
$__compilerVar61 .= '

';
$__compilerVar64 = '';
$__compilerVar64 .= '
			';
$__compilerVar65 = '';
$__compilerVar65 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullUser'))
{
$__compilerVar65 .= '
				<span class="user">' . 'by' . ' ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',(true),array())) . '</span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar65 .= '<span class="divider">,</span>';
}
$__compilerVar65 .= '
			';
}
$__compilerVar65 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum'))
{
$__compilerVar65 .= '
				<span class="user">' . 'trong diễn đàn' . ' <a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar65 .= '<span class="divider">,</span>';
}
$__compilerVar65 .= '
			';
}
$__compilerVar65 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar65 .= '
				<a href="' . $link . '">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date'
))) . '</a>
			';
}
$__compilerVar65 .= '

			';
$__compilerVar64 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_main', $__compilerVar65, array(
'thread' => $thread
));
unset($__compilerVar65);
$__compilerVar64 .= '
		';
if (trim($__compilerVar64) !== '')
{
$__compilerVar61 .= '
	<div class="main">
		' . $__compilerVar64 . '
	</div>
';
}
unset($__compilerVar64);
$info .= $__compilerVar61;
unset($__compilerVar61);
$__compilerVar60 .= '

<div id="post-' . htmlspecialchars($thread['first_post_id'], ENT_QUOTES, 'UTF-8') . '" class="message section sectionMain' . (($thread['isNew']) ? (' unread') : ('')) . '" data-author="' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="subHeading thread">
		<a href="' . $link . '">' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a>
	</div>

	';
if (!XenForo_Template_Helper_Core::styleProperty('wf_threads_fullInfoBottom'))
{
$__compilerVar60 .= '
		';
$__compilerVar66 = '';
$__compilerVar66 .= $info;
if (trim($__compilerVar66) !== '')
{
$__compilerVar60 .= '<div class="info">' . $__compilerVar66 . '</div>';
}
unset($__compilerVar66);
$__compilerVar60 .= '
	';
}
$__compilerVar60 .= '

	<div class="messageInfo">
		';
if ($thread['isNew'])
{
$__compilerVar60 .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__compilerVar60 .= '

		';
$__compilerVar67 = '';
$__compilerVar67 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText ugc baseHtml">
					' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => '0',
'2' => array(
'link' => $link
)
)) . '
				</blockquote>
			</article>
		</div>
		';
$__compilerVar60 .= $this->callTemplateHook('message_content', $__compilerVar67, array(
'message' => $thread,
'WidgetFramework_WidgetRenderer_Threads_FullThreadList' => '1'
));
unset($__compilerVar67);
$__compilerVar60 .= '

	</div>

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullInfoBottom'))
{
$__compilerVar60 .= '
		';
$__compilerVar68 = '';
$__compilerVar68 .= $info;
if (trim($__compilerVar68) !== '')
{
$__compilerVar60 .= '<div class="info">' . $__compilerVar68 . '</div>';
}
unset($__compilerVar68);
$__compilerVar60 .= '
	';
}
$__compilerVar60 .= '

</div>';
$__compilerVar59 .= $__compilerVar60;
unset($__compilerVar60);
$__compilerVar59 .= '
					' . '
				';
}
$__compilerVar59 .= '

			';
if (trim($__compilerVar59) !== '')
{
$__output .= '
		<div class="WidgetFramework_WidgetRenderer_Threads_FullThreadList">
			' . $__compilerVar59 . '
		</div>
		
		' . '
		' . '
	';
}
unset($__compilerVar59);
$__output .= '

';
}
