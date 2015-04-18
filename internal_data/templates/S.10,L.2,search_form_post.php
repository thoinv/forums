<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Tìm Chủ đề và Bài viết';
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
	
	';
if ($search['thread'])
{
$__output .= '
		';
$this->addRequiredExternal('css', 'search_form_post');
$__output .= '
		<dl class="ctrlUnit" id="threadConstraint">
			<dt>' . 'Search Only in Thread' . ':</dt>
			<dd><a href="javascript:" title="' . 'Remove filter' . '" id="TitleRemove">x</a>
				<a href="' . XenForo_Template_Helper_Core::link('threads', $search['thread'], array()) . '" class="title">' . htmlspecialchars($search['thread']['title'], ENT_QUOTES, 'UTF-8') . '</a>
				<input type="hidden" name="thread_id" value="' . htmlspecialchars($search['thread']['thread_id'], ENT_QUOTES, 'UTF-8') . '" /></dd>
		</dl>
	';
}
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
				<ul>
					<li>
						<input type="text" name="users" value="' . htmlspecialchars($search['users'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl AutoComplete" id="ctrl_users" />
						<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
					</li>
					
				</ul>
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
	
		<dl class="ctrlUnit">
			<dt><label for="ctrl_reply_count">' . 'Số lượt trả lời nhỏ nhất là' . ':</label></dt>
			<dd>
				<!-- Chrome does horrible things with input:number -->
				<input type="number" name="reply_count" value="' . htmlspecialchars($search['reply_count'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_reply_count" min="0" step="5" />
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
					<optgroup label="' . XenForo_Template_Helper_Core::callHelper('threadPrefixGroup', array(
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
if ($nodes)
{
$__compilerVar6 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_nodes">' . 'Tìm trong diễn đàn' . ':</label></dt>
			<dd>
				<ul>
					<li><select name="nodes[]" id="ctrl_nodes" size="7" multiple="multiple" class="textCtrl">
						<option value=""' . ((!$search['nodes']) ? ' selected="selected"' : '') . '>' . 'Tất cả diễn đàn' . '</option>
						';
foreach ($nodes AS $node)
{
$__compilerVar6 .= '
							<option value="' . htmlspecialchars($node['node_id'], ENT_QUOTES, 'UTF-8') . '"' . (($search['nodes'][$node['node_id']]) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; &nbsp; ',
'1' => htmlspecialchars($node['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</option>
						';
}
$__compilerVar6 .= '
					</select></li>
					<li><label for="ctrl_child_nodes"><input type="checkbox" name="child_nodes" id="ctrl_child_nodes" value="1"' . (($search['child_nodes']) ? ' checked="checked"' : '') . ' /> ' . 'Tìm cả trong diễn đàn con' . '</label></li>
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

	<dl class="ctrlUnit">
		<dt><label>' . 'Sắp xếp theo' . ':</label></dt>
		<dd>
			<ul>
				<li><label for="ctrl_order_date"><input type="radio" name="order" id="ctrl_order_date" value="date"' . (($search['order'] == ('date')) ? ' checked="checked"' : '') . ' /> ' . 'Gần đây nhất' . '</label></li>
				<li><label for="ctrl_order_replies"><input type="radio" name="order" id="ctrl_order_replies" value="replies"' . (($search['order'] == ('replies')) ? ' checked="checked"' : '') . ' /> ' . 'Nhiều trả lời nhất' . '</label></li>
				';
if ($supportsRelevance)
{
$__output .= '<li><label for="ctrl_order_relevance"><input type="radio" name="order" id="ctrl_order_relevance" value="relevance"' . (($search['order'] == ('relevance')) ? ' checked="checked"' : '') . ' /> ' . 'Relevance' . '</label></li>';
}
$__output .= '
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt></dt>
		<dd><label for="ctrl_group_discussion"><input type="checkbox" name="group_discussion" id="ctrl_group_discussion" value="1"' . (($search['group_discussion']) ? ' checked="checked"' : '') . ' /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Tìm kiếm' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="type" value="post" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	
	<script>
	
	$(function()
	{
		$(\'#TitleRemove\').click(function(e)
		{
			$(this).closest(\'dl.ctrlUnit\').xfRemove();
		});
	});
	
	</script>
</form>';
