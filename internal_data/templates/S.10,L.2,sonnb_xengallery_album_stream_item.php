<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="stream__' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '">
	<span class="streamItem">
		<a href="' . XenForo_Template_Helper_Core::link('gallery/streams', array(
'stream_name' => $stream
), array()) . '">' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '</a>
		';
if ($album['canEdit'])
{
$__output .= '
			<a class="delete" title="' . 'Xóa' . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums/stream-delete', $album, array(
'stream_name' => $stream
)) . '">[x]</a>
		';
}
$__output .= '
	</span>
</li>';
