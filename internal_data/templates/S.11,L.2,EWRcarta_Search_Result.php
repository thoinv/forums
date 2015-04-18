<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="wiki-' . htmlspecialchars($wiki['page_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult wiki primaryContent">

	<div class="listBlock main">
		<div class="titleText">
			<h3 class="title">' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . ' <a href="' . XenForo_Template_Helper_Core::link('wiki', $wiki, array()) . '">' . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $wiki['page_name'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a></h3>
		</div>

		<div class="meta">
			' . 'Wiki' . ', ' . 'Lần sửa cuối' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($wiki['page_date'],array(
'time' => htmlspecialchars($wiki['page_date'], ENT_QUOTES, 'UTF-8')
))) . '
		</div>

		<blockquote class="snippet"><a href="' . XenForo_Template_Helper_Core::link('wiki', $wiki, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $wiki['page_content'],
'1' => '150',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight',
'stripQuote' => '1'
)
)) . '</a></blockquote>

	</div>
</li>';
