<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Delete Comment ID: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Delete Comment ID: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/comments/delete', $comment, array()) . '" method="post" class="xenForm formOverlay XenGalleryInlineCommentDelete NoAutoHeader AutoValidator">
	
	';
$__compilerVar1 = '';
if ($canHardDelete)
{
$__compilerVar1 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Deletion Type' . ':</dt>
		<dd>
			<ul>
				<li><label for="ctrl_soft_delete">
					<input type="radio" name="hard_delete" id="ctrl_soft_delete" value="0" class="Disabler" checked="checked" /> ' . 'Remove from public view' . '</label>
					<ul id="ctrl_soft_delete_Disabler">
						<li><input type="text" name="reason" class="textCtrl" placeholder="' . 'Reason' . '..." /></li>
					</ul>
					<p class="hint">' . 'The item will remain viewable by moderators and may be restored at a later date.' . '</p>
				</li>
				<li><label for="ctrl_hard_delete">
					<input type="radio" name="hard_delete" id="ctrl_hard_delete" value="1" /> ' . 'Permanently delete' . '</label>
					<p class="hint">' . 'Selecting this option will permanently and irreversibly delete the item.' . '</p></li>
			</ul>
		</dd>
	</dl>
';
}
else
{
$__compilerVar1 .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_reason">' . 'Reason for Deletion' . ':</label></dt>
		<dd><input type="text" name="reason" id="ctrl_reason" class="textCtrl" /></dd>
	</dl>
	<input type="hidden" name="hard_delete" value="0" />
';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			';
if ($comment['isDeleted'])
{
$__output .= '
				<input type="submit" name="undo_delete" value="' . 'Undo Delete' . '" class="button primary" />
			';
}
$__output .= '
			<input type="submit" value="' . 'Delete Comment' . '" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
