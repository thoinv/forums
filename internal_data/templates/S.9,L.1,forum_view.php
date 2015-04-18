<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
if ($forum['description'] AND XenForo_Template_Helper_Core::styleProperty('threadListDescriptions'))
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $forum['description'];
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:forums', $forum, array(
'page' => $page
)) . '" />';
$__output .= '

';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('forums/index.rss', $forum, array()) . '" />';
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:forums', $forum, array());
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => $forum['description']
));
$__compilerVar4 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar4 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	<meta property="og:image" content="';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar4 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($__compilerVar3)
{
$__compilerVar4 .= '<meta property="og:description" content="' . $__compilerVar3 . '" />';
}
$__compilerVar4 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar4 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar4 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar4;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4);
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'node-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
));
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar6 = '';
$__compilerVar6 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Display results as threads' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '

';
if ($canPostThread)
{
$__output .= '
	';
$newDiscussionButton = '';
$newDiscussionButton .= '<a href="' . XenForo_Template_Helper_Core::link('forums/create-thread', $forum, array()) . '" class="callToAction"><span>' . 'Post New Thread' . '</span></a>';
$__output .= '
	';
if (!$renderedNodes)
{
$__output .= '
		';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= $newDiscussionButton;
$__output .= '
	';
}
$__output .= '
';
}
$__output .= '

';
if ($showPostedNotice)
{
$__output .= '
	<div class="importantMessage">' . 'Your message has been submitted and will be displayed pending approval by a moderator.' . '</div>
';
}
$__output .= '

';
if ($renderedNodes)
{
$__output .= '
	';
$__compilerVar7 = '';
$__compilerVar8 = '';
$__compilerVar7 .= $this->callTemplateHook('ad_forum_view_above_node_list', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '
	';
$__compilerVar9 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar9 .= '

';
$__compilerVar10 = '';
$__compilerVar10 .= '
		';
foreach ($renderedNodes AS $node)
{
$__compilerVar10 .= $node;
}
$__compilerVar10 .= '
	';
if (trim($__compilerVar10) !== '')
{
$__compilerVar9 .= '
	<ol class="nodeList" id="forums">
	' . $__compilerVar10 . '
	</ol>
';
}
unset($__compilerVar10);
$__compilerVar9 .= '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
' . '

' . '
' . '
' . '
';
$__output .= $__compilerVar9;
unset($__compilerVar9);
$__output .= '
	';
if ($newDiscussionButton)
{
$__output .= '
		<div class="nodeListNewDiscussionButton">' . $newDiscussionButton . '</div>
	';
}
$__output .= '
';
}
$__output .= '

';
$__compilerVar11 = '';
$__output .= $this->callTemplateHook('forum_view_pagenav_before', $__compilerVar11, array(
'forum' => $forum
));
unset($__compilerVar11);
$__output .= '

';
$__compilerVar12 = '';
$__compilerVar13 = '';
$__compilerVar12 .= $this->callTemplateHook('ad_forum_view_above_thread_list', $__compilerVar13, array());
unset($__compilerVar13);
$__output .= $__compilerVar12;
unset($__compilerVar12);
$__output .= '

<div class="pageNavLinkGroup">

	<div class="linkGroup SelectionCountContainer">
		';
if ($canWatchForum)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('forums/watch', $forum, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($forum['forum_is_watched']) ? ('Unwatch Forum') : ('Watch Forum')) . '</a>
		';
}
$__output .= '
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($threadsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'forums', $forum, $pageNavParams, false, array())) . '

</div>

';
$__compilerVar14 = '';
$__output .= $this->callTemplateHook('forum_view_threads_before', $__compilerVar14, array(
'forum' => $forum
));
unset($__compilerVar14);
$__output .= '

<div class="discussionList section sectionMain">
	';
$__compilerVar15 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar15 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion_list.js');
$__compilerVar15 .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post"
	class="DiscussionList InlineModForm"
	data-cookieName="threads"
	data-controls="#InlineModControls"
	data-imodOptions="#ModerationSelect option">
	
	';
$__compilerVar16 = '';
$__compilerVar16 .= '
			';
if ($displayConditions['prefix_id'])
{
$__compilerVar16 .= '
				<dt>' . 'Prefix' . ':</dt>
				<dd><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $pageNavParams,
'prefix_id' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove Filter' . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $displayConditions['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . ' <span class="gadget">x</span></a></dd>
			';
}
$__compilerVar16 .= '
			';
if (trim($__compilerVar16) !== '')
{
$__compilerVar15 .= '
		<div class="discussionListFilters secondaryContent">
			<h3 class="filtersHeading">' . 'Filters' . ':</h3>
			<dl class="pairsInline filterPairs">
			' . $__compilerVar16 . '
			</dl>
			<dl class="pairsInline removeAll">
				<dt>' . 'Remove All Filters' . ':</dt>
				<dd><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'order' => $pageNavParams['order'],
'direction' => $pageNavParams['direction']
)) . '" class="removeAllFilters Tooltip" data-tipclass="flipped" data-offsetx="8" title="' . 'Remove All Filters' . '">x</a></dd>
			</dl>
		</div>
	';
}
unset($__compilerVar16);
$__compilerVar15 .= '

	<dl class="sectionHeaders">
		<dt class="posterAvatar"><a><span>' . 'Sort by' . ':</span></a></dt>
		<dd class="main">
			<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['title']
)) . '" class="title"><span>' . 'Title' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'title'
)) . '</span></a>
			<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['post_date']
)) . '" class="postDate"><span>' . 'Start Date' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'post_date'
)) . '</span></a>
		</dd>
		<dd class="stats">
			<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['reply_count']
)) . '" class="major"><span>' . 'Replies' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'reply_count'
)) . '</span></a>
			<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['view_count']
)) . '" class="minor"><span>' . 'Views' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'view_count'
)) . '</span></a>
		</dd>
		<dd class="lastPost"><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $orderParams['last_post_date']
)) . '"><span>' . 'Last Message' . XenForo_Template_Helper_Core::callHelper('sortArrow', array(
'0' => $order,
'1' => $orderDirection,
'2' => 'last_post_date'
)) . '</span></a></dd>
	</dl>

	<ol class="discussionListItems">
	';
if ($stickyThreads OR $threads)
{
$__compilerVar15 .= '
		';
$showLastPageNumbers = '';
$showLastPageNumbers .= '1';
$__compilerVar15 .= '
		';
$linkPrefix = '';
$linkPrefix .= '1';
$__compilerVar15 .= '
	
		';
$__compilerVar17 = '';
$__compilerVar17 .= '
		';
foreach ($stickyThreads AS $thread)
{
$__compilerVar17 .= '
			';
$__compilerVar18 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar18 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar19 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar19 .= '

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
$__compilerVar20 = '';
$__compilerVar20 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar20 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar20 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar20 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar20 .= '
					';
if ($thread['sticky'])
{
$__compilerVar20 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar20 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar20 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar20 .= '
				';
if (trim($__compilerVar20) !== '')
{
$__compilerVar19 .= '
				<div class="iconKey">
				' . $__compilerVar20 . '
				</div>
			';
}
unset($__compilerVar20);
$__compilerVar19 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar19 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar19 .= '
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
$__compilerVar19 .= '
						' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar19 .= ', ' . 'Reason' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar19 .= '.
					';
}
$__compilerVar19 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'View' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar19 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar19 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar18 .= $__compilerVar19;
unset($__compilerVar19);
}
else
{
$__compilerVar18 .= '

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
$__compilerVar18 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'You have posted ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' message(s) in this thread'
),''));
}
$__compilerVar18 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar21 = '';
$__compilerVar21 .= '
					';
$__compilerVar22 = '';
$__compilerVar22 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar22 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar22 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar22 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar22 .= '
					';
if ($thread['sticky'])
{
$__compilerVar22 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar22 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar22 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar22 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar22 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar22 .= '
					';
$__compilerVar21 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar22, array(
'thread' => $thread
));
unset($__compilerVar22);
$__compilerVar21 .= '
				';
if (trim($__compilerVar21) !== '')
{
$__compilerVar18 .= '
				<div class="iconKey">
				' . $__compilerVar21 . '
				</div>
			';
}
unset($__compilerVar21);
$__compilerVar18 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar18 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar18 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar18 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar18 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar18 .= '
					';
if ($linkPrefix)
{
$__compilerVar18 .= '
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
$__compilerVar18 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar18 .= '
				';
}
$__compilerVar18 .= '
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
$__compilerVar18 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Go to first unread message' . '"></a>';
}
$__compilerVar18 .= '
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
$__compilerVar18 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar18 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar18 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar18 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar18 .= '
						</span>
					';
}
$__compilerVar18 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar18 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar18 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar18 .= 'Email';
}
$__compilerVar18 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar18 .= '<div class="threadrating">
	';
$__compilerVar23 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar23 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar23 .= '
';
$__compilerVar24 = '';
$__compilerVar25 = '';
$__compilerVar25 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar26 = '';
$__compilerVar27 = '';
$__compilerVar27 .= '1';
$__compilerVar28 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar28 .= '

';
if ($__compilerVar24)
{
$__compilerVar28 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar28 .= '

	<form action="' . htmlspecialchars($__compilerVar24, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar27) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar26 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar25 >= 1) ? ('Full') : ('')) . (($__compilerVar25 >= 0.5 AND $__compilerVar25 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar25 >= 2) ? ('Full') : ('')) . (($__compilerVar25 >= 1.5 AND $__compilerVar25 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar25 >= 3) ? ('Full') : ('')) . (($__compilerVar25 >= 2.5 AND $__compilerVar25 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar25 >= 4) ? ('Full') : ('')) . (($__compilerVar25 >= 3.5 AND $__compilerVar25 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar25 >= 5) ? ('Full') : ('')) . (($__compilerVar25 >= 4.5 AND $__compilerVar25 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar28 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar28 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar28 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar28 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar28 .= 'tr_greyedout';
}
$__compilerVar28 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar26 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar25, '2') . '">
					 <span class="star ' . (($__compilerVar25 >= 1) ? ('Full') : ('')) . (($__compilerVar25 >= 0.5 AND $__compilerVar25 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar25 >= 2) ? ('Full') : ('')) . (($__compilerVar25 >= 1.5 AND $__compilerVar25 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar25 >= 3) ? ('Full') : ('')) . (($__compilerVar25 >= 2.5 AND $__compilerVar25 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar25 >= 4) ? ('Full') : ('')) . (($__compilerVar25 >= 3.5 AND $__compilerVar25 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar25 >= 5) ? ('Full') : ('')) . (($__compilerVar25 >= 4.5 AND $__compilerVar25 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar28 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar28 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar28 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar23 .= $__compilerVar28;
unset($__compilerVar24, $__compilerVar25, $__compilerVar26, $__compilerVar27, $__compilerVar28);
$__compilerVar23 .= '
';
}
$__compilerVar18 .= $__compilerVar23;
unset($__compilerVar23);
$__compilerVar18 .= '
</div>';
}
$__compilerVar18 .= '
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
$__compilerVar18 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar18 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar18 .= 'Ignored Member';
}
else
{
$__compilerVar18 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar18 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar18 .= '
	</div>
</li>

';
}
$__compilerVar17 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar17 .= '
		';
}
$__compilerVar17 .= '
		';
$__compilerVar15 .= $this->callTemplateHook('thread_list_stickies', $__compilerVar17, array());
unset($__compilerVar17);
$__compilerVar15 .= '
		
		';
$__compilerVar29 = '';
$__compilerVar30 = '';
$__compilerVar29 .= $this->callTemplateHook('ad_thread_list_below_stickies', $__compilerVar30, array());
unset($__compilerVar30);
$__compilerVar15 .= $__compilerVar29;
unset($__compilerVar29);
$__compilerVar15 .= '
		
		';
$__compilerVar31 = '';
$__compilerVar31 .= '
		';
foreach ($threads AS $thread)
{
$__compilerVar31 .= '
			';
$__compilerVar32 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar32 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar33 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar33 .= '

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
$__compilerVar34 = '';
$__compilerVar34 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar34 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar34 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar34 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar34 .= '
					';
if ($thread['sticky'])
{
$__compilerVar34 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar34 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar34 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar34 .= '
				';
if (trim($__compilerVar34) !== '')
{
$__compilerVar33 .= '
				<div class="iconKey">
				' . $__compilerVar34 . '
				</div>
			';
}
unset($__compilerVar34);
$__compilerVar33 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar33 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar33 .= '
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
$__compilerVar33 .= '
						' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar33 .= ', ' . 'Reason' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar33 .= '.
					';
}
$__compilerVar33 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'View' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar33 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar33 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar32 .= $__compilerVar33;
unset($__compilerVar33);
}
else
{
$__compilerVar32 .= '

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
$__compilerVar32 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'You have posted ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' message(s) in this thread'
),''));
}
$__compilerVar32 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar35 = '';
$__compilerVar35 .= '
					';
$__compilerVar36 = '';
$__compilerVar36 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar36 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar36 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar36 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar36 .= '
					';
if ($thread['sticky'])
{
$__compilerVar36 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar36 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar36 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar36 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar36 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar36 .= '
					';
$__compilerVar35 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar36, array(
'thread' => $thread
));
unset($__compilerVar36);
$__compilerVar35 .= '
				';
if (trim($__compilerVar35) !== '')
{
$__compilerVar32 .= '
				<div class="iconKey">
				' . $__compilerVar35 . '
				</div>
			';
}
unset($__compilerVar35);
$__compilerVar32 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar32 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar32 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar32 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar32 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar32 .= '
					';
if ($linkPrefix)
{
$__compilerVar32 .= '
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
$__compilerVar32 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar32 .= '
				';
}
$__compilerVar32 .= '
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
$__compilerVar32 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Go to first unread message' . '"></a>';
}
$__compilerVar32 .= '
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
$__compilerVar32 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar32 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar32 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar32 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar32 .= '
						</span>
					';
}
$__compilerVar32 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar32 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar32 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar32 .= 'Email';
}
$__compilerVar32 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar32 .= '<div class="threadrating">
	';
$__compilerVar37 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar37 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar37 .= '
';
$__compilerVar38 = '';
$__compilerVar39 = '';
$__compilerVar39 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar40 = '';
$__compilerVar41 = '';
$__compilerVar41 .= '1';
$__compilerVar42 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar42 .= '

';
if ($__compilerVar38)
{
$__compilerVar42 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar42 .= '

	<form action="' . htmlspecialchars($__compilerVar38, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar41) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar40 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar39 >= 1) ? ('Full') : ('')) . (($__compilerVar39 >= 0.5 AND $__compilerVar39 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar39 >= 2) ? ('Full') : ('')) . (($__compilerVar39 >= 1.5 AND $__compilerVar39 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar39 >= 3) ? ('Full') : ('')) . (($__compilerVar39 >= 2.5 AND $__compilerVar39 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar39 >= 4) ? ('Full') : ('')) . (($__compilerVar39 >= 3.5 AND $__compilerVar39 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar39 >= 5) ? ('Full') : ('')) . (($__compilerVar39 >= 4.5 AND $__compilerVar39 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar39, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar42 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar42 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar42 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar42 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar42 .= 'tr_greyedout';
}
$__compilerVar42 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar40 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar39, '2') . '">
					 <span class="star ' . (($__compilerVar39 >= 1) ? ('Full') : ('')) . (($__compilerVar39 >= 0.5 AND $__compilerVar39 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar39 >= 2) ? ('Full') : ('')) . (($__compilerVar39 >= 1.5 AND $__compilerVar39 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar39 >= 3) ? ('Full') : ('')) . (($__compilerVar39 >= 2.5 AND $__compilerVar39 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar39 >= 4) ? ('Full') : ('')) . (($__compilerVar39 >= 3.5 AND $__compilerVar39 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar39 >= 5) ? ('Full') : ('')) . (($__compilerVar39 >= 4.5 AND $__compilerVar39 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar39, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar42 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar42 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar42 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar37 .= $__compilerVar42;
unset($__compilerVar38, $__compilerVar39, $__compilerVar40, $__compilerVar41, $__compilerVar42);
$__compilerVar37 .= '
';
}
$__compilerVar32 .= $__compilerVar37;
unset($__compilerVar37);
$__compilerVar32 .= '
</div>';
}
$__compilerVar32 .= '
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
$__compilerVar32 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar32 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar32 .= 'Ignored Member';
}
else
{
$__compilerVar32 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar32 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar32 .= '
	</div>
</li>

';
}
$__compilerVar31 .= $__compilerVar32;
unset($__compilerVar32);
$__compilerVar31 .= '
		';
}
$__compilerVar31 .= '
		';
$__compilerVar15 .= $this->callTemplateHook('thread_list_threads', $__compilerVar31, array());
unset($__compilerVar31);
$__compilerVar15 .= '
		
		' . '
	';
}
else
{
$__compilerVar15 .= '
		<li class="primaryContent">' . 'There are no threads to display.' . '</li>
	';
}
$__compilerVar15 .= '
	';
if ($showDateLimitDisabler)
{
$__compilerVar15 .= '
		<li class="discussionListItem"><div class="noteRow secondary"><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $pageNavParams,
'no_date_limit' => '1',
'page' => (($page > 1) ? ($page) : (''))
)) . '">' . 'Click here to display older threads.' . '</a></div></li>
	';
}
$__compilerVar15 .= '
	</ol>

	';
if ($totalThreads OR $inlineModOptions)
{
$__compilerVar15 .= '
		<div class="sectionFooter InlineMod SelectionCountContainer">
			';
if ($totalThreads)
{
$__compilerVar15 .= '<span class="contentSummary">' . 'Showing threads ' . XenForo_Template_Helper_Core::numberFormat($threadStartOffset, '0') . ' to ' . XenForo_Template_Helper_Core::numberFormat($threadEndOffset, '0') . ' of ' . XenForo_Template_Helper_Core::numberFormat($totalThreads, '0') . '' . '</span>';
}
$__compilerVar15 .= '

			';
if ($inlineModOptions)
{
$__compilerVar15 .= '
				';
$__compilerVar43 = '';
$__compilerVar44 = '';
$__compilerVar44 .= 'Thread Moderation';
$__compilerVar45 = '';
$__compilerVar45 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar45 .= '<option value="delete">' . 'Delete Threads' . '...</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar45 .= '<option value="undelete">' . 'Undelete Threads' . '</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar45 .= '<option value="approve">' . 'Approve Threads' . '</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar45 .= '<option value="unapprove">' . 'Unapprove Threads' . '</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['stick'])
{
$__compilerVar45 .= '<option value="stick">' . 'Stick Threads' . '</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['unstick'])
{
$__compilerVar45 .= '<option value="unstick">' . 'Unstick Threads' . '</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['lock'])
{
$__compilerVar45 .= '<option value="lock">' . 'Lock Threads' . '</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['unlock'])
{
$__compilerVar45 .= '<option value="unlock">' . 'Unlock Threads' . '</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar45 .= '<option value="move">' . 'Move Threads' . '...</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['merge'])
{
$__compilerVar45 .= '<option value="merge">' . 'Merge Threads' . '...</option>';
}
$__compilerVar45 .= '
		';
if ($inlineModOptions['edit'])
{
$__compilerVar45 .= '<option value="prefix">' . 'Apply Thread Prefix' . '...</option>';
}
$__compilerVar45 .= '
		<option value="deselect">' . 'Deselect Threads' . '</option>
	';
$__compilerVar46 = '';
$__compilerVar46 .= 'Select / deselect all threads on this page';
$__compilerVar47 = '';
$__compilerVar47 .= 'Selected Threads';
$__compilerVar48 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar48 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar48 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar46, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar47, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar48 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar48 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar48 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar48 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar45 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar43 .= $__compilerVar48;
unset($__compilerVar44, $__compilerVar45, $__compilerVar46, $__compilerVar47, $__compilerVar48);
$__compilerVar15 .= $__compilerVar43;
unset($__compilerVar43);
$__compilerVar15 .= '
			';
}
$__compilerVar15 .= '
		</div>
	';
}
$__compilerVar15 .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

<h3 id="DiscussionListOptionsHandle" class="JsOnly"><a href="#">' . 'Thread Display Options' . '</a></h3>

<form action="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" method="post" class="DiscussionListOptions secondaryContent">

	';
$__compilerVar49 = '';
$__compilerVar49 .= '
	<div class="controlGroup">
		<label for="ctrl_order">' . 'Sort threads by' . ':</label>
		<select name="order" id="ctrl_order" class="textCtrl">
			<option value="last_post_date" ' . (($order == ('last_post_date')) ? ' selected="selected"' : '') . '>' . 'Last message time' . '</option>
			<option value="post_date" ' . (($order == ('post_date')) ? ' selected="selected"' : '') . '>' . 'Thread creation time' . '</option>
			<option value="title" ' . (($order == ('title')) ? ' selected="selected"' : '') . '>' . 'Title (alphabetical)' . '</option>
			<option value="reply_count" ' . (($order == ('reply_count')) ? ' selected="selected"' : '') . '>' . 'Number of replies' . '</option>
			<option value="view_count" ' . (($order == ('view_count')) ? ' selected="selected"' : '') . '>' . 'Number of views' . '</option>
			<option value="first_post_likes" ' . (($order == ('first_post_likes')) ? ' selected="selected"' : '') . '>' . 'First message likes' . '</option>
			';
if ($threadrating['canView'])
{
$__compilerVar49 .= '<option value="rating" ' . (($order == ('rating')) ? ' selected="selected"' : '') . '>' . 'Thread Rating' . '</option>';
}
$__compilerVar49 .= '
		</select>
	</div>

	<div class="controlGroup">
		<label for="ctrl_direction">' . 'Order threads in' . ':</label>
		<select name="direction" id="ctrl_direction" class="textCtrl">
			<option value="desc" ' . (($orderDirection == ('desc')) ? ' selected="selected"' : '') . '>' . 'Descending order' . '</option>
			<option value="asc" ' . (($orderDirection == ('asc')) ? ' selected="selected"' : '') . '>' . 'Ascending order' . '</option>
		</select>
	</div>
	
	';
if ($forum['prefixCache'])
{
$__compilerVar49 .= '
		<div class="controlGroup">
			<label for="ctrl_prefix_id">' . 'Prefix' . ':</label>
			<select name="prefix_id" id="ctrl_prefix_id" class="textCtrl">
				<option value="0" ' . ((!$displayConditions['prefix_id']) ? ' selected="selected"' : '') . '>(' . 'Any' . ')</option>
				';
foreach ($forum['prefixCache'] AS $prefixGroupId => $prefixes)
{
$__compilerVar49 .= '
					';
if ($prefixGroupId)
{
$__compilerVar49 .= '
						<optgroup label="' . XenForo_Template_Helper_Core::callHelper('threadPrefixGroup', array(
'0' => $prefixGroupId
)) . '">
						';
foreach ($prefixes AS $prefixId)
{
$__compilerVar49 .= '
							<option value="' . htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8') . '" ' . (($displayConditions['prefix_id'] == $prefixId) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefixId,
'1' => 'escaped',
'2' => ''
)) . '</option>
						';
}
$__compilerVar49 .= '
						</optgroup>
					';
}
else
{
$__compilerVar49 .= '
						';
foreach ($prefixes AS $prefixId)
{
$__compilerVar49 .= '
							<option value="' . htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8') . '" ' . (($displayConditions['prefix_id'] == $prefixId) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefixId,
'1' => 'escaped',
'2' => ''
)) . '</option>
						';
}
$__compilerVar49 .= '
					';
}
$__compilerVar49 .= '
				';
}
$__compilerVar49 .= '
			</select>
		</div>
	';
}
$__compilerVar49 .= '

	<div class="buttonGroup">
		<input type="submit" class="button primary" value="' . 'Set Options' . '" />
		<input type="reset" class="button" value="' . 'Cancel' . '" />
	</div>
	';
$__compilerVar15 .= $this->callTemplateHook('thread_list_options', $__compilerVar49, array());
unset($__compilerVar49);
$__compilerVar15 .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
$__compilerVar50 = '';
$__compilerVar50 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__compilerVar15 .= $__compilerVar50;
unset($__compilerVar50);
$__output .= $__compilerVar15;
unset($__compilerVar15);
$__output .= '
</div>
	
<div class="pageNavLinkGroup afterDiscussionListHandle">
	<div class="linkGroup">
		';
if ($canPostThread)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('forums/create-thread', $forum, array()) . '" class="callToAction"><span>' . 'Post New Thread' . '</span></a>
		';
}
else if ($visitor['user_id'])
{
$__output .= '
			<span class="element">(' . 'You have insufficient privileges to post here.' . ')</span>
		';
}
else
{
$__output .= '
			<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed element">(' . 'You must log in or sign up to post here.' . ')</a></label>
		';
}
$__output .= '
	</div>
	<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>
	
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($threadsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'forums', $forum, $pageNavParams, false, array())) . '
</div>';
