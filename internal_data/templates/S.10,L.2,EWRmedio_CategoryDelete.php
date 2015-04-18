<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Delete Category' . ': ' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('media/category/delete', $category, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt>' . 'Delete Category' . '</dt>
		<dd>
			' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . '
			<p class="explain">' . 'Are you sure you wish to delete this category?<br />
Existing media will be moved to the parent node.' . '</p>
		</dd>
		<br /><br /><br />
		<dl class="ctrlUnit">
			<dt><label for="ctrl_parent">' . 'Parent Node' . ':</label></dt>
			<dd><select name="category_parent" id="ctrl_parent" class="textCtrl autoSize">
				<option value="0">(' . 'Không xác định' . ')</option>
				';
foreach ($catList AS $list)
{
$__output .= '
					<option value="' . htmlspecialchars($list['category_id'], ENT_QUOTES, 'UTF-8') . '"
						' . (($list['category_id'] == $category['category_parent']) ? ('selected') : ('')) . '
						' . (($list['disabled']) ? ('disabled') : ('')) . '>
						&nbsp; ' . $list['category_indent'] . $list['category_name'] . '
					</option>
				';
}
$__output .= '
			</select></dd>
		</dl>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Delete Category' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
