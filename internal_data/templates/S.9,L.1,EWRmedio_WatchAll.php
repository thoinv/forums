<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'All Watched Media' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $start
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'All Watched Media';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'This is a list of all the media that you are watching.';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media', false, array()), 'value' => 'Media');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:watched/media', false, array()), 'value' => 'Unread Watched Media');
$__output .= '

';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '
';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="pageNavLinkGroup">
	<div class="linkGroup"></div>
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'watched/media/all', false, array(), false, array())) . '
</div>

<form action="' . XenForo_Template_Helper_Core::link('watched/media/update', false, array()) . '" method="post" class="discussionList sectionMain mediaPlayList">

	<dl class="sectionHeaders">
		<dd class="main">
			<a class="title"><span>' . 'All Watched Media' . '</span></a>
		</dd>
		<dd class="lastPost"><a><span>' . 'Last Message' . '</span></a></dd>
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
$__compilerVar1 = '';
$__compilerVar1 .= '<li>
	<div class="secondaryContent">

		';
if ($viewLast)
{
$__compilerVar1 .= '
			<div class="lastPost">
				';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $subMedia['lastCommentInfo']['user_id']
)))
{
$__compilerVar1 .= 'Ignored Member';
}
else
{
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($subMedia['lastCommentInfo'],'',false,array()));
}
$__compilerVar1 .= '<br />
				<span class="muted"><a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($subMedia['lastCommentInfo']['post_date'],array(
'time' => '$subMedia.lastCommentInfo.post_date',
'title' => 'Go to last message'
))) . '</a></span>
			</div>
		';
}
$__compilerVar1 .= '

		<div class="views">
			<b>' . htmlspecialchars($subMedia['media_views'], ENT_QUOTES, 'UTF-8') . '</b><br />
			' . 'Views' . '
		</div>

		';
if ($subscribeOptions)
{
$__compilerVar1 .= '
			<div class="subscribeOptions">
				<input type="checkbox" name="media_ids[]" value="' . htmlspecialchars($subMedia['media_id'], ENT_QUOTES, 'UTF-8') . '" />
			</div>
		';
}
$__compilerVar1 .= '

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
$__compilerVar1 .= '
				<div class="overlays" style="top: 5px; left: 5px;"><b>' . '' . htmlspecialchars($subMedia['media_duration'], ENT_QUOTES, 'UTF-8') . ' images' . '</b></div>
			';
}
else
{
$__compilerVar1 .= '
				<div class="overlays" style="bottom: 8px; right: 5px;"><b>';
if ($subMedia['media_hours'])
{
$__compilerVar1 .= htmlspecialchars($subMedia['media_hours'], ENT_QUOTES, 'UTF-8') . ':';
}
$__compilerVar1 .= htmlspecialchars($subMedia['media_minutes'], ENT_QUOTES, 'UTF-8') . ':' . htmlspecialchars($subMedia['media_seconds'], ENT_QUOTES, 'UTF-8') . '</b></div>
			';
}
$__compilerVar1 .= '
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
$__output .= $__compilerVar1;
unset($__compilerVar1);
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
		<div class="primaryContent">
			';
if ($page > 1)
{
$__output .= '
				' . 'There are no media to display.' . '
			';
}
else
{
$__output .= '
				' . 'You are not watching any media.' . '
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
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'watched/media/all', false, array(), false, array())) . '
</div>

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
