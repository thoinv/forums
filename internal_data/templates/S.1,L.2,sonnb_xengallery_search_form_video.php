<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Search Videos';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:search', false, array()), 'value' => 'Tìm kiếm');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="xenForm AutoValidator"
	data-optInOut="optIn" data-redirect="true">

	';
$__compilerVar3 = '';
$__compilerVar3 .= '	<ul class="tabs">
	';
$__compilerVar4 = '';
$__compilerVar4 .= '
		<li' . (($searchType == ('')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', false, array()) . '">' . 'Tìm tất cả' . '</a></li>
		<li' . (($searchType == ('post')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'post'
)) . '">' . 'Tìm Chủ đề và Bài viết' . '</a></li>
		<li' . (($searchType == ('profile_post')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'profile_post'
)) . '">' . 'Tìm trong bài viết Hồ sơ cá nhân' . '</a></li>
';
if ($canViewResources)
{
$__compilerVar4 .= '
	<li' . (($searchType == ('resource_update')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'resource_update'
)) . '">' . 'Search Resources' . '</a></li>
';
}
$__compilerVar4 .= '
	';
$__compilerVar3 .= $this->callTemplateHook('search_form_tabs', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar3 .= '
	</ul>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '

	<dl class="ctrlUnit">
		<dt><label for="ctrl_keywords">' . 'Từ khóa' . ':</label></dt>
		<dd>
			<ul>
				<li><input type="search" name="keywords" value="' . htmlspecialchars($search['keywords'], ENT_QUOTES, 'UTF-8') . '" results="0" class="textCtrl" id="ctrl_keywords" autofocus="true" /></li>
				<li><label for="ctrl_title_only"><input type="checkbox" name="title_only" id="ctrl_title_only" value="1" ' . (($search['title_only']) ? ' checked="checked"' : '') . ' /> ' . 'Chỉ tìm trong tiêu đề' . '</label></li>
			</ul>
		</dd>
	</dl>

	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_users">' . 'Được gửi bởi thành viên' . ':</label></dt>
			<dd>
				<input type="text" name="users" value="' . htmlspecialchars($search['users'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl AutoComplete" id="ctrl_users" />
				<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
			</dd>
		</dl>
	</fieldset>

	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_date">' . 'Mới hơn ngày' . ':</label></dt>
			<dd>
				<input type="date" name="date" value="' . htmlspecialchars($search['date'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_date" />
			</dd>
		</dl>
	</fieldset>

	';
if ($categories)
{
$__output .= '
		<fieldset>
			<input type="hidden" name="child_categories" value="0" />
			<dl class="ctrlUnit">
				<dt><label for="ctrl_categories">' . 'Search in Categories' . ':</label></dt>
				<dd>
					<ul>
						<li><select name="categories[]" id="ctrl_categories" size="7" multiple="multiple" class="textCtrl">
							<option value=""' . ((!$search['categories']) ? ' selected="selected"' : '') . '>' . 'All Categories' . '</option>
							';
foreach ($categories AS $category)
{
$__output .= '
								<option value="' . htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8') . '"' . (($search['categories'][$category['category_id']]) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; &nbsp; ',
'1' => htmlspecialchars($category['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . '</option>
							';
}
$__output .= '
						</select></li>
						<li><label><input type="checkbox" name="child_categories" value="1"' . (($search['child_categories']) ? ' checked="checked"' : '') . ' /> ' . 'Search child categories as well' . '</label></li>
					</ul>
				</dd>
			</dl>
		</fieldset>
	';
}
$__output .= '

	';
if ($supportsRelevance)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Sắp xếp theo' . ':</label></dt>
			<dd>
				<ul>
					<li><label for="ctrl_order_date"><input type="radio" name="order" id="ctrl_order_date" value="date" checked="checked" /> ' . 'Gần đây nhất' . '</label></li>
					<li><label for="ctrl_order_relevance"><input type="radio" name="order" id="ctrl_order_relevance" value="relevance" /> ' . 'Relevance' . '</label></li>
				</ul>
			</dd>
		</dl>
	';
}
else
{
$__output .= '
		<input type="hidden" name="order" value="date" />
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Tìm kiếm' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="type" value="sonnb_xengallery_video" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
