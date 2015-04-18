<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/admin/categories', false, array()), 'value' => 'Administrate Categories');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/category', $category, array()), 'value' => htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/category/edit', $category, array()) . '" method="post" class="xenForm">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_title">' . 'Title' . ':</label></dt>
				<dd><input type="text" name="category_name" class="textCtrl" id="ctrl_name" value="' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit fullWidth">
				<dt></dt>
				<dd>' . $editorTemplate . '</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_parent">' . 'Parent Node' . ':</label></dt>
				<dd><select name="category_parent" id="ctrl_parent" class="textCtrl autoSize">
					<option value="0">(' . 'unspecified' . ')</option>
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
		</fieldset>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Category' . '" name="submit" accesskey="s" class="button primary" />
				<a href="' . XenForo_Template_Helper_Core::link('media/category/delete', $category, array()) . '" type="button" class="button OverlayTrigger">' . 'Delete Category' . '...</a>
			</dd>
		</dl>

		<fieldset>
			<dl class="ctrlUnit">
				<dt>' . 'Options' . ':</dt>
				<dd><ul>
					<li>
						<label for="ctrl_disabled"><input type="checkbox" name="category_disabled" value="1" id="ctrl_disabled" ' . (($category['category_disabled']) ? ('checked') : ('')) . '> ' . 'Disable Category (Act as Parent Only)' . '</label>
						<p class="hint">' . 'Disabled categories will not be open for media submission.' . '</p>
					</li>
				</ul></dd>
			</dl>
		</fieldset>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
