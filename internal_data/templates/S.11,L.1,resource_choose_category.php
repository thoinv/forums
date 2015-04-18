<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Choose a Category';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/add', false, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_resource_category_id">' . 'Category' . ':</label></dt>
		<dd>
			<select name="resource_category_id" class="textCtrl" id="ctrl_resource_category_id" autofocus="true">
				<option value="0">&nbsp;</option>
				';
foreach ($categories AS $categoryId => $_category)
{
$__output .= '
					<option value="' . htmlspecialchars($categoryId, ENT_QUOTES, 'UTF-8') . '"
						' . ((!$_category['allowResource'] or !$_category['canAdd']) ? ('disabled="disabled"') : ('')) . '
						>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; ',
'1' => htmlspecialchars($_category['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($_category['category_title'], ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__output .= '
			</select>
			<p class="explain">' . 'Select the category that best describes your resource.' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Continue' . '..." accesskey="s" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
