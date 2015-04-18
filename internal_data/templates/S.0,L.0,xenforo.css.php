<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '/*
 * YUI reset-fonts.css
 *
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
version: 2.7.0
*/
html{color:#000;background:#FFF;}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,button,textarea,p,blockquote,th,td{margin:0;padding:0;}table{border-collapse:collapse;border-spacing:0;}fieldset,img{border:0;}address,caption,cite,code,dfn,em,strong,th,var,optgroup{font-style:inherit;font-weight:inherit;}del,ins{text-decoration:none;}li{list-style:none;}caption,th{text-align:left;}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;}q:before,q:after{content:\'\';}abbr,acronym{border:0;font-variant:normal;}sup{vertical-align:baseline;}sub{vertical-align:baseline;}legend{color:#000;}input,button,textarea,select,optgroup,option{font-family:inherit;font-size:inherit;font-style:inherit;font-weight:inherit;}input,button,textarea,select{*font-size:100%;}body{font:13px/1.231 arial,helvetica,clean,sans-serif;*font-size:small;*font:x-small;}select,input,button,textarea,button{font:99% arial,helvetica,clean,sans-serif;}table{font-size:inherit;font:100%;}pre,code,kbd,samp,tt{font-family:monospace;*font-size:108%;line-height:100%;}

/*
 * Firefox broken image placeholder support.
 *
http://lab.gmtplusone.com/image-placeholder/
*/ 
img:-moz-broken, img:-moz-user-disabled { -moz-force-broken-image-icon: 1; }
img:-moz-broken:not([width]), img:-moz-user-disabled:not([width]) { width: 50px; }
img:-moz-broken:not([height]), img:-moz-user-disabled:not([height]) { height: 50px; }';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

/*
 * XenForo Core CSS
 *
 */

html
{
	' . XenForo_Template_Helper_Core::styleProperty('html') . '
	overflow-y: scroll !important;
}

body
{
	-webkit-text-size-adjust: 100%;
	-moz-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
	text-size-adjust: 100%;

	' . XenForo_Template_Helper_Core::styleProperty('body') . '
}

/* counteract the word-wrap setting in \'body\' */
pre, textarea
{
	word-wrap: normal;
}

[dir=auto] { rtl-raw.text-align: ' . (($pageIsRtl) ? ('right') : ('left')) . '; }

a:link,
a:visited
{
	' . XenForo_Template_Helper_Core::styleProperty('link') . '
}

	a[href]:hover
	{
		' . XenForo_Template_Helper_Core::styleProperty('linkHover') . '
	}
	
	a:hover
	{
		_text-decoration: underline;
	}
	
	a.noOutline
	{
		outline: 0 none;
	}
	
	.emCtrl,
	.messageContent a
	{
		border-radius: 5px;
	}
	
		.emCtrl:hover,
		.emCtrl:focus,
		.ugc a:hover,
		.ugc a:focus
		{
			/*position: relative;
			top: -1px;*/
			text-decoration: none;
			box-shadow: 5px 5px 7px #CCCCCC;
			outline: 0 none;
		}
		
			.emCtrl:active,
			.ugc a:active
			{
				position: relative;
				top: 1px;
				box-shadow: 2px 2px 7px #CCCCCC;
				outline: 0 none;
			}

	.ugc a:link,
	.ugc a:visited
	{
		' . XenForo_Template_Helper_Core::styleProperty('ugcLink') . '
	}
	
		.ugc a:hover,
		.ugc a:focus
		{
			' . XenForo_Template_Helper_Core::styleProperty('ugcLinkHover') . '
		}
		
img.mceSmilie,
img.mceSmilieSprite
{
	vertical-align: text-bottom;
	margin: 0 1px;
}
		
/** title bar **/

.titleBar
{
	margin-bottom: 10px;
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.titleBar'
)) . '

.titleBar h1
{
	' . XenForo_Template_Helper_Core::styleProperty('h1') . '
}

	.titleBar h1 em
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . ';
	}
		
	.titleBar h1 .Popup
	{
		float: left;
	}

#pageDescription
{
	' . XenForo_Template_Helper_Core::styleProperty('pageDescription') . '
}

.topCtrl
{
	float: right;
}
	
	.topCtrl h2
	{
		font-size: 12pt;
	}
		
/** images **/

img
{
	-ms-interpolation-mode: bicubic;
}

a.avatar 
{ 
	*cursor: pointer; /* IE7 refuses to do this */ 
} 

.avatar img,
.avatar .img,
.avatarCropper
{
	' . XenForo_Template_Helper_Core::styleProperty('avatar') . '
}

.avatar.plainImage img,
.avatar.plainImage .img
{
	border: none;
	border-radius: 0;
	padding: 0;
	background-position: left top;
}

	.avatar .img
	{
		display: block;
		background-repeat: no-repeat;
		background-position: 2px 2px;
		text-indent: 1000px;
		overflow: hidden;
		white-space: nowrap;
		word-wrap: normal;
	}

	.avatar .img.s { width: 48px;  height: 48px;  }
	.avatar .img.m { width: 96px;  height: 96px;  }
	.avatar .img.l { width: 192px; height: 192px; }

.avatarCropper
{
	width: 192px;
	height: 192px;
	direction: ltr;
}

.avatarCropper a,
.avatarCropper span,
.avatarCropper label
{
	overflow: hidden;
	position: relative;
	display: block;
	width: 192px;
	height: 192px;
}

.avatarCropper img
{
	padding: 0;
	border: none;
	border-radius: 0;

	position: relative;
	display: block;
}

.avatarScaler img
{
	max-width: 192px;
	_width: 192px;
}

/* ***************************** */

body .dimmed, body a.dimmed, body .dimmed a { color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . '; }
body .muted, body a.muted, body .muted a { color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . '; }
body .faint, body a.faint, body .faint a { color: ' . XenForo_Template_Helper_Core::styleProperty('faintTextColor') . '; }

.highlight { font-weight: bold; }

.concealed,
.concealed a,
.cloaked,
.cloaked a
{
	text-decoration: inherit !important;
	color: inherit !important;
	*clear:expression( style.color = parentNode.currentStyle.color, style.clear = "none", 0);
}

a.concealed:hover,
.concealed a:hover
{
	text-decoration: underline !important;
}

/* ***************************** */

.xenTooltip
{
	' . XenForo_Template_Helper_Core::styleProperty('tooltip') . '
}

.xenTooltip a,
.xenTooltip a:hover
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('tooltip.color') . ';
	text-decoration: underline;
}

	.xenTooltip .arrow
	{
		' . XenForo_Template_Helper_Core::styleProperty('tooltipArrow') . '
		left: ' . (XenForo_Template_Helper_Core::styleProperty('tooltipArrow.border-top-width') + 3) . 'px;
		
		/* Hide from IE6 */
		_display: none;
	}

	.xenTooltip.flipped .arrow
	{
		left: auto;
		right: ' . (XenForo_Template_Helper_Core::styleProperty('tooltipArrow.border-top-width') + 3) . 'px;
	}

.xenTooltip.statusTip
{
	/* Generated by XenForo.StatusTooltip JavaScript */
	' . XenForo_Template_Helper_Core::styleProperty('statusTooltip') . '
}

	.xenTooltip.statusTip .arrow
	{
		' . XenForo_Template_Helper_Core::styleProperty('statusTooltipArrow') . '
	}
			
.xenTooltip.iconTip { margin-left: -6px; }
.xenTooltip.iconTip.flipped { margin-left: 7px; }

/* ***************************** */

#PreviewTooltip
{
	display: none;
}

.xenPreviewTooltip
{
	' . XenForo_Template_Helper_Core::styleProperty('previewTooltip') . '
	
	display: none;	
	z-index: 15000;
	cursor: default;
	
	border-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('previewTooltip.border-color'),
'1' => '0.5'
)) . ';
}

	.xenPreviewTooltip .arrow
	{
		' . XenForo_Template_Helper_Core::styleProperty('previewTooltipArrowOuter') . '
		
		_display: none;
	}
	
		.xenPreviewTooltip .arrow span
		{
			' . XenForo_Template_Helper_Core::styleProperty('previewTooltipArrowInner') . '
		}

	.xenPreviewTooltip .section,
	.xenPreviewTooltip .sectionMain,
	.xenPreviewTooltip .primaryContent,
	.xenPreviewTooltip .secondaryContent
	{
		margin: 0;
	}
	
		.xenPreviewTooltip .previewContent
		{
			overflow: hidden; zoom: 1;
			min-height: 1em;
		}

/* ***************************** */

.importantMessage
{
	margin: 10px 0;
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDarker') . ';
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	text-align: center;
	padding: 5px;
	border-radius: 5px;
	border: solid 1px ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}

.importantMessage a
{
	font-weight: bold;
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDarker') . ';
}



/* ***************************** */

';
$__compilerVar2 = '';
$__compilerVar2 .= '.section
{
	' . XenForo_Template_Helper_Core::styleProperty('section') . '
}

.sectionMain
{
	' . XenForo_Template_Helper_Core::styleProperty('sectionMain') . '
}

.heading,
.xenForm .formHeader
{
	' . XenForo_Template_Helper_Core::styleProperty('heading') . '
}

	.heading a { color: ' . XenForo_Template_Helper_Core::styleProperty('heading.color') . '; }

.subHeading
{
	' . XenForo_Template_Helper_Core::styleProperty('subHeading') . '
}

	.subHeading a { color: ' . XenForo_Template_Helper_Core::styleProperty('subHeading.color') . '; }

.textHeading,
.xenForm .sectionHeader
{
	' . XenForo_Template_Helper_Core::styleProperty('textHeading') . '
}

.xenForm .sectionHeader,
.xenForm .formHeader
{
	margin: 10px 0;
}

.primaryContent > .textHeading:first-child,
.secondaryContent > .textHeading:first-child
{
	margin-top: 0;
}

.larger.textHeading,
.xenForm .sectionHeader
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	font-size: 11pt;
	margin-bottom: 6px;
}

	.larger.textHeading a,
	.xenForm .sectionHeader a
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	}

.primaryContent
{
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent') . '
}

	.primaryContent a
	{
		' . XenForo_Template_Helper_Core::styleProperty('primaryContentLink') . '
	}

.secondaryContent
{
	' . XenForo_Template_Helper_Core::styleProperty('secondaryContent') . '
}

	.secondaryContent a
	{
		' . XenForo_Template_Helper_Core::styleProperty('secondaryContentLink') . '
	}

.sectionFooter
{
	overflow: hidden; zoom: 1;
	' . XenForo_Template_Helper_Core::styleProperty('sectionFooter') . '
}

	.sectionFooter a { color: ' . XenForo_Template_Helper_Core::styleProperty('sectionFooter.color') . '; }

	.sectionFooter .left
	{
		float: left;
	}

	.sectionFooter .right
	{
		float: right;
	}

/* used for section footers with central buttons, esp. in report viewing */

.actionList
{
	text-align: center;
}

/* left-right aligned options */

.opposedOptions
{
	overflow: hidden; zoom: 1;
}
	
	.opposedOptions .left
	{
		float: left;
	}
	
	.opposedOptions .right
	{
		float: right;
	}';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

';
$__compilerVar3 = '';
$__compilerVar3 .= '.columns
{
	overflow: hidden; zoom: 1;
}

	.columns .columnContainer
	{
		float: left;
	}
	
		.columns .columnContainer .column
		{
			margin-left: 3px;
		}
		
		.columns .columnContainer:first-child .column
		{
			margin-left: 0;
		}

.c50_50 .c1,
.c50_50 .c2 { width: 49.99%; }

.c70_30 .c1 { width: 70%; }
.c70_30 .c2 { width: 29.99%; }

.c60_40 .c1 { width: 60%; }
.c60_40 .c2 { width: 39.99%; }

.c40_30_30 .c1 { width: 40%; }
.c40_30_30 .c2,
.c40_30_30 .c3 { width: 29.99%; }

.c50_25_25 .c1 { width: 50%; }
.c50_25_25 .c2,
.c50_25_25 .c3 { width: 25%; }';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '

';
$__compilerVar4 = '';
$__compilerVar4 .= '/* ***************************** */
/* Basic Tabs */

.tabs
{
	' . XenForo_Template_Helper_Core::styleProperty('tabsContainer') . '
	
	display: table;
	width: 100%;
	*width: auto;
	box-sizing: border-box;
}

.tabs li
{
	float: left;
}

.tabs li a,
.tabs.noLinks li
{
	' . XenForo_Template_Helper_Core::styleProperty('tab') . '
}

.tabs li:hover a,
.tabs.noLinks li:hover
{
	' . XenForo_Template_Helper_Core::styleProperty('tabHover') . '		
}

.tabs li.active a,
.tabs.noLinks li.active
{
	' . XenForo_Template_Helper_Core::styleProperty('tabActive') . '
}

/* Tabs inside forms */

.xenForm .tabs,
.xenFormTabs
{
	padding: 5px ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitEdgeSpacer') . ' 0;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar4 .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .tabs li
	{
		float: none;
	}

	.Responsive .tabs li a,
	.Responsive .tabs.noLinks li
	{
		display: block;
	}
}
';
}
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '

';
$__compilerVar5 = '';
$__compilerVar5 .= '/* ***************************** */
/* Popup Menus */

.Popup
{
	position: relative;
}

	.Popup.inline
	{
		display: inline;
	}
	
/** Popup menu trigger **/

.Popup .arrowWidget
{
	/* circle-arrow-down */
	' . XenForo_Template_Helper_Core::styleProperty('popupArrowClosed') . '
}

.PopupOpen .arrowWidget
{
	/* circle-arrow-up */
	' . XenForo_Template_Helper_Core::styleProperty('popupArrowOpen') . '
}

.Popup .PopupControl,
.Popup.PopupContainerControl
{
	display: inline-block;
	cursor: pointer;
}

	.Popup .PopupControl:hover,
	.Popup.PopupContainerControl:hover
	{
		' . XenForo_Template_Helper_Core::styleProperty('popupControlClosedHover') . '
	}

	.Popup .PopupControl:focus,
	.Popup .PopupControl:active,
	.Popup.PopupContainerControl:focus,
	.Popup.PopupContainerControl:active
	{
		outline: 0;
	}
	
	.Popup .PopupControl.PopupOpen,
	.Popup.PopupContainerControl.PopupOpen
	{
		' . XenForo_Template_Helper_Core::styleProperty('popupControl') . '
	}
	
	.Popup .PopupControl.BottomControl.PopupOpen,
	.Popup.PopupContainerControl.BottomControl.PopupOpen
	{
		border-top-left-radius: ' . XenForo_Template_Helper_Core::styleProperty('popupControl.border-bottom-left-radius') . ';
		border-top-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('popupControl.border-bottom-right-radius') . ';
		border-bottom-left-radius: ' . XenForo_Template_Helper_Core::styleProperty('popupControl.border-top-left-radius') . ';
		border-bottom-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('popupControl.border-top-left-radius') . ';
	}
		
		.Popup .PopupControl.PopupOpen:hover,
		.Popup.PopupContainerControl.PopupOpen:hover
		{
			text-decoration: none;
		}
		
/** Menu body **/

.Menu
{
	/*background-color: ' . XenForo_Template_Helper_Core::styleProperty('textCtrlBackground') . ';*/
	
	' . XenForo_Template_Helper_Core::styleProperty('menu') . '
	
	min-width: ' . XenForo_Template_Helper_Core::styleProperty('menuMinWidth') . ';
	*width: ' . XenForo_Template_Helper_Core::styleProperty('menuMinWidth') . ';
	
	/* makes menus actually work... */
	position: absolute;
	z-index: 7500;
	display: none;
}

/* allow menus to operate when JS is disabled */
.Popup:hover .Menu
{
	display: block;
}

.Popup:hover .Menu.JsOnly
{
	display: none;
}

.Menu.BottomControl
{
	border-top-width: 1px;
	border-bottom-width: 3px;
	box-shadow: 0px 0px 0px transparent;
}

	.Menu > li > a,
	.Menu .menuRow
	{
		display: block;
	}
		
/* Menu header */

.Menu .menuHeader
{
	overflow: hidden; zoom: 1;
}

.Menu .menuHeader h3
{
	' . XenForo_Template_Helper_Core::styleProperty('menuHeaderTitle') . '
}

.Menu .menuHeader .muted
{
	' . XenForo_Template_Helper_Core::styleProperty('menuHeaderSubtitle') . '
}

/* Standard menu sections */

.Menu .primaryContent
{
	background-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color'),
'1' => '0.96'
)) . ';
}

.Menu .secondaryContent
{
	background-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('secondaryContent.background-color'),
'1' => '0.96'
)) . ';
}

.Menu .sectionFooter
{
	background-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('sectionFooter.background-color'),
'1' => '0.9'
)) . ';
}

/* Links lists */

.Menu .blockLinksList
{	
	max-height: 400px;
	overflow: auto;
}

/* form popups */

.formPopup
{
	width: 250px;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

	.formPopup form,
	.formPopup .ctrlUnit
	{
		margin: 5px auto;
	}
	
		.formPopup .ctrlUnit
		{
		}
		
	.formPopup .textCtrl,
	.formPopup .button
	{
		width: 232px;
	}
		
	.formPopup .ctrlUnit > dt label
	{
		display: block;
		margin-bottom: 2px;
	}
		
	.formPopup .submitUnit dd
	{
		text-align: center;
	}
	
		.formPopup .ctrlUnit > dd .explain
		{
			margin: 2px 0 0;
		}
	
	.formPopup .primaryControls
	{
		zoom: 1;
		white-space: nowrap;
		word-wrap: normal;
		padding: 0 5px;
	}
	
		.formPopup .primaryControls input.textCtrl
		{
			margin-bottom: 0;
		}
	
	.formPopup .secondaryControls
	{
		padding: 0 5px;
	}
	
		.formPopup .controlsWrapper
		{
			background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
			border-radius: 5px;
			padding: 5px;
			margin: 5px 0;
			font-size: 11px;
		}

			.formPopup .controlsWrapper .textCtrl
			{
				width: 222px;
			}
	
	.formPopup .advSearchLink
	{
		display: block;
		text-align: center;
		padding: 5px;
		font-size: 11px;
		border-radius: 5px;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
	}
	
		.formPopup .advSearchLink:hover
		{
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			text-decoration: none;
		}';
$__output .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '

';
$__compilerVar6 = '';
$__compilerVar6 .= '/* All overlays must have this */
.xenOverlay
{
	display: none;
	z-index: 10000;
	width: 90%;
	box-sizing: border-box;
	max-width: ' . (XenForo_Template_Helper_Core::styleProperty('overlayFormWidth') + 90) . 'px; /*calc: 90=overlay padding+borders*/
}

	.xenOverlay .overlayScroll
	{
		max-height: 400px;
		overflow: auto;
	}
	
	.xenOverlay .overlayScroll.ltr
	{
		direction: ltr;
	}
	
	.xenOverlay .overlayScroll .sortable-placeholder
	{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	}

.overlayOnly /* needs a bit more specificity over regular buttons */
{
	display: none !important;
}

	.xenOverlay .overlayOnly
	{
		display: block !important;
	}
	
	.xenOverlay input.overlayOnly,
	.xenOverlay button.overlayOnly,
	.xenOverlay a.overlayOnly
	{
		display: inline !important;
	}
	
	.xenOverlay a.close 
	{
		' . XenForo_Template_Helper_Core::styleProperty('overlayCloseControl') . '
	}
	
.xenOverlay .nonOverlayOnly
{
	display: none !important;
}

/* Generic form overlays */

.xenOverlay .formOverlay
{
	' . XenForo_Template_Helper_Core::styleProperty('formOverlay') . '
	margin: 0;
}

	.Touch .xenOverlay .formOverlay
	{
		background: ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('formOverlay.background-color')
)) . ';
		box-shadow: none;
	}

	.xenOverlay .formOverlay a.muted,
	.xenOverlay .formOverlay .muted a
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}

	.xenOverlay .formOverlay .heading
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayHeading') . '
	}

	.xenOverlay .formOverlay .subHeading
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlaySubHeading') . '
	}
	
	.xenOverlay .formOverlay .textHeading
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextHeading') . '
	}
	
	.xenOverlay .formOverlay > p
	{
		padding-left: ' . XenForo_Template_Helper_Core::styleProperty('formOverlayHeading.padding-left') . ';
		padding-right: ' . XenForo_Template_Helper_Core::styleProperty('formOverlayHeading.padding-right') . ';
	}

	.xenOverlay .formOverlay .textCtrl
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrl') . '
	}

	.xenOverlay .formOverlay .textCtrl option
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrl.background') . '
	}

	.xenOverlay .formOverlay .textCtrl:focus,
	.xenOverlay .formOverlay .textCtrl.Focus
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlFocus') . '
	}

	.xenOverlay .formOverlay .textCtrl:focus option
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlFocus.background') . '
	}

	.xenOverlay .formOverlay .textCtrl.disabled
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlDisabled') . '
	}

	.xenOverlay .formOverlay .textCtrl.disabled option
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlDisabled.background') . '
	}

	.xenOverlay .formOverlay .textCtrl.prompt
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlPrompt') . '
	}

	.xenOverlay .formOverlay .ctrlUnit > dt dfn,
	.xenOverlay .formOverlay .ctrlUnit > dd li .hint,
	.xenOverlay .formOverlay .ctrlUnit > dd .explain
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayLabelHint') . '
	}

	.xenOverlay .formOverlay a
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayLink') . '
	}

		.xenOverlay .formOverlay a.button
		{
			' . XenForo_Template_Helper_Core::styleProperty('formOverlayButton') . '
		}

	.xenOverlay .formOverlay .avatar img,
	.xenOverlay .formOverlay .avatar .img,
	.xenOverlay .formOverlay .avatarCropper
	{
		background-color: transparent;
	}
	
	/* tabs in form overlay */
	
	.xenOverlay .formOverlay .tabs /* the actual tabs */
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTabs') . '
	}

		.xenOverlay .formOverlay .tabs a
		{
			' . XenForo_Template_Helper_Core::styleProperty('formOverlayTab') . '
		}
		
			.xenOverlay .formOverlay .tabs a:hover
			{
				' . XenForo_Template_Helper_Core::styleProperty('formOverlayTabHover') . '
			}
			
			.xenOverlay .formOverlay .tabs .active a
			{
				' . XenForo_Template_Helper_Core::styleProperty('formOverlayTabActive') . '
			}
			
	.xenOverlay .formOverlay .tabPanel /* panels switched with the tab controls */
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTabPanel') . '
	}


/* Generic overlays */

.xenOverlay .section,
.xenOverlay .sectionMain
{
	' . XenForo_Template_Helper_Core::styleProperty('overlaySection') . '
	
	border-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('overlaySection.border-color'),
'1' => '0.5'
)) . ';
}

	.Touch .xenOverlay .section,
	.Touch .xenOverlay .sectionMain
	{
		border-color: ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('overlaySection.border-color')
)) . ';
		box-shadow: none;
	}

.xenOverlay > .section,
.xenOverlay > .sectionMain
{
	background: none;
	margin: 0;
}

	.xenOverlay .section .heading,
	.xenOverlay .sectionMain .heading
	{
		border-radius: 0;
		margin-bottom: 0;
	}

	.xenOverlay .section .subHeading,
	.xenOverlay .sectionMain .subHeading
	{
		margin-top: 0;
	}

	.xenOverlay .section .sectionFooter,
	.xenOverlay .sectionMain .sectionFooter
	{
		overflow: hidden; zoom: 1;
	}
		
		.xenOverlay .sectionFooter .buttonContainer
		{
			line-height: 31px;
		}
	
		.xenOverlay .sectionFooter .button,
		.xenOverlay .sectionFooter .buttonContainer
		{
			min-width: 75px;
			*min-width: 0;
			float: right;
			margin-left: 5px;
		}
		
			.xenOverlay .sectionFooter .buttonContainer .button
			{
				float: none;
				margin-left: 0;
			}

/* The AJAX progress indicator overlay */

#AjaxProgress.xenOverlay
{
	width: 100%;
	max-width: none;
	overflow: hidden; zoom: 1;
}

	#AjaxProgress.xenOverlay .content
	{
		' . XenForo_Template_Helper_Core::styleProperty('ajaxProgress') . '
	}
	
		.Touch #AjaxProgress.xenOverlay .content
		{
			background-color: ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ajaxProgress.background-color')
)) . ';
		}

/* Timed message for redirects */

.xenOverlay.timedMessage
{
	' . XenForo_Template_Helper_Core::styleProperty('redirectMessage') . '
}

	.xenOverlay.timedMessage .content
	{
		' . XenForo_Template_Helper_Core::styleProperty('redirectMessageContent') . '
	}
	
/* Growl-style message */

#StackAlerts
{
	position: fixed;
	bottom: 70px;
	left: 35px;
	z-index: 9999; /* in front of the expose mask */
}

	#StackAlerts .stackAlert
	{
		position: relative;
		width: 270px;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
		border-radius: 5px;
		box-shadow: 2px 2px 5px 0 rgba(0,0,0, 0.4);
		margin-top: 5px;
	}

		#StackAlerts .stackAlertContent
		{
			padding: 10px;
			padding-right: 30px;
			border-radius: 4px;
			border: solid 2px ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			background: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryLightest'),
'1' => '0.9'
)) . ';
			font-size: 11px;
			font-weight: bold;
		}
	
/* Inline Editor */

.xenOverlay .section .messageContainer
{
	padding: 0;
}

.xenOverlay .section .messageContainer .mceLayout
{
	border: none;	
}

.xenOverlay .section .messageContainer tr.mceFirst td.mceFirst
{
	border-top: none;
}

.xenOverlay .section .messageContainer tr.mceLast td.mceLast,
.xenOverlay .section .messageContaner tr.mceLast td.mceIframeContainer
{
	border-bottom: none;
}

.xenOverlay .section .textCtrl.MessageEditor,
.xenOverlay .section .mceLayout,
.xenOverlay .section .bbCodeEditorContainer textarea
{
	width: 100% !important;
	min-height: 260px;
	_height: 260px;
	box-sizing: border-box;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar6 .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .xenOverlay
	{
		width: 100%;
	}
	
	.Responsive .xenOverlay .formOverlay,
	.Responsive .xenOverlay .section,
	.Responsive .xenOverlay .sectionMain
	{
		border-radius: 10px;
		border-width: 10px;
	}
	
	.Responsive .xenOverlay a.close 
	{
		top: 0;
		right: 0;
		width: 28px;
		height: 28px;
		background-size: 100% 100%;
	}
}
';
}
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '

';
$__compilerVar7 = '';
$__compilerVar7 .= '.alerts .alertGroup
{
	margin-bottom: 20px;
}

.alerts .primaryContent
{
	overflow: hidden; zoom: 1;
	padding: 5px;
}

.alerts .avatar
{
	float: left;
}

.alerts .avatar img
{
	width: 32px;
	height: 32px;
}

.alerts .alertText
{
	margin-left: 32px;
	padding: 0 5px;
}

.alerts h3
{
	display: inline;
}

.alerts h3 .subject
{
	font-weight: bold;
}

.alerts .timeRow
{
	font-size: 11px;
	margin-top: 5px;
}
	
	.alerts .newIcon,
	.alertsPopup .newIcon
	{
		display: inline-block;
		vertical-align: baseline;
		margin-left: 2px;
		width: 11px;
		height: 11px;
		background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -144px -40px;
	}';
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '

';
$__compilerVar8 = '';
$__compilerVar8 .= '/** Data tables **/
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
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '

';
$__compilerVar9 = '';
$__compilerVar9 .= '.memberListItem
{
	' . XenForo_Template_Helper_Core::styleProperty('memberListItem') . '
}

	.memberListItem .avatar,
	.memberListItem .icon
	{
		' . XenForo_Template_Helper_Core::styleProperty('memberListItemAvatar') . '
	}
	
	/* ----------------------- */
	
	.memberListItem .extra
	{
		' . XenForo_Template_Helper_Core::styleProperty('memberListItemExtra') . '
	}

		.memberListItem .extra .DateTime
		{
			display: block;
		}

		.memberListItem .extra .bigNumber
		{
			font-size: 250%;
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		}
	
	.memberListItem .member
	{
		' . XenForo_Template_Helper_Core::styleProperty('memberListItemMember') . '
	}
	
	/* ----------------------- */
		
		.memberListItem h3.username
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberListItemUsername') . '
		}
			
		.memberListItem .username.guest
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberListItemGuest') . '
		}
	
	/* ----------------------- */
		
		.memberListItem .userInfo
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberListItemUserInfo') . '
		}
		
			.memberListItem .userBlurb
			{
			}
		
				.memberListItem .userBlurb .userTitle
				{
					' . XenForo_Template_Helper_Core::styleProperty('memberListItemUserTitle') . '
				}

			.memberListItem .userStats dt,
			.memberListItem .userStats dd
			{
				white-space: nowrap;
			}
				
	
	/* ----------------------- */
		
		.memberListItem .member .contentInfo
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberListItemContent') . '
		}
	
	/* ----------------------- */
	
	
/* extended member list items have a fixed 200px right column */

.memberListItem.extended .extra
{
	width: ' . XenForo_Template_Helper_Core::styleProperty('memberListItemExtendedWidth') . ';
}

.memberListItem.extended .member
{
	margin-right: ' . (XenForo_Template_Helper_Core::styleProperty('memberListItemExtendedWidth') + 10) . 'px;
}';
$__output .= $__compilerVar9;
unset($__compilerVar9);
$__output .= '

';
$__compilerVar10 = '';
$__compilerVar10 .= '/* Styling for hover-dismiss controls */

.DismissParent .DismissCtrl
{
	position: absolute;
	top: 12px;
	right: 5px;
	
	display: block;
	background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -80px 0;
	color: white;
	width: 15px;
	height: 15px;
	line-height: 15px;
	text-align: center;
	
	opacity: .4;
	-webkit-transition: opacity 0.3s ease-in-out;
	-moz-transition: opacity 0.3s ease-in-out;
	transition: opacity 0.3s ease-in-out;
	
	font-size: 10px;
	
	overflow: hidden;
	white-space: nowrap;
	text-indent: 20000em;
	
	cursor: pointer;
}

	.DismissParent:hover .DismissCtrl,
	.Touch .DismissParent .DismissCtrl
	{
		opacity: 1;
	}
	
		.DismissParent:hover .DismissCtrl:hover
		{
			background-position: -96px 0;
		}
		
			.DismissParent:hover .DismissCtrl:active
			{
				background-position: -112px 0;
			}';
$__output .= $__compilerVar10;
unset($__compilerVar10);
$__output .= '

';
$__compilerVar11 = '';
$__compilerVar11 .= '/* ***************************** */
/* un-reset, mostly from YUI */

.baseHtml h1
	{ font-size:138.5%; } 
.baseHtml h2
	{ font-size:123.1%; }
.baseHtml h3
	{ font-size:108%; } 
.baseHtml h1, .baseHtml h2, .baseHtml h3
	{  margin:1em 0; } 
.baseHtml h1, .baseHtml h2, .baseHtml h3, .baseHtml h4, .baseHtml h5, .baseHtml h6, .baseHtml strong
	{ font-weight:bold; } 
.baseHtml abbr, .baseHtml acronym
	{ border-bottom:1px dotted #000; cursor:help; }  
.baseHtml em
	{  font-style:italic; } 
.baseHtml blockquote, .baseHtml ul, .baseHtml ol, .baseHtml dl
	{ margin:1em; } 
.baseHtml ol, .baseHtml ul, .baseHtml dl
	{ margin-left:3em; margin-right:0; } 
.baseHtml ul ul, .baseHtml ul ol, .baseHtml ul dl, .baseHtml ol ul, .baseHtml ol ol, .baseHtml ol dl, .baseHtml dl ul, .baseHtml dl ol, .baseHtml dl dl
	{ margin-top:0; margin-bottom:0; }
.baseHtml ol li
	{ list-style: decimal outside; } 
.baseHtml ul li
	{ list-style: disc outside; } 
.baseHtml ol ul li, .baseHtml ul ul li
	{ list-style-type: circle; }
.baseHtml ol ol ul li, .baseHtml ol ul ul li, .baseHtml ul ol ul li, .baseHtml ul ul ul li
	{ list-style-type: square; }
.baseHtml ul ol li, .baseHtml ul ol ol li, .baseHtml ol ul ol li
	{ list-style: decimal outside; }
.baseHtml dl dd
	{ margin-left:1em; } 
.baseHtml th, .baseHtml td
	{ border:1px solid #000; padding:.5em; } 
.baseHtml th
	{ font-weight:bold; text-align:center; } 
.baseHtml caption
	{ margin-bottom:.5em; text-align:center; } 
.baseHtml p, .baseHtml pre, .baseHtml fieldset, .baseHtml table
	{ margin-bottom:1em; }';
$__output .= $__compilerVar11;
unset($__compilerVar11);
$__output .= '

';
$__compilerVar12 = '';
$__compilerVar12 .= '.PageNav
{
	' . XenForo_Template_Helper_Core::styleProperty('pageNav') . '
}

	.PageNav .hidden
	{
		display: none;
	}
	
	.PageNav .pageNavHeader,
	.PageNav a,
	.PageNav .scrollable
	{
		display: block;
		float: left;
		margin-right: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') . ';
	}
	
	.PageNav .pageNavHeader
	{
		padding: 1px 0;
	}

	.PageNav a
	{		
		' . XenForo_Template_Helper_Core::styleProperty('pageNavItem') . '
		
		
		width: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkWidth') . ';
	}
	
	/*
		@property "pageNavPage";

		@property "/pageNavPage";
		*/
	
		.PageNav a[rel=start]
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkWidth') . ' !important;
		}

		.PageNav a.text
		{
			width: auto !important;
			padding: 0 4px;
		}
	
		.PageNav a
		{
		}
		
		.PageNav a.currentPage
		{
			' . XenForo_Template_Helper_Core::styleProperty('pageNavCurrentPage') . '
		}

		a.PageNavPrev,
		a.PageNavNext
		{
			' . XenForo_Template_Helper_Core::styleProperty('pageNavScroller') . '
			
			width: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkWidth') . ' !important;
		}
		
		.PageNav a:hover,
		.PageNav a:focus
		{
			' . XenForo_Template_Helper_Core::styleProperty('pageNavPageHover') . '
		}
		
	.PageNav a.distinct
	{
		margin-left: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') . ';
	}
			
	.PageNav .scrollable
	{
		position: relative;
		overflow: hidden;
		width: ' . ((XenForo_Template_Helper_Core::styleProperty('pageNavLinkWidth') * 5) + (XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') * 4) + (XenForo_Template_Helper_Core::styleProperty('pageNavItem.border-width') * 10)) . 'px; /* width of 5 page numbers plus their margin & border */
		height: 18px; /* only needs to be approximate */
	}
	
		.PageNav .scrollable .items
		{
			display: block;
			width: 20000em; /* contains scrolling items, should be huge */
			position: absolute;
			display: block;
		}
		
/** Edge cases - large numbers of digits **/

.PageNav .gt999 
{
	font-size: 9px;
	letter-spacing: -0.05em; 
}

.PageNav.pn5 a { width: ' . (5 * 4 + 9) . 'px; } .PageNav.pn5 .scrollable { width: ' . ((5 * 4 + 9) * 5 + (XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') * 4) + (XenForo_Template_Helper_Core::styleProperty('pageNavItem.border-width') * 10)) . 'px; }
.PageNav.pn6 a { width: ' . (6 * 4 + 9) . 'px; } .PageNav.pn6 .scrollable { width: ' . ((6 * 4 + 9) * 5 + (XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') * 4) + (XenForo_Template_Helper_Core::styleProperty('pageNavItem.border-width') * 10)) . 'px; }
.PageNav.pn7 a { width: ' . (7 * 4 + 9) . 'px; } .PageNav.pn7 .scrollable { width: ' . ((7 * 4 + 9) * 5 + (XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') * 4) + (XenForo_Template_Helper_Core::styleProperty('pageNavItem.border-width') * 10)) . 'px; }

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar12 .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .PageNav .pageNavHeader
	{
		display: none;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .PageNav .unreadLink
	{
		display: none;
	}
}
';
}
$__output .= $__compilerVar12;
unset($__compilerVar12);
$__output .= '

/* ***************************** */
/* DL Name-Value Pairs */

.pairs dt,
.pairsInline dt,
.pairsRows dt,
.pairsColumns dt,
.pairsJustified dt
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

.pairsRows,
.pairsColumns,
.pairsJustified
{
	line-height: 1.5;
}

.pairsInline dl,
.pairsInline dt,
.pairsInline dd
{
	display: inline;
}

.pairsRows dt,
.pairsRows dd
{
	display: inline-block;
	vertical-align: top;

	*display: inline;
	*margin-right: 1ex;
	*zoom: 1;
}

dl.pairsColumns,
dl.pairsJustified,
.pairsColumns dl,
.pairsJustified dl
{
	overflow: hidden; zoom: 1;
}

.pairsColumns dt,
.pairsColumns dd
{
	float: left;
	width: 48%;
}

.pairsJustified dt
{
	float: left;
	max-width: 100%;
	margin-right: 5px;
}
.pairsJustified dd
{
	float: right;
	text-align: right;
	max-width: 100%
}


/* ***************************** */
/* Lists that put all elements on a single line */

.listInline ul,
.listInline ol,
.listInline li,
.listInline dl,
.listInline dt,
.listInline dd
{
	display: inline;
}

/* intended for use with .listInline, produces \'a, b, c, d\' / \'a * b * c * d\' lists */

.commaImplode li:after,
.commaElements > *:after
{
	content: \', \';
}

.commaImplode li:last-child:after,
.commaElements > *:last-child:after
{
	content: \'\';
}

.bulletImplode li:before
{
	content: \'\\2022\\a0\';
}

.bulletImplode li:first-child:before
{
	content: \'\';
}

/* Three column list display */

.threeColumnList
{
	overflow: hidden; zoom: 1;
}

.threeColumnList li
{
	float: left;
	width: 32%;
	margin: 2px 1% 2px 0;
}

/* ***************************** */
/* Preview tooltips (threads etc.) */

.previewTooltip
{
}
		
	.previewTooltip .avatar
	{
		float: left;
	}
	
	.previewTooltip .text
	{
		margin-left: 64px;
	}
	
		.previewTooltip blockquote
		{
			' . XenForo_Template_Helper_Core::styleProperty('messageText') . '
			
			font-size: 10pt;
			max-height: 150px;
			overflow: hidden;
		}
	
		.previewTooltip .posterDate
		{
			font-size: 11px;
			padding-top: 5px;
			border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			margin-top: 5px;
		}

/* ***************************** */
/* List of block links */

.blockLinksList
{
	' . XenForo_Template_Helper_Core::styleProperty('blockLinksList') . '
}
		
	.blockLinksList a,
	.blockLinksList label
	{
		' . XenForo_Template_Helper_Core::styleProperty('blockLinksListItem') . '
	}
	
		.blockLinksList a:hover,
		.blockLinksList a:focus,
		.blockLinksList li.kbSelect a,
		.blockLinksList label:hover,
		.blockLinksList label:focus,
		.blockLinksList li.kbSelect label
		{
			' . XenForo_Template_Helper_Core::styleProperty('blockLinksListItemHover') . '
		}
		
		.blockLinksList a:active,
		.blockLinksList a.selected,
		.blockLinksList label:active,
		.blockLinksList label.selected
		{
			' . XenForo_Template_Helper_Core::styleProperty('blockLinksListItemActive') . '
		}
		
		.blockLinksList a.selected,
		.blockLinksList label.selected
		{
			' . XenForo_Template_Helper_Core::styleProperty('blockLinksListItemSelected') . '
		}
		
		.blockLinksList span.depthPad
		{
			display: block;
		}

.blockLinksList .itemCount
{
	' . XenForo_Template_Helper_Core::styleProperty('alertBalloon') . '

	float: right;
	position: relative;
	right: 0;
	top: -1px;
}

	.blockLinksList .itemCount.Zero
	{
		display: none;
	}

/* ***************************** */
/* Normally-indented nested lists */

.indentList ul,
.indentList ol
{
	margin-left: 2em;
}

/* ***************************** */
/* AJAX progress image */

.InProgress
{
	background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif\') no-repeat right center;
}

/* ***************************** */
/* Hidden inline upload iframe */

.hiddenIframe
{
	display: block;
	width: 500px;
	height: 300px;
}

/* ***************************** */
/* Exception display */

.traceHtml { font-size:11px; font-family:calibri, verdana, arial, sans-serif; }
.traceHtml .function { color:rgb(180,80,80); font-weight:normal; }
.traceHtml .file { font-weight:normal; }
.traceHtml .shade { color:rgb(128,128,128); }
.traceHtml .link { font-weight:bold; }

/* ***************************** */
/* Indenting for options */

._depth0 { padding-left:  0em; }
._depth1 { padding-left:  2em; }
._depth2 { padding-left:  4em; }
._depth3 { padding-left:  6em; }
._depth4 { padding-left:  8em; }
._depth5 { padding-left: 10em; }
._depth6 { padding-left: 12em; }
._depth7 { padding-left: 14em; }
._depth8 { padding-left: 16em; }
._depth9 { padding-left: 18em; }

';
$__compilerVar13 = '';
$__compilerVar13 .= '.xenOverlay .errorOverlay
{
	color: white;
	padding: 25px;
	border-radius: 20px;	
	border: 20px solid rgba(0,0,0, 0.25);
	
	background: rgba(0,0,0, 0.75);
}

	.xenOverlay .errorOverlay .heading
	{
		padding: 5px 10px;
		font-weight: bold;
		font-size: 12pt;
		background: rgb(180,0,0);
		color: white;
		margin-bottom: 10px;
		border-radius: 5px;
		border: 1px solid rgb(100,0,0);
	}

	.xenOverlay .errorOverlay li
	{
		line-height: 2;
	}
	
	.xenOverlay .errorOverlay .exceptionMessage
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}

/*** inline errors ***/

.formValidationInlineError
{
	display: none;
	position: absolute;
	z-index: 5000;
	background-color: white;
	border: 1px solid rgb(180,0,0);
	color: rgb(180,0,0);
	box-shadow: 2px 2px 10px #999;
	border-radius: 3px;
	padding: 2px 5px;
	font-size: 11px;
	width: 175px;
	min-height: 2.5em;
	_height: 2.5em;
	word-wrap: break-word;
}

	.formValidationInlineError.inlineError
	{
		position: static;
		width: auto;
		min-height: 0;
	}

/** Block errors **/

.errorPanel
{
	margin: 10px 0 20px;
	color: rgb(180,0,0);
	background: rgb(255, 235, 235);
	border-radius: 5px;
	border: 1px solid rgb(180,0,0);
}

	.errorPanel .errorHeading
	{
		margin: .75em;
		font-weight: bold;
		font-size: 12pt;
	}
	
	.errorPanel .errors
	{
		margin: .75em 2em;
		display: block;
		line-height: 1.5;
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar13 .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .formValidationInlineError
	{
		position: static;
		width: auto;
		min-height: auto;
	}
}
';
}
$__output .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '

/* Undo some nasties */

input[type=search]
{
	-webkit-appearance: textfield;
	-webkit-box-sizing: content-box;
}

/* ignored content hiding */

.ignored { display: none !important; }

/* Misc */

.floatLeft { float: left; }
.floatRight { float: right; }

.ltr { direction: ltr; }

/* Square-cropped thumbs */

.SquareThumb
{
	position: relative;
	display: block;
	overflow: hidden;
	padding: 0;
	direction: ltr;
	
	/* individual instances can override this size */
	width: 48px;
	height: 48px;
}

.SquareThumb img
{
	position: relative;
	display: block;
}

';
$__compilerVar14 = '';
$__compilerVar14 .= '/* Basic, common, non-templated BB codes */

.bbCodeImage
{
	max-width: 100%;
}

.bbCodeImageFullSize
{
	position: absolute;
	z-index: 50000;
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '
}

.bbCodeStrike
{
	text-decoration: line-through;
}

img.mceSmilie,
img.mceSmilieSprite
{
	vertical-align: text-bottom;
	margin: 0 1px;
}

';
$__compilerVar15 = '';
$__compilerVar15 .= '/* smilie sprite classes */
';
if ($smilieSprites)
{
foreach ($smilieSprites AS $smilieId => $smilieSprite)
{
if ($smilieSprite['sprite_css'])
{
$__compilerVar15 .= '
img.mceSmilieSprite.mceSmilie' . htmlspecialchars($smilieId, ENT_QUOTES, 'UTF-8') . '
{
	' . $smilieSprite['sprite_css'] . '
}
';
}
}
}
$__compilerVar14 .= $__compilerVar15;
unset($__compilerVar15);
$__output .= $__compilerVar14;
unset($__compilerVar14);
$__output .= '

.visibleResponsiveFull { display: inherit !important; }

.visibleResponsiveWide,
.visibleResponsiveMedium,
.visibleResponsiveNarrow { display: none !important; }

.hiddenResponsiveFull { display: none !important; } 

.hiddenResponsiveWide,
.hiddenResponsiveMedium,
.hiddenResponsiveNarrow { display: inherit !important; }

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .visibleResponsiveFull { display: none !important; }
	
	.Responsive .hiddenResponsiveFull { display: inherit !important; }
}

@media (min-width:' . (XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') + 1) . 'px) AND (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .visibleResponsiveWide { display: inherit !important; }
	
	.Responsive .hiddenResponsiveWide { display: none !important; }
}

@media (min-width:' . (XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') + 1) . 'px) AND (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .visibleResponsiveMedium { display: inherit !important; }
	
	.Responsive .hiddenResponsiveMedium { display: none !important; }
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .visibleResponsiveNarrow { display: inherit !important; }
	
	.Responsive .hiddenResponsiveNarrow { display: none !important; }
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .xenTooltip.statusTip
	{
		width: auto;
	}
	
	.Responsive .xenPreviewTooltip
	{
		box-sizing: border-box;
		width: auto;
		max-width: 100%;
	}
	
	.Responsive .xenPreviewTooltip .arrow
	{
		display: none;
	}
	
	.Responsive .previewTooltip .avatar
	{
		display: none;
	}
	
	.Responsive .previewTooltip .text
	{
		margin-left: 0;
	}
}
';
}
$__output .= '

';
$__compilerVar16 = '';
$__output .= $this->callTemplateHook('xenforo_css_extra', $__compilerVar16, array());
unset($__compilerVar16);
