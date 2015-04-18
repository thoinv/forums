<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '

';
if ($visitor['user_id'] == $content['user_id'])
{
$__output .= '
' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' liked your photo ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" class="PopupItemLink thumbnail">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content['album'], array()) . '" class="PopupItemLink">' . htmlspecialchars($content['album']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . '
';
}
else
{
$__output .= '
' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' liked the photo ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" class="PopupItemLink thumbnail">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content['album'], array()) . '" class="PopupItemLink">' . htmlspecialchars($content['album']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content
)) . '' . '
';
}
$__output .= '

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
