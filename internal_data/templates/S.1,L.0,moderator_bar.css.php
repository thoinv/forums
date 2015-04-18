<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#moderatorBar
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDarker') . ';
	border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';	
	font-size: 11px;
}

/*#moderatorBar
{
	box-shadow: 0 0 5px ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
	width: 100%;
	position: fixed;
	top: 0px;
	z-index: 100;
}

body
{
	padding-top: 25px;
}*/

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '#moderatorBar'
)) . '

#moderatorBar .pageContent
{
	padding: 2px 0;
	overflow: auto;
}

#moderatorBar a
{
	display: inline-block;
	padding: 2px 10px;
	border-radius: 3px;
}

#moderatorBar a,
#moderatorBar .itemCount
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
}

	#moderatorBar a:hover
	{
		text-decoration: none;
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDark') . ';
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	}

/* TODO: maybe sort out the vertical alignment of the counters so they they are properly centered */

#moderatorBar .itemLabel,
#moderatorBar .itemCount
{
	display: inline-block;
	height: 16px;
	line-height: 16px;
}

#moderatorBar .itemCount
{	
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryDark') . ';
	padding-left: 6px;
	padding-right: 6px;
	
	text-align: center;
	
	font-weight: bold;
	
	border-radius: 2px;
	text-shadow: none;
}

	#moderatorBar .itemCount.alert
	{
		background: #e03030;
		color: white;
		box-shadow: 2px 2px 5px rgba(0,0,0, 0.25);
	}
	
#moderatorBar .adminLink
{
	float: right;
}

#moderatorBar .permissionTest,
#moderatorBar .permissionTest:hover
{
	background: #e03030;
	color: white;
	box-shadow: 2px 2px 5px rgba(0,0,0, 0.25);
	font-weight: bold;
}';
