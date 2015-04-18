<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Sửa bài viết bởi ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:posts', $post, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
));
$__output .= '
';
$__extraData['searchBar']['thread'] = '';
$__compilerVar6 = '';
$__compilerVar6 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar7 = '';
$__compilerVar7 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('posts/save-inline', $post, array()) . '" method="post" class="section AutoValidator InlineMessageEditor NoAutoHeader">

	<h2 class="heading overlayOnly">' . 'Sửa bài viết bởi ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '</h2>

	<div class="primaryContent messageContainer">' . $editorTemplate . '</div>
<div class="secondaryContent">
';
$__compilerVar8 = '';
if ($captcha)
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
</div>
	
	';
if ($canSilentEdit)
{
$__output .= '
		';
$__compilerVar9 = '';
$__compilerVar9 .= 'secondaryContent';
$__compilerVar10 = '';
$__compilerVar10 .= '<dl class="ctrlUnit ' . htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8') . '">
	<dt></dt>
	<dd><ul>
		<li><label><input type="checkbox" name="silent" value="1" id="ctrl_silent" class="Disabler" ' . (($silentEdit) ? ' checked="checked"' : '') . ' /> ' . 'Chỉnh sửa thầm lặng' . '</label>
			<p class="explain">' . 'Nếu được chọn, không có lưu ý "chỉnh sửa cuối" được thêm vào cho chỉnh sửa này.' . '</p>
			<ul id="ctrl_silent_Disabler">
				<li><label><input type="checkbox" name="clear_edit" value="1" ' . (($clearEdit) ? ' checked="checked"' : '') . ' /> ' . 'Dọn dẹp các thông tin sửa mới nhất' . '</label>
					<p class="explain">' . 'Nếu được chọn, bất kỳ "chỉnh sửa cuối" hiện tại sẽ được gỡ bỏ.' . '</p>
				</li>
			</ul>
		</li>
	</ul></dd>
</dl>';
$__output .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__output .= '
	';
}
$__output .= '

	<div class="sectionFooter">
		<span class="buttonContainer">
			<input type="submit" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" />
			<input type="submit" value="' . 'Thêm tùy chọn' . '..." name="more_options" class="button JsOnly" />
			<input type="button" value="' . 'Hủy bỏ' . '" class="button OverlayCloser" accesskey="r" />
		</span>
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
