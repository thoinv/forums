<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.xenOverlay.lightBox
{
	width: 95%;
	max-width: none;
}

	.xenOverlay.lightBox .formOverlay
	{
		padding: 0;
		border: none;
		border-radius: 10px;
		background: none;
	}
	
		.xenOverlay.lightBox #LbUpper,
		.xenOverlay.lightBox #LbLower
		{
			' . XenForo_Template_Helper_Core::styleProperty('formOverlay.background') . '
		}
		
		.Touch .xenOverlay.lightBox #LbUpper,
		.Touch .xenOverlay.lightBox #LbLower
		{
			background-color: ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('formOverlay.background-color')
)) . ';
		}
		
		.xenOverlay.lightBox #LbUpper
		{
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}
		
		.xenOverlay.lightBox #LbLower
		{
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
		}

.lightBox a
{
	cursor: pointer;
}

.lightBox a.close
{
	right: -15px;
	top: -15px;
}
		
/* -------------- */

.lightBox .userInfo
{
	overflow: hidden; zoom: 1;
	padding: 10px;
	padding-bottom: 5px;
}

.lightBox .avatar
{
	float: left;
}

	.lightBox .avatar img
	{
		width: 36px;
		height: 36px;
		border-color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		border-radius: 0;
	}
	
.lightBox .userText
{
	margin-left: 47px;
}

.lightBox .userTextUpper,
.lightBox .userTextLower
{
	overflow: hidden; zoom: 1;
}

	.lightBox .userTextUpper
	{
		line-height: 25px;
		font-size: 15pt;
	}

		.lightBox #LbUsername
		{
			float: left;
		}
		
		.lightBox .gadgets
		{
			float: right;
			overflow: hidden; zoom: 1;
		}
		
			.lightBox .gadgets a
			{
				float: left;
				margin-left: 3px;
				display: block;
				width: 25px;
				height: 25px;
				background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/lightbox-sprite.png\') no-repeat;
				outline: 0 none;
			}
			
				.lightBox .gadgets a span
				{
					display: none;
				}
				
				.lightBox .gadgets a.OverlayCloser
				{
					background-position: -25px 0;
				}
		
	.lightBox .userTextLower
	{
		font-size: 11px;
		margin-top: 2px;
	}
	
		.lightBox #LbDateTime
		{
			float: left;
		}
		
		.lightBox #LbContentLink
		{
			float: right;
		}
		
/* -------------- */

.lightBox .imageContainer
{
	clear: both;
	position: relative;
	min-height: 40px;
	border: 1px solid black;
	border-width: 1px 0;
	text-align: center;
	background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/lightbox-pinstripes.png\');
}

.Touch .lightBox .imageContainer
{
	background-color: ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('formOverlay.background-color')
)) . ';
	overflow: hidden;
}

	.lightBox .LbImg
	{
		visibility: hidden;
		position: absolute;
	}
	
	.lightBox .imageContainer .imageCount
	{
		position: absolute;
		bottom: 0px;
		right: 0px;
		margin: 5px;
		padding: 2px 5px;
		font-size: 11px;
		background: rgba(0,0,0, 0.15);
		border-radius: 3px;
		font-weight: bold;
	}
		
	/* -------------- */
	
	.lightBox .imageNav
	{
		position: absolute;
		top: 0;
		height: 100%;
		width: 50px;
		display: block;
		text-align: center;
	}
	
		.lightBox .imageNav .ctrl
		{
			position: absolute;
			left: 0;
			top: 50%;
			
			display: block;
			width: 50px;
			height: 50px;
			padding: 0px;
			margin-top: -25px;
			
			overflow: hidden;
			text-indent: 9999px;
			
			border-radius: 5px;
			
			background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/lightbox-sprite.png\') no-repeat;
		}
		
		.lightBox .imageNav#LbPrev { left: 0; }
		
		.lightBox .imageNav#LbNext { right: 0; }
		
			';
if ($pageIsRtl)
{
$__output .= '
				/* swap around in RTL */
				.lightBox .imageNav#LbPrev .ctrl { background-position: 0 -75px; }
				.lightBox .imageNav#LbNext .ctrl { background-position: 0 -25px; }
			
				.lightBox .imageNav#LbPrev:hover .ctrl,
				.Touch .lightBox .imageNav#LbPrev .ctrl
				{
					background-position: 0 -175px;
				}
			
				.lightBox .imageNav#LbNext:hover .ctrl,
				.Touch .lightBox .imageNav#LbNext .ctrl
				{
					background-position: 0 -125px;
				}

			';
}
else
{
$__output .= '
				.lightBox .imageNav#LbPrev .ctrl { background-position: 0 -25px; }
				.lightBox .imageNav#LbNext .ctrl { background-position: 0 -75px; }
				
				.lightBox .imageNav#LbPrev:hover .ctrl,
				.Touch .lightBox .imageNav#LbPrev .ctrl
				{
					background-position: 0 -125px;
				}
			
				.lightBox .imageNav#LbNext:hover .ctrl,
				.Touch .lightBox .imageNav#LbNext .ctrl
				{
					background-position: 0 -175px;
				}
			';
}
$__output .= '
			
		/* IE6 */
		.lightBox .imageNav .ctrl
		{
			_border: none !important;
			_overflow: visible !important;
			_text-indent: 0px !important;
			_width: auto !important;
			_height: auto !important;
		}
		
/* -------------- */

.lightBox .nav
{
	clear: both;
	padding: 10px;
	padding-top: 5px;
	font-size: 11px;
}

.lightBox .URL
{
	clear: both;
}
		
/* -------------- */

';
$thumbHeight = '';
$thumbHeight .= '65';
$__output .= '

.lightBox .thumbsContainer
{
	background: rgba(0,0,0, 0.25);
	
	/*padding: 4px 5px;
	border-radius: 5px;
	position: relative;*/
	
	overflow: hidden; zoom: 1;
	position: relative;
	height: ' . ($thumbHeight + 2) . 'px;
	padding: 1px;
}

.Touch .lightBox .thumbsContainer
{
	background-color: rgb(0,0,0);
}

	.lightBox #LbThumbs
	{
		position: absolute;
		left: 0;
		width: 20000em;
	}

		.lightBox #LbThumbs li
		{
			float: left;
			padding: 1px;
			margin-left: 1px;
		}
		
		.lightBox #LbThumbs li#LbThumbTemplate
		{
			display: none;
		}
	
			.lightBox #LbThumbs a 
			{
				display: block;
				width: ' . htmlspecialchars($thumbHeight, ENT_QUOTES, 'UTF-8') . 'px;
				height: ' . htmlspecialchars($thumbHeight, ENT_QUOTES, 'UTF-8') . 'px;
				overflow: hidden;
				position: relative;
			}
			
				.lightBox #LbThumbs img
				{
					display: block;
					position: absolute;
					visibility: hidden;
				}
			
	.lightBox #LbReveal
	{
		display: none;
		border: 1px solid white;
		width: ' . ($thumbHeight + 2) . 'px;
		height: ' . ($thumbHeight + 2) . 'px;
		position: absolute;
		top: 0;
	}';
