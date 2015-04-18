<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($xenOptions['googleAnalyticsWebPropertyId'])
{
$__output .= '<script>

	var _gaq = [[\'_setAccount\', \'' . htmlspecialchars($xenOptions['googleAnalyticsWebPropertyId'], ENT_QUOTES, 'UTF-8') . '\'], [\'_trackPageview\']];
	!function(d, t)
	{
		var g = d.createElement(t),
			s = d.getElementsByTagName(t)[0];	
		g.async = true;
		g.src = (\'https:\' == d.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
		s.parentNode.insertBefore(g, s);
	}
	(document, \'script\');

	</script>';
}
