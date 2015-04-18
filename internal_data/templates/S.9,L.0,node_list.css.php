<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.nodeList { zoom: 1; }
.nodeList .node {
	zoom: 1;
	vertical-align: bottom;
}

.nodeList .node.level_1
{
	margin-bottom: 20px;
}

.nodeList .node.level_1:last-child
{
	margin-bottom: 0;
}

.nodeList .node.groupNoChildren + .node.groupNoChildren
{
	margin-top: -20px;
}

.node .nodeInfo
{
	overflow: hidden; zoom: 1;
	position: relative;
}

	.node .nodeInfo.primaryContent,
	.node .nodeInfo.secondaryContent
	{
		padding: 0;
	}

.node .nodeIcon
{
	' . XenForo_Template_Helper_Core::styleProperty('nodeIcon') . '	
}

	.node .forumNodeInfo .nodeIcon,
	.node .categoryForumNodeInfo .nodeIcon
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeIconForum') . '
	}

	.node .forumNodeInfo.unread .nodeIcon,
	.node .categoryForumNodeInfo.unread .nodeIcon
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeIconForumUnread') . '
	}

	.node .pageNodeInfo .nodeIcon
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeIconPage') . '
	}

	.node .linkNodeInfo .nodeIcon
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeIconLink') . '
	}

.node .nodeText
{
	' . XenForo_Template_Helper_Core::styleProperty('nodeText') . '
}

	.node .nodeText .nodeTitle
	{	
		' . XenForo_Template_Helper_Core::styleProperty('nodeTitle') . '
	}
	
		.node .unread .nodeText .nodeTitle
		{
			' . XenForo_Template_Helper_Core::styleProperty('nodeTitleUnread') . '
		}

	.node .nodeDescription
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeDescription') . '
	}
	
	.hasJs .node .nodeDescriptionTooltip
	{
		/* will be shown as a tooltip */
		display: none;
	}
	
	.Touch .node .nodeDescriptionTooltip
	{
		/* touch browsers don\'t see description tooltips */
		display: block;
	}

	.node .nodeStats
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeStats') . '
	}
	
	.node .nodeExtraNote
	{
		text-align: right;
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}
	
	.node .subForumList
	{
		overflow: hidden; *zoom: 1;
		margin: -5px 0 ' . XenForo_Template_Helper_Core::styleProperty('nodeText.margin-bottom') . ';
		margin-left: ' . XenForo_Template_Helper_Core::styleProperty('nodeText.margin-left') . ';
	}
	
		.node .subForumList li
		{
			float: left;
			width: 31%;
			margin: 2px 0 2px 2%;
		}
		
			.node .subForumList li .nodeTitle
			{
				font-size: 11px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			
			.node .subForumList .unread .nodeTitle
			{
				' . XenForo_Template_Helper_Core::styleProperty('nodeTitleUnread') . '
			}
		
			.node .subForumList li ol,
			.node .subForumList li ul
			{
				display: none;
			}

.node .nodeLastPost
{
	' . XenForo_Template_Helper_Core::styleProperty('secondaryContent') . '
	
	' . XenForo_Template_Helper_Core::styleProperty('nodeLastPost') . '
}

.node .nodeLastPost .lastThreadTitle
{
	text-overflow: ellipsis;
	max-width: 100%;
	display: block;
	overflow: hidden;
}

	.node .nodeLastPost .lastThreadMeta
	{
		display: block;
	}

	.node .nodeLastPost .noMessages
	{
		line-height: 28px;
	}

.node .nodeControls
{
	position: absolute;
	top: 0;
	right: ' . (XenForo_Template_Helper_Core::styleProperty('nodeLastPost.border-left-width') + XenForo_Template_Helper_Core::styleProperty('nodeLastPost.padding-left') + XenForo_Template_Helper_Core::styleProperty('nodeLastPost.width') + XenForo_Template_Helper_Core::styleProperty('nodeLastPost.padding-right') + XenForo_Template_Helper_Core::styleProperty('nodeLastPost.border-right-width') + XenForo_Template_Helper_Core::styleProperty('nodeLastPost.margin-right')) . 'px;
	margin: 20px 0;
}

	.node .tinyIcon
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeTinyIcon') . '
	}

	.node .nodeInfo:hover .tinyIcon[href],
	.Touch .node .tinyIcon
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeTinyIconHover') . '
	}

		/*.node .feedIcon
		{
			background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -112px -16px;
		}*/

/* description tooltip */

.nodeDescriptionTip
{
	' . XenForo_Template_Helper_Core::styleProperty('nodeDescriptionTip') . '
}

	.nodeDescriptionTip .arrow
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeDescriptionTipArrow') . '
	}
	
	.nodeDescriptionTip.arrowBottom .arrow
	{
		top: auto;
		left: 10px;
		bottom: -6px;
		border: 6px solid transparent;
		border-top-color: ' . XenForo_Template_Helper_Core::styleProperty('tooltip.background-color') . ';
		border-bottom: 1px none black;
	}
	
/* main area - used for L2 categories and most other nodes */

.nodeList .categoryForumNodeInfo,
.nodeList .forumNodeInfo,
.nodeList .pageNodeInfo,
.nodeList .linkNodeInfo
{
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent') . '
	
	padding: 0;
}

/* category strip - used for L1 categories and group headers */

.nodeList .categoryStrip
{


	' . XenForo_Template_Helper_Core::styleProperty('subHeading') . '
	
	' . XenForo_Template_Helper_Core::styleProperty('categoryStrip') . '
}

	.nodeList .categoryStrip .nodeTitle
	{
		' . XenForo_Template_Helper_Core::styleProperty('categoryStripTitle') . '
	}
	
		.nodeList .categoryStrip .nodeTitle a
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('categoryStripTitle.color') . ';
		}

	.nodeList .categoryStrip .nodeDescription
	{
		' . XenForo_Template_Helper_Core::styleProperty('categoryStripDescription') . '
	}
	
		.nodeList .categoryStrip .nodeDescription a
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('categoryStripDescription.color') . ';
		}

.nodeList .node.groupNoChildren + .node.groupNoChildren .categoryStrip
{
	display: none;
}

/* node stats area */

.nodeStats
{
	overflow: hidden; zoom: 1;
}

.nodeStats dl,
.subForumsPopup
{
	float: left;
	display: block;
	margin-right: 3px;
}

.subForumsPopup.Popup .PopupControl.PopupOpen
{
	background-image: none;
}

.subForumsPopup a.PopupControl
{
	padding-left: 5px;
	padding-right: 5px;
}

.subForumsPopup .dt
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

.subForumsPopup .PopupOpen .dt
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('body.color') . ';
}

.subForumsMenu .node .node /* for depths 2+ */
{
	padding-left: 10px;
}

	.subForumsMenu .node .nodeTitle
	{
		font-size: 11px;
	}
	
	.subForumsMenu .node .unread .nodeTitle
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeTitleUnread') . '
	}

.subForumList li .nodeTitle:before
{
  background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat 10000px 0;
  background-position: -25px -40px;
  height: 10px;
  width: 10px;
  content: "";
  padding-left: 12px;
}

.subForumList li .unread .nodeTitle:before {
  background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat 10000px 0;
  background-position: -5px -40px;
  height: 10px;
  width: 10px;
  content: "";
  padding-left: 12px;
}

.subForumsMenu .node .unread .nodeTitle a:before
{
  background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat 10000px 0;
  background-position: -5px -40px;
  height: 10px;
  width: 10px;
  content: "";
  padding-left: 12px;
}

.Menu > li > a:before, .Menu .menuRow:before
{
  background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat 10000px 0;
  background-position: -25px -40px;
  height: 10px;
  width: 10px;
  content: "";
  padding-left: 12px;
}

.blockLinksList .unread a
{
  font-weight: bold;
}
	
/** new discussion button below nodelist **/

.nodeListNewDiscussionButton
{
	margin-top: 10px;
	text-align: right;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .node .nodeText
	{
		margin-right: 0;
	}
	
	.Responsive.Touch .node .nodeDescriptionTooltip,
	.Responsive .node .nodeDescription
	{
		display: none;
	}

	.Responsive .node .nodeLastPost
	{
		position: static;
		height: auto;
		width: auto;
		background: none;
		border: none;
		padding: 0;
		margin: -' . (XenForo_Template_Helper_Core::styleProperty('nodeText.margin-bottom') - 2) . 'px 0 ' . XenForo_Template_Helper_Core::styleProperty('nodeText.margin-bottom') . ' ' . XenForo_Template_Helper_Core::styleProperty('nodeText.margin-left') . ';
	}
	
		.Responsive .node .nodeLastPost .noMessages 
		{
			display: none;
		}
		
		.Responsive .node .nodeLastPost .lastThreadTitle,
		.Responsive .node .nodeLastPost .lastThreadUser
		{
			display: none;
		}
				
		.Responsive .node .nodeLastPost .lastThreadDate:before
		{
			content: attr(data-latest);
		}

	.Responsive .node .nodeControls
	{
		display: none;
	}
		
	.Responsive .node .subForumList
	{
		display: none;
	}
	
	.Responsive .nodeDescriptionTip
	{
		width: auto;
		max-width: 350px;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .subForumsPopup
	{
		display: none;
	}
}
';
}
