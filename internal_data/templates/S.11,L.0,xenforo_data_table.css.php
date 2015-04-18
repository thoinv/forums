<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/** Data tables **/
.similarThreads {
    margin: 0px 30px 0px 30px;
    padding: 0px 15px 5px 15px;
}

.similarThreadsThreadView {
    margin: 0px;
    padding: 0px 15px 5px 15px;
}

.blueLine {
    border-top: 1px solid #D7EDFC;
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . '){
    .similarThreads {
        display: none;
    }
    .similarThreadsThreadView {
        display: none;
    }
    .blueLine {
        display: none;
    }
}

table.dataTable
{
	width: 100%;
	_width: 99.5%;
	margin: 10px 0;
}

.dataTable caption
{
	' . XenForo_Template_Helper_Core::styleProperty('heading') . '
}

.dataTable tr.dataRow td
{
	border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	padding: 5px 10px;
	word-wrap: break-word;
}

.dataTable tr.dataRow td.secondary
{
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ' url("' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png") repeat-x top;
}

.dataTable tr.dataRow th
{
	background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ' url("' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png") repeat-x top;
	border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDarker') . ';
	font-size: 11px;
	padding: 5px 10px;
}

	.dataTable tr.dataRow th a
	{
		color: inherit;
		text-decoration: underline;
	}

.dataTable .dataRow .dataOptions
{
	text-align: right;
	white-space: nowrap;
	word-wrap: normal;
	padding: 0;
}

.dataTable .dataRow .important,
.dataTable .dataRow.important
{
	font-weight: bold;
}

.dataTable .dataRow .dataOptions a.secondaryContent
{
	display: inline-block;
	border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-bottom: none;
	padding: 7px 10px 6px;
	font-size: 11px;
}

	.dataTable .dataRow .dataOptions a.secondaryContent:hover
	{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		text-decoration: none;
	}

	.dataTable .dataRow .delete
	{
		padding: 0px;
		width: 26px;
		border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background') . '
	}	
				
		.dataTable .dataRow .delete a
		{
			display: block;
			background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/permissions/deny.png\') no-repeat center center;
			cursor: pointer;
		
			padding: 5px;
			width: 16px;
			height: 16px;
			
			overflow: hidden;
			white-space: nowrap;
			text-indent: -1000px;
		}';
