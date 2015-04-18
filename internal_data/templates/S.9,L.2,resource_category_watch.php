<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($watch)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Unwatch Category' . ' - ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watch Category' . ' - ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__output .= '

';
$__extraData['searchBar']['resourceUpdate'] = '';
$__compilerVar2 = '';
if ($category)
{
$__compilerVar2 .= '
	<label title="' . 'Search only ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[resource_update][categories][]" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" checked="checked" /> ' . 'Search this category only' . '</label>
';
}
else
{
$__compilerVar2 .= '
	<label><input type="checkbox" name="type[resource_update][null]" value="" checked="checked" id="search_bar_resources" /> ' . 'Search resources only' . '</label>
';
}
$__compilerVar2 .= '
<ul>
	<li><label><input type="checkbox" name="type[resource_update][is_resource]" value="1" /> ' . 'Search only resource descriptions' . '</label>
</ul>';
$__extraData['searchBar']['resourceUpdate'] .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/categories/watch', $category, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	';
if ($watch)
{
$__output .= '
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="hidden" name="stop" value="stop" />
				<input type="submit" value="' . 'Unwatch Category' . '" class="button primary" />
			</dd>
		</dl>
	';
}
else
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Gửi thông báo' . ':</dt>
			<dd>
				<ul>
					<li>
						<label>
							<input type="radio" name="notify_on" value="resource" checked="checked" />
							' . 'New resources only' . '
						</label>
					</li>
					<li>
						<label>
							<input type="radio" name="notify_on" value="update" />
							' . 'New resources and updates' . '
						</label>
					</li>
					<li>
						<label>
							<input type="radio" name="notify_on" value="" />
							' . 'Không gửi thông báo' . '
						</label>
					</li>
				</ul>
			</dd>
		</dl>

		<dl class="ctrlUnit">
			<dt>' . 'Gửi các thông báo qua' . ':</dt>
			<dd>
				<ul>
					<li>
						<label>
							<input type="checkbox" name="send_alert" value="1" checked="checked" />
							' . 'Thông báo' . '
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" name="send_email" value="1" />
							' . 'Emails' . '
						</label>
					</li>
				</ul>
			</dd>
		</dl>

		<dl class="ctrlUnit">
			<dt></dt>
			<dd>
				<ul><li>
					<label><input type="checkbox" name="include_children" value="1" checked="checked" />
						' . 'Include notifications for resources in sub-categories' . '
					</label>
				</li></ul>
			</dd>
		</dl>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Watch Category' . '" class="button primary" />
			</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
