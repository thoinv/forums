<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'Your account is currently awaiting confirmation. Confirmation was sent to ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '.' . '<br />
<a href="' . XenForo_Template_Helper_Core::link('account-confirmation/resend', false, array()) . '" class="OverlayTrigger">' . 'Resend Confirmation Email' . '</a>';
