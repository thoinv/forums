<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<p class="description">' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' đã đăng chủ đề mới.' . '</p>

<h3 class="title thread"><span class="icon"></span> <a href="' . XenForo_Template_Helper_Core::link('threads', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

<p class="snippet post">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['message'],
'1' => $xenOptions['newsFeedMessageSnippetLength']
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
$__output .= '

<h4 class="minorTitle forum"><span class="icon"></span> ' . 'Diễn đàn' . ': <a href="' . XenForo_Template_Helper_Core::link('forums', $content, array()) . '">' . htmlspecialchars($content['node_title'], ENT_QUOTES, 'UTF-8') . '</a></h4>';
