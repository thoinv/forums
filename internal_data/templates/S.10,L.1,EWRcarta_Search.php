<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Search Results for Query' . ': ' . htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Search Results for Query' . ': <em>' . htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8') . '</em>';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:wiki/special/search', false, array()), 'value' => 'Search');
$__output .= '

';
$this->addRequiredExternal('css', 'search_results');
$__output .= '
';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '

<div class="section sectionMain searchResults">
	<ol class="searchResultsList">
	';
foreach ($results AS $result)
{
$__output .= '
		<li id="' . htmlspecialchars($result['page_slug'], ENT_QUOTES, 'UTF-8') . '" class="searchResult post primaryContent">
			<div class="listBlock main" style="margin-left: 0px;">
				<div class="titleText" style="float: right;"><h3 class="title">' . htmlspecialchars($result['score_match'], ENT_QUOTES, 'UTF-8') . '%</h3></div>
				<div class="titleText">
					<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('wiki', $result, array()) . '">' . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $result['page_name'],
'1' => $keywords,
'2' => 'highlight'
)) . '</a></h3>
				</div>
				<div class="meta">' . 'Last Modified' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($result['page_date'],array(
'time' => htmlspecialchars($result['page_date'], ENT_QUOTES, 'UTF-8')
))) . '</div>
				<blockquote class="snippet"><a href="' . XenForo_Template_Helper_Core::link('wiki', $result, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $result['page_content'],
'1' => '300',
'2' => array(
'term' => $keywords,
'emClass' => 'highlight'
)
)) . '</a></blockquote>
			</div>
		</li>
	';
}
$__output .= '
	</ol>
</div>

';
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
