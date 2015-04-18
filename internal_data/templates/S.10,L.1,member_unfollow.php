<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Stop following ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('members/unfollow', $user, array()) . '" method="post" class="xenForm">

	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<ul>
				<li>
					<label for="ctrl__confirm">
						<input type="checkbox" name="_xfConfirm" value="1" id="ctrl__confirm"> ' . 'Stop following ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '
					</label>
				</li>
			</ul>
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Unfollow' . '" class="button primary"	accesskey="s" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
