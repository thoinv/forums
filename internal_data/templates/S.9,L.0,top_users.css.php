<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.userStats
{
	font-size: 13px;
}

.username
{
	margin-bottom: 1px !important;
}

.topUsersSelection
{
	font-size: 16px;
}

.topUsersSelection .isSel
{
	display: inline;
	padding: 0px 7px;
	margin: 0px 1px;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	border-radius: 5px;
	/*background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';*/
}

.topUsersSelection .notSel
{
	display: inline;
	padding: 0px 7px;
	margin: 0px 1px;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-radius: 5px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
}
.topUsersSelection .isSel:hover
{
	background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
	border-radius: 5px;
	text-decoration: none;
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDark') . ';
}
.topUsersSelection .notSel:hover
{
	background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
	border-radius: 5px;
	text-decoration: none;
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDark') . ';
}

.topUsersSelection a:hover
{
	text-decoration: none;
}';
