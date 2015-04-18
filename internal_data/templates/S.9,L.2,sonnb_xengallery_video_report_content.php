<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent messageText ugc baseHtml">
	';
if ($content['thumbnailUrl'])
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '"><img src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" /></a>';
}
$__output .= '
	<br/>
	' . htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8') . '
</div>
<dl class="secondaryContent pairsInline">
	<dt>' . 'Album' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content, array()) . '">' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($content['album_id'], ENT_QUOTES, 'UTF-8'))) . '</a></dd>
</dl>';
