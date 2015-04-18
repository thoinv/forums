<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'All Watched Threads' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'All Watched Threads';
$__output .= '

';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'This is a list of all the threads that you are watching.';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:watched/threads', false, array()), 'value' => 'Unread Watched Threads');
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
					<div class="primaryContent menuHeader"><h3>' . 'Watched Threads' . '</h3></div>
					<ul class="secondaryContent blockLinksList">
						<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads/all/manage', '', array(
'act' => 'watch_no_email'
)) . '" class="OverlayTrigger">' . 'Disable email notification' . '</a></li>
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
			<a class="title"><span>' . 'Title' . '</span></a>
			<a class="postDate"><span></span></a>
		</dd>
		<dd class="stats">
			<a class="major"><span>' . 'Replies' . '</span></a>
			<a class="minor"><span>' . 'Views' . '</span></a>
		</dd>
		<dd class="lastPost"><a><span>' . 'Last Message' . '</span></a></dd>
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
$__compilerVar1 = '';
$__compilerVar1 .= '1';
$__compilerVar2 = '';
$__compilerVar2 .= '1';
$__compilerVar3 = '';
$__compilerVar3 .= '1';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar4 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar5 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar5 .= '

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
$__compilerVar6 = '';
$__compilerVar6 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar6 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar6 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar6 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar6 .= '
					';
if ($thread['sticky'])
{
$__compilerVar6 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar6 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar6 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar6 .= '
				';
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '
				<div class="iconKey">
				' . $__compilerVar6 . '
				</div>
			';
}
unset($__compilerVar6);
$__compilerVar5 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar5 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar5 .= '
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
$__compilerVar5 .= '
						' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar5 .= ', ' . 'Reason' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar5 .= '.
					';
}
$__compilerVar5 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'View' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar5 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar5 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
}
else
{
$__compilerVar4 .= '

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
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'You have posted ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' message(s) in this thread'
),''));
}
$__compilerVar4 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar7 = '';
$__compilerVar7 .= '
					';
$__compilerVar8 = '';
$__compilerVar8 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar8 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar8 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar8 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar8 .= '
					';
if ($thread['sticky'])
{
$__compilerVar8 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar8 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar8 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar8 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar8 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar8 .= '
					';
$__compilerVar7 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar8, array(
'thread' => $thread
));
unset($__compilerVar8);
$__compilerVar7 .= '
				';
if (trim($__compilerVar7) !== '')
{
$__compilerVar4 .= '
				<div class="iconKey">
				' . $__compilerVar7 . '
				</div>
			';
}
unset($__compilerVar7);
$__compilerVar4 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar4 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
				';
if ($__compilerVar1)
{
$__compilerVar4 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar4 .= '
					';
if ($linkPrefix)
{
$__compilerVar4 .= '
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
$__compilerVar4 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar4 .= '
				';
}
$__compilerVar4 .= '
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
$__compilerVar4 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Go to first unread message' . '"></a>';
}
$__compilerVar4 .= '
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
if ($__compilerVar2)
{
$__compilerVar4 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar4 .= '

					';
if ($__compilerVar3 AND $thread['lastPageNumbers'])
{
$__compilerVar4 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar4 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar4 .= '
						</span>
					';
}
$__compilerVar4 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar4 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $__compilerVar2
)) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar4 .= '
					';
if ($__compilerVar1 AND $thread['email_subscribe'])
{
$__compilerVar4 .= 'Email';
}
$__compilerVar4 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar4 .= '<div class="threadrating">
	';
$__compilerVar9 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar9 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar9 .= '
';
$__compilerVar10 = '';
$__compilerVar11 = '';
$__compilerVar11 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar12 = '';
$__compilerVar13 = '';
$__compilerVar13 .= '1';
$__compilerVar14 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar14 .= '

';
if ($__compilerVar10)
{
$__compilerVar14 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar14 .= '

	<form action="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar13) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar12 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar11 >= 1) ? ('Full') : ('')) . (($__compilerVar11 >= 0.5 AND $__compilerVar11 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar11 >= 2) ? ('Full') : ('')) . (($__compilerVar11 >= 1.5 AND $__compilerVar11 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar11 >= 3) ? ('Full') : ('')) . (($__compilerVar11 >= 2.5 AND $__compilerVar11 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar11 >= 4) ? ('Full') : ('')) . (($__compilerVar11 >= 3.5 AND $__compilerVar11 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar11 >= 5) ? ('Full') : ('')) . (($__compilerVar11 >= 4.5 AND $__compilerVar11 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar14 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar14 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar14 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar14 .= 'tr_greyedout';
}
$__compilerVar14 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar12 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar11, '2') . '">
					 <span class="star ' . (($__compilerVar11 >= 1) ? ('Full') : ('')) . (($__compilerVar11 >= 0.5 AND $__compilerVar11 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar11 >= 2) ? ('Full') : ('')) . (($__compilerVar11 >= 1.5 AND $__compilerVar11 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar11 >= 3) ? ('Full') : ('')) . (($__compilerVar11 >= 2.5 AND $__compilerVar11 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar11 >= 4) ? ('Full') : ('')) . (($__compilerVar11 >= 3.5 AND $__compilerVar11 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar11 >= 5) ? ('Full') : ('')) . (($__compilerVar11 >= 4.5 AND $__compilerVar11 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar14 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar14 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar9 .= $__compilerVar14;
unset($__compilerVar10, $__compilerVar11, $__compilerVar12, $__compilerVar13, $__compilerVar14);
$__compilerVar9 .= '
';
}
$__compilerVar4 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar4 .= '
</div>';
}
$__compilerVar4 .= '
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
$__compilerVar4 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar4 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar4 .= 'Ignored Member';
}
else
{
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar4 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar4 .= '
	</div>
</li>

';
}
$__output .= $__compilerVar4;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4);
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
				' . 'There are no threads to display.' . '
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
			<option>' . 'With selected' . '...</option>
			<option value="email">' . 'Enable email notification' . '</option>
			<option value="no_email">' . 'Disable email notification' . '</option>
			<option value="stop">' . 'Stop watching threads' . '</option>
		</select>
		<input type="submit" value="' . 'Go' . '" class="button" class="button" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

<div class="pageNavLinkGroup">
	<div class="linkGroup"></div>
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($threadsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'watched/threads/all', false, array(), false, array())) . '
</div>

';
$__compilerVar15 = '';
$__compilerVar15 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar15;
unset($__compilerVar15);
