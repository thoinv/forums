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
$__compilerVar1 = $subForums[$forum['node_id']];
$__compilerVar2 = 'category_ids[]';
$__compilerVar3 = '';
$__compilerVar3 .= '
					';
if ($categoryWatch['notify_on'])
{
$__compilerVar3 .= '
						<div class="categoryExtraNote">';
if ($categoryWatch['notify_on'] == ('resource'))
{
$__compilerVar3 .= 'New resources only';
}
else
{
$__compilerVar3 .= 'New resources and updates';
}
if ($categoryWatch['send_alert'])
{
$__compilerVar3 .= ', ' . 'Alerts';
}
if ($categoryWatch['send_email'])
{
$__compilerVar3 .= ', ' . 'Emails';
}
if ($categoryWatch['include_children'])
{
$__compilerVar3 .= ', ' . 'Sub-categories';
}
$__compilerVar3 .= '</div>
					';
}
$__compilerVar3 .= '
				';
$__compilerVar4 = '';
$__compilerVar4 .= '<li class="categoryListItem">
	<div class="categoryInfo primaryContent">
		<div class="categoryText">
			<h3 class="title">';
if ($__compilerVar2)
{
$__compilerVar4 .= '<input type="checkbox" name="' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" />&nbsp;';
}
$__compilerVar4 .= '<a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array()) . '">' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
if ($category['category_description'])
{
$__compilerVar4 .= '
				<blockquote class="description baseHtml">' . $category['category_description'] . '</blockquote>
			';
}
$__compilerVar4 .= '

			<div class="stats pairsInline">
				<dl><dt>' . 'Tài nguyên' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($category['resource_count'], '0') . '</dd></dl>
			</div>
			
			' . $__compilerVar3 . '
		</div>

		<div class="lastUpdate secondaryContent">
			';
if ($category['last_update'])
{
$__compilerVar4 .= '
				<span class="lastTitle"><span>' . 'Latest' . ':</span> <a href="' . XenForo_Template_Helper_Core::link('resources', array(
'resource_id' => $category['last_resource_id'],
'title' => $category['last_resource_title']
), array()) . '" title="' . htmlspecialchars($category['last_resource_title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($category['last_resource_title'], ENT_QUOTES, 'UTF-8') . '</a></span>
				<span class="lastMeta">
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($category['last_update'],array(
'time' => '$category.last_update',
'class' => 'muted lastDate',
'data-latest' => 'Latest' . ': '
))) . '
				</span>
			';
}
else
{
$__compilerVar4 .= '
				<span class="noMessages muted">(' . 'N/A' . ')</span>
			';
}
$__compilerVar4 .= '
		</div>	
	</div>
</li>';
$__output .= $__compilerVar4;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4);
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
			<option>' . 'With selected' . '...</option>
			<option value="email">' . 'Enable email notification' . '</option>
			<option value="no_email">' . 'Disable email notification' . '</option>
			<option value="alert">' . 'Enable alerts' . '</option>
			<option value="no_alert">' . 'Disable alerts' . '</option>
			<option value="include_children">' . 'Enable sub-category notifications' . '</option>
			<option value="no_include_children">' . 'Disable sub-category notifications' . '</option>
			<option value="stop">' . 'Stop watching categories' . '</option>
		</select>
		<input type="submit" value="' . 'Go' . '" class="button" class="button" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
