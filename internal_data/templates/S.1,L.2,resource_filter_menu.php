<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($category)
{
$__output .= '
	';
$linkBase = 'resources/categories';
$__output .= '
	';
$linkData = $category;
$__output .= '
';
}
else
{
$__output .= '
	';
$linkBase = 'resources';
$__output .= '
	';
$linkData = '';
$__output .= '
';
}
$__output .= '

';
if ($showPriceFilters)
{
$__output .= '
	<div class="primaryContent menuHeader"><h3>' . 'Price Filters' . '</h3></div>
	<div class="secondaryContent bubbleLinksList">
		<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $params,
'type' => ''
)) . '" class="' . ((!$typeFilter) ? ('active') : ('')) . '">' . 'Mọi' . '</a>
		<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $params,
'type' => 'paid'
)) . '" class="' . (($typeFilter == ('paid')) ? ('active') : ('')) . '">' . 'Paid' . '</a>
		<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $params,
'type' => 'free'
)) . '" class="' . (($typeFilter == ('free')) ? ('active') : ('')) . '">' . 'Free' . '</a>
	</div>
';
}
$__output .= '

';
if ($prefixesGrouped)
{
$__output .= '
	<div class="primaryContent menuHeader"><h3>' . 'Prefix Filters' . '</h3></div>
	<div class="secondaryContent">
		<div class="bubbleLinksList">
			<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $params,
'prefix_id' => ''
)) . '" class="' . ((!$prefixFilter) ? ('active') : ('')) . '">' . 'Mọi' . '</a>
			<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $params,
'prefix_id' => '-1'
)) . '" class="' . (($prefixFilter == -1) ? ('active') : ('')) . '">' . 'Không có' . '</a>
		</div>

		';
foreach ($prefixesGrouped AS $prefixGroupId => $prefixes)
{
$__output .= '
			<h4 class="textHeading">' . (($prefixGroupId) ? (XenForo_Template_Helper_Core::callHelper('resourcePrefixGroup', array(
'0' => $prefixGroupId
))) : ('Ungrouped')) . '</h4>
			<div class="bubbleLinksList">
			';
foreach ($prefixes AS $prefix)
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $params,
'prefix_id' => $prefix['prefix_id']
)) . '" class="' . (($prefixFilter == $prefix['prefix_id']) ? ('active') : ('')) . '">' . htmlspecialchars($prefix['title'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
$__output .= '
			</div>
		';
}
$__output .= '
	</div>
';
}
