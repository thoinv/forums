<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($content['attach_count'] AND $content['attachments'])
{
$__output .= '
';
$__compilerVar2 = '';
$__compilerVar2 .= '
	';
foreach ($content['attachments'] AS $attachment)
{
$__compilerVar2 .= '
		';
if ($attachment['thumbnailUrl'])
{
$__compilerVar2 .= '
			<img src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" />
		';
}
$__compilerVar2 .= '
	';
}
$__compilerVar2 .= '
	';
if (trim($__compilerVar2) !== '')
{
$__output .= ' 
';
$this->addRequiredExternal('css', 'events');
$__output .= '
<a href="' . XenForo_Template_Helper_Core::link((($content['post_id']) ? ('posts') : ('threads')), $content, array()) . '" class="attachedImages">
	' . $__compilerVar2 . '
</a>
';
}
unset($__compilerVar2);
$__output .= '
';
}
