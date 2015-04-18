<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.categoryListItem .categoryInfo
{
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent') . '
	
	padding: 0;
	overflow: hidden; zoom: 1;
	position: relative;
}

.categoryListItem .categoryText
{
	' . XenForo_Template_Helper_Core::styleProperty('nodeText') . '

	margin-left: ' . XenForo_Template_Helper_Core::styleProperty('nodeText.margin-top') . ';
}

	.categoryListItem .categoryText .title
	{	
		' . XenForo_Template_Helper_Core::styleProperty('nodeTitle') . '
		' . XenForo_Template_Helper_Core::styleProperty('nodeTitleUnread') . '
	}

	.categoryListItem .description
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeDescription') . '
	}
	
	.categoryListItem .stats
	{
		' . XenForo_Template_Helper_Core::styleProperty('nodeStats') . '

		overflow: hidden; zoom: 1;
	}
	
	.categoryListItem .categoryExtraNote
	{
		text-align: right;
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}
	
.categoryListItem .lastUpdate
{
	' . XenForo_Template_Helper_Core::styleProperty('secondaryContent') . '
	
	' . XenForo_Template_Helper_Core::styleProperty('nodeLastPost') . '
}

.categoryListItem .lastUpdate .lastTitle
{
	text-overflow: ellipsis;
	max-width: 100%;
	display: block;
	overflow: hidden;
}

	.categoryListItem .lastUpdate .lastTMeta
	{
		display: block;
	}

	.categoryListItem .lastUpdate .noMessages
	{
		line-height: 28px;
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .categoryListItem .categoryText
	{
		margin-right: 0;
	}
	
	.Responsive .categoryListItem .nodeDescription
	{
		display: none;
	}

	.Responsive .categoryListItem .lastUpdate
	{
		position: static;
		height: auto;
		width: auto;
		background: none;
		border: none;
		padding: 0;
		margin: -' . (XenForo_Template_Helper_Core::styleProperty('nodeText.margin-bottom') - 2) . 'px 0 ' . XenForo_Template_Helper_Core::styleProperty('nodeText.margin-bottom') . ' ' . XenForo_Template_Helper_Core::styleProperty('nodeText.margin-top') . ';
	}
	
		.Responsive .categoryListItem .lastUpdate .noMessages 
		{
			display: none;
		}
		
		.Responsive .categoryListItem .lastUpdate .lastTitle
		{
			display: none;
		}
				
		.Responsive .categoryListItem .lastUpdate .lastDate:before
		{
			content: attr(data-latest);
		}
}
';
}
