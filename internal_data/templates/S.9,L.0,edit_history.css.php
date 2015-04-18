<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.diffList li
{
	padding: 0 ' . XenForo_Template_Helper_Core::styleProperty('subHeading.padding-left') . ' 0 ' . XenForo_Template_Helper_Core::styleProperty('subHeading.padding-right') . ';
	line-height: 1.5;
}

	.diffList .diff_d
	{
		background-color: #FAE4E4;
		color: #882020;
		border: 1px solid #C86060;
	}

	.diffList .diff_d + .diff_i,
	.diffList .diff_i + .diff_d
	{
		border-top: none;
	}

	.diffList .diff_i
	{
		background-color: #E4FBE4;
		color: #208820;
		border: 1px solid #60C860;
	}

table.diffVersions
{
	margin-bottom: 0px;
}

	.diffVersions .old
	{
		width: 50px;
	}

	.diffVersions .new
	{
		width: 50px;
	}

	.diffVersions .date
	{
		width: 250px;
	}

	.diffVersions .dateCurrent
	{
		font-style: italic;
	}

.historyText textarea
{
	width: 100%;
	box-sizing: border-box;
	*width: 95%;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:400px)
{
	table.diffVersions .viewVersion
	{
		display: none;
	}
}
';
}
