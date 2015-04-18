<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '

<h3 class="description">

	';
if ($visitor['user_id'] == $content['user_id'])
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' added ' . htmlspecialchars($extra_data['count'], ENT_QUOTES, 'UTF-8') . ' new videos to your album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . '
	';
}
else
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'primaryText'
)) . ' added ' . htmlspecialchars($extra_data['count'], ENT_QUOTES, 'UTF-8') . ' new videos to the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content
)) . '' . '
	';
}
$__output .= '

</h3>

<p class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['description'],
'1' => $xenOptions['newsFeedMessageSnippetLength'],
'2' => array(
'stripQuote' => '1'
)
)) . '</p>
';
if ($content['newVideos'])
{
$__output .= '
	';
foreach ($content['newVideos'] AS $video)
{
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link('gallery/videos', $video, array()) . '" class="attachedImages thumbnail">
			<img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $video['description'],
'1' => '100'
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $video['description'],
'1' => '100'
)) . '" src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" style="max-height: 120px;" alt="" />
		</a>
	';
}
$__output .= '
';
}
$__output .= '

';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
	<script type="text/javascript">
		!function($, window, document, _undefined) {
			XenForo.register(\'a.thumbnail.attachedImages, a.thumbnail.PopupItemLink\', \'XenForo.XenGalleryOverlayToggle\');
		}(jQuery, this, document);
	</script>
';
}
