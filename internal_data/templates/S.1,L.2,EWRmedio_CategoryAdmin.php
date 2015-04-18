<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Administrate Categories';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Administrate Categories';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="sectionMain mediaList">
	<div class="subHeading">' . 'Administrate Categories' . '</div>

	<form action="' . XenForo_Template_Helper_Core::link('media/admin/categories', false, array()) . '" method="post">

		';
foreach ($catList AS $category)
{
$__output .= '
			<div class="primaryContent">
				<div style="float: right; padding-top: 3px;">
					(<a href="' . XenForo_Template_Helper_Core::link('media/category/edit', $category, array()) . '">' . 'Sửa' . '</a>)
				</div>
				<span style="padding-right: 5px;">
					<input type="text" name="category_order[' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl" maxlenght="2" id="ctrl_order" value="' . htmlspecialchars($category['category_order'], ENT_QUOTES, 'UTF-8') . '" style="width: 30px;" />
				</span>
				<span style="display: inline-block; width: 180px;">
					' . $category['category_indent'] . '<a href="' . XenForo_Template_Helper_Core::link('media/category', $category, array()) . '">' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . '</a>
				</span>
				<span class="muted" style="font-size: 0.8em">
					' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $category['category_description'],
'1' => '120'
)) . '
				</span>
			</div>
		';
}
$__output .= '

		<div class="secondaryContent">
			<div style="float: right; padding-top: 3px;">
				<a href="' . XenForo_Template_Helper_Core::link('media/category/create', false, array()) . '">' . 'Create New Category' . '</a>
			</div>
			<input type="submit" value="' . 'Update Category Order' . '" name="submit" accesskey="s" class="button primary" />
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
