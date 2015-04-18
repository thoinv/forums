<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Xóa bài viết bởi ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '';
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

<form action="' . XenForo_Template_Helper_Core::link('posts/delete', $post, array()) . '" method="post" class="xenForm formOverlay" id="delete-post">

	';
$__compilerVar8 = '';
if ($canHardDelete)
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Kiểu xóa' . ':</dt>
		<dd>
			<ul>
				<li><label for="ctrl_soft_delete">
					<input type="radio" name="hard_delete" id="ctrl_soft_delete" value="0" class="Disabler" checked="checked" /> ' . 'Không hiển thị công cộng' . '</label>
					<ul id="ctrl_soft_delete_Disabler">
						<li><input type="text" name="reason" class="textCtrl" placeholder="' . 'Lý do' . '..." /></li>
					</ul>
					<p class="hint">' . 'Bài viết sẽ vẫn xem được bởi quản lý và có thể khôi phục sau này.' . '</p>
				</li>
				<li><label for="ctrl_hard_delete">
					<input type="radio" name="hard_delete" id="ctrl_hard_delete" value="1" /> ' . 'Xóa vĩnh viễn' . '</label>
					<p class="hint">' . 'Tùy chọn này sẽ xóa vĩnh viễn bài viết này. (Không thể khôi phục được)' . '</p></li>
			</ul>
		</dd>
	</dl>
';
}
else
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_reason">' . 'Lý do xóa bỏ' . ':</label></dt>
		<dd><input type="text" name="reason" id="ctrl_reason" class="textCtrl" /></dd>
	</dl>
	<input type="hidden" name="hard_delete" value="0" />
';
}
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
	
	';
if ($post['message_state'] == ('visible') AND $post['user_id'] AND $post['user_id'] != $visitor['user_id'])
{
$__output .= '
		';
$__compilerVar9 = '0';
$__compilerVar10 = '';
$__compilerVar10 .= '<dl class="ctrlUnit">
	<dt></dt>
	<dd><ul>
		<li>
			<label><input type="checkbox" name="send_author_alert" value="1" ' . (($__compilerVar9) ? ' checked="checked"' : '') . ' class="Disabler" id="ctrl_send_author_alert" /> ' . 'Notify author of this action.' . ' ' . 'Lý do' . ':</label>
			<ul id="ctrl_send_author_alert_Disabler">
				<li><input type="text" name="author_alert_reason" class="textCtrl" placeholder="' . 'Optional' . '" /></li>
			</ul>
			<p class="hint">' . 'Note that the author will see this alert even if they can no longer view their message.' . '</p>
		</li>
	</ul></dd>
</dl>';
$__output .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__output .= '
	';
}
$__output .= '

	';
if ($post['isFirst'])
{
$__output .= '
		<h3 class="subHeading"><em>' . 'Note' . '</em>: ' . 'Đây là bài viết đầu tiên trong chủ đề. Xóa nó sẽ xóa toàn bộ chủ đề' . '</h3>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Xóa bài viết' . '" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
</form>';
