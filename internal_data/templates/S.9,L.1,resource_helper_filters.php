<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
		';
if ($prefixFilter)
{
$__compilerVar1 .= '
			<dt>' . 'Prefix' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $pageNavParams,
'prefix_id' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove Filter' . '">' . (($prefixFilter < 0) ? ('None') : (XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefixFilter,
'1' => 'escaped',
'2' => ''
)))) . ' <span class="gadget">x</span></a></dd>
		';
}
$__compilerVar1 .= '
		';
if ($typeFilter)
{
$__compilerVar1 .= '
			<dt>' . 'Price' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $pageNavParams,
'type' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove Filter' . '">' . (($typeFilter == ('free')) ? ('Free') : ('Paid')) . ' <span class="gadget">x</span></a></dd>
		';
}
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '
	<div class="discussionListFilters secondaryContent">
		<h3 class="filtersHeading">' . 'Filters' . ':</h3>
		<dl class="pairsInline filterPairs">
		' . $__compilerVar1 . '
		</dl>
		<dl class="pairsInline removeAll">
			<dt>' . 'Remove All Filters' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'order' => $pageNavParams['order']
)) . '" class="removeAllFilters Tooltip" data-tipclass="flipped" data-offsetX="10" title="' . 'Remove All Filters' . '">x</a></dd>
		</dl>
	</div>
';
}
unset($__compilerVar1);
