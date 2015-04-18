<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($triggerFullscreen && XenForo_Template_Helper_Core::styleProperty('sonnbXG_triggerFullscreen') && XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
	<script type="text/javascript">
		!function($, window, document, _undefined)
		{
			$(document).ready(function()
			{
				//console.log(XenForo.XenGalleryOverlayToggle.prototype.show);
				//XenForo.XenGalleryOverlayToggle.prototype.show();
				var $overlay = new XenForo.XenGalleryOverlayToggle($(\'.action.fullscreen\'));
				//$overlay.$toggle.click();
				$overlay.show();
				//$(\'.action.fullscreen\').trigger(\'click\');
			});
		}(jQuery, this, document);
	</script>
';
}
