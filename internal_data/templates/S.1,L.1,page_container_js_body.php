<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<script>
/*thoinv 02022014*/

jQuery("a.VietXfAdvStats_Header").text("Thống kê diễn đàn");
jQuery("a.VietXfAdvStats_Header").attr("href", "/");
';
$__compilerVar1 = '';
$__compilerVar1 .= '
jQuery.extend(true, XenForo,
{
	visitor: { user_id: ' . htmlspecialchars($visitor['user_id'], ENT_QUOTES, 'UTF-8') . ' },
	serverTimeInfo:
	{
		now: ' . htmlspecialchars($serverTimeInfo['now'], ENT_QUOTES, 'UTF-8') . ',
		today: ' . htmlspecialchars($serverTimeInfo['today'], ENT_QUOTES, 'UTF-8') . ',
		todayDow: ' . htmlspecialchars($serverTimeInfo['todayDow'], ENT_QUOTES, 'UTF-8') . '
	},
	_lightBoxUniversal: "' . htmlspecialchars($xenOptions['lightBoxUniversal'], ENT_QUOTES, 'UTF-8') . '",
	_enableOverlays: "' . XenForo_Template_Helper_Core::styleProperty('enableOverlays') . '",
	_animationSpeedMultiplier: "' . XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier') . '",
	_overlayConfig:
	{
		top: "' . XenForo_Template_Helper_Core::styleProperty('overlayTop') . '",
		speed: ' . (XenForo_Template_Helper_Core::styleProperty('overlaySpeed') * XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier')) . ',
		closeSpeed: ' . (XenForo_Template_Helper_Core::styleProperty('overlayCloseSpeed') * XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier')) . ',
		mask:
		{
			color: "' . XenForo_Template_Helper_Core::styleProperty('overlayMaskColor') . '",
			opacity: "' . XenForo_Template_Helper_Core::styleProperty('overlayMaskOpacity') . '",
			loadSpeed: ' . (XenForo_Template_Helper_Core::styleProperty('overlaySpeed') * XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier')) . ',
			closeSpeed: ' . (XenForo_Template_Helper_Core::styleProperty('overlayCloseSpeed') * XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier')) . '
		}
	},
	_ignoredUsers: ' . XenForo_Template_Helper_Core::callHelper('json', array(
'0' => $visitor['ignoredUsers']
)) . ',
	_loadedScripts: {/*<!--XenForo_Required_Scripts-->*/},
	_cookieConfig: { path: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['cookieConfig']['path'], ENT_QUOTES, 'UTF-8'), 'double') . '", domain: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['cookieConfig']['domain'], ENT_QUOTES, 'UTF-8'), 'double') . '", prefix: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['cookieConfig']['prefix'], ENT_QUOTES, 'UTF-8'), 'double') . '"},
	_csrfToken: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8'), 'double') . '",
	_csrfRefreshUrl: "' . XenForo_Template_Helper_Core::jsEscape(XenForo_Template_Helper_Core::link('login/csrf-token-refresh', false, array()), 'double') . '",
	_jsVersion: "' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"
});
jQuery.extend(XenForo.phrases,
{
	cancel: "' . XenForo_Template_Helper_Core::jsEscape('Cancel', 'double') . '",

	a_moment_ago:    "' . XenForo_Template_Helper_Core::jsEscape('A moment ago', 'double') . '",
	one_minute_ago:  "' . XenForo_Template_Helper_Core::jsEscape('1 minute ago', 'double') . '",
	x_minutes_ago:   "' . XenForo_Template_Helper_Core::jsEscape('' . '%minutes%' . ' minutes ago', 'double') . '",
	today_at_x:      "' . XenForo_Template_Helper_Core::jsEscape('Today at ' . '%time%' . '', 'double') . '",
	yesterday_at_x:  "' . XenForo_Template_Helper_Core::jsEscape('Yesterday at ' . '%time%' . '', 'double') . '",
	day_x_at_time_y: "' . XenForo_Template_Helper_Core::jsEscape('' . '%day%' . ' at ' . '%time%' . '', 'double') . '",

	day0: "' . XenForo_Template_Helper_Core::jsEscape('Sunday', 'double') . '",
	day1: "' . XenForo_Template_Helper_Core::jsEscape('Monday', 'double') . '",
	day2: "' . XenForo_Template_Helper_Core::jsEscape('Tuesday', 'double') . '",
	day3: "' . XenForo_Template_Helper_Core::jsEscape('Wednesday', 'double') . '",
	day4: "' . XenForo_Template_Helper_Core::jsEscape('Thursday', 'double') . '",
	day5: "' . XenForo_Template_Helper_Core::jsEscape('Friday', 'double') . '",
	day6: "' . XenForo_Template_Helper_Core::jsEscape('Saturday', 'double') . '",

	_months: "' . XenForo_Template_Helper_Core::jsEscape('January' . ',' . 'February' . ',' . 'March' . ',' . 'April' . ',' . 'May' . ',' . 'June' . ',' . 'July' . ',' . 'August' . ',' . 'September' . ',' . 'October' . ',' . 'November' . ',' . 'December', 'double') . '",
	_daysShort: "' . XenForo_Template_Helper_Core::jsEscape('Sun' . ',' . 'Mon' . ',' . 'Tue' . ',' . 'Wed' . ',' . 'Thu' . ',' . 'Fri' . ',' . 'Sat', 'double') . '",

	following_error_occurred: "' . XenForo_Template_Helper_Core::jsEscape('The following error occurred', 'double') . '",
	server_did_not_respond_in_time_try_again: "' . XenForo_Template_Helper_Core::jsEscape('The server did not respond in time. Please try again.', 'double') . '",
	logging_in: "' . XenForo_Template_Helper_Core::jsEscape('Logging in', 'double') . '",
	click_image_show_full_size_version: "' . XenForo_Template_Helper_Core::jsEscape('Click this image to show the full-size version.', 'double') . '",
	show_hidden_content_by_x: "' . XenForo_Template_Helper_Core::jsEscape('Show hidden content by {names}', 'double') . '"
});

// Facebook Javascript SDK
XenForo.Facebook.appId = "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8'), 'double') . '";
XenForo.Facebook.forceInit = ' . (($facebookSdk) ? ('true') : ('false')) . ';
';
$__output .= $this->callTemplateHook('page_container_js_body', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

</script>
';
if ($contentTemplate == ('thread_view'))
{
$__output .= '
<script type="text/javascript" src="./js/rrssb/rrssb.min.js"></script>
';
}
$__output .= '

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-550fefd10305ed14" async="async"></script>
';
