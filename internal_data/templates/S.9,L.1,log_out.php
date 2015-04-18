<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Log out ' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('logout', false, array()) . '" method="post" class="xenForm formOverlay LogOutForm">

	<p>' . 'Are you sure you want to log out?' . '</p>
		
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<a href="' . XenForo_Template_Helper_Core::link('logout', '', array(
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="button primary LogOut">' . 'Log Out' . '</a>
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
