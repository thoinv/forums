<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.profilePage
{
	' . XenForo_Template_Helper_Core::styleProperty('profilePage') . '
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.profilePage'
)) . '

.profilePage .mast
{
	float: left;
	width: ' . XenForo_Template_Helper_Core::styleProperty('profilePageSidebarWidth') . ';
	padding-right: 10px;
	border-right: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

.profilePage .mainProfileColumn
{
	margin-left: ' . (XenForo_Template_Helper_Core::styleProperty('profilePageSidebarWidth') + 10) . 'px;
	border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	zoom: 1;
}

/** ************************ **/

.profilePage .mast .section
{
}
	
	.profilePage .mast .sectionFooter
	{
		border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		border-right: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		text-align: right;
	}

/** ************************ **/

.profilePage .mast .followBlocks .section
{
	margin-bottom: 20px;
}

.profilePage .mast .followBlocks .primaryContent.avatarHeap
{
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-top: none;
}

/** ************************ **/

.profilePage .mast .section.infoBlock
{
	' . XenForo_Template_Helper_Core::styleProperty('profilePageSidebarInfoBlock') . '
}

	.profilePage .mast .section.infoBlock .primaryContent,
	.profilePage .mast .section.infoBlock .secondaryContent
	{
		overflow: hidden;
	}

	.profilePage .mast .section.infoBlock .primaryContent:last-child,
	.profilePage .mast .section.infoBlock .secondaryContent:last-child
	{
		border: none;
	}

	.profilePage .infoBlock dt
	{
		' . XenForo_Template_Helper_Core::styleProperty('profilePageSidebarInfoBlockDt') . '
	}

	.profilePage .infoBlock dd
	{
		' . XenForo_Template_Helper_Core::styleProperty('profilePageSidebarInfoBlockDd') . '
	}

	.profilePage .infoBlock .dob,
	.profilePage .infoBlock .age
	{
		white-space: nowrap;
	}
	
	.profilePage .mast .shareControl
	{
		margin-top: 10px;
	}
	
	.profilePage .mast .sharePage iframe
	{
		width: 160px;
		height: 20px;
	}

/* ***************************** */
/** [ Items...........(count) ] **/

.textWithCount
{
	overflow: hidden; zoom: 1;
}

	.textWithCount .text
	{
		float: left;
	}

	.textWithCount .count
	{
		float: right;
	}
	
		.textWithCount.subHeading .text
		{		
			color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDarker') . ';
		}
		
		.textWithCount.subHeading .count
		{
			margin: -3px 0;
			padding: 2px 6px;
			border-radius: 5px;
			border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
			color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDarker') . ';
		}

/** ************************ **/

.profilePage .primaryUserBlock
{
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

.profilePage .primaryUserBlock .mainText
{
	padding-bottom: ' . (XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') + 14) . 'px;
}

	.profilePage .primaryUserBlock .followBlock
	{
		float: right;
		font-size: 11px;
		text-align: right;
	}
	
		.profilePage .primaryUserBlock .followBlock li
		{
			float: right;
			margin-left: 10px;
		}
	
		.profilePage .primaryUserBlock .followBlock .muted
		{
			font-size: 10px;
			clear: both;
		}

	.profilePage .primaryUserBlock h1
	{
		' . XenForo_Template_Helper_Core::styleProperty('profilePageUsername') . '
	}

	.profilePage .primaryUserBlock .userBlurb
	{
		margin-bottom: 5px;
	}
	
	.profilePage .primaryUserBlock .userBanners .userBanner
	{
		display: inline-block;
		margin-bottom: 5px;
	}
	
	.profilePage .primaryUserBlock .userStatus
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageText') . '
		
		' . XenForo_Template_Helper_Core::styleProperty('profilePageUserStatus') . '
	}
	
	.profilePage .primaryUserBlock .lastActivity
	{
		' . XenForo_Template_Helper_Core::styleProperty('profilePageLastActivityText') . '
	}
	
		.profilePage .primaryUserBlock .userStatus .DateTime
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
			font-size: 10px;
		}
	
	.profilePage .primaryUserBlock .primaryContent,
	.profilePage .primaryUserBlock .secondaryContent
	{
		padding-left: ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabInset') . ';
		border: none;
	}
	
.profilePage .moderatorToolsPopup.Popup .PopupControl.PopupOpen
{
	background-image: none;
}

.profilePage .tabs.mainTabs
{
	padding: 0 ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabInset') . ';	
	margin-top: -' . (XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') + 1) . 'px;
	min-height: ' . (XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') + 1) . 'px;
	height: auto;
	position: relative; /* ensure separate stacking context from .mainText */
	background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background-color') . ';
}

	.profilePage .tabs.mainTabs li a
	{
		padding-left: ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') . ';
		padding-right: ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') . ';		
		line-height: ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') . ';
		height: ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') . ';
		
		' . XenForo_Template_Helper_Core::styleProperty('profilePageTab') . '	
	}
	
		.profilePage .tabs.mainTabs li a:hover
		{
			' . XenForo_Template_Helper_Core::styleProperty('profilePageTabHover') . '
		}
	
	.profilePage .tabs.mainTabs li.active a
	{
		' . XenForo_Template_Helper_Core::styleProperty('profilePageTabSelected') . '
	}

.profilePage .profileContent
{
	margin-left: ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabInset') . ';
}

	.profilePage .profilePoster
	{
		padding-bottom: 10px;
		position: relative;
	}
	
		.profilePage .profilePoster textarea
		{
			height: 54px;
			width: 100%;
			box-sizing: border-box;
			*width: 98%;
			resize: vertical;
		}
		
		.profilePage .profilePoster .submitUnit
		{
			margin-top: 5px;
			text-align: right;
		}

.profilePage .profileContent .InlineMod
{
	overflow: hidden; zoom: 1;
	
}

.contactInfo,
.aboutPairs
{
	max-width: 500px;
}

	.contactInfo dl,
	.aboutPairs dl
	{
		margin-bottom: 5px;
	}
	
	.contactInfo dt,
	.aboutPairs dt
	{
		width: 30%;
	}
	
	.contactInfo dd,
	.aboutPairs dd
	{
		width: 68%;
	}

.aboutPairs
{
	margin-bottom: 1em;
}

.signature
{
	' . XenForo_Template_Helper_Core::styleProperty('messageText') . '
	
	/*border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	padding: 10px;*/
}

.profilePage .eventList li
{
	padding-left: 0;
}

.profilePage .eventList:first-of-type li:first-child
{
	padding-top: 0;
}

.profilePage .searchResult:first-child
{
	margin-top: -5px;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .profilePage
	{
		display: table;
		table-layout: fixed;
		width: 100%;
		box-sizing: border-box;
	}

	.Responsive .profilePage .mast
	{
		display: table-footer-group;
		
		float: none;
		padding-right: 0;
		border-right: none;
		margin: 0 auto;
		margin-top: 10px;
	}

	.Responsive .profilePage .avatarScaler
	{
		text-align: center;
	}

	.Responsive .profilePage .mast .sharePage
	{
		display: none;
	}

	.Responsive .profilePage .profileContent
	{
		margin-left: 0;
	}

	.Responsive .profilePage .mainProfileColumn
	{
		display: table-header-group;

		margin-left: 0;
		border-left: none;
		border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
		padding-bottom: 10px;
	}

	.Responsive .profilePage .mast > *
	{
		max-width: 192px;
		margin-left: auto;
		margin-right: auto;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .warningList .warningExpiry
	{
		display: none;
	}
}

@media (max-width:340px)
{
	.Responsive .profilePage .mast > *
	{
		max-width: none;
	}
}
';
}
