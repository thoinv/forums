<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Quản lý nội tuyến - Xóa bài viết';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/post/delete', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Bạn có chắc muốn xóa ' . htmlspecialchars($postCount, ENT_QUOTES, 'UTF-8') . ' bài viết?' . '</p>

	';
$__compilerVar4 = '';
if ($canHardDelete)
{
$__compilerVar4 .= '
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
$__compilerVar4 .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_reason">' . 'Lý do xóa bỏ' . ':</label></dt>
		<dd><input type="text" name="reason" id="ctrl_reason" class="textCtrl" /></dd>
	</dl>
	<input type="hidden" name="hard_delete" value="0" />
';
}
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
	
	';
$__compilerVar5 = '0';
$__compilerVar6 = '';
$__compilerVar6 .= '<dl class="ctrlUnit">
	<dt></dt>
	<dd><ul>
		<li>
			<label><input type="checkbox" name="send_author_alert" value="1" ' . (($__compilerVar5) ? ' checked="checked"' : '') . ' class="Disabler" id="ctrl_send_author_alert" /> ' . 'Notify author of this action.' . ' ' . 'Lý do' . ':</label>
			<ul id="ctrl_send_author_alert_Disabler">
				<li><input type="text" name="author_alert_reason" class="textCtrl" placeholder="' . 'Optional' . '" /></li>
			</ul>
			<p class="hint">' . 'Note that the author will see this alert even if they can no longer view their message.' . '</p>
		</li>
	</ul></dd>
</dl>';
$__output .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__output .= '
	
	';
if ($firstPostCount)
{
$__output .= '
		<h3 class="subHeading"><em>' . 'Note' . '</em>: ' . '' . htmlspecialchars($firstPostCount, ENT_QUOTES, 'UTF-8') . ' thread(s) will be deleted when these posts are deleted.' . '</h3>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Xóa bài viết' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($postIds AS $postId)
{
$__output .= '
		<input type="hidden" name="posts[]" value="' . htmlspecialchars($postId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
