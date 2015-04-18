<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li>
	<div class="secondaryContent">
		<div style="position: relative;">
			<div class="overlays" style="top: 5px; right: 5px;"><b><a href="' . XenForo_Template_Helper_Core::link('media/service', $subMedia, array()) . '">' . htmlspecialchars($subMedia['service_name'], ENT_QUOTES, 'UTF-8') . '</a></b></div>
			<div class="overlays" style="bottom: 8px; left: 5px; padding: 0px;">
				<div class="oControl oComms"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_comments'], ENT_QUOTES, 'UTF-8') . '</b></div>
				<div class="oControl oLikes"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_likes'], ENT_QUOTES, 'UTF-8') . '</b></div>
				<div class="oControl oViews"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_views'], ENT_QUOTES, 'UTF-8') . '</b></div>
			</div>

			';
if ($subMedia['service_media'] == ('gallery'))
{
$__output .= '
				<div class="overlays" style="top: 5px; left: 5px;"><b>' . '' . htmlspecialchars($subMedia['media_duration'], ENT_QUOTES, 'UTF-8') . ' images' . '</b></div>
			';
}
else
{
$__output .= '
				<div class="overlays" style="bottom: 8px; right: 5px;"><b>';
if ($subMedia['media_hours'])
{
$__output .= htmlspecialchars($subMedia['media_hours'], ENT_QUOTES, 'UTF-8') . ':';
}
$__output .= htmlspecialchars($subMedia['media_minutes'], ENT_QUOTES, 'UTF-8') . ':' . htmlspecialchars($subMedia['media_seconds'], ENT_QUOTES, 'UTF-8') . '</b></div>
			';
}
$__output .= '

			<a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . '"><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $subMedia
)) . '" border="0" style="width: 100%;" alt="' . htmlspecialchars($subMedia['media_title'], ENT_QUOTES, 'UTF-8') . '" /></a>
		</div>

		<div style="height: 34px; overflow: hidden; margin-top: 10px;">
			<a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . '"><b>' . htmlspecialchars($subMedia['media_title'], ENT_QUOTES, 'UTF-8') . '</b></a>
		</div>

		<div style="white-space: nowrap; overflow: hidden;">
			' . '' . XenForo_Template_Helper_Core::date($subMedia['media_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($subMedia['media_date'], '') . '' . '<br />
			' . 'Posted By' . ' <a href="' . XenForo_Template_Helper_Core::link('media/user', $subMedia, array()) . '">' . htmlspecialchars($subMedia['username'], ENT_QUOTES, 'UTF-8') . '</a><br />
			<a href="' . XenForo_Template_Helper_Core::link('media/category', $subMedia, array()) . '">' . htmlspecialchars($subMedia['category_name'], ENT_QUOTES, 'UTF-8') . '</a>
		</div>
	</div>
</li>';
