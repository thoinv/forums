<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<strong class="subject">Bạn</strong> đã được thưởng điểm thành tích: ' . '<a href="' . XenForo_Template_Helper_Core::link('members/trophies', $visitor, array()) . '" class="PopupItemLink OverlayTrigger">' . htmlspecialchars($trophy, ENT_QUOTES, 'UTF-8') . '</a>' . '';
