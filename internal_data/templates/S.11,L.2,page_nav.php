<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
if ($pageTotal > 1)
{
$__output .= '
<div class="PageNav' . (($maxDigits > 4) ? (' pn' . htmlspecialchars($maxDigits, ENT_QUOTES, 'UTF-8')) : ('')) . '"
	data-page="' . htmlspecialchars($currentPage, ENT_QUOTES, 'UTF-8') . '"
	data-range="' . htmlspecialchars($range, ENT_QUOTES, 'UTF-8') . '"
	data-start="' . htmlspecialchars($startPage, ENT_QUOTES, 'UTF-8') . '"
	data-end="' . htmlspecialchars($endPage, ENT_QUOTES, 'UTF-8') . '"
	data-last="' . htmlspecialchars($pageTotal, ENT_QUOTES, 'UTF-8') . '"
	data-sentinel="' . htmlspecialchars($pageNumberSentinel, ENT_QUOTES, 'UTF-8') . '"
	data-baseurl="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkType, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $linkParams,
'page' => $pageNumberSentinel
)) . '">
	
	<span class="pageNavHeader">' . 'Trang ' . htmlspecialchars($currentPage, ENT_QUOTES, 'UTF-8') . ' của ' . htmlspecialchars($pageTotal, ENT_QUOTES, 'UTF-8') . ' trang' . '</span>
	
	<nav>
		';
if ($prevPage)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkType, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $linkParams,
'page' => (($prevPage > 1) ? ($prevPage) : (''))
)) . '" class="text">&lt; ' . 'Trước' . '</a>
			';
$__extraData['head']['prev'] = '';
$__extraData['head']['prev'] .= '<link rel="prev" href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkType, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $linkParams,
'page' => (($prevPage > 1) ? ($prevPage) : (''))
)) . '" />';
$__output .= '
		';
}
$__output .= '
		
		<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkType, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $linkParams
)) . '" class="' . ((1 == $currentPage) ? ('currentPage ') : ('')) . '" rel="start">1</a>
		
		';
if ($pageTotal > $scrollThreshold)
{
$__output .= '
			<a class="PageNavPrev ' . (($startPage <= 2) ? ('hidden') : ('')) . '">&larr;</a> <span class="scrollable"><span class="items">
		';
}
$__output .= '
		
		';
foreach ($pages AS $pageNumber)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkType, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $linkParams,
'page' => $pageNumber
)) . '" class="' . (($pageNumber == $currentPage) ? ('currentPage ') : ('')) . (($pageNumber > 999) ? ('gt999 ') : ('')) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
		';
}
$__output .= '
		
		';
if ($pageTotal > $scrollThreshold)
{
$__output .= '
			</span></span> <a class="PageNavNext ' . (($endPage + 1 >= $pageTotal) ? ('hidden') : ('')) . '">&rarr;</a>
		';
}
$__output .= '
		
		<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkType, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $linkParams,
'page' => $pageTotal
)) . '" class="' . (($pageTotal == $currentPage) ? ('currentPage ') : ('')) . (($pageTotal > 999) ? ('gt999 ') : ('')) . '">' . htmlspecialchars($pageTotal, ENT_QUOTES, 'UTF-8') . '</a>
		
		';
if ($nextPage)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkType, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $linkParams,
'page' => $nextPage
)) . '" class="text">' . 'Tiếp' . ' &gt;</a>
			';
$__extraData['head']['next'] = '';
$__extraData['head']['next'] .= '<link rel="next" href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkType, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $linkParams,
'page' => $nextPage
)) . '" />';
$__output .= '
		';
}
$__output .= '
	</nav>	
	
	';
if ($unreadLinkHtml)
{
$__output .= '
		<a href="' . $unreadLinkHtml . '" class="text distinct unreadLink">' . 'Đến bài chưa đọc' . '</a>
	';
}
$__output .= '
</div>
';
}
else if ($unreadLinkHtml)
{
$__output .= '
<div class="PageNav"><a href="' . $unreadLinkHtml . '" class="text unreadLink">' . 'Đến bài chưa đọc' . '</a></div>
';
}
