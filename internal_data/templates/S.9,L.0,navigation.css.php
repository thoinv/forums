<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '@CHARSET "UTF-8";

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
$__output .= '
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
