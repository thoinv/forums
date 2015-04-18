<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.reportSearchForm
{
	text-align: right;
}

.report-assigned.assignedSelf .title
{
	font-weight: bold;
}

.reportListItem
{
	overflow: hidden; zoom: 1;
}

	.reportListItem .content
	{
		margin-right: 210px;
	}
	
		.reportListItem .content .state
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
			font-size: 11px;
		}
	
	.reportListItem .info
	{
		float: right;
		right: 0;
		top: 0;
		width: 200px;
	}

.newerReportsLink
{
	margin-left: 10px;
}

/** REPORT VIEWING **/

.reportUserLinks li
{
	display: inline;
	margin-left: 5px;
}

.statusChange
{
	margin: 4px 10px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . ';
	font-size: 11px;
}

.reportComment
{
	overflow: hidden; *zoom: 1;
}

	.reportComment .avatar
	{
		float: left;
	}

	.reportComment .content
	{
		margin-left: 65px;
	}

	.staffComment .username
	{
		font-weight: bold;
	}

.reportCommentNote
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	font-size: 11px;
}

.reportCommentForm textarea
{
	width: 100%;
	box-sizing: border-box;
	*width: 98%;
}

.reportCommentForm .submitRow
{
	margin-top: 5px;
	text-align: right;
}

.handleReportForm .assignedOtherWarning
{
	text-align: center;
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

	.handleReportForm .assignedOtherWarning p
	{
		margin-bottom: 4px;
	}

.handleReportForm .updateStatus h4
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

.handleReportForm .updateStatus ul
{
	margin-bottom: 6px;
}

	.handleReportForm .updateStatus ul:last-child
	{
		margin-bottom: 0;
	}

.handleReportForm .updateStatus li
{
	margin: 2px 0 2px 10px;
}

.handleReportForm textarea
{
	margin-top: 5px;
	width: 100%;
	box-sizing: border-box;
	*width: 95%;
}';
