<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li' . (($searchType == ('media')) ? (' class="active"') : ('')) . '><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'media'
)) . '">' . 'Search Media' . '</a></li>';
