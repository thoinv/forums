<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li><a class="' . (($selectedKey == ('alerts/ratingsReceived')) ? ('secondaryContent') : ('primaryContent')) . '" href="' . XenForo_Template_Helper_Core::link('account/ratings-received', false, array()) . '">' . 'Ratings You\'ve Received' . '</a></li>
<li><a class="' . (($selectedKey == ('alerts/ratingsGiven')) ? ('secondaryContent') : ('primaryContent')) . '" href="' . XenForo_Template_Helper_Core::link('account/ratings-given', false, array()) . '">' . 'Ratings You\'ve Given' . '</a></li>';
