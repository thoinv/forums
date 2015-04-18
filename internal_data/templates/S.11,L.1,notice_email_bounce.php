<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'Attempts to send emails to ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . ' have failed. Please update your email.' . '<br />
<a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Update your contact details' . '</a>';
