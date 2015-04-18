<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.spamUserInfo
{
	overflow: hidden; zoom: 1;
	clear: both;
}

	.spamUserInfo .avatar
	{
		float: left;
	}
	
	.spamUserInfo dl
	{
		float: left;
		margin-left: 20px;
		padding-left: 20px;
		border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	}
	
	.spamUserInfo dl:first-child
	{
		border-left: none;
		padding-left: 0;
	}
	
		.spamUserInfo dt
		{
			font-size: 11px;
		}
		
		.spamUserInfo dd
		{
		/*	margin-left: 5px;*/
		margin-bottom: 5px;
		}
		
.spamControls
{
	/*margin-top: 10px;
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	padding-top: 10px;*/
}

	.ctrlUnit.spamControls dt
	{
		text-align: left;
	}
	
		.ctrlUnit.spamControls dt li
		{
			margin: 5px 0;
		}
		
			.ctrlUnit.spamControls dt li label
			{
				margin-left: 0;
			}

	.xenForm .ctrlUnit.spamControls dd
	{
		padding-right: 0;
	}

	.spamControls .spamEmailText
	{
		margin-left: 20px;
	}
	
	.spamControls textarea
	{
		min-height: 55px;
	}
	
/* ip checker */

.ipMatches .userLog
{
	overflow: hidden; zoom: 1;
}

.ipMatches .avatar
{
	float: left;
}

.ipMatches .logInfo
{
	margin-left: 110px;
}

.ipMatches .userInfo
{
	overflow: hidden; zoom: 1;
}

.ipMatches h3
{
	font-size: 11pt;
	float: left;
}

.ipMatches .banned
{
	text-decoration: line-through;
}

.ipMatches .regDate
{
	font-size: 11px;
	float: right;
}

.ipMatches .ipLog
{
	font-size: 11px;
	padding: 5px;
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
}

.ipMatches .deleteSpam
{
	margin-left: 10px;
}

.ipMatches .ipLog .DateTime
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .xenForm .ctrlUnit.spamControls dt
	{
		width: 100%;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .spamUserInfo .avatar
	{
		display: none;
	}
	
	.Responsive .xenForm .ctrlUnit.spamControls dd
	{
		padding-left: 0;
	}
}
';
}
