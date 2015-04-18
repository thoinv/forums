<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* the quick reply form */

.QuickReplyLive
{
	' . XenForo_Template_Helper_Core::styleProperty('messageInfo') . '
}

.QuickReplyLive textarea
{
	width: 100%;
	*width: 98%;
	height: 117px;
	box-sizing: border-box;
}

.QuickReplyLive .submitUnit
{
	margin-top: 10px;
	text-align: right;
}

.QuickReplyLive .AttachmentEditor
{
	padding-top: 10px;
}
.olderPost {
	text-align:center;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
}';
