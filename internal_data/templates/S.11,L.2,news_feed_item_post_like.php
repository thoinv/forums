<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">

	';
if ($content['user_id'] == $visitor['user_id'])
{
$__output .= '
	
		
		' . '' . (($user['user_id']) ? (XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
))) : ('<span class="primaryText">' . 'Unknown Member' . '</span>')) . ' thích bài viết của bạn trong chủ đề  ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . (($content['hasPreview']) ? (' class="PreviewTooltip" data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/preview', $content, array()) . '"') : ('')) . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
		
	';
}
else
{
$__output .= '
	
		
		' . '' . (($user['user_id']) ? (XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
))) : ('<span class="primaryText">' . 'Unknown Member' . '</span>')) . ' đã thích <a ' . 'href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . '>bài viết của ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a> trong chủ đề ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '"' . (($content['hasPreview']) ? (' class="PreviewTooltip" data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/preview', $content, array()) . '"') : ('')) . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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
