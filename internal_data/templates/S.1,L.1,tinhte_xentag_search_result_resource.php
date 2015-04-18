<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="tinhte_xentag_resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult tinhte_xentag_resource primaryContent">
	
	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '</div>

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . 'Resource' . '</span>
			<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $resource['title'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $resource['tag_line'],
'1' => '150',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight'
)
)) . '</a>
		</blockquote>

		<div class="meta">
			' . 'Post by' . ': ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '
			' . 'in category' . ': <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>
		</div>
	</div>

</li>';
