<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Categories' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:threads', $thread, array()), 'value' => htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'EWRporta');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/category', $thread, array()) . '" method="post" class="xenForm formOverlay">
	<fieldset>
		';
$__compilerVar4 = '';
$__compilerVar4 .= '
				';
foreach ($catlinks AS $catlink)
{
$__compilerVar4 .= '
					<li>
						<label for="ctrl_catlink[' . htmlspecialchars($catlink['catlink_id'], ENT_QUOTES, 'UTF-8') . ']">
							<input type="checkbox" name="catlinks[' . htmlspecialchars($catlink['catlink_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($catlink['category_name'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_catlink[' . htmlspecialchars($catlink['catlink_id'], ENT_QUOTES, 'UTF-8') . ']" checked="checked">
							<input type="hidden" name="oldlinks[' . htmlspecialchars($catlink['catlink_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($catlink['category_name'], ENT_QUOTES, 'UTF-8') . '">
							' . htmlspecialchars($catlink['category_name'], ENT_QUOTES, 'UTF-8') . '
						</label>
					</li>
				';
}
$__compilerVar4 .= '
				';
if (trim($__compilerVar4) !== '')
{
$__output .= '
		<dl class="ctrlUnit articleCategories">
			<dt></dt>
			<dd>
				<ul>
				' . $__compilerVar4 . '
				</ul>
			</dd>
		</dl>
		';
}
unset($__compilerVar4);
$__output .= '

		';
$__compilerVar5 = '';
$__compilerVar5 .= '
				';
foreach ($categories['major'] AS $category)
{
$__compilerVar5 .= '
					<li>
						<label for="ctrl_newlinks[' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . ']">
							<input type="checkbox" name="newlinks[' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_newlinks[' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . ']">
							' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . '
						</label>
					</li>
				';
}
$__compilerVar5 .= '
				';
if (trim($__compilerVar5) !== '')
{
$__output .= '
		<dl class="ctrlUnit articleCategories">
			<dt>' . 'Major Categories' . ':</dt>
			<dd>
				<ul>
				' . $__compilerVar5 . '
				</ul>
			</dd>
		</dl>
		';
}
unset($__compilerVar5);
$__output .= '

		';
$__compilerVar6 = '';
$__compilerVar6 .= '
				';
foreach ($categories['minor'] AS $category)
{
$__compilerVar6 .= '
					<li>
						<label for="ctrl_newlinks[' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . ']">
							<input type="checkbox" name="newlinks[' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_newlinks[' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . ']">
							' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . '
						</label>
					</li>
				';
}
$__compilerVar6 .= '
				';
if (trim($__compilerVar6) !== '')
{
$__output .= '
		<dl class="ctrlUnit articleCategories">
			<dt>' . 'Minor Categories' . ':</dt>
			<dd>
				<ul>
				' . $__compilerVar6 . '
				</ul>
			</dd>
		</dl>
		';
}
unset($__compilerVar6);
$__output .= '
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="Update Categories" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
