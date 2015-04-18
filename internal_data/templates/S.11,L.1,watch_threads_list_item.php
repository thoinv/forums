<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

<li id="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="discussionListItem ' . htmlspecialchars($thread['discussion_state'], ENT_QUOTES, 'UTF-8') . ' ' . (($thread['isNew']) ? ('unread') : ('')) . '" data-author="' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '">

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
			<h3 class="title">
				';
if ($showSubscribeOptions)
{
$__output .= '
					<input type="checkbox" name="thread_ids[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />
				';
}
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
				';
if ($thread['isNew'])
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '" title="' . 'Go to first unread message' . '">' . XenForo_Template_Helper_Core::callHelper('wrap', array(
'0' => $thread['title'],
'1' => '50'
)) . '</a>
				';
}
else
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . XenForo_Template_Helper_Core::callHelper('wrap', array(
'0' => $thread['title'],
'1' => '50'
)) . '</a>
				';
}
$__output .= '
			</h3>
			<div class="secondRow">
				<div class="posterDate muted">
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',false,array(
'class' => 'postDate',
'title' => 'Thread starter'
))) . ',
					<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" title="' . 'View to first message in thread' . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date'
))) . '</a>,
					<a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a>
				</div>
				';
if ($showSubscribeOptions)
{
$__output .= '
					<div class="controls faint">
						';
if ($thread['email_subscribe'])
{
$__output .= 'Email';
}
$__output .= '
					</div>
				';
}
$__output .= '
			</div>
		</div>
	</div>

	<div class="listBlock stats pairsJustified">
		<dl class="major"><dt>' . 'Replies' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . '</dd></dl>
		<dl class="minor"><dt>' . 'Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0') . '</dd></dl>
	</div>

	<div class="listBlock lastPost">
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
			<dd class="muted"><a href="' . XenForo_Template_Helper_Core::link('posts', $thread['lastPostInfo'], array()) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['lastPostInfo']['post_date'],array(
'time' => '$thread.lastPostInfo.post_date',
'title' => 'Go to last message'
))) . '</a></dd>
		</dl>
	</div>

</li>';
