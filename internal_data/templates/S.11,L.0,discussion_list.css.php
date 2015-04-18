<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.discussionList
{
	position: relative;
	zoom: 1;
}

/** column style and width **/

.discussionList .sectionHeaders,
.discussionListItem
{
	display: table;
	table-layout: fixed;
	width: 100%;
	word-wrap: normal;
}

	.discussionList .sectionHeaders dt,
	.discussionList .sectionHeaders dd,
	.discussionListItem .listBlock
	{
		display: table-cell;
		vertical-align: middle;
	}
	
		.discussionList .posterAvatar
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('discussionListAvatarWidth') . ';
		}
		
		.discussionList .main
		{
			width: auto;
		}

			.discussionList .sectionHeaders .main .postDate
			{
				text-align: right;
			}
		
		.discussionList .stats
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('discussionListStatsWidth') . ';
		}
			
			.discussionList .sectionHeaders .stats .minor
			{
				text-align: right;
			}
		
		.discussionList .lastPost
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('discussionListLastPostWidth') . ';
			text-align: right;
			overflow: hidden;
		}
		
		.discussionList .statsLastPost /* combined last two columns */
		{
			width: ' . (XenForo_Template_Helper_Core::styleProperty('discussionListStatsWidth') + XenForo_Template_Helper_Core::styleProperty('discussionListLastPostWidth')) . 'px;
		}
	

/* column headers */

.discussionList .sectionHeaders
{	
	' . XenForo_Template_Helper_Core::styleProperty('subHeading') . '
	
	padding: 0;
}

	.discussionList .sectionHeaders dt span
	{
		display: none !important;
	}
		
	.discussionList .sectionHeaders a
	{
		display: block;
		color: ' . XenForo_Template_Helper_Core::styleProperty('subHeading.color') . ';
		outline: none;
	}
	
	.discussionList .sectionHeaders a:hover
	{
		text-decoration: none;
	}
			
	.discussionList .sectionHeaders dd a[href]:hover
	{
		' . XenForo_Template_Helper_Core::styleProperty('subHeadingHover') . '
	}
		
	.discussionList .sectionHeaders .main a,
	.discussionList .sectionHeaders .stats a
	{
		float: left;
		width: 50%;
		white-space: nowrap;
	}
	
		.discussionList .sectionHeaders a span
		{
			' . XenForo_Template_Helper_Core::styleProperty('subHeading.padding') . '
			display: block;
		}
		
/** IE <8 **/
.discussionList .sectionHeaders,
.discussionListItem                { *display: block; _vertical-align: bottom; }
.discussionList .sectionHeaders dt,
.discussionList .sectionHeaders dd,
.discussionListItem .listBlock     { *display: block; *float: left; }
.discussionListItem .listBlock     { _height: 52px; *min-height: 52px; } /* todo: should be calculation */
.discussionList .posterAvatar      { *width: 6.98%; }
.discussionListItem .posterAvatar  { *font-size: 0; }	
.discussionList .main              { *width: 56.98%; }
.discussionList .stats             { *width: 15.97%; }	
.discussionList .lastPost          { *width: 19.97%; }
.discussionList .statsLastPost     { *width: 35.97%; }
.discussionList .sectionHeaders dt,
.discussionList .sectionHeaders dd { *padding: 5px 0; }
.discussionList .sectionHeaders a,
.discussionList .sectionHeaders a span { *display: inline !important; *float: none !important; }

/* items in thread list */

.discussionListItems
{
}



	
/* individual thread list item */
	
/** main **/

.discussionListItem
{
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '
	
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.border') . '
}





	/* sections, section widths */
	
		.discussionListItem .posterAvatar,		
		.discussionListItem .stats
		{
			' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background') . '
		}
		
		.discussionListItem .main,
		.discussionListItem .lastPost
		{
		}
		
		
		
		
		
		
		
		
	/* avatar section */
	
	.discussionListItem .posterAvatar .avatarContainer
	{
		display: block;
		position: relative;
	}
	
	.discussionListItem .posterAvatar .avatar
	{
		' . XenForo_Template_Helper_Core::styleProperty('discussionListAvatar') . '
		
		width: auto;
		height: auto;
	}
	
		.discussionListItem .posterAvatar .avatar img
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('discussionListAvatar.width') . ';
			height: ' . XenForo_Template_Helper_Core::styleProperty('discussionListAvatar.height') . ';
			display: block;
		}
		
		.discussionListItem .posterAvatar .miniMe
		{
			' . XenForo_Template_Helper_Core::styleProperty('discussionListMiniMe') . '
		}
		
			.discussionListItem .posterAvatar .miniMe img
			{
				' . XenForo_Template_Helper_Core::styleProperty('discussionListMiniMeImg') . '				
			}		
		
		
	/* title, poster section */
	
	.discussionListItem .titleText
	{
		padding: 5px;
		overflow: hidden; zoom: 1;
		position: relative;
	}
	
		/* unread indicator */
		
		.LoggedIn .discussionListItem .titleText
		{			
			padding-left: 20px;
		}
		
		.LoggedIn .discussionListItem .unreadLink,
		.LoggedIn .discussionListItem .ReadToggle
		{
			display: block;
			width: 10px;
			height: 10px;
			
			position: absolute;
			left: 5px;
			top: 10px;
			
			background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat 10000px 0;
			
			white-space: nowrap;
			overflow: hidden;
			text-indent: 9999px;
		}
		
			.LoggedIn .discussionListItem .unreadLink,
			.LoggedIn .discussionListItem.unread .ReadToggle
			{
				background-position: -5px -42px;
			}
		
			.LoggedIn .discussionListItem .ReadToggle:hover
			{
				background-position: -25px -42px;
			}
	
		/* first row */
	
		.discussionListItem .title
		{
			' . XenForo_Template_Helper_Core::styleProperty('discussionListFirstRow') . '
			max-width: 100%;
			word-wrap: break-word;
		}
		
			.discussionListItems .unread .title a
			{
				' . XenForo_Template_Helper_Core::styleProperty('discussionListTitleUnread') . '
			}
			
		
		.discussionListItem .iconKey span
		{
			' . XenForo_Template_Helper_Core::styleProperty('dicussionListIcon') . '
		}
			
			.discussionListItem .iconKey .sticky    { background-position:   0px -16px; }
			.discussionListItem .iconKey .starred   { background-position: -90px -32px; width: 18px; height: 18px; }
			.discussionListItem .iconKey .watched   { background-position: -144px -16px; width: 16px; height: 16px; }
			.discussionListItem .iconKey .locked    { background-position: -16px -16px; }
			.discussionListItem .iconKey .moderated { background-position: -32px -16px; }
			.discussionListItem .iconKey .redirect  { background-position: -48px -16px; }
			.discussionListItem .iconKey .new       { background-position: -64px -16px; }
		
		/* second row */
		
		.discussionListItem .secondRow
		{
			' . XenForo_Template_Helper_Core::styleProperty('discussionListSecondRow') . '
			clear: both;
		}
		
			.discussionListItem .secondRow .controls
			{
				float: right;
				padding-left: 20px;
			}
				
				.discussionListItem.AjaxProgress .controls
				{
					background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif\') no-repeat left center;
				}
			
			.discussionListItem .posterDate
			{
				float: left;
			}
			
			
			
	/* stats section */
	
	.discussionListItem .stats dl
	{
		padding: 0 10px;
		border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		border-right: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	}
		.discussionListItem .stats .major
		{
			' . XenForo_Template_Helper_Core::styleProperty('discussionListFirstRow') . '
			
			margin-top: 5px;
		}
			
		.discussionListItem .stats .minor
		{
			' . XenForo_Template_Helper_Core::styleProperty('discussionListSecondRow') . '
			
			margin-bottom: 5px;
		}
			
	/* last post section */
	
	.discussionListItem .lastPostInfo
	{
		padding: 5px;
	}
	
		.discussionListItem .lastPostInfo .username
		{
			' . XenForo_Template_Helper_Core::styleProperty('discussionListFirstRow') . '
		}
		
	
			.discussionListItems .unread .lastPostInfo .username
			{
				' . XenForo_Template_Helper_Core::styleProperty('discussionListTitleUnread') . '
			}
		
		.discussionListItem .lastPostInfo .dateTime
		{
			' . XenForo_Template_Helper_Core::styleProperty('discussionListSecondRow') . '
		}


/* extra note row */

.discussionListItem .noteRow
{
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '
	padding: 5px;
	text-align: center;
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
}

	.discussionListItem .noteRow.secondary
	{
		' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background') . '
	}




/* deleted item */

.discussionList .discussionListItem.deleted
{
}

	.discussionList .discussionListItem.deleted .avatar img
	{
		opacity: 0.5;
		filter: alpha(opacity=\'50\');
	}
		
	.discussionList .discussionListItem.deleted .deletionNote
	{
		float: left;
		color: rgb(150,0,0);
	}
		
/* moderated item */

.discussionList .discussionListItem.moderated .listBlock
{
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '
}

		
		
		
		
		
			
/* inline mod selected/checked classes */

.discussionListItem.InlineModChecked,
.discussionListItem.InlineModChecked .posterAvatar,
.discussionListItem.InlineModChecked .main,
.discussionListItem.InlineModChecked .stats,
.discussionListItem.InlineModChecked .lastPost,
.discussionListItem.deleted.InlineModChecked,
.discussionListItem.moderated.InlineModChecked
{
	' . XenForo_Template_Helper_Core::styleProperty('inlineModChecked') . '
}
















		
/** bottom summary **/

.discussionList .sectionFooter
{
	overflow: hidden; zoom: 1;
}

	.discussionList .sectionFooter .contentSummary
	{
		float: left;
		display: block;
	}

		
/** thread list options **/

.DiscussionListOptions
{
	' . XenForo_Template_Helper_Core::styleProperty('discussionListOptions') . '
}

.hasJs .DiscussionListOptions
{
	display: none;
}

	.DiscussionListOptions dl,
	.DiscussionListOptions .controlGroup
	{
		float: left;
		margin-right: 10px;
		
		overflow: hidden; zoom: 1;
	}
	
		.DiscussionListOptions dt
		{
			float: left;
		}
		
		.DiscussionListOptions dd
		{
			margin-left: 120px;
		}
		
	.DiscussionListOptions .buttonGroup
	{
		float: right;
	}
	
		.DiscussionListOptions .buttonGroup input
		{
			min-width: 75px;
		}
	
#DiscussionListOptionsHandle
{
	' . XenForo_Template_Helper_Core::styleProperty('discussionListOptionsHandle') . '
}
	
	#DiscussionListOptionsHandle a
	{
		' . XenForo_Template_Helper_Core::styleProperty('discussionListOptionsHandleLink') . '
	}
	
.afterDiscussionListHandle
{
	margin-top: 20px;
}
	
/** item page nav **/

.discussionListItem .itemPageNav
{
	' . ((XenForo_Template_Helper_Core::styleProperty('discussionListPageNavHidden')) ? ('visibility: hidden;') : ('')) . '
}

.discussionListItem:hover .itemPageNav,
.Touch .discussionListItem .itemPageNav
{
	visibility: visible;
}

	.itemPageNav a,
	.itemPageNav span
	{
		' . XenForo_Template_Helper_Core::styleProperty('discussionListItemPageNavItem') . '
	}
	
	.itemPageNav a
	{
		' . XenForo_Template_Helper_Core::styleProperty('discussionListItemPageNavLink') . '
	}
	
	.itemPageNav a:hover
	{
		' . XenForo_Template_Helper_Core::styleProperty('discussionListItemPageNavLinkHover') . '
	}

/** filters **/
		
.discussionListFilters
{
	font-size: 11px;
	overflow: hidden; zoom: 1;
}

	.discussionListFilters .filtersHeading
	{
		float: left;
		margin-right: 5px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
		font-weight: bold;
	}
	
	.discussionListFilters .removeFilter,
	.discussionListFilters .removeAllFilters
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\') repeat-x top;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		border-radius: 5px;
		padding: 2px 10px;
	}
	
		.discussionListFilters .gadget
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
			font-weight: bold;
			margin-left: 3px;
		}

	
		.discussionListFilters .removeFilter:hover,
		.discussionListFilters .removeAllFilters:hover
		{
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
			text-decoration: none;
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
			box-shadow: 1px 1px 5px rgba(0,0,0, 0.15);
		}
		
	.discussionListFilters .pairsInline dt
	{
		display: none;
	}
	
	.discussionListFilters .filterPairs
	{
		float: left;
	}
	
	.discussionListFilters .removeAll
	{
		float: right;
	}
	
		.discussionListFilters .removeAllFilters
		{
			padding: 2px 6px;
		}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .discussionList .sectionHeaders .stats
	{
		display: none;
	}
	
	.Responsive .discussionList .sectionHeaders .main .title
	{
		float: none;
		width: auto;
	}
	
	.Responsive .discussionList .sectionHeaders .main .postDate
	{
		display: none;
	}
	
	.Responsive .discussionList .statsLastPost
	{
		display: none;
	}

	.Responsive .discussionListItem .listBlock.main,
	.Responsive .discussionListItem .listBlock.stats,
	.Responsive .discussionListItem .listBlock.lastPost
	{
		display: block;
	}
	
	.Responsive .discussionListItem .listBlock.stats
	{
		float: left;
		width: auto;
		margin-top: -5px;
		border: none;
		background: none;
		padding-left: 5px;
	}
	
		.Responsive.LoggedIn .discussionListItem .listBlock.stats
		{			
			padding-left: 20px;
		}
	
		.Responsive .discussionListItem .listBlock.stats dl
		{
			border: none;
			padding: 0;
		}
		
		.Responsive .discussionListItem .listBlock.stats dd,
		.Responsive .discussionListItem .listBlock.stats dt
		{
			float: none;
			display: inline;
		}
	
		.Responsive .discussionListItem .listBlock.stats .minor
		{
			display: none;
		}
		
		.Responsive .discussionListItem .listBlock.stats .major
		{
			font-size: 11px;
			margin-top: 0;
		}
	
	.Responsive .discussionListItem .listBlock.lastPost
	{
		float: right;
		width: auto;
		margin-top: -5px;
	}
		.Responsive .discussionListItem .listBlock.lastPost .lastPostInfo
		{
			padding-top: 0;
			padding-bottom: 0;
		}
	
		.Responsive .discussionListItem .listBlock.lastPost dt
		{
			display: none;
		}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .discussionList .sectionHeaders .lastPost,
	.Responsive .discussionList .lastPost
	{
		width: 125px;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .discussionListItem .secondRow .startDate,
	.Responsive .discussionListItem .secondRow .EditControl
	{
		display: none;
	}
}
';
}
