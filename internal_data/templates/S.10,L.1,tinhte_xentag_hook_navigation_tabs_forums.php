<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_canWatchTag', array()))
{
$__output .= '
	<li><a href="' . XenForo_Template_Helper_Core::link('watched/tags', false, array()) . '">' . 'Watched Tags' . '</a></li>
';
}
$__output .= '
<!-- [Tinhte] XenTag / Revert Mark --><!-- [Tinhte] XenTag / Mark --><li><!-- [Tinhte] XenTag / Mark -->';
