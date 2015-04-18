<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#pageNodeContent
{
	padding: 10px 0;
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '#pageNodeContent'
)) . '

	#pageNodeContent .bottomContent
	{
		clear: both;
		padding-top: 10px;
	}
	
	' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '#pageNodeContent .bottomContent'
)) . '

	#pageNodeContent .pageCounter
	{
		margin-top: 10px;
		float: right;
		font-size: 11px;
	}
	
		#pageNodeContent .pageCounter dd
		{
			font-weight: normal;
		}
			
/* ------------------- */

#pageNodeNavigation
{
	float: left;
	margin-right: 10px;
	margin-bottom: 10px;	
	font-size: 11px;
	
	padding: 5px;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-radius: 5px;
	box-shadow: 2px 2px 5px rgba(0,0,0, 0.2);
}

	#pageNodeNavigation li
	{
		_display: inline; /* whitespace bug */
	}
			
/* ------------------- */

.pageStats dt
{
	margin-left: 1em;
}';
