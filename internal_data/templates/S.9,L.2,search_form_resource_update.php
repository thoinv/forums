<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Search Resources';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:search', false, array()), 'value' => 'Tìm kiếm');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="xenForm AutoValidator"
	data-optInOut="optIn"
	data-redirect="true">

	';
$__compilerVar4 = '';
$__compilerVar4 .= '	<ul class="tabs">
	';
$__compilerVar5 = '';
$__compilerVar5 .= '
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
$__compilerVar5 .= '
	<li' . (($searchType == ('resource_update')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'resource_update'
)) . '">' . 'Search Resources' . '</a></li>
';
}
$__compilerVar5 .= '
	';
$__compilerVar4 .= $this->callTemplateHook('search_form_tabs', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '
	</ul>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
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
$__compilerVar6 = '';
$__compilerVar6 .= '
			';
if ($prefixes)
{
$__compilerVar6 .= '		
					<dl class="ctrlUnit">
						<dt><label for="ctrl_prefixes">' . 'Thread Prefixes' . ':</label></dt>
						<dd><select name="prefixes[]" class="textCtrl" size="5" multiple="multiple" id="ctrl_prefixes">
							<option value=""' . ((!$search['prefixes']) ? ' selected="selected"' : '') . '>(' . 'Mọi' . ')</option>
							';
foreach ($prefixes AS $prefixGroupId => $_prefixes)
{
$__compilerVar6 .= '
								';
if ($prefixGroupId)
{
$__compilerVar6 .= '
								<optgroup label="' . XenForo_Template_Helper_Core::callHelper('resourcePrefixGroup', array(
'0' => $prefixGroupId
)) . '">
									';
foreach ($_prefixes AS $prefixId => $prefix)
{
$__compilerVar6 .= '
										<option value="' . htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8') . '"' . (($search['prefixes'][$prefixId]) ? ' selected="selected"' : '') . '>' . htmlspecialchars($prefix['title'], ENT_QUOTES, 'UTF-8') . '</option>
									';
}
$__compilerVar6 .= '
								</optgroup>
								';
}
else
{
$__compilerVar6 .= '
									';
foreach ($_prefixes AS $prefixId => $prefix)
{
$__compilerVar6 .= '
										<option value="' . htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8') . '"' . (($search['prefixes'][$prefixId]) ? ' selected="selected"' : '') . '>' . htmlspecialchars($prefix['title'], ENT_QUOTES, 'UTF-8') . '</option>
									';
}
$__compilerVar6 .= '
								';
}
$__compilerVar6 .= '	
							';
}
$__compilerVar6 .= '
						</select></dd>
					</dl>			
				';
}
$__compilerVar6 .= '
			
			';
if ($categories)
{
$__compilerVar6 .= '
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
$__compilerVar6 .= '
									<option value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '"' . (($search['categories'][$category['resource_category_id']]) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; &nbsp; ',
'1' => htmlspecialchars($category['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '</option>
								';
}
$__compilerVar6 .= '
							</select></li>
							<li><label><input type="checkbox" name="child_categories" value="1"' . (($search['child_categories']) ? ' checked="checked"' : '') . ' /> ' . 'Search child categories as well' . '</label></li>
						</ul>
					</dd>
				</dl>
			';
}
$__compilerVar6 .= '
		';
if (trim($__compilerVar6) !== '')
{
$__output .= '
		<fieldset>
		' . $__compilerVar6 . '
		</fieldset>
	';
}
unset($__compilerVar6);
$__output .= '

	<fieldset>
		<dl class="ctrlUnit">
			<dt></dt>
			<dd><ul>
				<li><label><input type="checkbox" name="is_resource" value="1" ' . (($search['is_resource']) ? ' checked="checked"' : '') . ' /> ' . 'Search only resource descriptions' . '</label></li>
			</ul></dd>
		</dl>
	</fieldset>

	';
if ($supportsRelevance)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Sắp xếp theo' . ':</label></dt>
			<dd>
				<ul>
					<li><label for="ctrl_order_date"><input type="radio" name="order" id="ctrl_order_date" value="date" ' . (($search['order'] == ('date')) ? ' checked="checked"' : '') . ' /> ' . 'Gần đây nhất' . '</label></li>
					<li><label for="ctrl_order_relevance"><input type="radio" name="order" id="ctrl_order_relevance" value="relevance" ' . (($search['order'] == ('relevance')) ? ' checked="checked"' : '') . ' /> ' . 'Relevance' . '</label></li>
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

	<input type="hidden" name="type" value="resource_update" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
