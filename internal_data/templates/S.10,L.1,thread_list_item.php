<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

';
if ($thread['isDeleted'])
{
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar1 .= '

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
$__compilerVar2 = '';
$__compilerVar2 .= '
					';
if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar2 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar2 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar2 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar2 .= '
					';
if ($thread['sticky'])
{
$__compilerVar2 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar2 .= '
					';
if ($thread['discussion_type'] == ('redirect'))
{
$__compilerVar2 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar2 .= '
				';
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
				<div class="iconKey">
				' . $__compilerVar2 . '
				</div>
			';
}
unset($__compilerVar2);
$__compilerVar1 .= '

			<h3 class="title muted">
				';
if ($thread['canInlineMod'])
{
$__compilerVar1 .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar1 .= '
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
$__compilerVar1 .= '
						' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['delete_date'],array(
'time' => htmlspecialchars($thread['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($thread['delete_reason'])
{
$__compilerVar1 .= ', ' . 'Reason' . ': ' . htmlspecialchars($thread['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar1 .= '.
					';
}
$__compilerVar1 .= '
				</div>

				<div class="controls faint">
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" class="viewLink">' . 'View' . '</a>
					';
if ($thread['canEditThread'])
{
$__compilerVar1 .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array()) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__compilerVar1 .= '
				</div>
			</div>
		</div>

	</div>

	<div class="listBlock statsLastPost"></div>

</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
}
else
{
$__output .= '

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
$__output .= XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true',
'class' => 'miniMe',
'title' => 'You have posted ' . XenForo_Template_Helper_Core::numberFormat($thread['user_post_count'], '0') . ' message(s) in this thread'
),''));
}
$__output .= '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			';
$__compilerVar3 = '';
$__compilerVar3 .= '
					';
$__compilerVar4 = '';
$__compilerVar4 .= '
					';
if ($thread['isModerated'])
{
$__compilerVar4 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar4 .= '
					';
if (!$thread['discussion_open'])
{
$__compilerVar4 .= '<span class="locked" title="' . 'Locked' . '">' . 'Locked' . '</span>';
}
$__compilerVar4 .= '
					';
if ($thread['sticky'])
{
$__compilerVar4 .= '<span class="sticky" title="' . 'Sticky' . '">' . 'Sticky' . '</span>';
}
$__compilerVar4 .= '
					';
if ($thread['isRedirect'])
{
$__compilerVar4 .= '<span class="redirect" title="' . 'Redirect' . '">' . 'Redirect' . '</span>';
}
$__compilerVar4 .= '
					';
if ($thread['thread_is_watched'] OR $thread['forum_is_watched'])
{
$__compilerVar4 .= '<span class="watched" title="' . 'Watched' . '">' . 'Watched' . '</span>';
}
$__compilerVar4 .= '
					';
$__compilerVar3 .= $this->callTemplateHook('thread_list_item_icon_key', $__compilerVar4, array(
'thread' => $thread
));
unset($__compilerVar4);
$__compilerVar3 .= '
				';
if (trim($__compilerVar3) !== '')
{
$__output .= '
				<div class="iconKey">
				' . $__compilerVar3 . '
				</div>
			';
}
unset($__compilerVar3);
$__output .= '

			<h3 class="title">
				';
if ($thread['canInlineMod'])
{
$__output .= '<input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '
				';
if ($showSubscribeOptions)
{
$__output .= '<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '
				';
if ($thread['prefix_id'])
{
$__output .= '
					';
if ($linkPrefix)
{
$__output .= '
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
$__output .= '
						' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
					';
}
$__output .= '
				';
}
$__output .= '
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
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" class="unreadLink" title="' . 'Go to first unread message' . '"></a>';
}
$__output .= '
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
$__output .= '<span class="containerName">,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>';
}
$__output .= '

					';
if ($showLastPageNumbers AND $thread['lastPageNumbers'])
{
$__output .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($thread['lastPageNumbers'] AS $pageNumber)
{
$__output .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__output .= '
						</span>
					';
}
$__output .= '
				</div>

				<div class="controls faint">
					';
if ($thread['canEditThread'])
{
$__output .= '<a href="javascript:" data-href="' . XenForo_Template_Helper_Core::link('threads/list-item-edit', $thread, array(
'showForumLink' => $showForumLink
)) . '" class="EditControl JsOnly">' . 'Edit' . '</a>';
}
$__output .= '
					';
if ($showSubscribeOptions AND $thread['email_subscribe'])
{
$__output .= 'Email';
}
$__output .= '
				</div>
';
if ($threadrating['canView'])
{
$__output .= '<div class="threadrating">
	';
$__compilerVar5 = '';
if ($thread['thread_rate_count'])
{
$__compilerVar5 .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar5 .= '
';
$__compilerVar6 = '';
$__compilerVar7 = '';
$__compilerVar7 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar8 = '';
$__compilerVar9 = '';
$__compilerVar9 .= '1';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar10 .= '

';
if ($__compilerVar6)
{
$__compilerVar10 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar10 .= '

	<form action="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar9) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar8 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar7 >= 1) ? ('Full') : ('')) . (($__compilerVar7 >= 0.5 AND $__compilerVar7 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar7 >= 2) ? ('Full') : ('')) . (($__compilerVar7 >= 1.5 AND $__compilerVar7 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar7 >= 3) ? ('Full') : ('')) . (($__compilerVar7 >= 2.5 AND $__compilerVar7 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar7 >= 4) ? ('Full') : ('')) . (($__compilerVar7 >= 3.5 AND $__compilerVar7 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar7 >= 5) ? ('Full') : ('')) . (($__compilerVar7 >= 4.5 AND $__compilerVar7 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar10 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar10 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar10 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar10 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar10 .= 'tr_greyedout';
}
$__compilerVar10 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar8 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar7, '2') . '">
					 <span class="star ' . (($__compilerVar7 >= 1) ? ('Full') : ('')) . (($__compilerVar7 >= 0.5 AND $__compilerVar7 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar7 >= 2) ? ('Full') : ('')) . (($__compilerVar7 >= 1.5 AND $__compilerVar7 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar7 >= 3) ? ('Full') : ('')) . (($__compilerVar7 >= 2.5 AND $__compilerVar7 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar7 >= 4) ? ('Full') : ('')) . (($__compilerVar7 >= 3.5 AND $__compilerVar7 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar7 >= 5) ? ('Full') : ('')) . (($__compilerVar7 >= 4.5 AND $__compilerVar7 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar10 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar10 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar10 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar5 .= $__compilerVar10;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8, $__compilerVar9, $__compilerVar10);
$__compilerVar5 .= '
';
}
$__output .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '
</div>';
}
$__output .= '
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
$__output .= '
			<div class="lastPostInfo">' . 'N/A' . '</div>
		';
}
else
{
$__output .= '
			<dl class="lastPostInfo">
				<dt>';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $thread['last_post_user_id']
)))
{
$__output .= 'Ignored Member';
}
else
{
$__output .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread['lastPostInfo'],'',false,array()));
}
$__output .= '</dt>
				<dd class="muted"><a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" title="' . 'Go to last message' . '"') : ('')) . ' class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date'
))) . '</a></dd>
			</dl>
		';
}
$__output .= '
	</div>
</li>

';
}
