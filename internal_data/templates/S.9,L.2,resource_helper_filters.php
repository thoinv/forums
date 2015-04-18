<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar2 = '';
$__compilerVar2 .= '
		';
if ($prefixFilter)
{
$__compilerVar2 .= '
			<dt>' . 'Tiền tố' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $pageNavParams,
'prefix_id' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove filter' . '">' . (($prefixFilter < 0) ? ('Không có') : (XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefixFilter,
'1' => 'escaped',
'2' => ''
)))) . ' <span class="gadget">x</span></a></dd>
		';
}
$__compilerVar2 .= '
		';
if ($typeFilter)
{
$__compilerVar2 .= '
			<dt>' . 'Price' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'_params' => $pageNavParams,
'type' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove filter' . '">' . (($typeFilter == ('free')) ? ('Free') : ('Paid')) . ' <span class="gadget">x</span></a></dd>
		';
}
$__compilerVar2 .= '
		';
if (trim($__compilerVar2) !== '')
{
$__output .= '
	';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '
	<div class="discussionListFilters secondaryContent">
		<h3 class="filtersHeading">' . 'Filters' . ':</h3>
		<dl class="pairsInline filterPairs">
		' . $__compilerVar2 . '
		</dl>
		<dl class="pairsInline removeAll">
			<dt>' . 'Remove all Filters' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($linkBase, ENT_QUOTES, 'UTF-8'), $linkData, array(
'order' => $pageNavParams['order']
)) . '" class="removeAllFilters Tooltip" data-tipclass="flipped" data-offsetX="10" title="' . 'Remove all Filters' . '">x</a></dd>
		</dl>
	</div>
';
}
unset($__compilerVar2);
