<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($content['content']['content_type'] === ('photo'))
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' liked your comment on the photo ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content['content'], array()) . '#comment_' . htmlspecialchars($content['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="PopupItemLink thumbnail">' . htmlspecialchars($content['content']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content['content']['album'], array()) . '">' . htmlspecialchars($content['content']['album']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '

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
else if ($content['content']['content_type'] === ('video'))
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' liked your comment in the video ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content['content'], array()) . '#comment_' . htmlspecialchars($content['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="PopupItemLink thumbnail">' . htmlspecialchars($content['content']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content['content']['album'], array()) . '">' . htmlspecialchars($content['content']['album']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . '

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
'1' => 'primaryText'
)) . ' liked your comment in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content['content'], array()) . '#comment_' . htmlspecialchars($content['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="PopupItemLink">' . htmlspecialchars($content['content']['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . '
';
}
