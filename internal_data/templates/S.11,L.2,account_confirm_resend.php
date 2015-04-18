<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Gửi lại xác nhận tài khoản';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account-confirmation/resend', false, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	<p>' . 'Bạn có chắc muốn gửi lại email xác nhận tài khoản? Mọi email xác nhận tài khoản từ trước đến bây giờ sẽ không còn tác dụng. Email này sẽ được gửi đến: ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '.' . '</p>
	
	<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Gửi lại Email' . '" class="button primary" />
			</dd>
		</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
