<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="photos" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('gallery/authors/photos', $user, array(
'profile' => '1'
)) . '">
	' . 'Loading' . '...
	<noscript><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/photos', $user, array()) . '">' . 'View' . '</a></noscript>
</li>';
