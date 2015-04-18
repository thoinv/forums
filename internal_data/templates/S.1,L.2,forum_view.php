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
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS Feed For ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('forums/index.rss', $forum, array()) . '" />';
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__compilerVar51 = '';
$__compilerVar51 .= XenForo_Template_Helper_Core::link('canonical:forums', $forum, array());
$__compilerVar52 = '';
$__compilerVar52 .= htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar53 = '';
$__compilerVar53 .= XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => $forum['description']
));
$__compilerVar54 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar54 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar54 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar54 .= '
	<meta property="og:image" content="';
$__compilerVar55 = '';
$__compilerVar55 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar54 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar55, array());
unset($__compilerVar55);
$__compilerVar54 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar51 . '" />
	<meta property="og:title" content="' . $__compilerVar52 . '" />
	';
if ($__compilerVar53)
{
$__compilerVar54 .= '<meta property="og:description" content="' . $__compilerVar53 . '" />';
}
$__compilerVar54 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar54 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar54 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar54 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar54 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar54;
unset($__compilerVar51, $__compilerVar52, $__compilerVar53, $__compilerVar54);
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
$__compilerVar56 = '';
$__compilerVar56 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar56;
unset($__compilerVar56);
$__output .= '

';
if ($canPostThread)
{
$__output .= '
	';
$newDiscussionButton = '';
$newDiscussionButton .= '<a href="' . XenForo_Template_Helper_Core::link('forums/create-thread', $forum, array()) . '" class="callToAction"><span>' . 'Đăng chủ đề mới' . '</span></a>';
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
$__compilerVar57 = '';
$__compilerVar58 = '';
$__compilerVar57 .= $this->callTemplateHook('ad_forum_view_above_node_list', $__compilerVar58, array());
unset($__compilerVar58);
$__output .= $__compilerVar57;
unset($__compilerVar57);
$__output .= '
	';
$__compilerVar59 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar59 .= '

';
$__compilerVar60 = '';
$__compilerVar60 .= '
		';
foreach ($renderedNodes AS $node)
{
$__compilerVar60 .= $node;
}
$__compilerVar60 .= '
	';
if (trim($__compilerVar60) !== '')
{
$__compilerVar59 .= '
	<ol class="nodeList sectionMain" id="forums">
	' . $__compilerVar60 . '
	</ol>
';
}
unset($__compilerVar60);
$__compilerVar59 .= '

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
$__output .= $__compilerVar59;
unset($__compilerVar59);
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
$__compilerVar61 = '';
$__output .= $this->callTemplateHook('forum_view_pagenav_before', $__compilerVar61, array(
'forum' => $forum
));
unset($__compilerVar61);
$__output .= '

';
$__compilerVar62 = '';
$__compilerVar63 = '';
$__compilerVar62 .= $this->callTemplateHook('ad_forum_view_above_thread_list', $__compilerVar63, array());
unset($__compilerVar63);
$__output .= $__compilerVar62;
unset($__compilerVar62);
$__output .= '

<div class="pageNavLinkGroup">

	<div class="linkGroup SelectionCountContainer">
		';
if ($canWatchForum)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('forums/watch', $forum, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($forum['forum_is_watched']) ? ('Unwatch Forum') : ('Theo dõi mục này')) . '</a>
		';
}
$__output .= '
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($threadsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'forums', $forum, $pageNavParams, false, array())) . '

</div>

';
$__compilerVar64 = '';
$__output .= $this->callTemplateHook('forum_view_threads_before', $__compilerVar64, array(
'forum' => $forum
));
unset($__compilerVar64);
$__output .= '

<div class="discussionList section sectionMain">
	';
$__compilerVar65 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar65 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion_list.js');
$__compilerVar65 .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post"
	class="DiscussionList InlineModForm"
	data-cookieName="threads"
	data-controls="#InlineModControls"
	data-imodOptions="#ModerationSelect option">
	
	';
$__compilerVar66 = '';
$__compilerVar66 .= '
			';
if ($displayConditions['prefix_id'])
{
$__compilerVar66 .= '
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
$__compilerVar66 .= '
			';
if (trim($__compilerVar66) !== '')
{
$__compilerVar65 .= '
		<div class="discussionListFilters secondaryContent">
			<h3 class="filtersHeading">' . 'Filters' . ':</h3>
			<dl class="pairsInline filterPairs">
			' . $__compilerVar66 . '
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
unset($__compilerVar66);
$__compilerVar65 .= '

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
$__compilerVar65 .= '
		';
$showLastPageNumbers = '';
$showLastPageNumbers .= '1';
$__compilerVar65 .= '
		';
$linkPrefix = '';
$linkPrefix .= '1';
$__compilerVar65 .= '
	
		';
$__compilerVar67 = '';
$__compilerVar67 .= '
		';
foreach ($stickyThreads AS $thread)
{
$__compilerVar67 .= '
			';
$__compilerVar68 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar68 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar69 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar69 .= '

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
$__compilerVar70 = '';
$__compilerVar70 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar70 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar70 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar70 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar70 .= '
					';
if ($thread['sticky'])
{
$__compilerVar70 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar70 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar70 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar70 .= '
				';
if (trim($__compilerVar70) !== '')
{
$__compilerVar69 .= '
				<div class="iconKey">
				' . $__compilerVar70 . '
				</div>
			';
}
unset($__compilerVar70);
$__compilerVar69 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar69 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar69 .= '
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
$__compilerVar69 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar69 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar69 .= '.
					';
}
$__compilerVar69 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'Xem' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar69 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar69 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar68 .= $__compilerVar69;
unset($__compilerVar69);
}
else
{
$__compilerVar68 .= '

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
$__compilerVar68 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'Bạn đã đăng ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' bài viết trong chủ đề này'
),''));
}
$__compilerVar68 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar71 = '';
$__compilerVar71 .= '
					';
$__compilerVar72 = '';
$__compilerVar72 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar72 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar72 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar72 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar72 .= '
					';
if ($thread['sticky'])
{
$__compilerVar72 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar72 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar72 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar72 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar72 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar72 .= '
					';
$__compilerVar71 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar72, array(
'thread' => $thread
));
unset($__compilerVar72);
$__compilerVar71 .= '
				';
if (trim($__compilerVar71) !== '')
{
$__compilerVar68 .= '
				<div class="iconKey">
				' . $__compilerVar71 . '
				</div>
			';
}
unset($__compilerVar71);
$__compilerVar68 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar68 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar68 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar68 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar68 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar68 .= '
					';
if ($linkPrefix)
{
$__compilerVar68 .= '
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
$__compilerVar68 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar68 .= '
				';
}
$__compilerVar68 .= '
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
$__compilerVar68 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Đến bài đầu tiên chưa đọc' . '"></a>';
}
$__compilerVar68 .= '
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
$__compilerVar68 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar68 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar68 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar68 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar68 .= '
						</span>
					';
}
$__compilerVar68 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar68 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar68 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar68 .= 'Email';
}
$__compilerVar68 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar68 .= '<div class="threadrating">
	';
$__compilerVar73 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar73 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar73 .= '
';
$__compilerVar74 = '';
$__compilerVar75 = '';
$__compilerVar75 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar76 = '';
$__compilerVar77 = '';
$__compilerVar77 .= '1';
$__compilerVar78 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar78 .= '

';
if ($__compilerVar74)
{
$__compilerVar78 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar78 .= '

	<form action="' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar77) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar76 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar75 >= 1) ? ('Full') : ('')) . (($__compilerVar75 >= 0.5 AND $__compilerVar75 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar75 >= 2) ? ('Full') : ('')) . (($__compilerVar75 >= 1.5 AND $__compilerVar75 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar75 >= 3) ? ('Full') : ('')) . (($__compilerVar75 >= 2.5 AND $__compilerVar75 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar75 >= 4) ? ('Full') : ('')) . (($__compilerVar75 >= 3.5 AND $__compilerVar75 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar75 >= 5) ? ('Full') : ('')) . (($__compilerVar75 >= 4.5 AND $__compilerVar75 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar75, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar78 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar78 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar78 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar78 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar78 .= 'tr_greyedout';
}
$__compilerVar78 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar76 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar75, '2') . '">
					 <span class="star ' . (($__compilerVar75 >= 1) ? ('Full') : ('')) . (($__compilerVar75 >= 0.5 AND $__compilerVar75 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar75 >= 2) ? ('Full') : ('')) . (($__compilerVar75 >= 1.5 AND $__compilerVar75 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar75 >= 3) ? ('Full') : ('')) . (($__compilerVar75 >= 2.5 AND $__compilerVar75 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar75 >= 4) ? ('Full') : ('')) . (($__compilerVar75 >= 3.5 AND $__compilerVar75 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar75 >= 5) ? ('Full') : ('')) . (($__compilerVar75 >= 4.5 AND $__compilerVar75 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar75, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar78 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar78 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar78 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar73 .= $__compilerVar78;
unset($__compilerVar74, $__compilerVar75, $__compilerVar76, $__compilerVar77, $__compilerVar78);
$__compilerVar73 .= '
';
}
$__compilerVar68 .= $__compilerVar73;
unset($__compilerVar73);
$__compilerVar68 .= '
</div>';
}
$__compilerVar68 .= '
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
$__compilerVar68 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar68 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar68 .= 'Ignored Member';
}
else
{
$__compilerVar68 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar68 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar68 .= '
	</div>
</li>

';
}
$__compilerVar67 .= $__compilerVar68;
unset($__compilerVar68);
$__compilerVar67 .= '
		';
}
$__compilerVar67 .= '
		';
$__compilerVar65 .= $this->callTemplateHook('thread_list_stickies', $__compilerVar67, array());
unset($__compilerVar67);
$__compilerVar65 .= '
		
		';
$__compilerVar79 = '';
$__compilerVar80 = '';
$__compilerVar79 .= $this->callTemplateHook('ad_thread_list_below_stickies', $__compilerVar80, array());
unset($__compilerVar80);
$__compilerVar65 .= $__compilerVar79;
unset($__compilerVar79);
$__compilerVar65 .= '
		
		';
$__compilerVar81 = '';
$__compilerVar81 .= '
		';
foreach ($threads AS $thread)
{
$__compilerVar81 .= '
			';
$__compilerVar82 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar82 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar83 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar83 .= '

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
$__compilerVar84 = '';
$__compilerVar84 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar84 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar84 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar84 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar84 .= '
					';
if ($thread['sticky'])
{
$__compilerVar84 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar84 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar84 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar84 .= '
				';
if (trim($__compilerVar84) !== '')
{
$__compilerVar83 .= '
				<div class="iconKey">
				' . $__compilerVar84 . '
				</div>
			';
}
unset($__compilerVar84);
$__compilerVar83 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar83 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar83 .= '
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
$__compilerVar83 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar83 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar83 .= '.
					';
}
$__compilerVar83 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'Xem' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar83 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar83 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar82 .= $__compilerVar83;
unset($__compilerVar83);
}
else
{
$__compilerVar82 .= '

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
$__compilerVar82 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'Bạn đã đăng ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' bài viết trong chủ đề này'
),''));
}
$__compilerVar82 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar85 = '';
$__compilerVar85 .= '
					';
$__compilerVar86 = '';
$__compilerVar86 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar86 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar86 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar86 .= '<span class="locked" title="' . 'Đã khóa' . '">' . 'Đã khóa' . '</span>';
}
$__compilerVar86 .= '
					';
if ($thread['sticky'])
{
$__compilerVar86 .= '<span class="sticky" title="' . 'Dán lên cao' . '">' . 'Dán lên cao' . '</span>';
}
$__compilerVar86 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar86 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar86 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar86 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar86 .= '
					';
$__compilerVar85 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar86, array(
'thread' => $thread
));
unset($__compilerVar86);
$__compilerVar85 .= '
				';
if (trim($__compilerVar85) !== '')
{
$__compilerVar82 .= '
				<div class="iconKey">
				' . $__compilerVar85 . '
				</div>
			';
}
unset($__compilerVar85);
$__compilerVar82 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar82 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar82 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar82 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar82 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar82 .= '
					';
if ($linkPrefix)
{
$__compilerVar82 .= '
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
$__compilerVar82 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar82 .= '
				';
}
$__compilerVar82 .= '
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
$__compilerVar82 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Đến bài đầu tiên chưa đọc' . '"></a>';
}
$__compilerVar82 .= '
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
$__compilerVar82 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar82 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar82 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar82 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar82 .= '
						</span>
					';
}
$__compilerVar82 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar82 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Sửa' . '</a>';
}
$__compilerVar82 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar82 .= 'Email';
}
$__compilerVar82 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar82 .= '<div class="threadrating">
	';
$__compilerVar87 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar87 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar87 .= '
';
$__compilerVar88 = '';
$__compilerVar89 = '';
$__compilerVar89 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar90 = '';
$__compilerVar91 = '';
$__compilerVar91 .= '1';
$__compilerVar92 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar92 .= '

';
if ($__compilerVar88)
{
$__compilerVar92 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar92 .= '

	<form action="' . htmlspecialchars($__compilerVar88, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar91) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar90 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar89 >= 1) ? ('Full') : ('')) . (($__compilerVar89 >= 0.5 AND $__compilerVar89 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar89 >= 2) ? ('Full') : ('')) . (($__compilerVar89 >= 1.5 AND $__compilerVar89 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar89 >= 3) ? ('Full') : ('')) . (($__compilerVar89 >= 2.5 AND $__compilerVar89 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar89 >= 4) ? ('Full') : ('')) . (($__compilerVar89 >= 3.5 AND $__compilerVar89 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar89 >= 5) ? ('Full') : ('')) . (($__compilerVar89 >= 4.5 AND $__compilerVar89 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar89, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar92 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar92 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar92 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar92 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar92 .= 'tr_greyedout';
}
$__compilerVar92 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar90 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar89, '2') . '">
					 <span class="star ' . (($__compilerVar89 >= 1) ? ('Full') : ('')) . (($__compilerVar89 >= 0.5 AND $__compilerVar89 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar89 >= 2) ? ('Full') : ('')) . (($__compilerVar89 >= 1.5 AND $__compilerVar89 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar89 >= 3) ? ('Full') : ('')) . (($__compilerVar89 >= 2.5 AND $__compilerVar89 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar89 >= 4) ? ('Full') : ('')) . (($__compilerVar89 >= 3.5 AND $__compilerVar89 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar89 >= 5) ? ('Full') : ('')) . (($__compilerVar89 >= 4.5 AND $__compilerVar89 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar89, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar92 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar92 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar92 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar87 .= $__compilerVar92;
unset($__compilerVar88, $__compilerVar89, $__compilerVar90, $__compilerVar91, $__compilerVar92);
$__compilerVar87 .= '
';
}
$__compilerVar82 .= $__compilerVar87;
unset($__compilerVar87);
$__compilerVar82 .= '
</div>';
}
$__compilerVar82 .= '
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
$__compilerVar82 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar82 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar82 .= 'Ignored Member';
}
else
{
$__compilerVar82 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar82 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar82 .= '
	</div>
</li>

';
}
$__compilerVar81 .= $__compilerVar82;
unset($__compilerVar82);
$__compilerVar81 .= '
		';
}
$__compilerVar81 .= '
		';
$__compilerVar65 .= $this->callTemplateHook('thread_list_threads', $__compilerVar81, array());
unset($__compilerVar81);
$__compilerVar65 .= '
		
		' . '
	';
}
else
{
$__compilerVar65 .= '
		<li class="primaryContent">' . 'Không có chủ đề.' . '</li>
	';
}
$__compilerVar65 .= '
	';
if ($showDateLimitDisabler)
{
$__compilerVar65 .= '
		<li class="discussionListItem"><div class="noteRow secondary"><a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'_params' => $pageNavParams,
'no_date_limit' => '1',
'page' => (($page > 1) ? ($page) : (''))
)) . '">' . 'Click here to display older threads.' . '</a></div></li>
	';
}
$__compilerVar65 .= '
	</ol>

	';
if ($totalThreads OR $inlineModOptions)
{
$__compilerVar65 .= '
		<div class="sectionFooter InlineMod SelectionCountContainer">
			';
if ($totalThreads)
{
$__compilerVar65 .= '<span class="contentSummary">' . 'Hiển thị chủ đề từ ' . XenForo_Template_Helper_Core::numberFormat($threadStartOffset, '0') . ' đến ' . XenForo_Template_Helper_Core::numberFormat($threadEndOffset, '0') . ' của ' . XenForo_Template_Helper_Core::numberFormat($totalThreads, '0') . '' . '</span>';
}
$__compilerVar65 .= '

			';
if ($inlineModOptions)
{
$__compilerVar65 .= '
				';
$__compilerVar93 = '';
$__compilerVar94 = '';
$__compilerVar94 .= 'Thread Moderation';
$__compilerVar95 = '';
$__compilerVar95 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar95 .= '<option value="delete">' . 'Xóa các chủ đề' . '...</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar95 .= '<option value="undelete">' . 'Khôi phục các chủ đề' . '</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar95 .= '<option value="approve">' . 'Approve Threads' . '</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar95 .= '<option value="unapprove">' . 'Unapprove Threads' . '</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['stick'])
{
$__compilerVar95 .= '<option value="stick">' . 'Stick Threads' . '</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['unstick'])
{
$__compilerVar95 .= '<option value="unstick">' . 'Unstick Threads' . '</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['lock'])
{
$__compilerVar95 .= '<option value="lock">' . 'Lock Threads' . '</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['unlock'])
{
$__compilerVar95 .= '<option value="unlock">' . 'Unlock Threads' . '</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar95 .= '<option value="move">' . 'Move Threads' . '...</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['merge'])
{
$__compilerVar95 .= '<option value="merge">' . 'Merge Threads' . '...</option>';
}
$__compilerVar95 .= '
		';
if ($inlineModOptions['edit'])
{
$__compilerVar95 .= '<option value="prefix">' . 'Apply Thread Prefix' . '...</option>';
}
$__compilerVar95 .= '
		<option value="deselect">' . 'Bỏ chọn chủ đề' . '</option>
	';
$__compilerVar96 = '';
$__compilerVar96 .= 'Select / deselect all threads on this page';
$__compilerVar97 = '';
$__compilerVar97 .= 'Chủ đề đã chọn';
$__compilerVar98 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar98 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar98 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar96, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar97, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar98 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar98 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar98 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar98 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar95 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar93 .= $__compilerVar98;
unset($__compilerVar94, $__compilerVar95, $__compilerVar96, $__compilerVar97, $__compilerVar98);
$__compilerVar65 .= $__compilerVar93;
unset($__compilerVar93);
$__compilerVar65 .= '
			';
}
$__compilerVar65 .= '
		</div>
	';
}
$__compilerVar65 .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

<h3 id="DiscussionListOptionsHandle" class="JsOnly"><a href="#">' . 'Tùy chọn hiển thị chủ đề' . '</a></h3>

<form action="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" method="post" class="DiscussionListOptions secondaryContent">

	';
$__compilerVar99 = '';
$__compilerVar99 .= '
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
$__compilerVar99 .= '<option value="rating" ' . (($order == ('rating')) ? ' selected="selected"' : '') . '>' . 'Thread Rating' . '</option>';
}
$__compilerVar99 .= '
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
$__compilerVar99 .= '
		<div class="controlGroup">
			<label for="ctrl_prefix_id">' . 'Tiền tố' . ':</label>
			<select name="prefix_id" id="ctrl_prefix_id" class="textCtrl">
				<option value="0" ' . ((!$displayConditions['prefix_id']) ? ' selected="selected"' : '') . '>(' . 'Mọi' . ')</option>
				';
foreach ($forum['prefixCache'] AS $prefixGroupId => $prefixes)
{
$__compilerVar99 .= '
					';
if ($prefixGroupId)
{
$__compilerVar99 .= '
						<optgroup label="' . XenForo_Template_Helper_Core::callHelper('threadPrefixGroup', array(
'0' => $prefixGroupId
)) . '">
						';
foreach ($prefixes AS $prefixId)
{
$__compilerVar99 .= '
							<option value="' . htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8') . '" ' . (($displayConditions['prefix_id'] == $prefixId) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefixId,
'1' => 'escaped',
'2' => ''
)) . '</option>
						';
}
$__compilerVar99 .= '
						</optgroup>
					';
}
else
{
$__compilerVar99 .= '
						';
foreach ($prefixes AS $prefixId)
{
$__compilerVar99 .= '
							<option value="' . htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8') . '" ' . (($displayConditions['prefix_id'] == $prefixId) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefixId,
'1' => 'escaped',
'2' => ''
)) . '</option>
						';
}
$__compilerVar99 .= '
					';
}
$__compilerVar99 .= '
				';
}
$__compilerVar99 .= '
			</select>
		</div>
	';
}
$__compilerVar99 .= '

	<div class="buttonGroup">
		<input type="submit" class="button primary" value="' . 'Đặt tùy chọn' . '" />
		<input type="reset" class="button" value="' . 'Hủy bỏ' . '" />
	</div>
	';
$__compilerVar65 .= $this->callTemplateHook('thread_list_options', $__compilerVar99, array());
unset($__compilerVar99);
$__compilerVar65 .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
$__compilerVar100 = '';
$__compilerVar100 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__compilerVar65 .= $__compilerVar100;
unset($__compilerVar100);
$__output .= $__compilerVar65;
unset($__compilerVar65);
$__output .= '
</div>
	
<div class="pageNavLinkGroup afterDiscussionListHandle">
	<div class="linkGroup">
		';
if ($canPostThread)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('forums/create-thread', $forum, array()) . '" class="callToAction"><span>' . 'Đăng chủ đề mới' . '</span></a>
		';
}
else if ($visitor['user_id'])
{
$__output .= '
			<span class="element">(' . 'Bạn không đủ đặc quyền để đăng bài ở đây.' . ')</span>
		';
}
else
{
$__output .= '
			<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed element">(' . 'Bạn phải Đăng nhập hoặc Đăng ký để đăng bài viết' . ')</a></label>
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
