<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="description">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',false,array(
'class' => 'primaryText'
))) . ' <em>' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $status['new']
)) . '</em></h3>';
