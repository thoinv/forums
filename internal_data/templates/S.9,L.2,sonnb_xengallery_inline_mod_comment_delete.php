<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation: Delete Comments';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/inline-mod-comment/delete', false, array()) . '" method="post" class="xenForm formOverlay AutoValidator" data-redirect="on">
	<p>' . 'Are you sure you want to delete ' . htmlspecialchars($commentCount, ENT_QUOTES, 'UTF-8') . ' comments?' . '</p>

	';
$__compilerVar2 = '';
if ($canHardDelete)
{
$__compilerVar2 .= '
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
$__compilerVar2 .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_reason">' . 'Lý do xóa bỏ' . ':</label></dt>
		<dd><input type="text" name="reason" id="ctrl_reason" class="textCtrl" /></dd>
	</dl>
	<input type="hidden" name="hard_delete" value="0" />
';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Delete Comments' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($commentIds AS $commentId)
{
$__output .= '
		<input type="hidden" name="sxgcomments[]" value="' . htmlspecialchars($commentId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
