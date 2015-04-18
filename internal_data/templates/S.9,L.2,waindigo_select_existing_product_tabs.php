<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/waindigo/tabs/existing_tab.js');
$__output .= '

';
$this->addRequiredExternal('css', 'waindigo_select_existing_tabs');
$__output .= '

<div id="TabsContentIdSelect">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_content_id2">' . 'xenproduct_product' . ':</label></dt>
		<dd><select name="content_id2" class="textCtrl" id="ctrl_content_id2">
			';
foreach ($products AS $productId => $product)
{
$__output .= '
				<option value="' . htmlspecialchars($productId, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($product['product_title'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select></dd>
	</dl>
</div>';
