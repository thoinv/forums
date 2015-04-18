<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_bbcode_photo');
$__output .= '

';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '
';
}
$__output .= '

<a class="photoBbcode" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '">
	<img class="bbCodeImage LbImage" src="' . htmlspecialchars($thumbnail, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" />
</a>

';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
<script type="text/javascript">
	!function($, window, document, _undefined) {
		XenForo.register(\'.photoBbcode\', \'XenForo.XenGalleryOverlayToggle\');
	}(jQuery, this, document);
</script>
';
}
