<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.profilePostListItem
{
	overflow: hidden; zoom: 1;

	margin: 5px 0;
	padding-top: 5px;
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

:not(.nonInitial) > .profilePostListItem:first-child
{
	border-top: none;
	padding-top: 0;
}

.profilePostListItem .avatar
{
	float: left;
	font-size: 0;
}

	.profilePostListItem .avatar img
	{
		width: 24px;
		height: 24px;
	}

.profilePostListItem .messageInfo
{
	margin-left: 34px;
}


.profilePostListItem .messageContent article,
.profilePostListItem .messageContent blockquote
{
	display: inline;
}

.profilePostListItem .poster
{
	font-weight: bold;
}

.profilePostListItem .messageMeta
{
	overflow: hidden; zoom: 1;
	font-size: 11px;
	line-height: 14px;
	padding-top: 4px;
}

.profilePostListItem .privateControls
{
	float: left;
}

	.profilePostListItem .privateControls .item
	{
		float: left;
		margin-right: 10px;
	}

.profilePostListItem .publicControls
{
	float: right;
}

	.profilePostListItem .publicControls .item
	{
		float: left;
		margin-left: 10px;
	}
	
.sidebar .statusPoster textarea
{
	width: 100%;
	margin: 0;
	box-sizing: border-box;
	resize: vertical;
	overflow: hidden;
}

.sidebar .statusPoster .submitUnit
{
	margin-top: 5px;
	text-align: right;
}';
