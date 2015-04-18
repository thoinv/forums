<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.googleLogin,
#loginBar .googleLogin
{
	display: inline-block;
	width: ' . XenForo_Template_Helper_Core::styleProperty('eAuthButtonWidth') . ';
	height: 22px;
	box-sizing: border-box;
	cursor: pointer;
	
	background-color: #dd4b39;
	border: #be3e2e solid 1px;
	border-radius: 3px;
	padding-left: 2px;
	
	color: white;
	font-weight: bold;
	font-size: 11px;
	line-height: 14px;
}

	.googleLogin span
	{
		display: block;
		background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gplus.png\') no-repeat;
		background-position: left 0;
		padding: 3px;
		padding-left: 23px;
		white-space: nowrap;
		overflow: hidden;
	}

.googleLogin:active,
#loginBar .googleLogin:active
{
	background-color: #be3e2e;
}';
