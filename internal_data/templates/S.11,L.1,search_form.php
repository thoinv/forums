<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Search';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:search', false, array()), 'value' => 'Search');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="xenForm AutoValidator"
	data-optInOut="optIn"
	data-redirect="true">

	';
$__compilerVar1 = '';
$__compilerVar1 .= '	<ul class="tabs">
	';
$__compilerVar2 = '';
$__compilerVar2 .= '
		<li' . (($searchType == ('')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', false, array()) . '">' . 'Search Everything' . '</a></li>
		<li' . (($searchType == ('post')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'post'
)) . '">' . 'Search Threads and Posts' . '</a></li>
		<li' . (($searchType == ('profile_post')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'profile_post'
)) . '">' . 'Search Profile Posts' . '</a></li>
';
if ($canViewResources)
{
$__compilerVar2 .= '
	<li' . (($searchType == ('resource_update')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'resource_update'
)) . '">' . 'Search Resources' . '</a></li>
';
}
$__compilerVar2 .= '
	';
$__compilerVar1 .= $this->callTemplateHook('search_form_tabs', $__compilerVar2, array());
unset($__compilerVar2);
$__compilerVar1 .= '
	</ul>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

	<dl class="ctrlUnit">
		<dt><label for="ctrl_keywords">' . 'Keywords' . ':</label></dt>
		<dd>
			<ul>
				<li><input type="search" name="keywords" value="' . htmlspecialchars($search['keywords'], ENT_QUOTES, 'UTF-8') . '" results="0" class="textCtrl" id="ctrl_keywords" autofocus="true" /></li>
				<li><label for="ctrl_title_only"><input type="checkbox" name="title_only" id="ctrl_title_only" value="1"' . (($search['title_only']) ? ' checked="checked"' : '') . ' /> ' . 'Search titles only' . '</label></li>
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_users">' . 'Posted by Member' . ':</label></dt>
		<dd>
			<input type="text" name="users" value="' . htmlspecialchars($search['users'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl AutoComplete" id="ctrl_users" />
			<p class="explain">' . 'Separate names with a comma.' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_date">' . 'Newer Than' . ':</label></dt>
		<dd>
			<input type="date" name="date" value="' . htmlspecialchars($search['date'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_date" />
		</dd>
	</dl>

	';
if ($nodes)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_nodes">' . 'Search in Forums' . ':</label></dt>
			<dd>
				<ul>
					<li><select name="nodes[]" id="ctrl_nodes" size="7" multiple="multiple" class="textCtrl">
						<option value=""' . ((!$search['nodes']) ? ' selected="selected"' : '') . '>' . 'All Forums' . '</option>
						';
foreach ($nodes AS $node)
{
$__output .= '
							<option value="' . htmlspecialchars($node['node_id'], ENT_QUOTES, 'UTF-8') . '"' . (($search['nodes'][$node['node_id']]) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; &nbsp; ',
'1' => htmlspecialchars($node['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</option>
						';
}
$__output .= '
					</select></li>
					<li><label for="ctrl_child_nodes"><input type="checkbox" name="child_nodes" id="ctrl_child_nodes" value="1"' . (($search['child_nodes']) ? ' checked="checked"' : '') . ' /> ' . 'Search child forums as well' . '</label></li>
				</ul>
			</dd>
		</dl>
	';
}
$__output .= '

	';
if ($supportsRelevance)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Order By' . ':</label></dt>
			<dd>
				<ul>
					<li><label for="ctrl_order_date"><input type="radio" name="order" id="ctrl_order_date" value="date" ' . (($search['order'] == ('date')) ? ' checked="checked"' : '') . ' /> ' . 'Most Recent' . '</label></li>
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
		<dd><input type="submit" value="' . 'Search' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
