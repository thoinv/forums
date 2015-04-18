<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Friend ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('members/friend', $user, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_message">' . 'How do you know ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '?' . '</label></dt>
		<dd><input type="text" name="message" id="ctrl_message" class="textCtrl" value="' . htmlspecialchars($friend['message'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>

	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<ul>
				<li>
					<label for="ctrl_know_personally">
						<input type="checkbox" name="know_personally" value="1" id="ctrl_know_personally" ' . (($friend['know_personally']) ? ' checked="checked"' : '') . '> ' . 'I know this user personally' . '
					</label>
				</li>
			</ul>
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Friend' . '" class="button primary"	accesskey="s" /></dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
