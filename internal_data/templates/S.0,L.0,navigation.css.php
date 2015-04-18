<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#navigation .pageContent
{
	height: ' . (XenForo_Template_Helper_Core::styleProperty('headerTabHeight') * 2 + 2) . 'px;
	position: relative;
}

#navigation .menuIcon
{
	position: relative;
	font-size:18px;
	width: 16px;
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
	top: ' . (round(-0.31 + 0.029 * XenForo_Template_Helper_Core::styleProperty('headerTabHeight'), 1)) . 'em;
	left: 0;
	width: 16px;
	height: 2px;
	border-top: 6px double currentColor;
	border-bottom: 2px solid currentColor;
}

	.navTabs
	{
		' . XenForo_Template_Helper_Core::styleProperty('navTabs') . '
		
		height: ' . XenForo_Template_Helper_Core::styleProperty('headerTabHeight') . ';
	}
	
		.navTabs .publicTabs
		{
			float: left;
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
				
				';
if ($pageIsRtl)
{
$__output .= '*display: inline; *float: none; *zoom: 1;';
}
$__output .= '
			}


/* ---------------------------------------- */
/* Links Inside Tabs */

.navTabs .navLink,
.navTabs .SplitCtrl
{
	' . XenForo_Template_Helper_Core::styleProperty('navLink') . '
	
	';
if ($pageIsRtl)
{
$__output .= '*float: none; *display: inline; *zoom: 1;';
}
$__output .= '
	
	height: ' . XenForo_Template_Helper_Core::styleProperty('headerTabHeight') . ';
	line-height: ' . XenForo_Template_Helper_Core::styleProperty('headerTabHeight') . ';
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
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	}
	
		.navTabs .navTab.PopupClosed:hover
		{
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		}
		
			.navTabs .navTab.PopupClosed .navLink:hover
			{
				color: ' . XenForo_Template_Helper_Core::styleProperty('textCtrlBackground') . ';
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
			/* nav_menu_gadget, height: 17px */
			background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -128px ' . ((XenForo_Template_Helper_Core::styleProperty('headerTabHeight') - 17) / 2 + 1) . 'px;
		}
	
	/* ---------------------------------------- */
	/* selected tab */

	.navTabs .navTab.selected .navLink
	{
		position: relative;
		' . XenForo_Template_Helper_Core::styleProperty('navTabSelected') . '
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
		' . XenForo_Template_Helper_Core::styleProperty('popupControl') . '
	}
	
/* ---------------------------------------- */
/* Second Row */

.navTabs .navTab.selected .tabLinks
{
	' . XenForo_Template_Helper_Core::styleProperty('navTabSelected.background') . '
	
	width: 100%;	
	padding: 0;
	border: none;
	overflow: hidden; zoom: 1;	
	position: absolute;
	left: 0px;	
	top: ' . (XenForo_Template_Helper_Core::styleProperty('headerTabHeight') + 2) . 'px;
	height: ' . XenForo_Template_Helper_Core::styleProperty('headerTabHeight') . ';
	background-position: 0px -' . XenForo_Template_Helper_Core::styleProperty('headerTabHeight') . ';
	*clear:expression(style.width = document.getElementById(\'navigation\').offsetWidth + \'px\', style.clear = "none", 0);
}

	.navTabs .navTab.selected .blockLinksList
	{
		background: none;
		padding: 0;
		border: none;
		margin-left: 8px;
	}

	.withSearch .navTabs .navTab.selected .blockLinksList
	{
		margin-right: 275px;
	}

	.navTabs .navTab.selected .tabLinks .menuHeader
	{
		display: none;
	}
	
	.navTabs .navTab.selected .tabLinks li
	{
		float: left;
		padding: 2px 0;
	}
	
		.navTabs .navTab.selected .tabLinks a
		{
			' . XenForo_Template_Helper_Core::styleProperty('navTabLink') . '
			
			line-height: ' . (XenForo_Template_Helper_Core::styleProperty('headerTabHeight') - 6) . 'px;
		}
		
		.navTabs .navTab.selected .tabLinks .PopupOpen a
		{
			color: inherit;
			text-shadow: none;
		}
		
			.navTabs .navTab.selected .tabLinks a:hover,
			.navTabs .navTab.selected .tabLinks a:focus
			{
				' . XenForo_Template_Helper_Core::styleProperty('navTabLinkHover') . '
			}
			
			.navTabs .navTab.selected .tabLinks .Popup a:hover,
			.navTabs .navTab.selected .tabLinks .Popup a:focus
			{
				color: inherit;
				background: none;
				border-color: transparent;
				border-radius: 0;
				text-shadow: none;
			}
	
/* ---------------------------------------- */
/* Alert Balloons */
	
.navTabs .navLink .itemCount
{
	' . XenForo_Template_Helper_Core::styleProperty('alertBalloon') . '
}

	.navTabs .navLink .itemCount .arrow
	{
		' . XenForo_Template_Helper_Core::styleProperty('alertBalloonArrow') . '
	}
	
.navTabs .navLink .itemCount.Zero
{
	display: none;
}

.navTabs .navLink .itemCount.ResponsiveOnly
{
	display: none !important;
}

.NoResponsive #VisitorExtraMenu_Counter,
.NoResponsive #VisitorExtraMenu_ConversationsCounter,
.NoResponsive #VisitorExtraMenu_AlertsCounter
{
	display: none !important;
}
	
/* ---------------------------------------- */
/* Account Popup Menu */

.navTabs .navTab.account .navLink
{
	font-weight: bold;
}

	.navTabs .navTab.account .navLink .accountUsername
	{
		display: block;
		max-width: 100px;
		overflow: hidden;
		text-overflow: ellipsis;
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
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
	}
	
	#AccountMenu .menuHeader .links .fl
	{
		position: absolute;
		bottom: 10px;
		left: ' . (10 + 10 + 96) . 'px;
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
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('inlineModChecked.background-color') . ';
		}

.navPopup .listItem
{
	overflow: hidden; zoom: 1;
	padding: 5px 0;
	border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

.navPopup .listItem:last-child
{
	border-bottom: none;
}

.navPopup .PopupItemLinkActive:hover
{
	margin: 0 -8px;
	padding: 5px 8px;
	border-radius: 5px;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
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
