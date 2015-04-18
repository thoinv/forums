<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media', $media, array()), 'value' => htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="section">
	<div style="background-color: #000000; padding: 5px;">
		';
$__compilerVar1 = '';
$__compilerVar1 .= '<div style="text-align: center;">
<div id="embed_player">
	';
if ($media['service_movie'])
{
$__compilerVar1 .= '
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
$__compilerVar1 .= '
		' . $media['service_parameters'] . '
	';
}
$__compilerVar1 .= '
</div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	</div>

	<h3 class="subHeading"><a href="' . XenForo_Template_Helper_Core::link('media', $media, array()) . '">' . 'Click here to view the media library page for this item "' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '"' . '</a></h3>
</div>';
