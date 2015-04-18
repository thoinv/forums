<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watched Categories';
$__output .= '

';
$this->addRequiredExternal('css', 'resource_category_list_item');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/watched-categories/update', false, array()) . '" method="post" class="sectionMain">

	<h3 class="subHeading">&nbsp;</h3>	
	';
if ($categories)
{
$__output .= '	
		<ol class="categoryList">
		';
foreach ($categories AS $category)
{
$__output .= '
			';
$categoryWatch = $categoriesWatched[$category['resource_category_id']];
$__output .= '
			';
$__compilerVar5 = $subForums[$forum['node_id']];
$__compilerVar6 = 'category_ids[]';
$__compilerVar7 = '';
$__compilerVar7 .= '
					';
if ($categoryWatch['notify_on'])
{
$__compilerVar7 .= '
						<div class="categoryExtraNote">';
if ($categoryWatch['notify_on'] == ('resource'))
{
$__compilerVar7 .= 'New resources only';
}
else
{
$__compilerVar7 .= 'New resources and updates';
}
if ($categoryWatch['send_alert'])
{
$__compilerVar7 .= ', ' . 'Thông báo';
}
if ($categoryWatch['send_email'])
{
$__compilerVar7 .= ', ' . 'Emails';
}
if ($categoryWatch['include_children'])
{
$__compilerVar7 .= ', ' . 'Sub-categories';
}
$__compilerVar7 .= '</div>
					';
}
$__compilerVar7 .= '
				';
$__compilerVar8 = '';
$__compilerVar8 .= '<li class="categoryListItem">
	<div class="categoryInfo primaryContent">
		<div class="categoryText">
			<h3 class="title">';
if ($__compilerVar6)
{
$__compilerVar8 .= '<input type="checkbox" name="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" />&nbsp;';
}
$__compilerVar8 .= '<a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array()) . '">' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
if ($category['category_description'])
{
$__compilerVar8 .= '
				<blockquote class="description baseHtml">' . $category['category_description'] . '</blockquote>
			';
}
$__compilerVar8 .= '

			<div class="stats pairsInline">
				<dl><dt>' . 'Tài nguyên' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($category['resource_count'], '0') . '</dd></dl>
			</div>
			
			' . $__compilerVar7 . '
		</div>

		<div class="lastUpdate secondaryContent">
			';
if ($category['last_update'])
{
$__compilerVar8 .= '
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
$__compilerVar8 .= '
				<span class="noMessages muted">(' . 'N/A' . ')</span>
			';
}
$__compilerVar8 .= '
		</div>	
	</div>
</li>';
$__output .= $__compilerVar8;
unset($__compilerVar5, $__compilerVar6, $__compilerVar7, $__compilerVar8);
$__output .= '
		';
}
$__output .= '
		</ol>
	';
}
else
{
$__output .= '
		<div class="primaryContent">
			' . 'You are not watching any categories.' . '
		</div>
	';
}
$__output .= '
	
	<div class="sectionFooter">
		<select name="do" class="textCtrl">
			<option>' . 'Lựa chọn với' . '...</option>
			<option value="email">' . 'Bật thông báo Email' . '</option>
			<option value="no_email">' . 'Tắt thông báo Email' . '</option>
			<option value="alert">' . 'Bật thông báo' . '</option>
			<option value="no_alert">' . 'Tắt thông báo' . '</option>
			<option value="include_children">' . 'Enable sub-category notifications' . '</option>
			<option value="no_include_children">' . 'Disable sub-category notifications' . '</option>
			<option value="stop">' . 'Stop watching categories' . '</option>
		</select>
		<input type="submit" value="' . 'Tới' . '" class="button" class="button" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
