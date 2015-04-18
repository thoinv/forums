<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.upgrade
{
	overflow: hidden; zoom: 1;
}

.upgradeMain
{
	margin-right: 160px;
}
	.upgradeMain .title
	{
		font-size: 11pt;
	}

	.upgradeMain .description
	{
		font-size: 11px;
	}

.upgradeForm
{
	float: right;
	width: 150px;
	font-size: 11px;
}
	
	.upgradeForm .button
	{
		margin-top: 5px;
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .upgrade
	{
		display: table;
		width: 100%;
		box-sizing: border-box;
	}
	
	.Responsive .upgradeForm
	{
		display: table-footer-group;
		float: none;
		width: auto;
	}
	
		.Responsive .upgradeForm .cost
		{
			float: left;
			margin-top: 5px;
		}
		
		.Responsive .upgradeForm .button
		{
			margin-top: 0;
			float: right;
		}
	
	.Responsive .upgradeMain
	{
		margin: 0;
		display: table-cell;
		padding-bottom: 5px;
	}
}
';
}
