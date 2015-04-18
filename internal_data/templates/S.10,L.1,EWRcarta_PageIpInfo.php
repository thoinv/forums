<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'IP address information for edit by ' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:wiki', $page, array()), 'value' => htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="section">
	<h3 class="subHeading">' . 'Page' . ': ' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '</h3>
	';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'content_ip');
$__compilerVar1 .= '

<div>
	<table class="ipInfo">
	<tr>
		<th class="primaryContent">' . 'Content IP' . '</th>
		<td class="secondaryContent">
			<a class="ip" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $ipInfo['contentIp']
)) . '" target="_blank">' . htmlspecialchars($ipInfo['contentIp'], ENT_QUOTES, 'UTF-8') . '</a>
			<span class="host">' . htmlspecialchars($ipInfo['contentHost'], ENT_QUOTES, 'UTF-8') . '</span>
		</td>
	</tr>	
	<tr>
		<th class="primaryContent">' . 'User Registration IP' . '</th>
		<td class="secondaryContent">
			<a class="ip" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $ipInfo['registrationIp']
)) . '" target="_blank">' . htmlspecialchars($ipInfo['registrationIp'], ENT_QUOTES, 'UTF-8') . '</a>
			<span class="host">' . htmlspecialchars($ipInfo['registrationHost'], ENT_QUOTES, 'UTF-8') . '</span>
		</td>
	</tr>
	<tr>
		<th class="primaryContent">' . 'Account Confirmation IP' . '</th>
		<td class="secondaryContent">
			<a class="ip" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $ipInfo['confirmationIp']
)) . '" target="_blank">' . htmlspecialchars($ipInfo['confirmationIp'], ENT_QUOTES, 'UTF-8') . '</a>
			<span class="host">' . htmlspecialchars($ipInfo['confirmationHost'], ENT_QUOTES, 'UTF-8') . '</span>
		</td>
	</tr>
	</table>
	
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Close' . '</a></div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
</div>';
