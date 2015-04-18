<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="tinhte_xentag_page-' . htmlspecialchars($page['node_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult tinhte_xentag_page primaryContent">

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . 'Page' . '</span>
			<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('pages', $page, array()) . '">' . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $page['title'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="' . XenForo_Template_Helper_Core::link('pages', $page, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $page['description'],
'1' => '150',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight'
)
)) . '</a>
		</blockquote>

	</div>

</li>';
