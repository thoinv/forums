<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="thumbnail">
	';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__output .= '
		<a href="' . htmlspecialchars($attachment_link, ENT_QUOTES, 'UTF-8') . '" target="_blank" class="LbTrigger"
			data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
			src="' . htmlspecialchars($attachment_thumbnail, ENT_QUOTES, 'UTF-8') . '" title="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '" class="LbImage" /></a>
	';
}
else if ($attachment['thumbnailUrl'])
{
$__output .= '
		<a href="' . htmlspecialchars($attachment_link, ENT_QUOTES, 'UTF-8') . '" target="_blank" class="LbTrigger"
			data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
			src="' . htmlspecialchars($attachment_thumbnail, ENT_QUOTES, 'UTF-8') . '" title="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '" class="LbImage" /></a>
	';
}
else
{
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
	';
}
$__output .= '
</div>';
