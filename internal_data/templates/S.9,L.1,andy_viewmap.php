<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . htmlspecialchars($xenOptions['viewMapLocation'], ENT_QUOTES, 'UTF-8') . '?coordinates=' . htmlspecialchars($coordinates, ENT_QUOTES, 'UTF-8') . '"></iframe>

';
