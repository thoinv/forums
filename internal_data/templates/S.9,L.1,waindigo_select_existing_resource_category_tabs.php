<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/waindigo/tabs/existing_tab.js');
$__output .= '

';
$this->addRequiredExternal('css', 'waindigo_select_existing_tabs');
$__output .= '

<div id="TabsContentIdSelect">
	<dl class="ctrlUnit ExistingTabForm" data-select=".ResourceCategorySelector">
		<dt><label for="ctrl_resource_category_id">' . 'Category' . ':</label></dt>
		<dd><select name="resource_category_id" class="textCtrl ResourceCategorySelector" id="ctrl_resource_category_id"
			data-href="' . XenForo_Template_Helper_Core::link('resources/select-existing-tab', false, array()) . '" data-target="#TabsResourceIdSelect">
			';
foreach ($categories AS $categoryId => $category)
{
$__output .= '
				<option value="' . htmlspecialchars($categoryId, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select></dd>
	</dl>
	
	<div id="TabsResourceIdSelect"></div>
</div>';
