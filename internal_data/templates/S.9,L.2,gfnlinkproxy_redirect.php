<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Redirecting...';
$__output .= '
';
$__extraData['h1'] = '';
$__output .= '

';
$__extraData['head']['fontface'] = '';
$__extraData['head']['fontface'] .= '<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,600" />';
$__output .= '

';
$this->addRequiredExternal('css', 'gfnlinkproxy_redirect');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => htmlspecialchars($to, ENT_QUOTES, 'UTF-8'), 'value' => 'Redirecting...');
$__output .= '

<div id="redirectWrapper">
	<section class="header">
		<h1>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</h1>
	</section>
	
	<section class="message">
		' . $message . '
	</section>
	
	<section class="footer">
		<a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" class="forward">' . 'Continue';
if ($autoRedirect)
{
$__output .= ' (<span class="delay">' . htmlspecialchars($delay, ENT_QUOTES, 'UTF-8') . '</span>)';
}
$__output .= '</a>
		<a href="' . htmlspecialchars($referer, ENT_QUOTES, 'UTF-8') . '" class="cancel">' . 'Hủy bỏ' . '</a>
	</section>
</div>

';
if ($autoRedirect)
{
$__output .= '
	<script>
	<!--
		var delayCount = parseInt("' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($delay, ENT_QUOTES, 'UTF-8'), 'double') . '") + 1,
		countdown = function()
		{
			if (--delayCount > -1)
			{
				$(\'.delay\').text(delayCount);
				setTimeout(countdown, 1000);
			}
			else
			{
				XenForo.redirect("' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($url, ENT_QUOTES, 'UTF-8'), 'double') . '");
			}
		}
		
		$(document).ready(countdown);
	//-->
	</script>
';
}
