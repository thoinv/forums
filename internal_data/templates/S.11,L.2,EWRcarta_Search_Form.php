<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Search Wiki';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:search', false, array()), 'value' => 'Tìm kiếm');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="xenForm AutoValidator" data-optInOut="optIn" data-redirect="true">

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

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Tìm kiếm' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="type" value="wiki" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
