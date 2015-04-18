<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="discussionList section sectionMain">
	';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

	<div class="liveresult">
		<ol class="discussionListItems">
			';
if ($liveResult)
{
$__output .= '
				<dl class="sectionHeaders">
					<dd class="main">
						<span>' . 'Live Search Results' . '</span>
					</dd>
				</dl>

				';
foreach ($liveResult AS $thread)
{
$__output .= '
					';
$this->addRequiredExternal('css', 'discussion_list');
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
								<h3 class="title">
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
									<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" ' . (($xenOptions['openfire_livesearch_newtab']) ? (' target="_blank"') : ('')) . '
										class="' . (($thread['hasPreview']) ? ('PreviewTooltip') : ('')) . '"
										data-previewUrl="' . (($thread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $thread, array())) : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('wrap', array(
'0' => $thread['title'],
'1' => '50'
)) . '</a>
								</h3>
		
								<div class="secondRow">
									<div class="posterDate muted">
										' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',false,array(
'title' => 'Thread starter'
))) . '<span class="startDate">,
										<a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '"') : ('')) . ' class="">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => '$thread.post_date',
'title' => (($visitor['user_id']) ? ('Go to first message in thread') : (''))
))) . '</a></span><span class="containerName">, ' . 'in forum' . ': <a href="' . XenForo_Template_Helper_Core::link('forums', $thread['forum'], array()) . '" class="forumLink">' . htmlspecialchars($thread['forum']['title'], ENT_QUOTES, 'UTF-8') . '</a>
									</div>
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
$__output .= '
			';
}
else
{
$__output .= '
				<li class="primaryContent">' . 'There are no threads to display.' . '</li>
			';
}
$__output .= '
		</ol>
	</div>

	';
$__compilerVar1 = '';
$__compilerVar1 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
</div>';
