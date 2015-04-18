<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Unread Watched Media';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'This is a list of the ' . htmlspecialchars($xenOptions['discussionsPerPage'], ENT_QUOTES, 'UTF-8') . ' most recently-updated media with unread comments that you are watching.' . ' <a href="' . XenForo_Template_Helper_Core::link('watched/media/all', false, array()) . '">' . 'Có thể xem nhiều hơn.' . '</a>';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media', false, array()), 'value' => 'Media');
$__output .= '

';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '
';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="discussionList sectionMain mediaPlayList">
	<dl class="sectionHeaders">
		<dd class="main">
			<a class="title"><span>' . 'All Watched Media' . '</span></a>
		</dd>
		<dd class="lastPost"><a><span>' . 'Bài viết cuối' . '</span></a></dd>
	</dl>
	
	';
if ($mediaList)
{
$__output .= '
		<ul>
		';
foreach ($mediaList AS $subMedia)
{
$__output .= '
			';
$__compilerVar3 = '';
$__compilerVar3 .= '<li>
	<div class="secondaryContent">

		';
if ($viewLast)
{
$__compilerVar3 .= '
			<div class="lastPost">
				';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $subMedia['lastCommentInfo']['user_id']
)))
{
$__compilerVar3 .= 'Ignored Member';
}
else
{
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($subMedia['lastCommentInfo'],'',false,array()));
}
$__compilerVar3 .= '<br />
				<span class="muted"><a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($subMedia['lastCommentInfo']['post_date'],array(
'time' => '$subMedia.lastCommentInfo.post_date',
'title' => 'Go to last message'
))) . '</a></span>
			</div>
		';
}
$__compilerVar3 .= '

		<div class="views">
			<b>' . htmlspecialchars($subMedia['media_views'], ENT_QUOTES, 'UTF-8') . '</b><br />
			' . 'Đọc' . '
		</div>

		';
if ($subscribeOptions)
{
$__compilerVar3 .= '
			<div class="subscribeOptions">
				<input type="checkbox" name="media_ids[]" value="' . htmlspecialchars($subMedia['media_id'], ENT_QUOTES, 'UTF-8') . '" />
			</div>
		';
}
$__compilerVar3 .= '

		<div class="thumb">
			<div class="overlays" style="bottom: 8px; left: 5px; padding: 0px;">
				<div class="oControl oComms"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_comments'], ENT_QUOTES, 'UTF-8') . '</b></div>
				<div class="oControl oLikes"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_likes'], ENT_QUOTES, 'UTF-8') . '</b></div>
			</div>

			';
if ($subMedia['service_media'] == ('gallery'))
{
$__compilerVar3 .= '
				<div class="overlays" style="top: 5px; left: 5px;"><b>' . '' . htmlspecialchars($subMedia['media_duration'], ENT_QUOTES, 'UTF-8') . ' images' . '</b></div>
			';
}
else
{
$__compilerVar3 .= '
				<div class="overlays" style="bottom: 8px; right: 5px;"><b>';
if ($subMedia['media_hours'])
{
$__compilerVar3 .= htmlspecialchars($subMedia['media_hours'], ENT_QUOTES, 'UTF-8') . ':';
}
$__compilerVar3 .= htmlspecialchars($subMedia['media_minutes'], ENT_QUOTES, 'UTF-8') . ':' . htmlspecialchars($subMedia['media_seconds'], ENT_QUOTES, 'UTF-8') . '</b></div>
			';
}
$__compilerVar3 .= '
			<a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '"><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $subMedia
)) . '" border="0" alt="' . htmlspecialchars($subMedia['media_title'], ENT_QUOTES, 'UTF-8') . '" /></a>
		</div>

		<div class="info">
			<a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '"><b>' . htmlspecialchars($subMedia['media_title'], ENT_QUOTES, 'UTF-8') . '</b></a><br />
			<div class="muted">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $subMedia['media_description'],
'1' => '200'
)) . '</div>
		</div>
	</div>
</li>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
		';
}
$__output .= '
		</ul>
	';
}
else
{
$__output .= '
		<div class="primaryContent">' . 'You do not have any watched media that are unread.' . '</div>
	';
}
$__output .= '
	
	<div class="sectionFooter">
		<a href="' . XenForo_Template_Helper_Core::link('watched/media/all', false, array()) . '">' . 'Show all watched media' . '</a>
	</div>

</div>

';
$__compilerVar4 = '';
$__compilerVar4 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
