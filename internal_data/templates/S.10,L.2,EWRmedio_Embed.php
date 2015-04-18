<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div style="text-align: center;">
<div id="embed_player">
	';
if ($media['service_movie'])
{
$__output .= '
		<object type="application/x-shockwave-flash" width="' . htmlspecialchars($media['service_width'], ENT_QUOTES, 'UTF-8') . '" height="' . htmlspecialchars($media['service_height'], ENT_QUOTES, 'UTF-8') . '" data="' . htmlspecialchars($media['service_movie'], ENT_QUOTES, 'UTF-8') . '">
			<param name="movie" value="' . htmlspecialchars($media['service_movie'], ENT_QUOTES, 'UTF-8') . '" />
			<param name="allowfullscreen" value="true" />
			<param name="allowscriptaccess" value="true" />
			<param name="wmode" value="transparent" />
			<param name="flashvars" value="' . htmlspecialchars($media['service_flashvars'], ENT_QUOTES, 'UTF-8') . '" />
			' . $media['service_parameters'] . '
		</object>
	';
}
else
{
$__output .= '
		' . $media['service_parameters'] . '
	';
}
$__output .= '
</div>
</div>';
