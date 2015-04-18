<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Thông tin địa chỉ IP của Khách trực tuyến';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('members', false, array()), 'value' => 'Thành viên');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('online', false, array()), 'value' => 'Đang truy cập');
$__output .= '

<div class="section">
	';
$this->addRequiredExternal('css', 'content_ip');
$__output .= '

	<div>
		<table class="ipInfo">
		<tr>
			<th class="primaryContent">' . 'IP' . '</th>
			<td class="secondaryContent">
				<a class="ip" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $ip
)) . '" target="_blank">' . htmlspecialchars($ip, ENT_QUOTES, 'UTF-8') . '</a>
				<span class="host">' . htmlspecialchars($host, ENT_QUOTES, 'UTF-8') . '</span>
			</td>
		</tr>
		</table>
	</div>
</div>';
