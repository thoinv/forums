<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (!$_noLi)
{
$__output .= '<li>';
}
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('members/friend', $user, array()) . '" class="OverlayTrigger">' . 'Friend' . '</a>';
if (!$_noLi)
{
$__output .= '</li>';
}
