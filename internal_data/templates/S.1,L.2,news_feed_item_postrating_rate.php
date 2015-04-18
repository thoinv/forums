<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
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
$__output .= '

<h3 class="description">

	';
if ($visitor['user_id'] && $content['rated_user_id'] == $visitor['user_id'])
{
$__output .= '
	
		
		' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' rated your post ' . $ratingIcon . ' ' . htmlspecialchars($content['rating']['title'], ENT_QUOTES, 'UTF-8') . ' in the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . (($content['hasPreview']) ? (' class="PreviewTooltip" data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/preview', $content, array()) . '"') : ('')) . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '

	';
}
else if ($visitor['user_id'] && $dark_postrating_allow_you && $content['rating_user_id'] == $visitor['user_id'])
{
$__output .= '

		
		' . 'You rated ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . '\'s post ' . $ratingIcon . ' ' . htmlspecialchars($content['rating']['title'], ENT_QUOTES, 'UTF-8') . ' in the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . (($content['hasPreview']) ? (' class="PreviewTooltip" data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/preview', $content, array()) . '"') : ('')) . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
	
	';
}
else
{
$__output .= '
	
		
		' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' rated <a ' . 'href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . '>' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '\'s post</a> ' . $ratingIcon . ' ' . htmlspecialchars($content['rating']['title'], ENT_QUOTES, 'UTF-8') . ' in the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . (($content['hasPreview']) ? (' class="PreviewTooltip" data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/preview', $content, array()) . '"') : ('')) . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
		
	';
}
$__output .= '

</h3>

<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['message'],
'1' => $xenOptions['newsFeedMessageSnippetLength'],
'2' => array(
'stripQuote' => '1'
)
)) . '</p>

';
$__compilerVar3 = '';
if ($content['attach_count'] AND $content['attachments'])
{
$__compilerVar3 .= '
';
$__compilerVar4 = '';
$__compilerVar4 .= '
	';
foreach ($content['attachments'] AS $attachment)
{
$__compilerVar4 .= '
		';
if ($attachment['thumbnailUrl'])
{
$__compilerVar4 .= '
			<img src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" />
		';
}
$__compilerVar4 .= '
	';
}
$__compilerVar4 .= '
	';
if (trim($__compilerVar4) !== '')
{
$__compilerVar3 .= ' 
';
$this->addRequiredExternal('css', 'events');
$__compilerVar3 .= '
<a href="' . XenForo_Template_Helper_Core::link((($content['post_id']) ? ('posts') : ('threads')), $content, array()) . '" class="attachedImages">
	' . $__compilerVar4 . '
</a>
';
}
unset($__compilerVar4);
$__compilerVar3 .= '
';
}
$__output .= $__compilerVar3;
unset($__compilerVar3);
