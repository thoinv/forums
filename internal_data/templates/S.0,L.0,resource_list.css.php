<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.resourceCategoryTooltip
{
	max-width: 350px;
}

.resourceListMain
{
	margin-left: 230px;
}

	.resourceListMain .tabs
	{
		padding-left: 20px;
		padding-right: 20px;
		margin-bottom: 5px;
	}

a.viewAllFeatured
{
	float: right;
	font-size: 11px;
	font-weight: normal;
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

.featuredResourceList
{
	overflow: hidden;
	margin-bottom: 10px;
	height: 119px;
}

	.featuredResourceList .featuredResource
	{
		' . XenForo_Template_Helper_Core::styleProperty('secondaryContent') . '
		float: left;
		margin: 0 5px 5px 0;
		box-sizing: border-box;
		width: 300px;
		max-width: 100%;
		padding: 5px;
		box-shadow: 1px 1px 3px rgba(0,0,0, 0.25);
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
		border-radius: 5px;
	}
		
		.featuredResourceList .featuredResource .prefix
		{
			max-width: 100%;
			box-sizing: border-box;
			overflow: hidden;
			word-wrap: normal;
			white-space: nowrap;
			text-overflow: ellipsis;
			vertical-align: bottom;
		}

		.featuredResourceList .featuredResource .resourceInfo
		{
			height: ' . (96 + XenForo_Template_Helper_Core::styleProperty('avatar.padding-top') + XenForo_Template_Helper_Core::styleProperty('avatar.padding-bottom') + XenForo_Template_Helper_Core::styleProperty('avatar.border-top-width') + XenForo_Template_Helper_Core::styleProperty('avatar.border-bottom-width')) . 'px;
			padding-left: 5px;
			overflow: hidden;
			position: relative;
		}

		.featuredResourceList .featuredResource .resourceImage
		{
			float: left;
		}

			.featuredResourceList .featuredResource .resourceImage img
			{
				display: block;
				width: 96px;
				height: 96px;
			}
			
			.featuredResourceList .featuredResource .resourceImage .resourceIcon img
			{
				' . XenForo_Template_Helper_Core::styleProperty('avatar') . '
			}

		.featuredResourceList .featuredResource .title
		{
			font-weight: bold;
			font-size: 15px;
			line-height: 18px;
			max-height: 36px;
			overflow: hidden;
			padding: 3px 0;
		}

		.featuredResourceList .featuredResource .tagLine
		{
			font-size: 11px;
			line-height: 14px;
			max-height: 28px;
			overflow: hidden;
		}

		.featuredResourceList .featuredResource .details
		{
			position: absolute;
			right: 0;
			bottom: 0;
			margin-top: 10px;
			font-size: 11px;
			white-space: nowrap;
			word-wrap: normal;
			overflow: hidden;
			max-width: 100%;
			text-overflow: ellipsis;
		}
	
.discussionListFilters
{
	margin-bottom: 10px;
}

.resourceFilterMenu .menuHeader
{
	padding-top: 5px;
	padding-bottom: 5px;
}

.bubbleLinksList
{
	overflow: hidden;
}

.bubbleLinksList a
{
	float: left;
	padding: 2px 4px;
	margin-right: 2px;
	border-radius: 3px;
	text-decoration: none;
}
	
	.bubbleLinksList a.active
	{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	}

	.bubbleLinksList a:hover,
	.bubbleLinksList a:active
	{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		text-decoration: none;
	}

.resourceInlineModSelection
{
	float: right;
	font-size: 11px;
	margin-top: 10px;
	margin-left: 10px;
}

.resourceListSidebar
{
	float: left;
	width: 220px;
}

.resourceListSidebar .secondaryContent
{
	margin-bottom: 10px;
}

	.resourceListSidebar h3
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockHeading') . '
	}

	.resourceListSidebar .categoryList li
	{
		padding: 2px 0 3px;
		overflow: hidden; zoom: 1;
	}

	.resourceListSidebar .categoryList .count
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		float: right;
		*float: none;
		margin-left: 5px;
	}

	.resourceListSidebar .categoryList .selected
	{
		font-weight: bold;
	}

	.resourceListSidebar .categoryList ol ol
	{
		margin-left: 15px;
	}


.resourceListSidebar .avatarList li
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListItem') . '
}

	.resourceListSidebar .avatarList .avatar
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar') . '

		width: auto;
		height: auto;
	}

	.resourceListSidebar .avatarList .avatar img
	{
		width: ' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar.width') . ';
		height: ' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar.height') . ';
	}

	.resourceListSidebar .avatarList .username
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListUsername') . '
	}

	.resourceListSidebar .avatarList .extraData,
	.resourceListSidebar .avatarList .extraData a
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListUserTitle') . '
	}
	
.resourceHeaders
{
	position: relative;
	zoom: 1;
}

	.resourceHeaders .extraLinks
	{
		position: absolute;
		right: 10px;
		top: 3px;
		font-size: 11px;
	}

	.resourceHeaders .typeFilter
	{
		position: absolute;
		zoom: 1;
		right: 20px;
		bottom: 1px;
		margin: 0;
		padding: 0;
		width: auto;
		border-bottom: none;
		background: none;
	}
		
		.resourceHeaders .typeFilter li a
		{
			padding: 0 5px;
		}
		
		.resourceHeaders .typeFilter li.active a
		{
			padding-bottom: 1px;
		}
				

.resourceList .resourceNote
{
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	text-align: center;
	padding: 5px;
}

.resourceListItem
{
	display: table;
	table-layout: fixed;
	width: 100%;

	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '

	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.border') . '
}

	.resourceListItem .listBlock
	{
		display: table-cell;
		vertical-align: middle;
	}

	.resourceListItem .listBlockInner
	{
		padding: 10px;
	}

	.resourceListItem .resourceImage
	{
		width: ' . (48 + 3 * 2 + 5 * 2) . 'px;
	}

		.resourceListItem .resourceImage .listBlockInner
		{
			padding: 5px;
			position: relative;
		}
		
		.resourceListItem .resourceImage .resourceIcon img
		{
			' . XenForo_Template_Helper_Core::styleProperty('avatar') . '
			width: 48px;
			height: 48px;
		}
		
		.resourceListItem .resourceImage .creatorMini
		{
			position: absolute;
			bottom: 1px;
			left: 39px;
		}
		
			.resourceListItem .resourceImage .creatorMini img
			{
				width: 20px;
				height: 20px;
				border-radius: 2px;
				border: none;
				padding: 1px;
				box-shadow: 1px 1px 5px rgba(0,0,0, 0.5);
			}

	.resourceListItem .main
	{
		width: auto;
	}

		.resourceListItem .main .title
		{
			font-size: 11pt;
			font-weight: bold;
		}

		.resourceListItem .main .extra
		{
			font-size: 11px;
			float: right;
			margin-left: 5px;
		}
		
		.resourceListItem .main .cost
		{
			font-size: 9px;
			float: right;
			color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
			border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
			border-radius: 3px;
			padding: 1px;
			margin-top: 3px;
			margin-left: 5px;
		}
		
		.resourceListItem .main .featuredBanner
		{
			font-size: 9px;
			float: right;
			clear: right;
			color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryMedium') . ';
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
			border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
			border-radius: 3px;
			padding: 1px;
			margin-top: 3px;
			margin-left: 5px;
		}

		.resourceListItem .iconKey span
		{
			' . XenForo_Template_Helper_Core::styleProperty('dicussionListIcon') . '
		}
			
			.resourceListItem .iconKey .moderated { background-position: -32px -16px; }
			.resourceListItem .iconKey .deleted { background-position: -64px -32px; }


		.resourceListItem .main .version
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
			font-weight: normal;
		}

		.resourceListItem .main .resourceDetails
		{
			font-size: 11px;
		}

		.resourceListItem .main .tagLine
		{
			font-size: 11px;
			margin-top: .5em;
		}

	.resourceListItem .resourceStats
	{
		width: 200px;
		font-size: 11px;
	}

		.resourceListItem .resourceStats dt
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		}

		.resourceListItem .resourceStats .Hint
		{
			float: right;
		}

	.resourceListItem .resourceImage,
	.resourceListItem .resourceStats
	{
		' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background') . '
	}

/* deleted item */

.resourceListItem.deleted .avatar img
{
	opacity: 0.5;
	filter: alpha(opacity=\'50\');
}
	
.resourceListItem.deleted .deletionNote
{
	color: rgb(150,0,0);
}
		
/* moderated item */

.resourceListItem.moderated .listBlock
{
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '
}

/* deleted item */

	.resourceListItem.deleted .avatar img
	{
		opacity: 0.5;
		filter: alpha(opacity=\'50\');
	}

	.resourceListItem.deleted .title a
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		text-decoration: line-through;
	}

/* inline mod selected/checked classes */

.resourceListItem.InlineModChecked,
.resourceListItem.InlineModChecked .resourceImage,
.resourceListItem.InlineModChecked .main,
.resourceListItem.InlineModChecked .resourceStats,
.resourceListItem.deleted.InlineModChecked,
.resourceListItem.moderated.InlineModChecked
{
	' . XenForo_Template_Helper_Core::styleProperty('inlineModChecked') . '
}


/** IE <8 **/
.resourceListItem               { *display: block; _vertical-align: bottom; }
.resourceListItem .listBlock    { *display: block; *float: left; _height: 52px; *min-height: 52px; }
.resourceListItem .resourceImage { *width: 10.98%; *font-size: 0; }
.resourceListItem .main         { *width: 59.98%; }
.resourceListItem .resourceStats { *width: 28.97%; }

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .resourceListBlock
	{
		display: table;
		table-layout: fixed;
		width: 100%;
		box-sizing: border-box;
	}

	.Responsive .resourceListBlock .resourceListSidebar
	{
		display: table-footer-group;
		
		float: none;
		padding-right: 0;
		border-right: none;
		margin: 0 auto;
		margin-top: 10px;
	}

	.Responsive .resourceListBlock .resourceListMain 
	{
		display: table-header-group;

		margin-left: 0;
		border-left: none;
		border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
		padding-bottom: 10px;
	}

	.Responsive .resourceListBlock .resourceListSidebar > *
	{
		max-width: 220px;
		margin-left: auto;
		margin-right: auto;
	}
	
	.Responsive .resourceHeaders .typeFilter
	{
		position: static;
		width: 100%;
		padding: 0 20px;
		' . XenForo_Template_Helper_Core::styleProperty('tabsContainer.border') . '
		' . XenForo_Template_Helper_Core::styleProperty('tabsContainer.background') . '
	}
	
		.Responsive .resourceHeaders .typeFilter li
		{
			float: left;
		}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .resourceHeaders .extraLinks
	{
		position: static;
		text-align: right;
		margin-bottom: 3px;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .resourceListItem .listBlock.main,
	.Responsive .resourceListItem .listBlock.resourceStats
	{
		display: block;
	}
	
	.Responsive .resourceListItem .listBlock.main .listBlockInner
	{
		padding-bottom: 0;
	}
	
	.Responsive .resourceListItem .listBlock.resourceStats
	{
		width: auto;
		background: transparent;
	}
	
		.Responsive .resourceListItem .listBlock.resourceStats .listBlockInner
		{
			overflow: hidden;
			padding-top: 3px;
		}
	
	.Responsive .resourceListItem .resourceStats .rating
	{
		float: left;
	}	
		.Responsive .resourceListItem .resourceStats .rating .Hint
		{
			display: none;
		}
	
	.Responsive .resourceListItem .resourceStats .resourceDownloads
	{
		float: right;
		margin-left: 5px;
	}
	
	.Responsive .resourceListItem .resourceStats .resourceUpdated
	{
		float: right;
		clear: right;
		margin-left: 5px;
	}
}

@media (max-width:340px)
{
	.Responsive .resourceListBlock .resourceListSidebar > *
	{
		max-width: none;
	}
}
';
}
