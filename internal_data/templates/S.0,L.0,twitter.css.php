<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'a.twitterLogin,
#loginBar a.twitterLogin
{
	display: inline-block;
	width: ' . XenForo_Template_Helper_Core::styleProperty('eAuthButtonWidth') . ';
	height: 22px;
	box-sizing: border-box;
	cursor: pointer;
	
	background-color: #eee;
	background-image: -webkit-linear-gradient(#fff, #dedede);
	background-image: linear-gradient(#fff, #dedede);
	border: #ccc solid 1px;
	border-radius: 3px;
	padding: 3px;
	
	color: #333 !important;
	font-weight: bold;
	font-size: 11px;
	line-height: 14px;
}

	a.twitterLogin span
	{
		display: block;
		background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/twitter-bird.png\') no-repeat;
		background-position: left 0;
		padding-left: 22px;
		text-shadow: 0 1px 0 rgba(255,255,255,.5);
		white-space: nowrap;
		overflow: hidden;
	}
	
a.twitterLogin:hover,
#loginBar a.twitterLogin:hover,
a.twitterLogin:active,
#loginBar a.twitterLogin:active
{
	border-color: #d9d9d9;
	background-image: -webkit-linear-gradient(#f8f8f8, #d9d9d9);
	background-image: linear-gradient(#f8f8f8, #d9d9d9);
	text-decoration: none;
}';
