<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation - Delete Threads';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/delete', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to delete ' . htmlspecialchars($threadCount, ENT_QUOTES, 'UTF-8') . ' thread(s)?' . '</p>

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
	
	';
$__compilerVar2 = '0';
$__compilerVar3 = '';
$__compilerVar3 .= '<dl class="ctrlUnit">
	<dt></dt>
	<dd><ul>
		<li>
			<label><input type="checkbox" name="send_starter_alert" value="1" ' . (($__compilerVar2) ? ' checked="checked"' : '') . ' class="Disabler" id="ctrl_send_starter_alert" /> ' . 'Notify thread starter of this action.' . ' ' . 'Reason' . ':</label>
			<ul id="ctrl_send_starter_alert_Disabler">
				<li><input type="text" name="starter_alert_reason" class="textCtrl" placeholder="' . 'Optional' . '" /></li>
			</ul>
			<p class="hint">' . 'Note that the thread starter will see this alert even if they can no longer view their thread.' . '</p>
		</li>
	</ul></dd>
</dl>';
$__output .= $__compilerVar3;
unset($__compilerVar2, $__compilerVar3);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Delete Threads' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($threadIds AS $threadId)
{
$__output .= '
		<input type="hidden" name="threads[]" value="' . htmlspecialchars($threadId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
