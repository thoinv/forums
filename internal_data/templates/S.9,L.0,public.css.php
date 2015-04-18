<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '#header
{
	' . XenForo_Template_Helper_Core::styleProperty('header') . '
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
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

';
$__compilerVar2 = '';
$__compilerVar2 .= '@CHARSET "UTF-8";

/* --- footer.css --- */

	
#footer {
	clear: both;
	min-height: 100px;
	padding: 20px 0 25px;
}

.footer {
	background: #303135 url(styles/vxf/footer_bg.png) repeat-x top center;
	clear: both;
	margin-top: 10px;
}

.footercolumns {
	display: inline;
	margin-left: 0;
	margin-right: 0;
}

.footer-top-left {
	float: left;
	width: 42%;
	margin-top: 18px;
	padding-left: 10px;
}

.footer-top-left .block-top {
}

.footer-top-left .block-bottom {
	float: left;
	margin-right: 15px;
	border-bottom: 1px dotted #c8c8c8;
	padding-bottom: 5px;
	margin-bottom: 5px;
}

.footer-top-left .block-bottom span {
	color: #fff;
	display: block;
	font-size: 12px;
	text-transform: uppercase;
	margin-bottom: 5px;
}

.footer-top-left .block-bottom p {
	color: #888;
	font-size: 12px;
	margin-bottom: 0px;
	padding: 4px 0;
}

.footer-top-left .connect-face p {
	font-size: 16px;
	color: #fff;
	text-transform: uppercase;
	font-weight: 400;
	font-style: normal;
	float: left;
	margin-top: 9px;
}

.connect-face ul li {
	float: left;
	padding-left: 10px;
	display: inline;
}

.fotter-contact {
	float: left;
	width: 13%;
	min-height: 174px;
	border-left: 1px dotted #888;
	margin-top: 20px;
	padding-left: 21px;
	padding-right: 16px;
}

#footer h3 {
	color: #fff;
	font-family: \'MyriadProRegular\';
	font-size: 16px;
	text-transform: uppercase;
	font-weight: 400;
	padding-bottom: 11px;
}

.fotter-contact p {
	color: #646464;
	font-size: 12px;
	padding-bottom: 5px;
	margin-bottom: 0px;
}

.fotter-contact a {
	font-size: 11px;
	color: #0daaac;
	text-decoration: none;
	padding-bottom: 8px;
	display: inline-block;
}

#footer .four.columns.column {
	float: left;
	width: 12%;
	min-height: 174px;
	border-left: 1px dotted #888;
	margin-top: 20px;
	padding-left: 20px;
	padding-right: 15px;
}

#footer .column ul li {
}

#footer .column a {
	color: #888;
	font-size: 12px;
	text-decoration: none;
}

#footer .column a:hover {
        color: #bbb;
}

#footer .three.columns.column {
	float: left;
	width: 15%;
	min-height: 174px;
	border-left: 1px dotted #888;
	margin-top: 20px;
	margin-bottom: 10px;
	padding-left: 20px;
	padding-right: 15px;
}
.footer .pageContent
{
	font-size: 11px;
color: #a5cae4;
overflow: hidden;
zoom: 1;

}
	
	.footer a,
	.footer a:visited
	{
		color: #a5cae4;
padding: 5px;
display: block;

	}
	
		.footer a:hover,
		.footer a:active
		{
			color: #d7edfc;

		}

	.footer .choosers
	{
		padding-left: 5px;
float: left;
overflow: hidden;
zoom: 1;

	}
	
		.footer .choosers dt
		{
			display: none;
		}
		
		.footer .choosers dd
		{
			float: left;
			
		}
		
	.footerLinks
	{
		padding-right: 5px;
float: right;
overflow: hidden;
zoom: 1;

	}
	
		.footerLinks li
		{
			float: left;
			
		}
		
			.footerLinks a.globalFeed
			{
				width: 14px;
				height: 14px;
				display: block;
				text-indent: -9999px;
				white-space: nowrap;
				background: url(\'styles/vxf/xenforo/xenforo-ui-sprite.png\') no-repeat -112px -16px;
				padding: 0;
				margin: 5px;
			}
.footerLegal {
	background: #1d1e22;
}

.footerLegal .pageContent
{
	font-size: 12px;
	overflow: hidden; zoom: 1;
	padding: 10px;
	text-align: center;
}

.footerLegal .pageContent a:link {
	color: #d7edfc;
}
	
	#copyright
	{
		color: rgb(100,100,100);
		float: left;
	}
	
	#legal
	{
		float: right;
	}
	
		#legal li
		{
			display: inline-block;
			
			margin-left: 10px;
		}


@media (max-width:800px)
{
	.footer-top-left {
		width: 100% !important;
	}
	.fotter-contact, #footer .four, #footer .three {
		width: 25% !important;
	}	
	.fotter-contact {
		border-left: none !important;
	}
}

@media (max-width:610px)
{
	.pageWidth {
		width: auto !important;
		margin: 0 !important;
		min-width: 0 !important;
	}
	#copyright, #legal {
		float: none;
	}
}

@media (max-width:480px)
{
	.fotter-contact, #footer .four, #footer .three {
		width: 100% !important;
		border-left: none !important;
	}
	#copyright, #legal {
		float: none !important;
	}	
	#termsRule, #toTop {
		display: none !important;
	}
}';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

';
$__compilerVar3 = '';
$__compilerVar3 .= '@CHARSET "UTF-8";

/* --- breadcrumb.css --- */

.breadBoxTop,
.breadBoxBottom
{
	padding: 10px 0;
overflow: hidden;
zoom: 1;
clear: both;
-webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;

}

.breadBoxTop
{
}

.breadBoxTop .topCtrl
{
	margin-left: 5px;
float: right;
line-height: 24px;

}

.breadcrumb
{
	font-size: 11px;
background: rgb(250, 250, 250) url(\'styles/vxf/xenforo/gradients/category-23px-light.png\') repeat-x top;
border: 1px solid rgb(217, 217, 217);
overflow: hidden;
zoom: 1;
max-width: 100%;
height: 24px;

}

.breadcrumb.showAll
{
	height: auto;
}

.breadcrumb .boardTitle
{
	display: none;

}

.breadcrumb .crust
{
	display: block;
float: left;
position: relative;
zoom: 1;
max-width: 50%;

}

.breadcrumb .crust a.crumb
{
	cursor: pointer;
	color: #888;
text-decoration: none;
background-color: rgb(250, 250, 250);
padding: 0 10px 0 18px;
border-bottom-width: 1px;
border-bottom-color: rgb(200,200,200);
outline: 0 none;
-moz-outline-style: 0 none;
display: block;
line-height: 24px;
_border-bottom: none;

}

	.breadcrumb .crust a.crumb > span
	{
		display: block;
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
		max-width: 100%;
	}

	.breadcrumb .crust:first-child a.crumb
	{
		padding-left: 10px;
-webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px; -khtml-border-top-left-radius: 4px; border-top-left-radius: 4px;
-webkit-border-bottom-left-radius: 4px; -moz-border-radius-bottomleft: 4px; -khtml-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px;

	}
	
	.breadcrumb .crust:last-child a.crumb
	{
		
	}

.breadcrumb .crust .arrow
{
	border: 12px solid transparent;
border-right: 1px none black;
border-left-color: rgb(200,200,200);
-moz-border-right-colors: rgb(200,200,200);
display: block;
position: absolute;
right: -12px;
top: 0px;
z-index: 50;
width: 0px;
height: 0px;

}

.breadcrumb .crust .arrow span
{
	border: 12px solid transparent;
border-right: 1px none black;
border-left-color: rgb(250, 250, 250);
-moz-border-right-colors: rgb(250, 250, 250);
display: block;
position: absolute;
left: -13px;
top: -12px;
z-index: 51;
white-space: nowrap;
overflow: hidden;
text-indent: 9999px;
width: 0px;
height: 0px;

}

.breadcrumb .crust:hover a.crumb
{
	background-color: rgb(237, 237, 237);

}

.breadcrumb .crust:hover .arrow span
{
	border-left-color: rgb(237, 237, 237);
}

	.breadcrumb .crust .arrow
	{
		/* hide from IE6 */
		_display: none;
	}

.breadcrumb .jumpMenuTrigger
{
	background: transparent url(\'styles/vxf/xenforo/xenforo-ui-sprite.png\') no-repeat 0 0;
margin: 5px 5px 6px;
display: block;
float: right;
white-space: nowrap;
text-indent: 9999px;
overflow: hidden;
width: 13px;
height: 13px;

}


@media (max-width:480px)
{
	.Responsive .breadBoxTop.withTopCtrl
	{
		display: table;
		table-layout: fixed;
		width: 100%;
	}

	.Responsive .breadBoxTop.withTopCtrl nav
	{
		display: table-header-group;
	}

	.Responsive .breadBoxTop.withTopCtrl .topCtrl
	{
		display: table-footer-group;
		margin-top: 5px;
		text-align: right;
	}
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar3 .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .breadBoxTop.withTopCtrl
	{
		display: table;
		table-layout: fixed;
		width: 100%;
	}

	.Responsive .breadBoxTop.withTopCtrl nav
	{
		display: table-header-group;
	}

	.Responsive .breadBoxTop.withTopCtrl .topCtrl
	{
		display: table-footer-group;
		margin-top: 5px;
		text-align: right;
	}
}
';
}
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '

';
$__compilerVar4 = '';
$__compilerVar4 .= '@CHARSET "UTF-8";

/* --- navigation.css --- */

#navigation .pageContent
{
	height: 72px;
	margin-left: 200px;
}


#navigation .menuIcon
{
	position: relative;
	font-size:18px;
	width: .9em;
	display: inline-block;
	text-indent: -9999px;
}

#navigation .PopupOpen .menuIcon:before,
#navigation .navLink .menuIcon:before
{
	zoom: 1;
}

#navigation .menuIcon:before
{
	content: "";
	font-size: 18px;
	position: absolute;
	/*top: 0.4em;*/
	top: 0.7em;
	left: 0;
	width: .9em;
	height: 0.125em;
	border-top: 0.375em double currentColor;
	border-bottom: 0.125em solid currentColor;
}

	.navTabs
	{
	font-size: 13px;
	padding: 0 25px;
	text-transform: uppercase;
	height: 55px;
	float: right;
	}
	
		.navTabs .publicTabs
		{
		float: left;
		padding: 10px 0 0 75px;
		
		}
		
		.navTabs .visitorTabs
		{
			float: right;
		}
	
			.navTabs .navTab
			{
				float: left;
				white-space: nowrap;
				word-wrap: normal;
				padding-left: 15px;
				
			}


/* ---------------------------------------- */
/* Links Inside Tabs */

.navTabs .navLink,
.navTabs .SplitCtrl
{
	display: block;
float: left;
vertical-align: text-bottom;
text-align: center;
outline: 0 none;

	
	
	
	height: 35px;
	line-height: 35px;
}

	.navTabs .publicTabs .navLink
	{
		padding: 0 15px;
	}
	
	.navTabs .visitorTabs .navLink
	{
		padding: 0 10px;
	}
	
	.navTabs .navLink:hover
	{
		text-decoration: none;
	}
	
	/* ---------------------------------------- */
	/* unselected tab, popup closed */
	
	.navTabs .navTab.PopupClosed
	{
		position: relative;
	}
	
	.navTabs .navTab.PopupClosed .navLink
	{
		color: #fff;
	}
	
		.navTabs .navTab.PopupClosed:hover
		{
		}
		
			.navTabs .navTab.PopupClosed .navLink:hover
			{
				color: #d7edfc;
			}
		
	.navTabs .navTab.PopupClosed .arrowWidget
	{
		/* circle-arrow-down-light */
		background-position: -64px 0;
	}
	
	.navTabs .navTab.PopupClosed .SplitCtrl
	{
		margin-left: -14px;
		width: 14px;
	}
		
		.navTabs .navTab.PopupClosed:hover .SplitCtrl
		{
			/* nav_menu_gadget, height: 17px 
			background: transparent url(\'styles/vxf/xenforo/xenforo-ui-sprite.png\') no-repeat -128px 10px; */
		}
	
	/* ---------------------------------------- */
	/* selected tab */

	.navTabs .navTab.selected .navLink
	{
		color: #d7edfc;
		padding-top: 2px;
		margin-top: -2px;
background: url(styles/vxf/xenforo/arrow.png) no-repeat bottom center;
padding-bottom: 17px;
z-index: 100;
position: relative;

	}
	
	.navTabs .navTab.selected .SplitCtrl
	{
		display: none;
	}
	
	.navTabs .navTab.selected .arrowWidget
	{
		/* circle-arrow-down */
		background-position: -32px 0;
	}
	
		.navTabs .navTab.selected.PopupOpen .arrowWidget
		{
			/* circle-arrow-up */
			background-position: -16px 0;
		}
	
	/* ---------------------------------------- */
	/* unselected tab, popup open */
	
	.navTabs .navTab.PopupOpen .navLink
	{
	}
	
	
	/* ---------------------------------------- */
	/* selected tab, popup open (account) */
	
	.navTabs .navTab.selected.PopupOpen .navLink
	{
		color: #0F517F;
background-color: #175F92;
-webkit-border-top-left-radius: 3px; -moz-border-radius-topleft: 3px; -khtml-border-top-left-radius: 3px; border-top-left-radius: 3px;
-webkit-border-top-right-radius: 3px; -moz-border-radius-topright: 3px; -khtml-border-top-right-radius: 3px; border-top-right-radius: 3px;
-webkit-border-bottom-right-radius: 0px; -moz-border-radius-bottomright: 0px; -khtml-border-bottom-right-radius: 0px; border-bottom-right-radius: 0px;
-webkit-border-bottom-left-radius: 0px; -moz-border-radius-bottomleft: 0px; -khtml-border-bottom-left-radius: 0px; border-bottom-left-radius: 0px;

	}
	
/* ---------------------------------------- */
/* Second Row */

.navTabs .navTab.selected .tabLinks
{
	background: #185985 url(\'styles/vxf/navbar_bg.png\') no-repeat top;
	
	width: 100%;	
	padding: 0;
	border: none;
	overflow: hidden; zoom: 1;	
	position: absolute;
	left: 0px;	
	top: 56px;
	height: 35px;
	*clear:expression(style.width = document.getElementById(\'navigation\').offsetWidth + \'px\', style.clear = "none", 0);
}

	.navTabs .navTab.selected .blockLinksList
	{
		background: none;
		padding: 0;
		border: none;
		float: right;
		margin-right: 10%;
	}

	.navTabs .navTab.selected .tabLinks .menuHeader
	{
		display: none;
	}
	
	.navTabs .navTab.selected .tabLinks li
	{
		float:left;
		padding: 2px 0;
		text-transform: none;
	}

		.navTabs .navTab.selected .tabLinks li:first-child
		{
			margin-left: 395px;
		}
	
		.navTabs .navTab.selected .tabLinks a
		{
			font-size: 11px;
color: #ffffff;
padding: 1px 10px;
display: block;
text-shadow: 0 0 0 transparent, 0 1px 1px #175F92;

			
			line-height: 29px;
		}
		
			.navTabs .navTab.selected .tabLinks a:hover,
			.navTabs .navTab.selected .tabLinks a:focus
			{
				color: #0F517F;
text-decoration: none;
background-color: #d7edfc;
padding: 0 9px;
border: 1px solid #6cb2e4;
-webkit-border-radius: 5px; -moz-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
text-shadow: 0 0 0 transparent, 1px 1px 0px #f0f7fc;
outline: 0;

				
			}
	
/* ---------------------------------------- */
/* Alert Balloons */
	
.navTabs .navLink .itemCount
{
	font-weight: bold;
font-size: 9px;
color: white;
background-color: #e03030;
padding: 0 2px;
-webkit-border-radius: 2px; -moz-border-radius: 2px; -khtml-border-radius: 2px; border-radius: 2px;
position: absolute;
right: 2px;
top: -12px;
line-height: 16px;
min-width: 12px;
_width: 12px;
text-align: center;
text-shadow: none;
white-space: nowrap;
word-wrap: normal;
-webkit-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); -moz-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); -khtml-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); box-shadow: 2px 2px 5px rgba(0,0,0, 0.25);
height: 16px;

}

	.navTabs .navLink .itemCount .arrow
	{
		border: 3px solid transparent;
border-top-color: #e03030;
border-bottom: 1px none black;
position: absolute;
bottom: -3px;
right: 4px;
line-height: 0px;
text-shadow: none;
_display: none;
/* Hide from IE6 */
width: 0px;
height: 0px;

	}
	
.navTabs .navLink .itemCount.Zero
{
	display: none;
}
	
/* ---------------------------------------- */
/* Account Popup Menu */

.navTabs .navTab.account .navLink
{
	font-weight: bold;
}

#AccountMenu
{
	width: 274px;
}

#AccountMenu .menuHeader
{
	position: relative;
}

	#AccountMenu .menuHeader .avatar
	{
		float: left;
		margin-right: 10px;
	}

	#AccountMenu .menuHeader .visibilityForm
	{
		margin-top: 10px;
		color: #175F92;
	}
	
	#AccountMenu .menuHeader .links .fl
	{
		position: absolute;
		bottom: 10px;
		left: 116px;
	}

	#AccountMenu .menuHeader .links .fr
	{
		position: absolute;
		bottom: 10px;
		right: 10px;
	}
	
#AccountMenu .menuColumns
{
	overflow: hidden; zoom: 1;
	padding: 2px;
}

	#AccountMenu .menuColumns ul
	{
		float: left;
		padding: 0;
		max-height: none;
		overflow: hidden;
	}

		#AccountMenu .menuColumns a,
		#AccountMenu .menuColumns label
		{
			width: 115px;
		}

#AccountMenu .statusPoster textarea
{
	width: 245px;
	margin: 0;
	resize: vertical;
	overflow: hidden;
}

#AccountMenu .statusPoster .submitUnit
{
	margin-top: 5px;
	text-align: right;
}

	#AccountMenu .statusPoster .submitUnit .statusEditorCounter
	{
		float: left;
		line-height: 23px;
		height: 23px;
	}
	
/* ---------------------------------------- */
/* Inbox, Alerts Popups */

.navPopup
{
	width: 260px;
}

.navPopup a:hover,
.navPopup .listItemText a:hover
{
	background: none;
	text-decoration: underline;
}

	.navPopup .menuHeader .InProgress
	{
		float: right;
		display: block;
		width: 20px;
		height: 20px;
	}

.navPopup .listPlaceholder
{
	max-height: 350px;
	overflow: auto;
}

	.navPopup .listPlaceholder ol.secondaryContent
	{
		padding: 0 10px;
	}

		.navPopup .listPlaceholder ol.secondaryContent.Unread
		{
			background-color: rgb(255, 255, 200);
		}

.navPopup .listItem
{
	overflow: hidden; zoom: 1;
	padding: 5px 0;
	border-bottom: 1px solid #d7edfc;
}

.navPopup .listItem:last-child
{
	border-bottom: none;
}

.navPopup .PopupItemLinkActive:hover
{
	margin: 0 -8px;
	padding: 5px 8px;
	-webkit-border-radius: 5px; -moz-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
	background-color: #d7edfc;
	cursor: pointer;
}

.navPopup .avatar
{
	float: left;
}

	.navPopup .avatar img
	{
		width: 32px;
		height: 32px;
	}

.navPopup .listItemText
{
	margin-left: 37px;
}

	.navPopup .listItemText .muted
	{
		font-size: 9px;
	}

	.navPopup .unread .listItemText .title,
	.navPopup .listItemText .subject
	{
		font-weight: bold;
	}

.navPopup .sectionFooter .floatLink
{
	float: right;
}

/* Avatar in visitor tab */
.navTab .accountPopup img
{
    float: left;
    width: 20px;
    height: 20px;
    margin-right: 5px;
    margin-top: 3px;
    border-radius: 2px;
}

/* Firefox fix for avatar in visitor tab */
.navTabs .navTab.account .navLink .accountUsername
{
    display: inline-block;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar4 .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .navTabs
	{
		padding-left: 10px;
		padding-right: 10px;
	}

	.Responsive .withSearch .navTabs .navTab.selected .blockLinksList
	{
		margin-right: 50px;
	}
	.Responsive.hasJs .navTabs:not(.showAll) .publicTabs .navTab:not(.selected):not(.navigationHiddenTabs)
	{
		display: none;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive.hasJs .navTabs:not(.showAll) .publicTabs .navTab:not(.selected):not(.navigationHiddenTabs)
	{
		display: none;
	}
}
';
}
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '

';
$__compilerVar5 = '';
$__compilerVar5 .= '@CHARSET "UTF-8";

#searchBar{
position:relative;
zoom:1;
top:-4px;
float: left;
z-index:52
}
#QuickSearch{
display:block;
margin:1px;
float:left;
-webkit-border-radius:5px;
-moz-border-radius:5px;
-khtml-border-radius:5px;
border-radius:5px;
z-index:7500
}
#QuickSearch
.secondaryControls{display:none}
#QuickSearch.active{}
#QuickSearch .submitUnit
.button{min-width:0}
#QuickSearch
input.button.primary{float:left;width:110px}
#QuickSearch
#commonSearches{float:right}
#QuickSearch #commonSearches
.button{width:24px;padding:0}
#QuickSearch #commonSearches
.arrowWidget{margin-top: -4px}
#QuickSearch
.moreOptions{
display:block;
margin:0 24px 0 110px;
width:auto
}
#QuickSearch .textCtrl{
font-size:13px;
font-family:Calibri,\'Trebuchet MS\',Verdana,Geneva,Arial,Helvetica,sans-serif;
color:#77ADDF;
background-color: #2F536C;
padding:1px;
border:none;1px solid #175F92;
-webkit-border-radius:4px;
-moz-border-radius:4px;-khtml-border-radius:4px;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;-khtml-border-radius:4px;outline:0;margin:1px}#QuickSearch .textCtrl:focus, #QuickSearch
.textCtrl.Focus{background:#0F517F}';
$__output .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '

/** move the header to the top again **/

#headerMover
{
	position: relative;
	zoom: 1;
}

	#headerMover #headerProxy
	{
		' . XenForo_Template_Helper_Core::styleProperty('header.background') . '
		height: ' . (XenForo_Template_Helper_Core::styleProperty('headerLogoHeight') + XenForo_Template_Helper_Core::styleProperty('headerTabHeight') * 2 + 2) . 'px; /* +2 borders */
	}

	#headerMover #header
	{
		width: 100%;
		position: absolute;
		top: 10px;
		left: 0px;
	}


/** Generic page containers **/

.pageWidth
{
	' . XenForo_Template_Helper_Core::styleProperty('pageWidth') . '
}

.NoResponsive body
{
	';
if (XenForo_Template_Helper_Core::styleProperty('nonResponsiveMinWidth'))
{
$__output .= 'min-width: ' . XenForo_Template_Helper_Core::styleProperty('nonResponsiveMinWidth') . ';';
}
$__output .= '
}

#content .pageContent
{
	background-color: #fff;
padding: 10px;
margin-top: 10px;
border: 1px solid rgb(217, 217, 217);
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '#content .pageContent'
)) . '

';
$__compilerVar6 = '';
$__compilerVar6 .= '/* sidebar structural elements */

.mainContainer
{
	 float: left;
	 margin-right: -250px;
 	 margin-bottom: 10px;
	 width: 100%;
}

	.mainContent
	{
		margin-right: 260px;
		margin-top: 10px;
		background: #fff;
		border: 1px solid rgb(217, 217, 217);
		padding: 10px;
	}

.sidebar
{
	float: right;
	' . XenForo_Template_Helper_Core::styleProperty('sidebar') . '
}







/* visitor panel */

.sidebar .visitorPanel
{
	overflow: hidden; zoom: 1;
}

	.sidebar .visitorPanel h2 .muted
	{
		display: none;
	}

	.sidebar .visitorPanel .avatar
	{
		' . XenForo_Template_Helper_Core::styleProperty('visitorPanelAvatar') . '
		
		width: auto;
		height: auto;
	}
	
		.sidebar .visitorPanel .avatar img
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('visitorPanelAvatar.width') . ';
			height: ' . XenForo_Template_Helper_Core::styleProperty('visitorPanelAvatar.height') . ';
		}
	
	.sidebar .visitorPanel .username
	{
		' . XenForo_Template_Helper_Core::styleProperty('visitorPanelUsername') . '
	}
	
	.sidebar .visitorPanel .stats
	{
		' . XenForo_Template_Helper_Core::styleProperty('visitorPanelStats') . '
	}
	
	.sidebar .visitorPanel .stats .pairsJustified
	{
		line-height: normal;
	}













	
/* generic sidebar blocks */
.sidebar .section .secondaryContent
{
	background: #fff;
	border: 1px solid rgb(217, 217, 217);
}
		
.sidebar .section .primaryContent   h3,
.sidebar .section .secondaryContent h3,
.profilePage .mast .section.infoBlock h3
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockHeading') . '
}

.sidebar .section .primaryContent   h3 a,
.sidebar .section .secondaryContent h3 a
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockHeading.font') . '
}

.sidebar .section .secondaryContent .footnote,
.sidebar .section .secondaryContent .minorHeading
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockFootnote') . '
}

	.sidebar .section .secondaryContent .minorHeading a
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockFootnote.color') . ';
	}












/* list of users with 32px avatars, username and user title */

.sidebar .avatarList li
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListItem') . '
}

	.sidebar .avatarList .avatar
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar') . '
		
		width: auto;
		height: auto;
	}
		
	.sidebar .avatarList .avatar img
	{
		width: ' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar.width') . ';
		height: ' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar.height') . ';
	}
	
	.sidebar .avatarList .username
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListUsername') . '
	}
	
	.sidebar .avatarList .userTitle
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListUserTitle') . '
	}









/* list of users */

.sidebar .userList
{
}

	.sidebar .userList .username
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsername') . '
	}

	.sidebar .userList .username.invisible
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsernameInvisible') . '
	}
	
	.sidebar .userList .username.followed
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsernameFollowed') . '
	}

	.sidebar .userList .moreLink
	{
		display: block;
	}
	
	
	
	
/* people you follow online now */

.followedOnline
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsers') . '
}

.followedOnline li
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsersItem') . '
}

	.followedOnline .avatar
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsersAvatar') . '
		
		width: auto;
		height: auto;
	}
	
		.followedOnline .avatar img
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsersAvatar.width') . ';
			height: ' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsersAvatar.height') . ';
		}
	
	
	

	
	
/* call to action */

#SignupButton
{
	' . XenForo_Template_Helper_Core::styleProperty('signupButton') . '
}

	#SignupButton .inner
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonInner') . '
	}
	
	#SignupButton:hover .inner
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonHover') . '
	}
	
	#SignupButton:active
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonActive') . '
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar6 .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .mainContainer
	{
		 float: none;
		 margin-right: 0;
		 width: auto;
	}

		.Responsive .mainContent
		{
			margin-right: 0;
		}
	
	.Responsive .sidebar
	{
		float: none;
		margin: 0 auto;
	}

		.Responsive .sidebar .visitorPanel
		{
			display: none;
		}
}

@media (max-width:340px)
{
	.Responsive .sidebar
	{
		width: 100%;
	}
}
';
}
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '

/** Text used in message bodies **/

.messageText
{
	' . XenForo_Template_Helper_Core::styleProperty('messageText') . '
}

	.messageText img,
	.messageText iframe,
	.messageText object,
	.messageText embed
	{
		max-width: 100%;
	}

/** Link groups and pagenav container **/

.pageNavLinkGroup
{
	display: table;
	*zoom: 1;
	table-layout: fixed;
	box-sizing: border-box;
	
	' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkGroup') . '
}

opera:-o-prefocus, .pageNavLinkGroup
{
	display: block;
	overflow: hidden;
}

	.pageNavLinkGroup:after
	{
		content: ". .";
		display: block;
		word-spacing: 99in;
		overflow: hidden;
		height: 0;
		font-size: 0.13em;
		line-height: 0;
	}

	.pageNavLinkGroup .linkGroup
	{
		float: right;
	}

.linkGroup
{
}
	
	.linkGroup a
	{
		' . XenForo_Template_Helper_Core::styleProperty('linkGroupLink') . '
	}

		.linkGroup a.inline
		{
			padding: 0;
		}

	.linkGroup a,
	.linkGroup .Popup,
	.linkGroup .element
	{
		margin-left: ' . XenForo_Template_Helper_Core::styleProperty('linkGroupLinkSpacing') . ';
		display: block;
		float: left;
		';
if ($pageIsRtl)
{
$__output .= '*display: inline; *float: none; *zoom: 1;';
}
$__output .= '
	}
	
		.linkGroup .Popup a
		{
			margin-left: -2px;
			margin-right: -5px;
			*margin-left: ' . XenForo_Template_Helper_Core::styleProperty('linkGroupLinkSpacing') . ';
			padding: ' . XenForo_Template_Helper_Core::styleProperty('linkGroupLink.padding-top') . ' 5px;
		}

	.linkGroup .element
	{
		padding: 3px 0;
	}

/** Call to action buttons **/

a.callToAction
{
	' . XenForo_Template_Helper_Core::styleProperty('callToAction') . '
	
}

	a.callToAction span
	{
		' . XenForo_Template_Helper_Core::styleProperty('callToActionSpan') . '
	}
	
	a.callToAction:hover
	{
		text-decoration: none;
	}

		a.callToAction:hover span
		{
			' . XenForo_Template_Helper_Core::styleProperty('callToActionHover') . '
		}
		
		a.callToAction:active
		{
			/*position: relative;
			top: 2px;*/
		}
		
		a.callToAction:active span
		{
			' . XenForo_Template_Helper_Core::styleProperty('callToActionActive') . '
		}

/*********/

.avatarHeap
{
	overflow: hidden; zoom: 1;
}

	.avatarHeap ol
	{
		margin-right: -4px;
		margin-top: -4px;
	}
	
		.avatarHeap li
		{
			float: left;
			margin-right: 4px;
			margin-top: 4px;
		}

';
$__compilerVar7 = '';
$__compilerVar7 .= '/* User name classes */
';
if ($displayStyles)
{
foreach ($displayStyles AS $displayStyleId => $displayStyle)
{
if ($displayStyle['username_css'])
{
$__compilerVar7 .= '
.username .style' . htmlspecialchars($displayStyleId, ENT_QUOTES, 'UTF-8') . '
{
	' . $displayStyle['username_css'] . '
}
';
}
}
}
$__compilerVar7 .= '

.username .banned
{
	text-decoration: line-through;
}';
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '

';
$__compilerVar8 = '';
$__compilerVar8 .= '.prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('titlePrefix') . '
}

a.prefixLink:hover
{
	text-decoration: none;
}

a.prefixLink:hover .prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('titlePrefixHover') . '
}

.prefix a { color: inherit; }

.prefix.prefixPrimary    { color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
.prefix.prefixSecondary  { color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDark') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; }

.prefix.prefixRed        { color: white; background-color: red; border-color: #F88; }
.prefix.prefixGreen      { color: white; background-color: green; border-color: green; }
.prefix.prefixOlive      { color: black; background-color: olive; border-color: olive; }
.prefix.prefixLightGreen { color: black; background-color: lightgreen; border-color: lightgreen; }
.prefix.prefixBlue       { color: white; background-color: blue; border-color: #88F; }
.prefix.prefixRoyalBlue  { color: white; background-color: royalblue; border-color: #81A9E1;  }
.prefix.prefixSkyBlue    { color: black; background-color: skyblue; border-color: skyblue; }
.prefix.prefixGray       { color: black; background-color: gray; border-color: #AAA; }
.prefix.prefixSilver     { color: black; background-color: silver; border-color: silver; }
.prefix.prefixYellow     { color: black; background-color: yellow; border-color: #E0E000; }
.prefix.prefixOrange     { color: black; background-color: orange; border-color: #FFC520; }

.discussionListItem .prefix,
.searchResult .prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('discussionListPrefix') . '
	
	font-weight: normal;
}

h1 .prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('discussionListPrefix') . '
	
	line-height: normal;
}

.breadcrumb span.prefix,
.heading span.prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbTitlePrefix') . '
	color: inherit;
}';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '

';
$__compilerVar9 = '';
$__compilerVar9 .= '.userBanner
{
	font-size: 11px;
	background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\') repeat-x top;
	padding: 1px 5px;
	border: 1px solid transparent;
	border-radius: 3px;
	box-shadow: 1px 1px 3px rgba(0,0,0, 0.25);
	text-align: center;
}

	.userBanner.wrapped
	{
		border-top-right-radius: 0;
		border-top-left-radius: 0;
		position: relative;
	}
		
		.userBanner.wrapped span
		{
			position: absolute;
			top: -4px;
			width: 5px;
			height: 4px;
			background-color: inherit;
		}
		
		.userBanner.wrapped span.before
		{
			border-top-left-radius: 3px;
			left: -1px;
		}
		
		.userBanner.wrapped span.after
		{
			border-top-right-radius: 3px;
			right: -1px;
		}
		
.userBanner.bannerHidden { background: none; box-shadow: none; border: none; }
.userBanner.bannerHidden.wrapped { margin-left: 0; margin-right: 0; }
.userBanner.bannerHidden.wrapped span { display: none; }

.userBanner.bannerStaff { color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
.userBanner.bannerStaff.wrapped span { background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }

.userBanner.bannerPrimary { color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
.userBanner.bannerPrimary.wrapped span { background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }

.userBanner.bannerSecondary { color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDark') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; }
.userBanner.bannerSecondary.wrapped span { background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; }

.userBanner.bannerRed        { color: white; background-color: red; border-color: #F88; }
.userBanner.bannerRed.wrapped span { background-color: #F88; }

.userBanner.bannerGreen      { color: white; background-color: green; border-color: green; }
.userBanner.bannerGreen.wrapped span { background-color: green; }

.userBanner.bannerOlive      { color: black; background-color: olive; border-color: olive; }
.userBanner.bannerOlive.wrapped span { background-color: olive; }

.userBanner.bannerLightGreen { color: black; background-color: lightgreen; border-color: lightgreen; }
.userBanner.bannerLightGreen.wrapped span { background-color: lightgreen; }

.userBanner.bannerBlue       { color: white; background-color: blue; border-color: #88F; }
.userBanner.bannerBlue.wrapped span { background-color: #88F; }

.userBanner.bannerRoyalBlue  { color: white; background-color: royalblue; border-color: #81A9E1;  }
.userBanner.bannerRoyalBlue.wrapped span { background-color: #81A9E1; }

.userBanner.bannerSkyBlue    { color: black; background-color: skyblue; border-color: skyblue; }
.userBanner.bannerSkyBlue.wrapped span { background-color: skyblue; }

.userBanner.bannerGray       { color: black; background-color: gray; border-color: #AAA; }
.userBanner.bannerGray.wrapped span { background-color: #AAA; }

.userBanner.bannerSilver     { color: black; background-color: silver; border-color: silver; }
.userBanner.bannerSilver.wrapped span { background-color: silver; }

.userBanner.bannerYellow     { color: black; background-color: yellow; border-color: #E0E000; }
.userBanner.bannerYellow.wrapped span { background-color: #E0E000; }

.userBanner.bannerOrange     { color: black; background-color: orange; border-color: #FFC520; }
.userBanner.bannerOrange.wrapped span { background-color: #FFC520; }.userBanner strong a
{
	display: block;
	cursor: pointer;
}';
$__output .= $__compilerVar9;
unset($__compilerVar9);
$__output .= '

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .pageWidth
	{
		' . XenForo_Template_Helper_Core::styleProperty('pageWidthResponsiveWide') . '
	}

	.Responsive #content .pageContent
	{
		padding-left: ' . (XenForo_Template_Helper_Core::styleProperty('content.padding-left') / 2) . 'px;
		padding-right: ' . (XenForo_Template_Helper_Core::styleProperty('content.padding-right') / 2) . 'px;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .pageWidth
	{
		' . XenForo_Template_Helper_Core::styleProperty('pageWidthResponsiveMedium') . '
	}
	
	.Responsive .forum_view #pageDescription,
	.Responsive .thread_view #pageDescription
	{
		display: none;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .pageWidth
	{
		' . XenForo_Template_Helper_Core::styleProperty('pageWidthResponsiveNarrow') . '
	}
	
	.Responsive .pageNavLinkGroup .PageNav,
	.Responsive .pageNavLinkGroup .linkGroup
	{
		clear: right;
	}
}
';
}
$__output .= '

';
$__compilerVar10 = '';
$__compilerVar10 .= '@CHARSET "UTF-8";

/* --- EXTRA.css --- */

#BRC_CopyrightNotice { display: none; }
.publicControls .like:before,
.publicControls .unlike:before,
.publicControls .reply:before,
.publicControls .postComment:before{
content: "";
display: inline-block;
width: 16px;
height: 16px;
background: url(\'styles/default/xenforo/thumb_up.png\') no-repeat 50% 50%;
float: left;
margin: 4px 6px -5px -4px !important;
}
 
.publicControls .unlike:before{
background: url(\'styles/default/xenforo/thumb_down.png\') no-repeat 50% 50%;
}
 
.publicControls .postComment:before,
.publicControls .reply:before{
background: url(\'styles/default/xenforo/message_reply.png\') no-repeat 50% 50%;
}

.icon {
    background-color: transparent;
    background-image: url("styles/vxf/iconsprite.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    vertical-align: middle;
    width: 16px;
}
 
.span-icon-text {
    margin: -2px 5px 0 0;
}
 
.line-dot-pink {
    background: url("styles/vxf/line-dot.png") repeat-x scroll left center transparent;
    height: 1px;
    width: 98%;
}
 
.icon-register-date {
    background-position: -17px -646px;
}
 
.icon-message-count {
    background-position: 0 -1037px;
}
 
.icon-like-count {
    background-position: 0 -1377px;
}
 
.icon-trophy-points {
    background-position: 0 -1632px;
}
 
.icon-gender {
    background-position: 0 -1751px;
}
 
.icon-occupation {
    background-position: 0 -935px;
}
 
.icon-user-location {
    background-position: 0 -1734px;
}


#stp-bg {
    display: none;
    position: fixed;
    _position: absolute;
 /* hack for IE 6*/
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background: #000000;
    z-index: 998;
}

#stp-main {
    position: fixed;
    top: 220px;
    _position: absolute;
 /* hack for IE 6*/
    display: none;
    width: 450px;
    border: 7px solid #2f2f2f;
    background: #fff;
    z-index: 999;
    -moz-border-radius: 9px;
    -webkit-border-radius: 9px;
    margin: 0pt;
    padding: 0pt;
    color: #333333;
    text-align: left;
    font-family: arial,sans-serif !important;
    font-size: 13px;
}

/* Add Facebook login button to visitor panel */
.cta_fbButton {
margin: 10px 30px;
text-align: center;
}

#stp-title {
    font-family: Arial !important;
    font-size: 18px;
    padding: 13px 0 13px 15px;
}

#stp-close {
    float: right;
    font-size: 14px;
    font-weight: bold;
    font-family: Verdana, Geneva, sans-serif;
    color: #A4A4A4 !important;
    margin: 0 13px 0 0;
    border-bottom: 0px !important;
    text-decoration: none !important;
}

#stp-close:hover {
    text-decoration: none !important;
}

#stp-msg {
    background: #4074CF;
    padding: 10px 15px;
    color: #ffffff;
    font-family: Arial, Helvetica, sans-serif !important;
    font-weight: bold;
    line-height: 20px;
}

#stp-buttons {
    margin: 25px 0px 25px 0;
    padding: 0 0 0 15px;
}

#stp-bottom {
    padding: 15px 10px;
    background: #EFEFEF;
    color: #95989F;
    border-top: 1px solid #DDE0E8;
}

#stp-counter {
    font-size: 11px !important;
    text-align: right;
    font-weight: bold;
    color: red;
}

.stp-button {
    float: left;
    width: 120px;
}

.step-clear {
    clear: both !important;
}


 .subForumsPopup {
float: none !important;
clear: both;
}

.subForumsPopup .dot { 
position: relative; 
float: left; /* firefox fix */ 
} 

.subForumsPopup .dot span { 
height: 0px; 
left: 6px; 
top: 10px !important; 
position: absolute; 
width: 0px; 
border: 2px solid #6cb2e4; 
-webkit-border-radius: 6px; -moz-border-radius: 6px; -khtml-border-radius: 6px; border-radius: 6px; } 

.subForumsMenu ol li { 
width: 50%; float: left; } 

.subForumsMenu .node .nodeTitle a { 
padding-left: 16px; } 

.subForumsMenu .node .node.level-n { display: none; }

.noticesnew {
background: #ffeb90 none;
font-size: 12px;
color: #3e3e3e;
padding: 5px 10px;
margin-bottom: 5px;
-moz-box-shadow: 2px 2px #c8c8c8;
-webkit-box-shadow: 2px 2px #c8c8c8;
box-shadow: 2px 2px #c8c8c8;
text-align: left;
clear: both;
}

.fb-comments, .fb-comments span, .fb-comments iframe { width: 100% !important; }

.conversation_view .comment_fbdiv {
display: none;
}

.conversation_view .fb-comments, .conversation_view .fb-comments span, .conversation_view .fb-comments iframe {
display: none!important;
}

/*thoinv 01/02/2015 avatar*/
.messageUserBlock div.avatarHolder .onlineMarker
{
    display: inline-block;
    width: 16px;
    height: 16px;
/*    margin: 9px 0 0 9px; <- if you\'d like it on top left */
    margin: 79px 0 0 79px;
    background: #fff;
    border: none!important;
    border-radius: 50%!important
}
   
.messageUserBlock div.avatarHolder .onlineMarker:before
{
    content: \'\';
    position: absolute;
    width: 10px;
    height: 10px;
    margin: 3px 0 0 3px;
    background: #7fb900;
    border-color: #7fb900;
    border-radius: 50%
}

.messageUserBlock div.avatarHolder .onlineMarker:after
{
    content: \'\';
    position: absolute;
    width: 32px;
    height: 32px;
    margin: -9px 0 0 -9px;
    border: 1px solid #7fb900;
    border-radius: 50%;
    box-shadow: 0 0 4px #7fb900, inset 0 0 4px #7fb900;
    -webkit-transform: scale(0);
    -webkit-animation: online 2.5s ease-in-out infinite;
    animation: online 2.5s ease-in-out infinite
}

@-webkit-keyframes online
{
      0% {opacity: 1;-webkit-transform: scale(0)}
     50% {opacity: .7}
    100% {opacity: 0;-webkit-transform: scale(1)}
}

@keyframes online
{
      0% {opacity: 1;transform: scale(0)}
     50% {opacity: .7}
    100% {opacity: 0;transform: scale(1)}
}   

/*thoinv 01022015 highlight search result*/
.highlight
{
    color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryMedium') . ';
}

/*hide rss*/
.node .nodeControls,.footerLinks a.globalFeed{display:none;}

';
$__output .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar11 = '';
$__compilerVar11 .= '.socialBar {
	padding: 10px 5px;
	margin: 0 -5px;
	zoom: 1;
	clear: both;
	position: relative;
}

.socialBar .attribution {
	position: absolute;
	bottom: 0;
	right: 0;
	z-index: 1;
}

.socialBar .attribution div {
	position: relative;
	bottom: 9px;
	right: 8px;
	font-size: 9px;	
}

.dp-social-base {
	position: relative;
	top: -1px;
}

.socialBar .socialInner {
	padding: 5px;
	height: 20px;
	white-space: nowrap;
	overflow: hidden;
	box-shadow: 0 0 7px ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
}

.socialBar s {
	text-decoration: none;
}

.socialBar .buttons {
	position: absolute;
	opacity: 0;
	width: 150px;
	-webkit-transition: all 1s;
	transition: all 1s;
}

.socialBar .tweets {
	height: 30px;
	vertical-align: top;
	position: relative;
	top: -5px;
	margin-left: 150px;
	cursor: wait;
	/*-webkit-transition: all .5s;*/
	/*transition: all .5s;*/
}


.socialBar .tweets .tweetContent {
	position: relative;
	/* top: -5px; */
	opacity: 0;
	height: 32px;
	-webkit-transition: all .5s;
	transition: all .5s;
}

.socialBar .tweets .tweetContent img {
	max-height: 16px;
	vertical-align: middle;
	/*float: left;
	padding: 5px 5px 0 0;*/
}

.socialBar .tweets .tweetContent .username {
	padding: 0 10px;
	vertical-align: middle;
	/*display: table-row;*/
}


.socialBar .tweets .tweetContent div {
	display: inline;
}

.socialBar .tweets .tweetContent div:first-child {
	font-weight: bold;
	padding-right: 5px;
}


.socialBar .tweets .tweetContent .text {
	vertical-align: middle;
}

.socialBar .a2a_kit {
	zoom: 0.6875;
	-moz-transform: scale(0.6875);
	-moz-transform-origin: 0 0;
}';
$__output .= $__compilerVar11;
unset($__compilerVar11);
