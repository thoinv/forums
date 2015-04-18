<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Delete photo id: ' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . ' from the album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '"';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Delete photo id: ' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . ' from the album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '"';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/photos/delete', $content, array()) . '" method="post" class="xenForm formOverlay AutoValidator" data-redirect="on" >

	';
if ($canHardDelete)
{
$__output .= '<p class="hint">' . 'By selecting "Permanently delete" option, all the comments, likes, tags... belong to this photo would be deleted permanently and unrecoverable. Please consider before you do this.' . '</p>';
}
$__output .= '
	
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
		<dd>
			';
if ($content['isDeleted'])
{
$__output .= '
				<input type="submit" name="undo_delete" value="' . 'Undo Delete' . '" class="button primary" />
			';
}
$__output .= '
			<input type="submit" value="' . 'Delete Photo' . '" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
