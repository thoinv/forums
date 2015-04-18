<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation - Merge Threads';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/merge', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to merge ' . htmlspecialchars($threadCount, ENT_QUOTES, 'UTF-8') . ' threads?' . '</p>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_target_thread_id">' . 'Destination Thread' . ':</label></dt>
		<dd>
			<select name="target_thread_id" id="ctrl_target_thread_id" class="textCtrl">
			';
foreach ($threads AS $thread)
{
$__output .= '
				<option value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
			</select>
			<p class="explain">' . 'All posts from the other threads will be merged into this thread.' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit" id="personal_details">
		<dt><label>' . 'Leave Redirect for Merged Threads' . ':</label></dt>
		<dd>
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<ul>
	<li><label for="ctrl_create_redirect_none"><input type="radio" name="create_redirect" value="" id="ctrl_create_redirect_none" /> ' . 'Do not leave a redirect' . '</label></li>
	<li><label for="ctrl_create_redirect_permanent"><input type="radio" name="create_redirect" value="permanent" id="ctrl_create_redirect_permanent" /> ' . 'Leave a permanent redirect' . '</label></li>
	<li><label for="ctrl_create_redirect_expiring"><input type="radio" name="create_redirect" value="expiring" id="ctrl_create_redirect_expiring" checked="checked" class="Disabler" /> ' . 'Leave a redirect that expires after' . ':</label>
		<ul id="ctrl_create_redirect_expiring_Disabler">
			<li>
				<input type="text" size="5" name="redirect_ttl_value" value="1" class="textCtrl autoSize" />
				<select name="redirect_ttl_unit" class="textCtrl autoSize">
					<option value="hours">' . 'Hours' . '</option>
					<option value="days" selected="selected">' . 'Days' . '</option>
					<option value="weeks">' . 'Weeks' . '</option>
					<option value="months">' . 'Months' . '</option>
				</select>
			</li>
		</ul>
	</li>
</ul>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		</dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt></dt>
		<dd><ul>
			<li>
				<label><input type="checkbox" name="send_starter_alert" value="1" checked="checked" class="Disabler" id="ctrl_send_starter_alert" /> ' . 'Notify non-destination thread starters of this action.' . ' ' . 'Reason' . ':</label>
				<ul id="ctrl_send_starter_alert_Disabler">
					<li><input type="text" name="starter_alert_reason" class="textCtrl" placeholder="' . 'Optional' . '" /></li>
				</ul>
				<p class="hint">' . 'Note that the thread starter will see this alert even if they can no longer view their thread.' . '</p>
			</li>
		</ul></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Merge Threads' . '" accesskey="s" class="button primary" /></dd>
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
