<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Search Media';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:search', false, array()), 'value' => 'Search');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="xenForm AutoValidator" data-optInOut="optIn" data-redirect="true">

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
				<li><label for="ctrl_title_only"><input type="checkbox" name="title_only" id="ctrl_title_only" value="1" ' . (($search['title_only']) ? ' checked="checked"' : '') . ' /> ' . 'Search titles only' . '</label></li>
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_users">' . 'Posted by Member' . ':</label></dt>
		<dd>
			<ul>
				<li>
					<input type="text" name="users" value="' . htmlspecialchars($search['users'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl AutoComplete" id="ctrl_users" />
					<p class="explain">' . 'Separate names with a comma.' . '</p>
				</li>
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_date">' . 'Newer Than' . ':</label></dt>
		<dd>
			<input type="date" name="date" value="' . htmlspecialchars($search['date'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_date" />
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Search' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="type" value="media" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
