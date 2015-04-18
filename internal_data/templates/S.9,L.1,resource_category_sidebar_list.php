<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ol>
';
foreach ($categories AS $_category)
{
$__output .= '
	<li class="' . (($_category['resource_category_id'] == $category['resource_category_id']) ? ('selected') : ('')) . '">
		<a href="' . XenForo_Template_Helper_Core::link('resources/categories', $_category, array()) . '" ' . (($_category['category_description']) ? ('title="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $_category['category_description']
)) . '" class="Tooltip" data-tipclass="resourceCategoryTooltip"') : ('')) . '>' . htmlspecialchars($_category['category_title'], ENT_QUOTES, 'UTF-8') . '</a>
		<span class="count">' . XenForo_Template_Helper_Core::numberFormat($_category['resource_count'], '0') . '</span>
	</li>
	';
if ($_category['resource_category_id'] == $showChildId)
{
$__output .= '
		' . $childCategoryHtml . '
	';
}
$__output .= '
';
}
$__output .= '
</ol>';
