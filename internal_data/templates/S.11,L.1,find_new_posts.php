<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($showingNewPosts)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'New Posts';
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Recent Posts';
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
)) . '" class="OverlayTrigger">' . 'Mark Forums Read' . '</a>';
}
$__output .= '
		';
if ($showingNewPosts)
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('find-new/posts', '', array(
'recent' => '1'
)) . '">' . 'Recent Posts' . '</a>';
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
$__compilerVar1 = '';
$__compilerVar1 .= '1';
$__compilerVar2 = '';
$__compilerVar2 .= '1';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar3 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar4 .= '

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
$__compilerVar5 = '';
$__compilerVar5 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar5 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar5 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar5 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar5 .= '
					';
if ($thread['sticky'])
{
$__compilerVar5 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar5 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar5 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar5 .= '
				';
if (trim($__compilerVar5) !== '')
{
$__compilerVar4 .= '
				<div class="iconKey">
				' . $__compilerVar5 . '
				</div>
			';
}
unset($__compilerVar5);
$__compilerVar4 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar4 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
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
$__compilerVar4 .= '
						' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar4 .= ', ' . 'Reason' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar4 .= '.
					';
}
$__compilerVar4 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'View' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar4 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar4 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
}
else
{
$__compilerVar3 .= '

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
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'You have posted ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' message(s) in this thread'
),''));
}
$__compilerVar3 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar6 = '';
$__compilerVar6 .= '
					';
$__compilerVar7 = '';
$__compilerVar7 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar7 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar7 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar7 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar7 .= '
					';
if ($thread['sticky'])
{
$__compilerVar7 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar7 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar7 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar7 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar7 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar7 .= '
					';
$__compilerVar6 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar7, array(
'thread' => $thread
));
unset($__compilerVar7);
$__compilerVar6 .= '
				';
if (trim($__compilerVar6) !== '')
{
$__compilerVar3 .= '
				<div class="iconKey">
				' . $__compilerVar6 . '
				</div>
			';
}
unset($__compilerVar6);
$__compilerVar3 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar3 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar3 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar3 .= '
					';
if ($linkPrefix)
{
$__compilerVar3 .= '
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
$__compilerVar3 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar3 .= '
				';
}
$__compilerVar3 .= '
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
$__compilerVar3 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Go to first unread message' . '"></a>';
}
$__compilerVar3 .= '
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
if ($__compilerVar1)
{
$__compilerVar3 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar3 .= '

					';
if ($__compilerVar2 AND $thread['lastPageNumbers'])
{
$__compilerVar3 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar3 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar3 .= '
						</span>
					';
}
$__compilerVar3 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar3 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $__compilerVar1
)) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar3 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar3 .= 'Email';
}
$__compilerVar3 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar3 .= '<div class="threadrating">
	';
$__compilerVar8 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar8 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar8 .= '
';
$__compilerVar9 = '';
$__compilerVar10 = '';
$__compilerVar10 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar11 = '';
$__compilerVar12 = '';
$__compilerVar12 .= '1';
$__compilerVar13 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar13 .= '

';
if ($__compilerVar9)
{
$__compilerVar13 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar13 .= '

	<form action="' . htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar12) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar11 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar10 >= 1) ? ('Full') : ('')) . (($__compilerVar10 >= 0.5 AND $__compilerVar10 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar10 >= 2) ? ('Full') : ('')) . (($__compilerVar10 >= 1.5 AND $__compilerVar10 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar10 >= 3) ? ('Full') : ('')) . (($__compilerVar10 >= 2.5 AND $__compilerVar10 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar10 >= 4) ? ('Full') : ('')) . (($__compilerVar10 >= 3.5 AND $__compilerVar10 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar10 >= 5) ? ('Full') : ('')) . (($__compilerVar10 >= 4.5 AND $__compilerVar10 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar13 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar13 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar13 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar13 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar13 .= 'tr_greyedout';
}
$__compilerVar13 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar11 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar10, '2') . '">
					 <span class="star ' . (($__compilerVar10 >= 1) ? ('Full') : ('')) . (($__compilerVar10 >= 0.5 AND $__compilerVar10 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar10 >= 2) ? ('Full') : ('')) . (($__compilerVar10 >= 1.5 AND $__compilerVar10 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar10 >= 3) ? ('Full') : ('')) . (($__compilerVar10 >= 2.5 AND $__compilerVar10 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar10 >= 4) ? ('Full') : ('')) . (($__compilerVar10 >= 3.5 AND $__compilerVar10 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar10 >= 5) ? ('Full') : ('')) . (($__compilerVar10 >= 4.5 AND $__compilerVar10 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar13 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar13 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar13 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar8 .= $__compilerVar13;
unset($__compilerVar9, $__compilerVar10, $__compilerVar11, $__compilerVar12, $__compilerVar13);
$__compilerVar8 .= '
';
}
$__compilerVar3 .= $__compilerVar8;
unset($__compilerVar8);
$__compilerVar3 .= '
</div>';
}
$__compilerVar3 .= '
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
$__compilerVar3 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar3 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar3 .= 'Ignored Member';
}
else
{
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar3 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar3 .= '
	</div>
</li>

';
}
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
$__output .= '

		';
}
$__output .= '
		</ol>
	
		<div class="sectionFooter">
			<span class="contentSummary">' . 'Showing results ' . XenForo_Template_Helper_Core::numberFormat($threadStartOffset, '0') . ' to ' . XenForo_Template_Helper_Core::numberFormat($threadEndOffset, '0') . ' of ' . XenForo_Template_Helper_Core::numberFormat($totalThreads, '0') . '' . '</span>
	
			';
if ($inlineModOptions)
{
$__output .= '
				';
$__compilerVar14 = '';
$__compilerVar15 = '';
$__compilerVar15 .= 'Thread Moderation';
$__compilerVar16 = '';
$__compilerVar16 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar16 .= '<option value="delete">' . 'Delete Threads' . '...</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar16 .= '<option value="undelete">' . 'Undelete Threads' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar16 .= '<option value="approve">' . 'Approve Threads' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar16 .= '<option value="unapprove">' . 'Unapprove Threads' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['stick'])
{
$__compilerVar16 .= '<option value="stick">' . 'Stick Threads' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['unstick'])
{
$__compilerVar16 .= '<option value="unstick">' . 'Unstick Threads' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['lock'])
{
$__compilerVar16 .= '<option value="lock">' . 'Lock Threads' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['unlock'])
{
$__compilerVar16 .= '<option value="unlock">' . 'Unlock Threads' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar16 .= '<option value="move">' . 'Move Threads' . '...</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['merge'])
{
$__compilerVar16 .= '<option value="merge">' . 'Merge Threads' . '...</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['edit'])
{
$__compilerVar16 .= '<option value="prefix">' . 'Apply Thread Prefix' . '...</option>';
}
$__compilerVar16 .= '
		<option value="deselect">' . 'Deselect Threads' . '</option>
	';
$__compilerVar17 = '';
$__compilerVar17 .= 'Select / deselect all threads on this page';
$__compilerVar18 = '';
$__compilerVar18 .= 'Selected Threads';
$__compilerVar19 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar19 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar19 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar17, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar19 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar19 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar19 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar19 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar16 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar14 .= $__compilerVar19;
unset($__compilerVar15, $__compilerVar16, $__compilerVar17, $__compilerVar18, $__compilerVar19);
$__output .= $__compilerVar14;
unset($__compilerVar14);
$__output .= '
			';
}
$__output .= '
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
	';
$__compilerVar20 = '';
$__compilerVar20 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar20;
unset($__compilerVar20);
$__output .= '

</div>

<div class="pageNavLinkGroup">
	<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'find-new/posts', $search, array(), false, array())) . '
</div>';
