<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation - Move Resources';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/inline-mod/move', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to move ' . htmlspecialchars($resourceCount, ENT_QUOTES, 'UTF-8') . ' resource(s)?' . '</p>

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
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Move Resources' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($resourceIds AS $resourceId)
{
$__output .= '
		<input type="hidden" name="resources[]" value="' . htmlspecialchars($resourceId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
