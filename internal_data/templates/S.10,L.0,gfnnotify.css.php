<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#GFNNotification {
	display: block;
	width: auto;
	max-height: 100vh;
	overflow: hidden;
	max-width: 100vw;
	position: fixed;
	bottom: 0;
	left: 0;
	z-index: 100000;
}

.notificationItem {
	' . XenForo_Template_Helper_Core::styleProperty('notificationItem') . '
	
}

.notificationWrapper {
	overflow: hidden;
	min-height: ' . XenForo_Template_Helper_Core::styleProperty('notificationAvatarSize') . ';
	position: relative;
}

.notificationText {
	min-height: ' . XenForo_Template_Helper_Core::styleProperty('notificationAvatarSize') . ';
	' . XenForo_Template_Helper_Core::styleProperty('notificationItemContent') . '
}

.notificationItem a,
.notificationItem b,
.notificationItem strong {
	' . XenForo_Template_Helper_Core::styleProperty('notificationItemLink') . '
}

.notificationItem a:hover,
.notificationItem a:focus,
.notificationItem a:active {
	' . XenForo_Template_Helper_Core::styleProperty('notificationItemLinkHover') . '
}

.notificationCloser {
	width: ' . XenForo_Template_Helper_Core::styleProperty('notificationCloserSize') . ';
	height: ' . XenForo_Template_Helper_Core::styleProperty('notificationCloserSize') . ';
	position: absolute;
	top: 4px;
	right: 4px;
	overflow: hidden;
	cursor: pointer;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
}

.notificationCloser:hover,
.notificationCloser:focus {
	outline: none;
}

.notificationCloser:before,
.notificationCloser:after {
	content: \'\';
	position: absolute;
	width: 2px;
	height: 60%;
	top: 50%;
	left: 50%;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('notificationCloserColor') . ';
}

.notificationCloser:hover:before,
.notificationCloser:hover:after {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('notificationCloserHoverColor') . ';
}

.notificationCloser:before {
	-webkit-transform: translate(-50%,-50%) rotate(45deg);
	transform: translate(-50%,-50%) rotate(45deg);
}

.notificationCloser:after {
	-webkit-transform: translate(-50%,-50%) rotate(-45deg);
	transform: translate(-50%,-50%) rotate(-45deg);
}

.notificationItem.hide {
	-webkit-animation-direction: reverse;
	animation-direction: reverse;
}

.notificationItem .userAvatar {
	height: ' . XenForo_Template_Helper_Core::styleProperty('notificationAvatarSize') . ';
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	z-index: 1000;
}

.notificationItem .userAvatar > img {
	height: ' . XenForo_Template_Helper_Core::styleProperty('notificationAvatarSize') . ';
}

.notificationItem.show .userAvatar,
.notificationItem.hide .userAvatar {
	-webkit-animation-name: animJelly;
	animation-name: animJelly;
	-webkit-animation-duration: 1s;
	animation-duration: 1s;
	-webkit-animation-timing-function: linear;
	animation-timing-function: linear;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
}

.notificationItem.hide .userAvatar {
	-webkit-animation-direction: reverse;
	animation-direction: reverse;
	-webkit-animation-delay: 0.3s;
	animation-delay: 0.3s;
}

.notificationItem.show .notificationText p,
.notificationItem.hide .notificationText p,
.notificationItem.show .notificationCloser,
.notificationItem.hide .notificationCloser {
	-webkit-animation-name: animFade;
	animation-name: animFade;
	-webkit-animation-duration: 0.3s;
	animation-duration: 0.3s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
}

.notificationItem.show .notificationText p,
.notificationItem.show .notificationCloser {
	-webkit-animation-delay: 0.8s;
	animation-delay: 0.8s;
}

.notificationItem.hide .notificationText p,
.notificationItem.hide .notificationCloser {
	-webkit-animation-direction: reverse;
	animation-direction: reverse;
}

.notificationItem.show .notificationText,
.notificationItem.hide .notificationText {
	-webkit-animation-name: animSlide;
	animation-name: animSlide;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	-webkit-animation-timing-function: cubic-bezier(0.7,0,0.3,1);
	animation-timing-function: cubic-bezier(0.7,0,0.3,1);
}

.notificationItem.show .notificationText {
	-webkit-animation-delay: 0.5s;
	animation-delay: 0.5s;
}

.notificationItem.hide .notificationText {
	-webkit-animation-direction: reverse;
	animation-direction: reverse;
	-webkit-animation-delay: 0.3s;
	animation-delay: 0.3s;
}';
