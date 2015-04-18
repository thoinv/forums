<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Thông tin địa chỉ IP của ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('members', false, array()), 'value' => 'Thành viên');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('online', false, array()), 'value' => 'Đang truy cập');
$__output .= '

<div class="section">
	<h3 class="subHeading">' . 'User' . ': ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</h3>
	';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'content_ip');
$__compilerVar2 .= '

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
		<th class="primaryContent">' . 'IP xác nhận tài khoản' . '</th>
		<td class="secondaryContent">
			<a class="ip" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $ipInfo['confirmationIp']
)) . '" target="_blank">' . htmlspecialchars($ipInfo['confirmationIp'], ENT_QUOTES, 'UTF-8') . '</a>
			<span class="host">' . htmlspecialchars($ipInfo['confirmationHost'], ENT_QUOTES, 'UTF-8') . '</span>
		</td>
	</tr>
	</table>
	
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
</div>';
