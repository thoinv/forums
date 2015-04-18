<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'IP address information for post #' . ($post['position'] + 1) . ' by ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('posts', $post, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
));
$__output .= '
';
$__extraData['searchBar']['thread'] = '';
$__compilerVar4 = '';
$__compilerVar4 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar5 = '';
$__compilerVar5 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '

<div class="section">
	<h3 class="subHeading">' . 'Chủ đề' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</h3>
	';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'content_ip');
$__compilerVar6 .= '

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
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '
</div>';
