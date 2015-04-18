<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.member_list .memberList,
.search_results_users_only .memberList
{
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}
	
.findMember .textCtrl
{
	display: block;
	width: 100%;
	box-sizing: border-box;
	*width: 95%;
}';
