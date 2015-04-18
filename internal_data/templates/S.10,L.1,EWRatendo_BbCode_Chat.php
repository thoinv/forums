<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div id="stream_player" style="' . (($chatStyle) ? (htmlspecialchars($chatStyle, ENT_QUOTES, 'UTF-8')) : ('')) . '">
	';
if ($event['service_stype'] == ('flash'))
{
$__output .= '
		<object type="application/x-shockwave-flash" width="100%" height="' . htmlspecialchars($event['service_height'], ENT_QUOTES, 'UTF-8') . '" data="' . htmlspecialchars($event['service_stream'], ENT_QUOTES, 'UTF-8') . '">
			<param name="movie" value="' . htmlspecialchars($event['service_stream'], ENT_QUOTES, 'UTF-8') . '" />
			<param name="allowfullscreen" value="true" />
			<param name="wmode" value="transparent" />
			<param name="flashvars" value="' . htmlspecialchars($event['service_sflashvars'], ENT_QUOTES, 'UTF-8') . '" />
		</object>
	';
}
else
{
$__output .= '
		<iframe frameborder="0" scrolling="no"
			width="100%" height="' . htmlspecialchars($event['service_height'], ENT_QUOTES, 'UTF-8') . '"
			src="' . htmlspecialchars($event['service_stream'], ENT_QUOTES, 'UTF-8') . '">
		</iframe>
	';
}
$__output .= '
</div>';
