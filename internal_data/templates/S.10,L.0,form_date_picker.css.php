<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#calroot
{
	margin-top: -1px;
	width: 198px;
	padding: 2px;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
	font-size: 11px;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	border-radius: 5px;
	box-shadow: 0 0 15px #666;
	z-index: 7500;
}

#calhead
{	
	padding: 2px 0;
	height: 22px;
} 

	#caltitle {
		font-size: 11pt;
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
		float: left;
		text-align: center;
		width: 155px;
		line-height: 20px;
	}
	
	#calnext, #calprev {
		display: block;
		width: 20px;
		height: 20px;
		font-size: 11pt;
		line-height: 20px;
		text-align: center;
		float: left;
		cursor: pointer;
	}

	#calnext {
		float: right;
	}

	#calprev.caldisabled, #calnext.caldisabled {
		visibility: hidden;	
	}

#caldays {
	height: 14px;
	border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
}

	#caldays span {
		display: block;
		float: left;
		width: 28px;
		text-align: center;
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	}

#calweeks {
	margin-top: 4px;
}

.calweek {
	clear: left;
	height: 22px;
}

	.calweek a {
		display: block;
		float: left;
		width: 27px;
		height: 20px;
		text-decoration: none;
		font-size: 11px;
		margin-left: 1px;
		text-align: center;
		line-height: 20px;
		border-radius: 3px;
	} 
	
		.calweek a:hover, .calfocus {
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
		}

a.caloff {
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';		
}

a.caloff:hover {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';		
}

a.caldisabled {
	background-color: #efefef !important;
	color: #ccc	!important;
	cursor: default;
}

#caltoday {
	font-weight: bold;
}

#calcurrent {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
}';
