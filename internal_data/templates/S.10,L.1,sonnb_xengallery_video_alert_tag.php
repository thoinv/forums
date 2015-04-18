<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($extra_data['direct'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '

	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' tagged you in the video ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '" class="PopupItemLink thumbnail">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content['album'], array()) . '" class="PopupItemLink">' . htmlspecialchars($content['album']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . '


	';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
	<script type="text/javascript">
		!function($, window, document, _undefined) {
			XenForo.register(\'a.thumbnail.PopupItemLink\', \'XenForo.XenGalleryOverlayToggle\');
		}(jQuery, this, document);
	</script>
	';
}
$__output .= '
';
}
else
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' tagged you in the video ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content['album'], array()) . '" class="PopupItemLink">' . htmlspecialchars($content['album']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content
)) . '. Click to ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/tags/accept', $content, array(
'content_id' => $content['content_id'],
'content_type' => $content['content_type']
)) . '">' . 'Approve</a> or ' . '<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/tags/deny', $content, array(
'content_id' => $content['content_id'],
'content_type' => $content['content_type']
)) . '">' . 'Deny</a>.' . '
';
}
