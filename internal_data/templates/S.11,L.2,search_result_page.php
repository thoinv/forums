<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="page-' . htmlspecialchars($page['node_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult page primaryContent">

	<div class="listBlock posterAvatar">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($page,(true),array(
'user' => '$page',
'size' => 's',
'img' => 'true'
),'')) . '
	</div>

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . 'Page' . '</span>
			<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('pages', $page, array()) . '">' . htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="' . XenForo_Template_Helper_Core::link('pages', $page, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $page['content'],
'1' => '150',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight',
'stripHtml' => '1'
)
)) . '</a>
		</blockquote>	

		<div class="meta">
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($page['publish_date'],array(
'time' => htmlspecialchars($page['publish_date'], ENT_QUOTES, 'UTF-8')
))) . '
		</div>
	</div>
</li>';
