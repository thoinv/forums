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
$__compilerVar2 .= '.footer .pageContent
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
$__compilerVar2 .= '*display: inline; *float: none; *zoom: 1;';
}
$__compilerVar2 .= '
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
$__compilerVar2 .= '*display: inline; *float: none; *zoom: 1;';
}
$__compilerVar2 .= '
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
$__compilerVar2 .= '*display: inline; *float: none; *zoom: 1;';
}
$__compilerVar2 .= '
			margin-left: 10px;
		}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar2 .= '
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
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

';
$__compilerVar3 = '';
$__compilerVar3 .= '.breadBoxTop,
.breadBoxBottom
{
	' . XenForo_Template_Helper_Core::styleProperty('breadBox') . '
}

.breadBoxTop
{
}

.breadBoxTop .topCtrl
{
	' . XenForo_Template_Helper_Core::styleProperty('breadBoxTopCtrl') . '
}

.breadcrumb
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumb') . '
}

.breadcrumb.showAll
{
	height: auto;
}

.breadcrumb .boardTitle
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbBoardTitle') . '
}

.breadcrumb .crust
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemCrust') . '
}

.breadcrumb .crust a.crumb
{
	cursor: pointer;
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemCrumb') . '
}

	.breadcrumb .crust a.crumb > span
	{
		display: block;
		text-overflow: ellipsis;
		word-wrap: normal;
		white-space: nowrap;
		overflow: hidden;
		max-width: 100%;
	}

	.breadcrumb .crust:first-child a.crumb,
	.breadcrumb .crust.firstVisibleCrumb a.crumb
	{
		' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemFirstCrumb') . '
	}
	
	.breadcrumb .crust:last-child a.crumb
	{
		' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemLastCrumb') . '
	}

.breadcrumb .crust .arrow
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemArrowOuter') . '
}

.breadcrumb .crust .arrow span
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemArrowInner') . '
}

.breadcrumb .crust:hover a.crumb
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemCrumbHover') . '
}

.breadcrumb .crust:hover .arrow span
{
	border-left-color: ' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemCrumbHover.background-color') . ';
}

	.breadcrumb .crust .arrow
	{
		/* hide from IE6 */
		_display: none;
	}

.breadcrumb .jumpMenuTrigger
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbJumpMenuTrigger') . '
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
$__compilerVar4 .= '#navigation .pageContent
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
$__compilerVar4 .= '*display: inline; *float: none; *zoom: 1;';
}
$__compilerVar4 .= '
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
$__compilerVar4 .= '*float: none; *display: inline; *zoom: 1;';
}
$__compilerVar4 .= '
	
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
$__compilerVar5 .= '#searchBar
{
	position: relative;
	zoom: 1;
	z-index: 52; /* higher than breadcrumb arrows */
}

	#QuickSearchPlaceholder
	{
		position: absolute;
		right: 20px;
		top: ' . (-1 * (XenForo_Template_Helper_Core::styleProperty('headerTabHeight') / 2 + 16 / 2)) . 'px;
		display: none;
		border-radius: 5px;
		cursor: pointer;
		font-size: 11px;
		height: 16px;
		width: 16px;
		box-sizing: border-box;
		text-indent: -9999px;
		background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -144px 0px;
		overflow: hidden;
	}

	#QuickSearch
	{
		display: block;
		
		position: absolute;
		right: 20px;
		top: -18px;
		
		margin: 0;
		
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('content.background-color') . ';
		border-radius: 5px;
		padding-top: 5px;
		_padding-top: 3px;
		z-index: 7500;
	}
			
		#QuickSearch .secondaryControls
		{
			display: none;
		}
	
		#QuickSearch.active
		{
			box-shadow: 5px 5px 25px rgba(0,0,0, 0.5);
			padding-bottom: 5px;
		}
		
	#QuickSearch .submitUnit .button
	{
		min-width: 0;
	}
		
	#QuickSearch input.button.primary
	{
		float: left;
		width: 110px;
	}
	
	#QuickSearch #commonSearches
	{
		float: right;
	}
	
		#QuickSearch #commonSearches .button
		{
			width: 23px;
			padding: 0;
		}
		
			#QuickSearch #commonSearches .arrowWidget
			{
				margin: 0;
				float: left;
				margin-left: 4px;
				margin-top: 4px;
			}
	
	#QuickSearch .moreOptions
	{
		display: block;
		margin: 0 24px 0 110px;
		width: auto;
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__compilerVar5 .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive #QuickSearchPlaceholder
	{
		display: block;
	}

	.Responsive #QuickSearchPlaceholder.hide
	{
		display: none;
	}

	.Responsive #QuickSearch
	{
		display: none;
	}

	.Responsive #QuickSearch.show
	{
		display: block;
	}
}
';
}
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
		top: 0px;
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
	' . XenForo_Template_Helper_Core::styleProperty('content') . '
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
	 margin-right: -' . (XenForo_Template_Helper_Core::styleProperty('sidebar.width') + 10) . 'px;
	 width: 100%;
}

	.mainContent
	{
		margin-right: ' . (XenForo_Template_Helper_Core::styleProperty('sidebar.width') + 10) . 'px;
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
		
		.avatarHeap li .avatar
		{
			display: block;
		}
		
/*********/

.fbWidgetBlock .fb_iframe_widget,
.fbWidgetBlock .fb_iframe_widget > span,
.fbWidgetBlock .fb_iframe_widget iframe
{
	width: 100% !important;
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
$__compilerVar10 .= '.socialBar {
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
$__output .= $__compilerVar10;
unset($__compilerVar10);
