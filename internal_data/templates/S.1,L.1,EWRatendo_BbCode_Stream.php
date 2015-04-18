<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div id="stream_player" style="' . (($streamStyle) ? (htmlspecialchars($streamStyle, ENT_QUOTES, 'UTF-8')) : ('text-align: center')) . '">
	';
if ($event['service_movie'])
{
$__output .= '
		<object type="application/x-shockwave-flash" width="' . htmlspecialchars($event['service_width'], ENT_QUOTES, 'UTF-8') . '" height="' . htmlspecialchars($event['service_height'], ENT_QUOTES, 'UTF-8') . '" id="live_embed_player_flash" data="' . htmlspecialchars($event['service_movie'], ENT_QUOTES, 'UTF-8') . '">
			<param name="movie" value="' . htmlspecialchars($event['service_movie'], ENT_QUOTES, 'UTF-8') . '" />
			<param name="allowfullscreen" value="true" />
			<param name="allowscriptaccess" value="always" />
			<param name="wmode" value="transparent" />
			<param name="flashvars" value="' . htmlspecialchars($event['service_flashvars'], ENT_QUOTES, 'UTF-8') . '" />
		</object>
	';
}
else
{
$__output .= '
		' . $event['service_parameters'] . '
	';
}
$__output .= '
</div>';
