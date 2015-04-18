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
									title="' . (($thread['isNew'] AND $thread['haveReadData']) ? ('Go to first unread message') : ('')) . '"
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
						<a class="postDate"><span>' . 'Start Date' . '</span></a>
					</dd>
					<dd class="stats">
						<a class="major"><span>' . 'Replies' . '</span></a>
						<a class="minor"><span>' . 'Views' . '</span></a>
					</dd>
					<dd class="lastPost"><a><span>' . 'Last Message' . '</span></a></dd>
				</dl>

				<ol class="discussionListItems">
					';
foreach ($RecentThreads AS $thread)
{
$__output .= '
						';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar1 .= '

';
if ($thread['isDeleted'])
{
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar2 .= '

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
$__compilerVar3 = '';
$__compilerVar3 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar3 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar3 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar3 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar3 .= '
					';
if ($thread['sticky'])
{
$__compilerVar3 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar3 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar3 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar3 .= '
				';
if (trim($__compilerVar3) !== '')
{
$__compilerVar2 .= '
				<div class="iconKey">
				' . $__compilerVar3 . '
				</div>
			';
}
unset($__compilerVar3);
$__compilerVar2 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar2 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar2 .= '
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
$__compilerVar2 .= '
						' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar2 .= ', ' . 'Reason' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar2 .= '.
					';
}
$__compilerVar2 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'View' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar2 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar2 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
}
else
{
$__compilerVar1 .= '

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
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'You have posted ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' message(s) in this thread'
),''));
}
$__compilerVar1 .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar4 = '';
$__compilerVar4 .= '
					';
$__compilerVar5 = '';
$__compilerVar5 .= '
					';
if ($thread['isModerated'])
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
if ($thread['isRedirect'])
{
$__compilerVar5 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar5 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar5 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar5 .= '
					';
$__compilerVar4 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar5, array(
'thread' => $thread
));
unset($__compilerVar5);
$__compilerVar4 .= '
				';
if (trim($__compilerVar4) !== '')
{
$__compilerVar1 .= '
				<div class="iconKey">
				' . $__compilerVar4 . '
				</div>
			';
}
unset($__compilerVar4);
$__compilerVar1 .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__compilerVar1 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar1 .= '
				';
if ($showSubscribeOptions)
{
$__compilerVar1 .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar1 .= '
				';
if ($thread['prefix_id'])
{
$__compilerVar1 .= '
					';
if ($linkPrefix)
{
$__compilerVar1 .= '
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
$__compilerVar1 .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__compilerVar1 .= '
				';
}
$__compilerVar1 .= '
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
$__compilerVar1 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Go to first unread message' . '"></a>';
}
$__compilerVar1 .= '
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
$__compilerVar1 .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__compilerVar1 .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__compilerVar1 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar1 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar1 .= '
						</span>
					';
}
$__compilerVar1 .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__compilerVar1 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $thread['showForumLink']
)) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar1 .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__compilerVar1 .= 'Email';
}
$__compilerVar1 .= '
				</div>
';
if ($threadrating['canView'])
{
$__compilerVar1 .= '<div class="threadrating">
	';
$__compilerVar6 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar6 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar6 .= '
';
$__compilerVar7 = '';
$__compilerVar8 = '';
$__compilerVar8 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar9 = '';
$__compilerVar10 = '';
$__compilerVar10 .= '1';
$__compilerVar11 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar11 .= '

';
if ($__compilerVar7)
{
$__compilerVar11 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar11 .= '

	<form action="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar10) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar9 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar8 >= 1) ? ('Full') : ('')) . (($__compilerVar8 >= 0.5 AND $__compilerVar8 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar8 >= 2) ? ('Full') : ('')) . (($__compilerVar8 >= 1.5 AND $__compilerVar8 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar8 >= 3) ? ('Full') : ('')) . (($__compilerVar8 >= 2.5 AND $__compilerVar8 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar8 >= 4) ? ('Full') : ('')) . (($__compilerVar8 >= 3.5 AND $__compilerVar8 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar8 >= 5) ? ('Full') : ('')) . (($__compilerVar8 >= 4.5 AND $__compilerVar8 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar11 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar11 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar11 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar11 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar11 .= 'tr_greyedout';
}
$__compilerVar11 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar9 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar8, '2') . '">
					 <span class="star ' . (($__compilerVar8 >= 1) ? ('Full') : ('')) . (($__compilerVar8 >= 0.5 AND $__compilerVar8 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar8 >= 2) ? ('Full') : ('')) . (($__compilerVar8 >= 1.5 AND $__compilerVar8 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar8 >= 3) ? ('Full') : ('')) . (($__compilerVar8 >= 2.5 AND $__compilerVar8 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar8 >= 4) ? ('Full') : ('')) . (($__compilerVar8 >= 3.5 AND $__compilerVar8 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar8 >= 5) ? ('Full') : ('')) . (($__compilerVar8 >= 4.5 AND $__compilerVar8 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar11 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar11 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar11 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar6 .= $__compilerVar11;
unset($__compilerVar7, $__compilerVar8, $__compilerVar9, $__compilerVar10, $__compilerVar11);
$__compilerVar6 .= '
';
}
$__compilerVar1 .= $__compilerVar6;
unset($__compilerVar6);
$__compilerVar1 .= '
</div>';
}
$__compilerVar1 .= '
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
$__compilerVar1 .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__compilerVar1 .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__compilerVar1 .= 'Ignored Member';
}
else
{
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__compilerVar1 .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__compilerVar1 .= '
	</div>
</li>

';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
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
$__compilerVar12 = '';
$__compilerVar12 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar12;
unset($__compilerVar12);
$__output .= '
';
}
