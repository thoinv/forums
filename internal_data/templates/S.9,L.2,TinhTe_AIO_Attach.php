<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (!$validAttachment)
{
$__output .= '

	<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . 'View attachment ' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '' . '</a>
	
';
}
else if (!$attachment['thumbnailUrl'])
{
$__output .= '

	<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . 'View attachment ' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '' . '</a>
	
';
}
else if ($canView AND $full)
{
$__output .= '
	
	<img src="' . htmlspecialchars($attachment_link, ENT_QUOTES, 'UTF-8') . '" title="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '" class="bbCodeImage LbImage" />
		
';
}
else if ($canView)
{
$__output .= '
	
	<a href="' . htmlspecialchars($attachment_link, ENT_QUOTES, 'UTF-8') . '" target="_blank" class="LbTrigger"
		data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
		src="' . htmlspecialchars($attachment_thumbnail, ENT_QUOTES, 'UTF-8') . '" title="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '"
		class="bbCodeImage LbImage" /></a>
			
';
}
else
{
$__output .= '

	<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . XenForo_Template_Helper_Core::callHelper('getattachfilename', array(
'0' => $attachment['filename']
)) . '" class="bbCodeImage" /></a>
	
';
}
