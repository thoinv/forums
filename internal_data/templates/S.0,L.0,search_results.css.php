<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.searchResultsList
{
}

.searchResultSummary
{
	overflow: hidden; zoom: 1;
}

	.searchResultSummary .resultCount
	{
		float: left;
	}
	
	.searchResultSummary .nextLink
	{
		float: right;
	}
	
.olderMessages
{
	padding: 5px 10px;
	font-size: 11px;
	text-align: center;
}

.searchResult
{
	border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	padding: 0;
	padding-bottom: 10px;
	overflow: hidden; zoom: 1;
}

	.searchResult .avatar
	{
		float: left;
		margin: 5px 0;
	}
	
	.searchResult .avatar img
	{
		/*width: 36px;*/
	}
	
	.searchResult .main
	{
		padding: 5px;
		margin-left: 56px;
	}
	
	.searchResult .titleText
	{
		overflow: hidden; zoom: 1;
		margin-bottom: 2px;
	}
	
		.searchResult .title
		{
			' . XenForo_Template_Helper_Core::styleProperty('discussionListFirstRow') . '
		}
		
			.searchResult .contentType
			{
				float: right;
				color: ' . XenForo_Template_Helper_Core::styleProperty('faintTextColor') . ';
				font-weight: bold;
				font-size: 11px;
			}
	
	.searchResult .meta
	{
		margin-bottom: 2px;
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		overflow: hidden; zoom: 1;
	}
	
		.searchResult .meta a
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . ';
		}
	
	.searchResult .InlineModCheck
	{
		vertical-align: top;
	}
	
	.searchResult .snippet
	{
		margin-bottom: 2px;
	}
	
		.searchResult .snippet a
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
			text-decoration: none;
			font-size: 11px;
		}

.searchResult.InlineModChecked
{
	' . XenForo_Template_Helper_Core::styleProperty('inlineModChecked') . '
}

.searchWarnings
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . ';
	font-size: 11px;
}

.sidebar .avatarList.userResults .avatar img
{
	width: auto;
	height: auto;
}';
