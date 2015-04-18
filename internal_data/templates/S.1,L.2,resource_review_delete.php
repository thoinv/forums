<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= (($responseOnly) ? ('Delete Review Response from Resource') : ('Delete Review from Resource')) . ': ' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources', $resource, array()), 'value' => XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/reviews/delete', $resource, array(
'review' => $review
)) . '" method="post" class="xenForm formOverlay">

	';
if ($responseOnly)
{
$__output .= '
		<p>' . 'Are you sure you want to delete this review response from ' . '<strong>' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</strong>' . '?' . '</p>
	';
}
else
{
$__output .= '
		<p>' . 'Are you sure you want to delete this review from ' . '<strong>' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</strong>' . '?' . '</p>
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
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . (($responseOnly) ? ('Delete Response') : ('Delete Review')) . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="response" value="' . htmlspecialchars($responseOnly, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
