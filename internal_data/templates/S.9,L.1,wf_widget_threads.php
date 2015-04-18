<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($layout == ('sidebar'))
{
$__output .= '

	';
$__compilerVar1 = '';
$__compilerVar1 .= '
					';
if ($widget['options']['type'] == ('recent') OR $widget['options']['type'] == ('latest_replies'))
{
$__compilerVar1 .= '

						';
foreach ($threads AS $thread)
{
$__compilerVar1 .= '
							';
$__compilerVar2 = '';
$__compilerVar2 .= (($visitor['user_id'] > 0) ? (XenForo_Template_Helper_Core::link('threads/unread', $thread, array())) : (XenForo_Template_Helper_Core::link('posts', array(
'post_id' => $thread['last_post_id']
), array())));
$__compilerVar3 = '';
$__compilerVar3 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '" class="username">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' replied' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['last_post_date'],array(
'time' => htmlspecialchars($thread['last_post_date'], ENT_QUOTES, 'UTF-8')
))) . '
								';
$__compilerVar4 = '';
$__compilerVar4 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar4 .= '

	<a ' . (($thread['title'] != XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
))) ? ('title="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '
		href="' . (($__compilerVar2) ? ($__compilerVar2) : (XenForo_Template_Helper_Core::link('threads', $thread, array()))) . '">
		' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
)) . '
	</a>

	<div class="userTitle">' . $__compilerVar3 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar4 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar4 .= '
</li>
';
$__compilerVar1 .= $__compilerVar4;
unset($__compilerVar2, $__compilerVar3, $__compilerVar4);
$__compilerVar1 .= '
						';
}
$__compilerVar1 .= '

					';
}
else if ($widget['options']['type'] == ('most_replied'))
{
$__compilerVar1 .= '

						';
foreach ($threads AS $thread)
{
$__compilerVar1 .= '
							';
$__compilerVar5 = '';
$__compilerVar5 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '" class="username">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ', ' . 'Replies' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '
								';
$__compilerVar6 = '';
$__compilerVar6 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar6 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar6 .= '

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

	<div class="userTitle">' . $__compilerVar5 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar6 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar6 .= '
</li>
';
$__compilerVar1 .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__compilerVar1 .= '
						';
}
$__compilerVar1 .= '

					';
}
else if ($widget['options']['type'] == ('most_liked'))
{
$__compilerVar1 .= '

						';
foreach ($threads AS $thread)
{
$__compilerVar1 .= '
							';
$__compilerVar7 = '';
$__compilerVar7 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '" class="username">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ',
									' . 'Likes' . ': <a href="' . XenForo_Template_Helper_Core::link('posts/likes', array(
'post_id' => $thread['first_post_id']
), array()) . '" class="OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0') . '</a>
								';
$__compilerVar8 = '';
$__compilerVar8 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar8 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar8 .= '

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

	<div class="userTitle">' . $__compilerVar7 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar8 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar8 .= '
</li>
';
$__compilerVar1 .= $__compilerVar8;
unset($__compilerVar7, $__compilerVar8);
$__compilerVar1 .= '
						';
}
$__compilerVar1 .= '

					';
}
else
{
$__compilerVar1 .= '

						';
foreach ($threads AS $thread)
{
$__compilerVar1 .= '
							';
$__compilerVar9 = '';
$__compilerVar9 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '" class="username">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => htmlspecialchars($thread['post_date'], ENT_QUOTES, 'UTF-8')
))) . '
								';
$__compilerVar10 = '';
$__compilerVar10 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar10 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar10 .= '

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

	<div class="userTitle">' . $__compilerVar9 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar10 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar10 .= '
</li>
';
$__compilerVar1 .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__compilerVar1 .= '
						';
}
$__compilerVar1 .= '

					';
}
$__compilerVar1 .= '
				';
if (trim($__compilerVar1) !== '')
{
$__output .= '
		<div class="avatarList">
			<ul>
				' . $__compilerVar1 . '
			</ul>
		</div>

		';
$__compilerVar11 = '';
$__compilerVar11 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar11;
unset($__compilerVar11);
$__output .= '
	';
}
unset($__compilerVar1);
$__output .= '

';
}
else if ($layout == ('list'))
{
$__output .= '
	
	';
$__compilerVar12 = '';
$__compilerVar12 .= '
						';
foreach ($threads AS $thread)
{
$__compilerVar12 .= '
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
$__compilerVar15 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar15 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar15 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar15 .= '
					';
if ($thread['sticky'])
{
$__compilerVar15 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
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
$__compilerVar14 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
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
					' . 'This thread, started by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread
)) . ', has been deleted.' . '
					';
if ($thread['delete_username'])
{
$__compilerVar14 .= '
						' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar14 .= ', ' . 'Reason' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar14 .= '.
					';
}
$__compilerVar14 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'View' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar14 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
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
'title' => 'You have posted ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' message(s) in this thread'
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
$__compilerVar17 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar17 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar17 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar17 .= '
					';
if ($thread['sticky'])
{
$__compilerVar17 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
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
$__compilerVar13 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
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
							title="' . 'Show only threads prefixed by \'' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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
					title="' . (($thread['isNew'] AND $thread['haveReadData']) ? ('Go to first unread message') : ('')) . '"
					class="' . (($thread['hasPreview']) ? ('PreviewTooltip') : ('')) . '"
					data-previewUrl="' . (($thread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $thread, array())) : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('wrap', array(
'0' => $thread['title'],
'1' => '50'
)) . '</a>
				';
if ($thread['isNew'])
{
$__compilerVar13 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Go to first unread message' . '"></a>';
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
if ($showForumLink)
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
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
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
		<dl class="major"><dt>' . 'Replies' . ':</dt> <dd>' . (($thread['isRedirect']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0'))) . '</dd></dl>
		<dl class="minor"><dt>' . 'Views' . ':</dt> <dd>' . (($thread['isRedirect']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0'))) . '</dd></dl>
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
$__compilerVar12 .= $__compilerVar13;
unset($__compilerVar13);
$__compilerVar12 .= '
						';
}
$__compilerVar12 .= '
					';
if (trim($__compilerVar12) !== '')
{
$__output .= '
		<div class="discussionList">
			<div class="DiscussionList">

				<dl class="sectionHeaders">
					<dt class="posterAvatar"><a><span>&nbsp;</span></a></dt>
					<dd class="main">
						<a class="title"><span>' . 'Title' . '</span></a>
						<a class="postDate"><span>' . 'Start Date' . '</span></a>
					</dd>
					<dd class="stats">
						<a class="major"><span>' . 'Replies' . '</span></a>
						<a class="minor"><span>' . 'Views' . '</span></a>
					</dd>
					<dd class="lastPost"><a><span>' . 'Last Message' . '</span></a></dd>
				</dl>

				<ol class="discussionListItems">
					' . $__compilerVar12 . '
				</ol>

			</div>
		</div>

		';
$__compilerVar24 = '';
$__compilerVar24 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar24;
unset($__compilerVar24);
$__output .= '
	';
}
unset($__compilerVar12);
$__output .= '

';
}
else if ($layout == ('full'))
{
$__output .= '

	';
$__compilerVar25 = '';
$__compilerVar25 .= '

				';
foreach ($threads AS $thread)
{
$__compilerVar25 .= '
					';
$__compilerVar26 = '';
$this->addRequiredExternal('css', 'wf_default');
$__compilerVar26 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar26 .= '

';
$link = '';
$link .= (($thread['_link']) ? ($thread['_link']) : (XenForo_Template_Helper_Core::link('threads', $thread, array())));
$__compilerVar26 .= '
';
$info = '';
$__compilerVar27 = '';
$__compilerVar28 = '';
$__compilerVar28 .= '
			';
$__compilerVar29 = '';
$__compilerVar29 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullViewCount'))
{
$__compilerVar29 .= '
				<span class="viewCount">' . 'Views' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar29 .= '<span class="divider">/</span>';
}
$__compilerVar29 .= '
			';
}
$__compilerVar29 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullFirstPostLikes'))
{
$__compilerVar29 .= '
				<span class="firstPostLikes">' . 'Likes' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['first_post_likes'], '0') . '</span>
				';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar29 .= '<span class="divider">/</span>';
}
$__compilerVar29 .= '
			';
}
$__compilerVar29 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullReplyCount'))
{
$__compilerVar29 .= '
				<span class="replyCount">' . 'Replies' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '</span>
			';
}
$__compilerVar29 .= '

			';
$__compilerVar28 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_counters', $__compilerVar29, array(
'thread' => $thread
));
unset($__compilerVar29);
$__compilerVar28 .= '
		';
if (trim($__compilerVar28) !== '')
{
$__compilerVar27 .= '
	<div class="counters">
		' . $__compilerVar28 . '
	</div>
';
}
unset($__compilerVar28);
$__compilerVar27 .= '

';
$__compilerVar30 = '';
$__compilerVar30 .= '
			';
$__compilerVar31 = '';
$__compilerVar31 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullUser'))
{
$__compilerVar31 .= '
				<span class="user">' . 'by' . ' ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',(true),array())) . '</span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum') OR XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar31 .= '<span class="divider">,</span>';
}
$__compilerVar31 .= '
			';
}
$__compilerVar31 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullForum'))
{
$__compilerVar31 .= '
				<span class="user">' . 'in forum' . ' <a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar31 .= '<span class="divider">,</span>';
}
$__compilerVar31 .= '
			';
}
$__compilerVar31 .= '

			';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullDate'))
{
$__compilerVar31 .= '
				<a href="' . $link . '">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date'
))) . '</a>
			';
}
$__compilerVar31 .= '

			';
$__compilerVar30 .= $this->callTemplateHook('wf_widget_threads_thread_full_info_main', $__compilerVar31, array(
'thread' => $thread
));
unset($__compilerVar31);
$__compilerVar30 .= '
		';
if (trim($__compilerVar30) !== '')
{
$__compilerVar27 .= '
	<div class="main">
		' . $__compilerVar30 . '
	</div>
';
}
unset($__compilerVar30);
$info .= $__compilerVar27;
unset($__compilerVar27);
$__compilerVar26 .= '

<div id="post-' . htmlspecialchars($thread['first_post_id'], ENT_QUOTES, 'UTF-8') . '" class="message section sectionMain' . (($thread['isNew']) ? (' unread') : ('')) . '" data-author="' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="subHeading thread">
		<a href="' . $link . '">' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a>
	</div>

	';
if (!XenForo_Template_Helper_Core::styleProperty('wf_threads_fullInfoBottom'))
{
$__compilerVar26 .= '
		';
$__compilerVar32 = '';
$__compilerVar32 .= $info;
if (trim($__compilerVar32) !== '')
{
$__compilerVar26 .= '<div class="info">' . $__compilerVar32 . '</div>';
}
unset($__compilerVar32);
$__compilerVar26 .= '
	';
}
$__compilerVar26 .= '

	<div class="messageInfo">
		';
if ($thread['isNew'])
{
$__compilerVar26 .= '<strong class="newIndicator"><span></span>' . 'New' . '</strong>';
}
$__compilerVar26 .= '

		';
$__compilerVar33 = '';
$__compilerVar33 .= '
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
$__compilerVar26 .= $this->callTemplateHook('message_content', $__compilerVar33, array(
'message' => $thread,
'WidgetFramework_WidgetRenderer_Threads_FullThreadList' => '1'
));
unset($__compilerVar33);
$__compilerVar26 .= '

	</div>

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullInfoBottom'))
{
$__compilerVar26 .= '
		';
$__compilerVar34 = '';
$__compilerVar34 .= $info;
if (trim($__compilerVar34) !== '')
{
$__compilerVar26 .= '<div class="info">' . $__compilerVar34 . '</div>';
}
unset($__compilerVar34);
$__compilerVar26 .= '
	';
}
$__compilerVar26 .= '

</div>';
$__compilerVar25 .= $__compilerVar26;
unset($__compilerVar26);
$__compilerVar25 .= '
					' . '
				';
}
$__compilerVar25 .= '

			';
if (trim($__compilerVar25) !== '')
{
$__output .= '
		<div class="WidgetFramework_WidgetRenderer_Threads_FullThreadList">
			' . $__compilerVar25 . '
		</div>
		
		' . '
		' . '
	';
}
unset($__compilerVar25);
$__output .= '

';
}
