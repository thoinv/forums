<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#header
{
	' . XenForo_Template_Helper_Core::styleProperty('header') . '
}

@media print { 
	/* your print styles go here */
	#header, #footer, #menu { display: none; } 
	body { font: 12pt georgia,serif; } 
	h1 { font-size: 18pt; } 
	h2 { font-size: 16pt; color: #000; }
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '#header .pageWidth .pageContent'
)) . '

	#logo
	{
		display: block;
		float: left;
		line-height: ' . (XenForo_Template_Helper_Core::styleProperty('headerLogoHeight') - 4) . 'px;
		*line-height: ' . XenForo_Template_Helper_Core::styleProperty('headerLogoHeight') . ';
		height: ' . XenForo_Template_Helper_Core::styleProperty('headerLogoHeight') . ';
		max-width: 100%;
		vertical-align: middle;
	}

		/* IE6/7 vertical align fix */
		#logo span
		{
			*display: inline-block;
			*height: 100%;
		}

		#logo a:hover
		{
			text-decoration: none;
		}

		#logo img
		{
			vertical-align: middle;
			max-width: 100%;
		}

	#visitorInfo
	{
		float: right;
		min-width: 250px;
		_width: 250px;
		overflow: hidden; zoom: 1;
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
		padding: 5px;
		border-radius: 5px;
		margin: 10px 0;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryDarker') . ';
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDarker') . ';
	}

		#visitorInfo .avatar
		{
			float: left;
			display: block;
		}

			#visitorInfo .avatar .img
			{
				border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
			}

		#visitorInfo .username
		{
			font-size: 18px;
			text-shadow: 1px 1px 10px white;
			color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDarker') . ';
			white-space: nowrap;
			word-wrap: normal;
		}

		#alerts
		{
			zoom: 1;
		}

		#alerts #alertMessages
		{
			padding-left: 5px;
		}

		#alerts li.alertItem
		{
			font-size: 11px;
		}

			#alerts .label
			{
				color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDarker') . ';
			}';
