<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.footer .pageContent
{
	' . XenForo_Template_Helper_Core::styleProperty('footer') . '
}
	
	.footer a,
	.footer a:visited
	{
		' . XenForo_Template_Helper_Core::styleProperty('footerLink') . '
	}
	
		.footer a:hover,
		.footer a:active
		{
			' . XenForo_Template_Helper_Core::styleProperty('footerLinkHover') . '
		}

	.footer .choosers
	{
		' . XenForo_Template_Helper_Core::styleProperty('footerLeftBlock') . '
	}
	
		.footer .choosers dt
		{
			display: none;
		}
		
		.footer .choosers dd
		{
			float: left;
			';
if ($pageIsRtl)
{
$__output .= '*display: inline; *float: none; *zoom: 1;';
}
$__output .= '
		}
		
	.footerLinks
	{
		' . XenForo_Template_Helper_Core::styleProperty('footerRightBlock') . '
	}
	
		.footerLinks li
		{
			float: left;
			';
if ($pageIsRtl)
{
$__output .= '*display: inline; *float: none; *zoom: 1;';
}
$__output .= '
		}
		
			.footerLinks a.globalFeed
			{
				width: 14px;
				height: 14px;
				display: block;
				text-indent: -9999px;
				white-space: nowrap;
				background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -112px -16px;
				padding: 0;
				margin: 5px;
			}

.footerLegal .pageContent
{
	font-size: 11px;
	overflow: hidden; zoom: 1;
	padding: 5px 5px 15px;
	text-align: center;
}
	
	#copyright
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . ';
		float: left;
	}
	
	#legal
	{
		float: right;
	}
	
		#legal li
		{
			float: left;
			';
if ($pageIsRtl)
{
$__output .= '*display: inline; *float: none; *zoom: 1;';
}
$__output .= '
			margin-left: 10px;
		}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .footerLinks a.globalFeed,
	.Responsive .footerLinks a.topLink,
	.Responsive .footerLinks a.homeLink
	{
		display: none;
	}

	.Responsive .footerLegal .debugInfo
	{
		clear: both;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive #copyright span
	{
		display: none;
	}
}
';
}
