<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Ratings You\'ve Received' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Ratings You\'ve Received';
$__output .= '

';
$dark_postrating_allow_you = '';
$dark_postrating_allow_you .= '1';
$__output .= '

';
$this->addRequiredExternal('css', 'events');
$__output .= '
';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '

';
if ($ratings)
{
$__output .= '
	<div class="newsFeed">
		<ol class="eventList">
			';
foreach ($ratings AS $content)
{
$__output .= '
				';
$__compilerVar7 = '';
$__compilerVar8 = '';
$ratingIcon = '';
if ($content['rating']['name'])
{
if ($content['rating']['sprite_mode'])
{
$ratingIcon .= '<img src="styles/default/xenforo/clear.png" alt="" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($content['rating']['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($content['rating']['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($content['rating']['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($content['rating']['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($content['rating']['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px; vertical-align: middle;" />';
}
else
{
$ratingIcon .= '<img src="styles/dark/ratings/' . htmlspecialchars($content['rating']['name'], ENT_QUOTES, 'UTF-8') . '" alt="" style="vertical-align:middle" />';
}
}
$__compilerVar8 .= '

<h3 class="description">

	';
if ($visitor['user_id'] && $content['rated_user_id'] == $visitor['user_id'])
{
$__compilerVar8 .= '
	
		
		' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content,
'1' => 'primaryText'
)) . ' rated your post ' . $ratingIcon . ' ' . htmlspecialchars($content['rating']['title'], ENT_QUOTES, 'UTF-8') . ' in the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . (($content['hasPreview']) ? (' class="PreviewTooltip" data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/preview', $content, array()) . '"') : ('')) . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '

	';
}
else if ($visitor['user_id'] && $dark_postrating_allow_you && $content['rating_user_id'] == $visitor['user_id'])
{
$__compilerVar8 .= '

		
		' . 'You rated ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content,
'1' => 'primaryText'
)) . '\'s post ' . $ratingIcon . ' ' . htmlspecialchars($content['rating']['title'], ENT_QUOTES, 'UTF-8') . ' in the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . (($content['hasPreview']) ? (' class="PreviewTooltip" data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/preview', $content, array()) . '"') : ('')) . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
	
	';
}
else
{
$__compilerVar8 .= '
	
		
		' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content,
'1' => 'primaryText'
)) . ' rated <a ' . 'href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . '>' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '\'s post</a> ' . $ratingIcon . ' ' . htmlspecialchars($content['rating']['title'], ENT_QUOTES, 'UTF-8') . ' in the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . (($content['hasPreview']) ? (' class="PreviewTooltip" data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/preview', $content, array()) . '"') : ('')) . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
		
	';
}
$__compilerVar8 .= '

</h3>

<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['message'],
'1' => $xenOptions['newsFeedMessageSnippetLength'],
'2' => array(
'stripQuote' => '1'
)
)) . '</p>

';
$__compilerVar9 = '';
if ($content['attach_count'] AND $content['attachments'])
{
$__compilerVar9 .= '
';
$__compilerVar10 = '';
$__compilerVar10 .= '
	';
foreach ($content['attachments'] AS $attachment)
{
$__compilerVar10 .= '
		';
if ($attachment['thumbnailUrl'])
{
$__compilerVar10 .= '
			<img src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" />
		';
}
$__compilerVar10 .= '
	';
}
$__compilerVar10 .= '
	';
if (trim($__compilerVar10) !== '')
{
$__compilerVar9 .= ' 
';
$this->addRequiredExternal('css', 'events');
$__compilerVar9 .= '
<a href="' . XenForo_Template_Helper_Core::link((($content['post_id']) ? ('posts') : ('threads')), $content, array()) . '" class="attachedImages">
	' . $__compilerVar10 . '
</a>
';
}
unset($__compilerVar10);
$__compilerVar9 .= '
';
}
$__compilerVar8 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar7 .= $__compilerVar8;
unset($__compilerVar8);
$__compilerVar7 .= '
';
$__compilerVar11 = '';
$__compilerVar11 .= htmlspecialchars($content['date'], ENT_QUOTES, 'UTF-8');
$__compilerVar12 = '';
$__compilerVar12 .= '<li id="item_' . htmlspecialchars($content['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($content,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $__compilerVar7 . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($__compilerVar11,array(
'time' => htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
$__output .= $__compilerVar12;
unset($__compilerVar7, $__compilerVar11, $__compilerVar12);
$__output .= '
			';
}
$__output .= '
		</ol>
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($ratingsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalRatings, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'account/ratings-received', false, array(), false, array())) . '
	
';
}
else
{
$__output .= '
	<p>' . 'Unfortunately, none of your content has received any ratings yet. You\'ll need to keep posting!' . '</p>
';
}
