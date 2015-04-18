<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'Tài khoản của bạn đang chờ xác nhận từ email. Xác nhận đã được gửi đến ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '.' . '<br />
<a href="' . XenForo_Template_Helper_Core::link('account-confirmation/resend', false, array()) . '" class="OverlayTrigger">' . 'Gửi lại email xác nhận' . '</a>';
