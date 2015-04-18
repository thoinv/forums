<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Manage Reply Bans';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Manage Reply Bans';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:threads', $thread, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/reply-bans', $thread, array()) . '" method="post" class="xenForm formOverlay overlayScroll AutoValidator"
	data-redirect="yes"
>

	';
if ($replyBans)
{
$__output .= '
		<table class="dataTable">
		<tr class="dataRow subtle">
			<th width="20%">' . 'User' . '</th>
			<th width="38%">' . 'Reason' . '</th>
			<th width="32%">' . 'End Date' . '</th>
			<th width="10%">' . 'Delete' . '</th>
		</tr>
		';
foreach ($replyBans AS $ban)
{
$__output .= '
			<tr class="dataRow">
				<td>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($ban,'',false,array())) . '</td>
				<td><span title="' . 'by ' . htmlspecialchars($ban['ban_username'], ENT_QUOTES, 'UTF-8') . '' . ', ' . XenForo_Template_Helper_Core::date($ban['ban_date'], '') . '">';
if ($ban['reason'])
{
$__output .= htmlspecialchars($ban['reason'], ENT_QUOTES, 'UTF-8');
}
else
{
$__output .= 'N/A';
}
$__output .= '</span></td>
				<td>';
if ($ban['expiry_date'])
{
$__output .= XenForo_Template_Helper_Core::callHelper('datetimehtml', array($ban['expiry_date'],array(
'time' => htmlspecialchars($ban['expiry_date'], ENT_QUOTES, 'UTF-8')
)));
}
else
{
$__output .= 'N/A';
}
$__output .= '</td>
				<td><input type="checkbox" name="delete[]" value="' . htmlspecialchars($ban['user_id'], ENT_QUOTES, 'UTF-8') . '" />
			</tr>
		';
}
$__output .= '
		</table>

		<h3 class="textHeading">' . 'New Reply Ban' . '</h3>
	';
}
$__output .= '

	<dl class="ctrlUnit">
		<dt>' . 'User Name' . ':</dt>
		<dd>
			<input type="text" name="username" class="textCtrl AutoComplete AcSingle" autofocus="autofocus" />
			<p class="explain">' . 'This user will still be able to view this thread, but will not be able to reply until the ban expires.' . '</p>
		</dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt>' . 'Ban Length' . ':</dt>
		<dd>
			<ul>
				<li><label><input type="radio" name="ban_length" value="permanent" /> ' . 'Permanent' . '</label></li>
				<li><label><input type="radio" name="ban_length" value="temporary" id="ctrl_ban_length_temporary" checked="checked" class="Disabler" /> ' . 'Temporary' . ':</label>
					<ul id="ctrl_ban_length_temporary_Disabler">
						<li>
							<input type="text" size="5" name="ban_length_value" value="7" class="textCtrl autoSize" />
							<select name="ban_length_unit" class="textCtrl autoSize">
								<option value="hours">' . 'Hours' . '</option>
								<option value="days" selected="selected">' . 'Days' . '</option>
								<option value="weeks">' . 'Weeks' . '</option>
								<option value="months">' . 'Months' . '</option>
							</select>
						</li>
					</ul>
				</li>
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt>' . 'Reason' . ':</dt>
		<dd>
			<input type="text" name="reason" class="textCtrl" maxlength="100" />
			<p class="explain">' . 'This will be shown to the user if you choose to notify them.' . '</p>
		</dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt></dt>
		<dd><ul>
			<li>
				<label><input type="checkbox" name="send_alert" value="1" /> ' . 'Notify user of this action.' . '</label>
			</li>
		</ul></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Save Changes' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
</form>';
