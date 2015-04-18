<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($content['attach_count'] AND $content['attachments'])
{
$__output .= '
';
$__compilerVar1 = '';
$__compilerVar1 .= '
	';
foreach ($content['attachments'] AS $attachment)
{
$__compilerVar1 .= '
		';
if ($attachment['thumbnailUrl'])
{
$__compilerVar1 .= '
			<img src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" />
		';
}
$__compilerVar1 .= '
	';
}
$__compilerVar1 .= '
	';
if (trim($__compilerVar1) !== '')
{
$__output .= ' 
';
$this->addRequiredExternal('css', 'events');
$__output .= '
<a href="' . XenForo_Template_Helper_Core::link((($content['post_id']) ? ('posts') : ('threads')), $content, array()) . '" class="attachedImages">
	' . $__compilerVar1 . '
</a>
';
}
unset($__compilerVar1);
$__output .= '
';
}
