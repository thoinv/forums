<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/waindigo/tabs/existing_tab.js');
$__output .= '

';
$this->addRequiredExternal('css', 'waindigo_select_existing_tabs');
$__output .= '

<div id="TabsContentIdSelect">
	<dl class="ctrlUnit ExistingTabForm" data-select=".MediaCategorySelector">
		<dt><label for="ctrl_category_id">' . 'Category' . ':</label></dt>
		<dd><select name="category_id" class="textCtrl MediaCategorySelector" id="ctrl_category_id"
			data-href="' . XenForo_Template_Helper_Core::link('xengallery/select-existing-tab', false, array()) . '" data-target="#TabsMediaIdSelect" data-tabruleid="' . htmlspecialchars($tabRuleId, ENT_QUOTES, 'UTF-8') . '">
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
	
	<div id="TabsMediaIdSelect"></div>
</div>';
