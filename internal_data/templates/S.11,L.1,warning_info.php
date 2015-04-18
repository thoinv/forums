<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Warning for ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="xenForm formOverlay overlayScroll">
	<dl class="ctrlUnit">
		<dt>' . 'Content' . ':</dt>
		<dd>
			';
if ($canViewContent)
{
$__output .= '
				';
if ($contentUrl)
{
$__output .= '
					<a href="' . htmlspecialchars($contentUrl, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($warning['content_title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
}
else
{
$__output .= '
					' . htmlspecialchars($warning['content_title'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__output .= '
			';
}
else
{
$__output .= '
				' . 'N/A' . '
			';
}
$__output .= '
		</dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt>' . 'Given By' . ':</dt>
		<dd>' . htmlspecialchars($warning['warn_username'], ENT_QUOTES, 'UTF-8') . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($warning['warning_date'],array(
'time' => htmlspecialchars($warning['warning_date'], ENT_QUOTES, 'UTF-8')
))) . '</dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt>' . 'Details of Warning' . ':</dt>
		<dd>' . htmlspecialchars($warning['title'], ENT_QUOTES, 'UTF-8') . '
			';
if ($warning['notes'])
{
$__output .= '<div class="muted">' . XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $warning['notes']
)) . '</div>';
}
$__output .= '
		</dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt>' . 'Warning Points' . ':</dt>
		<dd>
			' . XenForo_Template_Helper_Core::numberFormat($warning['points'], '0') . '
			';
if ($warning['is_expired'])
{
$__output .= '<span class="muted">(' . 'Expired' . ')</span>
			';
}
else if ($warning['expiry_date'] > 0)
{
$__output .= '<span class="muted">(' . 'Expires ' . XenForo_Template_Helper_Core::date($warning['expiry_date'], '') . '' . ')</span>
			';
}
$__output .= '
		</dd>
	</dl>

	';
if ($canDeleteWarning AND $canExpireWarning)
{
$__output .= '
		<ul class="tabs Tabs" data-panes="#WarningActionTabs_' . htmlspecialchars($warning['warning_id'], ENT_QUOTES, 'UTF-8') . ' > form">
			<li><a href="javascript:">' . 'Delete Warning' . '</a></li>
			<li><a href="javascript:">' . 'Update Warning' . '</a></li>
		</ul>
	';
}
$__output .= '

	<div id="WarningActionTabs_' . htmlspecialchars($warning['warning_id'], ENT_QUOTES, 'UTF-8') . '">
		';
if ($canDeleteWarning)
{
$__output .= '
			<form action="' . XenForo_Template_Helper_Core::link('warnings/delete', $warning, array()) . '" method="post">
				<dl class="ctrlUnit submitUnit" style="border-top: none">
					<dt></dt>
					<dd>
						<ul>
							<li><label><input type="checkbox" name="_xfConfirm" value="1" /> ' . 'Confirm deletion' . '</label></li>
							<li>
								<input type="submit" value="' . 'Delete Warning' . '" class="button primary" />
								<input type="reset" value="' . 'Cancel' . '" class="button OverlayCloser overlayOnly" />
							</li>
						</ul>
					</dd>
				</dl>

				<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
			</form>
		';
}
$__output .= '

		';
if ($canExpireWarning)
{
$__output .= '
			<form action="' . XenForo_Template_Helper_Core::link('warnings/expire', $warning, array()) . '" method="post">
				<dl class="ctrlUnit">
					<dt></dt>
					<dd><ul>
						<li><label><input type="radio" name="expire" value="now" checked="checked" /> ' . 'Expire now' . '</label></li>
						<li><label><input type="radio" name="expire" value="future" id="ExpireWarningFuture_' . htmlspecialchars($warning['warning_id'], ENT_QUOTES, 'UTF-8') . '" class="Disabler" /> ' . 'Expire in' . ':</label>
							<ul id="ExpireWarningFuture_' . htmlspecialchars($warning['warning_id'], ENT_QUOTES, 'UTF-8') . '_Disabler">
								<li>
									<input type="text" size="5" name="expiry_length" value="1" class="textCtrl autoSize" />
									<select name="expiry_unit" class="textCtrl autoSize">
										<option value="hours">' . 'Hours' . '</option>
										<option value="days" selected="selected">' . 'Days' . '</option>
										<option value="weeks">' . 'Weeks' . '</option>
										<option value="months">' . 'Months' . '</option>
									</select>
								</li>
							</ul>
						</li>
					</ul></dd>
				</dl>
				<dl class="ctrlUnit submitUnit">
					<dt></dt>
					<dd>
						<input type="submit" value="' . 'Update Warning' . '" class="button primary" />
					</dd>
				</dl>

				<input type="hidden" name="_xfConfirm" value="1" />
				<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
			</form>
		';
}
$__output .= '
	</div>
</div>';
