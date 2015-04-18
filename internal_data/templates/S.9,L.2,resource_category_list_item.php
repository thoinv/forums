<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="categoryListItem">
	<div class="categoryInfo primaryContent">
		<div class="categoryText">
			<h3 class="title">';
if ($watchCheckBoxName)
{
$__output .= '<input type="checkbox" name="' . htmlspecialchars($watchCheckBoxName, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" />&nbsp;';
}
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array()) . '">' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
if ($category['category_description'])
{
$__output .= '
				<blockquote class="description baseHtml">' . $category['category_description'] . '</blockquote>
			';
}
$__output .= '

			<div class="stats pairsInline">
				<dl><dt>' . 'Tài nguyên' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($category['resource_count'], '0') . '</dd></dl>
			</div>
			
			' . $extraHtml . '
		</div>

		<div class="lastUpdate secondaryContent">
			';
if ($category['last_update'])
{
$__output .= '
				<span class="lastTitle"><span>' . 'Mới nhất' . ':</span> <a href="' . XenForo_Template_Helper_Core::link('resources', array(
'resource_id' => $category['last_resource_id'],
'title' => $category['last_resource_title']
), array()) . '" title="' . htmlspecialchars($category['last_resource_title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($category['last_resource_title'], ENT_QUOTES, 'UTF-8') . '</a></span>
				<span class="lastMeta">
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($category['last_update'],array(
'time' => '$category.last_update',
'class' => 'muted lastDate',
'data-latest' => 'Mới nhất' . ': '
))) . '
				</span>
			';
}
else
{
$__output .= '
				<span class="noMessages muted">(' . 'N/A' . ')</span>
			';
}
$__output .= '
		</div>	
	</div>
</li>';
