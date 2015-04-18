<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'a.fbLogin,
#loginBar a.fbLogin
{
	display: inline-block;
	width: ' . XenForo_Template_Helper_Core::styleProperty('eAuthButtonWidth') . ';
	height: 22px;
	box-sizing: border-box;
	cursor: pointer;
	
	background: #29447e url(\'//b.s-static.ak.facebook.com/images/connect_sprite.png\');
	background-repeat: no-repeat;
	border-radius: 3px;
	rtl-raw.background-position: ' . (($pageIsRtl) ? ('right -396px') : ('left -188px')) . ';
	padding: 0px 0px 0px 1px;
	outline: none;
	
	text-decoration: none;
	color: white;
	font-weight: bold;
	font-size: 11px;
	line-height: 14px;
}

a.fbLogin:active,
#loginBar a.fbLogin:active
{
	rtl-raw.background-position: ' . (($pageIsRtl) ? ('right -418px') : ('left -210px')) . ';
}

a.fbLogin:hover,
#loginBar a.fbLogin:hover
{
	text-decoration: none;
}

	a.fbLogin span
	{
		background: #5f78ab url(\'//b.s-static.ak.facebook.com/images/connect_sprite.png\');
		border-top: solid 1px #879ac0;
		border-bottom: solid 1px #1a356e;
		display: block;
		padding: 2px 4px 3px;
		margin: 1px 1px 0px 21px;
		text-shadow: none;
		white-space: nowrap;
		overflow: hidden;
	}

	a.fbLogin:active span
	{
		border-bottom: solid 1px #29447e;
		border-top: solid 1px #45619d;
		background: #4f6aa3;
		text-shadow: none;
	}';
