<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.socialBar {
	padding: 10px 5px;
	margin: 0 -5px;
	zoom: 1;
	clear: both;
	position: relative;
}

.socialBar .attribution {
	position: absolute;
	bottom: 0;
	right: 0;
	z-index: 1;
}

.socialBar .attribution div {
	position: relative;
	bottom: 9px;
	right: 8px;
	font-size: 9px;	
}

.dp-social-base {
	position: relative;
	top: -1px;
}

.socialBar .socialInner {
	padding: 5px;
	height: 20px;
	white-space: nowrap;
	overflow: hidden;
	box-shadow: 0 0 7px ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
}

.socialBar s {
	text-decoration: none;
}

.socialBar .buttons {
	position: absolute;
	opacity: 0;
	width: 150px;
	-webkit-transition: all 1s;
	transition: all 1s;
}

.socialBar .tweets {
	height: 30px;
	vertical-align: top;
	position: relative;
	top: -5px;
	margin-left: 150px;
	cursor: wait;
	/*-webkit-transition: all .5s;*/
	/*transition: all .5s;*/
}


.socialBar .tweets .tweetContent {
	position: relative;
	/* top: -5px; */
	opacity: 0;
	height: 32px;
	-webkit-transition: all .5s;
	transition: all .5s;
}

.socialBar .tweets .tweetContent img {
	max-height: 16px;
	vertical-align: middle;
	/*float: left;
	padding: 5px 5px 0 0;*/
}

.socialBar .tweets .tweetContent .username {
	padding: 0 10px;
	vertical-align: middle;
	/*display: table-row;*/
}


.socialBar .tweets .tweetContent div {
	display: inline;
}

.socialBar .tweets .tweetContent div:first-child {
	font-weight: bold;
	padding-right: 5px;
}


.socialBar .tweets .tweetContent .text {
	vertical-align: middle;
}

.socialBar .a2a_kit {
	zoom: 0.6875;
	-moz-transform: scale(0.6875);
	-moz-transform-origin: 0 0;
}';
