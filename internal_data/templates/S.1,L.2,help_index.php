<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Trợ giúp';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('help', false, array()), 'value' => 'Trợ giúp');
$__output .= '

<div class="baseHtml">
	<dl>
		<dt><a href="' . XenForo_Template_Helper_Core::link('help/smilies', false, array()) . '">' . 'Mặt cười' . '</a></dt>
		<dd>' . 'Hiển thị danh sách đầy đủ của mặt cười bạn có thể chèn trong bài viết.' . '</dd>
	</dl>
	
	<dl>
		<dt><a href="' . XenForo_Template_Helper_Core::link('help/bb-codes', false, array()) . '">' . 'BB Codes' . '</a></dt>
		<dd>' . 'Danh sách BB Code bạn có thể chèn và làm đẹp bài viế. Trang này hiển thị danh sách tất cả BB Code có thể dùng được.' . '</dd>
	</dl>
	
	<dl>
		<dt><a href="' . XenForo_Template_Helper_Core::link('help/trophies', false, array()) . '">' . 'Các danh hiệu' . '</a></dt>
		<dd>' . 'Bạn có thể dành cho mình những danh hiệu bởi nhiều hoạt động khác nhau. Trang này hiển thị danh sách Danh hiệu có thể đạt được.' . '</dd>
	</dl>
	
	<dl>
		<dt><a href="' . XenForo_Template_Helper_Core::link('help/cookies', false, array()) . '">' . 'Cookie Usage' . '</a></dt>
		<dd>' . 'This page explains how this site uses cookies.' . '</dd>
	</dl>
	
	';
if ($tosUrl)
{
$__output .= '
		<dl>
			<dt><a href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '">' . 'Quy định và Nội quy' . '</a></dt>
			<dd>' . 'Bạn phải đồng ý với những điều khoản này trước khi sử dụng diễn đàn.' . '</dd>
		</dl>
	';
}
$__output .= '

	';
$__compilerVar2 = '';
$__output .= $this->callTemplateHook('help_index_extra', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '

	';
foreach ($pages AS $page)
{
$__output .= '
		<dl>
			<dt><a href="' . XenForo_Template_Helper_Core::link('help', $page, array()) . '">' . htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8') . '</a></dt>
			<dd>' . htmlspecialchars($page['description'], ENT_QUOTES, 'UTF-8') . '</dd>
		</dl>
	';
}
$__output .= '
</div>';
